<?php
class dashboard extends CI_Controller {

	public function __construct() {
		parent::__construct();
		is_login();
		$this->load->model('customer_model');
		$this->load->model('invoice_model');
		$this->load->model('quotation_model');
		$this->load->model('supplier_model');
		$this->load->model('purchase_order_model');
		$this->load->model('announcement_model');
		$this->load->model('maid_model');
	}


	public function index() {
		$data['base_url'] = base_url();
		$data['admin'] ="admin";
		

		//$data['msg'] = $this->session->flashdata('msg');
		$b_url = base_url().'dashboard/index';
		$t_rows = $this->announcement_model->count();
		$pageConfig = create_pagination_config( $b_url, $t_rows, 10, 3);
		$this->pagination->initialize($pageConfig);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['announcements'] = $this->announcement_model->fetch($pageConfig['per_page'], $page);
		$data['links'] = $this->pagination->create_links();
		$current_page =  floor(($this->uri->segment(3) / $pageConfig['per_page']) + 1);
		$data['pagination_msg'] = create_pagination_msg($current_page, $pageConfig['per_page'], $t_rows);


		$t_rows_m = $this->maid_model->count_hold_selected();
		$pageConfigm = create_pagination_config( $b_url, $t_rows_m, 10, 3);
		$this->pagination->initialize($pageConfigm);
		$pagem = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		$data['maids'] = $this->maid_model->fetch_hold_selected($pageConfigm['per_page'], $page);

		$data['links_m'] = $this->pagination->create_links();
		$current_page_m =  floor(($this->uri->segment(3) / $pageConfigm['per_page']) + 1);
		$data['pagination_msgm'] = create_pagination_msg($current_page_m, $pageConfigm['per_page'], $t_rows_m);





		$data['total_quotation'] = $this->quotation_model->count();
		$data['total_customer'] = $this->customer_model->count();
		$data['total_invoice'] = $this->invoice_model->count();
		$data['total_supplier'] = $this->supplier_model->count();
		//$data['total_purchase_order'] = $this->purchase_order_model->count();
		//$data['total_revenue'] = $this->invoice_model->total_revenue();
		//$data['total_purchase'] = $this->invoice_model->total_purchase();
		//$data['total_profit'] = $data['total_revenue']-$data['total_purchase'];
		$this->load->view('_template/header', $data);
		$this->load->view('dashboard', $data);
		$this->load->view('_template/footer', $data);
	}




	/*
	public function index() {
		$data['base_url'] = base_url();
		$data['admin'] ="admin";
		$data['total_quotation'] = $this->quotation_model->count();
		$data['total_customer'] = $this->customer_model->count();
		$data['total_invoice'] = $this->invoice_model->count();
		$data['total_supplier'] = $this->supplier_model->count();
		$data['total_purchase_order'] = $this->purchase_order_model->count();
		$data['total_revenue'] = $this->invoice_model->total_revenue();
		$data['total_purchase'] = $this->invoice_model->total_purchase();
		$data['total_profit'] = $data['total_revenue']-$data['total_purchase'];
		$this->load->view('_template/header', $data);
		$this->load->view('dashboard', $data);
		$this->load->view('_template/footer', $data);
	}*/

	public function getTotalRevenue(){
    	if($this->input->post('y') && $this->input->post('m')!=''){

    		$revenue = $this->invoice_model->total_revenue();

    		if($revenue){
    			echo '$'.$revenue;
    		}else{
    			echo '$0.00';
    		}
			
    	}
    }

    public function getTotalPurchase(){
    	if($this->input->post('y') && $this->input->post('m')!=''){

    		$purchase = $this->invoice_model->total_purchase();

    		if($purchase){
				echo '$'.$purchase;
    		}else{
				echo '$0.00';
    		}
			
    	}
    }

    public function getProfit(){
    	if($this->input->post('y') && $this->input->post('m')!=''){

			$revenue = $this->invoice_model->total_revenue();
			$purchase = $this->invoice_model->total_purchase();
    		$profit = $revenue-$purchase;

    		if($profit){
				echo '$'.$profit;
    		}else{
				echo '$0.00';
    		}
			
    	}
    }

}