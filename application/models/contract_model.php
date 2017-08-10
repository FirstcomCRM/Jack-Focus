<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class contract_model extends CI_Model
{

    function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function get($id=FALSE){
        if ($id === FALSE) {
            $this->db->where('active =', 1);
            $this->db->order_by('contract_id','desc');
            $query = $this->db->get('contract');
            return $query->result_array();
        }
        $query = $this->db->get_where('contract', array('contract_id' => $id, 'active' => 1));
        return $query->row_array();
    }

    public function add() {
        $data = array(
            'contract_name'              => $this->input->post('contract_name'),
            'contract_created'           => date('Y-m-d'),
            'contract_update'            => $this->input->post('contract_update'),
            'contract_customer'          => $this->input->post('contract_customer'),
            'contract_staff'             => $this->input->post('contract_staff'),
            'contract_remarks'           => $this->input->post('contract_remarks'),
    
        );
        $this->db->insert('contract', $data);
        return $this->db->insert_id();
    }
    
    public function update($id){
        $data = array(
            'contract_name'              => $this->input->post('contract_name'),
            'contract_update'            => date('Y-m-d'),
            'contract_customer'          => $this->input->post('contract_customer'),
            'contract_staff'             => $this->input->post('contract_staff'),
            'contract_remarks'           => $this->input->post('contract_remarks'),
        );
        $this->db->where('contract_id', $id);
        return $this->db->update('contract', $data);
    }
    public function count(){
        $this->db->select('*');
        $this->db->where('active', 1);
        if (isset($_GET['contract_name'])&&$_GET['contract_name']!='') {
            $this->db->like('contract_name', $_GET['contract_name']);
        }

        $query = $this->db->get('contract');
        return $query->num_rows(); 
    }

    public function fetch($limit, $start){
        $this->db->select('contract.*');
        $this->db->from('contract');
        $this->db->where('active', 1);
        if (isset($_GET['contract_name'])&&$_GET['contract_name']!='') {
            $this->db->like('contract_name', $_GET['contract_name']);
        }

        $this->db->limit($limit, $start);
        if (isset($_GET['contract_name'])&&$_GET['contract_name']!='') {
            $this->db->like('contract_name', $_GET['contract_name']);
        }
        else{
            $this->db->order_by('contract_id','desc');
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

    public function company_name_exist($nationality_name, $id=FALSE){
        if ($id) {
            $this->db->where('nationality_id !=', $id);
        }
        $query = $this->db->get_where('nationality', array('nationality_name' => $nationality_name, 'active' => 1));
        if ($query->num_rows()>=1) {
            return $query->row();
        }
        return false;
    }
    public function delete($id){
        $data = array(
            'active'          => 0,
        );
        $this->db->where('contract_id', $id);
        return $this->db->update('contract', $data);
    }

       public function update_img($nationality_id){

        $data = array(
        'nationality_flag'   =>  $this->input->post('flag_img_path')

        );
        $this->db->where('nationality_id', $nationality_id);
        return $this->db->update('nationality', $data);
    }


   
}







// --------------------------------------------------------------------------------------------------------------------------