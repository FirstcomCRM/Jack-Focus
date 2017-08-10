<?php
class admin_model extends CI_Model {

	public function __construct() {
		$this->load->database();
	}

	public function get_admins($id = FALSE) {
		if ($id === FALSE)
		{
			$this->db->where('status !=', 1);
			$this->db->where('company_id', $this->session->userdata('company_id'));
			$query = $this->db->get('admin');
			return $query->result_array();
		}

		$query = $this->db->get_where('admin', array('admin_id' => $id));
		return $query->row_array();
	}
	public function login($username, $password){
        // Prep the query
        $this->db-> where('username', $username);
        $this->db->where('password', hash('sha512',$password));
        $this->db->where('active', 1);
        $this->db->limit(1);
        $query = $this->db->get('admin');
        if($query->num_rows == 1)
        {
            $row = $query->row();
            $data = array(
                'fcs_admin_id'          => $row->admin_id,
                'fcs_email'             => $row->username,
                'fcs_validate_user'     => true,
            );
            $this->session->set_userdata($data);
            return $row;
        }
        return false;
    }
	public function username_exist($username){
        $query = $this->db->get_where('admin', array('username' => $username, 'active' => 1));
        if ($query->num_rows()==1) {
            return $query->row();
        }
        return false;
    }

    public function check_old_password($id, $old_password){
        $this->db->where('password =', hash('sha512',$old_password));
        $this->db->where('admin_id =', $id);
        $this->db->where('active =', 1);
        $query = $this->db->get("admin");
        if($query->num_rows == 1){
            return true;
        }
        return false;
    }

    public function change_password($id){
        $data = array(
            'password' => $this->security->xss_clean(hash('sha512',$this->input->post('new_password'))),
            );
        $this->db->where('admin_id', $id);
        return $this->db->update('admin', $data); 
    }


	// public function add_admin() {
	// 	$data = array(
	// 		'name' 	  	=> $this->input->post('name'),
	// 		'username'	=> $this->input->post('username'),
	// 		'password'	=> md5($this->input->post('password')),
	// 		'role' 		=> $this->input->post('role'),
	// 		'company_id'=> $this->input->post('company_id'),
	// 	);
	// 	return $this->db->insert('admin', $data);
	// }

	// public function update_admin($id) {
	// 	$data = array(
	// 		'name' 	  	=> $this->input->post('name'),
	// 		'username'	=> $this->input->post('username'),
	// 		'role' 		=> $this->input->post('role'),
	// 		'company_id'=> $this->input->post('company_id'),
 //        );
 //        if($this->input->post('password') != '') {
 //        	$data['password'] = md5($this->input->post('password'));
 //        }

	// 	$this->db->where('admin_id', $id);
	// 	return $this->db->update('admin', $data); 
	// }

	// public function delete_admin($id) {
	// 	$data = array(
	// 		'status' => 1,
 //        );
 //        $this->db->where('admin_id', $id);
	// 	return $this->db->update('admin', $data); 
	// }

	// public function fetch_admin($limit, $start) {
	// 	if($this->session->userdata('both_user') != 'true') {
	// 		$this->db->where('company_id', $this->session->userdata('company_id'));
	// 	} 
	// 	else {
	// 		$where = "company_id = ".$this->session->userdata('company_id')." OR company_id = 2";
	// 		$this->db->where($where);
	// 	}
	// 	$this->db->where('status !=', 1);
	// 	$this->db->limit($limit, $start);
 //        $query = $this->db->get("admin");

 //        if ($query->num_rows() > 0) {
 //            foreach ($query->result() as $row) {
 //                $data[] = $row;
 //            }
 //            return $data;
 //        }

 //        return false;
	// }

	// public function record_count() {
	// 	if($this->session->userdata('both_user') != 'true') {
	// 		$this->db->where('company_id', $this->session->userdata('company_id'));
	// 	} 
	// 	else {
	// 		$where = "company_id = ".$this->session->userdata('company_id')." OR company_id = 2";
	// 		$this->db->where($where);
	// 	}

 //        $query = $this->db->get_where('admin', array('status !='=>1));
	// 	return $query->num_rows(); 
	// }

	// public function check_email($email) {
	// 	$query = $this->db->get_where('admin', array('status !='=>1, 'email'=>$email));
	// 	if($query->num_rows == 1) {
	// 		return FALSE;
	// 	}
	// 	return TRUE;
	// }	

	// public function get_email($id) {
	// 	$this->db->select('email');
	// 	$query = $this->db->get_where('admin', array('admin_id' => $id));
	// 	$result = $query->row_array();
	// 	return $result['email'];
	// }	

	// public function check_username($username) {
	// 	$query = $this->db->get_where('admin', array('status !=' => 1, 'username' => $username));
	// 	if($query->num_rows == 1) {
	// 		return FALSE;
	// 	}
	// 	return TRUE;
	// }	
}