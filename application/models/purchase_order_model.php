<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class purchase_order_model extends CI_Model
{

    function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function get($id=FALSE){
        if ($id === FALSE) {
            $this->db->select('po.*, s.company_name');
            $this->db->from('purchase_order po');
            $this->db->join('supplier s','po.supplier_id=s.supplier_id', 'left');
            $this->db->where('po.active', 1);
            $query = $this->db->get();
            return $query->result_array();
        }
        $this->db->select('po.*, s.company_name');
        $this->db->from('purchase_order po');
        $this->db->join('supplier s','po.supplier_id=s.supplier_id', 'left');
        $this->db->where('po.purchase_order_id' ,$id);
        $this->db->where('po.active', 1);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function add() {
        $data = array(
            'supplier_id'          => $this->input->post('supplier_id'),
            'po_date'              => get_timestamp($this->input->post('po_date'), '-'),
            'po_no'                => $this->generate_po_no(),
            'total_amount'         => $this->input->post('total_amount'),
            'gst'                  => $this->input->post('gst'),
            'total_inc_gst'        => $this->input->post('total_inc_gst'),
            'issued_by'            => $this->input->post('issued_by'),
            'remark'               => $this->input->post('remark'),
            'internal_remark'      => $this->input->post('internal_remark'),
        );
        $this->db->insert('purchase_order', $data);
        $purchase_order_id = $this->db->insert_id();
        $this->addpodetail($purchase_order_id);
        return $purchase_order_id;
    }
    
    public function addpodetail($id) {
        $details = $this->input->post('purchase_detail');
        if($details) {
            foreach($details as $detail) {
                $data = array(
                    'purchase_order_id' => $id,
                    'product_id'        => $detail['product_id'],
                    'unit_price'        => $detail['unit_price'],
                    'quantity'          => $detail['quantity'],
                    'total_amount'      => $detail['total'],
                    'remark'            => $detail['p_remark'],
                );
                $this->db->insert('po_product', $data);  
                //update product quantity
                $this->db->query("UPDATE product SET quantity = quantity+".$detail['quantity']." WHERE product_id = ".$detail['product_id']);
            }   
        }
    }
    public function update($id){
        $data = array(
            'supplier_id'          => $this->input->post('supplier_id'),
            'po_date'              => get_timestamp($this->input->post('po_date'), '-'),
            'total_amount'         => $this->input->post('total_amount'),
            'gst'                  => $this->input->post('gst'),
            'total_inc_gst'        => $this->input->post('total_inc_gst'),
            'issued_by'            => $this->input->post('issued_by'),
            'remark'               => $this->input->post('remark'),
            'internal_remark'      => $this->input->post('internal_remark'),
        );
        $this->db->where('purchase_order_id', $id);
        return $this->db->update('purchase_order', $data);
    }

    public function count(){
        $this->db->select('po.*, s.company_name');
        $this->db->from('purchase_order po');
        $this->db->join('supplier s', 'po.supplier_id = s.supplier_id', 'left');
        $this->db->join('po_product pp', 'po.purchase_order_id = pp.purchase_order_id', 'left');
        $this->db->where('po.active', 1);
        if (isset($_GET['po.po_no'])&&$_GET['po_no']!='') {
            $this->db->like('po.po_no', $_GET['po_no']);
        }
        if (isset($_GET['supplier'])&&$_GET['supplier']!='') {
            $this->db->where('po.supplier_id', $_GET['supplier']);
        }
        if (isset($_GET['status'])&&$_GET['status']!='') {
            $this->db->where('po.is_paid', $_GET['status']);
        }
        if (isset($_GET['product_id'])&&$_GET['product_id']!='') {
            $this->db->where('pp.product_id', $_GET['product_id']);
        }
        $this->db->group_by('purchase_order_id'); 
        $query = $this->db->get();
        return $query->num_rows(); 
    }

    public function fetch($limit, $start){
        $this->db->select('po.*, c.company_name');
        $this->db->from('purchase_order po');
        $this->db->join('supplier c', 'po.supplier_id = c.supplier_id', 'left');
        $this->db->join('po_product pp', 'po.purchase_order_id = pp.purchase_order_id', 'left');
        $this->db->where('po.active', 1);
        if (isset($_GET['po_no'])&&$_GET['po_no']!='') {
            $this->db->like('po.po_no', $_GET['po_no']);
        }
        if (isset($_GET['supplier'])&&$_GET['supplier']!='') {
            $this->db->where('po.supplier_id', $_GET['supplier']);
        }
        if (isset($_GET['issued_by'])&&$_GET['issued_by']!='') {
            $this->db->like('po.issued_by', $_GET['issued_by']);
        }
        if (isset($_GET['status'])&&$_GET['status']!='') {
            $this->db->where('po.is_paid', $_GET['status']);
        }
        if (isset($_GET['product_id'])&&$_GET['product_id']!='') {
            $this->db->where('pp.product_id', $_GET['product_id']);
        }
        $this->db->limit($limit, $start);
        if (isset($_GET['sort_by'])&&$_GET['sort_by']!='') {
            $this->db->order_by('po.po_date', $_GET['sort_by']);
        }
        else{
            $this->db->order_by('po_no','desc');
        }
        $this->db->group_by('purchase_order_id'); 
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    public function po_no_exist($po_no, $id=FALSE){
        if ($id) {
            $this->db->where('purchase_order_id !=', $id);
        }
        $query = $this->db->get_where('purchase_order', array('po_no' => $po_no));
        if ($query->num_rows()>=1) {
            return $query->row();
        }
        return false;
    }
    public function completed_po($id){
        $data = array(
            'is_paid'      => 1,
        );
        $this->db->where('purchase_order_id', $id);
        return $this->db->update('purchase_order', $data);
    }
    public function partial_paid_po($id){
        $data = array(
            'is_paid'      => (-1),
        );
        $this->db->where('purchase_order_id', $id);
        return $this->db->update('purchase_order', $data);
    }
    public function unpaid_po($id){
        $data = array(
            'is_paid'      => 0,
        );
        $this->db->where('purchase_order_id', $id);
        return $this->db->update('purchase_order', $data);
    }

    public function delete($id){
        $data = array(
            'active'          => 0,
        );
        $this->db->where('purchase_order_id', $id);
        return $this->db->update('purchase_order', $data);
    }

    public function get_amount($id){
        $this->db->select('SUM(unit_price*quantity) AS amount');
        $this->db->from('po_product');
        $this->db->where('purchase_order_id', $id);
        $this->db->where('active', 1);
        $query = $this->db->get();
        $row =  $query->row_array();
        return $row['amount'];
    }
    public function generate_po_no(){
        $this->db->select('po_no');
        $this->db->from('purchase_order');
        $this->db->limit(1);
        $this->db->order_by('po_no', 'desc');
        $query = $this->db->get();
        $row = $query->row_array();
        if ($query->num_rows()==1) {
            $last_quo_no = $row['po_no'];
            $last_qn_ary = explode('-', $last_quo_no);
            return 'PO-'.($last_qn_ary[1]+1);
        }
        else{
            return 'PO-10000';
        }
    }
    public function get_po_product($id){
        $this->db->select('pp.*, p.product_name, (pp.unit_price*pp.quantity) as total');
        $this->db->from('po_product pp');
        $this->db->join('product p', 'pp.product_id=p.product_id', 'left');
        $this->db->where('pp.active', 1);
        $this->db->where('pp.purchase_order_id', $id);
        $this->db->order_by('pp.po_product_id');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_product_details($pp_id){
        $query = $this->db->get_where('po_product', array('po_product_id' => $pp_id));
        return $query->row_array();
    }
    public function add_po_product(){

        $this->db->query("UPDATE product SET quantity = quantity+".$this->input->post('quantity')." WHERE product_id=".$this->input->post('product_id'));

        $data = array(
            'purchase_order_id' => $this->input->post('purchase_order_id'),
            'product_id'        => $this->input->post('product_id'),
            'unit_price'        => $this->input->post('unit_price'),
            'quantity'          => $this->input->post('quantity'),
            'total_amount'      => $this->input->post('total'),
            'remark'            => $this->input->post('p_remark'),
        );
        $this->db->insert('po_product', $data);
        return $this->db->insert_id();
    }
    public function remove_po_product($pp_id){

        $po_product = $this->db->query("SELECT * FROM po_product WHERE po_product_id = $pp_id");

        $this->db->query("UPDATE product SET quantity = quantity-".$po_product->row('quantity')." WHERE product_id=".$po_product->row('product_id'));

        $data = array(
            'active'          => 0,
        );

        $this->db->where('po_product_id', $pp_id);
        return $this->db->update('po_product', $data);

    }

    public function update_po_total($id){
        $data = array(
           
            'total_amount'         => $this->input->post('total_amount'),
            'total_inc_gst'        => $this->input->post('total_inc_gst'),
            
        );
        $this->db->where('purchase_order_id', $id);
        return $this->db->update('purchase_order', $data);
    }

    public function update_po_product($id){

        $po_product = $this->db->query("SELECT * FROM po_product WHERE po_product_id = $id");

        $this->db->query("UPDATE product SET quantity = quantity-".$po_product->row('quantity')."+".$this->input->post('quantity')." WHERE product_id=".$po_product->row('product_id'));

        $data = array(
            'purchase_order_id' => $this->input->post('purchase_order_id'),
            'product_id'        => $this->input->post('product_id'),
            'unit_price'        => $this->input->post('unit_price'),
            'quantity'          => $this->input->post('quantity'),
            'total_amount'      => $this->input->post('total'),
            'remark'            => $this->input->post('p_remark'),
        );
        $this->db->where('po_product_id', $id);
        return $this->db->update('po_product', $data);
    }

    
}
// --------------------------------------------------------------------------------------------------------------------------