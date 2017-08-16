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
                 'branch_id'          => $row->branch_id,
                 'fcs_supplier_id'          => $row->supplier_id,
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
           
        );
        $this->db->insert('staff', $data);




        return $this->db->insert_id();
    }


    public function add_permission($role) {
        // $data = array(
        //     'staff_branch'    => $this->input->post('staff_branch'),
        //     'staff_name'      => $this->input->post('staff_name'),
        //     'staff_username'  => $this->input->post('staff_username'),
        //     'staff_role'      => $this->input->post('staff_role'),
        //     'role_id'         => $this->input->post('role_id'),
        //     'branch_id'       => $this->input->post('branch_id'),
        //     'supplier_id'       => $this->input->post('supp_id'),
        //     'staff_password'  => $this->security->xss_clean(hash('sha512',$this->input->post('staff_password'))),
           
        // );
        // $this->db->insert('staff', $data);

        

        
        // return $this->db->insert_id();


        if($role == 1){
             $data = array(
                             'role_id'             => $role,
                             'maid_add'             => 1,   
                             'maid_view'             => 1,
                              'maid_tablet_view'             => 1,
                             'maid_edit'             => 1,
                             'maid_del'             => 1,
                             'maid_view_bio'             => 1,
                             'maid_loan_edit'             => 1,
                             'emp_view'             => 1,
                             'emp_edit'             => 1,
                             'emp_add'             => 1,
                             'emp_del'             => 1,
                             'supp_view'             => 1,
                             'supp_edit'             => 1,
                             'supp_del'             => 1,
                             'supp_add'             => 1,
                             'branch_view'             => 1,
                             'branch_add'             => 1,
                             'branch_del'             => 1,
                             'branch_edit'             => 1,
                             'cont_view'             => 1,
                             'cont_add'             => 1,
                             'cont_del'             =>1,
                             'cont_edit'             => 1,
                             'pack_view'             =>1,
                             'pack_edit'             => 1,
                             'pack_add'             => 1,
                             'pack_del'             => 1,
                             'insu_view'             => 1,
                             'insu_edit'             => 1,
                             'insu_add'             => 1,
                             'insu_del'             =>1,
                             'staff_view'             => 1,
                             'staff_edit'             => 1,
                             'staff_add'             => 1,
                             'staff_del'             =>1,
                             'user_permision_view'   => 1,
                             'user_permision_edit'   => 1,
                             'inv_view'             => 1,
                             'inv_edit'             => 1,
                             'inv_add'             => 1,
                             'inv_del'             => 1,
                             'sales_view'             => 1,
                             'dailysales_view'       => 1,
                             'dailysales_edit'             => 1,
                             'dailysales_del'             =>1,
                             'setup_view'             => 1,
                             'buss_part_view'             => 1,
                             'buss_part_add'             => 1,
                             'buss_part_edit'             =>1,
                             'buss_part_del'             => 1,
                             'nationality_view'             => 1,
                             'nationality_add'             => 1,
                             'nationality_edit'             => 1 ,
                             'nationality_del'             => 1,
                             'announcement_view'             => 1,
                             'announcement_add'             => 1,
                             'announcement_edit'             =>1,
                             'announcement_del'             => 1
           
           
        );

        }else{

                  $data = array(
                                'role_id'             => $role,
                                 'maid_add'             => 0,   
                                 'maid_view'             => 0,
                                 'maid_edit'             => 0,
                                 'maid_del'             => 0,
                                'maid_view_bio'             => 0,
                                'maid_tablet_view'             => 0,
                                 'maid_loan_edit'             => 0,
                                 'emp_view'             => 0,
                                 'emp_edit'             => 0,
                                 'emp_add'             => 0,
                                 'emp_del'             => 0,
                                 'supp_view'             => 0,
                                 'supp_edit'             => 0,
                                 'supp_del'             => 0,
                                 'supp_add'             => 0,
                                 'branch_view'             => 0,
                                 'branch_add'             => 0,
                                 'branch_del'             => 0,
                                 'branch_edit'             => 0,
                                 'cont_view'             => 0,
                                 'cont_add'             => 0,
                                 'cont_del'             =>0,
                                 'cont_edit'             => 0,
                                 'pack_view'             =>0,
                                 'pack_edit'             => 0,
                                 'pack_add'             => 0,
                                 'pack_del'             => 0,
                                 'insu_view'             => 0,
                                 'insu_edit'             => 0,
                                 'insu_add'             => 0,
                                 'insu_del'             =>0,
                                 'staff_view'             => 0,
                                 'staff_edit'             => 0,
                                 'staff_add'             => 0,
                                 'staff_del'             =>0,
                                 'user_permision_view'   => 0,
                                 'user_permision_edit'   => 0,
                                 'inv_view'             => 0,
                                 'inv_edit'             => 0,
                                 'inv_add'             => 0,
                                 'inv_del'             => 0,
                                 'sales_view'             => 0,
                                 'dailysales_view'       => 0,
                                 'dailysales_edit'             => 0,
                                 'dailysales_del'             =>0,
                                 'setup_view'             => 0,
                                 'buss_part_view'             => 0,
                                 'buss_part_add'             => 0,
                                 'buss_part_edit'             =>0,
                                 'buss_part_del'             => 0,
                                 'nationality_view'             => 0,
                                 'nationality_add'             => 0,
                                 'nationality_edit'             => 0 ,
                                 'nationality_del'             => 0,
                                 'announcement_view'             => 0,
                                 'announcement_add'             => 0,
                                 'announcement_edit'             => 0,
                                 'announcement_del'             => 0


               
               
            );
        }


           $this->db->insert('user_permision', $data);      

        
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


    public function fetch_staff_permmission($id){
        $this->db->select('a.*');
        $this->db->from('user_permision a');        
        $this->db->where('a.role_id', $id);
        $this->db->limit(1);
   
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


      public function fetch_role(){
        $this->db->select('s.*');
        $this->db->from('role_staff_maid s');      
        $this->db->where('s.active', 1);
       
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