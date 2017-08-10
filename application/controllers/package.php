<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class package extends CI_Controller {

	
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
		$this->load->model('package_model');
		$this->load->model('user_permision');
		$this->load->library('session');
	}

	public function index() {

			$a = $this->user_permision->check_action_permision('pack_view',$this->session->userdata('fcs_user_id'));


			if($a['pack_view'] == 0){

				redirect(base_url().'error_550');
		     }else{

				$data['msg'] = $this->session->flashdata('msg');
				$b_url = base_url().'package/index';
				$t_rows = $this->package_model->count();
				$pageConfig = create_pagination_config( $b_url, $t_rows, 10, 3);
				$this->pagination->initialize($pageConfig);
				$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
				
				$data['packages'] = $this->package_model->fetch($pageConfig['per_page'], $page);
				$data['links'] = $this->pagination->create_links();

				$current_page =  floor(($this->uri->segment(3) / $pageConfig['per_page']) + 1);
				$data['pagination_msg'] = create_pagination_msg($current_page, $pageConfig['per_page'], $t_rows);

				$this->load->view('_template/header', $data);
		        $this->load->view('package/index', $data);
		        $this->load->view('_template/footer', $data);

		     }   


	}
	public function add(){

			$a = $this->user_permision->check_action_permision('pack_add',$this->session->userdata('fcs_user_id'));


			if($a['pack_add'] == 0){

				redirect(base_url().'error_550');
		     }else{

				$this->load->helper(array('form'));
				$this->load->library('form_validation');
				$this->form_validation->set_rules('package_name', 'package_name', 'required|callback_check_add_company_name');

				if($this->form_validation->run() === FALSE) {
					$data['action'] = 'add';
					$this->load->view('_template/header', $data);
					$this->load->view('package/add_edit', $data);
					$this->load->view('_template/footer', $data);
				}
				else{
					$this->package_model->add();
					$this->session->set_flashdata('msg', 'New packagesuccessfully created');
					redirect(base_url().'package');
				}

			}	



	}

	public function check_add_company_name(){
		$package_name = $this->input->post('package_name');

        $result = $this->package_model->company_name_exist($package_name);
        if($result){
	        $this->form_validation->set_message('check_add_company_name', 'This package name already exist');
	        return false;
        }
        return true;
	}

	public function edit($id){

			$a = $this->user_permision->check_action_permision('pack_edit',$this->session->userdata('fcs_user_id'));


			if($a['pack_edit'] == 0){

				redirect(base_url().'error_550');
		     }else{

				$data['package'] = $this->package_model->get($id);
				if (empty($data['package'])) {
					show_404();
				}
				$this->load->helper('form');
				$this->load->library('form_validation');

				$this->form_validation->set_rules('package_name', 'category', 'required|callback_check_edit_company_name['.$id.']');

				if($this->form_validation->run() === FALSE) {
					$data['action'] = 'edit';
					$this->load->view('_template/header', $data);
					$this->load->view('package/add_edit', $data);
					$this->load->view('_template/footer', $data);	
				}
				else {
					$this->package_model->update($id);
					$this->session->set_flashdata('msg', 'Package successfully updated');
					redirect(base_url().'package');
				}

			}	


	}
	public function check_edit_company_name($str, $id){
		$package_name = $this->input->post('package_name');
        $result = $this->package_model->company_name_exist($package_name, $id);
        if($result){
	        $this->form_validation->set_message('check_edit_company_name', 'This package name already exist');
	        return false;
        }
        return true;
	}

	public function delete($id="") {

			$a = $this->user_permision->check_action_permision('pack_del',$this->session->userdata('fcs_user_id'));


			if($a['pack_del'] == 0){

				redirect(base_url().'error_550');
		     }else{

					if ($id=="") {
						show_404();
					}
					$this->package_model->delete($id);	
					$this->session->set_flashdata('msg', 'Package successfully deleted');
					redirect(base_url().'package');

			}		

	}
}