<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class delivery_order extends CI_Controller {

	
	function __construct() {
		parent::__construct();
		is_login();
		// $controller = ucfirst($this->router->class);
		// $role_id = $this->session->userdata('fcs_role_id');
		// $method = $this->router->fetch_method();
		// $get_perm = check_permission($role_id,$controller,$method);
		// if($get_perm == 0)
		// {
		// 	redirect(base_url().'error_403');
		// }
		$this->load->model('customer_model');
		$this->load->model('product_model');
		$this->load->model('quotation_model');
		$this->load->model('delivery_order_model');
		$this->load->model('invoice_model');
		$this->load->model('invoice_payment_model');
		$this->load->model('credit_note_model');
		$this->load->model('debit_note_model');
	}

	public function index() {
		$data['msg'] = $this->session->flashdata('msg');
		$b_url = base_url().'delivery_order/index';
		$t_rows = $this->delivery_order_model->count();
		$pageConfig = create_pagination_config( $b_url, $t_rows, 10, 3);
		$this->pagination->initialize($pageConfig);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		
		$data['delivery_orders'] = $this->delivery_order_model->fetch($pageConfig['per_page'], $page);
		$data['links'] = $this->pagination->create_links();

		if ($data['delivery_orders']!='') {
			foreach ($data['delivery_orders'] as $ik => $delivery_order) {
				$data['delivery_orders'][$ik]->amount = $this->quotation_model->get_amount($delivery_order->do_id);
			}
		}

		$data['customers'] = $this->customer_model->get();
		$current_page = floor(($this->uri->segment(3) / $pageConfig['per_page']) + 1);
		$data['pagination_msg'] = create_pagination_msg($current_page, $pageConfig['per_page'], $t_rows);
		$this->load->view('_template/header', $data);
        $this->load->view('delivery_order/index', $data);
        $this->load->view('_template/footer', $data);
	}

	public function view($id){
		$data['msg'] = $this->session->flashdata('msg');
		$data['invoice'] = $this->invoice_model->get($id);
		$data['do'] = $this->invoice_model->getDo($id);
		if (empty($data['invoice'])) {
			show_404();
		}
		$this->load->helper('form');

		$data['quotation'] = $this->quotation_model->get($id);
		$data['quotation_products'] = $this->quotation_model->get_quotation_product($id);

		$data['customers'] = $this->customer_model->get();
		$data['products']  = $this->product_model->get();
		$data['quotation_id']  = $id;

		$data['action'] = 'view';
		$data['customer_info'] = $this->customer_model->get($data['quotation']['customer_id']);
		$this->load->view('_template/header', $data);
		$this->load->view('delivery_order/view', $data);
		$this->load->view('_template/footer', $data);
		
	}

	public function add($id){

		$data['msg'] = $this->session->flashdata('msg');
		$data['quotation'] = $this->quotation_model->get($id);
		$data['invoice'] = $this->invoice_model->get($id);
		if (empty($data['invoice'])) {
			show_404();
		}
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('do_id', 'Delivery Order', 'required|callback_check_add_do_id');
		$this->form_validation->set_rules('do_no', 'DO no.', 'required|callback_check_add_do_no');
		$this->form_validation->set_rules('do_date', 'Date', 'required');

		if($this->form_validation->run() === FALSE) {
			$data['action'] = 'add';
			$data['quotation_products'] = $this->quotation_model->get_quotation_product($id);
			$data['customers'] = $this->customer_model->get();
			$data['products']  = $this->product_model->get();
			$invoice_info = $this->invoice_model->get($id);
			$data['inv_no'] = $invoice_info['invoice_no'];
			$data['do_no'] = $this->delivery_order_model->generate_do_no();
			$data['inv_id'] = $invoice_info['invoice_id'];
			$data['customer_info'] = $this->customer_model->get($data['quotation']['customer_id']);
			$this->load->view('_template/header', $data);
			$this->load->view('delivery_order/add_edit', $data);
			$this->load->view('_template/footer', $data);	
		}
		else {
			$this->delivery_order_model->add();
			$this->session->set_flashdata('msg', 'Delivery Order successfully created');
			redirect(base_url().'delivery_order');
		}
	}

	public function edit($id){
		$data['msg'] = $this->session->flashdata('msg');
		$data['invoice'] = $this->invoice_model->get($id);
		if (empty($data['invoice'])) {
			show_404();
		}
		$data['quotation'] = $this->quotation_model->get($id);
		$data['delivery_order'] = $this->delivery_order_model->get($id);
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('do_date', 'Date', 'required');

		if($this->form_validation->run() === FALSE) {
			$data['action'] = 'edit';
			$data['quotation_products'] = $this->quotation_model->get_quotation_product($id);
			$data['customers'] = $this->customer_model->get();
			$data['products']  = $this->product_model->get();
			$data['invoice_id']  = $id;
			$data['customer_info'] = $this->customer_model->get($data['quotation']['customer_id']);
			$this->load->view('_template/header', $data);
			$this->load->view('delivery_order/add_edit', $data);
			$this->load->view('_template/footer', $data);	
		}
		else {
			$this->delivery_order_model->update($id);
			$this->session->set_flashdata('msg', 'Delivery Order successfully updated');
			redirect(base_url().'delivery_order/edit/'.$id);
		}
	}

	public function check_add_do_id(){
		$do_id = $this->input->post('do_id');
        $result = $this->delivery_order_model->do_id_exist($do_id);
        if($result){
	        $this->form_validation->set_message('check_add_do_id', 'This delivery order already created, check again');
	        return false;
        }
        return true;
	}

	public function check_add_do_no(){
		$do_no = $this->input->post('do_no');
        $result = $this->delivery_order_model->do_no_exist($do_no);
        if($result){
	        $this->form_validation->set_message('check_add_do_no', 'This delivery order no already exist, try again');
	        return false;
        }
        return true;
	}
	public function check_edit_invoice_no($str, $id){
		$invoice_no = $this->input->post('invoice_no');
        $result = $this->invoice_model->invoice_no_exist($invoice_no, $id);
        if($result){
	        $this->form_validation->set_message('check_edit_invoice_no', 'This invoice no already exist, try again');
	        return false;
        }
        return true;
	}

	public function delete_payment($id="", $ip_id=""){
		if ($id==""||$ip_id=='') {
			show_404();
		}
		$quotation = $this->quotation_model->get($id);
		$this->invoice_payment_model->delete($ip_id);	
		$payment_total = $this->invoice_payment_model->get_payment_total($id);
		$amount_inc_gst = $quotation['total_inc_gst'];
		if (round($amount_inc_gst,2)<=0) {
			$this->invoice_model->unpaid_invoice($id);
		}
		else{
			if (round($payment_total,2)>=round($amount_inc_gst,2)) {
				$this->invoice_model->completed_invoice($id);
			}
			else{
				if (round($payment_total,2)==0) {
					$this->invoice_model->unpaid_invoice($id);
				}
				else{
					$this->invoice_model->partial_paid_invoice($id);
				}
			}
		}
		$this->session->set_flashdata('msg', 'Payment successfully deleted');
		redirect(base_url().'invoice/view/'.$id);
	}
	public function delete($id="") {
		if ($id=="") {
			show_404();
		}
		$this->invoice_model->delete($id);
		$this->session->set_flashdata('msg', 'Invoice successfully deleted');
		redirect(base_url().'invoice');
	}

	public function print_preview($id){
		$data['invoice'] = $this->invoice_model->get($id);
		$data['do'] = $this->delivery_order_model->get($id);
		if (empty($data['invoice'])) {
			show_404();
		}
		$data['quotation'] = $this->quotation_model->get($id);
		$data['quotation_products'] = $this->quotation_model->get_quotation_product($id);
		$data['customers'] = $this->customer_model->get();
		$data['products']  = $this->product_model->get();
		$data['quotation_id']  = $id;
		$data['action'] = 'print';
		$data['customer_info'] = $this->customer_model->get($data['quotation']['customer_id']);
		$this->load->view('_template/print-header', $data);
		$this->load->view('delivery_order/print', $data);
		$this->load->view('_template/print-footer', $data);
	}
	public function export_invoice(){
		$this->load->library('excel');
		$invoices = $this->invoice_model->get();
		$inv_export =  array();
		$no = 1;
		$total = 0; $total_paid = 0; $total_outstand = 0;
		foreach($invoices as $key=>$invoice) {     
			$inv_export[] = array(
				'No.'		        => $no,	
				'Invoice No.'		=> $invoice['invoice_no'],
				'Customer'			=> $invoice['company_name'],
				'Date' 				=> date('d-m-Y', $invoice['invoice_date']),
				'Total Amount'		=> $invoice['total_amount'],
				'GST'				=> $invoice['gst'].'%',
				'Total Inc GST'		=> $invoice['total_inc_gst'],
				'Status'            => $invoice['is_paid']==1?'Fully Paid':($invoice['is_paid']==0?'Unpaid':'Partial Paid'),
                'Payment Terms'     => $invoice['payment_terms'],
                'Due Date'          => date('d-m-Y', $invoice['due_date']),
                'Issued By'         => $invoice['issued_by'],
				'Remark'			=> $invoice['remark'],
				'Internal Remark'	=> $invoice['internal_remark'],
			);
			$total += $invoice['total_inc_gst'];
			$no++;
		}
		$inv_export[] = array(
				'No.'		        => '',	
				'Invoice No.'		=> '',
				'Customer'			=> '',
				'Date' 				=> '',
				'Total Amount'		=> '',
				'GST'				=> 'Total',
				'Total Inc GST'		=> $total,
				'Status'            => '',
                'Payment Terms'     => '',
                'Issued By'         => '',
				'Remark'			=> '',
				'Internal Remark'	=> '',
		);
		$this->excel->export($inv_export, "InvoiceReport(" . date('d-m-Y', time()) . ").xls");	
	}
}