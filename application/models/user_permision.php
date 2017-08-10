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

     public function check_action_permision($menu,$staff_id){

            if($menu !== '' && $staff_id !== 0 && $staff_id !== ''){
                $this->db->select($menu);
                $this->db->from('user_permision');
                $this->db->where('staff_id', $staff_id);

                $query = $this->db->get();

                return $query->row_array();
            }    

            return 0;

     }



}


// --------------------------------------------------------------------------------------------------------------------------

