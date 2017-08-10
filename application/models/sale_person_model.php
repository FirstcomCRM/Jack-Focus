<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class sale_person_model extends CI_Model
{

    function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function get($id=FALSE){
        if ($id === FALSE) {
            $this->db->where('active =', 1);
            $this->db->order_by('sale_person_id','desc');
            $query = $this->db->get('sale_person');
            return $query->result_array();
        }
        $query = $this->db->get_where('sale_person', array('sale_person_id' => $id, 'active' => 1));
        return $query->row_array();
    }

    public function add() {
        $data = array(
            'name'    => $this->input->post('name'),
            'tel'     => $this->input->post('tel'),
            'hp'      => $this->input->post('hp'),
            'email'   => $this->input->post('email'),
            'remark'  => $this->input->post('remark'),
            'date_added'  => get_timestamp(date('d-m-Y'), '-')
        );

        $this->db->insert('sale_person', $data);
        return $this->db->insert_id();
    }
    
    public function update($id){
        $data = array(
            'name'        => $this->input->post('name'),
            'email'       => $this->input->post('email'),
            'tel'         => $this->input->post('tel'),
            'hp'          => $this->input->post('hp'),
            'remark'      => $this->input->post('remark'),
            'date_added'  => get_timestamp(date('d-m-Y'), '-')
        );
        $this->db->where('sale_person_id', $id);
        return $this->db->update('sale_person', $data);
    }
    public function count(){
        $this->db->select('*');
        $this->db->where('active', 1);

        if (isset($_GET['name'])&&$_GET['name']!='') {
            $this->db->like('name', $_GET['name']);
        }

        $query = $this->db->get('sale_person');
        return $query->num_rows(); 
    }

    public function fetch($limit, $start){
        $this->db->select('sale_person.*');
        $this->db->from('sale_person');
        $this->db->where('active', 1);
        if (isset($_GET['name'])&&$_GET['name']!='') {
            $this->db->like('name', $_GET['name']);
        }
        $this->db->limit($limit, $start);
        if (isset($_GET['sort_by'])&&$_GET['sort_by']!='') {
            $this->db->order_by('date_added',$_GET['sort_by']);
        }
        else{
            $this->db->order_by('sale_person_id','desc');
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

    public function name_exist($name, $id=FALSE){
        if ($id) {
            $this->db->where('sale_person_id !=', $id);
        }
        $query = $this->db->get_where('sale_person', array('name' => $name, 'active' => 1));
        if ($query->num_rows()>=1) {
            return $query->row();
        }
        return false;
    }
    public function delete($id){
        $data = array(
            'active'          => 0,
        );
        $this->db->where('sale_person_id', $id);
        return $this->db->update('sale_person', $data);
    }
}
// --------------------------------------------------------------------------------------------------------------------------