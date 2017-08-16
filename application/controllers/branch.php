<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class branch extends CI_Controller {

	
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
		$this->load->model('branch_model');
		$this->load->model('staff_model');
		$this->load->model('user_permision');
		$this->load->library('session');


	}

	public function index() {

			$a = $this->user_permision->check_action_permision('branch_view',$this->session->userdata('fcs_role_id'));


			if($a['branch_view'] == 0){

				redirect(base_url().'error_550');
		     }else{


					$data['msg'] = $this->session->flashdata('msg');
					$b_url = base_url().'branch/index';
					$t_rows = $this->branch_model->count();
					$pageConfig = create_pagination_config( $b_url, $t_rows, 10, 3);
					$this->pagination->initialize($pageConfig);
					$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
					
					$data['branches'] = $this->branch_model->fetch($pageConfig['per_page'], $page);
					//$data['staves'] = $this->staff_model->collect();
					$data['links'] = $this->pagination->create_links();


					$current_page =  floor(($this->uri->segment(3) / $pageConfig['per_page']) + 1);
					$data['pagination_msg'] = create_pagination_msg($current_page, $pageConfig['per_page'], $t_rows);

					$this->load->view('_template/header', $data);
			        $this->load->view('branch/index', $data);
			        $this->load->view('_template/footer', $data);

			}        
	}


	public function gather_staffs() {
		$branch_id = $this->input->get('id');

		echo json_encode(['staffList' => $this->staff_model->collect($branch_id)]);
	
	}

	public function branchStaff($id){
		$data['branchstaff'] = $this->branch_model->getBranchStaff($id);		
        $this->load->view('branch/branchstaff', $data);     

	}

	public function staffProfile($id) {
		$data['staffprofile'] =  $this->branch_model->getStaffProfile($id);

		$this->load->view('_template/header', $data);
        $this->load->view('branch/staff_profile', $data);
        $this->load->view('_template/footer', $data);
	}



	public function add(){


			$a = $this->user_permision->check_action_permision('branch_add',$this->session->userdata('fcs_role_id'));


			if($a['branch_add'] == 0){

				redirect(base_url().'error_550');
		     }else{


				$this->load->helper(array('form'));
				$this->load->library('form_validation');
				$this->form_validation->set_rules('branch_name', 'branch_name', 'required|callback_check_add_company_name');

				if($this->form_validation->run() === FALSE) {
					$data['action'] = 'add';
					$this->load->view('_template/header', $data);
					$this->load->view('branch/add_edit', $data);
					$this->load->view('_template/footer', $data);
				}
				else{
					$this->branch_model->add();
					$this->session->set_flashdata('msg', 'New branch successfully created');
					redirect(base_url().'branch');
				}

			}
	}

	public function check_add_company_name(){
		$branch_name = $this->input->post('branch_name');

        $result = $this->branch_model->company_name_exist($branch_name);
        if($result){
	        $this->form_validation->set_message('check_add_company_name', 'This branch name already exist');
	        return false;
        }
        return true;
	}

	public function edit($id){


		$a = $this->user_permision->check_action_permision('branch_edit',$this->session->userdata('fcs_role_id'));


		if($a['branch_edit'] == 0){

			redirect(base_url().'error_550');
	     }else{


			$data['branch'] = $this->branch_model->get($id);
			if (empty($data['branch'])) {
				show_404();
			}
			$this->load->helper('form');
			$this->load->library('form_validation');

			$this->form_validation->set_rules('branch_name', 'category', 'required|callback_check_edit_company_name['.$id.']');

			if($this->form_validation->run() === FALSE) {
				$data['action'] = 'edit';
				$this->load->view('_template/header', $data);
				$this->load->view('branch/add_edit', $data);
				$this->load->view('_template/footer', $data);	
			}else {
				$this->branch_model->update($id);
				$this->session->set_flashdata('msg', 'Branch successfully updated');
				redirect(base_url().'branch');
			}

		}
	}


	public function check_edit_company_name($str, $id){
		$company_name = $this->input->post('company_name');
        $result = $this->branch_model->company_name_exist($branch_name, $id);
        if($result){
	        $this->form_validation->set_message('check_edit_company_name', 'This branch name already exist');
	        return false;
        }
        return true;
	}

	public function delete($id="") {



			$a = $this->user_permision->check_action_permision('branch_del',$this->session->userdata('fcs_role_id'));


			if($a['branch_del'] == 0){

				redirect(base_url().'error_550');
		     }else{


					if ($id=="") {
						show_404();
					}
					$this->branch_model->delete($id);	
					$this->session->set_flashdata('msg', 'Branch successfully deleted');
					redirect(base_url().'branch');

			}		


	}
}