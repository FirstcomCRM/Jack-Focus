<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class sales_model extends CI_Model
{

    function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function get($id=FALSE){
        if ($id === FALSE) {
            $this->db->where('active =', 1);
            $this->db->order_by('sales_id','desc');
            $query = $this->db->get('sales');
            return $query->result_array();
        }
        $query = $this->db->get_where('sales', array('sales_id' => $id, 'active' => 1));
        return $query->row_array();
    }

    public function add() {
        $data = array(
            'insurance_name'         => $this->input->post('insurance_name'),
            'fee'                    => $this->input->post('fee'),
            'deposit'                => $this->input->post('deposit'),
            'payment_mode'           => $this->input->post('payment_mode'),
            'replacement_period'     => $this->input->post('replacement_period'),
            'description'            => $this->input->post('description'),
            
            
            //'last_update'     => time(),
        );
        $this->db->insert('sales', $data);
        return $this->db->insert_id();
    }
    
    public function update($id){
        $data = array(
            'insurance_name'         => $this->input->post('insurance_name'),
            'fee'                    => $this->input->post('fee'),
            'deposit'                => $this->input->post('deposit'),
            'payment_mode'           => $this->input->post('payment_mode'),
            'replacement_period'     => $this->input->post('replacement_period'),
            'description'            => $this->input->post('description'),
        
            //'last_update'     => time(),
        );
        $this->db->where('sales_id', $id);
        return $this->db->update('sales', $data);
    }
   /* public function count(){
        $this->db->select('*');
        $this->db->where('active', 1);
        if (isset($_GET['receipt_no'])&&$_GET['receipt_no']!='') {
            $this->db->like('receipt_no', $_GET['receipt_no']);
        }

  
        $query = $this->db->get('sales');
        return $query->num_rows(); 
    }

    public function fetch($limit, $start){
        $this->db->select('sales.*');
        $this->db->from('sales');
        $this->db->where('active', 1);
        if (isset($_GET['receipt_no'])&&$_GET['receipt_no']!='') {
            $this->db->like('receipt_no', $_GET['receipt_no']);
        }

        $this->db->limit($limit, $start);
        if (isset($_GET['sort_by'])&&$_GET['sort_by']!='') {
            $this->db->order_by($_GET['sort_by']);
        }
        else{
            $this->db->order_by('sales_id','desc');
        }
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }*/

    public function count(){
       $this->db->select('q.*, c.customer_name, s.staff_name as s_name, ip.amount, ip.remark,ip.payment_type,ip.payment_date,
                         m.maid_name, m.maid_ref_no, s.staff_id, m.maid_id, m.maid_ref_no');
        $this->db->from('quotation_maid q');
        $this->db->join('customer_maid c', 'q.customer_id = c.customer_id', 'left');
        $this->db->join('staff s', 's.staff_id=q.staff_id', 'left');
        $this->db->join('quotation_maid_product qp', 'qp.quotation_id = q.quotation_id', 'left');
        $this->db->join('invoice_maid_payment ip', 'ip.quotation_id = q.quotation_id', 'left');
        $this->db->join('maid m', 'm.maid_id = qp.maid_id', 'left');
        $this->db->where('q.active', 1);
        if (isset($_GET['quotation_no'])&&$_GET['quotation_no']!='') {
            $this->db->like('q.quotation_no', $_GET['quotation_no']);
        }
        if (isset($_GET['customer'])&&$_GET['customer']!='') {
            $this->db->where('q.customer_id', $_GET['customer']);
        }
     /*  if (isset($_GET['date_from'])&&$_GET['date_from']!='') {
            $this->db->where('q.quotation_date >=', get_earliesttimestamp($_GET['date_from'],'-'));
        }else{
            $this->db->where('q.quotation_date >=', get_earliesttimestamp(date('d-m-Y'),'-'));
        }
        if (isset($_GET['date_to'])&&$_GET['date_to']!='') {
            $this->db->where('q.quotation_date <=', get_latesttimestamp($_GET['date_to'],'-'));
        }else{
            $this->db->where('q.quotation_date <=', get_latesttimestamp(date('d-m-Y'),'-'));
        }*/
        if (isset($_GET['issued_by'])&&$_GET['issued_by']!='') {
            $this->db->like('q.issued_by', $_GET['issued_by']);
        }
        if (isset($_GET['staff_id'])&&$_GET['staff_id']!='') {
            $this->db->where('s.staff_id', $_GET['staff_id']);
        }
        if (isset($_GET['maid_id'])&&$_GET['maid_id']!='') {
            $this->db->where('qp.maid_id', $_GET['maid_id']);
        }
        if (isset($_GET['status'])&&$_GET['status']!='') {
            $this->db->where('q.is_close', $_GET['status']);
        }

  
        $query = $this->db->get('sales');
        return $query->num_rows(); 
    }


    public function fetch($limit, $start){
        $this->db->select('q.*, c.customer_name, s.staff_name as s_name, ip.amount, ip.remark,ip.payment_type,ip.payment_date,
                         m.maid_name, m.maid_ref_no, s.staff_id, m.maid_id, m.maid_ref_no');
        $this->db->from('quotation_maid q');
        $this->db->join('customer_maid c', 'q.customer_id = c.customer_id', 'left');
        $this->db->join('staff s', 's.staff_id=q.staff_id', 'left');
        $this->db->join('quotation_maid_product qp', 'qp.quotation_id = q.quotation_id', 'left');
        $this->db->join('invoice_maid_payment ip', 'ip.quotation_id = q.quotation_id', 'left');
        $this->db->join('maid m', 'm.maid_id = qp.maid_id', 'left');
        $this->db->where('q.active', 1);
        if (isset($_GET['quotation_no'])&&$_GET['quotation_no']!='') {
            $this->db->like('q.quotation_no', $_GET['quotation_no']);
        }
        if (isset($_GET['customer'])&&$_GET['customer']!='') {
            $this->db->where('q.customer_id', $_GET['customer']);
        }
     /*  if (isset($_GET['date_from'])&&$_GET['date_from']!='') {
            $this->db->where('q.quotation_date >=', get_earliesttimestamp($_GET['date_from'],'-'));
        }else{
            $this->db->where('q.quotation_date >=', get_earliesttimestamp(date('d-m-Y'),'-'));
        }
        if (isset($_GET['date_to'])&&$_GET['date_to']!='') {
            $this->db->where('q.quotation_date <=', get_latesttimestamp($_GET['date_to'],'-'));
        }else{
            $this->db->where('q.quotation_date <=', get_latesttimestamp(date('d-m-Y'),'-'));
        }*/
        if (isset($_GET['issued_by'])&&$_GET['issued_by']!='') {
            $this->db->like('q.issued_by', $_GET['issued_by']);
        }
        if (isset($_GET['staff_id'])&&$_GET['staff_id']!='') {
            $this->db->where('s.staff_id', $_GET['staff_id']);
        }
        if (isset($_GET['maid_id'])&&$_GET['maid_id']!='') {
            $this->db->where('qp.maid_id', $_GET['maid_id']);
        }
        if (isset($_GET['status'])&&$_GET['status']!='') {
            $this->db->where('q.is_close', $_GET['status']);
        }
        $this->db->limit($limit, $start);
        if (isset($_GET['sort_by'])&&$_GET['sort_by']!='') {
            $this->db->order_by( $_GET['sort_by']);
       }
       else{
           $this->db->order_by('ip.payment_date','desc');
       // }
        //$this->db->group_by('quotation_id'); 
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
}

    public function company_name_exist($company_name, $id=FALSE){
        if ($id) {
            $this->db->where('customer_id !=', $id);
        }
        $query = $this->db->get_where('customer', array('company_name' => $company_name, 'active' => 1));
        if ($query->num_rows()>=1) {
            return $query->row();
        }
        return false;
    }
    public function delete($id){
        $data = array(
            'active'          => 0,
        );
        $this->db->where('insurance_id', $id);
        return $this->db->update('insurance_package', $data);
    }
}
// --------------------------------------------------------------------------------------------------------------------------