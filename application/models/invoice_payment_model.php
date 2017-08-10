<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class invoice_payment_model extends CI_Model
{

    function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function get($id=FALSE){
        if ($id === FALSE) {
            $this->db->where('active =', 1);
            $this->db->order_by('invoice_payment_id','desc');
            $query = $this->db->get('invoice_maid_payment');
            return $query->result_array();
        }
        $query = $this->db->get_where('invoice_maid_payment', array('invoice_payment_id' => $id, 'active' => 1));
        return $query->row_array();
    }

    public function add() {
        $data = array(
            'quotation_id'    => $this->input->post('quotation_id'),
            'payment_date'    => get_timestamp($this->input->post('payment_date'), '-'),
            'amount'          => $this->input->post('amount'),
            'payment_type'    => $this->input->post('payment_type'),
            'remark'          => $this->input->post('remark'),
        );
        $this->db->insert('invoice_maid_payment', $data);
        return $this->db->insert_id();
    }
    
    public function delete($id){
        $data = array(
            'active'          => 0,
        );
        $this->db->where('invoice_payment_id', $id);
        return $this->db->update('invoice_maid_payment', $data);
    }

    public function count(){
        $this->db->select('*');
        $this->db->where('active', 1);
        if (isset($_GET['category_name'])&&$_GET['category_name']!='') {
            $this->db->like('category_name', $_GET['category_name']);
        }

        if (isset($_GET['description'])&&$_GET['description']!='') {
            $this->db->like('description', $_GET['description']);
        }
        $query = $this->db->get('invoice_payment');
        return $query->num_rows(); 
    }

    public function fetch($limit, $start){
        $this->db->select('invoice_maid_payment.*');
        $this->db->from('invoice_maid_payment');
        $this->db->where('active', 1);
        if (isset($_GET['category_name'])&&$_GET['category_name']!='') {
            $this->db->like('category_name', $_GET['category_name']);
        }

        if (isset($_GET['description'])&&$_GET['description']!='') {
            $this->db->like('description', $_GET['description']);
        }
        $this->db->limit($limit, $start);
        if (isset($_GET['sort_by'])&&$_GET['sort_by']!='') {
            $this->db->order_by('last_update',$_GET['sort_by']);
        }
        else{
            $this->db->order_by('invoice_payment_id','desc');
        }
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    public function get_invoice_payment($quotation_id){
        $this->db->where('active =', 1);
        $this->db->where('quotation_id =', $quotation_id);
        $this->db->order_by('invoice_payment_id','desc');
        $query = $this->db->get('invoice_maid_payment');
        return $query->result_array();
    }
    public function get_payment_total($quotation_id){
        $this->db->select('SUM(amount) AS total_amount');
        $this->db->where('active =', 1);
        $this->db->where('quotation_id =', $quotation_id);
        $this->db->limit(1);
        $query = $this->db->get('invoice_maid_payment');
        $row = $query->row_array();
        return $row['total_amount'];
    }
}
// --------------------------------------------------------------------------------------------------------------------------