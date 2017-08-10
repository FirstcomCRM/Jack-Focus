<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class quotation extends CI_Controller {

	
	function __construct() {
		parent::__construct();
		is_login();
		$controller = ucfirst($this->router->class);
		$role_id = $this->session->userdata('fcs_role_id');
		$method = $this->router->fetch_method();
		$get_perm = check_permission($role_id,$controller,$method);
		if($get_perm == 0)
		{
			redirect(base_url().'error_403');
		}
		$this->load->model('sale_person_model');
		$this->load->model('quotation_model');
		$this->load->model('customer_model');
		$this->load->model('product_model');
	}

	public function index() {
		$data['msg'] = $this->session->flashdata('msg');
		$b_url = base_url().'quotation/index';
		$t_rows = $this->quotation_model->count();
		$pageConfig = create_pagination_config( $b_url, $t_rows, 10, 3);
		$this->pagination->initialize($pageConfig);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		
		$data['quotations'] = $this->quotation_model->fetch($pageConfig['per_page'], $page);
		$data['links'] = $this->pagination->create_links();

		$current_page =  floor(($this->uri->segment(3) / $pageConfig['per_page']) + 1);
		$data['pagination_msg'] = create_pagination_msg($current_page, $pageConfig['per_page'], $t_rows);
		$data['customers'] = $this->customer_model->get();
		$data['sale_persons'] = $this->sale_person_model->get();
		$this->load->view('_template/header', $data);
        $this->load->view('quotation/index', $data);
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
			$data['customers'] = $this->customer_model->get();
			$data['sale_persons'] = $this->sale_person_model->get();
			$data['products']  = $this->product_model->get();
			$this->load->view('_template/header', $data);
			$this->load->view('quotation/add_edit', $data);
			$this->load->view('_template/footer', $data);
		}
		else{
			$quotation_id = $this->quotation_model->add();
			$this->session->set_flashdata('msg', '	Quotation Successfully Created');
			$ret = array(
				'status'       => 'success',
				'quotation_id' => $quotation_id,
			);
			echo json_encode($ret);
		}
	}

	public function check_add_quotation_no(){
		$quotation_no = $this->input->post('quotation_no');
        $result = $this->quotation_model->quotation_no_exist($quotation_no);
        if($result){
	        $this->form_validation->set_message('check_add_quotation_no', 'This quotation no already exist, try again');
	        return false;
        }
        return true;
	}
	public function view($id){
		$data['msg'] = $this->session->flashdata('msg');
		$data['quotation'] = $this->quotation_model->get($id);
		if (empty($data['quotation'])) {
			show_404();
		}
		$data['action'] = 'view';
		$data['quotation_products'] = $this->quotation_model->get_quotation_product($id);
		$data['customers'] = $this->customer_model->get();
		$data['products']  = $this->product_model->get();
		$data['quotation_id']  = $id;
		$data['customer_info'] = $this->customer_model->get($data['quotation']['customer_id']);
		$this->load->view('_template/header', $data);
		$this->load->view('quotation/view', $data);
		$this->load->view('_template/footer', $data);	
	}
	public function edit($id){
		$data['msg'] = $this->session->flashdata('msg');
		$data['quotation'] = $this->quotation_model->get($id);
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
			$data['quotation_products'] = $this->quotation_model->get_quotation_product($id);
			$data['sale_persons'] = $this->sale_person_model->get();
			$data['customers'] = $this->customer_model->get();
			$data['products']  = $this->product_model->get();
			$data['quotation_id']  = $id;
			$this->load->view('_template/header', $data);
			$this->load->view('quotation/add_edit', $data);
			$this->load->view('_template/footer', $data);	
		}
		else {
			$this->quotation_model->update($id);
			$this->session->set_flashdata('msg', 'Quotation Successfully Updated');
			$ret = array(
				'status' 	=> 'success',
			);
			echo json_encode($ret);
		}
	}
	public function check_edit_quotation_no($str, $id){
		$quotation_no = $this->input->post('quotation_no');
        $result = $this->quotation_model->quotation_no_exist($quotation_no, $id);
        if($result){
	        $this->form_validation->set_message('check_edit_quotation_no', 'This quotation no already exist, try again');
	        return false;
        }
        return true;
	}

	public function delete($id="") {
		if ($id=="") {
			show_404();
		}
		$this->quotation_model->delete($id);	
		$this->session->set_flashdata('msg', 'quotation successfully deleted');
		redirect(base_url().'quotation');
	}

	public function aj_get_product_details($id) {
		$qp_details = $this->quotation_model->get_product_details($id);
		$qp_details['status'] = 'success';
		echo json_encode($qp_details);
	}
	public function aj_add_product_details(){
		$qp_id = $this->quotation_model->add_quotation_product();
		$ret = array(
			'status' 	=> 'success',
			'qp_id'	=> $qp_id,
		);
		echo json_encode($ret);
	}

	public function aj_remove_quotation_product($id) {
		$this->quotation_model->remove_quotation_product($id);
		$ret = array(
			'status' 	=> 'success',
		);
		echo json_encode($ret);
	}
	public function aj_edit_product_details($id){
		$this->quotation_model->update_quotation_product($id);
		$ret = array(
			'status' 	=> 'success',
		);
		echo json_encode($ret);
	}

	public function print_preview($id){
		$data['msg'] = $this->session->flashdata('msg');
		$data['quotation'] = $this->quotation_model->get($id);
		if (empty($data['quotation'])) {
			// show_404();
		}
		$data['action'] = 'print';
		$data['quotation_products'] = $this->quotation_model->get_quotation_product($id);
		$data['customers'] = $this->customer_model->get();
		$data['products']  = $this->product_model->get();
		$data['quotation_id']  = $id;
		$data['customer_info'] = $this->customer_model->get($data['quotation']['customer_id']);
		$this->load->view('_template/print-header', $data);
		$this->load->view('quotation/print', $data);
		$this->load->view('_template/print-footer', $data);
	}

	public function export_quotation(){
		$this->load->library('excel');
		$quotations = $this->quotation_model->get();
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