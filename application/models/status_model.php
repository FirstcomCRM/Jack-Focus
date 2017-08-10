<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class status_model extends CI_Model
{

    function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function get($id=FALSE){
        if ($id === FALSE) {
            $this->db->where('active =', 1);
            $this->db->order_by('status_id','desc');
            $query = $this->db->get('status');
            return $query->result_array();
        }
        $query = $this->db->get_where('status', array('status_id' => $id, 'active' => 1));
        return $query->row_array();
    }

    public function add() {
        $data = array(
            'supplier_name'   => $this->input->post('supplier_name'),
            'last_update'     => time()
        );
        $this->db->insert('supplier_maid', $data);
        return $this->db->insert_id();
    }
    
    public function update($id){
        $data = array(
            'supplier_name'    => $this->input->post('supplier_name'),
              'last_update'    => time()
           
        );
        $this->db->where('supplier_id', $id);
        return $this->db->update('supplier_maid', $data);
    }

    public function count(){
        $this->db->select('*');
        $this->db->where('active', 1);
        if (isset($_GET['supplier_name'])&&$_GET['supplier_name']!='') {
            $this->db->like('supplier_name', $_GET['supplier_name']);
        }
        //if (isset($_GET['contact_person'])&&$_GET['contact_person']!='') {
        //    $this->db->like('contact_person', $_GET['contact_person']);
        //}
        $query = $this->db->get('supplier_maid');
        return $query->num_rows(); 
    }

    public function fetch($limit, $start){
        $this->db->select('supplier_maid.*');
        $this->db->from('supplier_maid');
        $this->db->where('active', 1);
        if (isset($_GET['supplier_name'])&&$_GET['supplier_name']!='') {
            $this->db->like('supplier_name', $_GET['supplier_name']);
        }
        //if (isset($_GET['contact_person'])&&$_GET['contact_person']!='') {
         //   $this->db->like('contact_person', $_GET['contact_person']);
        //}
        $this->db->limit($limit, $start);
        if (isset($_GET['sort_by'])&&$_GET['sort_by']!='') {
            $this->db->order_by('last_update',$_GET['sort_by']);
        }
        else{
            $this->db->order_by('supplier_id');
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

    public function company_name_exist($csupplier_name, $id=FALSE){
        if ($id) {
            $this->db->where('supplier_id !=', $id);
        }
        $query = $this->db->get_where('supplier_maid', array('supplier_name' => $supplier_name, 'active' => 1));
        if ($query->num_rows()>=1) {
            return $query->row();
        }
        return false;
    }
    public function delete($id){
        $data = array(
            'active'          => 0,
        );
        $this->db->where('supplier_id', $id);
        return $this->db->update('supplier_maid', $data);
    }
}
// --------------------------------------------------------------------------------------------------------------------------