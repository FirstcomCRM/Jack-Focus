<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class nationality extends CI_Controller {

	
	function __construct() {
		parent::__construct();
		is_login();
		//$controller = ucfirst($this->router->class);
		//$role_id = $this->session->userdata('fcs_role_id');
		//$method = $this->router->fetch_method();
		//$get_perm = check_permission($role_id,$controller,$method);
		//if($get_perm == 0)
		//{
		//	redirect(base_url().'error_403');
		//}
		$this->load->model('nationality_model');
			$this->load->model('user_permision');
		$this->load->library('session');
	}

	public function index() {


			$a = $this->user_permision->check_action_permision('setup_view',$this->session->userdata('fcs_role_id'));


		if($a['setup_view'] == 1){

			redirect(base_url().'error_550');
	     }else{
				$data['msg'] = $this->session->flashdata('msg');
				$b_url = base_url().'nationality/index';
				$t_rows = $this->nationality_model->count();
				$pageConfig = create_pagination_config( $b_url, $t_rows, 10, 3);
				$this->pagination->initialize($pageConfig);
				$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
				
				$data['nationalityx'] = $this->nationality_model->fetch($pageConfig['per_page'], $page);
				$data['links'] = $this->pagination->create_links();

				$current_page =  floor(($this->uri->segment(3) / $pageConfig['per_page']) + 1);
				$data['pagination_msg'] = create_pagination_msg($current_page, $pageConfig['per_page'], $t_rows);

				$this->load->view('_template/header', $data);
		        $this->load->view('nationality/index', $data);
		        $this->load->view('_template/footer', $data);
		}        
	}
	public function add(){

			$a = $this->user_permision->check_action_permision('setup_view',$this->session->userdata('fcs_role_id'));


		if($a['setup_view'] == 0){

			redirect(base_url().'error_550');
	     }else{
				$this->load->helper(array('form'));
				$this->load->library('form_validation');
				$this->form_validation->set_rules('nationality_name', 'nationality_name', 'required|callback_check_add_company_name');

				if($this->form_validation->run() === FALSE) {
					$data['action'] = 'add';
					$this->load->view('_template/header', $data);
					$this->load->view('nationality/add_edit', $data);
					$this->load->view('_template/footer', $data);
				}
				else{
					$this->nationality_model->add();
					$this->session->set_flashdata('msg', 'New nationality successfully added');
					redirect(base_url().'nationality');
				}

		}			
	}

	public function check_add_company_name(){
		$package_name = $this->input->post('nationality_name');

        $result = $this->nationality_model->company_name_exist($package_name);
        if($result){
	        $this->form_validation->set_message('check_add_company_name', 'This nationality name already exist');
	        return false;
        }
        return true;
	}

	public function edit($id){


			$a = $this->user_permision->check_action_permision('setup_view',$this->session->userdata('fcs_role_id'));


		if($a['setup_view'] == 0){

			redirect(base_url().'error_550');
	     }else{
				$data['nationality'] = $this->nationality_model->get($id);
				if (empty($data['nationality'])) {
					show_404();
				}
				$this->load->helper('form');
				$this->load->library('form_validation');

				$this->form_validation->set_rules('nationality_name', 'category', 'required|callback_check_edit_company_name['.$id.']');

				if($this->form_validation->run() === FALSE) {
					$data['action'] = 'edit';
					$this->load->view('_template/header', $data);
					$this->load->view('nationality/add_edit', $data);
					$this->load->view('_template/footer', $data);	
				}
				else {
					$this->nationality_model->update($id);
					$this->session->set_flashdata('msg', 'Nationality successfully updated');
					redirect(base_url().'nationality');
				}

		}			


	}
	public function check_edit_company_name($str, $id){
		$nationality_name = $this->input->post('nationality_name');
        $result = $this->nationality_model->company_name_exist($nationality_name, $id);
        if($result){
	        $this->form_validation->set_message('check_edit_company_name', 'This nationality name already exist');
	        return false;
        }
        return true;
	}

	public function delete($id="") {
		if ($id=="") {
			show_404();
		}
		$this->nationality_model->delete($id);	
		$this->session->set_flashdata('msg', 'Nationality successfully deleted');
		redirect(base_url().'nationality');
	}


	public function edit_img($id){
		$data['nationality'] = $this->nationality_model->get($id);
		if (empty($data['nationality'])) {
			show_404();
		}

		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('nationality_name', 'category', 'required|callback_check_edit_company_name['.$id.']');

		if($this->form_validation->run() === FALSE) {
			$data['action'] = 'edit';
			$this->load->view('_template/header', $data);
			$this->load->view('nationality/img_upload', $data);
			$this->load->view('_template/footer', $data);	
		}
			else {
			$this->nationality_model->update($id);
			$this->session->set_flashdata('msg', 'Nationality successfully updated');
			redirect(base_url().'nationality');
		}
	
	}


	  public function do_upload()
        {
                $new_name = $this->input->post('image');
             	$nationality_id = $this->input->post('nationality_id');
             	//$pathX = $this->input->post('nationality_img_path');
             	//$path = $path_name.".jpg";

		   		$config['upload_path']          = './public/flag_pictures/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 2048;
                $config['max_width']            = 2048;
                $config['max_height']           = 2048;
				$config['file_name'] 			= $new_name; // ID-1
				$config['overwrite']			= TRUE;
				
				//unlink($pathX); 

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('userfile'))
                {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('msg', 'Image upload failed');
                        redirect(base_url().'nationality');
                }
                else
                {

                		$this->nationality_model->update_img($nationality_id);
                        $this->session->set_flashdata('msg', 'Flag image successfully updated');
                        redirect(base_url().'nationality');
                }
        }
}