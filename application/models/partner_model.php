<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class partner_model extends CI_Model
{

    function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function get($id=FALSE){
        if ($id === FALSE) {
            $this->db->where('active =', 1);
            $this->db->order_by('partner_id','desc');
            $query = $this->db->get('partner');
            return $query->result_array();
        }
        $query = $this->db->get_where('partner', array('partner_id' => $id, 'active' => 1));
        return $query->row_array();
    }

    public function add() {
        $data = array(
            'partner_name'              => $this->input->post('partner_name'),
            'partner_contact_person'    => $this->input->post('partner_contact_person'),
            'partner_address'           => $this->input->post('partner_address'),
            'partner_contact_no'        => $this->input->post('partner_contact_no'),
            'partner_remarks'           => $this->input->post('partner_remarks'),
            'partner_email'             => $this->input->post('partner_email'),
    
        );
        $this->db->insert('partner', $data);
        return $this->db->insert_id();
    }
    
    public function update($id){
        $data = array(
            'partner_name'              => $this->input->post('partner_name'),
            'partner_contact_person'    => $this->input->post('partner_contact_person'),
            'partner_address'           => $this->input->post('partner_address'),
            'partner_contact_no'        => $this->input->post('partner_contact_no'),
            'partner_remarks'           => $this->input->post('partner_remarks'),
            'partner_email'             => $this->input->post('partner_email'),
        );
        $this->db->where('partner_id', $id);
        return $this->db->update('partner', $data);
    }
    public function count(){
        $this->db->select('*');
        $this->db->where('active', 1);
        if (isset($_GET['partner_name'])&&$_GET['partner_name']!='') {
            $this->db->like('partner_name', $_GET['partner_name']);
        }

        $query = $this->db->get('partner');
        return $query->num_rows(); 
    }

    public function fetch($limit, $start){
        $this->db->select('partner.*');
        $this->db->from('partner');
        $this->db->where('active', 1);
        if (isset($_GET['partner_name'])&&$_GET['partner_name']!='') {
            $this->db->like('partner_name', $_GET['partner_name']);
        }

        $this->db->limit($limit, $start);
        if (isset($_GET['partner_name'])&&$_GET['partner_name']!='') {
            $this->db->like('partner_name', $_GET['partner_name']);
        }
        else{
            $this->db->order_by('partner_id','desc');
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

    public function company_name_exist($partner_name, $id=FALSE){
        if ($id) {
            $this->db->where('partner_id !=', $id);
        }
        $query = $this->db->get_where('partner', array('partner_name' => $partner_name, 'active' => 1));
        if ($query->num_rows()>=1) {
            return $query->row();
        }
        return false;
    }
    public function delete($id){
        $data = array(
            'active'          => 0,
        );
        $this->db->where('partner_id', $id);
        return $this->db->update('partner', $data);
    }



   
}







// --------------------------------------------------------------------------------------------------------------------------