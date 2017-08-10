<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class invoice_package_model extends CI_Model
{

    function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function get($id=FALSE){
        if ($id === FALSE) {
            $this->db->select('q.*, c.*, s.staff_name as s_name');
            $this->db->from('quotation_maid q');
            $this->db->join('customer_maid c','q.customer_id=c.customer_id', 'left');
            $this->db->join('staff s','s.staff_id=q.staff_id', 'left');
            $this->db->where('q.active', 1);

            if (isset($_GET['customer'])&&$_GET['customer']!='*') {
                $this->db->where('q.customer_id', $_GET['customer']);
            }
            if (isset($_GET['issued_by'])&&$_GET['issued_by']!='') {
                $this->db->like('i.issued_by', $_GET['issued_by']);
            }
            if (isset($_GET['staff_id'])&&$_GET['staff_id']!='*') {
                $this->db->where('s.staff_id', $_GET['sttaff_id']);
            }
            if (isset($_GET['status'])&&$_GET['status']!='*') {
                $this->db->where('i.is_paid', $_GET['status']);
            }

            //if( $this->input->get('start') && ( $this->input->get('start') != '' ) ) { 
             //   $start_date = get_timestamp($this->input->get('start'), '-');
             //   $this->db->where('i.invoice_date >=', $start_date);
            //}
           // if( $this->input->get('end') && ( $this->input->get('end') != '' ) ) { 
             //   $end_date = get_timestamp($this->input->get('end'), '-');
             //   $this->db->where('i.invoice_date <=', $end_date);
           // }

           // if (isset($_GET['sort_by'])&&$_GET['sort_by']!='*') {
              //  $this->db->order_by('due_date',$_GET['sort_by']);
           // }
            else{
                $this->db->order_by('quotation_id','desc');
            }


            $query = $this->db->get();
            return $query->result_array();
        }
        $this->db->select('q.*, c.customer_name, s.staff_name as s_name');
        $this->db->from('quotation_maid q');
        $this->db->join('customer_maid c','q.customer_id=c.customer_id', 'left');
        $this->db->join('staff s','q.staff_id=s.staff_id', 'left');
        $this->db->where('q.active', 1);
         $this->db->where('q.quotation_id' ,$id);
 
            $query = $this->db->get();
            return $query->result_array();
    }

    public function add() {
        $data = array(
            'customer_id'     => $this->input->post('customer_id'),
            'quotation_no'    => $this->generate_quo_no(),
            'payment_terms'   => $this->input->post('payment_terms'),
            'issued_by'       => $this->input->post('issued_by'),
            'staff_id'        => $this->input->post('sale_person_id'),
            'quotation_date'  => get_timestamp($this->input->post('quotation_date'), '-'),
            'remark'          => $this->input->post('remark'),
            'internal_remark' => $this->input->post('internal_remark'),
            'total_amount'    => $this->input->post('total_amount'),
            'gst'             => $this->input->post('gst'),
            'total_inc_gst'   => $this->input->post('total_inc_gst'),
            'gst'             => $this->input->post('gst'),
        );
        $this->db->insert('quotation_maid', $data);
        $quotation_id = $this->db->insert_id();
        $this->addSaleDetail($quotation_id);
        return $quotation_id;
    }



    public function addSaleDetail($id) {
        $details = $this->input->post('sale_detail');
        if($details) {
            foreach($details as $detail) {
                $data = array(
                    'quotation_id'      => $id,
                    'maid_id'           => $detail['product_id'],
                    'unit_price'        => $detail['unit_price'],
                    'quantity'          => $detail['quantity'],
                    'total_amount'      => $detail['total'],
                    'remark'            => $detail['p_remark'],
                );
                $this->db->insert('quotation_maid_product', $data);  
            }   
        }
    }
    public function update($id){
        $data = array(
            'customer_id'     => $this->input->post('customer_id'),
            'payment_terms'   => $this->input->post('payment_terms'),
            'issued_by'       => $this->input->post('issued_by'),
            'staff_id'        => $this->input->post('sale_person_id'),
            'quotation_date'  => get_timestamp($this->input->post('quotation_date'), '-'),
            'remark'          => $this->input->post('remark'),
            'internal_remark' => $this->input->post('internal_remark'),
            'total_amount'    => $this->input->post('total_amount'),
            'gst'             => $this->input->post('gst'),
            'total_inc_gst'   => $this->input->post('total_inc_gst'),


        );
        $this->db->where('quotation_id', $id);
        return $this->db->update('quotation_maid', $data);
    }

    public function count(){
        $this->db->select('q.*, c.customer_name');
        $this->db->from('quotation_maid q');
        $this->db->join('customer_maid c', 'q.customer_id = c.customer_id', 'left');
        $this->db->join('staff s', 's.staff_id = q.staff_id', 'left');
        $this->db->join('quotation_maid_product qp', 'qp.quotation_id = q.quotation_id', 'left');
        $this->db->where('q.active', 1);
        if (isset($_GET['q.quotation_no'])&&$_GET['quotation_no']!='') {
            $this->db->like('q.quotation_no', $_GET['quotation_no']);
        }
        if (isset($_GET['customer_name'])&&$_GET['customer_name']!='') {
            $this->db->where('q.customer_id', $_GET['customer_name']);
        }
        if (isset($_GET['staff_id'])&&$_GET['staff_id']!='') {
            $this->db->where('s.staff_id', $_GET['staff_id']);
        }
        if (isset($_GET['maid_id'])&&$_GET['maid_id']!='') {
            $this->db->where('qp.product_id', $_GET['maid_id']);
        }
        if (isset($_GET['status'])&&$_GET['status']!='') {
            $this->db->where('q.is_close', $_GET['status']);
        }
        $this->db->group_by('quotation_id'); 
        $query = $this->db->get();
        return $query->num_rows(); 
    }

   public function fetch($limit, $start){
        $this->db->select('q.*, c.customer_name, s.staff_name as s_name');
        $this->db->from('quotation_maid q');
        $this->db->join('customer_maid c', 'q.customer_id = c.customer_id', 'left');
        $this->db->join('staff s', 's.staff_id=q.staff_id', 'left');
        $this->db->join('quotation_maid_product qp', 'qp.quotation_id = q.quotation_id', 'left');
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
           $this->db->order_by('quotation_id','desc');
       // }
        $this->db->group_by('quotation_id'); 
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

    public function quotation_no_exist($quotation_no, $id=FALSE){
        if ($id) {
            $this->db->where('quotation_id !=', $id);
        }
        $query = $this->db->get_where('quotation', array('quotation_no' => $quotation_no));
        if ($query->num_rows()>=1) {
            return $query->row();
        }
        return false;
    }


    public function close_quotation($id){
        $data = array(
            'is_close'          => 1,
        );
        $this->db->where('quotation_id', $id);
        return $this->db->update('quotation_maid', $data);
    }
    public function cancel_close_quotation($id){
        $data = array(
            'is_close'          => 0,
        );
        $this->db->where('quotation_id', $id);
        return $this->db->update('quotation', $data);
    }

    public function delete_p($id){
        $data = array(
            'active'          => 0,
        );
        $this->db->where('quotation_id', $id);
        return $this->db->update('quotation_maid', $data);
    }

    public function get_amount($id){
        $this->db->select('SUM(unit_price*quantity) AS amount');
        $this->db->from('quotation_maid_product');
        $this->db->where('quotation_id', $id);
        $this->db->where('active', 1);
        $query = $this->db->get();
        $row = $query->row_array();
        return $row['amount'];
    }
   public function generate_quo_no(){
        $this->db->select('Max(quotation_id) as quoNo');
        $this->db->from('quotation_maid');
        $query = $this->db->get();
        
        $row = $query->row_array();
        if ($query->num_rows()==1) {
            $last_quo_no = $row['quoNo'];
            return 'INV-'.($last_quo_no+1);
        }
        else{
            return 'INV-10000';
        }
    }
    public function get_quotation_product($id){
        $this->db->select('qp.*, m.maid_name, (qp.unit_price*qp.quantity) as total');
        $this->db->from('quotation_maid_product qp');
        $this->db->join('maid m', 'qp.maid_id=m.maid_id', 'left');
        $this->db->where('qp.active', 1);
        $this->db->where('qp.quotation_id', $id);
        $this->db->order_by('qp.quotation_product_id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_quotation_package_product($id){
        $this->db->select('qp.*, p.package_name, (qp.unit_price*qp.quantity) as total');
        $this->db->from('invoice_package_product ipp');
        $this->db->join('package p', 'ipp.package_id=p.package_id', 'left');
        $this->db->where('qp.active', 1);
        $this->db->where('qp.quotation_id', $id);
        $this->db->order_by('qp.quotation_product_id');
        $query = $this->db->get();
        return $query->result_array();
    }


    public function get_product_details($qp_id){
        $query = $this->db->get_where('quotation_maid_product', array('quotation_product_id' => $qp_id));
        return $query->row_array();
    }
    public function add_quotation_product(){
        $data = array(
            'quotation_id'      => $this->input->post('quotation_id'),
            'maid_id'              => $this->input->post('product_id'),
            'unit_price'        => $this->input->post('unit_price'),
            'quantity'          => $this->input->post('quantity'),
            'total_amount'      => $this->input->post('total'),
            'remark'            => $this->input->post('p_remark'),
        );
        $this->db->insert('quotation_maid_product', $data);
        return $this->db->insert_id();;
    }
    public function remove_quotation_product($qp_id){
        $data = array(
            'active'          => 0,
        );
        $this->db->where('quotation_product_id', $qp_id);
        return $this->db->update('quotation_maid_product', $data);
    }
    public function update_quotation_product($id){
        $data = array(
            'quotation_id'      => $this->input->post('quotation_id'),
            'maid_id'           => $this->input->post('product_id'),
            'unit_price'        => $this->input->post('unit_price'),
            'quantity'          => $this->input->post('quantity'),
            'total_amount'      => $this->input->post('total'),
            'remark'            => $this->input->post('p_remark'),
        );
        $this->db->where('quotation_product_id', $id);
        return $this->db->update('quotation_maid_product', $data);
    }

        public function getDo($do_id){
        $query = $this->db->get_where('delivery_order', array('do_id' => $do_id, 'active' => 1));
        return $query->row_array();
    }

       public function completed_invoice($id){
        $data = array(
            'is_paid'      => 1,
        );
        $this->db->where('quotation_id', $id);
        return $this->db->update('quotation_maid', $data);
    }
    public function partial_paid_invoice($id){
        $data = array(
            'is_paid'      => (-1),
        );
        $this->db->where('quotation_id', $id);
        return $this->db->update('quotation_maid', $data);
    }
    public function unpaid_invoice($id){
        $data = array(
            'is_paid'      => 0,
        );
        $this->db->where('quotation_id', $id);
        return $this->db->update('quotation_maid', $data);
    }
    public function delete($id){

        $products = $this->db->query("SELECT product_id, quantity FROM quotation_product WHERE quotation_id = $id");

        foreach($products->result_array() as $product){

            $this->db->query("UPDATE product SET quantity=quantity+".$product['quantity']." WHERE product_id = ".$product['product_id']);
        }
}

    public function getAmount($id=FALSE){
        if ($id === FALSE) {
            $this->db->where('active =', 1);
            $this->db->order_by('quotation_id','desc');
            $query = $this->db->get('quotation_maid');
            return $query->result_array();
        }
        $query = $this->db->get_where('quotation_maid', array('quotation_id' => $id, 'active' => 1));
        return $query->row_array();
    }

    public function getCustId($id=FALSE){
        if ($id === FALSE) {
            $this->db->where('active =', 1);
            $this->db->order_by('branch_id','desc');
            $query = $this->db->get('quotation_maid');
            return $query->result_array();
        }
        $query = $this->db->get_where('quotation_maid', array('quotation_id' => $id, 'active' => 1));
        return $query->row_array();
    }

       public function getQuo($id=FALSE){
        if ($id === FALSE) {
            $this->db->select('q.*, c.*');
            $this->db->from('quotation_maid q');
            $this->db->join('customer_maid c','q.customer_id=c.customer_id', 'left');
            $this->db->where('q.active', 1);
            $this->db->order_by('quotation_no','desc');
            $query = $this->db->get();
            return $query->result_array();
        }
        $this->db->select('q.*, c.customer_name, s.staff_name as s_name');
        $this->db->from('quotation_maid q');
        $this->db->join('customer_maid c','q.customer_id=c.customer_id', 'left');
        $this->db->join('staff s','q.staff_id=s.staff_id', 'left');
        $this->db->where('q.quotation_id' ,$id);
        $this->db->where('q.active', 1);
        $query = $this->db->get();
        return $query->row_array();
    }

     public function getIdMaids($id=FALSE){
        if ($id === FALSE) {
            $$this->db->select('q.quotation_id, qp.quotation_product_id, qp.maid_id');
            $this->db->from('quotation_maid q');
            $this->db->join('quotation_maid_product qp','q.quotation_id=qp.quotation_id', 'left');
            $this->db->where('q.active', 1);
            $query = $this->db->get();
            return $query->result_array();
        }
        $this->db->select('q.quotation_id,  qp.maid_id');
        $this->db->from('quotation_maid q');
        $this->db->join('quotation_maid_product qp','q.quotation_id=qp.quotation_id', 'left');
        $this->db->where('q.quotation_id' ,$id);
        $this->db->where('q.active', 1);

        $query = $this->db->get();
        return $query->result_array(); //for array
        //return $query->result_object(); //for object



        // if ($query->num_rows() > 0) {
        //     foreach ($query->result() as $row) {
        //         $data[] = $row;
        //     }
        //     return $data;
        // }
        // return false;
    }

  

 
}
// --------------------------------------------------------------------------------------------------------------------------