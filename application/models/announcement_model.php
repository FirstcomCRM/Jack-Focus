<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class announcement_model extends CI_Model
{

    function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function get($id=FALSE){
        if ($id === FALSE) {
            $this->db->where('active =', 1);
            $this->db->order_by('announce_id','desc');
            $query = $this->db->get('announcement');
            return $query->result_array();
        }
        $query = $this->db->get_where('announcement', array('announce_id' => $id, 'active' => 1));
        return $query->row_array();
    }

    public function add() {
        $data = array(
          'announce_title'    => $this->input->post('announce_title'),
          'announce_body'  => $this->input->post('announce_body'),
          'announce_date'  => date('Y-m-d')
        );
        $this->db->insert('announcement', $data);
        return $this->db->insert_id();
    }
    
    public function update($id){
        $data = array(
            'announce_title'    => $this->input->post('announce_title'),
            'announce_body'  => $this->input->post('announce_body'),
            'announce_date'  => date('Y-m-d')
        );
        $this->db->where('announce_id', $id);
        return $this->db->update('announcement', $data);
    }
    public function count(){
        $this->db->select('*');
        $this->db->where('active', 1);
        if (isset($_GET['announce_title'])&&$_GET['announce_title']!='') {
            $this->db->like('announce_title', $_GET['announce_title']);
        }

        $query = $this->db->get('announcement');
        return $query->num_rows(); 
    }

    public function fetch($limit, $start){
        $this->db->select('*');
        $this->db->from('announcement');
        $this->db->where('active', 1);
        if (isset($_GET['announce_title'])&&$_GET['announce_title']!='') {
            $this->db->like('announce_title', $_GET['announce_title']);
        }
        $this->db->limit($limit, $start);
        if (isset($_GET['sort_by'])&&$_GET['sort_by']!='') {
            $this->db->order_by($_GET['sort_by']);
        }
        else{
            $this->db->order_by('announce_id','desc');
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

    public function company_name_exist($company_name, $id=FALSE){
        if ($id) {
            $this->db->where('customer_id !=', $id);
        }
        $query = $this->db->get_where('customer', array('company_name' => $company_name, 'active' => 1));
        if ($query->num_rows()>=1) {
            return $query->row();
        }
        return false;
    }
    public function delete($id){
        $data = array(
            'active'          => 0,
        );
        $this->db->where('announce_id', $id);
        return $this->db->update('announcement', $data);
    }
}
// --------------------------------------------------------------------------------------------------------------------------