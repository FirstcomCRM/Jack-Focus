<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class purchase_order extends CI_Controller {

	
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

		$this->load->model('purchase_order_model');
		$this->load->model('supplier_model');
		$this->load->model('product_model');
		$this->load->model('po_payment_model');
	}

	public function index() {
		$data['msg'] = $this->session->flashdata('msg');
		$b_url = base_url().'purchase_order/index';
		$t_rows = $this->purchase_order_model->count();
		$pageConfig = create_pagination_config( $b_url, $t_rows, 10, 3);
		$this->pagination->initialize($pageConfig);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		
		$data['purchase_orders'] = $this->purchase_order_model->fetch($pageConfig['per_page'], $page);
		$data['links'] = $this->pagination->create_links();

		$current_page =  floor(($this->uri->segment(3) / $pageConfig['per_page']) + 1);
		$data['pagination_msg'] = create_pagination_msg($current_page, $pageConfig['per_page'], $t_rows);
		if ($data['purchase_orders']!='') {
			foreach ($data['purchase_orders'] as $qk => $purchase_order) {
				$amount = $this->purchase_order_model->get_amount($purchase_order->purchase_order_id);
				$data['purchase_orders'][$qk]->amount = $amount;
			}
		}
		$data['suppliers'] = $this->supplier_model->get();
		$this->load->view('_template/header', $data);
        $this->load->view('purchase_order/index', $data);
        $this->load->view('_template/footer', $data);
	}
	public function add(){
		$this->load->helper(array('form'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('supplier_id', 'supplier', 'required');
		$this->form_validation->set_rules('po_date', 'date', 'required');
		$this->form_validation->set_rules('gst', 'GST', 'required');

		if($this->form_validation->run() === FALSE) {
			$data['action'] = 'add';
			$data['suppliers'] = $this->supplier_model->get();
			$data['products']  = $this->product_model->get();
			$this->load->view('_template/header', $data);
			$this->load->view('purchase_order/add_edit', $data);
			$this->load->view('_template/footer', $data);
		}
		else{
			$purchase_order_id = $this->purchase_order_model->add();
			$this->session->set_flashdata('msg', '	Purchase Order Successfully Created');
			$ret = array(
				'status'    => 'success',
				'po_id'     => $purchase_order_id,
			);
			echo json_encode($ret);
		}
	}

	public function check_add_po_no(){
		$po_no = $this->input->post('po_no');
        $result = $this->purchase_order_model->po_no_exist($po_no);
        if($result){
	        $this->form_validation->set_message('check_add_po_no', 'This purchase order no already exist, try again');
	        return false;
        }
        return true;
	}
	public function view($id){
		$data['msg'] = $this->session->flashdata('msg');
		$data['purchase_order'] = $this->purchase_order_model->get($id);
		if (empty($data['purchase_order'])) {
			show_404();
		}
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('payment_date', 'payment date', 'required');
		$this->form_validation->set_rules('amount', 'amount', 'required|numeric');

		$data['po_products'] = $this->purchase_order_model->get_po_product($id);
		$data['suppliers'] = $this->supplier_model->get();
		$data['products']  = $this->product_model->get();
		$data['purchase_order_id']  = $id;
		$data['payments'] = $this->po_payment_model->get_po_payment($id);
		$data['purchase_order']['total_paid'] = $this->po_payment_model->get_payment_total($id);
		if($this->form_validation->run() === FALSE) {
			$data['action'] = 'view';
			$data['supplier_info'] = $this->supplier_model->get($data['purchase_order']['supplier_id']);
			$this->load->view('_template/header', $data);
			$this->load->view('purchase_order/view', $data);
			$this->load->view('_template/footer', $data);	
		}
		else{
			$this->po_payment_model->add();
			$payment_total = $this->po_payment_model->get_payment_total($id);
			$amount_inc_gst = $data['purchase_order']['total_inc_gst'];
			if (round($amount_inc_gst,2)<=0) {
				$this->purchase_order_model->unpaid_po($id);
			}
			else{
				if (round($payment_total,2)>=round($amount_inc_gst,2)) {
					$this->purchase_order_model->completed_po($id);
				}
				else{
					if (round($payment_total,2)==0) {
						$this->purchase_order_model->unpaid_po($id);
					}
					else{
						$this->purchase_order_model->partial_paid_po($id);
					}
				}
			}
			$this->session->set_flashdata('msg', 'Payment successfully created');
			redirect(base_url().'purchase_order/view/'.$id);
		}
	}
	public function edit($id){
		$data['msg'] = $this->session->flashdata('msg');
		$data['purchase_order'] = $this->purchase_order_model->get($id);
		if (empty($data['purchase_order'])) {
			show_404();
		}
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('supplier_id', 'supplier', 'required');
		$this->form_validation->set_rules('po_date', 'date', 'required');
		$this->form_validation->set_rules('gst', 'GST', 'required');

		if($this->form_validation->run() === FALSE) {
			
			$data['action'] = 'edit';
			$data['po_products'] = $this->purchase_order_model->get_po_product($id);
			$data['suppliers'] = $this->supplier_model->get();
			$data['products']  = $this->product_model->get();
			$data['purchase_order_id']  = $id;
			$this->load->view('_template/header', $data);
			$this->load->view('purchase_order/add_edit', $data);
			$this->load->view('_template/footer', $data);	
		}
		else {
			$this->purchase_order_model->update($id);
			$this->session->set_flashdata('msg', 'Purchase Order Successfully Updated');
			$ret = array(
				'status' 	=> 'success',
			);
			echo json_encode($ret);
		}
	}
	public function check_edit_po_no($str, $id){
		$po_no = $this->input->post('po_no');
        $result = $this->purchase_order_model->po_no_exist($po_no, $id);
        if($result){
	        $this->form_validation->set_message('check_edit_po_no', 'This Purchase order no already exist, try again');
	        return false;
        }
        return true;
	}

	public function delete($id="") {
		if ($id=="") {
			show_404();
		}
		$this->purchase_order_model->delete($id);	
		$this->session->set_flashdata('msg', 'Purchase order successfully deleted');
		redirect(base_url().'purchase_order');
	}

	public function aj_get_product_details($id) {
		$pp_details = $this->purchase_order_model->get_product_details($id);
		$pp_details['status'] = 'success';
		echo json_encode($pp_details);
	}
	public function aj_add_product_details(){
		$pp_id = $this->purchase_order_model->add_po_product();
		$ret = array(
			'status' 	=> 'success',
			'pp_id'	=> $pp_id,
		);
		echo json_encode($ret);
	}

	public function aj_remove_po_product($id) {
		$this->purchase_order_model->remove_po_product($id);
		$ret = array(
			'status' 	=> 'success',
		);
		echo json_encode($ret);
	}
	public function aj_update_po_total($id) {
		$this->purchase_order_model->update_po_total($id);
		$ret = array(
			'status' 	=> 'success',
		);
		echo json_encode($ret);
	}
	public function aj_edit_product_details($id){
		$this->purchase_order_model->update_po_product($id);
		$ret = array(
			'status' 	=> 'success',
		);
		echo json_encode($ret);
	}

	public function delete_payment($id="", $pp_id=""){
		if ($id==""||$pp_id=='') {
			show_404();
		}
		$purchase_order = $this->purchase_order_model->get($id);
		$amount = $this->purchase_order_model->get_amount($id);
		$this->po_payment_model->delete($pp_id);	
		$payment_total = $this->po_payment_model->get_payment_total($id);
		$amount_inc_gst = $purchase_order['total_inc_gst'];
		if (round($amount_inc_gst,2)<=0) {
			$this->purchase_order_model->unpaid_po($id);
		}
		else{
			if (round($payment_total,2)>=round($amount_inc_gst,2)) {
				$this->purchase_order_model->completed_po($id);
			}
			else{
				if (round($payment_total,2)==0) {
					$this->purchase_order_model->unpaid_po($id);
				}
				else{
					$this->purchase_order_model->partial_paid_po($id);
				}
			}
		}
		$this->session->set_flashdata('msg', 'Payment successfully deleted');
		redirect(base_url().'purchase_order/view/'.$id);
	}

	public function print_preview($id){
		$data['purchase_order'] = $this->purchase_order_model->get($id);
		if (empty($data['purchase_order'])) {
			show_404();
		}
		$data['po_products'] = $this->purchase_order_model->get_po_product($id);
		$data['suppliers'] = $this->supplier_model->get();
		$data['products']  = $this->product_model->get();
		$data['purchase_order_id']  = $id;
		$data['payments'] = $this->po_payment_model->get_po_payment($id);
		$data['purchase_order']['total_paid'] = $this->po_payment_model->get_payment_total($id);
		$data['action'] = 'print';
		$data['supplier_info'] = $this->supplier_model->get($data['purchase_order']['supplier_id']);
		$this->load->view('_template/print-header', $data);
		$this->load->view('purchase_order/print', $data);
		$this->load->view('_template/print-footer', $data);
	}
	public function export_po(){
        $this->load->library('excel');
        $pos = $this->purchase_order_model->get();
        $po_export =  array();
        $no = 1;
        $total = 0; $total_paid = 0; $total_outstand = 0;
        foreach($pos as $key=>$po) {     
            $po_export[] = array(
                'No.'               => $no, 
                'PO No.'            => $po['po_no'],
                'Supplier'          => $po['company_name'],
                'Date'              => date('d-m-Y', $po['po_date']),
                'Total Amount'      => $po['total_amount'],
                'GST'               => $po['gst'].'%',
                'Total Inc GST'     => $po['total_inc_gst'],
                'Status'            => $po['is_paid']==1?'Fully Paid':($po['is_paid']==0?'Unpaid':'Partial Paid'),
                'Issued By'         => $po['issued_by'],
                'Remark'            => $po['remark'],
				'Internal Remark'	=> $po['internal_remark'],
            );
            $total += $po['total_inc_gst'];
            $no++;
        }
        $po_export[] = array(
                'No.'               => '',  
                'PO No.'            => '',
                'Supplier'          => '',
                'Date'              => '',
                'Total Amount'      => '',
                'GST'               => 'Total',
                'Total Inc GST'     => $total,
                'Status'            => '',
                'Issued By'         => '',
                'Remark'            => '',
				'Internal Remark'	=> '',
        );
        $this->excel->export($po_export, "PoReport(" . date('d-m-Y', time()) . ").xls");  
    }
}