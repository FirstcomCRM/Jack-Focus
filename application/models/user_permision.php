<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class user_permision extends CI_Model
{

    function __construct(){
        parent::__construct();
        $this->load->database();
    }

     public function check_action_permision($menu,$role_id){

            if($menu !== '' && $role_id !== 0 && $role_id !== ''){
                $this->db->select($menu);
                $this->db->from('user_permision');
                $this->db->where('role_id', $role_id);

                $query = $this->db->get();

                return $query->row_array();
            }    

            return 0;

     }


     public function update_staff_permission($id){


               $data = array(
                              'maid_add'             => $this->input->post('maid_add'),   
                             'maid_view'             => $this->input->post('maid_view'),
                             'maid_edit'             => $this->input->post('maid_edit'),
                             'maid_del'             => $this->input->post('maid_del'),
                             'maid_view_bio'             => $this->input->post('maid_view_bio'),
                             'maid_tablet_view'             => $this->input->post('maid_tablet_view'),
                             'maid_loan_edit'             => $this->input->post('maid_loan_edit'),
                             'emp_view'             => $this->input->post('emp_view'),
                             'emp_edit'             => $this->input->post('emp_edit'),
                             'emp_add'             => $this->input->post('emp_add'),
                             'emp_del'             => $this->input->post('emp_del'),
                             'supp_view'             => $this->input->post('supp_view'),
                             'supp_edit'             => $this->input->post('supp_edit'),
                             'supp_del'             => $this->input->post('supp_del'),
                             'supp_add'             => $this->input->post('supp_add'),
                             'branch_view'             => $this->input->post('branch_view'),
                             'branch_add'             => $this->input->post('branch_add'),
                             'branch_del'             => $this->input->post('branch_del'),
                             'branch_edit'             => $this->input->post('branch_edit'),
                             'cont_view'             => $this->input->post('cont_view'),
                             'cont_add'             => $this->input->post('cont_add'),
                             'cont_del'             => $this->input->post('cont_del'),
                             'cont_edit'             => $this->input->post('cont_edit'),
                             'pack_view'             => $this->input->post('pack_view'),
                             'pack_edit'             => $this->input->post('pack_edit'),
                             'pack_add'             => $this->input->post('pack_add'),
                             'pack_del'             => $this->input->post('pack_del'),
                             'insu_view'             => $this->input->post('insu_view'),
                             'insu_edit'             => $this->input->post('insu_edit'),
                             'insu_add'             => $this->input->post('insu_add'),
                             'insu_del'             => $this->input->post('insu_del'),
                             'staff_view'             => $this->input->post('staff_view'),
                             'staff_edit'             => $this->input->post('staff_edit'),
                             'staff_add'             => $this->input->post('staff_add'),
                             'staff_del'             => $this->input->post('staff_del'),
                             'user_permision_view'   => $this->input->post('user_permision_view'),
                             'user_permision_edit'   => $this->input->post('user_permision_edit'),
                             'inv_view'             => $this->input->post('inv_view'),
                             'inv_edit'             => $this->input->post('inv_edit'),
                             'inv_add'             => $this->input->post('inv_add'),
                             'inv_del'             => $this->input->post('inv_del'),
                             'sales_view'             => $this->input->post('sales_view'),
                             'dailysales_view'       => $this->input->post('dailysales_view'),
                             'dailysales_edit'             => $this->input->post('dailysales_edit'),
                             'dailysales_del'             => $this->input->post('dailysales_del'),
                             'setup_view'             => $this->input->post('setup_view'),
                             'buss_part_view'             => $this->input->post('buss_part_view'),
                             'buss_part_add'             => $this->input->post('buss_part_add'),
                             'buss_part_edit'             => $this->input->post('buss_part_edit'),
                             'buss_part_del'             => $this->input->post('buss_part_del'),
                             'nationality_view'             => $this->input->post('nationality_view'),
                             'nationality_add'             => $this->input->post('nationality_add'),
                             'nationality_edit'             => $this->input->post('nationality_edit'),
                             'nationality_del'             => $this->input->post('nationality_del'),
                             'announcement_view'             => $this->input->post('announcement_view'),
                             'announcement_add'             => $this->input->post('announcement_add'),
                             'announcement_edit'             => $this->input->post('announcement_edit'),
                             'announcement_del'             => $this->input->post('announcement_del')


           
           
        );
        $this->db->where('role_id', $id);
        return $this->db->update('user_permision', $data);

     }


     public function permission_menu_list($role_id){

         
                $this->db->select('*');
                $this->db->from('user_permision');
                $this->db->where('role_id', $role_id);

                $query = $this->db->get();

                return $query->row_array();
         

            return 0;

     }



}


// --------------------------------------------------------------------------------------------------------------------------

