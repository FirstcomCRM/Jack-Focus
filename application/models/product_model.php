<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class product_model extends CI_Model
{

    function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function get($id=FALSE){
        if ($id === FALSE) {
            $this->db->select('*');
            $this->db->from('product p');
            $this->db->join('product_type pt', 'p.product_id = pt.product_id', 'left');
            $this->db->where('p.active', 1);
            $this->db->where('pt.active', 1);
            $this->db->group_by('p.product_id');
            $query = $this->db->get();
            return $query->result_array();
        }
        $this->db->select('*');
        $this->db->from('product p');
        $this->db->join('product_type pt', 'p.product_id = pt.product_id', 'left');
        $this->db->where('p.active', 1);
        $this->db->where('pt.active', 1);
        $this->db->where('p.product_id', $id);
        $this->db->group_by('p.product_id');
        $query = $this->db->get();
        return $query->row_array();
    }
    public function add() {
        $data = array(
            'product_name'         => $this->input->post('product_name'),
            'description'          => $this->input->post('description'),
            'quantity'             => $this->input->post('quantity'),
            'cost_price'           => $this->input->post('cost_price'),
            'last_update'          => time(),
        );
        $this->db->insert('product', $data);
        return $this->db->insert_id();;
    }
    public function count(){
        $this->db->select('p.*');
        $this->db->from('product p');
        $this->db->join('product_type pt', 'p.product_id = pt.product_id', 'left');
        $this->db->where('p.active', 1);
        if (isset($_GET['product_category'])&&$_GET['product_category']!='') {
            $this->db->where('pt.product_category_id', $_GET['product_category']);
            $this->db->where('pt.active', 1);
        }
        if (isset($_GET['product_name'])) {
            $this->db->like('p.product_name', $_GET['product_name']);
        }
        if (isset($_GET['description'])) {
            $this->db->like('p.description', $_GET['description']);
        }
        $this->db->group_by('p.product_id');
        $query = $this->db->get();
        return $query->num_rows(); 
    }
    public function fetch($limit, $start){
        $this->db->select('p.*');
        $this->db->from('product p');
        $this->db->join('product_type pt', 'p.product_id = pt.product_id', 'left');
        $this->db->where('p.active', 1);
        if (isset($_GET['product_category'])&&$_GET['product_category']!='') {
            $this->db->where('pt.product_category_id', $_GET['product_category']);
            $this->db->where('pt.active', 1);
        }
        if (isset($_GET['product_name'])) {
            $this->db->like('p.product_name', $_GET['product_name']);
        }
        if (isset($_GET['description'])) {
            $this->db->like('p.description', $_GET['description']);
        }
        $this->db->group_by('p.product_id');
        $this->db->limit($limit, $start);
        if (isset($_GET['sort_by'])&&$_GET['sort_by']!='') {
            $this->db->order_by('p.last_update',$_GET['sort_by']);
        }
        else{
            $this->db->order_by('p.product_id','desc');
        }

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    public function update($id){
        $data = array(
            'product_name'         => $this->input->post('product_name'),
            'description'          => $this->input->post('description'),
            'quantity'             => $this->input->post('quantity'),
            'cost_price'           => $this->input->post('cost_price'),
            'last_update'          => time(),
            );
        $this->db->where('product_id', $id);
        return $this->db->update('product', $data); 
    }

    public function product_name_exist($product_name, $id=FALSE){
        if ($id) {
            $this->db->where('product_id !=', $id);
        }
        $query = $this->db->get_where('product', array('product_name' => $product_name, 'active' => 1));
        if ($query->num_rows()>=1) {
            return $query->row();
        }
        return false;
    }

    public function delete($id){
        $data = array(
            'active'          => 0,
        );
        $this->db->where('product_id', $id);
        return $this->db->update('product', $data);
    }
    public function get_product_type($id){
        $this->db->select('pt.*, pc.category_name');
        $this->db->from('product_type pt');
        $this->db->join('product_category pc', 'pt.product_category_id=pc.product_category_id', 'left');
        $this->db->where('pt.active', 1);
        $this->db->where('pc.active', 1);
        $this->db->where('pt.product_id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function product_type_exist($id, $product_category_id){
        $query = $this->db->get_where('product_type', array('product_id' => $id, 'product_category_id'=>$product_category_id));
        if ($query->num_rows()==1) {
            return $query->row();
        }
        return false;
    }
    public function delete_product_type($id){
        $data = array(
            'active'     => 0,
            );
        $this->db->where('product_id', $id);
        return $this->db->update('product_type', $data); 
    }
    public function activate_product_type($id, $product_category_id){
        $data = array(
            'active'     => 1,
            );
        $this->db->where('product_id', $id);
        $this->db->where('product_category_id', $product_category_id);
        return $this->db->update('product_type', $data); 
    }
    public function add_product_type($id, $product_category_id){
        $data = array(
            'product_id'            => $id,  
            'product_category_id' => $product_category_id,
        );
        $this->db->insert('product_type', $data);
        return $this->db->insert_id();
    }

    public function fetch_selling_product($limit=null, $start=null){

        $this->db->select('SUM(qp.quantity) AS selling_quantity, p.*, pc.*');
        $this->db->from('quotation q');
        $this->db->join('quotation_product qp', 'q.quotation_id=qp.quotation_id', 'left');
        $this->db->join('product p', 'p.product_id=qp.product_id','left');
        $this->db->join('product_type pt', 'qp.product_id=pt.product_id','left');
        $this->db->join('product_category pc', 'pt.product_category_id=pc.product_category_id','left');
        $this->db->where('q.is_close', 1);
        $this->db->where('p.active', 1);
        $this->db->group_by('product_id');
        if (isset($_GET['date_from'])&&$_GET['date_from']!='') {
            $this->db->where('q.quotation_date >=', get_earliesttimestamp($_GET['date_from'],'-'));
        }
        else{
            $this->db->where('q.quotation_date >=', get_earliesttimestamp(date('d-m-Y'),'-'));
        }
        if (isset($_GET['date_to'])&&$_GET['date_to']!='') {
            $this->db->where('q.quotation_date <=', get_latesttimestamp($_GET['date_to'],'-'));
        }
        else{
            $this->db->where('q.quotation_date <=', get_latesttimestamp(date('d-m-Y'),'-'));
        }
        if(isset($_GET['category_id'])&&$_GET['category_id']!=''){
            $this->db->where('pt.product_category_id =', $_GET['category_id']);
            $this->db->where('pt.active =', 1);
        }
        if($limit && $start){
            $this->db->limit($limit, $start);
        }
        
        if (isset($_GET['sort_by'])&&$_GET['sort_by']!='') {
            $this->db->order_by('selling_quantity',$_GET['sort_by']);
        }
        else{
            $this->db->order_by('selling_quantity','desc');
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

    public function fetch_purchase_product($product_id){
        $this->db->select('sum(pp.quantity) as total_purchase');
        $this->db->from('purchase_order po');
        $this->db->join('po_product pp', 'po.purchase_order_id=pp.purchase_order_id', 'left');
        $this->db->where('po.active', 1);
        $this->db->where('pp.active', 1);
        $this->db->where('pp.product_id', $product_id);

        if (isset($_GET['date_from'])&&$_GET['date_from']!='') {
            $this->db->where('po.po_date >=', get_earliesttimestamp($_GET['date_from'],'-'));
        }
        else{
            $this->db->where('po.po_date >=', get_earliesttimestamp(date('d-m-Y'),'-'));
        }
        if (isset($_GET['date_to'])&&$_GET['date_to']!='') {
            $this->db->where('po.po_date <=', get_latesttimestamp($_GET['date_to'],'-'));
        }
        else{
            $this->db->where('po.po_date <=', get_latesttimestamp(date('d-m-Y'),'-'));
        }

        $query = $this->db->get();
        return $query->row('total_purchase');
    }

    public function count_selling_product(){
        $this->db->select('SUM(qp.quantity) AS selling_quantity, p.*');
        $this->db->from('quotation q');
        $this->db->join('quotation_product qp', 'q.quotation_id=qp.quotation_id', 'left');
        $this->db->join('product p', 'p.product_id=qp.product_id','left');
        $this->db->where('q.is_close', 1);
        $this->db->where('p.active', 1);
        $this->db->group_by('product_id');
        if (isset($_GET['date_from'])&&$_GET['date_from']!='') {
            $this->db->where('q.quotation_date >=', get_earliesttimestamp($_GET['date_from'],'-'));
        }
        else{
            $this->db->where('q.quotation_date >=', get_earliesttimestamp(date('d-m-Y'),'-'));
        }
        if (isset($_GET['date_to'])&&$_GET['date_to']!='') {
            $this->db->where('q.quotation_date <=', get_latesttimestamp($_GET['date_to'],'-'));
        }
        else{
            $this->db->where('q.quotation_date <=', get_latesttimestamp(date('d-m-Y'),'-'));
        }
        $query = $this->db->get();
        // echo $this->db->last_query();
        // exit();
        return $query->num_rows(); 
    }
}