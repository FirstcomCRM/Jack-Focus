<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class daily_sales extends CI_Controller {

	
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
		$this->load->model('insurance_package_model');
		$this->load->model('daily_sales_model');
		$this->load->model('user_permision');
		$this->load->library('session');
	}

	public function index() {


			$a = $this->user_permision->check_action_permision('dailysales_view',$this->session->userdata('fcs_user_id'));


			if($a['dailysales_view'] == 0){

				redirect(base_url().'error_550');
		     }else{

				$data['msg'] = $this->session->flashdata('msg');
				$b_url = base_url().'daily_sales/index';
				$t_rows = $this->daily_sales_model->count();
				$pageConfig = create_pagination_config( $b_url, $t_rows, 10, 3);
				$this->pagination->initialize($pageConfig);
				$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
				
				$data['daily_salesx'] = $this->daily_sales_model->fetch($pageConfig['per_page'], $page);
				$data['links'] = $this->pagination->create_links();

				$current_page =  floor(($this->uri->segment(3) / $pageConfig['per_page']) + 1);
				$data['pagination_msg'] = create_pagination_msg($current_page, $pageConfig['per_page'], $t_rows);

				$this->load->view('_template/header', $data);
		        $this->load->view('daily_sales/index', $data);
		        $this->load->view('_template/footer', $data);

		    }    


	}
	public function add(){
		$this->load->helper(array('form'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('date', 'date', 'required|callback_check_add_company_name');

		if($this->form_validation->run() === FALSE) {
			$data['action'] = 'add';
			$this->load->view('_template/header', $data);
			$this->load->view('daily_salese/add_edit', $data);
			$this->load->view('_template/footer', $data);
		}
		else{
			$this->daily_sales_model->add();
			$this->session->set_flashdata('msg', 'New insurance package successfully created');
			redirect(base_url().'insurance_package');
		}
	}

	public function check_add_company_name(){
		$insurance_name = $this->input->post('insurance_name');

        $result = $this->insurance_package_model->company_name_exist($insurance_name);
        if($result){
	        $this->form_validation->set_message('check_add_company_name', 'This insurance name already exist');
	        return false;
        }
        return true;
	}

	public function edit($id){

			$a = $this->user_permision->check_action_permision('dailysales_edit',$this->session->userdata('fcs_user_id'));


			if($a['dailysales_edit'] == 0){

				redirect(base_url().'error_550');
		     }else{

					$data['insurance_package'] = $this->insurance_package_model->get($id);
					if (empty($data['insurance_package'])) {
						show_404();
					}
					$this->load->helper('form');
					$this->load->library('form_validation');

					$this->form_validation->set_rules('insurance_name', 'insurance_name', 'required|callback_check_edit_company_name['.$id.']');

					if($this->form_validation->run() === FALSE) {
						$data['action'] = 'edit';
						$this->load->view('_template/header', $data);
						$this->load->view('insurance_package/add_edit', $data);
						$this->load->view('_template/footer', $data);	
					}
					else {
						$this->insurance_package_model->update($id);
						$this->session->set_flashdata('msg', 'Insurance successfully updated');
						redirect(base_url().'insurance_package');
					}

			}		

	}
	public function check_edit_company_name($str, $id){
		$insurance_name = $this->input->post('insurance_name');
        $result = $this->insurance_package_model->company_name_exist($branch_name, $id);
        if($result){
	        $this->form_validation->set_message('check_edit_company_name', 'This insurance name already exist');
	        return false;
        }
        return true;
	}

	public function delete($id="") {

			$a = $this->user_permision->check_action_permision('dailysales_del',$this->session->userdata('fcs_user_id'));


			if($a['dailysales_del'] == 1){

				redirect(base_url().'error_550');
		     }else{

				if ($id=="") {
					show_404();
				}
				$this->insurance_package_model->delete($id);	
				$this->session->set_flashdata('msg', 'Insurance successfully deleted');
				redirect(base_url().'insurance_package');

			}	
	}
}