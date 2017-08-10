<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class maid_record extends CI_Controller {

	
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
		$this->load->model('customer_maid_model');
	}

	public function index() {
		$data['msg'] = $this->session->flashdata('msg');
		$b_url = base_url().'customer_maid/maid_record';
		$t_rows = $this->customer_maid_model->count_maid_record();
		$pageConfig = create_pagination_config( $b_url, $t_rows, 10, 3);
		$this->pagination->initialize($pageConfig);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		
		$data['customers_and_maids'] = $this->customer_maid_model->fetch_maid_record($pageConfig['per_page'], $page);
		$data['links'] = $this->pagination->create_links();

		$current_page =  floor(($this->uri->segment(3) / $pageConfig['per_page']) + 1);
		$data['pagination_msg'] = create_pagination_msg($current_page, $pageConfig['per_page'], $t_rows);

		$this->load->view('_template/header', $data);
        $this->load->view('customer_maid/customer_maid_records', $data);
        $this->load->view('_template/footer', $data);
	}
	
}