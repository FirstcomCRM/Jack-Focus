<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class customer_maid_model extends CI_Model
{

    function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function get($id=FALSE){
        if ($id === FALSE) {
            $this->db->where('active =', 1);
            $this->db->order_by('customer_id','desc');              
            $query = $this->db->get('customer_maid');
            return $query->result_array();
        }
        // $query = $this->db->get_where('customer_maid', array('customer_id' => $id, 'active' => 1));
        $this->db->select('customer_maid.*,branch.branch_name,branch.branch_code');
        $this->db->from('customer_maid');
        $this->db->where('customer_maid.customer_id', $id);
        $this->db->join('branch', 'branch.branch_id = customer_maid.branch_id', 'left');
        $query = $this->db->get();

        return $query->row_array();
    }

    public function add() {

        $maxid = 0;
        $row = $this->db->query('SELECT MAX(customer_id) AS `maxid` FROM `customer_maid`')->row();
        if ($row) {
            $maxid = $row->maxid; 
        }
        $maxid = $maxid+100000+1;

        $customer_code = "C-".$maxid;




        $data = array(
            'customer_code'              => $customer_code,
            'branch_id'              => $this->input->post('branch_id'),            
            'customer_name' 		   => $this->input->post('customer_name'),
            'customer_address'         => $this->input->post('customer_address'),
            'customer_email'           => $this->input->post('customer_email'),
            'customer_tel'             => $this->input->post('customer_tel'),
            'customer_cp'              => $this->input->post('customer_cp'),
            'customer_fax'             => $this->input->post('customer_fax'),
            'customer_postal'          => $this->input->post('customer_postal'),
            'customer_dob'          => $this->input->post('customer_dob'),
            'customer_religion'          => $this->input->post('customer_religion'),
            'customer_education'          => $this->input->post('customer_education'),
            'customer_marital_status'          => $this->input->post('customer_marital_status'),
            'customer_occupation'          => $this->input->post('occupation'), 
            'customer_occupation_other'          => $this->input->post('occupation_other'),
            'customer_companyname'          => $this->input->post('company_name'),  
            'customer_nationality'          => $this->input->post('nationality'), 
            'customer_nationality_other'          => $this->input->post('nationality_other'), 
            'customer_residence'          => $this->input->post('type_of_residence'),  
             'customer_residence_other'          => $this->input->post('type_of_residence_other'), 
            'spouse_name'          => $this->input->post('spouse_name'),  
            'spouse_ic_no'          => $this->input->post('spouse_ic_no'),  
            'spouse_dob'          => $this->input->post('spouse_dob'),  
            'spouse_nationality'          => $this->input->post('spouse_nationality'),  
            'spouse_nationality_other'          => $this->input->post('spouse_nationality_other'),
            'spouse_occupation'          => $this->input->post('spouse_occupation'), 
              'spouse_occupation_other'          => $this->input->post('spouse_occupation_other'),   
            'spouse_company_name'          => $this->input->post('spouse_company_name'),  
            'mem_name1'          => $this->input->post('mem_name1'), 
            'mem_ic_no1'          => $this->input->post('mem_ic_no1'),  
            'mem_dob1'          => $this->input->post('mem_dob1'),  
            'mem_rel1'          => $this->input->post('mem_rel1'),  
            'mem_gender1'          => $this->input->post('mem_gender1'),  
            'mem_name2'          => $this->input->post('mem_name2'), 
            'mem_ic_no2'          => $this->input->post('mem_ic_no2'),  
            'mem_dob2'          => $this->input->post('mem_dob2'),  
            'mem_rel2'          => $this->input->post('mem_rel2'),  
            'mem_gender2'          => $this->input->post('mem_gender2'),  
            'mem_name3'          => $this->input->post('mem_name3'), 
            'mem_ic_no3'          => $this->input->post('mem_ic_no3'),  
            'mem_dob3'          => $this->input->post('mem_dob3'),  
            'mem_rel3'          => $this->input->post('mem_rel3'),  
            'mem_gender3'          => $this->input->post('mem_gender3'),  
            'mem_name4'          => $this->input->post('mem_name4'), 
            'mem_ic_no4'          => $this->input->post('mem_ic_no4'),  
            'mem_dob4'          => $this->input->post('mem_dob4'),  
            'mem_rel4'          => $this->input->post('mem_rel4'),  
            'mem_gender4'          => $this->input->post('mem_gender4'), 
            'mem_name5'          => $this->input->post('mem_name5'), 
            'mem_ic_no5'          => $this->input->post('mem_ic_no5'),  
            'mem_dob5'          => $this->input->post('mem_dob5'),  
            'mem_rel5'          => $this->input->post('mem_rel5'),  
            'mem_gender5'          => $this->input->post('mem_gender5'), 
            'mem_name6'          => $this->input->post('mem_name6'), 
            'mem_ic_no6'          => $this->input->post('mem_ic_no6'),  
            'mem_dob6'          => $this->input->post('mem_dob6'),  
            'mem_rel6'          => $this->input->post('mem_rel6'),  
            'mem_gender6'          => $this->input->post('mem_gender6'),  
            'current_employer_name'          => $this->input->post('current_employer_name'),
            'employer_name'          => $this->input->post('employer_name'),
            'employer_marital_status'          => $this->input->post('employer_marital_status'),
            'current_employer_wp_no'          => $this->input->post('current_employer_wp_no'),
            'current_employer_fin_no'          => $this->input->post('current_employer_fin_no'),
            'employer_ic_no'          => $this->input->post('employer_ic_no')


        );
        $this->db->insert('customer_maid', $data);
        return $this->db->insert_id();
    }
    
    public function update($id){
        $data = array(
               'branch_id'              => $this->input->post('branch_id'),            
            'customer_name'            => $this->input->post('customer_name'),
            'customer_address'         => $this->input->post('customer_address'),
            'customer_email'           => $this->input->post('customer_email'),
            'customer_tel'             => $this->input->post('customer_tel'),
            'customer_cp'              => $this->input->post('customer_cp'),
            'customer_fax'             => $this->input->post('customer_fax'),
            'customer_postal'          => $this->input->post('customer_postal'),
            'customer_dob'          => $this->input->post('customer_dob'),
            'customer_religion'          => $this->input->post('customer_religion'),
            'customer_education'          => $this->input->post('customer_education'),
            'customer_marital_status'          => $this->input->post('customer_marital_status'),
            'customer_occupation'          => $this->input->post('occupation'), 
            'customer_occupation_other'          => $this->input->post('occupation_other'),
            'customer_companyname'          => $this->input->post('company_name'),  
            'customer_nationality'          => $this->input->post('nationality'),
            'customer_nationality_other'          => $this->input->post('nationality_other'),  
            'customer_residence'          => $this->input->post('type_of_residence'),
            'customer_residence_other'          => $this->input->post('type_of_residence_other'),   
            'spouse_name'          => $this->input->post('spouse_name'),  
            'spouse_ic_no'          => $this->input->post('spouse_ic_no'),  
            'spouse_dob'          => $this->input->post('spouse_dob'),  
            'spouse_nationality'          => $this->input->post('spouse_nationality'),  
            'spouse_nationality_other'          => $this->input->post('spouse_nationality_other'),
            'spouse_occupation'          => $this->input->post('spouse_occupation'), 
             'spouse_occupation_other'          => $this->input->post('spouse_occupation_other'),  
            'spouse_company_name'          => $this->input->post('spouse_company_name'),  
            'mem_name1'          => $this->input->post('mem_name1'), 
            'mem_ic_no1'          => $this->input->post('mem_ic_no1'),  
            'mem_dob1'          => $this->input->post('mem_dob1'),  
            'mem_rel1'          => $this->input->post('mem_rel1'),  
            'mem_gender1'          => $this->input->post('mem_gender1'),  
            'mem_name2'          => $this->input->post('mem_name2'), 
            'mem_ic_no2'          => $this->input->post('mem_ic_no2'),  
            'mem_dob2'          => $this->input->post('mem_dob2'),  
            'mem_rel2'          => $this->input->post('mem_rel2'),  
            'mem_gender2'          => $this->input->post('mem_gender2'),  
            'mem_name3'          => $this->input->post('mem_name3'), 
            'mem_ic_no3'          => $this->input->post('mem_ic_no3'),  
            'mem_dob3'          => $this->input->post('mem_dob3'),  
            'mem_rel3'          => $this->input->post('mem_rel3'),  
            'mem_gender3'          => $this->input->post('mem_gender3'),  
            'mem_name4'          => $this->input->post('mem_name4'), 
            'mem_ic_no4'          => $this->input->post('mem_ic_no4'),  
            'mem_dob4'          => $this->input->post('mem_dob4'),  
            'mem_rel4'          => $this->input->post('mem_rel4'),  
            'mem_gender4'          => $this->input->post('mem_gender4'), 
            'mem_name5'          => $this->input->post('mem_name5'), 
            'mem_ic_no5'          => $this->input->post('mem_ic_no5'),  
            'mem_dob5'          => $this->input->post('mem_dob5'),  
            'mem_rel5'          => $this->input->post('mem_rel5'),  
            'mem_gender5'          => $this->input->post('mem_gender5'), 
            'mem_name6'          => $this->input->post('mem_name6'), 
            'mem_ic_no6'          => $this->input->post('mem_ic_no6'),  
            'mem_dob6'          => $this->input->post('mem_dob6'),  
            'mem_rel6'          => $this->input->post('mem_rel6'),  
            'mem_gender6'          => $this->input->post('mem_gender6'),  
            'current_employer_name'          => $this->input->post('current_employer_name'),
            'employer_name'          => $this->input->post('employer_name'),
            'employer_marital_status'          => $this->input->post('employer_marital_status'),
            'current_employer_wp_no'          => $this->input->post('current_employer_wp_no'),
            'current_employer_fin_no'          => $this->input->post('current_employer_fin_no'),
            'employer_ic_no'          => $this->input->post('employer_ic_no')
          
        );
        $this->db->where('customer_id', $id);
        return $this->db->update('customer_maid', $data);
    }





    public function count(){

        if($this->session->userdata('fcs_role_id') == 1){
                $this->db->select('*');
                $this->db->where('active', 1);
                if (isset($_GET['customer_name'])&&$_GET['customer_name']!='') {
                    $this->db->like('customer_name', $_GET['customer_name']);
                }


                if (isset($_GET['customer_code'])&&$_GET['customer_code']!='') {
                    $this->db->like('customer_maid.customer_code', $_GET['customer_code']);
                }

                if (isset($_GET['customer_email'])&&$_GET['customer_email']!='') {
                    $this->db->like('customer_maid.customer_email', $_GET['customer_email']);
                }

                if (isset($_GET['employer_ic_no'])&&$_GET['employer_ic_no']!='') {
                    $this->db->like('customer_maid.employer_ic_no', $_GET['employer_ic_no']);
                }


                $query = $this->db->get('customer_maid');
                return $query->num_rows(); 



        }else{

            if(isset($_GET['customer_name']) || isset($_GET['customer_code']) || isset($_GET['customer_email']) || isset($_GET['employer_ic_no'])){
                $this->db->select('*');
                $this->db->where('active', 1);
                if (isset($_GET['customer_name'])&&$_GET['customer_name']!='') {
                    $this->db->like('customer_name', $_GET['customer_name']);
                }


                if (isset($_GET['customer_code'])&&$_GET['customer_code']!='') {
                    $this->db->like('customer_maid.customer_code', $_GET['customer_code']);
                }

                if (isset($_GET['customer_email'])&&$_GET['customer_email']!='') {
                    $this->db->like('customer_maid.customer_email', $_GET['customer_email']);
                }

                if (isset($_GET['employer_ic_no'])&&$_GET['employer_ic_no']!='') {
                    $this->db->like('customer_maid.employer_ic_no', $_GET['employer_ic_no']);
                }


                $query = $this->db->get('customer_maid');
                return $query->num_rows(); 

            }



        }


        
        return 0;    
    }

    public function fetch($limit, $start){
            

         if($this->session->userdata('fcs_role_id') == 1){


                    $this->db->select('customer_maid.*,branch.branch_name,branch.branch_code');
                    $this->db->from('customer_maid');
                    $this->db->where('customer_maid.active', 1);
                    $this->db->join('branch', 'branch.branch_id = customer_maid.branch_id', 'left');

                    if (isset($_GET['customer_name'])&&$_GET['customer_name']!='') {
                        $this->db->like('customer_maid.customer_name', $_GET['customer_name']);
                    }

                    if (isset($_GET['customer_code'])&&$_GET['customer_code']!='') {
                        $this->db->like('customer_maid.customer_code', $_GET['customer_code']);
                    }


                      if (isset($_GET['customer_email'])&&$_GET['customer_email']!='') {
                        $this->db->like('customer_maid.customer_email', $_GET['customer_email']);
                    }

                      if (isset($_GET['employer_ic_no'])&&$_GET['employer_ic_no']!='') {
                        $this->db->like('customer_maid.employer_ic_no', $_GET['employer_ic_no']);
                    }


                        $this->db->limit($limit, $start);
                        if (isset($_GET['sort_by'])&&$_GET['sort_by']!='') {
                            $this->db->order_by($_GET['sort_by']);
                        }
                        else{
                            $this->db->order_by('customer_maid.customer_id','desc');
                        }


                        $query = $this->db->get();

                        if ($query->num_rows() > 0) {
                            foreach ($query->result() as $row) {
                                $data[] = $row;
                            }
                            return $data;
                        }


         }else {


                if(isset($_GET['customer_name']) || isset($_GET['customer_code']) || isset($_GET['customer_email']) || isset($_GET['employer_ic_no'])){

                    $this->db->select('customer_maid.*,branch.branch_name,branch.branch_code');
                    $this->db->from('customer_maid');
                    $this->db->where('customer_maid.active', 1);
                    $this->db->join('branch', 'branch.branch_id = customer_maid.branch_id', 'left');

                    if (isset($_GET['customer_name'])&&$_GET['customer_name']!='') {
                        $this->db->like('customer_maid.customer_name', $_GET['customer_name']);
                    }

                    if (isset($_GET['customer_code'])&&$_GET['customer_code']!='') {
                        $this->db->like('customer_maid.customer_code', $_GET['customer_code']);
                    }


                      if (isset($_GET['customer_email'])&&$_GET['customer_email']!='') {
                        $this->db->like('customer_maid.customer_email', $_GET['customer_email']);
                    }

                      if (isset($_GET['employer_ic_no'])&&$_GET['employer_ic_no']!='') {
                        $this->db->like('customer_maid.employer_ic_no', $_GET['employer_ic_no']);
                    }


                        $this->db->limit($limit, $start);
                        if (isset($_GET['sort_by'])&&$_GET['sort_by']!='') {
                            $this->db->order_by($_GET['sort_by']);
                        }
                        else{
                            $this->db->order_by('customer_maid.customer_id','desc');
                        }


                        $query = $this->db->get();

                        if ($query->num_rows() > 0) {
                            foreach ($query->result() as $row) {
                                $data[] = $row;
                            }
                            return $data;
                        }

                }


         }  




        return false;
    }

    public function company_name_exist($customer_name, $id=FALSE){
        if ($id) {
            $this->db->where('customer_id !=', $id);
        }
        $query = $this->db->get_where('customer_maid', array('customer_name' => $customer_name, 'active' => 1));
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
        return $this->db->update('customer_maid', $data);
    }

      public function count_maid_record(){
      $this->db->select('m.maid_id,m.maid_name, c.customer_id , c.customer_name, qp.select_date, qp.total_amount, qp.quotation_id');
        $this->db->from('maid m');
        $this->db->join('customer_maid c', 'c.customer_id=m.customer_id', 'left');
        $this->db->join('quotation_maid_product qp', 'qp.maid_id=m.maid_id', 'left');
  
        $this->db->where('m.active', 1);
        $this->db->where('c.active', 1);
         $this->db->where('qp.active', 1);

        if($this->session->userdata('fcs_role_id') == 4){
             $this->db->where('m.supplier_id', $this->session->userdata('fcs_supplier_id'));
        }


        if (isset($_GET['customer_name'])&&$_GET['customer_name']!='') {
            $this->db->like('customer_name', $_GET['customer_name']);
        }
        
        if (isset($_GET['sort_by'])&&$_GET['sort_by']!='') {
            $this->db->order_by($_GET['sort_by']);
        }
        else{
            $this->db->order_by('customer_id','desc');
        }

        $query = $this->db->get();
        return $query->num_rows(); 
    }

    public function fetch_maid_record($limit, $start){
        $this->db->select('m.maid_id,m.maid_name, c.customer_id , c.customer_name, qp.select_date, qp.total_amount, qp.quotation_id');
        $this->db->from('maid m');
        $this->db->join('customer_maid c', 'c.customer_id=m.customer_id', 'left');
        $this->db->join('quotation_maid_product qp', 'qp.maid_id=m.maid_id', 'left');
  
        $this->db->where('m.active', 1);
        $this->db->where('c.active', 1);
         $this->db->where('qp.active', 1);

        if($this->session->userdata('fcs_role_id') == 4){
             $this->db->where('m.supplier_id', $this->session->userdata('fcs_supplier_id'));
        }


        if (isset($_GET['customer_name'])&&$_GET['customer_name']!='') {
            $this->db->like('customer_name', $_GET['customer_name']);
        }
             $this->db->limit($limit, $start);
        if (isset($_GET['sort_by'])&&$_GET['sort_by']!='') {
            $this->db->order_by($_GET['sort_by']);
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
}
// --------------------------------------------------------------------------------------------------------------------------