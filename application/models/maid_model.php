<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class maid_model extends CI_Model
{

    function __construct(){
        parent::__construct();
        $this->load->database();

          $CI =& get_instance();
         $CI->load->model('customer_maid_model');
       



    }
    public function get($id=FALSE){
        if ($id === FALSE) {
            $this->db->where('active =', 1);
            $this->db->order_by('maid_id','desc');
            $query = $this->db->get('maid');
            return $query->result_array();
        }
        $query = $this->db->get_where('maid', array('maid_id' => $id, 'active' => 1));
        return $query->row_array();
    }

     public function getAvailable($id=FALSE){
      
            $this->db->where('active =', 1);          
            $this->db->order_by('maid_id','desc');
            $query = $this->db->get('maid');
            return $query->result_array();
  
     
        


    }

    public function getPurchaseMaid($id=FALSE){
        if ($id === FALSE) {
            $this->db->where('active =', 1);
            $this->db->where('maid_id', $id);
            $this->db->order_by('maid_id','desc');
            $query = $this->db->get('maid');
            return $query->result_array();
        }
        $query = $this->db->get_where('maid', array('maid_id' => $id,  'active' => 1));
        return $query->row_array();
    }

   
   public function maxid(){

        $row = $this->db->query('SELECT MAX(maid_id) AS `maxid` FROM `maid`')->row();
        if ($row) {
            return $row->maxid; 
        }

        return 0;
   }
    
   
    public function add() {

        $maxid = 0;
        $row = $this->db->query('SELECT MAX(maid_id) AS `maxid` FROM `maid`')->row();
        if ($row) {
            $maxid = $row->maxid; 
        }
        $maxids = $maxid+100000+1;

        $maid_code = "M-".$maxids;



        $data = array(
            
            'maid_code'           => $maid_code,
            'maid_ref_no'         => $this->input->post('maid_ref_no'),
            'maid_name'           => $this->input->post('maid_name'),
            'maid_rhs_date'       => $this->input->post('maid_rhs_date'),
            'maid_status'         => $this->input->post('maid_status'),
            'maid_branch'         => $this->input->post('maid_branch'),
            'maid_staff'          => $this->input->post('maid_staff'),
            'maid_employer'       => $this->input->post('maid_employer'),
            'maid_supplier'       => $this->input->post('maid_supplier'),
            'supplier_id'         => $this->input->post('supplier_id'),
            'maid_bday'           => $this->input->post('maid_bday'),
            'maid_age'            => $this->input->post('maid_age'),
            'maid_place_birth'    => $this->input->post('maid_place_birth'),
            'maid_height'         => $this->input->post('maid_height'),
            'maid_weight'         => $this->input->post('maid_weight'),
            'maid_nationality'    => $this->input->post('maid_nationality'),
            'maid_res_home'       => $this->input->post('maid_res_home'),
            'maid_port'           => $this->input->post('maid_port'),
            'maid_contact_home'   => $this->input->post('maid_contact_home'),
            'maid_religion'       => $this->input->post('maid_religion'),
            'maid_educ'           => $this->input->post('maid_educ'),
            'maid_sibs'           => $this->input->post('maid_sibs'),
            'maid_mar_status'     => $this->input->post('maid_mar_status'),
            'maid_children'       => $this->input->post('maid_children'),
            'maid_children_age'   => $this->input->post('maid_children_age'),
            'maid_allergies'      => $this->input->post('maid_allergies'),
            'maid_mental'         => $this->input->post('maid_mental'),
            'maid_epilepsy'       => $this->input->post('maid_epilepsy'),
            'maid_asthma'         => $this->input->post('maid_asthma'),
            'maid_diabetis'       => $this->input->post('maid_diabetis'),
            'maid_hypertension'   => $this->input->post('maid_hypertension'),
            'maid_tb'             => $this->input->post('maid_tb'),
            'maid_heart_disease'  => $this->input->post('maid_heart_disease'),
            'maid_malaria'        => $this->input->post('maid_malaria'),
            'maid_operation'      => $this->input->post('maid_operation'),
            'maid_other'          => $this->input->post('maid_other'),
            'maid_physical_d'     => $this->input->post('maid_physical_d'),
            'maid_dietary_res'    => $this->input->post('maid_dietary_res'),
            'maid_no_pork'        => $this->input->post('maid_no_pork'),
            'maid_no_beef'        => $this->input->post('maid_no_beef'),
            'maid_handling_others' => $this->input->post('maid_handling_others'),
            'maid_rest'           => $this->input->post('maid_rest'),
            'maid_remarks'        => $this->input->post('maid_remarks'),
            'maid_his_frm_1'      => $this->input->post('maid_his_frm_1'),
            'maid_his_to_1'       => $this->input->post('maid_his_to_1'),
            'maid_his_country_1'  => $this->input->post('maid_his_country_1'),
            'maid_his_emp_1'      => $this->input->post('maid_his_emp_1'),
            'maid_his_work_1'     => $this->input->post('maid_his_work_1'),
            'maid_his_rem_1'      => $this->input->post('maid_his_rem_1'),
            'maid_his_frm_2'      => $this->input->post('maid_his_frm_2'),
            'maid_his_to_2'       => $this->input->post('maid_his_to_2'),
            'maid_his_country_2'  => $this->input->post('maid_his_country_2'),
            'maid_his_emp_2'      => $this->input->post('maid_his_emp_2'),
            'maid_his_work2'      => $this->input->post('maid_his_work2'),
            'maid_his_rem_2'      => $this->input->post('maid_his_rem_2'),
            'maid_prev_sg'        => $this->input->post('maid_prev_sg'),
            'maid_feedback1'      => $this->input->post('maid_feedback1'),
            'maid_feedback2'      => $this->input->post('maid_feedback2'),
            'maid_rest'           => $this->input->post('maid_rest'),
            'maid_arrival'        => $this->input->post('maid_arrival'),
            'maid_passport'       => $this->input->post('maid_passport'),
            'maid_21_days'        => $this->input->post('maid_21_days'),
            'maid_21_days_due'    => $this->input->post('maid_21_days_due'),
            'status_id'           => $this->input->post('status_id'),
            'nationality_id'      => $this->input->post('nationality_id'),
            'maid_care_infants_will_1'     => $this->input->post('maid_care_infants_will_1'),
            'branch_id'           => $this->input->post('branch_id'),

            'maid_FDW_dec'             => $this->input->post('maid_FDW_dec'),
            'maid_interview_sg'        => $this->input->post('maid_interview_sg'),
            'maid_interview_foreign'   => $this->input->post('maid_interview_foreign'),
            'maid_foreigncenter_name'  => $this->input->post('maid_foreigncenter_name'),
            'maid_foreign_certified'   => $this->input->post('maid_foreign_certified'),
            'maid_int_tel_sg'          => $this->input->post('maid_int_tel_sg'),
            'maid_int_vid_sg'          => $this->input->post('maid_int_vid_sg'),
            'maid_int_person_sg'       => $this->input->post('maid_int_person_sg'),
            'maid_int_observed_sg'     => $this->input->post('maid_int_observed_sg'),
            'maid_int_tel_foreign'     => $this->input->post('maid_int_tel_foreign'),
            'maid_int_vid_foreign'     => $this->input->post('maid_int_vid_foreign'),
            'maid_int_person_foreign'  => $this->input->post('maid_int_person_foreign'),
            'maid_int_observed_foreign'=> $this->input->post('maid_int_observed_foreign'),

            'maid_care_infants_age_1'     => $this->input->post('maid_care_infants_age_1'),
            'maid_care_infants_will_1'    => $this->input->post('maid_care_infants_will_1'),
            'maid_care_infants_exp_1'     => $this->input->post('maid_care_infants_exp_1'),
            'maid_care_infants_eva_1'     => $this->input->post('maid_care_infants_eva_1'),
            'maid_care_elderly_will_1'    => $this->input->post('maid_care_elderly_will_1'),
            'maid_care_elderly_exp_1'     => $this->input->post('maid_care_elderly_exp_1'),
            'maid_care_elderly_eva_1'     => $this->input->post('maid_care_elderly_eva_1'),
            'maid_care_disable_will_1'    => $this->input->post('maid_care_disable_will_1'),
            'maid_care_disable_exp_1'     => $this->input->post('maid_care_disable_exp_1'),
            'maid_care_disable_eva_1'     => $this->input->post('maid_care_disable_eva_1'),
            'maid_care_housework_will_1'  => $this->input->post('maid_care_housework_will_1'),
            'maid_care_housework_exp_1'   => $this->input->post('maid_care_housework_exp_1'),
            'maid_care_housework_eva_1'   => $this->input->post('maid_care_housework_eva_1'),
            'maid_cooking_cuisines_1'     => $this->input->post('maid_cooking_cuisines_1'),
            'maid_cooking_will_1'         => $this->input->post('maid_cooking_will_1'),
            'maid_cooking_exp_1'          => $this->input->post('maid_cooking_exp_1'),
            'maid_cooking_eva_1'          => $this->input->post('maid_cooking_eva_1'),
            'maid_language_1'             => $this->input->post('maid_language_1'),
            'maid_language_exp_1'         => $this->input->post('maid_language_exp_1'),
            'maid_language_eva_1'         => $this->input->post('maid_language_eva_1'),
            'maid_skill_1'                => $this->input->post('maid_skill_1'),
            'maid_skill_exp_1'            => $this->input->post('maid_skill_exp_1'),
            'maid_skill_eva_1'            => $this->input->post('maid_skill_eva_1'),

            'maid_care_infants_age_2'     => $this->input->post('maid_care_infants_age_2'),
            'maid_care_infants_will_2'    => $this->input->post('maid_care_infants_will_2'),
            'maid_care_infants_exp_2'     => $this->input->post('maid_care_infants_exp_2'),
            'maid_care_infants_eva_2'     => $this->input->post('maid_care_infants_eva_2'),
            'maid_care_elderly_will_2'    => $this->input->post('maid_care_elderly_will_2'),
            'maid_care_elderly_exp_2'     => $this->input->post('maid_care_elderly_exp_2'),
            'maid_care_elderly_eva_2'     => $this->input->post('maid_care_elderly_eva_2'),
            'maid_care_disable_will_2'    => $this->input->post('maid_care_disable_will_2'),
            'maid_care_disable_exp_2'     => $this->input->post('maid_care_disable_exp_2'),
            'maid_care_disable_eva_2'     => $this->input->post('maid_care_disable_eva_2'),
            'maid_care_housework_will_2'  => $this->input->post('maid_care_housework_will_2'),
            'maid_care_housework_exp_2'   => $this->input->post('maid_care_housework_exp_2'),
            'maid_care_housework_eva_2'   => $this->input->post('maid_care_housework_eva_2'),
            'maid_cooking_cuisines_2'     => $this->input->post('maid_cooking_cuisines_2'),
            'maid_cooking_will_2'         => $this->input->post('maid_cooking_will_2'),
            'maid_cooking_exp_2'          => $this->input->post('maid_cooking_exp_2'),
            'maid_cooking_eva_2'          => $this->input->post('maid_cooking_eva_2'),
            'maid_language_2'             => $this->input->post('maid_language_2'),
            'maid_language_exp_2'         => $this->input->post('maid_language_exp_2'),
            'maid_language_eva_2'         => $this->input->post('maid_language_eva_2'),
            'maid_skill_2'                => $this->input->post('maid_skill_2'),
            'maid_skill_exp_2'            => $this->input->post('maid_skill_exp_2'),
            'maid_skill_eva_2'            => $this->input->post('maid_skill_eva_2'),

            
            'maid_no_interview'           => $this->input->post('maid_no_interview'),
            'maid_interview_phone'        => $this->input->post('maid_interview_phone'),
            'maid_interview_video'        => $this->input->post('maid_interview_video'),
            'maid_interview_person'       => $this->input->post('maid_interview_person'),

            'maid_salary'    => $this->input->post('maid_salary'),
            'arrival_date'    => $this->input->post('arrival_date'),


            'arrived'       => $this->input->post('arrived'),

            'staff_id'            => $this->input->post('staff_id'),
            'last_update'         => time(),
            'maid_arrival'        => date('Y-m-d')
        );
        $this->db->insert('maid', $data);
        return $this->db->insert_id();
    }
    
    public function update($id){
        $data = array(
            'maid_ref_no'         => $this->input->post('maid_ref_no'),
            'maid_name'           => $this->input->post('maid_name'),
            'maid_rhs_date'       => $this->input->post('maid_rhs_date'),
            'maid_status'         => $this->input->post('maid_status'),
            'maid_branch'         => $this->input->post('maid_branch'),
            'maid_staff'          => $this->input->post('maid_staff'),
            'maid_employer'       => $this->input->post('maid_employer'),
            'maid_supplier'       => $this->input->post('maid_supplier'),
            'supplier_id'         => $this->input->post('supplier_id'),
            'maid_bday'           => $this->input->post('maid_bday'),
            'maid_age'            => $this->input->post('maid_age'),
            'maid_place_birth'    => $this->input->post('maid_place_birth'),
            'maid_height'         => $this->input->post('maid_height'),
            'maid_weight'         => $this->input->post('maid_weight'),
            'maid_nationality'    => $this->input->post('maid_nationality'),
            'maid_res_home'       => $this->input->post('maid_res_home'),
            'maid_port'           => $this->input->post('maid_port'),
            'maid_contact_home'   => $this->input->post('maid_contact_home'),
            'maid_religion'       => $this->input->post('maid_religion'),
            'maid_educ'           => $this->input->post('maid_educ'),
            'maid_sibs'           => $this->input->post('maid_sibs'),
            'maid_mar_status'     => $this->input->post('maid_mar_status'),
            'maid_children'       => $this->input->post('maid_children'),
            'maid_children_age'   => $this->input->post('maid_children_age'),
            'maid_allergies'      => $this->input->post('maid_allergies'),
            'maid_mental'         => $this->input->post('maid_mental'),
            'maid_epilepsy'       => $this->input->post('maid_epilepsy'),
            'maid_asthma'         => $this->input->post('maid_asthma'),
            'maid_diabetis'       => $this->input->post('maid_diabetis'),
            'maid_hypertension'   => $this->input->post('maid_hypertension'),
            'maid_tb'             => $this->input->post('maid_tb'),
            'maid_heart_disease'  => $this->input->post('maid_heart_disease'),
            'maid_malaria'        => $this->input->post('maid_malaria'),
            'maid_operation'      => $this->input->post('maid_operation'),
            'maid_other'          => $this->input->post('maid_other'),
            'maid_physical_d'     => $this->input->post('maid_physical_d'),
            'maid_dietary_res'    => $this->input->post('maid_dietary_res'),
            'maid_no_pork'        => $this->input->post('maid_no_pork'),
            'maid_no_beef'        => $this->input->post('maid_no_beef'),
            'maid_handling_others' => $this->input->post('maid_handling_others'),
            'maid_rest'           => $this->input->post('maid_rest'),
            'maid_remarks'        => $this->input->post('maid_remarks'),
            'maid_his_frm_1'      => $this->input->post('maid_his_frm_1'),
            'maid_his_to_1'       => $this->input->post('maid_his_to_1'),
            'maid_his_country_1'  => $this->input->post('maid_his_country_1'),
            'maid_his_emp_1'      => $this->input->post('maid_his_emp_1'),
            'maid_his_work_1'     => $this->input->post('maid_his_work_1'),
            'maid_his_rem_1'      => $this->input->post('maid_his_rem_1'),
            'maid_his_frm_2'      => $this->input->post('maid_his_frm_2'),
            'maid_his_to_2'       => $this->input->post('maid_his_to_2'),
            'maid_his_country_2'  => $this->input->post('maid_his_country_2'),
            'maid_his_emp_2'      => $this->input->post('maid_his_emp_2'),
            'maid_his_work2'      => $this->input->post('maid_his_work2'),
            'maid_his_rem_2'      => $this->input->post('maid_his_rem_2'),
            'maid_prev_sg'        => $this->input->post('maid_prev_sg'),
            'maid_feedback1'      => $this->input->post('maid_feedback1'),
            'maid_feedback2'      => $this->input->post('maid_feedback2'),
            'maid_rest'           => $this->input->post('maid_rest'),
            'maid_arrival'        => $this->input->post('maid_arrival'),
            'maid_passport'       => $this->input->post('maid_passport'),
            'maid_21_days'        => $this->input->post('maid_21_days'),
            'maid_21_days_due'    => $this->input->post('maid_21_days_due'),
            'status_id'           => $this->input->post('status_id'),
            'nationality_id'      => $this->input->post('nationality_id'),
            'branch_id'           => $this->input->post('branch_id'),

            'maid_FDW_dec'             => $this->input->post('maid_FDW_dec'),
            'maid_interview_sg'        => $this->input->post('maid_interview_sg'),
            'maid_interview_foreign'   => $this->input->post('maid_interview_foreign'),
            'maid_foreigncenter_name'  => $this->input->post('maid_foreigncenter_name'),
            'maid_foreign_certified'   => $this->input->post('maid_foreign_certified'),
            'maid_int_tel_sg'          => $this->input->post('maid_int_tel_sg'),
            'maid_int_vid_sg'          => $this->input->post('maid_int_vid_sg'),
            'maid_int_person_sg'       => $this->input->post('maid_int_person_sg'),
            'maid_int_observed_sg'     => $this->input->post('maid_int_observed_sg'),
            'maid_int_tel_foreign'     => $this->input->post('maid_int_tel_foreign'),
            'maid_int_vid_foreign'     => $this->input->post('maid_int_vid_foreign'),
            'maid_int_person_foreign'  => $this->input->post('maid_int_person_foreign'),
            'maid_int_observed_foreign'=> $this->input->post('maid_int_observed_foreign'),


            'maid_care_infants_age_1'     => $this->input->post('maid_care_infants_age_1'),
            'maid_care_infants_will_1'    => $this->input->post('maid_care_infants_will_1'),
            'maid_care_infants_exp_1'     => $this->input->post('maid_care_infants_exp_1'),
            'maid_care_infants_eva_1'     => $this->input->post('maid_care_infants_eva_1'),
            'maid_care_elderly_will_1'    => $this->input->post('maid_care_elderly_will_1'),
            'maid_care_elderly_exp_1'     => $this->input->post('maid_care_elderly_exp_1'),
            'maid_care_elderly_eva_1'     => $this->input->post('maid_care_elderly_eva_1'),
            'maid_care_disable_will_1'    => $this->input->post('maid_care_disable_will_1'),
            'maid_care_disable_exp_1'     => $this->input->post('maid_care_disable_exp_1'),
            'maid_care_disable_eva_1'     => $this->input->post('maid_care_disable_eva_1'),
            'maid_care_housework_will_1'  => $this->input->post('maid_care_housework_will_1'),
            'maid_care_housework_exp_1'   => $this->input->post('maid_care_housework_exp_1'),
            'maid_care_housework_eva_1'   => $this->input->post('maid_care_housework_eva_1'),
            'maid_cooking_cuisines_1'     => $this->input->post('maid_cooking_cuisines_1'),
            'maid_cooking_will_1'         => $this->input->post('maid_cooking_will_1'),
            'maid_cooking_exp_1'          => $this->input->post('maid_cooking_exp_1'),
            'maid_cooking_eva_1'          => $this->input->post('maid_cooking_eva_1'),
            'maid_language_1'             => $this->input->post('maid_language_1'),
            'maid_language_exp_1'         => $this->input->post('maid_language_exp_1'),
            'maid_language_eva_1'         => $this->input->post('maid_language_eva_1'),
            'maid_skill_1'                => $this->input->post('maid_skill_1'),
            'maid_skill_exp_1'            => $this->input->post('maid_skill_exp_1'),
            'maid_skill_eva_1'            => $this->input->post('maid_skill_eva_1'),

            'maid_care_infants_age_2'     => $this->input->post('maid_care_infants_age_2'),
            'maid_care_infants_will_2'    => $this->input->post('maid_care_infants_will_2'),
            'maid_care_infants_exp_2'     => $this->input->post('maid_care_infants_exp_2'),
            'maid_care_infants_eva_2'     => $this->input->post('maid_care_infants_eva_2'),
            'maid_care_elderly_will_2'    => $this->input->post('maid_care_elderly_will_2'),
            'maid_care_elderly_exp_2'     => $this->input->post('maid_care_elderly_exp_2'),
            'maid_care_elderly_eva_2'     => $this->input->post('maid_care_elderly_eva_2'),
            'maid_care_disable_will_2'    => $this->input->post('maid_care_disable_will_2'),
            'maid_care_disable_exp_2'     => $this->input->post('maid_care_disable_exp_2'),
            'maid_care_disable_eva_2'     => $this->input->post('maid_care_disable_eva_2'),
            'maid_care_housework_will_2'  => $this->input->post('maid_care_housework_will_2'),
            'maid_care_housework_exp_2'   => $this->input->post('maid_care_housework_exp_2'),
            'maid_care_housework_eva_2'   => $this->input->post('maid_care_housework_eva_2'),
            'maid_cooking_cuisines_2'     => $this->input->post('maid_cooking_cuisines_2'),
            'maid_cooking_will_2'         => $this->input->post('maid_cooking_will_2'),
            'maid_cooking_exp_2'          => $this->input->post('maid_cooking_exp_2'),
            'maid_cooking_eva_2'          => $this->input->post('maid_cooking_eva_2'),
            'maid_language_2'             => $this->input->post('maid_language_2'),
            'maid_language_exp_2'         => $this->input->post('maid_language_exp_2'),
            'maid_language_eva_2'         => $this->input->post('maid_language_eva_2'),
            'maid_skill_2'                => $this->input->post('maid_skill_2'),
            'maid_skill_exp_2'            => $this->input->post('maid_skill_exp_2'),
            'maid_skill_eva_2'            => $this->input->post('maid_skill_eva_2'),

            'maid_no_interview'           => $this->input->post('maid_no_interview'),
            'maid_interview_phone'        => $this->input->post('maid_interview_phone'),
            'maid_interview_video'        => $this->input->post('maid_interview_video'),
            'maid_interview_person'       => $this->input->post('maid_interview_person'),

           

            'maid_salary'    => $this->input->post('maid_salary'),
            'arrival_date'    => $this->input->post('arrival_date'),


            'arrived'                    => $this->input->post('arrived'),
            'maid_care_infants_will_1'   => $this->input->post('maid_care_infants_will_1'),
            'staff_id'                   => $this->input->post('staff_id'),
            'last_update'                => time()
        );
        $this->db->where('maid_id', $id);
        return $this->db->update('maid', $data);
    }

    public function count(){
        $this->db->select('m.*, t.* , s.supplier_name, n.*,b.*, f.staff_name');
        $this->db->from('maid m');
        $this->db->join('status t', 'm.status_id=t.status_id', 'left');
        $this->db->join('supplier_maid s', 'm.supplier_id=s.supplier_id');
        $this->db->join('nationality n', 'm.nationality_id=n.nationality_id');
        $this->db->join('staff f', 'm.staff_id=f.staff_id');
        $this->db->join('branch b', 'm.branch_id=b.branch_id', 'left');
  
        $this->db->where('m.active', 1);

        if (isset($_GET['maid_name'])&&$_GET['maid_name']!='') {
            $this->db->like('m.maid_name', $_GET['maid_name']);
        }

        if (isset($_GET['supplier_name'])&&$_GET['supplier_name']!='') {
            $this->db->like('s.supplier_id', $_GET['supplier_name']);
        }

        if (isset($_GET['status_name'])&&$_GET['status_name']!='') {
            $this->db->like('t.status_id', $_GET['status_name']);
        }

        if (isset($_GET['nationality_name'])&&$_GET['nationality_name']!='') {
            $this->db->like('n.nationality_id', $_GET['nationality_name']);
        }

        $query = $this->db->get();
        return $query->num_rows(); 
    }

  public function count_maid_desc(){
        $this->db->select('m.*');
        $this->db->from('maid m');       
        $this->db->where('m.active', 1);
        if (isset($_GET['maid_name'])&&$_GET['maid_name']!='') {
            $this->db->like('maid_name', $_GET['maid_name']);
        }
        if (isset($_GET['maid_code'])&&$_GET['maid_code']!='') {
           $this->db->like('maid_code', $_GET['maid_code']);
        }
    
       
        $query = $this->db->get();
        return $query->num_rows(); 
    }
    



  public function fetch($limit, $start){
        $this->db->select('m.*, s.supplier_name, t.*, n.*,b.*, f.staff_name');
        $this->db->from('maid m');
        $this->db->join('supplier_maid s', 'm.supplier_id=s.supplier_id', 'left');
        $this->db->join('status t', 'm.status_id=t.status_id', 'left');
        $this->db->join('nationality n', 'm.nationality_id=n.nationality_id', 'left');
        $this->db->join('staff f', 'm.staff_id=f.staff_id','left', 'left');
        $this->db->join('branch b', 'm.branch_id=b.branch_id', 'left');
        $this->db->where('m.active', 1);

        if($this->session->userdata('fcs_role_id') == 4){

             $this->db->where('m.supplier_id', $this->session->userdata('fcs_supplier_id'));
        }


        if (isset($_GET['maid_name'])&&$_GET['maid_name']!='') {
            $this->db->like('maid_name', $_GET['maid_name']);
        }
        if (isset($_GET['maid_supplier'])&&$_GET['maid_supplier']!='') {
           $this->db->like('maid_supplier', $_GET['maid_supplier']);
        }
    
            if (isset($_GET['nationality_name'])&&$_GET['nationality_name']!='') {
            $this->db->like('n.nationality_id', $_GET['nationality_name']);
        }

            if (isset($_GET['status_name'])&&$_GET['status_name']!='') {
            $this->db->like('t.status_id', $_GET['status_name']);
        }

        if (isset($_GET['supplier_name'])&&$_GET['supplier_name']!='') {
            $this->db->like('s.supplier_id', $_GET['supplier_name']);
        }

        if($limit !== 0 && $start !== 0){
             $this->db->limit($limit, $start);
        }

       
        if (isset($_GET['sort_by'])&&$_GET['sort_by']!='') {
            $this->db->order_by($_GET['sort_by']);
        }
        else{
            $this->db->order_by('maid_id','desc');
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


      public function fetchMaidCart($id){
        // $this->db->select('maid_id,maid_code,maid_name,maid_img');
         $this->db->select('*');
        $this->db->from('maid');      
        $this->db->where('active', 1);
         $this->db->where('maid_id', $id);
   
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }






  // public function fetch_maid_desc($limit, $start){
  //       $this->db->select('m.*');
  //       $this->db->from('maid m');       
  //       $this->db->where('m.active', 1);
  //       if (isset($_GET['maid_name'])&&$_GET['maid_name']!='') {
  //           $this->db->like('maid_name', $_GET['maid_name']);
  //       }
  //       if (isset($_GET['maid_code'])&&$_GET['maid_code']!='') {
  //          $this->db->like('maid_code', $_GET['maid_code']);
  //       }


  //       if (isset($_GET['maid_supplier'])&&$_GET['maid_supplier']!='') {
  //          $this->db->like('maid_supplier', $_GET['maid_supplier']);
  //       }
    
  //           if (isset($_GET['nationality_name'])&&$_GET['nationality_name']!='') {
  //           $this->db->like('n.nationality_id', $_GET['nationality_name']);
  //       }

  //           if (isset($_GET['status_name'])&&$_GET['status_name']!='') {
  //           $this->db->like('t.status_id', $_GET['status_name']);
  //       }

  //       if (isset($_GET['supplier_name'])&&$_GET['supplier_name']!='') {
  //           $this->db->like('s.supplier_id', $_GET['supplier_name']);
  //       }


    
  //       $this->db->limit($limit, $start);
  //       if (isset($_GET['sort_by'])&&$_GET['sort_by']!='') {
  //           $this->db->order_by($_GET['sort_by']);
  //       }
  //       else{
  //           $this->db->order_by('maid_id','desc');
  //       }
  //       $query = $this->db->get();

  //       if ($query->num_rows() > 0) {
  //           foreach ($query->result() as $row) {
  //               $data[] = $row;
  //           }
  //           return $data;
  //       }
  //       return false;
  //   }



     public function single_fetch($id){
        $this->db->select('m.*');
        $this->db->from('maid m');    
        $this->db->where('m.active', 1);
        $this->db->where('m.maid_id', $id);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }


    public function fetch_maid_desc_edit($id){
        $this->db->select('m.maid_name,maid_code,b.*,c.customer_name');
        $this->db->from('maid m'); 
        $this->db->join('maid_deployment_dtl b', 'm.maid_id=b.maid_id', 'left');  
        $this->db->join('customer_maid c', 'b.customer_id=c.customer_id', 'left');  
        $this->db->where('m.active', 1);
        $this->db->where('m.maid_id', $id);
        $this->db->where('b.active', 1);
        $this->db->order_by('b.date_created','desc');

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }




    public function update_maid_desc($id){
        $data = array(
            'date_deploy'             => $this->input->post('date_deploy'),
            'date_deploy'  => $this->input->post('date_deploy'),
            'top_up_placement_fee'  => $this->input->post('top_up_placement_fee'),
            'refund'  => $this->input->post('refund'),          
            'refund'  => $this->input->post('refund'),
            'date_return'  => $this->input->post('date_return'),
            'paid_placement_fee'  => $this->input->post('paid_placement_fee'),
            'gst_on_agency_p_fee'  => $this->input->post('gst_on_agency_p_fee'),
            'customer_id'  => $this->input->post('customer_id'),
            'overseas_placement_fee'  => $this->input->post('overseas_placement_fee'),  
            // 't_bal_p_fee'  => $this->input->post('t_bal_p_fee'),
            'bal_placement_fee'  => $this->input->post('bal_placement_fee'),

           
        );
        $this->db->where('maid_id', $id);
        return $this->db->update('maid', $data);
    }



        public function ins_maid_desc(){
        $data = array(
              'maid_id'             => $this->input->post('maid_id'),
            'date_deploy'             => $this->input->post('date_deploy'),          
            'top_up_placement_fee'  => $this->input->post('top_up_placement_fee'),                 
            'refund'  => $this->input->post('refund'),
            'date_return'  => $this->input->post('date_return'),
            'paid_placement_fee'  => $this->input->post('paid_placement_fee'),
            'gst_on_agency_p_fee'  => $this->input->post('gst_on_agency_p_fee'),
            'customer_id'  => $this->input->post('customer_id'),
            'overseas_placement_fee'  => $this->input->post('overseas_placement_fee'),  
            // 't_bal_p_fee'  => $this->input->post('t_bal_p_fee'),
            'bal_placement_fee'  => $this->input->post('bal_placement_fee'),
            'date_created'  => date('Y-m-d'),
            'active'  => 1

           
        );
       
          $this->db->insert('maid_deployment_dtl', $data);
          return $this->db->insert_id();
    }







    public function company_name_exist($maid_name, $id=FALSE){
        if ($id) {
            $this->db->where('maid_id !=', $id);
        }
        $query = $this->db->get_where('maid', array('maid_name' => $maid_name, 'active' => 1));
        if ($query->num_rows()>=1) {
            return $query->row();
        }
        return false;
    }
    public function delete($id){
        $data = array(
            'active'          => 0,
        );
        $this->db->where('maid_id', $id);
        return $this->db->update('maid', $data);
    }

    public function delete_maid_dep($id){
        $data = array(
            'active'          => 0,
        );
        $this->db->where('maid_dep_id', $id);
        return $this->db->update('maid_deployment_dtl', $data);
    }


    public function update_img($maid_id){

        $data = array(
        'maid_img'   =>  'public/maid_pictures/ID-'.$maid_id.'.jpg'

        );
        $this->db->where('maid_id', $maid_id);
        return $this->db->update('maid', $data);
    }



    public function exist_img($maid_id){
        
        $this->db->select('maid_img');
        
        $this->db->from('maid');
        
        $this->db->where('maid_id',$maid_id);
        
        $query = $this->db->get();

        return $query;


    }


    public function fetch_hold_selected($limit, $start){
        $this->db->select('m.*, s.supplier_name, t.*, n.*,b.*,f.staff_name');
        $this->db->from('maid m');
        $this->db->join('supplier_maid s', 'm.supplier_id=s.supplier_id');
        $this->db->join('status t', 'm.status_id=t.status_id');
        $this->db->join('nationality n', 'm.nationality_id=n.nationality_id');
        $this->db->join('staff f', 'm.staff_id=f.staff_id');
        $this->db->join('branch b', 'm.branch_id=b.branch_id', 'left');
        $this->db->where('m.active', 1);
        $this->db->where('t.status_id' , 2);
        $this->db->or_where('t.status_id' , 4);
        //$this->db->where('t.status_id', 2,4);
       // $this->db->where('t.status_id', 4);
        if (isset($_GET['maid_name'])&&$_GET['maid_name']!='') {
            $this->db->like('maid_name', $_GET['maid_name']);
        }
        if (isset($_GET['maid_supplier'])&&$_GET['maid_supplier']!='') {
           $this->db->like('maid_supplier', $_GET['maid_supplier']);
        }
        if (isset($_GET['supplier_name'])&&$_GET['supplier_name']!='') {
            $this->db->like('s.supplier_id', $_GET['supplier_name']);
        }
           if (isset($_GET['supplier_name'])&&$_GET['supplier_name']!='') {
            $this->db->like('s.supplier_id', $_GET['supplier_name']);
        }
            if (isset($_GET['nationality_name'])&&$_GET['nationality_name']!='') {
            $this->db->like('n.nationality_id', $_GET['nationality_name']);
        }

             if (isset($_GET['status_name'])&&$_GET['status_name']!='') {
            $this->db->like('t.status_id', $_GET['status_name']);
        }

        else{
            $this->db->order_by('m.maid_id');
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


    public function count_hold_selected(){
        $this->db->select('m.*, t.*');
        $this->db->from('maid m');
        $this->db->join('status t', 'm.status_id=t.status_id', 'left');
        $this->db->where('m.active', 1);
        $this->db->where('t.status_id' , 2);
        $this->db->or_where('t.status_id' , 4);

        $query = $this->db->get();
        return $query->num_rows(); 
    }

     public function getFull($id=FALSE){
        if ($id === FALSE) {
            $this->db->where('active =', 1);
            $this->db->order_by('maid_id','desc');
            $query = $this->db->get('maid');
            return $query->result_array();
        }
        $this->db->select('m.*, s.supplier_name, t.status_name, n.nationality_name,b.branch_name,f.staff_name,e.customer_name');
        $this->db->from('maid m');
        $this->db->join('supplier_maid s', 'm.supplier_id=s.supplier_id', 'left');
        $this->db->join('status t', 'm.status_id=t.status_id', 'left');
        $this->db->join('customer_maid e', 'm.maid_employer=e.customer_id', 'left');
        $this->db->join('nationality n', 'm.nationality_id=n.nationality_id', 'left');
        $this->db->join('staff f', 'm.staff_id=f.staff_id', 'left');
        $this->db->join('branch b', 'm.branch_id=b.branch_id', 'left');
        $this->db->where('m.maid_id', $id);

        $query = $this->db->get();
        return $query->row_array();

       
    }


public function update_status($id){
        $data = array(
            'status_id'           => $this->input->post('status_id'),
            'last_update'                => time()
        );
        $this->db->where('maid_id', $id);
        return $this->db->update('maid', $data);
    }

    public function maid_deploy($id){
        $data = array(
            'status_id'      => 6,
        );
        $this->db->where('maid_id', $id);
        return $this->db->update('maid', $data);
    }

    public function maid_available($id){
        $data = array(
            'status_id'      => 1,
            'customer_id'    => 0,
        );
        $this->db->where('maid_id', $id);
        return $this->db->update('maid', $data);
    }

       public function maid_selected($id){
        $data = array(
            'status_id'      => 4,
        );
        $this->db->where('maid_id', $id);
        return $this->db->update('maid', $data);
    }

    public function assign_maid($id,$customerx_id){
        $data = array(
            'customer_id'      => $customerx_id,
        );
        $this->db->where('maid_id', $id);
        return $this->db->update('maid', $data);
    }


    public function add_request() {
        $data = array(
            'maid_id'             => $this->input->post('maid_id'),
            'customer_id'         => $this->input->post('customer_id'),
            'payment'             => $this->input->post('payment'),
            'remark'              => $this->input->post('remark'),
          
            'request_date'        => date('Y-m-d')
        );
        $this->db->insert('purchase_request', $data);
        return $this->db->insert_id();
    }



    public function maid_fetch($limit){
        $this->db->select('m.*, s.supplier_name, t.*, n.*,b.*, f.staff_name');
        $this->db->from('maid m');
        $this->db->join('supplier_maid s', 'm.supplier_id=s.supplier_id', 'left');
        $this->db->join('status t', 'm.status_id=t.status_id', 'left');
        $this->db->join('nationality n', 'm.nationality_id=n.nationality_id', 'left');
        $this->db->join('staff f', 'm.staff_id=f.staff_id','left');
        $this->db->join('branch b', 'm.branch_id=b.branch_id', 'left');
        $this->db->where('m.active', 1);

        if($this->session->userdata('fcs_role_id') == 4){

             $this->db->where('m.supplier_id', $this->session->userdata('fcs_supplier_id'));
        }


        if (isset($_GET['maid_name'])&&$_GET['maid_name']!='') {
            $this->db->like('maid_name', $_GET['maid_name']);
        }
        if (isset($_GET['maid_supplier'])&&$_GET['maid_supplier']!='') {
           $this->db->like('maid_supplier', $_GET['maid_supplier']);
        }
    
            if (isset($_GET['nationality_name'])&&$_GET['nationality_name']!='') {
            $this->db->like('n.nationality_id', $_GET['nationality_name']);
        }

            if (isset($_GET['status_name'])&&$_GET['status_name']!='') {
            $this->db->like('t.status_id', $_GET['status_name']);
        }

        if (isset($_GET['supplier_name'])&&$_GET['supplier_name']!='') {
            $this->db->like('s.supplier_id', $_GET['supplier_name']);
        }

        if($limit !== 0){
             $this->db->limit($limit);
        }

       
        if (isset($_GET['sort_by'])&&$_GET['sort_by']!='') {
            $this->db->order_by($_GET['sort_by']);
        }
        else{
            $this->db->order_by('maid_id','asc');
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



     public function ajax_maid_load($id){

        $this->db->select('m.*, s.supplier_name, t.*, n.*,b.*, f.staff_name');
        $this->db->from('maid m');
        $this->db->join('supplier_maid s', 'm.supplier_id=s.supplier_id', 'left');
        $this->db->join('status t', 'm.status_id=t.status_id', 'left');
        $this->db->join('nationality n', 'm.nationality_id=n.nationality_id', 'left');
        $this->db->join('staff f', 'm.staff_id=f.staff_id', 'left');
        $this->db->join('branch b', 'm.branch_id=b.branch_id', 'left');
        $this->db->where('m.active', 1);
        $this->db->where('m.maid_id >', $id);

        if($this->session->userdata('fcs_role_id') == 4){

             $this->db->where('m.supplier_id', $this->session->userdata('fcs_supplier_id'));
        }



        $this->db->limit(20);
     
     if (isset($_GET['maid_name'])&&$_GET['maid_name']!='') {
            $this->db->like('maid_name', $_GET['maid_name']);
        }
        if (isset($_GET['maid_supplier'])&&$_GET['maid_supplier']!='') {
           $this->db->like('maid_supplier', $_GET['maid_supplier']);
        }
    
            if (isset($_GET['nationality_name'])&&$_GET['nationality_name']!='') {
            $this->db->like('n.nationality_id', $_GET['nationality_name']);
        }

            if (isset($_GET['status_name'])&&$_GET['status_name']!='') {
            $this->db->like('t.status_id', $_GET['status_name']);
        }

        if (isset($_GET['supplier_name'])&&$_GET['supplier_name']!='') {
            $this->db->like('s.supplier_id', $_GET['supplier_name']);
        }

       
        if (isset($_GET['sort_by'])&&$_GET['sort_by']!='') {
            $this->db->order_by($_GET['sort_by']);
        }
        else{
            $this->db->order_by('maid_id','asc');
        }
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $query->result();
        }
        return false;

     }


     public function get_maid_dep($id){

        $this->db->select('a.*,m.maid_id,m.maid_name,m.maid_code');
        $this->db->from('maid_deployment_dtl a');
        $this->db->join('maid m', 'a.maid_id=m.maid_id', 'left');   
        $this->db->where('a.active', 1);
        $this->db->where('m.active', 1);
        $this->db->where('a.maid_dep_id', $id);


        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;

     }



     public function update_maid_dep($id){

        $data = array(            
            'date_deploy'             => $this->input->post('date_deploy'),          
            'top_up_placement_fee'  => $this->input->post('top_up_placement_fee'),                 
            'refund'  => $this->input->post('refund'),
            'date_return'  => $this->input->post('date_return'),
            'paid_placement_fee'  => $this->input->post('paid_placement_fee'),
            'gst_on_agency_p_fee'  => $this->input->post('gst_on_agency_p_fee'),
            'customer_id'  => $this->input->post('customer_id'),
            'overseas_placement_fee'  => $this->input->post('overseas_placement_fee'),  
            't_bal_p_fee'  => $this->input->post('t_bal_p_fee'),
            'bal_placement_fee'  => $this->input->post('bal_placement_fee')
            );



             $this->db->where('maid_dep_id', $id);
            return $this->db->update('maid_deployment_dtl', $data);


            return false;
     }



     public function get_maid_dep_loan($maid_id){

 
        $query = $this->db->query("SELECT maid_dep_id , (bal_placement_fee + gst_on_agency_p_fee) AS total_bal_amount 
                                    FROM maid_deployment_dtl
                                    WHERE active = 1
                                    AND maid_id = ".$this->db->escape($maid_id)."
                                    AND maid_dep_id IN (SELECT MAX(maid_dep_id)
                                     FROM maid_deployment_dtl WHERE maid_id = ".$this->db->escape($maid_id)." AND active = 1)");

        

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

