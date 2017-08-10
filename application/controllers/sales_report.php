<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class sales_report extends CI_Controller {

	
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

		$this->load->model('customer_model');
		$this->load->model('sale_person_model');
		$this->load->model('invoice_model');
		$this->load->model('quotation_model');
		$this->load->model('invoice_payment_model');
		$this->load->model('credit_note_model');
		$this->load->model('debit_note_model');
	}

	public function index(){
		$data['msg'] = $this->session->flashdata('msg');
		$b_url = base_url().'sales_report/index';
		$t_rows = $this->invoice_model->count();
		$pageConfig = create_pagination_config( $b_url, $t_rows, 10, 3);
		$this->pagination->initialize($pageConfig);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		
		$data['sales_reports'] = $this->invoice_model->fetch($pageConfig['per_page'], $page);

		$data['links'] = $this->pagination->create_links();
		$current_page =  floor(($this->uri->segment(3) / $pageConfig['per_page']) + 1);
		$data['pagination_msg'] = create_pagination_msg($current_page, $pageConfig['per_page'], $t_rows);

		if ($data['sales_reports']!='') {
			foreach ($data['sales_reports']as $srk => $sales_report) {
				$invoice_id = $sales_report->invoice_id;
				$total_inc_gst = $sales_report->total_inc_gst;
				$total_paid = $this->invoice_payment_model->get_payment_total($invoice_id);
				$data['sales_reports'][$srk]->total_paid = $total_paid;
				$data['sales_reports'][$srk]->balance_of_payable = round($total_paid,2)<round($total_inc_gst,2)?round($total_inc_gst-$total_paid,2):'';
			}
		}
		$data['sale_persons'] = $this->sale_person_model->get();
		$data['customers'] = $this->customer_model->get();
		$this->load->view('_template/header', $data);
        $this->load->view('sales_report/index', $data);
        $this->load->view('_template/footer', $data);
	}

	public function export_sales_report(){
		$this->load->library('excel');
		$sales_reports = $this->invoice_model->get();
		if ($sales_reports!='') {
			foreach ($sales_reports as $srk => $sales_report) {
				$invoice_id = $sales_report['invoice_id'];
				$total_inc_gst = $sales_report['total_inc_gst'];
				$total_paid = $this->invoice_payment_model->get_payment_total($invoice_id);
				$sales_reports[$srk]['total_paid'] = $total_paid;
				$sales_reports[$srk]['balance_of_payable'] = round($total_paid,2)<round($total_inc_gst,2)?round($total_inc_gst-$total_paid,2):'';
			}
		}
		$sales_export =  array();
		$no = 1;
		$total = 0; $total_paid = 0; $total_outstand = 0;
		foreach($sales_reports as $key=>$sales_report) {     
			$sales_export[] = array(
				'No.'		        => $no,	
				'Invoice No.'		=> $sales_report['invoice_no'],
				'Customer'			=> $sales_report['company_name'],
				'Sale Person'		=> $sales_report['s_name'],
				'Date' 				=> date('d-m-Y', $sales_report['invoice_date']),
				'Total Amount'		=> $sales_report['total_amount'],
				'GST'				=> $sales_report['gst'].'%',
				'Total Inc GST'		=> $sales_report['total_inc_gst'],
				'Total Paid'		=> $sales_report['total_paid'],
				'Balance of Payable'=> $sales_report['balance_of_payable'],
				'Status'            => $sales_report['is_paid']==1?'Fully Paid':($sales_report['is_paid']==0?'Unpaid':'Partial Paid'),
                'Payment Terms'     => $sales_report['payment_terms'],
                'Issued By'         => $sales_report['issued_by'],
				'Remark'			=> $sales_report['remark'],
				'Internal Remark'	=> $sales_report['internal_remark'],
			);
			$total += $sales_report['total_inc_gst'];
			$total_paid += $sales_report['total_paid'];
			$total_outstand += $sales_report['balance_of_payable'];
			$no++;
		}
		$sales_export[] = array(
				'No.'		        => '',	
				'Invoice No.'		=> '',
				'Customer'			=> '',
				'Sale Person'		=> '',
				'Date' 				=> '',
				'Total Amount'		=> '',
				'GST'				=> 'Total',
				'Total Inc GST'		=> $total,
				'Total Paid'		=> $total_paid,
				'Total Outstanding' => $total_outstand,
				'Status'            => '',
                'Payment Terms'     => '',
                'Issued By'         => '',
				'Remark'			=> '',
				'Internal Remark'	=> '',
		);
		//print_out($sales_export);	die();
		$this->excel->export($sales_export, "SalesReport(" . date('d-m-Y', time()) . ").xls");	
	}
}