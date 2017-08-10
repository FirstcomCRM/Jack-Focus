<?php 

class test extends CI_Controller {

	
	function __construct() {
		parent::__construct();
		is_login();
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


	}

	public function index() {
	
	
		$this->load->view('_template/header');
        $this->load->view('testing');
         $this->load->view('_template/footer');



	}
	public function add(){
	$this->load->helper('form');							//load helper
    $this->load->library('form_validation');				//load helper


    $this->form_validation->set_rules('date1', 'Date 1', 'required');
    $this->form_validation->set_rules('date2', 'Date 2', 'required');

    if ($this->form_validation->run() === FALSE)
    {
    		$this->load->view('_template/header');
         $this->load->view('testing');
          $this->load->view('_template/footer');

    }
    else
    {
 		$x = $this->input->post('date1');
 		$y = $this->input->post('date2');
 		echo $y - $x;
 		$this->load->view('_template/header');
        $this->load->view('testing');
        $this->load->view('_template/footer');
    }
	}



	
}

