<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class sale_person extends CI_Controller {

	
	function __construct() {
		parent::__construct();
		is_login();
		$controller = ucfirst($this->router->class);
		// $role_id = $this->session->userdata('fcs_role_id');
		// $method = $this->router->fetch_method();
		// $get_perm = check_permission($role_id,$controller,$method);
		// if($get_perm == 0)
		// {
		// 	redirect(base_url().'error_403');
		// }
		$this->load->model('sale_person_model');
	}

	public function index() {
		$data['msg'] = $this->session->flashdata('msg');
		$b_url = base_url().'sale_person/index';
		$t_rows = $this->sale_person_model->count();
		$pageConfig = create_pagination_config( $b_url, $t_rows, 10, 3);
		$this->pagination->initialize($pageConfig);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		
		$data['sale_persons'] = $this->sale_person_model->fetch($pageConfig['per_page'], $page);
		$data['links'] = $this->pagination->create_links();

		$current_page =  floor(($this->uri->segment(3) / $pageConfig['per_page']) + 1);
		$data['pagination_msg'] = create_pagination_msg($current_page, $pageConfig['per_page'], $t_rows);

		$this->load->view('_template/header', $data);
        $this->load->view('sale_person/index', $data);
        $this->load->view('_template/footer', $data);
	}
	public function add(){
		$this->load->helper(array('form'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'name', 'required|callback_check_add_name');

		if($this->form_validation->run() === FALSE) {
			$data['action'] = 'add';
			$this->load->view('_template/header', $data);
			$this->load->view('sale_person/add_edit', $data);
			$this->load->view('_template/footer', $data);
		}
		else{
			$this->sale_person_model->add();
			$this->session->set_flashdata('msg', 'New sale person successfully created');
			redirect(base_url().'sale_person');
		}
	}

	public function check_add_name(){
		$name = $this->input->post('name');

        $result = $this->sale_person_model->name_exist($name);
        if($result){
	        $this->form_validation->set_message('check_add_name', 'This sale person already exist');
	        return false;
        }
        return true;
	}

	public function edit($id){
		$data['sale_person'] = $this->sale_person_model->get($id);
		if (empty($data['sale_person'])) {
			show_404();
		}
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('name', 'category', 'required|callback_check_edit_name['.$id.']');

		if($this->form_validation->run() === FALSE) {
			$data['action'] = 'edit';
			$this->load->view('_template/header', $data);
			$this->load->view('sale_person/add_edit', $data);
			$this->load->view('_template/footer', $data);	
		}
		else {
			$this->sale_person_model->update($id);
			$this->session->set_flashdata('msg', 'sale person successfully updated');
			redirect(base_url().'sale_person');
		}
	}
	public function check_edit_name($str, $id){
		$name = $this->input->post('name');
        $result = $this->sale_person_model->name_exist($name, $id);
        if($result){
	        $this->form_validation->set_message('check_edit_name', 'This sale person already exist');
	        return false;
        }
        return true;
	}

	public function delete($id="") {
		if ($id=="") {
			show_404();
		}
		$this->sale_person_model->delete($id);	
		$this->session->set_flashdata('msg', 'Sale person successfully deleted');
		redirect(base_url().'sale_person');
	}
}