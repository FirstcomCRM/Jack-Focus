<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class credit_note_model extends CI_Model
{

    function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function get($id=FALSE){
        if ($id === FALSE) {
            $this->db->where('active =', 1);
            $this->db->order_by('credit_note_id','desc');
            $query = $this->db->get('credit_maid_note');
            return $query->result_array();
        }
        $query = $this->db->get_where('credit_maid_note', array('credit_note_id' => $id, 'active' => 1));
        return $query->row_array();
    }

    public function add() {
        $data = array(
            'quotation_id'      => $this->input->post('quotation_id'),
            'cn_no'           => $this->input->post('cn_no'),
            'cn_date'         => get_timestamp($this->input->post('cn_date'), '-'),
            'amount'          => $this->input->post('amount'),
            'remark'          => $this->input->post('remark'),
            'issued_by'       => $this->input->post('issued_by'),
        );
        $this->db->insert('credit_maid_note', $data);
        return $this->db->insert_id();
    }
    
    public function delete($id){
        $data = array(
            'active'          => 0,
        );
        $this->db->where('credit_note_id', $id);
        return $this->db->update('credit_maid_note', $data);
    }

    public function count(){
        $this->db->select('cn.*, i.*');
        $this->db->from('credit_maid_note cn');
        $this->db->join('quotation_maid i', 'i.quotation_id=cn.quotation_id', 'left'); //critical
        //$this->db->join('quotation q', 'q.quotation_id=cn.invoice_id', 'left');
        $this->db->where('cn.active', 1);
        if (isset($_GET['cn_no'])&&$_GET['cn_no']!='') {
            $this->db->like('cn.cn_no', $_GET['cn_no']);
        }
        //if (isset($_GET['invoice_no'])&&$_GET['invoice_no']!='') {
        //    $this->db->like('i.invoice_no', $_GET['invoice_no']);
        //}
        if (isset($_GET['issued_by'])&&$_GET['issued_by']!='') {
            $this->db->like('cn.issued_by', $_GET['issued_by']);
        }
        $query = $this->db->get();
        return $query->num_rows(); 
    }

    public function fetch($limit, $start){
        $this->db->select('cn.*, i.invoice_no, q.gst');
        $this->db->from('credit_note cn');
        $this->db->join('quotation_maid i', 'i.quotation_id=cn.invoice_id', 'left');
        //$this->db->join('quotation q', 'q.quotation_id=cn.invoice_id', 'left');
        $this->db->where('cn.active', 1);
        if (isset($_GET['cn_no'])&&$_GET['cn_no']!='') {
            $this->db->like('cn.cn_no', $_GET['cn_no']);
        }
       // if (isset($_GET['invoice_no'])&&$_GET['invoice_no']!='') {
       //     $this->db->like('i.invoice_no', $_GET['invoice_no']);
       // }
        if (isset($_GET['issued_by'])&&$_GET['issued_by']!='') {
            $this->db->like('cn.issued_by', $_GET['issued_by']);
        }
        $this->db->limit($limit, $start);
        if (isset($_GET['sort_by'])&&$_GET['sort_by']!='') {
            $this->db->order_by('cn_date',$_GET['sort_by']);
        }
        else{
            $this->db->order_by('cn.credit_note_id','desc');
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

    public function get_credit_note($quotation_id){
        $this->db->where('active =', 1);
        $this->db->where('quotation_id =', $quotation_id);
        $this->db->order_by('credit_note_id','desc');
        $query = $this->db->get('credit_maid_note');
        return $query->result_array();
    }
    public function get_cn_total($quotation_id){
        $this->db->select('SUM(amount) AS total_amount');
        $this->db->where('active =', 1);
        $this->db->where('quotation_id =', $quotation_id);
        $this->db->limit(1);
        $query = $this->db->get('credit_maid_note');
        $row = $query->row_array();
        return $row['total_amount'];
    }
    public function cn_no_exist($cn_no, $id=FALSE){
        if ($id) {
            $this->db->where('credit_note_id !=', $id);
        }
        $query = $this->db->get_where('credit_maid_note', array('cn_no' => $cn_no));
        if ($query->num_rows()>=1) {
            return $query->row();
        }
        return false;
    }
    public function generate_cn_no(){
        $this->db->select('cn_no');
        $this->db->from('credit_maid_note');
        $this->db->limit(1);
        $this->db->order_by('cn_no', 'desc');
        $query = $this->db->get();
        $row = $query->row_array();
        if ($query->num_rows()==1) {
            $last_quo_no = $row['cn_no'];
            $last_qn_ary = explode('-', $last_quo_no);
            return 'CN-'.($last_qn_ary[1]+1);
        }
        else{
            return 'CN-10000';
        }
    }
}
// --------------------------------------------------------------------------------------------------------------------------