<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class nationality_model extends CI_Model
{

    function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function get($id=FALSE){
        if ($id === FALSE) {
            $this->db->where('active =', 1);
            $this->db->order_by('nationality_id','desc');
            $query = $this->db->get('nationality');
            return $query->result_array();
        }
        $query = $this->db->get_where('nationality', array('nationality_id' => $id, 'active' => 1));
        return $query->row_array();
    }

    public function add() {
        $data = array(
            'nationality_name'              => $this->input->post('nationality_name'),
            'nationality_remarks'           => $this->input->post('nationality_remarks'),
        );
        $this->db->insert('nationality', $data);
        return $this->db->insert_id();
    }
    
    public function update($id){
        $data = array(
            'nationality_name'              => $this->input->post('nationality_name'),
            'nationality_remarks'           => $this->input->post('nationality_remarks'),
        );
        $this->db->where('nationality_id', $id);
        return $this->db->update('nationality', $data);
    }
    public function count(){
        $this->db->select('*');
        $this->db->where('active', 1);
        if (isset($_GET['nationality_name'])&&$_GET['nationality_name']!='') {
            $this->db->like('nationality_name', $_GET['nationality_name']);
        }

        $query = $this->db->get('nationality');
        return $query->num_rows(); 
    }

    public function fetch($limit, $start){
        $this->db->select('nationality.*');
        $this->db->from('nationality');
        $this->db->where('active', 1);
        if (isset($_GET['nationality_name'])&&$_GET['nationality_name']!='') {
            $this->db->like('nationality_name', $_GET['nationality_name']);
        }

        $this->db->limit($limit, $start);
        if (isset($_GET['nationality_name'])&&$_GET['nationality_name']!='') {
            $this->db->like('nationality_name', $_GET['nationality_name']);
        }
        else{
            $this->db->order_by('nationality_id','desc');
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
        $this->db->where('nationality_id', $id);
        return $this->db->update('nationality', $data);
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