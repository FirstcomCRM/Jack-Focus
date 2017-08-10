<?php
class permission_model extends CI_Model {

	public function __construct() {
		$this->load->database();
	}

	public function get($id = FALSE) {
		if ($id === FALSE)
		{
			$this->db->where('active',1);
			$query = $this->db->get('permission');
			return $query->result_array();
		}

		$query = $this->db->get_where('permission', array('permission_id' => $id));
		return $query->row_array();
	}

	public function count() {
        $this->db->select('p.*,r.role_name');
		$this->db->from('permission p');
		$this->db->join('role r','p.role_id = r.role_id', 'left');
		if( $this->input->get('role_id') && ( $this->input->get('role_id') != '' ) ) {
			$this->db->where("p.role_id", $this->input->get('role_id')); 
		}
		$this->db->where('p.active', 1);
		$this->db->where('r.active',1);
        $query = $this->db->get();
		return $query->num_rows(); 
	}

	public function fetch($limit, $start) {
		$this->db->select('p.*,r.role_name');
		$this->db->from('permission p');
		$this->db->join('role r','p.role_id = r.role_id', 'left');
		if( $this->input->get('role_id') && ( $this->input->get('role_id') != '' ) ) {
			$this->db->where("p.role_id", $this->input->get('role_id')); 
		}
		$this->db->where('p.active', 1);
		$this->db->where('r.active',1);
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

	public function add(){
		$controller_names 	= array_unique($this->input->post('hidname'));
		$role_id = $this->input->post('role_id');
		
		foreach($controller_names as $cnk => $controller_name)
		{
			$convert_json = json_encode($this->input->post($controller_name.'_permission'));

			if($convert_json != 'false')
			{	
				$data = array(
						'role_id' 	 => $role_id,
						'controller' => $controller_name ,
						'perm'		 => $convert_json,
				);
				$this->db->insert('permission', $data);
			}
		}
	}

	public function update($id){

		$data = array(
			'permission_name'			=> $this->input->post('permission_name'),
			'description'	=> $this->input->post('description'),
		);
		$this->db->where('permission_id', $id);
		return $this->db->update('permission', $data); 

	}
	public function permission_exist($role_id, $id=FALSE){
        if ($id) {
            $this->db->where('permission_id !=', $id);
        }
        $query = $this->db->get_where('permission', array('permission_name' => $permission_name, 'active' => 1));
        if ($query->num_rows()>=1) {
            return $query->row();
        }
        return false;
    }
	public function delete($id) {
		$data = array(
			'active' => 0,
        );
		$this->db->where('permission_id', $id);
		return $this->db->update('permission', $data); 
	}
	public function get_permission($role_id,$controller){
		$this->db->select('*');
		$this->db->from('permission');
		$this->db->where('active', 1);
		$this->db->where('role_id =',$role_id);
		$this->db->where('controller =',$controller);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function delete_with_role(){
		$data = array(
			'active' => 0,
        );
		$this->db->where('role_id', $this->input->post('role_id'));
		return $this->db->update('permission', $data); 
	}

	public function permission_with_role($role_id){
		$this->db->where('role_id =',$role_id);
		$this->db->where('active', 1);
		$query = $this->db->get('permission');
		return $query->result_array();
	}
}