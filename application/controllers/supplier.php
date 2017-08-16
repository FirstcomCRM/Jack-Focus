<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class supplier extends CI_Controller {

	
	function __construct() {
		parent::__construct();
		is_login();
		/*is_login();
		$controller = ucfirst($this->router->class);
		$role_id = $this->session->userdata('fcs_role_id');
		$method = $this->router->fetch_method();
		 $get_perm = check_permission($role_id,$controller,$method);
		 if($get_perm == 0)
		{
		 	redirect(base_url().'error_403');
		 }*/
		$this->load->model('supplier_model');
		$this->load->model('maid_model');
		$this->load->model('status_model');
		$this->load->model('nationality_model');
		$this->load->model('staff_model');
		$this->load->model('user_permision');
		$this->load->library('session');
	}

	public function index() {


		 $a = $this->user_permision->check_action_permision('supp_view',$this->session->userdata('fcs_role_id'));


			if($a['supp_view'] == 0){

				redirect(base_url().'error_550');
		     }else{

				$data['msg'] = $this->session->flashdata('msg');
				$b_url = base_url().'supplier/index';
				$t_rows = $this->supplier_model->count();
				$pageConfig = create_pagination_config( $b_url, $t_rows, 10, 3);
				$this->pagination->initialize($pageConfig);
				$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
				
				$data['suppliers'] = $this->supplier_model->fetch($pageConfig['per_page'], $page);
				$data['links'] = $this->pagination->create_links();

				$current_page =  floor(($this->uri->segment(3) / $pageConfig['per_page']) + 1);
				$data['pagination_msg'] = create_pagination_msg($current_page, $pageConfig['per_page'], $t_rows);

				$this->load->view('_template/header', $data);
		        $this->load->view('supplier/index', $data);
		        $this->load->view('_template/footer', $data);

		   }     


	}

	public function add(){

			$a = $this->user_permision->check_action_permision('supp_add',$this->session->userdata('fcs_role_id'));


			if($a['supp_add'] == 0){

				redirect(base_url().'error_550');
		     }else{


					$this->load->helper(array('form'));
					$this->load->library('form_validation');
					$this->form_validation->set_rules('supplier_name', 'supplier_name', 'required|callback_check_supplier_name');
					$this->form_validation->set_rules('supplier_email', 'Email', 'required|valid_email');
					

					if($this->form_validation->run() === FALSE) {
						$data['action'] = 'add';
						$this->load->view('_template/header', $data);
						$this->load->view('supplier/add_edit', $data);
						$this->load->view('_template/footer', $data);
					}
					else{
						$this->supplier_model->add();
						$this->session->set_flashdata('msg', 'New supplier successfully created');
						redirect(base_url().'supplier');
					}

			}		
	}

	public function check_supplier_name(){
		$supplier_name = $this->input->post('supplier_name');

        $result = $this->supplier_model->supplier_name_exist($supplier_name);
        if($result){
	        $this->form_validation->set_message('check_add_company_name', 'This suppl name already exist');
	        return false;
        }
        return true;
	}

	public function edit($id){


			$a = $this->user_permision->check_action_permision('supp_edit',$this->session->userdata('fcs_role_id'));


			if($a['supp_edit'] == 0){

				redirect(base_url().'error_550');
		     }else{

					$data['supplier_maid'] = $this->supplier_model->get($id);
					if (empty($data['supplier_maid'])) {
						show_404();
					}
					$this->load->helper('form');
					$this->load->library('form_validation');

					//$this->form_validation->set_rules('supplier_name', 'category', 'required|callback_check_edit_company_name['.$id.']');
					$this->form_validation->set_rules('supplier_email', 'Email', 'required|valid_email');

					if($this->form_validation->run() === FALSE) {
						$data['action'] = 'edit';
						$this->load->view('_template/header', $data);
						$this->load->view('supplier/add_edit', $data);
						$this->load->view('_template/footer', $data);	
					}
					else {
						$this->supplier_model->update($id);
						$this->session->set_flashdata('msg', 'supplier successfully updated');
						redirect(base_url().'supplier');
					}

			}		
	}
	public function check_edit_company_name($str, $id){
		$company_name = $this->input->post('company_name');
        $result = $this->supplier_model->supplier_name_exist($company_name, $id);
        if($result){
	        $this->form_validation->set_message('check_edit_company_name', 'This company name already exist');
	        return false;
        }
        return true;
	}

	public function delete($id="") {

			$a = $this->user_permision->check_action_permision('supp_del',$this->session->userdata('fcs_role_id'));


			if($a['supp_del'] == 0){

				redirect(base_url().'error_550');
		     }else{

				if ($id=="") {
					show_404();
				}
				$this->supplier_model->delete($id);	
				$this->session->set_flashdata('msg', 'supplier successfully deleted');
				redirect(base_url().'supplier');

			}	
	}







	public function maid_list($id=""){

			$a = $this->user_permision->check_action_permision('supp_view',$this->session->userdata('fcs_role_id'));


			if($a['supp_view'] == 0){

				redirect(base_url().'error_550');
		     }else{


					$data['msg'] = $this->session->flashdata('msg');
					$b_url = base_url().'supplier/maid_list';
					$t_rows = $this->supplier_model->count_maid_supplier();
					$pageConfig = create_pagination_config( $b_url, $t_rows, 10, 3);
					$this->pagination->initialize($pageConfig);
					$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
					
					$data['maids'] = $this->supplier_model->fetch_maid($pageConfig['per_page'], $page);
					$data['links'] = $this->pagination->create_links();

					$current_page =  floor(($this->uri->segment(3) / $pageConfig['per_page']) + 1);
					$data['pagination_msg'] = create_pagination_msg($current_page, $pageConfig['per_page'], $t_rows);

				
					$data['suppliers'] = $this->supplier_model->get();
					$data['statusx'] = $this->status_model->get();
					$data['nationalities'] = $this->nationality_model->get();
					$data['staffx'] = $this->staff_model->get();

					$this->load->view('_template/header', $data);
			        $this->load->view('supplier/maid_list', $data);
			        $this->load->view('_template/footer', $data);

			}

	}


}