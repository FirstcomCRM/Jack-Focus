<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class partner extends CI_Controller {

	
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
		$this->load->model('partner_model');
	}

	public function index() {
		$data['msg'] = $this->session->flashdata('msg');
		$b_url = base_url().'partner/index';
		$t_rows = $this->partner_model->count();
		$pageConfig = create_pagination_config( $b_url, $t_rows, 10, 3);
		$this->pagination->initialize($pageConfig);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		
		$data['partners'] = $this->partner_model->fetch($pageConfig['per_page'], $page);
		$data['links'] = $this->pagination->create_links();

		$current_page =  floor(($this->uri->segment(3) / $pageConfig['per_page']) + 1);
		$data['pagination_msg'] = create_pagination_msg($current_page, $pageConfig['per_page'], $t_rows);

		$this->load->view('_template/header', $data);
        $this->load->view('partner/index', $data);
        $this->load->view('_template/footer', $data);
	}
	public function add(){
		$this->load->helper(array('form'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('partner_name', 'partner_name', 'required|callback_check_add_company_name');

		if($this->form_validation->run() === FALSE) {
			$data['action'] = 'add';
			$this->load->view('_template/header', $data);
			$this->load->view('partner/add_edit', $data);
			$this->load->view('_template/footer', $data);
		}
		else{
			$this->partner_model->add();
			$this->session->set_flashdata('msg', 'New Business partner successfully added');
			redirect(base_url().'contract');
		}
	}

	public function check_add_company_name(){
		$partner_name = $this->input->post('partner_name');

        $result = $this->partner_model->company_name_exist($partner_name);
        if($result){
	        $this->form_validation->set_message('check_add_company_name', 'This contract name already exist');
	        return false;
        }
        return true;
	}

	public function edit($id){
		$data['partner'] = $this->partner_model->get($id);
		if (empty($data['partner'])) {
			show_404();
		}
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('partner_name', 'category', 'required|callback_check_edit_company_name['.$id.']');

		if($this->form_validation->run() === FALSE) {
			$data['action'] = 'edit';
			$this->load->view('_template/header', $data);
			$this->load->view('partner/add_edit', $data);
			$this->load->view('_template/footer', $data);	
		}
		else {
			$this->partner_model->update($id);
			$this->session->set_flashdata('msg', 'Bsiness partner successfully updated');
			redirect(base_url().'partner');
		}
	}
	public function check_edit_company_name($str, $id){
		$partner_name = $this->input->post('partner_name');
        $result = $this->partner_model->company_name_exist($partner_name, $id);
        if($result){
	        $this->form_validation->set_message('check_edit_company_name', 'This Business partner name already exist');
	        return false;
        }
        return true;
	}

	public function delete($id="") {
		if ($id=="") {
			show_404();
		}
		$this->partner_model->delete($id);	
		$this->session->set_flashdata('msg', 'Business partner record successfully deleted');
		redirect(base_url().'partner');
	}





}