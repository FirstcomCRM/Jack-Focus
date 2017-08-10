<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class debit_note_maid_model extends CI_Model
{

    function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function get($id=FALSE){
        if ($id === FALSE) {
            $this->db->where('active =', 1);
            $this->db->order_by('debit_note_id','desc');
            $query = $this->db->get('debit_note');
            return $query->result_array();
        }
        $query = $this->db->get_where('debit_note', array('debit_note_id' => $id, 'active' => 1));
        return $query->row_array();
    }

    public function add() {
        $data = array(
            'invoice_id'      => $this->input->post('invoice_id'),
            'dn_no'           => $this->input->post('dn_no'),
            'dn_date'         => get_timestamp($this->input->post('dn_date'), '-'),
            'amount'          => $this->input->post('amount'),
            'remark'          => $this->input->post('remark'),
        );
        $this->db->insert('debit_note', $data);
        return $this->db->insert_id();
    }
    
    public function delete($id){
        $data = array(
            'active'          => 0,
        );
        $this->db->where('debit_note_id', $id);
        return $this->db->update('debit_note', $data);
    }

    public function count(){
        $this->db->select('dn.*, i.invoice_no, q.gst');
        $this->db->from('debit_note dn');
        $this->db->join('invoice i', 'i.invoice_id=dn.invoice_id', 'left');
        $this->db->join('quotation q', 'q.quotation_id=dn.invoice_id', 'left');
        $this->db->where('dn.active', 1);
        if (isset($_GET['dn_no'])&&$_GET['dn_no']!='') {
            $this->db->like('dn.dn_no', $_GET['dn_no']);
        }
        if (isset($_GET['invoice_no'])&&$_GET['invoice_no']!='') {
            $this->db->like('i.invoice_no', $_GET['invoice_no']);
        }
        if (isset($_GET['issued_by'])&&$_GET['issued_by']!='') {
            $this->db->like('dn.issued_by', $_GET['issued_by']);
        }
        $query = $this->db->get();
        return $query->num_rows(); 
    }

    public function fetch($limit, $start){
        $this->db->select('dn.*, i.invoice_no, q.gst');
        $this->db->from('debit_note dn');
        $this->db->join('invoice i', 'i.invoice_id=dn.invoice_id', 'left');
        $this->db->join('quotation q', 'q.quotation_id=dn.invoice_id', 'left');
        $this->db->where('dn.active', 1);
        if (isset($_GET['dn_no'])&&$_GET['dn_no']!='') {
            $this->db->like('dn.dn_no', $_GET['dn_no']);
        }
        if (isset($_GET['invoice_no'])&&$_GET['invoice_no']!='') {
            $this->db->like('i.invoice_no', $_GET['invoice_no']);
        }
        if (isset($_GET['issued_by'])&&$_GET['issued_by']!='') {
            $this->db->like('dn.issued_by', $_GET['issued_by']);
        }
        $this->db->limit($limit, $start);
        if (isset($_GET['sort_by'])&&$_GET['sort_by']!='') {
            $this->db->order_by('dn_date',$_GET['sort_by']);
        }
        else{
            $this->db->order_by('dn.debit_note_id','desc');
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

    public function get_debit_note($invoice_id){
        $this->db->where('active =', 1);
        $this->db->where('invoice_id =', $invoice_id);
        $this->db->order_by('debit_note_id','desc');
        $query = $this->db->get('debit_note');
        return $query->result_array();
    }
    public function get_dn_total($invoice_id){
        $this->db->select('SUM(amount) AS total_amount');
        $this->db->where('active =', 1);
        $this->db->where('invoice_id =', $invoice_id);
        $this->db->limit(1);
        $query = $this->db->get('debit_note');
        $row = $query->row_array();
        return $row['total_amount'];
    }
    public function dn_no_exist($dn_no, $id=FALSE){
        if ($id) {
            $this->db->where('debit_note_id !=', $id);
        }
        $query = $this->db->get_where('debit_note', array('dn_no' => $dn_no));
        if ($query->num_rows()>=1) {
            return $query->row();
        }
        return false;
    }
    public function generate_dn_no(){
        $this->db->select('dn_no');
        $this->db->from('debit_note');
        $this->db->limit(1);
        $this->db->order_by('dn_no', 'desc');
        $query = $this->db->get();
        $row = $query->row_array();
        if ($query->num_rows()==1) {
            $last_quo_no = $row['dn_no'];
            $last_qn_ary = explode('-', $last_quo_no);
            return 'DN-'.($last_qn_ary[1]+1);
        }
        else{
            return 'DN-10000';
        }
    }
}
// --------------------------------------------------------------------------------------------------------------------------