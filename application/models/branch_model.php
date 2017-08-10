<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class branch_model extends CI_Model
{

    function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function get($id=FALSE){
        if ($id === FALSE) {
            $this->db->where('active =', 1);
            $this->db->order_by('branch_id','desc');
            $query = $this->db->get('branch');
            return $query->result_array();
        }
        $query = $this->db->get_where('branch', array('branch_id' => $id, 'active' => 1));
        return $query->row_array();
    }

    public function add() {

        $maxid = 0;
        $row = $this->db->query('SELECT MAX(branch_id) AS `maxid` FROM `branch`')->row();
        if ($row) {
            $maxid = $row->maxid; 
        }
        $maxid = $maxid+100000+1;

        $branch_code = "B-".$maxid;

        

        $data = array(
            'branch_code'               => $branch_code,
            'branch_name'               => $this->input->post('branch_name'),
            'branch_contact_person'     => $this->input->post('branch_contact_person'),
            'branch_contact_number'     => $this->input->post('branch_contact_number'),
            'branch_address'            => $this->input->post('branch_address'),
            'branch_email'              => $this->input->post('branch_email'),
            'last_update'               => time()
        );
        $this->db->insert('branch', $data);
        return $this->db->insert_id();
    }
    
    public function update($id){
        $data = array(
            'branch_name'               => $this->input->post('branch_name'),
            'branch_contact_person'     => $this->input->post('branch_contact_person'),
            'branch_contact_number'     => $this->input->post('branch_contact_number'),
            'branch_address'            => $this->input->post('branch_address'),
            'branch_email'              => $this->input->post('branch_email'),
        );
        $this->db->where('branch_id', $id);
        return $this->db->update('branch', $data);
    }
    public function count(){
        $this->db->select('*');
        $this->db->where('active', 1);
        if (isset($_GET['branch_name'])&&$_GET['branch_name']!='') {
            $this->db->like('branch_name', $_GET['branch_name']);
        }

       // if (isset($_GET['contact_person'])&&$_GET['contact_person']!='') {
         //   $this->db->like('contact_person', $_GET['contact_person']);
        //}
        $query = $this->db->get('branch');
        return $query->num_rows(); 
    }

    public function fetch($limit, $start){
        $this->db->select('b.*, count(s.staff_id) AS bcount');
        $this->db->from('branch b');
        $this->db->join('staff s', 'b.branch_id=s.branch_id', 'left');
        $this->db->group_by('b.branch_name'); 
        $this->db->where('b.active', 1);
        if (isset($_GET['branch_name'])&&$_GET['branch_name']!='') {
            $this->db->like('branch_name', $_GET['branch_name']);
        }
        $this->db->limit($limit, $start);
        if (isset($_GET['sort_by'])&&$_GET['sort_by']!='') {
            $this->db->order_by($_GET['sort_by']);
        }
        else{
            $this->db->order_by('b.branch_id');
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

    public function fetchStaff($limit, $start){
        $this->db->select('b.*, s.staff_name');
        $this->db->from('branch b');
        $this->db->join('staff s', 'b.branch_id=s.branch_id', 'left');
        $this->db->where('b.active', 1);
        $this->db->where('s.active', 1);
        if (isset($_GET['branch_name'])&&$_GET['branch_name']!='') {
            $this->db->like('branch_name', $_GET['branch_name']);
        }
        $this->db->limit($limit, $start);
        if (isset($_GET['sort_by'])&&$_GET['sort_by']!='') {
            $this->db->order_by($_GET['sort_by']);
        }
        else{
            $this->db->order_by('b.branch_id');
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

    public function company_name_exist($branch_name, $id=FALSE){
        if ($id) {
            $this->db->where('branch_id !=', $id);
        }
        $query = $this->db->get_where('branch', array('branch_name' => $branch_name, 'active' => 1));
        if ($query->num_rows()>=1) {
            return $query->row();
        }
        return false;
    }
    public function delete($id){
        $data = array(
            'active'          => 0,
        );
        $this->db->where('branch_id', $id);
        return $this->db->update('branch', $data);
    }

    public function getBranchName($branch_code){
        // if ($id === FALSE) {
        //     $this->db->where('active =', 1);
        //     $this->db->order_by('branch_id','desc');
        //     $query = $this->db->get('branch');
        //     return $query->result_array();
        // }
        // $query = $this->db->get_where('branch', array('branch_id' => $id, 'active' => 1));
        // return $query->row_array();
         $this->db->select('branch_name');
         $this->db->from('branch');
         $this->db->where('branch_code', $branch_code);

         return $query = $this->db->get();
    }


    public function getBranchStaff($id){
        $this->db->select('*');
        $this->db->from('staff');       
        $this->db->where('branch_id', $id);
        $this->db->where('active', 1);
 
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;

    }


    public function getStaffProfile($id){
        $this->db->select('a.*,b.branch_name,c.role_title');
        $this->db->from('staff a');    
        $this->db->join('branch b', 'a.branch_id=b.branch_id', 'left');
        $this->db->join('role_staff_maid c', 'a.role_id=c.role_id', 'left');    
        $this->db->where('a.staff_id', $id);
        $this->db->where('a.active', 1);
 
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