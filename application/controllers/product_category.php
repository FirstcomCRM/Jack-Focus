<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class product_category extends CI_Controller {

	
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

		$this->load->model('product_category_model');
	}

	public function index() {
		$data['msg'] = $this->session->flashdata('msg');
		$b_url = base_url().'product_category/index';
		$t_rows = $this->product_category_model->count();
		$pageConfig = create_pagination_config( $b_url, $t_rows, 10, 3);
		$this->pagination->initialize($pageConfig);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		
		$data['product_categorys'] = $this->product_category_model->fetch($pageConfig['per_page'], $page);
		$data['links'] = $this->pagination->create_links();

		$current_page =  floor(($this->uri->segment(3) / $pageConfig['per_page']) + 1);
		$data['pagination_msg'] = create_pagination_msg($current_page, $pageConfig['per_page'], $t_rows);

		$this->load->view('_template/header', $data);
        $this->load->view('product_category/index', $data);
        $this->load->view('_template/footer', $data);
	}
	public function add(){
		$this->load->helper(array('form'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('category_name', 'category', 'required|callback_check_add_category_name');

		if($this->form_validation->run() === FALSE) {
			$data['action'] = 'add';
			$this->load->view('_template/header', $data);
			$this->load->view('product_category/add_edit', $data);
			$this->load->view('_template/footer', $data);
		}
		else{
			$this->product_category_model->add();
			$this->session->set_flashdata('msg', 'New category successfully created');
			redirect(base_url().'product_category');
		}
	}

	public function check_add_category_name(){
		$category_name = $this->input->post('category_name');

        $result = $this->product_category_model->category_name_exist($category_name);
        if($result){
	        $this->form_validation->set_message('check_add_category_name', 'This category name already exist');
	        return false;
        }
        return true;
	}

	public function edit($id){
		$data['product_category'] = $this->product_category_model->get($id);
		if (empty($data['product_category'])) {
			show_404();
		}
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('category_name', 'category', 'required|callback_check_edit_category_name['.$id.']');

		if($this->form_validation->run() === FALSE) {
			$data['action'] = 'edit';
			$this->load->view('_template/header', $data);
			$this->load->view('product_category/add_edit', $data);
			$this->load->view('_template/footer', $data);	
		}
		else {
			$this->product_category_model->update($id);
			$this->session->set_flashdata('msg', 'Category successfully updated');
			redirect(base_url().'product_category');
		}
	}
	public function check_edit_category_name($str, $id){
		$category_name = $this->input->post('category_name');
        $result = $this->product_category_model->category_name_exist($category_name, $id);
        if($result){
	        $this->form_validation->set_message('check_edit_category_name', 'This category name already exist');
	        return false;
        }
        return true;
	}

	public function delete($id="") {
		if ($id=="") {
			show_404();
		}
		$this->product_category_model->delete($id);	
		$this->session->set_flashdata('msg', 'Category successfully deleted');
		redirect(base_url().'product_category');
	}
}