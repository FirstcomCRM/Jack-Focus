<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class product_category_model extends CI_Model
{

    function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function get($id=FALSE){
        if ($id === FALSE) {
            $this->db->where('active =', 1);
            $this->db->order_by('product_category_id','desc');
            $query = $this->db->get('product_category');
            return $query->result_array();
        }
        $query = $this->db->get_where('product_category', array('product_category_id' => $id, 'active' => 1));
        return $query->row_array();
    }

    public function add() {
        $data = array(
            'category_name'        => $this->input->post('category_name'),
            'description'          => $this->input->post('description'),
            'last_update'          => time(),
        );
        $this->db->insert('product_category', $data);
        return $this->db->insert_id();
    }
    
    public function update($id){
        $data = array(
            'category_name'        => $this->input->post('category_name'),
            'description'          => $this->input->post('description'),
            'last_update'          => time(),
        );
        $this->db->where('product_category_id', $id);
        return $this->db->update('product_category', $data);
    }

    public function count(){
        $this->db->select('*');
        $this->db->where('active', 1);
        if (isset($_GET['category_name'])&&$_GET['category_name']!='') {
            $this->db->like('category_name', $_GET['category_name']);
        }

        if (isset($_GET['description'])&&$_GET['description']!='') {
            $this->db->like('description', $_GET['description']);
        }
        $query = $this->db->get('product_category');
        return $query->num_rows(); 
    }

    public function fetch($limit, $start){
        $this->db->select('product_category.*');
        $this->db->from('product_category');
        $this->db->where('active', 1);
        if (isset($_GET['category_name'])&&$_GET['category_name']!='') {
            $this->db->like('category_name', $_GET['category_name']);
        }

        if (isset($_GET['description'])&&$_GET['description']!='') {
            $this->db->like('description', $_GET['description']);
        }
        $this->db->limit($limit, $start);
        if (isset($_GET['sort_by'])&&$_GET['sort_by']!='') {
            $this->db->order_by('last_update',$_GET['sort_by']);
        }
        else{
            $this->db->order_by('product_category_id','desc');
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

    public function category_name_exist($category_name, $id=FALSE){
        if ($id) {
            $this->db->where('product_category_id !=', $id);
        }
        $query = $this->db->get_where('product_category', array('category_name' => $category_name, 'active' => 1));
        if ($query->num_rows()>=1) {
            return $query->row();
        }
        return false;
    }
    public function delete($id){
        $data = array(
            'active'          => 0,
        );
        $this->db->where('product_category_id', $id);
        return $this->db->update('product_category', $data);
    }
}
// --------------------------------------------------------------------------------------------------------------------------