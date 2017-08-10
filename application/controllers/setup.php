<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class setup extends CI_Controller {

	public function __construct() {
		parent::__construct();
		is_login();
		$this->load->model('announcement_model');
		$this->load->model('nationality_model');
		$this->load->model('partner_model');
	}


	public function index() {
		$data['base_url'] = base_url();
		$data['admin'] ="admin";
		

		//$data['msg'] = $this->session->flashdata('msg');
		$b_url = base_url().'announcement/index';
		$t_rows = $this->announcement_model->count();
		$pageConfig = create_pagination_config( $b_url, $t_rows, 10, 3);
		$this->pagination->initialize($pageConfig);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['announcements'] = $this->announcement_model->fetch($pageConfig['per_page'], $page);
		$data['links'] = $this->pagination->create_links();
		$current_page =  floor(($this->uri->segment(3) / $pageConfig['per_page']) + 1);
		$data['pagination_msg'] = create_pagination_msg($current_page, $pageConfig['per_page'], $t_rows);

		$t_rows_n = $this->nationality_model->count();
		$pageConfig_n = create_pagination_config( $b_url, $t_rows_n, 10, 3);
		$this->pagination->initialize($pageConfig_n);
		$page_n = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['nationalityx'] = $this->nationality_model->fetch($pageConfig_n['per_page'], $page);
		$data['links_n'] = $this->pagination->create_links();
		$current_page_n =  floor(($this->uri->segment(3) / $pageConfig_n['per_page']) + 1);
		$data['pagination_msg_n'] = create_pagination_msg($current_page_n, $pageConfig_n['per_page'], $t_rows_n);

		$t_rows_p = $this->partner_model->count();
		$pageConfig_p = create_pagination_config( $b_url, $t_rows_p, 10, 3);
		$this->pagination->initialize($pageConfig_p);
		$page_p = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['partners'] = $this->partner_model->fetch($pageConfig_p['per_page'], $page);
		$data['links_p'] = $this->pagination->create_links();
		$current_page_p =  floor(($this->uri->segment(3) / $pageConfig_p['per_page']) + 1);
		$data['pagination_msg_p'] = create_pagination_msg($current_page_p, $pageConfig_p['per_page'], $t_rows_p);


		
		$this->load->view('_template/header', $data);
		$this->load->view('setup/index', $data);
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