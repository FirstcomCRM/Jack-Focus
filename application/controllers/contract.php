<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class contract extends CI_Controller {

	
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
		$this->load->model('contract_model');
			$this->load->model('user_permision');
		$this->load->library('session');
	}

	public function index() {


			$a = $this->user_permision->check_action_permision('cont_view',$this->session->userdata('fcs_role_id'));


			if($a['cont_view'] == 0){

				redirect(base_url().'error_550');
		     }else{


					$data['msg'] = $this->session->flashdata('msg');
					$b_url = base_url().'contract/index';
					$t_rows = $this->contract_model->count();
					$pageConfig = create_pagination_config( $b_url, $t_rows, 10, 3);
					$this->pagination->initialize($pageConfig);
					$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
					
					$data['contracts'] = $this->contract_model->fetch($pageConfig['per_page'], $page);
					$data['links'] = $this->pagination->create_links();

					$current_page =  floor(($this->uri->segment(3) / $pageConfig['per_page']) + 1);
					$data['pagination_msg'] = create_pagination_msg($current_page, $pageConfig['per_page'], $t_rows);

					$this->load->view('_template/header', $data);
			        $this->load->view('contract/index', $data);
			        $this->load->view('_template/footer', $data);
			}


	}
	public function add(){

			$a = $this->user_permision->check_action_permision('cont_add',$this->session->userdata('fcs_role_id'));


			if($a['cont_add'] == 0){

				redirect(base_url().'error_550');
		     }else{


				$this->load->helper(array('form'));
				$this->load->library('form_validation');
				$this->form_validation->set_rules('contract_name', 'nationality_name', 'required|callback_check_add_company_name');

				if($this->form_validation->run() === FALSE) {
					$data['action'] = 'add';
					$this->load->view('_template/header', $data);
					$this->load->view('contract/add_edit', $data);
					$this->load->view('_template/footer', $data);
				}
				else{
					$this->contract_model->add();
					$this->session->set_flashdata('msg', 'New contract successfully added');
					redirect(base_url().'contract');
				}

			}	
	}

	public function check_add_company_name(){
		$contract_name = $this->input->post('contract_name');

        $result = $this->contract_model->company_name_exist($contract_name);
        if($result){
	        $this->form_validation->set_message('check_add_company_name', 'This contract name already exist');
	        return false;
        }
        return true;
	}

	public function edit($id){

			$a = $this->user_permision->check_action_permision('cont_edit',$this->session->userdata('fcs_role_id'));


			if($a['cont_edit'] == 0){

				redirect(base_url().'error_550');
		     }else{

					$data['contract'] = $this->contract_model->get($id);
					if (empty($data['contract'])) {
						show_404();
					}
					$this->load->helper('form');
					$this->load->library('form_validation');

					$this->form_validation->set_rules('contract_name', 'category', 'required|callback_check_edit_company_name['.$id.']');

					if($this->form_validation->run() === FALSE) {
						$data['action'] = 'edit';
						$this->load->view('_template/header', $data);
						$this->load->view('contract/add_edit', $data);
						$this->load->view('_template/footer', $data);	
					}
					else {
						$this->contract_model->update($id);
						$this->session->set_flashdata('msg', 'Contract successfully updated');
						redirect(base_url().'contract');
					}

				}		


	}
	public function check_edit_company_name($str, $id){
		$contract_name = $this->input->post('contract_name');
        $result = $this->contract_model->company_name_exist($contract_name, $id);
        if($result){
	        $this->form_validation->set_message('check_edit_company_name', 'This contract name already exist');
	        return false;
        }
        return true;
	}

	public function delete($id="") {

			$a = $this->user_permision->check_action_permision('cont_del',$this->session->userdata('fcs_role_id'));


			if($a['cont_del'] == 0){

				redirect(base_url().'error_550');
		     }else{

					if ($id=="") {
						show_404();
					}
					$this->contract_model->delete($id);	
					$this->session->set_flashdata('msg', 'Contract successfully deleted');
					redirect(base_url().'contract');



			}		



	}





}