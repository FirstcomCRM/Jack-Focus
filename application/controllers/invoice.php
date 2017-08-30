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
		$this->load->model('invoice_package_model');
		$this->load->model('credit_note_model');
		$this->load->model('debit_note_model');
		$this->load->model('insurance_package_model');
		$this->load->model('contract_model');
		$this->load->model('insurance_package_model');
		$this->load->model('package_model');
		$this->load->model('branch_model');
		$this->load->model('user_permision');
		$this->load->library('session');

	}

		public function index() {

				$a = $this->user_permision->check_action_permision('inv_view',$this->session->userdata('fcs_role_id'));


			if($a['inv_view'] == 0){

				redirect(base_url().'error_550');
		     }else{




				$data['msg'] = $this->session->flashdata('msg');
				$b_url = base_url().'invoice/index';

					$data['customers'] = $this->customer_maid_model->get();
					// $data['products'] = $this->package_model->get();
					$data['maid_products'] = $this->maid_model->getAvailable();
					$data['insurance_products'] = $this->insurance_package_model->get();
					$data['staffx'] = $this->staff_model->get();

				$data['invoice_list'] = $this->invoice_model->get_all_invoice();



				$this->load->view('_template/header', $data);
		        $this->load->view('invoice/index', $data);
		        $this->load->view('_template/footer', $data);

				// $t_rows = $this->invoice_model->count();
				// $pageConfig = create_pagination_config( $b_url, $t_rows, 10, 3);
				// $this->pagination->initialize($pageConfig);
				// $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
				
				// $data['quotations'] = $this->invoice_model->fetch($pageConfig['per_page'], $page);
				// $data['links'] = $this->pagination->create_links();

				// $current_page =  floor(($this->uri->segment(3) / $pageConfig['per_page']) + 1);
				// $data['pagination_msg'] = create_pagination_msg($current_page, $pageConfig['per_page'], $t_rows);
				// $data['customers'] = $this->customer_maid_model->get();
				// $data['staffx'] = $this->staff_model->get();



			

		     }   





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
			$data['products'] = $this->maid_model->getAvailable();
			$data['sale_persons'] = $this->staff_model->get();
			$data['packages'] = $this->package_model->get();
			$data['insurances'] = $this->insurance_package_model->get();

			
			
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

	public function add_by_customer($id){
		$data['maid'] = $this->maid_model->get($id);
		//$data['maid_id'] = $id;
		if (empty($data['maid'])) {
			show_404();
		}
		$this->load->helper(array('form'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('customer_id', 'customer', 'required');
		$this->form_validation->set_rules('quotation_date', 'date', 'required');
		$this->form_validation->set_rules('gst', 'GST', 'required');

		if($this->form_validation->run() === FALSE) {
			$data['action'] = 'add';
			$data['customers'] = $this->customer_maid_model->get();
			$data['products'] = $this->maid_model->getPurchaseMaid($id);
			$data['sale_persons'] = $this->staff_model->get();

			
			//$data['sale_persons'] = $this->sale_person_model->get();
			//$data['products']  = $this->product_model->get();
			$this->load->view('_template/header', $data);
			$this->load->view('invoice/add', $data);
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

		public function add_package(){


			$a = $this->user_permision->check_action_permision('inv_add',$this->session->userdata('fcs_role_id'));


			if($a['inv_add'] == 0){

				redirect(base_url().'error_550');
		     }else{

					$this->load->helper(array('form'));
					$this->load->library('form_validation');
					$this->form_validation->set_rules('customer_id', 'customer', 'required');
					$this->form_validation->set_rules('quotation_date', 'date', 'required');
					$this->form_validation->set_rules('gst', 'GST', 'required');

					$fcs_role_id = $this->session->userdata('fcs_role_id');
					$branch_id = $this->session->userdata('branch_id');

					if($this->form_validation->run() === FALSE) {
						$data['action'] = 'add';
						$data['customers'] = $this->customer_maid_model->get();
						$data['products'] = $this->package_model->get();
						$data['maid_products'] = $this->maid_model->getAvailable();
						$data['insurance_products'] = $this->insurance_package_model->get();
						$data['sale_persons'] = $this->staff_model->get();
						$data['branches'] = $this->branch_model->get();
						$this->load->view('_template/header', $data);
						$this->load->view('invoice_package/add_edit', $data);
						$this->load->view('_template/footer', $data);
					}
					else{
						$quotation_id = $this->invoice_model->add_package();
						$this->session->set_flashdata('msg', '	Invoice Successfully Created');
						$ret = array(
							'status'       => 'success',
							'quotation_id' => $quotation_id,
						);
						echo json_encode($ret);
					}

			}		
	}


public function add_invoice(){


			$a = $this->user_permision->check_action_permision('inv_add',$this->session->userdata('fcs_role_id'));


			if($a['inv_add'] == 0){

				redirect(base_url().'error_550');
		     }else{

					$this->load->helper(array('form'));
					$this->load->library('form_validation');
					$this->form_validation->set_rules('customer_id', 'customer', 'required');
					$this->form_validation->set_rules('branch_id', 'branch', 'required');
					// $this->form_validation->set_rules('date', 'date', 'required');
					$this->form_validation->set_rules('maid_id', 'maid', 'required');
					$this->form_validation->set_rules('staff_id', 'staff', 'required');
					

					$fcs_role_id = $this->session->userdata('fcs_role_id');
					$branch_id = $this->session->userdata('branch_id');

					$m_inv = $this->invoice_model->max_inv_id();
					$data['m_inv'] =  $m_inv['max'] + 1;


					if($this->form_validation->run() === FALSE) {
						
						$data['inv_type'] = $this->invoice_model->get_invoice_type();

						$data['action'] = 'add';
						$data['customers'] = $this->customer_maid_model->get();
						$data['products'] = $this->package_model->get();
						$data['maid_products'] = $this->maid_model->getAvailable();
						$data['insurance_products'] = $this->insurance_package_model->get();
						$data['sale_persons'] = $this->staff_model->get();
						$data['branches'] = $this->branch_model->get();
						$this->load->view('_template/header', $data);
						$this->load->view('invoice_package/add_invoice', $data);
						$this->load->view('_template/footer', $data);
					}
					else{

						 $this->invoice_model->add_invoice_tbl();                  

					 	 $inv_id = $this->input->post('inv_id');
                       	redirect(base_url().'invoice/add_invoice_payment/'. $inv_id);

                     

						// $this->session->set_flashdata('msg', '	Invoice Successfully Created');
						// $ret = array(
						// 	'status'       => 'success',
							// 'quotation_id' => $quotation_id,
						// );
						// echo json_encode($ret);
					}

			}		
	}



public function add_invoice_payment($inv_id){

		if(empty($inv_id)){
			show_404();
		}

		$data['inv_dtl'] = $this->invoice_model->get_single_inv($inv_id);
			if(empty($data['inv_dtl'])){
			show_404();
		}
	

		$data['adhoc_dtl'] = $this->invoice_model->get_adhoc_item($inv_id);
		$data['payment_dtl'] = $this->invoice_model->payment_invoice_dtl($inv_id);
		$data['payment_option'] = $this->invoice_model->payment_option();




		$this->load->view('_template/header', $data);
		$this->load->view('invoice_package/add_invoice_payment', $data);
		$this->load->view('_template/footer', $data);

		

}



public function ins_payment_dtl ($inv_id,$payment_date,$amount,$payment_type,$remark){

	$this->invoice_model->ins_payment_dtl($inv_id,$payment_date,$amount,$payment_type,$remark);
	redirect(base_url().'invoice/add_invoice_payment/'. $inv_id);
}


public function delete_payment($inv_id,$payment_id){
	$this->invoice_model->del_payment_dtl($payment_id);
	redirect(base_url().'invoice/add_invoice_payment/'. $inv_id);
}



	public function jsoncustomer(){

		$data['customer'] =  $this->invoice_model->SelectCustomer();
		$this->load->view('invoice/jsoncustomerdata', $data);	


	}

	public function add_insurance(){
		$this->load->helper(array('form'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('customer_id', 'customer', 'required');
		$this->form_validation->set_rules('quotation_date', 'date', 'required');
		$this->form_validation->set_rules('gst', 'GST', 'required');

		if($this->form_validation->run() === FALSE) {
			$data['action'] = 'add';
			$data['customers'] = $this->customer_maid_model->get();
			$data['products'] = $this->insurance_package_model->get();
			$data['sale_persons'] = $this->staff_model->get();
			
			//$data['sale_persons'] = $this->sale_person_model->get();
			//$data['products']  = $this->product_model->get();
			$this->load->view('_template/header', $data);
			$this->load->view('invoice_insurance/add_edit', $data);
			$this->load->view('_template/footer', $data);
		}
		else{
			$quotation_id = $this->invoice_model->add_insurance();
			$this->session->set_flashdata('msg', '	Invoice Successfully Created');
			$ret = array(
				'status'       => 'success',
				'quotation_id' => $quotation_id,
			);
			echo json_encode($ret);
		}
	}

	public function add_contract(){
		$this->load->helper(array('form'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('customer_id', 'customer', 'required');
		$this->form_validation->set_rules('quotation_date', 'date', 'required');
		$this->form_validation->set_rules('gst', 'GST', 'required');

		if($this->form_validation->run() === FALSE) {
			$data['action'] = 'add';
			$data['customers'] = $this->customer_maid_model->get();
			$data['products'] = $this->contract_model->get();
			$data['sale_persons'] = $this->staff_model->get();
			
			//$data['sale_persons'] = $this->sale_person_model->get();
			//$data['products']  = $this->product_model->get();
			$this->load->view('_template/header', $data);
			$this->load->view('invoice_contract/add_edit', $data);
			$this->load->view('_template/footer', $data);
		}
		else{
			$quotation_id = $this->invoice_model->add_contract();
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
											$datax['maids'] = $this->invoice_model->getIdMaids($id);
												foreach ($datax['maids'] as $maid => $value)
												{
													$idms=$value['maid_id'];
													$this->maid_model->maid_selected($idms);
												}
											$this->invoice_model->unpaid_invoice($id);


			if (round($amount_inc_gst,2)<=0) {

											
			}
			else{
				if (round($payment_total,2)>=round($amount_inc_gst,2)) {
					$this->invoice_model->completed_invoice($id);
					$datax['maids'] = $this->invoice_model->getIdMaids($id);
					$data['customersxxx'] = $this->invoice_model->getIdForCustomer($id);
					$customer_id_for_maid = $data['customersxxx'][0]['customer_id'];
					foreach ($datax['maids'] as $maid => $value)
					{
						$idm=$value['maid_id'];
						$this->maid_model->maid_deploy($idm);
						$this->maid_model->assign_maid($idm,$customer_id_for_maid);
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
	public function view_package($id){
		$data['msg'] = $this->session->flashdata('msg');
		$data['invoice'] = $this->invoice_model->get($id);
		$data['do'] = $this->invoice_model->getDo($id);

		if (empty($data['invoice'])) {
			show_404();
		}
		$data['action'] = 'view';
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('payment_date', 'payment date', 'required');
		$this->form_validation->set_rules('amount', 'amount', 'required|numeric');
		$data['quotation'] = $this->invoice_model->getQuo($id); // to delete or not to delete
		$data['quotation_products'] = $this->invoice_model->get_package_product($id);
		$data['credit_notes'] = $this->credit_note_model->get_credit_note($id);
		$data['debit_notes'] = $this->debit_note_model->get_debit_note($id);
		$data['customers'] = $this->customer_maid_model->get();
		$data['products']  = $this->package_model->get();
		$data['maid_products']  = $this->maid_model->get();
		$data['insurance_products']  = $this->insurance_package_model->get();
		$data['quotation_id']  = $id;
		$data['payments'] = $this->invoice_payment_model->get_invoice_payment($id);
		//$data['payments'] = $data['invoice'][0]['total_amount'];
		//$amount = $data['invoice']['total_amount'];
		$amount = $this->invoice_model->getAmount($id);
		$data['quotation']['total_paid'] = $this->invoice_payment_model->get_payment_total($id);
		$data['quotation']['total_credit'] = $this->credit_note_model->get_cn_total($id);
		$data['quotation']['total_debit'] = $this->debit_note_model->get_dn_total($id);
		if($this->form_validation->run() === FALSE) {

			$data['action'] = 'view';
			$data['customer_info'] = $this->customer_maid_model->get($data['quotation']['customer_id']);
			$this->load->view('_template/header', $data);
			$this->load->view('invoice_package/view', $data);
			$this->load->view('_template/footer', $data);

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

					// $datax['maids'] = $this->invoice_model->getIdMaidsPackage($id);
					// $data['customersxxx'] = $this->invoice_model->getIdForCustomer($id);
					// $customer_id_for_maid = $data['customersxxx'][0]['customer_id'];
					// foreach ($datax['maids'] as $maid => $value)
					// {
					// 	$idm=$value['maid_id'];
					// 	$this->maid_model->maid_deploy($idm);
					// 	$this->maid_model->assign_maid($idm,$customer_id_for_maid);
				
					// }
					
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
		
			redirect(base_url().'invoice/view_package/'.$id);
			}
		
	}

	public function view_insurance($id){
		$data['msg'] = $this->session->flashdata('msg');
		$data['invoice'] = $this->invoice_model->get($id);
		$data['do'] = $this->invoice_model->getDo($id);

		if (empty($data['invoice'])) {
			show_404();
		}
		$data['action'] = 'view';
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('payment_date', 'payment date', 'required');
		$this->form_validation->set_rules('amount', 'amount', 'required|numeric');
		$data['quotation'] = $this->invoice_model->getQuo($id); // to delete or not to delete
		$data['quotation_products'] = $this->invoice_model->get_insurance_product($id);
		$data['credit_notes'] = $this->credit_note_model->get_credit_note($id);
		$data['debit_notes'] = $this->debit_note_model->get_debit_note($id);
		$data['customers'] = $this->customer_maid_model->get();
		$data['products']  = $this->insurance_package_model->get();
		$data['quotation_id']  = $id;
		$data['payments'] = $this->invoice_payment_model->get_invoice_payment($id);
		//$data['payments'] = $data['invoice'][0]['total_amount'];
		//$amount = $data['invoice']['total_amount'];
		$amount = $this->invoice_model->getAmount($id);
		$data['quotation']['total_paid'] = $this->invoice_payment_model->get_payment_total($id);
		$data['quotation']['total_credit'] = $this->credit_note_model->get_cn_total($id);
		$data['quotation']['total_debit'] = $this->debit_note_model->get_dn_total($id);
		if($this->form_validation->run() === FALSE) {

			$data['action'] = 'view';
			$data['customer_info'] = $this->customer_maid_model->get($data['quotation']['customer_id']);
			$this->load->view('_template/header', $data);
			$this->load->view('invoice_insurance/view', $data);
			$this->load->view('_template/footer', $data);

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
		
			redirect(base_url().'invoice/view_package/'.$id);
			}
		
	}


	public function view_contract($id){
		$data['msg'] = $this->session->flashdata('msg');
		$data['invoice'] = $this->invoice_model->get($id);
		$data['do'] = $this->invoice_model->getDo($id);

		if (empty($data['invoice'])) {
			show_404();
		}
		$data['action'] = 'view';
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('payment_date', 'payment date', 'required');
		$this->form_validation->set_rules('amount', 'amount', 'required|numeric');
		$data['quotation'] = $this->invoice_model->getQuo($id); // to delete or not to delete
		$data['quotation_products'] = $this->invoice_model->get_contract_product($id);
		$data['credit_notes'] = $this->credit_note_model->get_credit_note($id);
		$data['debit_notes'] = $this->debit_note_model->get_debit_note($id);
		$data['customers'] = $this->customer_maid_model->get();
		$data['products']  = $this->contract_model->get();
		$data['quotation_id']  = $id;
		$data['payments'] = $this->invoice_payment_model->get_invoice_payment($id);
		//$data['payments'] = $data['invoice'][0]['total_amount'];
		//$amount = $data['invoice']['total_amount'];
		$amount = $this->invoice_model->getAmount($id);
		$data['quotation']['total_paid'] = $this->invoice_payment_model->get_payment_total($id);
		$data['quotation']['total_credit'] = $this->credit_note_model->get_cn_total($id);
		$data['quotation']['total_debit'] = $this->debit_note_model->get_dn_total($id);
		if($this->form_validation->run() === FALSE) {

			$data['action'] = 'view';
			$data['customer_info'] = $this->customer_maid_model->get($data['quotation']['customer_id']);
			$this->load->view('_template/header', $data);
			$this->load->view('invoice_contract/view', $data);
			$this->load->view('_template/footer', $data);

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
		
			redirect(base_url().'invoice/view_contract/'.$id);
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
			$data['products'] = $this->maid_model->getAvailable();
			$data['quotation_products'] = $this->invoice_model->get_quotation_product($id);
			$data['quotation_id']  = $id;
			$data['packages'] = $this->package_model->get();
			$data['insurances'] = $this->insurance_package_model->get();
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

	public function edit_package($id){

			$a = $this->user_permision->check_action_permision('inv_edit',$this->session->userdata('fcs_role_id'));


			if($a['inv_edit'] == 0){

				redirect(base_url().'error_550');
		     }else{

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
					$data['products'] = $this->package_model->get();
					$data['maid_products'] = $this->maid_model->get();
					$data['insurance_products'] = $this->insurance_package_model->get();
					$data['quotation_products'] = $this->invoice_model->get_package_product($id);
					$data['quotation_id']  = $id;
					$data['branches'] = $this->branch_model->get();
					$this->load->view('_template/header', $data);
					$this->load->view('invoice_package/add_edit', $data);
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
	}

	public function edit_insurance($id){
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
			$data['products'] = $this->insurance_package_model->get();
			$data['quotation_products'] = $this->invoice_model->get_insurance_product($id);
			$data['quotation_id']  = $id;
			$this->load->view('_template/header', $data);
			$this->load->view('invoice_insurance/add_edit', $data);
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

	public function edit_contract($id){
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
			$data['products'] = $this->contract_model->get();
			$data['quotation_products'] = $this->invoice_model->get_contract_product($id);
			$data['quotation_id']  = $id;
			$this->load->view('_template/header', $data);
			$this->load->view('invoice_contract/add_edit', $data);
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

			$a = $this->user_permision->check_action_permision('inv_del',$this->session->userdata('fcs_role_id'));


			if($a['inv_del'] == 0){

				redirect(base_url().'error_550');

		     }else{
				if ($id=="") {
					show_404();
				}
				$this->invoice_model->delete($id);	
				$this->session->set_flashdata('msg', 'Invoice successfully deleted');
				redirect(base_url().'invoice');

			}
	}

	public function aj_get_product_details($id) {
		$qp_details = $this->invoice_model->get_product_details($id);
		$qp_details['status'] = 'success';
		echo json_encode($qp_details);
	}

	public function aj_get_package_details($id) {
		$qp_details = $this->invoice_model->get_package_details($id);
		$qp_details['status'] = 'success';
		echo json_encode($qp_details);
	}

	public function aj_get_contract_details($id) {
		$qp_details = $this->invoice_model->get_contract_details($id);
		$qp_details['status'] = 'success';
		echo json_encode($qp_details);
	}

	public function aj_get_insurance_details($id) {
		$qp_details = $this->invoice_model->get_insurance_details($id);
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

	public function aj_add_package_details(){
		$qp_id = $this->invoice_model->add_package_product();
		$ret = array(
			'status' 	=> 'success',
			'qp_id'	=> $qp_id,
		);
		echo json_encode($ret);
	}

	public function aj_add_insurance_details(){
		$qp_id = $this->invoice_model->add_insurance_product();
		$ret = array(
			'status' 	=> 'success',
			'qp_id'	=> $qp_id,
		);
		echo json_encode($ret);
	}

	public function aj_add_contract_details(){
		$qp_id = $this->invoice_model->add_contract_product();
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

	public function aj_remove_package_product($id) {
		$this->invoice_model->remove_package_product($id);
		$ret = array(
			'status' 	=> 'success',
		);
		echo json_encode($ret);
	}

	public function aj_remove_insurance_product($id) {
		$this->invoice_model->remove_insurance_product($id);
		$ret = array(
			'status' 	=> 'success',
		);
		echo json_encode($ret);
	}

	public function aj_remove_contract_product($id) {
		$this->invoice_model->remove_contract_product($id);
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
	public function aj_edit_package_details($id){
		$this->invoice_model->update_package_product($id);
		$ret = array(
			'status' 	=> 'success',
		);
		echo json_encode($ret);
	}
	public function aj_edit_contract_details($id){
		$this->invoice_model->update_contract_product($id);
		$ret = array(
			'status' 	=> 'success',
		);
		echo json_encode($ret);
	}
	public function aj_edit_insurance_details($id){
		$this->invoice_model->update_insurance_product($id);
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
		$quotations = $this->invoice_model->get_all_invoice();
		$quo_export =  array();
		$no = 1;
		$total = 0; $total_paid = 0; $total_outstand = 0;
		foreach($quotations as $r) {     
			$quo_export[] = array(
				'No.'		        => $no,	
				'Invoice No.'		=> $r->inv_code,
				'Employer'			=> $r->customer_name,
				'Maid Name' 		=> $r->maid_name,
				'Date' 				=> $r->date,
				'Total Amount'		=> $r->total_placement_fee,
				'GST'				=> '7%',
				'Total GST'			=> $r->total_placement_fee * 0.07,
				'Total Inc GST'		=> $r->total_inc_gst,				
                'Payment Terms'     => $r->payment,
                'Issued By'         => $r->issued_by,
				'Remark'			=> $r->remark,
				'Internal Remark'	=> $r->internal_remark,
			);
			$total += $r->total_inc_gst;
			$no++;
		}
		$quo_export[] = array(
				'No.'		        => '',	
				'Invoice No.'		=>'',
				'Employer'			=> '',
				'Maid Name' 		=> '',
				'Date' 				=> '',
				'Total Amount'		=> '',
				'GST'				=> '',
				'Total GST'			=> 'TOTAL',
				'Total Inc GST'		=> $total,				
                'Payment Terms'     => '',
                'Issued By'         => '',
				'Remark'			=> '',
				'Internal Remark'	=> '',

				
		);
		$this->excel->export($quo_export, "Invoice_Report(" . date('d-m-Y', time()) . ").xls");	
	}




public function edit_invoice($inv_id){


		

					$this->load->helper(array('form'));
					$this->load->library('form_validation');
					$this->form_validation->set_rules('customer_id', 'customer', 'required');
					$this->form_validation->set_rules('branch_id', 'branch', 'required');					
					$this->form_validation->set_rules('maid_id', 'maid', 'required');
					$this->form_validation->set_rules('staff_id', 'staff', 'required');
					

					$fcs_role_id = $this->session->userdata('fcs_role_id');
					$branch_id = $this->session->userdata('branch_id');

					// $m_inv = $this->invoice_model->max_inv_id();
					// $data['m_inv'] =  $m_inv['max'] + 1;
					$data['inv_dtl'] = $this->invoice_model->get_single_inv($inv_id);
					$data['adhoc_item'] = $this->invoice_model->get_adhoc_item($inv_id);
						if (empty($data['inv_dtl'])) {
							show_404();
						}

					if($this->form_validation->run() === FALSE) {
						
						
						$data['inv_type'] = $this->invoice_model->get_invoice_type();
						$data['action'] = '';
						$data['customers'] = $this->customer_maid_model->get();
						$data['products'] = $this->package_model->get();
						$data['maid_products'] = $this->maid_model->getAvailable();
						$data['insurance_products'] = $this->insurance_package_model->get();
						$data['sale_persons'] = $this->staff_model->get();
						$data['branches'] = $this->branch_model->get();
						$this->load->view('_template/header', $data);
						$this->load->view('invoice_package/edit_invoice', $data);
						$this->load->view('_template/footer', $data);
					}
					else{

						 $this->invoice_model->edit_invoice_tbl($inv_id);                  

					 	 // $inv_id = $this->input->post('inv_id');
                       	redirect(base_url().'invoice/add_invoice_payment/'. $inv_id);

                     

						// $this->session->set_flashdata('msg', '	Invoice Successfully Created');
						// $ret = array(
						// 	'status'       => 'success',
							// 'quotation_id' => $quotation_id,
						// );
						// echo json_encode($ret);
					}

			
	}


public function delete_adhoc($id){

	   if($this->invoice_model->del_adhoc_item($id)){
	   		echo "Successfuly Deleted";
	   }
}


public function maid_total_bal_fee ($maid_id){
		$a = $this->maid_model->get_maid_dep_loan($maid_id);
		$maid_loan = 0;
		if($a){
			foreach($a as $r){
				$maid_loan = $r->total_bal_amount;
			}
		}

		echo $maid_loan;
}








}