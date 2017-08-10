<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class users extends CI_Controller {

	
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
		$this->load->model('user_model');
		$this->load->model('role_model');
	}

	public function index() {
		$data['msg'] = $this->session->flashdata('msg');
		$b_url = base_url().'user/index';
		$t_rows = $this->user_model->count();
		$pageConfig = create_pagination_config( $b_url, $t_rows, 10, 3);
		$this->pagination->initialize($pageConfig);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		
		$data['users'] = $this->user_model->fetch($pageConfig['per_page'], $page);
		$data['links'] = $this->pagination->create_links();

		$current_page =  floor(($this->uri->segment(3) / $pageConfig['per_page']) + 1);
		$data['pagination_msg'] = create_pagination_msg($current_page, $pageConfig['per_page'], $t_rows);

		$data['roles'] = $this->role_model->get();
		$this->load->view('_template/header', $data);
        $this->load->view('user/index', $data);
        $this->load->view('_template/footer', $data);
	}
	public function add(){
		$this->load->helper(array('form'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'username', 'required|callback_check_add_username');
		$this->form_validation->set_rules('password', 'password', 'required');
		$this->form_validation->set_rules('confirm_password', 'confirm Password', 'required|callback_check_confirm_password');
		$this->form_validation->set_rules('role_id', 'role', 'required');

		if($this->form_validation->run() === FALSE) {
			$data['action'] = 'add';
			$data['roles'] = $this->role_model->get();
			$this->load->view('_template/header', $data);
			$this->load->view('user/add_edit', $data);
			$this->load->view('_template/footer', $data);
		}
		else{
			$this->user_model->add();
			$this->session->set_flashdata('msg', 'New user successfully created');
			redirect(base_url().'users');
		}
	}

	public function check_add_username(){
		$username = $this->input->post('username');

        $result = $this->user_model->username_exist($username);
        if($result){
	        $this->form_validation->set_message('check_add_username', 'This username already exist');
	        return false;
        }
        return true;
	}

	public function edit($id){
		$data['user'] = $this->user_model->get($id);
		if (empty($data['user'])) {
			show_404();
		}
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'username', 'required|callback_check_edit_username['.$id.']');
		$this->form_validation->set_rules('password', 'password', 'required');
		$this->form_validation->set_rules('confirm_password', 'confirm Password', 'required|callback_check_confirm_password');
		$this->form_validation->set_rules('role_id', 'role', 'required');

		if($this->form_validation->run() === FALSE) {
			$data['action'] = 'edit';
			$data['roles'] = $this->role_model->get();
			$this->load->view('_template/header', $data);
			$this->load->view('user/add_edit', $data);
			$this->load->view('_template/footer', $data);	
		}
		else {
			$this->user_model->update($id);
			$this->session->set_flashdata('msg', 'User successfully updated');
			redirect(base_url().'users');
		}
	}

	public function check_edit_username($str, $id){
		$username = $this->input->post('username');
        $result = $this->user_model->username_exist($username, $id);
        if($result){
	        $this->form_validation->set_message('check_edit_username', 'This username already exist');
	        return false;
        }
        return true;
	}

	public function check_confirm_password(){
		$new_password = $this->security->xss_clean($this->input->post('password'));
		$confirm_password = $this->security->xss_clean($this->input->post('confirm_password'));

		if ($new_password == $confirm_password) {
			return true;
		}
		$this->form_validation->set_message('check_confirm_password', 'Your new password and confirm password do not match.');
        return false;
	}

	public function delete($id="") {
		if ($id=="") {
			show_404();
		}
		$this->user_model->delete($id);	
		$this->session->set_flashdata('msg', 'User successfully deleted');
		redirect(base_url().'users');
	}
}