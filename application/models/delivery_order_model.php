<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class delivery_order_model extends CI_Model
{

    function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function get($id=NULL){

        $this->db->select('*');
        $this->db->from('delivery_order');
        $this->db->where('do_id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function add() {

        $data = array(
            'do_id'      => $this->input->post('do_id'),
            'do_no'      => $this->input->post('do_no'),
            'do_date'    => get_timestamp($this->input->post('do_date'), '-'),
            'remark'          => $this->input->post('remark')
        );

        $this->db->insert('delivery_order', $data);
        return $this->db->insert_id();
    }
    
    public function update($id){
        $data = array(
            'do_no'      => $this->input->post('do_no'),
            'do_date'    => get_timestamp($this->input->post('do_date'), '-'),
            'remark'     => $this->input->post('remark')
        );
        $this->db->where('do_id', $id);
        return $this->db->update('delivery_order', $data);
    }

    public function count(){
        $this->db->select('d.*,c.company_name');
        $this->db->from('delivery_order d');
        $this->db->join('invoice i', 'd.do_id=i.invoice_id', 'left');
        $this->db->join('quotation q', 'i.invoice_id=q.quotation_id', 'left');
        $this->db->join('customer c', 'c.customer_id=q.customer_id', 'left');
        $this->db->where('d.active', 1);
        if (isset($_GET['do_no'])&&$_GET['do_no']!='') {
            $this->db->like('d.do_no', $_GET['do_no']);
        }
        if (isset($_GET['customer'])&&$_GET['customer']!='') {
            $this->db->where('q.customer_id', $_GET['customer']);
        }
        $query = $this->db->get();
        return $query->num_rows(); 
    }

    public function fetch($limit, $start){

        $this->db->select('d.*,c.company_name');
        $this->db->from('delivery_order d');
        $this->db->join('invoice i', 'd.do_id=i.invoice_id', 'left');
        $this->db->join('quotation q', 'i.invoice_id=q.quotation_id', 'left');
        $this->db->join('customer c', 'c.customer_id=q.customer_id', 'left');
        $this->db->where('d.active', 1);
        if (isset($_GET['do_no'])&&$_GET['do_no']!='') {
            $this->db->like('d.do_no', $_GET['do_no']);
        }
        if (isset($_GET['customer'])&&$_GET['customer']!='') {
            $this->db->where('q.customer_id', $_GET['customer']);
        }

       if( $this->input->get('start') && ( $this->input->get('start') != '' ) ) { 
            $start_date = get_timestamp($this->input->get('start'), '/');
            $this->db->where('d.do_date >=', $start_date);
        }
        if( $this->input->get('end') && ( $this->input->get('end') != '' ) ) { 
            $end_date = get_timestamp($this->input->get('end'), '/');
            $this->db->where('d.do_date <=', $end_date);
        }
        $this->db->limit($limit, $start);
        if (isset($_GET['sort_by'])&&$_GET['sort_by']!='') {
            $this->db->order_by('do_date',$_GET['sort_by']);
        }
        else{
            $this->db->order_by('do_no','desc');
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

    public function do_id_exist($id){
        $query = $this->db->get_where('delivery_order', array('do_id' => $id));
        if ($query->num_rows()>=1) {
            return $query->row();
        }
        return false;
    }
    public function do_no_exist($do_no, $id=FALSE){
        if ($id) {
            $this->db->where('do_id !=', $id);
        }
        $query = $this->db->get_where('delivery_order', array('do_no' => $do_no));
        if ($query->num_rows()>=1) {
            return $query->row();
        }
        return false;
    }
    public function generate_do_no(){
        $this->db->select('do_no');
        $this->db->from('delivery_order');
        $this->db->limit(1);
        $this->db->order_by('do_no', 'desc');
        $query = $this->db->get();
        $row = $query->row_array();
        if ($query->num_rows()==1) {
            $last_do_no = $row['do_no'];
            $last_dn_ary = explode('-', $last_do_no);
            return 'DO-'.($last_dn_ary[1]+1);
        }
        else{
            return 'DO-10000';
        }
    }

    public function delete($id){
        $data = array(
            'active'          => 0,
        );
        $this->db->where('do_id', $id);
        return $this->db->update('delivery_order', $data);
    }


    public function getDo($do_id){
        $query = $this->db->get_where('delivery_order', array('do_id' => $do_id, 'active' => 1));
        return $query->row_array();
    }
}
// --------------------------------------------------------------------------------------------------------------------------