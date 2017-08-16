<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class customer_maid extends CI_Controller {

	
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
		$this->load->model('customer_maid_model');
		$this->load->model('branch_model');
		$this->load->model('user_permision');
		$this->load->library('session');

	}

	public function index() {

		
	 		 $a = $this->user_permision->check_action_permision('emp_view',$this->session->userdata('fcs_role_id'));


			if($a['emp_view'] == 0){

				redirect(base_url().'error_550');
		     }else{

				$data['msg'] = $this->session->flashdata('msg');
				$b_url = base_url().'customer_maid/index';
				$t_rows = $this->customer_maid_model->count();
				$pageConfig = create_pagination_config( $b_url, $t_rows, 20, 3);
				$this->pagination->initialize($pageConfig);
				$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
				
				$data['customers'] = $this->customer_maid_model->fetch($pageConfig['per_page'], $page);
				$data['links'] = $this->pagination->create_links();

				$current_page =  floor(($this->uri->segment(3) / $pageConfig['per_page']) + 1);
				$data['pagination_msg'] = create_pagination_msg($current_page, $pageConfig['per_page'], $t_rows);

			
				

				$this->load->view('_template/header', $data);
		        $this->load->view('customer_maid/index', $data);
		        $this->load->view('_template/footer', $data);


		    }    

	}
	public function add(){		

		 $a = $this->user_permision->check_action_permision('emp_add',$this->session->userdata('fcs_role_id'));


			if($a['emp_add'] == 0){

				redirect(base_url().'error_550');
		     }else{

				$this->load->helper(array('form'));
				$this->load->library('form_validation');
				$this->form_validation->set_rules('customer_name', 'customer_name', 'required|callback_check_add_company_name');
				$data['branches'] = $this->branch_model->get();

				if($this->form_validation->run() === FALSE) {
					$data['action'] = 'add';
					$this->load->view('_template/header', $data);
					$this->load->view('customer_maid/add_edit', $data);
					$this->load->view('_template/footer', $data);
				}
				else{
					$this->customer_maid_model->add();
					$this->session->set_flashdata('msg', 'New customer successfully created');
					redirect(base_url().'customer_maid');
				}

			}	
	}

	public function check_add_company_name(){
		$customer_name = $this->input->post('customer_name');

        $result = $this->customer_maid_model->company_name_exist($customer_name);
        if($result){
	        $this->form_validation->set_message('check_add_company_name', 'This customer name already exist');
	        return false;
        }
        return true;
	}

	public function edit($id){


		 $a = $this->user_permision->check_action_permision('emp_edit',$this->session->userdata('fcs_role_id'));


			if($a['emp_edit'] == 0){

				redirect(base_url().'error_550');
		     }else{

				$data['customer'] = $this->customer_maid_model->get($id);
				if (empty($data['customer'])) {
					show_404();
				}
				$this->load->helper('form');
				$this->load->library('form_validation');

				$this->form_validation->set_rules('customer_name', 'customer_name', 'required|callback_check_edit_company_name['.$id.']');
				$data['branches'] = $this->branch_model->get();
				
				if($this->form_validation->run() === FALSE) {
					$data['action'] = 'edit';
					$this->load->view('_template/header', $data);
					$this->load->view('customer_maid/add_edit', $data);
					$this->load->view('_template/footer', $data);	
				}
				else {
					$this->customer_maid_model->update($id);
					$this->session->set_flashdata('msg', 'Customer successfully updated');
					redirect(base_url().'customer_maid');
				}
		  }

	}



	 public function company_name_exist($customer_name, $id=FALSE){
        if ($id) {
            $this->db->where('customer_id !=', $id);
        }
        $query = $this->db->get_where('customer_maid', array('customer_name' => $customer_name, 'active' => 1));
        if ($query->num_rows()>=1) {
            return $query->row();
        }
        return false;
    }



	public function delete($id="") {

		 $a = $this->user_permision->check_action_permision('emp_del',$this->session->userdata('fcs_role_id'));


			if($a['emp_del'] == 0){

				redirect(base_url().'error_550');
		     }else{

					if ($id=="") {
						show_404();
					}
					$this->customer_maid_model->delete($id);	
					$this->session->set_flashdata('msg', 'Customer successfully deleted');
					redirect(base_url().'customer_maid');
			}		
	}





}