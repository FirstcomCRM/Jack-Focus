<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class role_staff_maid_model extends CI_Model
{

    function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function get($id=FALSE){
        if ($id === FALSE) {
            $this->db->where('active =', 1);
            $this->db->order_by('role_id','desc');
            $query = $this->db->get('role_staff_maid');
            return $query->result_array();
        }
        $query = $this->db->get_where('role_staff_maid', array('role_id' => $id, 'active' => 1));
        return $query->row_array();
    }

    
}
// --------------------------------------------------------------------------------------------------------------------------