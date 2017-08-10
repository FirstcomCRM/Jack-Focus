<?php
class user_model extends CI_Model {

	public function __construct() {
		$this->load->database();
	}

	public function get($id = FALSE) {
		if ($id === FALSE)
		{
			$this->db->where('status !=', 1);
			$this->db->where('company_id', $this->session->userdata('company_id'));
			$query = $this->db->get('user');
			return $query->result_array();
		}

		$query = $this->db->get_where('user', array('user_id' => $id));
		return $query->row_array();
	}
	public function login($username, $password){
        // Prep the query
        $this->db->where('username', $username);
        $this->db->where('password', hash('sha512',$password));
        $this->db->where('active', 1);
        $this->db->limit(1);
        $query = $this->db->get('user');
        if($query->num_rows == 1)
        {
            $row = $query->row();
            $data = array(
                'fcs_user_id'          => $row->user_id,
                'fcs_username'         => $row->username,
                'fcs_role_id'          => $row->role_id,
                'fcs_validate_user'    => true,
            );
            $this->session->set_userdata($data);
            return $row;
        }
        return false;
    }
	public function username_exist($username, $id=FALSE){
        if ($id) {
            $this->db->where('user_id !=', $id);
        }
        $query = $this->db->get_where('user', array('username' => $username, 'active' => 1));
        if ($query->num_rows()==1) {
            return $query->row();
        }
        return false;
    }

    public function check_old_password($id, $old_password){
        $this->db->where('password =', hash('sha512',$old_password));
        $this->db->where('user_id =', $id);
        $this->db->where('active =', 1);
        $query = $this->db->get("user");
        if($query->num_rows == 1){
            return true;
        }
        return false;
    }

    public function change_password($id){
        $data = array(
            'password' => $this->security->xss_clean(hash('sha512',$this->input->post('new_password'))),
            );
        $this->db->where('user_id', $id);
        return $this->db->update('user', $data); 
    }


	public function add() {
        $data = array(
            'username'      => $this->input->post('username'),
            'password'      => $this->security->xss_clean(hash('sha512',$this->input->post('password'))),
            'role_id'       => $this->input->post('role_id'),
        );
        $this->db->insert('user', $data);
        return $this->db->insert_id();
    }
    
    public function update($id){
        $data = array(
            'username'      => $this->input->post('username'),
            'password'      => $this->security->xss_clean(hash('sha512',$this->input->post('password'))),
            'role_id'       => $this->input->post('role_id'),
        );
        $this->db->where('user_id', $id);
        return $this->db->update('user', $data);
    }
    public function count(){
        $this->db->select('u.*, r.role_name');
        $this->db->from('user u');
        $this->db->join('role r', 'u.role_id=r.role_id', 'left');
        if (isset($_GET['username'])&&$_GET['username']!='') {
        	$this->db->like('u.username', $_GET['username']);
        }
        if (isset($_GET['role_id'])&&$_GET['role_id']!='') {
        	$this->db->where('u.role_id', $_GET['role_id']);
        }
        $this->db->where('u.active', 1);
        $this->db->where('u.user_id !=', 1);
        $query = $this->db->get();

        return $query->num_rows(); 
    }

    public function fetch($limit, $start){
        $this->db->select('u.*, r.role_name');
        $this->db->from('user u');
        $this->db->join('role r', 'u.role_id=r.role_id', 'left');
        if (isset($_GET['username'])&&$_GET['username']!='') {
        	$this->db->like('u.username', $_GET['username']);
        }
        if (isset($_GET['role_id'])&&$_GET['role_id']!='') {
        	$this->db->where('u.role_id', $_GET['role_id']);
        }
        $this->db->where('u.active', 1);
        $this->db->where('u.user_id !=', 1);
        $this->db->limit($limit, $start);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    
    public function delete($id){
        $data = array(
            'active'          => 0,
        );
        $this->db->where('user_id', $id);
        return $this->db->update('user', $data);
    }
}