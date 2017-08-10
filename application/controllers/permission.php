<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class permission extends CI_Controller {

	
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
		$this->load->model('permission_model');
		$this->load->model('role_model');
		$this->load->library('Directoryinfo');
	}

	public function index() {
		$data['msg'] = $this->session->flashdata('msg');
		$b_url = base_url().'permission/index';
		$t_rows = $this->permission_model->count();
		$pageConfig = create_pagination_config( $b_url, $t_rows, 10, 3);
		$this->pagination->initialize($pageConfig);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		
		$data['permissions'] = $this->permission_model->fetch($pageConfig['per_page'], $page);
		$data['links'] = $this->pagination->create_links();

		$current_page =  floor(($this->uri->segment(3) / $pageConfig['per_page']) + 1);
		$data['pagination_msg'] = create_pagination_msg($current_page, $pageConfig['per_page'], $t_rows);

		$data['roles'] = $this->role_model->get();
		$this->load->view('_template/header', $data);
        $this->load->view('permission/index', $data);
        $this->load->view('_template/footer', $data);
	}
	public function add(){
		$this->load->helper(array('form'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('role_id', 'Role', 'required');

		$data['roles'] = $this->role_model->get();
		$data['all_controller']  = $this->directoryinfo->readDirectory(APPPATH.'controllers/',true);
		if($this->form_validation->run() === FALSE) {
			$data['action'] = 'add';
			$this->load->view('_template/header', $data);
			$this->load->view('permission/add_edit', $data);
			$this->load->view('_template/footer', $data);
		}
		else{
			$this->permission_model->delete_with_role();
			$this->permission_model->add();
			$this->session->set_flashdata('msg', 'New permission successfully created');
			redirect(base_url().'permission');
		}
	}

	public function edit($id){
		$data['permission'] = $this->permission_model->get($id);
		if (empty($data['permission'])) {
			show_404();
		}
		$data['permissions'] = $this->permission_model->permission_with_role($data['permission']['role_id']);
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('role_id', 'Role', 'required');

		$data['roles'] = $this->role_model->get();
		$data['all_controller']  = $this->directoryinfo->readDirectory(APPPATH.'controllers/',true);
		if($this->form_validation->run() === FALSE) {
			$data['action'] = 'edit';
			$this->load->view('_template/header', $data);
			$this->load->view('permission/add_edit', $data);
			$this->load->view('_template/footer', $data);	
		}
		else {
			$this->permission_model->delete_with_role();
			$this->permission_model->add();
			$this->session->set_flashdata('msg', 'Permission successfully updated');
			redirect(base_url().'permission');
		}
	}
	public function check_edit_permission_name($str, $id){
		$permission_name = $this->input->post('permission_name');
        $result = $this->permission_model->permission_name_exist($permission_name, $id);
        if($result){
	        $this->form_validation->set_message('check_edit_permission_name', 'This permission name already exist');
	        return false;
        }
        return true;
	}

	public function delete($id="") {
		if ($id=="") {
			show_404();
		}
		$this->permission_model->delete($id);	
		$this->session->set_flashdata('msg', 'permission successfully deleted');
		redirect(base_url().'permission');
	}
}