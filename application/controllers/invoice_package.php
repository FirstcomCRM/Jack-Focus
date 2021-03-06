<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class invoice extends CI_Controller {

	
	function __construct() {
		parent::__construct();
		is_login();
		//$controller = ucfirst($this->router->class);
		//$role_id = $this->session->userdata('fcs_role_id');
		//$method = $this->router->fetch_method();
		////$get_perm = check_permission($role_id,$controller,$method);
		//if($get_perm == 0)
		//{
		//	redirect(base_url().'error_403');
		//}
		$this->load->model('staff_model');
		$this->load->model('maid_model');
		$this->load->model('invoice_model');
		$this->load->model('customer_maid_model');
		$this->load->model('maid_model');
		$this->load->model('package_model');
		$this->load->model('invoice_payment_model');
		$this->load->model('credit_note_model');
		$this->load->model('debit_note_model');
	}

		public function index() {
		$data['msg'] = $this->session->flashdata('msg');
		$b_url = base_url().'invoice/index';
		$t_rows = $this->invoice_model->count();
		$pageConfig = create_pagination_config( $b_url, $t_rows, 10, 3);
		$this->pagination->initialize($pageConfig);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		
		$data['quotations'] = $this->invoice_model->fetch($pageConfig['per_page'], $page);
		$data['links'] = $this->pagination->create_links();

		$current_page =  floor(($this->uri->segment(3) / $pageConfig['per_page']) + 1);
		$data['pagination_msg'] = create_pagination_msg($current_page, $pageConfig['per_page'], $t_rows);
		$data['customers'] = $this->customer_maid_model->get();
		$data['staffx'] = $this->staff_model->get();
		$this->load->view('_template/header', $data);
        $this->load->view('invoice/index', $data);
        $this->load->view('_template/footer', $data);
	}
	public function add(){
		$this->load->helper(array('form'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('customer_id', 'customer', 'required');
		$this->form_validation->set_rules('quotation_date', 'date', 'required');
		$this->form_validation->set_rules('gst', 'GST', 'required');

		if($this->form_validation->run() === FALSE) {
			$data['action'] = 'add';
			$data['customers'] = $this->customer_maid_model->get();
			$data['products'] = $this->maid_model->get();
			$data['sale_persons'] = $this->staff_model->get();
			
			//$data['sale_persons'] = $this->sale_person_model->get();
			//$data['products']  = $this->product_model->get();
			$this->load->view('_template/header', $data);
			$this->load->view('invoice/add_edit', $data);
			$this->load->view('_template/footer', $data);
		}
		else{
			$quotation_id = $this->invoice_model->add();
			$this->session->set_flashdata('msg', '	Invoice Successfully Created');
			$ret = array(
				'status'       => 'success',
				'quotation_id' => $quotation_id,
			);
			echo json_encode($ret);
		}
	}

	

	public function check_add_quotation_no(){
		$quotation_no = $this->input->post('quotation_no');
        $result = $this->invoice_model->quotation_no_exist($quotation_no);
        if($result){
	        $this->form_validation->set_message('check_add_quotation_no', 'This Invoice no already exist, try again');
	        return false;
        }
        return true;
	}
	/*public function view($id){
		$data['msg'] = $this->session->flashdata('msg');
		$data['quotation'] = $this->invoice_model->get($id);
		if (empty($data['quotation'])) {
			show_404();
		}
		$data['action'] = 'view';
		$data['customers'] = $this->customer_maid_model->get();
		$data['quotation_products'] = $this->invoice_model->get_quotation_product($id);
		$data['products']  = $this->maid_model->get();
		$data['quotation_id']  = $id;
		$data['customer_info'] = $this->customer_maid_model->get($data['quotation']['customer_id']);
		$this->load->view('_template/header', $data);
		$this->load->view('invoice/view', $data);
		$this->load->view('_template/footer', $data);	


	
	}
	*/

		public function view($id){
		$data['msg'] = $this->session->flashdata('msg');
		$data['invoice'] = $this->invoice_model->get($id);
		$data['do'] = $this->invoice_model->getDo($id);
		//print_r($data['invoice'][0]['total_amount']);
		//echo $data['invoice'][0]['total_amount'];
		//echo $amount = $data['invoice']['total_amount'];
		if (empty($data['invoice'])) {
			show_404();
		}
		$data['action'] = 'view';
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('payment_date', 'payment date', 'required');
		$this->form_validation->set_rules('amount', 'amount', 'required|numeric');
		$data['quotation'] = $this->invoice_model->getQuo($id); // to delete or not to delete
		$data['quotation_products'] = $this->invoice_model->get_quotation_product($id);
		$data['credit_notes'] = $this->credit_note_model->get_credit_note($id);
		$data['debit_notes'] = $this->debit_note_model->get_debit_note($id);
		$data['customers'] = $this->customer_maid_model->get();
		$data['products']  = $this->maid_model->get();
		$data['quotation_id']  = $id;
		$data['payments'] = $this->invoice_payment_model->get_invoice_payment($id);
		//$data['payments'] = $data['invoice'][0]['total_amount'];
		//$amount = $data['invoice']['total_amount'];
		$amount = $this->invoice_model->getAmount($id);
		$data['quotation']['total_paid'] = $this->invoice_payment_model->get_payment_total($id);
		$data['quotation']['total_credit'] = $this->credit_note_model->get_cn_total($id);
		$data['quotation']['total_debit'] = $this->debit_note_model->get_dn_total($id);
		if($this->form_validation->run() === FALSE) {
			//$data['action'] = 'view';
			//$data['customer_info'] = $this->customer_maid_model->get($data['quotation']['customer_id']);
			//$data['customer_info'] = $data['quotation'][0]['customer_id'];
			//$data['customer_info'] = $this->invoice_model->getAmount($id);
			//$this->load->view('_template/header', $data);
			//$this->load->view('invoice/view', $data);
			//$this->load->view('_template/footer', $data);


			$data['action'] = 'view';
			$data['customer_info'] = $this->customer_maid_model->get($data['quotation']['customer_id']);
			$this->load->view('_template/header', $data);
			$this->load->view('invoice/view', $data);
			$this->load->view('_template/footer', $data);


			//$datax['maids'] = $this->invoice_model->getIdMaids($id);


			//print_r($datax);
			/*
			foreach ($datax['maids'] as $maid => $value)
			{
				//echo$value->maid_id; for object
				echo $value['maid_id']; //for array
			}
			*/
		}
		else{
			$this->invoice_payment_model->add();
			$payment_total = $this->invoice_payment_model->get_payment_total($id);
			$amount_inc_gst = $data['quotation']['total_inc_gst'];
			if (round($amount_inc_gst,2)<=0) {
				$this->invoice_model->unpaid_invoice($id);
			}
			else{
				if (round($payment_total,2)>=round($amount_inc_gst,2)) {
					$datax['maids'] = $this->invoice_model->getIdMaids($id);
					foreach ($datax['maids'] as $maid => $value)
					{
						$idm=$value['maid_id'];
						$this->maid_model->maid_deploy($idm);
						//$result = $this->maid_model->maid_deploy($idm);
						//$result = $this->maid_model->maid_deploy($idm);
						//if($result){
							
						//}
						//print_r($result); die();
					}
					//$datax['maids'] = $this->invoice_model->getIdMaids($id);
				
					$this->invoice_model->completed_invoice($id);
				}
				else{
					if (round($payment_total,2)==0) {
						$this->invoice_model->unpaid_invoice($id);
					}
					else{
						$this->invoice_model->partial_paid_invoice($id);
					}
				}
			}
			$this->session->set_flashdata('msg', 'Payment successfully created');
		
			redirect(base_url().'invoice/view/'.$id);
			}
		
	}
	

	public function edit($id){
		$data['msg'] = $this->session->flashdata('msg');
		$data['quotation'] = $this->invoice_model->getQuo($id);
		if (empty($data['quotation'])) {
			show_404();
		}
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('customer_id', 'customer', 'required');
		$this->form_validation->set_rules('quotation_date', 'date', 'required');
		$this->form_validation->set_rules('gst', 'GST', 'required');

		if($this->form_validation->run() === FALSE) {
			$data['action'] = 'edit';
			$data['sale_persons'] = $this->staff_model->get();
			$data['customers'] = $this->customer_maid_model->get();
			$data['products'] = $this->maid_model->get();
			$data['quotation_products'] = $this->invoice_model->get_quotation_product($id);
			$data['quotation_id']  = $id;
			$this->load->view('_template/header', $data);
			$this->load->view('invoice/add_edit', $data);
			$this->load->view('_template/footer', $data);	
		}

		else {
			$this->invoice_model->update($id);
			$this->session->set_flashdata('msg', 'Invoice Successfully Updated');
			$ret = array(
				'status' 	=> 'success',
			);
			echo json_encode($ret);
		}
	}
	public function check_edit_quotation_no($str, $id){
		$quotation_no = $this->input->post('quotation_no');
        $result = $this->invoice_model->quotation_no_exist($quotation_no, $id);
        if($result){
	        $this->form_validation->set_message('check_edit_quotation_no', 'This Invoice no already exist, try again');
	        return false;
        }
        return true;
	}

	public function delete($id="") {
		if ($id=="") {
			show_404();
		}
		$this->invoice_model->delete($id);	
		$this->session->set_flashdata('msg', 'Invoice successfully deleted');
		redirect(base_url().'invoice');
	}

	public function aj_get_product_details($id) {
		$qp_details = $this->invoice_model->get_product_details($id);
		$qp_details['status'] = 'success';
		echo json_encode($qp_details);
	}
	public function aj_add_product_details(){
		$qp_id = $this->invoice_model->add_quotation_product();
		$ret = array(
			'status' 	=> 'success',
			'qp_id'	=> $qp_id,
		);
		echo json_encode($ret);
	}

	public function aj_remove_quotation_product($id) {
		$this->invoice_model->remove_quotation_product($id);
		$ret = array(
			'status' 	=> 'success',
		);
		echo json_encode($ret);
	}
	public function aj_edit_product_details($id){
		$this->invoice_model->update_quotation_product($id);
		$ret = array(
			'status' 	=> 'success',
		);
		echo json_encode($ret);
	}

	public function print_preview($id){
		$data['msg'] = $this->session->flashdata('msg');
		$data['quotation'] = $this->invoice_model->get($id);
		if (empty($data['quotation'])) {
			// show_404();
		}
		$data['action'] = 'print';
		$data['customers'] = $this->customer_maid_model->get();
		$data['products'] = $this->maid_model->get();
		$data['quotation_products'] = $this->invoice_model->get_quotation_product($id);
		$data['quotation_id']  = $id;
		$data['customer_info'] = $this->customer_maid_model->get($data['quotation']['customer_id']);
		$this->load->view('_template/print-header', $data);
		$this->load->view('invoice/print', $data);
		$this->load->view('_template/print-footer', $data);

	}

	public function export_quotation(){
		$this->load->library('excel');
		$quotations = $this->invoice_model->get();
		$quo_export =  array();
		$no = 1;
		$total = 0; $total_paid = 0; $total_outstand = 0;
		foreach($quotations as $key=>$quotation) {     
			$quo_export[] = array(
				'No.'		        => $no,	
				'Quotation No.'		=> $quotation['quotation_no'],
				'Customer'			=> $quotation['company_name'],
				'Date' 				=> date('d-m-Y', $quotation['quotation_date']),
				'Total Amount'		=> $quotation['total_amount'],
				'GST'				=> $quotation['gst'].'%',
				'Total Inc GST'		=> $quotation['total_inc_gst'],
				'Status'            => ($quotation['is_close'] == 1) ? 'Closed': 'Pending',
                'Payment Terms'     => $quotation['payment_terms'],
                'Issued By'         => $quotation['issued_by'],
				'Remark'			=> $quotation['remark'],
				'Internal Remark'	=> $quotation['internal_remark'],
			);
			$total += $quotation['total_inc_gst'];
			$no++;
		}
		$quo_export[] = array(
				'No.'		        => '',	
				'Quotation No.'		=> '',
				'Customer'			=> '',
				'Date' 				=> '',
				'Total Amount'		=> '',
				'GST'				=> 'Total',
				'Total Inc GST'		=> $total,
				'Status'            => '',
                'Payment Terms'     => '',
                'Issued By'         => '',
				'Remark'			=> '',
				'Internal Remark'	=> '',
		);
		$this->excel->export($quo_export, "QuotationReport(" . date('d-m-Y', time()) . ").xls");	
	}
}