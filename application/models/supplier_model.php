<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class supplier_model extends CI_Model
{

    function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function get($id=FALSE){
        if ($id === FALSE) {
            $this->db->where('active =', 1);
            $this->db->order_by('supplier_id','desc');
            $query = $this->db->get('supplier_maid');
            return $query->result_array();
        }
        $query = $this->db->get_where('supplier_maid', array('supplier_id' => $id, 'active' => 1));
        return $query->row_array();
    }

    public function add() {
       
        $maxid = 0;
        $row = $this->db->query('SELECT MAX(supplier_id) AS `maxid` FROM `supplier_maid`')->row();
        if ($row) {
            $maxid = $row->maxid; 
        }
        $maxid = $maxid+100000+1;

        $supplier_code = "SUP-".$maxid;

        $data = array(
            'supplier_code'             => $supplier_code,
            'supplier_name'             => $this->input->post('supplier_name'),
            'supplier_contact_person'  => $this->input->post('supplier_contact_person'),
            'supplier_contact_number'   => $this->input->post('supplier_contact_number'),
            'supplier_address'          => $this->input->post('supplier_address'),
            'supplier_email'            => $this->input->post('supplier_email'),
            'last_update'               => time()
        );
        $this->db->insert('supplier_maid', $data);
        return $this->db->insert_id();
    }
    
    public function update($id){
        $data = array(
            'supplier_name'             => $this->input->post('supplier_name'),
            'supplier_contact_person'  => $this->input->post('supplier_contact_person'),
            'supplier_contact_number'   => $this->input->post('supplier_contact_number'),
            'supplier_address'          => $this->input->post('supplier_address'),
            'supplier_email'            => $this->input->post('supplier_email'),
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
        $this->db->select('s.*, count(m.supplier_id) AS mcount');
        $this->db->from('supplier_maid s');
        $this->db->join('maid m', 's.supplier_id=m.supplier_id', 'left');
        $this->db->group_by('s.supplier_name'); 
        $this->db->where('s.active', 1);
        if (isset($_GET['supplier_name'])&&$_GET['supplier_name']!='') {
            $this->db->like('s.supplier_name', $_GET['supplier_name']);
        }
        //if (isset($_GET['contact_person'])&&$_GET['contact_person']!='') {
         //   $this->db->like('contact_person', $_GET['contact_person']);
        //}
        $this->db->limit($limit, $start);
        if (isset($_GET['sort_by'])&&$_GET['sort_by']!='') {
            $this->db->order_by($_GET['sort_by']);
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

    /*public function fetch($limit, $start){
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
    }*/

     public function getMaidCount($limit, $start){
        $this->db->select('s.*, m.maid_id');
        $this->db->from('supplier s');
        $this->db->join('maid m', 's.supplier_id=m.supplier_id', 'left');
        $this->db->where('active', 1);

        $query = $this->db->get();
        return $rowcount = $query->num_rows();
    }

   /* public function company_name_exist($supplier_name, $id=FALSE){
        if ($id) {
            $this->db->where('supplier_id !=', $id);
        }
        $query = $this->db->get_where('supplier_maid', array('supplier_name' => $supplier_name, 'active' => 1));
        if ($query->num_rows()>=1) {
            return $query->row();
        }
        return false;
    }*/


    public function supplier_name_exist($supplier_name, $id=FALSE){
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





    public function count_maid_supplier(){
        $this->db->select('m.*');
        $this->db->from('maid m');   
        $this->db->where('m.active', 1);

        if (isset($_GET['supplier_id'])) {
            $this->db->where('m.supplier_id', $_GET['supplier_id']);
        }      

        $query = $this->db->get();
        return $query->num_rows(); 
    }




     public function fetch_maid($limit, $start){
        $this->db->select('m.*, s.supplier_name, t.*, n.*,b.*, f.staff_name');
        $this->db->from('maid m');
        $this->db->join('supplier_maid s', 'm.supplier_id=s.supplier_id','left');
        $this->db->join('status t', 'm.status_id=t.status_id','left');
        $this->db->join('nationality n', 'm.nationality_id=n.nationality_id','left');
        $this->db->join('staff f', 'm.staff_id=f.staff_id','left');
        $this->db->join('branch b', 'm.branch_id=b.branch_id', 'left');
        $this->db->where('m.active', 1);
        

        if (isset($_GET['supplier_id'])) {
            $this->db->where('m.supplier_id', $_GET['supplier_id']);
        }

        if (isset($_GET['maid_name'])&&$_GET['maid_name']!='') {
            $this->db->like('maid_name', $_GET['maid_name']);
        }

    
            if (isset($_GET['nationality_name'])&&$_GET['nationality_name']!='') {
            $this->db->like('n.nationality_id', $_GET['nationality_name']);
        }

            if (isset($_GET['status_name'])&&$_GET['status_name']!='') {
            $this->db->like('t.status_id', $_GET['status_name']);
        }



        $this->db->limit($limit, $start);
        if (isset($_GET['sort_by'])&&$_GET['sort_by']!='') {
            $this->db->order_by($_GET['sort_by']);
        }
        else{
            $this->db->order_by('maid_id','desc');
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


}
// --------------------------------------------------------------------------------------------------------------------------