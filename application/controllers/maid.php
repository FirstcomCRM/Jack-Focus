<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class maid extends CI_Controller {

	
	function __construct() {
		parent::__construct();
		/*is_login();
		$controller = ucfirst($this->router->class);
		$role_id = $this->session->userdata('fcs_role_id');
		$method = $this->router->fetch_method();
		$get_perm = check_permission($role_id,$controller,$method);
		if($get_perm == 0)
		{
			redirect(base_url().'error_403');
		}*/
	    $this->load->helper(array('form', 'url'));
		$this->load->model('maid_model');
		$this->load->model('supplier_model');
		$this->load->model('status_model');
		$this->load->model('nationality_model');
		$this->load->model('branch_model');
		$this->load->model('staff_model');
		$this->load->model('customer_maid_model');
		$this->load->model('invoice_model');
		$this->load->model('user_permision');
		$this->load->library('session');
	}

	public function index() {

		$a = $this->user_permision->check_action_permision('maid_view',$this->session->userdata('fcs_user_id'));


		if($a['maid_view'] == 0){

			redirect(base_url().'error_550');
	     }else{
	     	$data['msg'] = $this->session->flashdata('msg');
			$b_url = base_url().'maid/index';
			$t_rows = $this->maid_model->count();


			// $pageConfig = create_pagination_config( $b_url, $t_rows, 10, 3);
			// $this->pagination->initialize($pageConfig);
			// $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			
			$data['maids'] = $this->maid_model->maid_fetch(20);
			// $data['links'] = $this->pagination->create_links();

			// $current_page =  floor(($this->uri->segment(3) / $pageConfig['per_page']) + 1);
			// $data['pagination_msg'] = create_pagination_msg($current_page, $pageConfig['per_page'], $t_rows);

		
			$data['suppliers'] = $this->supplier_model->get();
			$data['statusx'] = $this->status_model->get();
			$data['nationalities'] = $this->nationality_model->get();
			$data['staffx'] = $this->staff_model->get();
			$this->load->view('_template/header', $data);
	        $this->load->view('maid/index', $data);
	        $this->load->view('_template/footer', $data);
	     }

	}


	public function ajax_load($id){

			$data['maids'] = $this->maid_model->ajax_maid_load($id);

			$this->load->view('maid/ajax_load', $data);


	}



	public function maid_desc() {  // maid loan
		$data['msg'] = $this->session->flashdata('msg');
		$b_url = base_url().'maid/maid_desc';
		$t_rows = $this->maid_model->count_maid_desc();

		$pageConfig = create_pagination_config( $b_url, $t_rows, 10, 3);
		$this->pagination->initialize($pageConfig);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		
		$data['maids'] = $this->maid_model->fetch($pageConfig['per_page'], $page);
		$data['links'] = $this->pagination->create_links();

		$current_page =  floor(($this->uri->segment(3) / $pageConfig['per_page']) + 1);
		$data['pagination_msg'] = create_pagination_msg($current_page, $pageConfig['per_page'], $t_rows);

	
		$data['suppliers'] = $this->supplier_model->get();
		$data['statusx'] = $this->status_model->get();
		$data['nationalities'] = $this->nationality_model->get();
		$data['staffx'] = $this->staff_model->get();

		$this->load->view('_template/header', $data);
        $this->load->view('maid/maid_desc', $data);
        $this->load->view('_template/footer', $data);


	}

	public function maid_desc_edit($id){

        $data['maids'] = $this->maid_model->fetch_maid_desc_edit($id);
		if (empty($data['maids'])) {
			show_404();
		}
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('maid_code', 'maid_code', 'required');

		if($this->form_validation->run() === FALSE) {
			
			$this->load->view('_template/header', $data);
			$this->load->view('maid/maid_desc_edit', $data);
			$this->load->view('_template/footer', $data);	
		}
		else {
			$this->maid_model->update_maid_desc($id);
			$this->session->set_flashdata('msg', 'maid successfully updated');
			redirect(base_url().'maid/maid_desc');
		}

	}


	public function add(){

			$a = $this->user_permision->check_action_permision('maid_add',$this->session->userdata('fcs_user_id'));


			if($a['maid_add'] == 0){
				redirect(base_url().'error_550');

			}else{	
				$this->load->helper(array('form'));
				$this->load->library('form_validation');
				$this->form_validation->set_rules('maid_name', 'maid_name', 'required|callback_check_add_company_name');

				$data['maxid'] = $this->maid_model->maxid();
				$data['msg'] = $this->session->flashdata('msg');

				if($this->form_validation->run() === FALSE) {
					$data['action'] = 'add';
					$data['suppliers'] = $this->supplier_model->get();
					$data['statusx'] = $this->status_model->get();
					$data['nationalities'] = $this->nationality_model->get();
					$data['branches'] = $this->branch_model->get();
					$data['staffx'] = $this->staff_model->get();
					$this->load->view('_template/header', $data);
					$this->load->view('maid/add_edit', $data);
					$this->load->view('_template/footer', $data);
				}
				else{


					 
		             	$maid_id = $this->input->post('maid_id');
		             	

				   		$config['upload_path']          = './public/maid_pictures/';
		                $config['allowed_types']        = 'jpg';
		                $config['max_size']             = 2048;
		                $config['max_width']            = 2048;
		                $config['max_height']           = 2048;
						$config['file_name'] 			= "ID-".$maid_id; // ID-1
						$config['overwrite']			= TRUE;
						
						
						//unlink($pathX); 

		                $this->load->library('upload', $config);

		                if ( ! $this->upload->do_upload('userfile'))
		                {
		                        $error = array('error' => $this->upload->display_errors());

		                         $this->session->set_flashdata('msg', 'Image upload failed');
		                        redirect(base_url().'maid/add');
		                }
		                else
		                {

		                		
		                		$this->maid_model->add();
		                		$this->maid_model->update_img($maid_id);
								$this->session->set_flashdata('msg', 'New maid successfully created');
								                      
		                      
		                        redirect(base_url().'maid');
		                }





					
				}
			}	
	}

	public function check_add_company_name(){
		$maid_name = $this->input->post('maid_name');

        $result = $this->maid_model->company_name_exist($maid_name);
        if($result){
	        $this->form_validation->set_message('check_add_company_name', 'Maid name already exist');
	        return false;
        }
        return true;
	}

	public function edit($id){	


		$a = $this->user_permision->check_action_permision('maid_edit',$this->session->userdata('fcs_user_id'));


		if($a['maid_edit'] == 0){

			redirect(base_url().'error_550');
	     }else{

				$data['msg'] = $this->session->flashdata('msg');

				$data['maid'] = $this->maid_model->get($id);
				if (empty($data['maid'])) {
					show_404();
				}
				$this->load->helper('form');
				$this->load->library('form_validation');

				$this->form_validation->set_rules('maid_name', 'category', 'required|callback_check_edit_company_name['.$id.']');

				if($this->form_validation->run() === FALSE) {
					$data['action'] = 'edit';
					$data['suppliers'] = $this->supplier_model->get();
					$data['branches'] = $this->branch_model->get();
					$data['statusx'] = $this->status_model->get();
					$data['nationalities'] = $this->nationality_model->get();
					$data['staffx'] = $this->staff_model->get();
					$this->load->view('_template/header', $data);
					$this->load->view('maid/add_edit', $data);
					$this->load->view('_template/footer', $data);	
				}
				else {		


		             	$maid_id = $this->input->post('maid_id');
		             	

				   		$config['upload_path']          = './public/maid_pictures/';
		                $config['allowed_types']        = 'jpg';
		                $config['max_size']             = 2048;
		                $config['max_width']            = 2048;
		                $config['max_height']           = 2048;
						$config['file_name'] 			= "ID-".$maid_id; // ID-1
						$config['overwrite']			= TRUE;
						
					

		                $this->load->library('upload', $config);

		                if ( ! $this->upload->do_upload('userfile'))
		                {
		                        $error = array('error' => $this->upload->display_errors());

		                        if($_FILES['userfile']['error'] == 4){ // FOR OPTIONAL IF THERE IS NO PICTURE TO BE UPLOADED
									$this->maid_model->update($id);
			                		$this->maid_model->update_img($maid_id);
									$this->session->set_flashdata('msg', 'Maid successfully updated');
									redirect(base_url().'maid');
								}else{

		                         $this->session->set_flashdata('msg', 'Image upload failed');
		                        redirect(base_url().'maid/edit/'.$id);
		                    }
		                }else {		
		                		$this->maid_model->update($id);
		                		$this->maid_model->update_img($maid_id);
								$this->session->set_flashdata('msg', 'Maid successfully updated');
								redirect(base_url().'maid');


								
		                }
			



				}

		}	
			
	}
	public function check_edit_company_name($str, $id){
		$company_name = $this->input->post('maid_name');
        $result = $this->maid_model->company_name_exist($maid_name, $id);
        if($result){
	        $this->form_validation->set_message('check_edit_company_name', 'This Maid name already exist');
	        return false;
        }
        return true;
	}

	public function delete($id="") {

		 $a = $this->user_permision->check_action_permision('maid_del',$this->session->userdata('fcs_user_id'));


			if($a['maid_del'] == 0){

				redirect(base_url().'error_550');
		     }else{
					if ($id=="") {
						show_404();
					}
					$this->maid_model->delete($id);	
					$this->session->set_flashdata('msg', 'Maid successfully deleted');
					redirect(base_url().'maid');

			}		
}

	public function edit_img($id){

		$data['maid_details'] = $this->maid_model->getFull($id);
			if (empty($data['maid_details'])) {
				show_404();
			}
		$data['maid'] = $this->maid_model->get($id);
		if (empty($data['maid'])) {
			show_404();
		}

		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('maid_name', 'category', 'required|callback_check_edit_company_name['.$id.']');

		if($this->form_validation->run() === FALSE) {
			$data['action'] = 'edit';
			$this->load->view('_template/header', $data);
			$this->load->view('maid/maid_img_upload', $data);
			$this->load->view('_template/footer', $data);	
		}
			else {
			$this->maid_model->update($id);
			$this->session->set_flashdata('msg', 'Maid successfully updated');
			redirect(base_url().'maid');
		}
	
	}

	    public function do_upload()
        {
                $new_name = $this->input->post('image');
             	$maid_id = $this->input->post('maid_id');
             	//$path_name = "public/maid_pictures/".$new_name.".jpg";
             	$pathX = $this->input->post('maid_img_path');
             	$path = $path_name.".jpg";

		   		$config['upload_path']          = './public/maid_pictures/';
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

                        //$this->load->view('upload_form', $error);
                        $this->session->set_flashdata('msg', 'Image upload failed');
                        redirect(base_url().'maid');
                }
                else
                {

                		$this->maid_model->update_img($maid_id);

                        //$data = array('upload_data' => $this->upload->data());
                        //$this->load->view('maid/edit_img', $data);
                        //$this->output->cache(10);
                        $this->session->set_flashdata('msg', 'Image successfully updated');
                        redirect(base_url().'maid');
                }
        }


        public function view_full_details($id){

	        $a = $this->user_permision->check_action_permision('maid_view_bio',$this->session->userdata('fcs_user_id'));


			if($a['maid_view_bio'] == 0){

				redirect(base_url().'error_550');
		     }else{

				$data['maid'] = $this->maid_model->getFull($id);
				if (empty($data['maid'])) {
					show_404();
				}


				$this->load->helper('form');
				$this->load->library('form_validation');

				$this->form_validation->set_rules('maid_name', 'category', 'required|callback_check_edit_company_name['.$id.']');

				if($this->form_validation->run() === FALSE) {
					$data['action'] = 'edit';
					$this->load->view('_template/header', $data);
					$this->load->view('maid/maid_full_info', $data);
					$this->load->view('_template/footer', $data);	
				}
				else {
					$this->maid_model->update($id);
					$this->session->set_flashdata('msg', 'Maid successfully updated');
					redirect(base_url().'maid');
				}

			}		
	}



	 public function print_maid_info($id){

	 		 $a = $this->user_permision->check_action_permision('maid_view',$this->session->userdata('fcs_user_id'));


			if($a['maid_view'] == 0){

				redirect(base_url().'error_550');
		     }else{

				$data['maid'] = $this->maid_model->getFull($id);
				if (empty($data['maid'])) {
					show_404();
				}

				$this->load->view('maid/print_maid_info', $data);
			}	
	}






	public function edit_status($id){
		$data['maid'] = $this->maid_model->get($id);
		if (empty($data['maid'])) {
			show_404();
		}
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('status_id', 'status_id', 'required');

		if($this->form_validation->run() === FALSE) {
			$data['action'] = 'edit_status';
			$data['statusx'] = $this->status_model->get();
			$this->load->view('_template/header', $data);
			$this->load->view('maid/edit_status', $data);
			$this->load->view('_template/footer', $data);	
		}
		else {
			$this->maid_model->update_status($id);
			$this->session->set_flashdata('msg', 'Maid successfully updated');
			redirect(base_url().'dashboard');
		}
	}

	public function tablet_view() {
		

			$a = $this->user_permision->check_action_permision('maid_tablet_view',$this->session->userdata('fcs_user_id'));


			if($a['maid_tablet_view'] == 0){

				redirect(base_url().'error_550');
		     }else{

				$data['action'] = 'tablet_view';
				$data['msg'] = $this->session->flashdata('msg');
				$b_url = base_url().'maid/tablet_view';
				$t_rows = $this->maid_model->count();
			
				
				$data['maids'] = $this->maid_model->fetch(0, 0);
			
			
				$data['suppliers'] = $this->supplier_model->get();
				$data['statusx'] = $this->status_model->get();
				$data['nationalities'] = $this->nationality_model->get();
				$data['staffx'] = $this->staff_model->get();

		// cart part

				$cart_item = array();
					if($this->session->userdata('arr_data')){
						$arr_item = $this->session->userdata('arr_data');
						foreach($arr_item as $r){

							$cart_item[] = $this->maid_model->fetchMaidCart($r);

						}


					 }			

				$data['cart_item'] = $cart_item; 



				$this->load->view('_template/header', $data);
		        $this->load->view('maid/tablet_view', $data);
		        $this->load->view('_template/footer', $data);

		      }  

	}





		public function view_cart_summary(){

		
		$summary_item = array();

				if($this->session->userdata('arr_data')){
				$arr_item = $this->session->userdata('arr_data');
				foreach($arr_item as $r){

					$summary_item[] = $this->maid_model->fetchMaidCart($r);

				}


			 }		



		$data['summary_item'] = $summary_item; 



		$this->load->view('_template/header', $data);
        $this->load->view('maid/view_cart_summary', $data);
        $this->load->view('_template/footer', $data);
	

	}






	public function welcome_customer($id){
		//$data['maid'] = $this->maid_model->get($id);
		$data['maidn'] = $this->maid_model->get($id);
		if (empty($data['maidn'])) {
			show_404();
		}
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('customer_id', 'customer_id', 'required');

		if($this->form_validation->run() === FALSE) {
			$data['action'] = 'request';
			$data['customers'] = $this->customer_maid_model->get();
			$data['maids'] = $this->maid_model->get();
			
			$this->load->view('_template/header', $data);
			$this->load->view('maid/welcome_customer', $data);
			$this->load->view('_template/footer', $data);	
		}
		else {
			$this->maid_model->add_request();
			//$this->session->set_flashdata('msg', 'Purchase request successfull! ');
			// redirect(base_url().'maid/replace' . '/'.$id);

		}
	}

		public function replace(){
		//$data['maid'] = $this->maid_model->get($id);
			$new_maid_id = $this->input->post('maid_id');
			$customer_id = $this->input->post('customer_id');
			$current_maid_id = $this->input->post('maid_id_1');

			if($current_maid_id == $new_maid_id)
			{
				$this->session->set_flashdata('msg', 'Please choose a different maid..');
				redirect(base_url().'maid/tablet_view');
			}
			$data['current_maids']=$this->invoice_model->getReplace($customer_id,$current_maid_id);
			//print_r($data);
			if (empty($data['current_maids'])) {
			//show_404();
				$this->session->set_flashdata('msg', 'Please try again..');
				redirect(base_url().'maid/tablet_view');
			}
			$this->load->helper('form');
			// $this->load->library('form_validation');

			// $this->form_validation->set_rules('customer_id', 'customer_id', 'required');

			// if($this->form_validation->run() === FALSE) {
			$data['action'] = 'replace';
			$data['customers'] = $this->customer_maid_model->get();
			$data['oldx'] = $this->maid_model->get($current_maid_id);
			$data['newx'] = $this->maid_model->get($new_maid_id);
			$data['customers'] = $this->customer_maid_model->get($customer_id);
			$this->load->view('_template/header', $data);
			$this->load->view('maid/replace', $data);
			$this->load->view('_template/footer', $data);	
		// }
		// else {
		// 	$this->maid_model->add_request();
		// 	$this->session->set_flashdata('msg', 'Purchase request successfull! ');

			//redirect(base_url().'maid/replace' . '/'.$id);

		// }
	}

	public function change_maid(){
			$old_maid_id = $this->input->post('maid_old');
			$new_maid_id = $this->input->post('maid_new');
			$customer_id = $this->input->post('customer_id');
			$quo_id = $this->input->post('quo_id');



			echo $result = $this->invoice_model->replaceMaid($customer_id,$new_maid_id,$old_maid_id,$quo_id);


		// 	$current_maid_id = $this->input->post('maid_id_1');
		// 	$data['current_maids']=$this->invoice_model->getReplace($customer_id,$current_maid_id);
		// 	//print_r($data);
		// 	if (empty($data['current_maids'])) {
		// 	//show_404();
		// 		$this->session->set_flashdata('msg', 'Please try again..');
		// 		redirect(base_url().'maid/tablet_view');
		// 	}
		// 	$this->load->helper('form');
		// 	// $this->load->library('form_validation');

		// 	// $this->form_validation->set_rules('customer_id', 'customer_id', 'required');

		// 	// if($this->form_validation->run() === FALSE) {
		// 	$data['action'] = 'replace';
		// 	$data['customers'] = $this->customer_maid_model->get();
		// 	$data['oldx'] = $this->maid_model->get($current_maid_id);
		// 	$data['newx'] = $this->maid_model->get($new_maid_id);
		// 	$this->load->view('_template/header', $data);
		// 	$this->load->view('maid/replace', $data);
		// 	$this->load->view('_template/footer', $data);	
		// // }
		// // else {
		// // 	$this->maid_model->add_request();
		// // 	$this->session->set_flashdata('msg', 'Purchase request successfull! ');

		// 	//redirect(base_url().'maid/replace' . '/'.$id);

		// // }
	}


	public function maid_cart_button($id){

		// $this->session->unset_userdata('arr_data');
		$err_msg ="";
		$cart_item = array();


					if($this->session->userdata('arr_data')){
							
							$a = $this->session->userdata('arr_data');

							if(in_array($id, $a)){
								$err_msg = 1;

							}else{
								 array_push($a,$id);
								 $this->session->set_userdata('arr_data',$a);
							}					


					}else{

						 $arr = array($id);
					
						 $this->session->set_userdata('arr_data',$arr);
					}

			if($this->session->userdata('arr_data')){
				$arr_item = $this->session->userdata('arr_data');
				foreach($arr_item as $r){

					$cart_item[] = $this->maid_model->fetchMaidCart($r);

				}


			 }			

		$data['cart_item'] = $cart_item; 

		$data['err_msg'] = $err_msg;

		$this->load->view('maid/maid_cart_button',$data);

	
			
        
	}


	public function remove_cart_button($id){
			$err_msg ="";
		$cart_item = array();
		if($this->session->userdata('arr_data')){

			

			$a = $this->session->userdata('arr_data');

			$arr =array_diff($a,array($id));

			$this->session->set_userdata('arr_data',$arr);


			if($this->session->userdata('arr_data')){
				$arr_item = $this->session->userdata('arr_data');
				foreach($arr_item as $r){

					$cart_item[] = $this->maid_model->fetchMaidCart($r);

				}


			 }		



		}

		
			 $data['cart_item'] = $cart_item; 	
			 $data['err_msg'] = $err_msg;

		$this->load->view('maid/maid_cart_button',$data);

	}


	public function print_maid_summary($id){

				$data['maid'] = $this->maid_model->get($id);
				 $this->load->view('maid/print_maid_summary', $data);
	}





	
}

