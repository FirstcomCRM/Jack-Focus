<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class selling_product extends CI_Controller {

	
	function __construct() {
		parent::__construct();
		is_login();
		$controller = ucfirst($this->router->class);
		$role_id = $this->session->userdata('fcs_role_id');
		// $method = $this->router->fetch_method();
		// $get_perm = check_permission($role_id,$controller,$method);
		// if($get_perm == 0)
		// {
		// 	redirect(base_url().'error_403');
		// }

		$this->load->model('customer_model');
		$this->load->model('product_category_model');
		$this->load->model('product_model');
	}

	public function index(){
		$data['msg'] = $this->session->flashdata('msg');
		$data['base_url'] = base_url();
		$b_url = base_url().'selling_product/index';
		$t_rows = $this->product_model->count_selling_product();
		$pageConfig = create_pagination_config( $b_url, $t_rows, 10, 3);
		$this->pagination->initialize($pageConfig);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		
		if($this->input->get('date_from')){
			$date_from = $this->input->get('date_from');
		}else{
			$date_from = '';
		}

		if($this->input->get('date_to')){
			$date_to = $this->input->get('date_to');
		}else{
			$date_to = '';
		}

		$data['categories'] = $this->product_category_model->get();

		$data['selling_products'] = $this->product_model->fetch_selling_product($pageConfig['per_page'], $page);

		if ($data['selling_products'] != '') {
			$pt_str = '';
			foreach ($data['selling_products'] as $pk => $product) {
				$product_id = $product->product_id;
				$product_types = $this->product_model->get_product_type($product_id);
				if ($product_types != '') {
					$pt_ary = '';
					foreach ($product_types as $ptk => $product_type) {
						$pt_ary[] = $product_type['category_name'];
					}
					$pt_str = implode(', ', $pt_ary);
				}
				$data['selling_products'][$pk]->product_type = $pt_str;

				//get total purhcase product
				$purchase_product = $this->product_model->fetch_purchase_product($product_id);

				$data['selling_products'][$pk]->purchase_product = $purchase_product;
				$data['selling_products'][$pk]->selling_product_href = base_url().'quotation?product_id='.$product_id.'&date_from='.$date_from.'&date_to='.$date_to;
				$data['selling_products'][$pk]->purchase_product_href = base_url().'purchase_order?product_id='.$product_id.'&date_from='.$date_from.'&date_to='.$date_to;

			}
		}
		$data['links'] = $this->pagination->create_links();
		$current_page =  floor(($this->uri->segment(3) / $pageConfig['per_page']) + 1);
		$data['pagination_msg'] = create_pagination_msg($current_page, $pageConfig['per_page'], $t_rows);

		$data['customers'] = $this->customer_model->get();
		$this->load->view('_template/header', $data);
        $this->load->view('selling_product/index', $data);
        $this->load->view('_template/footer', $data);
	}

	public function export_selling_product(){

		$this->load->library('excel');
		$selling_products = $this->product_model->fetch_selling_product();

		$selling_export =  array();
		$no = 1;

		foreach($selling_products as $key=>$selling_product) { 

			$selling_export[] = array(
				'product' => $selling_product->product_name,
				'category' => $selling_product->category_name,
				'description' => $selling_product->description,
				'quantity' => $selling_product->selling_quantity
			);

			$no++;
		}

		
		$this->excel->export($selling_export, "SellingReport(" . date('d-m-Y', time()) . ").xls");	
	}
}