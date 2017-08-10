<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class customer_model extends CI_Model
{

    function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function get($id=FALSE){
        if ($id === FALSE) {
            $this->db->where('active =', 1);
            $this->db->order_by('customer_id','desc');
            $query = $this->db->get('customer');
            return $query->result_array();
        }
        $query = $this->db->get_where('customer', array('customer_id' => $id, 'active' => 1));
        return $query->row_array();
    }

    public function add() {
        $data = array(
            'company_name'    => $this->input->post('company_name'),
            'contact_person'  => $this->input->post('contact_person'),
            'title'           => $this->input->post('title'),
            'email'           => $this->input->post('email'),
            'tel'             => $this->input->post('tel'),
            'hp'              => $this->input->post('hp'),
            'fax'             => $this->input->post('fax'),
            'address'         => $this->input->post('address'),
            'postal_code'     => $this->input->post('postal_code'),
            'remark'          => $this->input->post('remark'),
            'last_update'     => time(),
        );
        $this->db->insert('customer', $data);
        return $this->db->insert_id();
    }
    
    public function update($id){
        $data = array(
            'company_name'    => $this->input->post('company_name'),
            'contact_person'  => $this->input->post('contact_person'),
            'title'           => $this->input->post('title'),
            'email'           => $this->input->post('email'),
            'tel'             => $this->input->post('tel'),
            'hp'              => $this->input->post('hp'),
            'fax'             => $this->input->post('fax'),
            'address'         => $this->input->post('address'),
            'postal_code'     => $this->input->post('postal_code'),
            'remark'          => $this->input->post('remark'),
            'last_update'     => time(),
        );
        $this->db->where('customer_id', $id);
        return $this->db->update('customer', $data);
    }
    public function count(){
        $this->db->select('*');
        $this->db->where('active', 1);
        if (isset($_GET['company_name'])&&$_GET['company_name']!='') {
            $this->db->like('company_name', $_GET['company_name']);
        }

        if (isset($_GET['contact_person'])&&$_GET['contact_person']!='') {
            $this->db->like('contact_person', $_GET['contact_person']);
        }
        $query = $this->db->get('customer');
        return $query->num_rows(); 
    }

    public function fetch($limit, $start){
        $this->db->select('customer.*');
        $this->db->from('customer');
        $this->db->where('active', 1);
        if (isset($_GET['company_name'])&&$_GET['company_name']!='') {
            $this->db->like('company_name', $_GET['company_name']);
        }
        if (isset($_GET['contact_person'])&&$_GET['contact_person']!='') {
            $this->db->like('contact_person', $_GET['contact_person']);
        }
        $this->db->limit($limit, $start);
        if (isset($_GET['sort_by'])&&$_GET['sort_by']!='') {
            $this->db->order_by('last_update',$_GET['sort_by']);
        }
        else{
            $this->db->order_by('customer_id','desc');
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
        $this->db->where('customer_id', $id);
        return $this->db->update('customer', $data);
    }
}
// --------------------------------------------------------------------------------------------------------------------------