<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class staff extends CI_Controller {

	
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
		$this->load->model('staff_model');
		$this->load->model('role_staff_maid_model');
		$this->load->model('branch_model');
		$this->load->model('supplier_model');
		$this->load->model('user_permision');
		$this->load->library('session');
	}

	public function index() {

			$a = $this->user_permision->check_action_permision('staff_view',$this->session->userdata('fcs_user_id'));


			if($a['staff_view'] == 0){

				redirect(base_url().'error_550');
		     }else{

					$data['msg'] = $this->session->flashdata('msg');
					$b_url = base_url().'staff/index';
					$t_rows = $this->staff_model->count();
					$pageConfig = create_pagination_config( $b_url, $t_rows, 10, 3);
					$this->pagination->initialize($pageConfig);
					$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
					
					$data['staffx'] = $this->staff_model->fetch($pageConfig['per_page'], $page);
					$data['links'] = $this->pagination->create_links();

					$current_page =  floor(($this->uri->segment(3) / $pageConfig['per_page']) + 1);
					$data['pagination_msg'] = create_pagination_msg($current_page, $pageConfig['per_page'], $t_rows);

					$this->load->view('_template/header', $data);
			        $this->load->view('staff/index', $data);
			        $this->load->view('_template/footer', $data);

			}        
	}
	public function add(){



			$a = $this->user_permision->check_action_permision('staff_add',$this->session->userdata('fcs_user_id'));


			if($a['staff_add'] == 0){

				redirect(base_url().'error_550');
		     }else{

				$this->load->helper(array('form'));
				$this->load->library('form_validation');
				$this->form_validation->set_rules('staff_name', 'staff_name', 'required|callback_check_add_company_name');
				$this->form_validation->set_rules('staff_username', 'staff_username', 'required|callback_check_add_username');
				$this->form_validation->set_rules('staff_password', 'staff_password', 'required');
				$this->form_validation->set_rules('confirm_password', 'confirm Password', 'required|callback_check_confirm_password');
				//$this->form_validation->set_rules('role_id', 'role_id', 'required');

				if($this->form_validation->run() === FALSE) {
					$data['roles'] = $this->role_staff_maid_model->get();
					$data['branches'] = $this->branch_model->get();
					$data['suppliers'] = $this->supplier_model->get();
					$data['action'] = 'add';
					$this->load->view('_template/header', $data);
					$this->load->view('staff/add_edit', $data);
					$this->load->view('_template/footer', $data);
				}
				else{	
					$a = $this->staff_model->add();

					if($a){

						$a = $this->staff_model->add_permission($a,$this->input->post('role_id'));
						$this->session->set_flashdata('msg', 'New staff successfully created');
						redirect(base_url().'staff');
					}	

					
				}

			}

	}

	public function check_confirm_password(){
		$new_password = $this->security->xss_clean($this->input->post('staff_password'));
		$confirm_password = $this->security->xss_clean($this->input->post('confirm_password'));

		if ($new_password == $confirm_password) {
			return true;
		}
		$this->form_validation->set_message('check_confirm_password', 'Your new password and confirm password do not match.');
        return false;
	}

	public function check_add_company_name(){
		$staff_name = $this->input->post('staff_name');

        $result = $this->staff_model->company_name_exist($staff_name);
        if($result){
	        $this->form_validation->set_message('check_add_company_name', 'This company name already exist');
	        return false;
        }
        return true;
	}

	

	public function edit($id){

			$a = $this->user_permision->check_action_permision('staff_edit',$this->session->userdata('fcs_user_id'));


			if($a['staff_edit'] == 0){

				redirect(base_url().'error_550');
		     }else{

				$data['staff'] = $this->staff_model->get($id);
				if (empty($data['staff'])) {
					show_404();
				}
				$this->load->helper('form');
				$this->load->library('form_validation');

				$this->form_validation->set_rules('staff_username', 'staff_username', 'required|callback_check_edit_username['.$id.']');
				$this->form_validation->set_rules('staff_password', 'staff_password', 'required');
				$this->form_validation->set_rules('confirm_password', 'confirm Password', 'required|callback_check_confirm_password');
				$this->form_validation->set_rules('role_id', 'role_title', 'required');


				if($this->form_validation->run() === FALSE) {
					$data['roles'] = $this->role_staff_maid_model->get();
					$data['branches'] = $this->branch_model->get();
					$data['suppliers'] = $this->supplier_model->get();
					$data['action'] = 'edit';
					$this->load->view('_template/header', $data);
					$this->load->view('staff/add_edit', $data);
					$this->load->view('_template/footer', $data);	
				}else {
					$this->staff_model->update($id);
					$this->session->set_flashdata('msg', 'Staff successfully updated');
					redirect(base_url().'staff');
				}

			}	


	}

	public function check_edit_username($str, $id){
		$username = $this->input->post('staff_username');
        $result = $this->staff_model->username_exist($username, $id);
        if($result){
	        $this->form_validation->set_message('check_edit_username', 'This username already exist');
	        return false;
        }
        return true;
	}
	public function check_edit_company_name($str, $id){
		$staff_name = $this->input->post('staff_name');
        $result = $this->staff_model->company_name_exist($staff_name, $id);
        if($result){
	        $this->form_validation->set_message('check_edit_company_name', 'This staff name already exist');
	        return false;
        }
        return true;
	}

	public function delete($id="") {

			$a = $this->user_permision->check_action_permision('staff_del',$this->session->userdata('fcs_user_id'));


			if($a['staff_del'] == 0){

				redirect(base_url().'error_550');
		     }else{

				if ($id=="") {
					show_404();
				}
				$this->staff_model->delete($id);	
				$this->session->set_flashdata('msg', 'Staff successfully deleted');
				redirect(base_url().'staff');

			}

	}


	public function staff_permission() {

			$a = $this->user_permision->check_action_permision('user_permision_view',$this->session->userdata('fcs_user_id'));


			if($a['user_permision_view'] == 0){

				redirect(base_url().'error_550');
		     }else{

					$data['msg'] = $this->session->flashdata('msg');
					$b_url = base_url().'staff/index';
					$t_rows = $this->staff_model->count();
					$pageConfig = create_pagination_config( $b_url, $t_rows, 10, 3);
					$this->pagination->initialize($pageConfig);
					$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
					
					$data['staffx'] = $this->staff_model->fetch($pageConfig['per_page'], $page);
					$data['links'] = $this->pagination->create_links();

					$current_page =  floor(($this->uri->segment(3) / $pageConfig['per_page']) + 1);
					$data['pagination_msg'] = create_pagination_msg($current_page, $pageConfig['per_page'], $t_rows);

					$this->load->view('_template/header', $data);
			        $this->load->view('staff/staff_permission', $data);
			        $this->load->view('_template/footer', $data);

			}        
	}


		public function staff_permission_edit($id) {
	
			$a = $this->user_permision->check_action_permision('user_permision_edit',$this->session->userdata('fcs_user_id'));


			if($a['user_permision_edit'] == 0){

				redirect(base_url().'error_550');
		     }else{

					$data['msg'] = $this->session->flashdata('msg');
					$data['staff_p'] = $this->staff_model->fetch_staff_permmission($id);


						$this->load->helper(array('form'));
						$this->load->library('form_validation');


						if(isset($_POST['form_permission'])){
									$this->user_permision->update_staff_permission($id);
									$this->session->set_flashdata('msg', 'staff permission successfully updated');
									redirect(base_url().'staff/staff_permission');
						}

								$this->load->view('_template/header', $data);
								$this->load->view('staff/staff_permission_edit', $data);
								$this->load->view('_template/footer', $data);

			}
					
		      
	}




}