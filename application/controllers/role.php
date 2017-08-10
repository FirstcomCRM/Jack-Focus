<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class role extends CI_Controller {

	
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

		$this->load->model('role_model');
	}

	public function index() {
		$data['msg'] = $this->session->flashdata('msg');
		$b_url = base_url().'role/index';
		$t_rows = $this->role_model->count();
		$pageConfig = create_pagination_config( $b_url, $t_rows, 10, 3);
		$this->pagination->initialize($pageConfig);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		
		$data['roles'] = $this->role_model->fetch($pageConfig['per_page'], $page);
		$data['links'] = $this->pagination->create_links();

		$current_page =  floor(($this->uri->segment(3) / $pageConfig['per_page']) + 1);
		$data['pagination_msg'] = create_pagination_msg($current_page, $pageConfig['per_page'], $t_rows);

		$this->load->view('_template/header', $data);
        $this->load->view('role/index', $data);
        $this->load->view('_template/footer', $data);
	}
	public function add(){
		$this->load->helper(array('form'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('role_name', 'role name', 'required|callback_check_add_role_name');

		if($this->form_validation->run() === FALSE) {
			$data['action'] = 'add';
			$this->load->view('_template/header', $data);
			$this->load->view('role/add_edit', $data);
			$this->load->view('_template/footer', $data);
		}
		else{
			$this->role_model->add();
			$this->session->set_flashdata('msg', 'New role successfully created');
			redirect(base_url().'role');
		}
	}

	public function check_add_role_name(){
		$role_name = $this->input->post('role_name');

        $result = $this->role_model->role_name_exist($role_name);
        if($result){
	        $this->form_validation->set_message('check_add_role_name', 'This role name already exist');
	        return false;
        }
        return true;
	}

	public function edit($id){
		$data['role'] = $this->role_model->get($id);
		if (empty($data['role'])) {
			show_404();
		}
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('role_name', 'category', 'required|callback_check_edit_role_name['.$id.']');

		if($this->form_validation->run() === FALSE) {
			$data['action'] = 'edit';
			$this->load->view('_template/header', $data);
			$this->load->view('role/add_edit', $data);
			$this->load->view('_template/footer', $data);	
		}
		else {
			$this->role_model->update($id);
			$this->session->set_flashdata('msg', 'Role successfully updated');
			redirect(base_url().'role');
		}
	}
	public function check_edit_role_name($str, $id){
		$role_name = $this->input->post('role_name');
        $result = $this->role_model->role_name_exist($role_name, $id);
        if($result){
	        $this->form_validation->set_message('check_edit_role_name', 'This role name already exist');
	        return false;
        }
        return true;
	}

	public function delete($id="") {
		if ($id=="") {
			show_404();
		}
		$this->role_model->delete($id);	
		$this->session->set_flashdata('msg', 'Role successfully deleted');
		redirect(base_url().'role');
	}
}