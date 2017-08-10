<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class insurance_package_model extends CI_Model
{

    function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function get($id=FALSE){
        if ($id === FALSE) {
            $this->db->where('active =', 1);
            $this->db->order_by('insurance_id','desc');
            $query = $this->db->get('insurance_package');
            return $query->result_array();
        }
        $query = $this->db->get_where('insurance_package', array('insurance_id' => $id, 'active' => 1));
        return $query->row_array();
    }

    public function add() {
        $data = array(
            'insurance_name'         => $this->input->post('insurance_name'),
            'fee'                    => $this->input->post('fee'),
            'deposit'                => $this->input->post('deposit'),
            'payment_mode'           => $this->input->post('payment_mode'),
            'replacement_period'     => $this->input->post('replacement_period'),
            'description'            => $this->input->post('description'),
            
            
            //'last_update'     => time(),
        );
        $this->db->insert('insurance_package', $data);
        return $this->db->insert_id();
    }
    
    public function update($id){
        $data = array(
            'insurance_name'         => $this->input->post('insurance_name'),
            'fee'                    => $this->input->post('fee'),
            'deposit'                => $this->input->post('deposit'),
            'payment_mode'           => $this->input->post('payment_mode'),
            'replacement_period'     => $this->input->post('replacement_period'),
            'description'            => $this->input->post('description'),
        
            //'last_update'     => time(),
        );
        $this->db->where('insurance_id', $id);
        return $this->db->update('insurance_package', $data);
    }
    public function count(){
        $this->db->select('*');
        $this->db->where('active', 1);
        if (isset($_GET['insurance_name'])&&$_GET['insurance_name']!='') {
            $this->db->like('insurance_name', $_GET['insurance_name']);
        }

  
        $query = $this->db->get('insurance_package');
        return $query->num_rows(); 
    }

    public function fetch($limit, $start){
        $this->db->select('insurance_package.*');
        $this->db->from('insurance_package');
        $this->db->where('active', 1);
        if (isset($_GET['insurance_name'])&&$_GET['insurance_name']!='') {
            $this->db->like('insurance_name', $_GET['insurance_name']);
        }

        $this->db->limit($limit, $start);
        if (isset($_GET['sort_by'])&&$_GET['sort_by']!='') {
            $this->db->order_by($_GET['sort_by']);
        }
        else{
            $this->db->order_by('insurance_id','desc');
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
        $this->db->where('insurance_id', $id);
        return $this->db->update('insurance_package', $data);
    }
}
// --------------------------------------------------------------------------------------------------------------------------