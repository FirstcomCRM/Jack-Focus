<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class staff_model extends CI_Model
{

    function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function get($id=FALSE){
        if ($id === FALSE) {
            $this->db->where('active =', 1);
            $this->db->order_by('staff_id');
            $query = $this->db->get('staff');
            return $query->result_array();
        }
        $query = $this->db->get_where('staff', array('staff_id' => $id, 'active' => 1));
        return $query->row_array();
    }


    public function login($username, $password){
        // Prep the query
        $this->db->where('staff_username', $username);
        $this->db->where('staff_password', hash('sha512',$password));
        $this->db->where('active', 1);
        $this->db->limit(1);
        $query = $this->db->get('staff');
        if($query->num_rows == 1)
        {
            $row = $query->row();
            $data = array(
                'fcs_user_id'          => $row->staff_id,
                'fcs_username'         => $row->staff_username,
                'fcs_role_id'          => $row->role_id,
                'fcs_validate_user'    => true,
            );
            $this->session->set_userdata($data);
            return $row;
        }
        return false;

        

    }




    public function add() {
        $data = array(
            'staff_branch'    => $this->input->post('staff_branch'),
            'staff_name'      => $this->input->post('staff_name'),
            'staff_username'  => $this->input->post('staff_username'),
            'staff_role'      => $this->input->post('staff_role'),
            'role_id'         => $this->input->post('role_id'),
            'branch_id'       => $this->input->post('branch_id'),
            'supplier_id'       => $this->input->post('supp_id'),
            'staff_password'  => $this->security->xss_clean(hash('sha512',$this->input->post('staff_password'))),
            // 'last_update'     => time()
        );
        $this->db->insert('staff', $data);
        return $this->db->insert_id();
    }
    
    public function update($id){
        $data = array(
            'staff_branch'    => $this->input->post('staff_branch'),
            'staff_name'      => $this->input->post('staff_name'),
            'staff_username'  => $this->input->post('staff_username'),
            'staff_role'      => $this->input->post('staff_role'),
            'role_id'         => $this->input->post('role_id'),
            'branch_id'       => $this->input->post('branch_id'),
            'supplier_id'       => $this->input->post('supp_id'),
            'staff_password'  => $this->security->xss_clean(hash('sha512',$this->input->post('staff_password'))),
            // 'last_update'     => time()
  
        );
        $this->db->where('staff_id', $id);
        return $this->db->update('staff', $data);
    }
    public function count(){
        $this->db->select('*');
        $this->db->where('active', 1);


        if (isset($_GET['staff_name'])&&$_GET['staff_name']!='') {
           $this->db->like('staff_name', $_GET['staff_name']);
        }
        $query = $this->db->get('staff');
        return $query->num_rows(); 
    }

    public function fetch($limit, $start){
        $this->db->select('s.*, b.branch_name, r.role_title');
        $this->db->from('staff s');
        $this->db->join('branch b', 's.branch_id=b.branch_id');
        $this->db->join('role_staff_maid r', 's.role_id=r.role_id', 'left');
        $this->db->where('s.active', 1);
        if (isset($_GET['b.branch_name'])&&$_GET['b.branch_name']!='') {
            $this->db->like('staff_branch', $_GET['b.branch_name']);
        }
       if (isset($_GET['staff_name'])&&$_GET['staff_name']!='') {
           $this->db->like('staff_name', $_GET['staff_name']);
        }
        $this->db->limit($limit, $start);
        if (isset($_GET['sort_by'])&&$_GET['sort_by']!='') {
            $this->db->order_by($_GET['sort_by']);
        }
        else{
            $this->db->order_by('s.staff_id','desc');
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

     public function collect($id){
        $this->db->select('s.*, b.branch_name, r.role_title');
        $this->db->from('staff s');
        $this->db->join('branch b', 's.branch_id=b.branch_id');
        $this->db->join('role_staff_maid r', 's.role_id=r.role_id', 'left');
        $this->db->where('s.active', 1);
        $this->db->where('b.branch_id', $id);
        $this->db->order_by('s.staff_id','desc');
    
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    public function company_name_exist($staff_name, $id=FALSE){
        if ($id) {
            $this->db->where('staff_id !=', $id);
        }
        $query = $this->db->get_where('staff', array('staff_name' => $staff_name, 'active' => 1));
        if ($query->num_rows()>=1) {
            return $query->row();
        }
        return false;
    }
    public function delete($id){
        $data = array(
            'active'          => 0,
        );
        $this->db->where('staff_id', $id);
        return $this->db->update('staff', $data);
    }


    public function username_exist($username, $id=FALSE){
        if ($id) {
            $this->db->where('staff_id !=', $id);
        }
        $query = $this->db->get_where('staff', array('staff_username' => $username, 'active' => 1));
        if ($query->num_rows()==1) {
            return $query->row();
        }
        return false;
    }




}
// --------------------------------------------------------------------------------------------------------------------------