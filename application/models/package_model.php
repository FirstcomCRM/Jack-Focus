<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class package_model extends CI_Model
{

    function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function get($id=FALSE){
        if ($id === FALSE) {
            $this->db->where('active =', 1);
            $this->db->order_by('package_id','desc');
            $query = $this->db->get('package');
            return $query->result_array();
        }
        $query = $this->db->get_where('package', array('package_id' => $id, 'active' => 1));
        return $query->row_array();
    }

    public function add() {
        $data = array(
            'package_name'              => $this->input->post('package_name'),
            'package_price'             => $this->input->post('package_price'),
            'deposit'                   => $this->input->post('deposit'),
            'payment_mode'              => $this->input->post('payment_mode'),
            'replacement_period'        => $this->input->post('replacement_period'),
            'description'               => $this->input->post('description'),
            'replacement_times'         => $this->input->post('replacement_times'),
            'remark'                    => $this->input->post('remark'),
        );
        $this->db->insert('package', $data);
        return $this->db->insert_id();
    }
    
    public function update($id){
        $data = array(
            'package_name'              => $this->input->post('package_name'),
            'package_price'             => $this->input->post('package_price'),
            'deposit'                   => $this->input->post('deposit'),
            'payment_mode'              => $this->input->post('payment_mode'),
            'replacement_period'        => $this->input->post('replacement_period'),
            'description'               => $this->input->post('description'),
            'replacement_times'         => $this->input->post('replacement_times'),
            'remark'                    => $this->input->post('remark'),
        );
        $this->db->where('package_id', $id);
        return $this->db->update('package', $data);
    }
    public function count(){
        $this->db->select('*');
        $this->db->where('active', 1);
        if (isset($_GET['package_name'])&&$_GET['package_name']!='') {
            $this->db->like('package_name', $_GET['package_name']);
        }

        $query = $this->db->get('package');
        return $query->num_rows(); 
    }

    public function fetch($limit, $start){
        $this->db->select('package.*');
        $this->db->from('package');
        $this->db->where('active', 1);
        if (isset($_GET['package_name'])&&$_GET['package_name']!='') {
            $this->db->like('package_name', $_GET['package_name']);
        }

        $this->db->limit($limit, $start);
        if (isset($_GET['package_name'])&&$_GET['package_name']!='') {
            $this->db->like('package_name', $_GET['package_name']);
        }
        else{
            $this->db->order_by('package_id','desc');
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

    public function company_name_exist($package_name, $id=FALSE){
        if ($id) {
            $this->db->where('package_id !=', $id);
        }
        $query = $this->db->get_where('package', array('package_name' => $package_name, 'active' => 1));
        if ($query->num_rows()>=1) {
            return $query->row();
        }
        return false;
    }
    public function delete($id){
        $data = array(
            'active'          => 0,
        );
        $this->db->where('package_id', $id);
        return $this->db->update('package', $data);
    }
}
// --------------------------------------------------------------------------------------------------------------------------