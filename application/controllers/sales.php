<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class sales extends CI_Controller {

	
	function __construct() {
		parent::__construct();
		is_login();
		//$controller = ucfirst($this->router->class);
		//$role_id = $this->session->userdata('fcs_role_id');
		//$method = $this->router->fetch_method();
		//$get_perm = check_permission($role_id,$controller,$method);
		//if($get_perm == 0)
		//{
		//	redirect(base_url().'error_403');
		//}
		$this->load->model('sales_model');
		$this->load->model('user_permision');
		$this->load->library('session');
	}

	public function index() {

			$a = $this->user_permision->check_action_permision('sales_view',$this->session->userdata('fcs_user_id'));


			if($a['sales_view'] == 0){

				redirect(base_url().'error_550');
		     }else{


				$data['msg'] = $this->session->flashdata('msg');
				$b_url = base_url().'sales/index';
				$t_rows = $this->sales_model->count();
				$pageConfig = create_pagination_config( $b_url, $t_rows, 10, 3);
				$this->pagination->initialize($pageConfig);
				$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
				
				$data['salesx'] = $this->sales_model->fetch($pageConfig['per_page'], $page);
				$data['links'] = $this->pagination->create_links();

				$current_page =  floor(($this->uri->segment(3) / $pageConfig['per_page']) + 1);
				$data['pagination_msg'] = create_pagination_msg($current_page, $pageConfig['per_page'], $t_rows);

				$this->load->view('_template/header', $data);
		        $this->load->view('sales/index', $data);
		        $this->load->view('_template/footer', $data);

		    }
	}
	public function add(){
		$this->load->helper(array('form'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('customer_name', 'customer_name', 'required|callback_check_add_company_name');

		if($this->form_validation->run() === FALSE) {
			$data['action'] = 'add';
			$this->load->view('_template/header', $data);
			$this->load->view('sales/add_edit', $data);
			$this->load->view('_template/footer', $data);
		}
		else{
			$this->sales_model->add();
			$this->session->set_flashdata('msg', 'New daily sale successfully created');
			redirect(base_url().'sales');
		}
	}

	public function check_add_company_name(){
		$customer_name = $this->input->post('customer_name');

        $result = $this->sales_model->company_name_exist($customer_name);
        if($result){
	        $this->form_validation->set_message('check_add_company_name', 'This insurance name already exist');
	        return false;
        }
        return true;
	}

	public function edit($id){
		$data['sales'] = $this->insurance_package_model->get($id);
		if (empty($data['sales'])) {
			show_404();
		}
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('customer_name', 'customer_name', 'required|callback_check_edit_company_name['.$id.']');

		if($this->form_validation->run() === FALSE) {
			$data['action'] = 'edit';
			$this->load->view('_template/header', $data);
			$this->load->view('sales/add_edit', $data);
			$this->load->view('_template/footer', $data);	
		}
		else {
			$this->sales_model->update($id);
			$this->session->set_flashdata('msg', 'Sales successfully updated');
			redirect(base_url().'sales');
		}
	}
	public function check_edit_company_name($str, $id){
		$customer_name = $this->input->post('customername');
        $result = $this->sales_model->company_name_exist($customer_name, $id);
        if($result){
	        $this->form_validation->set_message('check_edit_company_name', 'This daily sale already exist');
	        return false;
        }
        return true;
	}

	public function delete($id="") {
		if ($id=="") {
			show_404();
		}
		$this->insurance_package_model->delete($id);	
		$this->session->set_flashdata('msg', 'Daily sale deleted');
		redirect(base_url().'sales');
	}
}