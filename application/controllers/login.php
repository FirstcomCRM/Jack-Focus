<?php
class login extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('staff_model');
		
		if( $this->session->userdata('fcs_validate_user') ) {
			redirect(base_url().'dashboard');
		}
	}


	public function index() {

	
			$this->load->helper('form');
			$this->load->library('form_validation');
			$data = '';
			$this->form_validation->set_rules('username', 'Username', 'required|callback_check_user_username');
			$this->form_validation->set_rules('password', 'Password', 'required|callback_check_user_password');
			if ($this->form_validation->run() === FALSE) {
	            $this->load->view('login', $data);
			}
			else {
	              redirect(base_url().'dashboard');
			}

		
	}
	public function check_user_username() {
		$username = $this->security->xss_clean($this->input->post('username'));

        $result = $this->user_model->username_exist($username);
        $result2 = $this->staff_model->username_exist($username);
        if($result){
        	return true;

        }else if($result2){
        	return true;

        }
        $this->form_validation->set_message('check_user_username', 'Account does not exist');
        return false;
	}

	public function check_user_password() {
        $username = $this->security->xss_clean($this->input->post('username'));
        $password = $this->security->xss_clean($this->input->post('password'));
        $result = $this->user_model->login($username, $password);
        $result2 = $this->staff_model->login($username, $password);
      
        if($result){
        	return true;
        }else if($result2){
        	return true;
        }


        $this->form_validation->set_message('check_user_password', 'Password is not correct');
        return false;
	}

}