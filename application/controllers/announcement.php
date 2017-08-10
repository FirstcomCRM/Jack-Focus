<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class announcement extends CI_Controller {

	
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
		$this->load->model('announcement_model');
	}

	public function index() {
		$data['msg'] = $this->session->flashdata('msg');
		$b_url = base_url().'announcement/index';
		$t_rows = $this->announcement_model->count();
		$pageConfig = create_pagination_config( $b_url, $t_rows, 10, 3);
		$this->pagination->initialize($pageConfig);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		
		$data['announcements'] = $this->announcement_model->fetch($pageConfig['per_page'], $page);
		$data['links'] = $this->pagination->create_links();

		$current_page =  floor(($this->uri->segment(3) / $pageConfig['per_page']) + 1);
		$data['pagination_msg'] = create_pagination_msg($current_page, $pageConfig['per_page'], $t_rows);

		$this->load->view('_template/header', $data);
        $this->load->view('announcement/index', $data);
        $this->load->view('_template/footer', $data);
	}
	public function add(){
		$this->load->helper(array('form'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('announce_title', 'supplier_name', 'required|callback_check_add_company_name');

		if($this->form_validation->run() === FALSE) {
			$data['action'] = 'add';
			$this->load->view('_template/header', $data);
			$this->load->view('announcement/add_edit', $data);
			$this->load->view('_template/footer', $data);
		}
		else{
			$this->announcement_model->add();
			$this->session->set_flashdata('msg', 'New announcement successfully created');
			redirect(base_url().'announcement');
		}
	}

	public function check_add_company_name(){
		$announce_title = $this->input->post('announce_title');

        $result = $this->announcement_model->company_name_exist($announce_title);
        if($result){
	        $this->form_validation->set_message('check_add_company_name', 'This title name already exist');
	        return false;
        }
        return true;
	}

	public function edit($id){
		$data['announcement'] = $this->announcement_model->get($id);
		if (empty($data['announcement'])) {
			show_404();
		}
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('announce_title', 'category', 'required|callback_check_edit_company_name['.$id.']');

		if($this->form_validation->run() === FALSE) {
			$data['action'] = 'edit';
			$this->load->view('_template/header', $data);
			$this->load->view('announcement/add_edit', $data);
			$this->load->view('_template/footer', $data);	
		}
		else {
			$this->announcement_model->update($id);
			$this->session->set_flashdata('msg', 'announcement successfully updated');
			redirect(base_url().'announcement');
		}
	}
	public function check_edit_company_name($str, $id){
		$company_name = $this->input->post('announce_title');
        $result = $this->announcement_model->company_name_exist($announce_title, $id);
        if($result){
	        $this->form_validation->set_message('check_edit_company_name', 'This company name already exist');
	        return false;
        }
        return true;
	}

	public function delete($id="") {
		if ($id=="") {
			show_404();
		}
		$this->announcement_model->delete($id);	
		$this->session->set_flashdata('msg', 'announcement successfully deleted');
		redirect(base_url().'announcement');
	}
}