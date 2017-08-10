<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class product extends CI_Controller {

	
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

		$this->load->model('product_model');
		$this->load->model('product_category_model');
	}

	public function index() {
		$data['msg'] = $this->session->flashdata('msg');
		$b_url = base_url().'product/index';
		$t_rows = $this->product_model->count();
		$pageConfig = create_pagination_config( $b_url, $t_rows, 10, 3);
		$this->pagination->initialize($pageConfig);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		
		$data['products'] = $this->product_model->fetch($pageConfig['per_page'], $page);
		if ($data['products'] != '') {
			$pt_str = '';
			foreach ($data['products'] as $pk => $product) {
				$product_id = $product->product_id;
				$product_types = $this->product_model->get_product_type($product_id);
				if ($product_types != '') {
					$pt_ary = '';
					foreach ($product_types as $ptk => $product_type) {
						$pt_ary[] = $product_type['category_name'];
					}
					$pt_str = implode(', ', $pt_ary);
				}
				$data['products'][$pk]->product_type = $pt_str;
			}
		}
		$data['links'] = $this->pagination->create_links();

		$current_page =  floor(($this->uri->segment(3) / $pageConfig['per_page']) + 1);
		$data['pagination_msg'] = create_pagination_msg($current_page, $pageConfig['per_page'], $t_rows);
		$data['product_categorys'] = $this->product_category_model->get();
		$this->load->view('_template/header', $data);
        $this->load->view('product/index', $data);
        $this->load->view('_template/footer', $data);
	}

	public function add(){
		$this->load->helper(array('form'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('product_category', 'product category', 'required');
		$this->form_validation->set_rules('product_name', 'product name', 'required|callback_check_add_product_name');

		if($this->form_validation->run() === FALSE) {
			$data['action'] = 'add';
			$data['product_categorys'] = $this->product_category_model->get();
			$this->load->view('_template/header', $data);
			$this->load->view('product/add_edit', $data);
			$this->load->view('_template/footer', $data);
		}
		else{
			$id = $this->product_model->add();
	    	$this->product_model->delete_product_type($id);
	    	if (isset($_POST['product_category'])&&$_POST['product_category']!='') {
		    	foreach ($_POST['product_category'] as $product_category_id) {
		    		if ($this->product_model->product_type_exist($id, $product_category_id)) {
		    			$this->product_model->activate_product_type($id, $product_category_id);
		    		}
		    		else{
		    			$this->product_model->add_product_type($id, $product_category_id);
		    		}
		    	}
	    	}
			$this->session->set_flashdata('msg', 'New product successfully created');
			redirect(base_url().'product');
		}
	}

	public function check_add_product_name(){
		$product_name = $this->input->post('product_name');
        $result = $this->product_model->product_name_exist($product_name);
        if($result){
	        $this->form_validation->set_message('check_add_product_name', 'This product name already exist');
	        return false;
        }
        return true;
	}

	public function edit($id){
		$data['product'] = $this->product_model->get($id);
		if (empty($data['product'])) {
			show_404();
		}
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('product_category', 'product category', 'required');
		$this->form_validation->set_rules('product_name', 'product name', 'required|callback_check_edit_product_name['.$id.']');

		if($this->form_validation->run() === FALSE) {
			$data['action'] = 'edit';
			$data['product_categorys'] = $this->product_category_model->get();
			$product_types = $this->product_model->get_product_type($id);
			$data['pc_ids'] = '';
			foreach ($product_types as $product_type) {
				$data['pc_ids'][] = $product_type['product_category_id'];
		}
			$this->load->view('_template/header', $data);
			$this->load->view('product/add_edit', $data);
			$this->load->view('_template/footer', $data);	
		}
		else {
	    	$this->product_model->delete_product_type($id);
	    	if (isset($_POST['product_category'])&&$_POST['product_category']!='') {
		    	foreach ($_POST['product_category'] as $product_category_id) {
		    		if ($this->product_model->product_type_exist($id, $product_category_id)) {
		    			$this->product_model->activate_product_type($id, $product_category_id);
		    		}
		    		else{
		    			$this->product_model->add_product_type($id, $product_category_id);
		    		}
		    	}
	    	}

			$this->product_model->update($id);
			$this->session->set_flashdata('msg', 'Product successfully updated');
			redirect(base_url().'product');
		}
	}
	public function check_edit_product_name($str, $id){
		$product_name = $this->input->post('product_name');
        $result = $this->product_model->product_name_exist($product_name, $id);
        if($result){
	        $this->form_validation->set_message('check_edit_product_name', 'This product name already exist');
	        return false;
        }
        return true;
	}
	public function delete($id="") {
		if ($id=="") {
			show_404();
		}
		$this->product_model->delete($id);	
		$this->session->set_flashdata('msg', 'Product successfully deleted');
		redirect(base_url().'product');
	}
}