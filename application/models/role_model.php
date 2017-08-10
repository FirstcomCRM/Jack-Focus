<?php
class role_model extends CI_Model {

	public function __construct() {
		$this->load->database();
	}

	public function get($id = FALSE) {
		if ($id === FALSE)
		{
			$this->db->where('active',1);
			$query = $this->db->get('role');
			return $query->result_array();
		}

		$query = $this->db->get_where('role', array('role_id' => $id));
		return $query->row_array();
	}

	public function count() {
        $this->db->where('active', 1);
		if (isset($_GET['role_name'])&&$_GET['role_name']!='') {
			$this->db->like('role_name', $_GET['role_name']);
		}
		if (isset($_GET['description'])&&$_GET['description']!='') {
			$this->db->like('description', $_GET['description']);
		}
        $query = $this->db->get("role");
		return $query->num_rows(); 
	}

	public function fetch($limit, $start) {

		$this->db->where('active', 1);
		if (isset($_GET['role_name'])&&$_GET['role_name']!='') {
			$this->db->like('role_name', $_GET['role_name']);
		}
		if (isset($_GET['description'])&&$_GET['description']!='') {
			$this->db->like('description', $_GET['description']);
		}
		$this->db->limit($limit, $start);
        $query = $this->db->get("role");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }

        return false;
	}

	public function add(){

		$data = array(
			'role_name'			=> $this->input->post('role_name'),
			'description'	=> $this->input->post('description'),
		);

		$this->db->insert('role', $data);
		return $this->db->insert_id();
	}

	public function update($id){

		$data = array(
			'role_name'			=> $this->input->post('role_name'),
			'description'	=> $this->input->post('description'),
		);
		
		
		$this->db->where('role_id', $id);
		return $this->db->update('role', $data); 

	}
	public function role_name_exist($role_name, $id=FALSE){
        if ($id) {
            $this->db->where('role_id !=', $id);
        }
        $query = $this->db->get_where('role', array('role_name' => $role_name, 'active' => 1));
        if ($query->num_rows()>=1) {
            return $query->row();
        }
        return false;
    }
	public function delete($id) {
		$data = array(
			'active' => 0,
        );
        $get_data = $this->get_roles($id);

		$this->db->where('role_id', $id);
		return $this->db->update('role', $data); 
	}
}