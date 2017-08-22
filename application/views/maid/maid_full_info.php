<br>
<!-- /.row -->

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading" id="Top">
              <?=isset($_POST['maid_name'])?$_POST['maid_name']:(isset($maid['maid_name'])?$maid['maid_name']:'')?> 
            </div>
            <div class="panel-body">
                <div class="row">
                    <?php if(validation_errors()) { ?>
                    <div class="col-lg-12">
                        <div class="alert alert-danger">
                            <strong><?= validation_errors();?></strong>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <br>


                    <div class="col-lg-3 col-md-6">
                       
                           
                                    <img class="img-rounded"  src = "<?=base_url()?><?=isset($_POST['maid_img'])?$_POST['maid_img']:(isset($maid['maid_img'])?$maid['maid_img']:'')?>" height="300px" width="200px">
                            
                    </div>



           
              <div class="table-responsive">
                    <table class="table table-striped table-hover">
        
                        <tbody>
                                
                                <tr>
                                    <td>
                                        <b>Supplier</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['supplier_name'])?$_POST['supplier_name']:(isset($maid['supplier_name'])?$maid['supplier_name']:'')?>
                                   </td>
                                </tr>
                                
                                <tr>
                                    <td>
                                        <b>Arrival Date</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_arrival'])?$_POST['maid_arrival']:(isset($maid['maid_arrival'])?$maid['maid_arrival']:'')?>
                                   </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>Ref. No.</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_ref_no'])?$_POST['maid_ref_no']:(isset($maid['maid_ref_no'])?$maid['maid_ref_no']:'')?>
                                   </td>
                                </tr>
                 
                                <tr>
                                    <td>
                                        <b>Passport No</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_passport'])?$_POST['maid_passport']:(isset($maid['maid_passport'])?$maid['maid_passport']:'')?>
                                   </td>
                                </tr>

                                  <tr>
                                    <td>
                                        <b>21 Days</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_21_days'])?$_POST['maid_21_days']:(isset($maid['maid_21_days'])?$maid['maid_21_days']:'')?>
                                   </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>21 Days due</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_21_days_due'])?$_POST['maid_21_days_due']:(isset($maid['maid_21_days_due'])?$maid['maid_21_days_due']:'')?>
                                   </td>
                                </tr>
                           </tbody>
                    </table>
                    <a href="<?=base_url()?>maid/print_maid_info/<?=($maid['maid_id'])?$maid['maid_id']:''?>" target="_blank" class="btn btn-primary btn-md">Print</a> 
                </div>
            </div>
        </div>
    </div> 
</div>





<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading" id="PersonalInformation">
               Personal Information 
              
            </div>
            <div class="panel-body">
                <div class="row">
                    <?php if(validation_errors()) { ?>
                    <div class="col-lg-12">
                        <div class="alert alert-danger">
                            <strong><?= validation_errors();?></strong>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <br>
              <div class="table-responsive">
                    <table class="table table-striped table-hover">
        
                        <tbody>
                                
                                <tr>
                                    <td>
                                        <b>Name</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_name'])?$_POST['maid_name']:(isset($maid['maid_name'])?$maid['maid_name']:'')?>
                                   </td>
                                </tr>
                                
                                <tr>
                                    <td>
                                        <b>Ref No</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_ref_no'])?$_POST['maid_ref_no']:(isset($maid['maid_ref_no'])?$maid['maid_ref_no']:'')?>
                                   </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>Status</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['status_name'])?$_POST['status_name']:(isset($maid['status_name'])?$maid['status_name']:'')?>
                                   </td>
                                </tr>
                                
                                <tr>
                                    <td>
                                        <b>Supplier</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['supplier_name'])?$_POST['supplier_name']:(isset($maid['supplier_name'])?$maid['supplier_name']:'')?>
                                   </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>Remarket/Hold/Selected Date</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_rhs_date'])?$_POST['maid_rhs_date']:(isset($maid['maid_rhs_date'])?$maid['maid_rhs_date']:'')?>
                                   </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>Branch</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['branch_name'])?$_POST['branch_name']:(isset($maid['branch_name'])?$maid['branch_name']:'')?>
                                   </td>
                                </tr>

                                  <tr>
                                    <td>
                                        <b>Staff</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['staff_name'])?$_POST['staff_name']:(isset($maid['staff_name'])?$maid['staff_name']:'')?>
                                   </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>Employer</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_employer'])?$_POST['maid_employer']:(isset($maid['customer_name'])?$maid['customer_name']:'')?>
                                   </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>Date of birth</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_bday'])?$_POST['maid_bday']:(isset($maid['maid_bday'])?$maid['maid_bday']:'')?>
                                   </td>
                                </tr>

                                  <tr>
                                    <td>
                                        <b>Age</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_age'])?$_POST['maid_age']:(isset($maid['maid_age'])?$maid['maid_age']:'')?>
                                   </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>Place of birth</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_place_birth'])?$_POST['maid_place_birth']:(isset($maid['maid_place_birth'])?$maid['maid_place_birth']:'')?>
                                   </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>Height</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_height'])?$_POST['maid_height']:(isset($maid['maid_height'])?$maid['maid_height']:'')?>
                                   </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>Weight</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_weight'])?$_POST['maid_weight']:(isset($maid['maid_weight'])?$maid['maid_weight']:'')?>
                                   </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>Nationality</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['nationality_name'])?$_POST['nationality_name']:(isset($maid['nationality_name'])?$maid['nationality_name']:'')?>
                                   </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>Residential address in home country</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_res_home'])?$_POST['maid_res_home']:(isset($maid['maid_res_home'])?$maid['maid_res_home']:'')?>
                                   </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>Name of port / airport to be repatriated to</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_port'])?$_POST['maid_port']:(isset($maid['maid_port'])?$maid['maid_port']:'')?>
                                   </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>Contact number in home country</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_contact_home'])?$_POST['maid_contact_home']:(isset($maid['maid_contact_home'])?$maid['maid_contact_home']:'')?>
                                   </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>Religion</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_religion'])?$_POST['maid_religion']:(isset($maid['maid_religion'])?$maid['maid_religion']:'')?>
                                   </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>Education Level</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_educ'])?$_POST['maid_educ']:(isset($maid['maid_educ'])?$maid['maid_educ']:'')?>
                                   </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>Number of siblings</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_sibs'])?$_POST['maid_sibs']:(isset($maid['maid_sibs'])?$maid['maid_sibs']:'')?>
                                   </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>Marital status</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_mar_status'])?$_POST['maid_mar_status']:(isset($maid['maid_mar_status'])?$maid['maid_mar_status']:'')?>
                                   </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>Number of children</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_children'])?$_POST['maid_children']:(isset($maid['maid_children'])?$maid['maid_children']:'')?>
                                   </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>Age of children if any</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_children_age'])?$_POST['maid_children_age']:(isset($maid['maid_children_age'])?$maid['maid_children_age']:'')?>
                                   </td>
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> 
</div>




<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading" id="MedicalHistory">
               Medical History/Dietary/ Restrictions  
               <a class="btn btn-default btn-xs" href="#Top"><i class="fa fa-eye"></i> Back to top</a>
            </div>
            <div class="panel-body">
                <div class="row">
                    <?php if(validation_errors()) { ?>
                    <div class="col-lg-12">
                        <div class="alert alert-danger">
                            <strong><?= validation_errors();?></strong>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <br>
              <div class="table-responsive">
                    <table class="table table-striped table-hover">
        
                        <tbody>
                      
                                  <tr>
                                    <td>
                                        <b>Allergies (if any)</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_allergies'])?$_POST['maid_allergies']:(isset($maid['maid_allergies'])?$maid['maid_allergies']:'')?>
                                   </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>Mental illness</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_mental'])?$_POST['maid_mental']:(isset($maid['maid_mental'])?$maid['maid_mental']:'')?>
                                   </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>Epilepsy</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_epilepsy'])?$_POST['maid_epilepsy']:(isset($maid['maid_epilepsy'])?$maid['maid_epilepsy']:'')?>
                                   </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>Asthama</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_asthma'])?$_POST['maid_asthma']:(isset($maid['maid_asthma'])?$maid['maid_asthma']:'')?>
                                   </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>Diabetis</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_diabetis'])?$_POST['maid_diabetis']:(isset($maid['maid_diabetis'])?$maid['maid_diabetis']:'')?>
                                   </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>Hypertension</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_hypertension'])?$_POST['maid_hypertension']:(isset($maid['maid_hypertension'])?$maid['maid_hypertension']:'')?>
                                   </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>Tuberculosis</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_tb'])?$_POST['maid_tb']:(isset($maid['maid_tb'])?$maid['maid_tb']:'')?>
                                   </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>Heart disease</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_heart_disease'])?$_POST['maid_heart_disease']:(isset($maid['maid_heart_disease'])?$maid['maid_heart_disease']:'')?>
                                   </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>Malaria</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_malaria'])?$_POST['maid_malaria']:(isset($maid['maid_malaria'])?$maid['maid_malaria']:'')?>
                                   </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>Opearation</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_operation'])?$_POST['maid_operation']:(isset($maid['maid_operation'])?$maid['maid_operation']:'')?>
                                   </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>Other Disease</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_other'])?$_POST['maid_other']:(isset($maid['maid_other'])?$maid['maid_other']:'')?>
                                   </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>Physical disability</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_physical_d'])?$_POST['maid_physical_d']:(isset($maid['maid_physical_d'])?$maid['maid_physical_d']:'')?>
                                   </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>Dietary restriction</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_dietary_res'])?$_POST['maid_dietary_res']:(isset($maid['maid_dietary_res'])?$maid['maid_dietary_res']:'')?>
                                   </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>No pork</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_no_pork'])?$_POST['maid_no_pork']:(isset($maid['maid_no_pork'])?$maid['maid_no_pork']:'')?>
                                   </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>No beef</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_no_beef'])?$_POST['maid_no_beef']:(isset($maid['maid_no_beef'])?$maid['maid_no_beef']:'')?>
                                   </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>Handling other food</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_handling_others'])?$_POST['maid_handling_others']:(isset($maid['maid_handling_others'])?$maid['maid_handling_others']:'')?>
                                   </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>Preference for rest day: __ restday per month</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_rest'])?$_POST['maid_rests']:(isset($maid['maid_rest'])?$maid['maid_rest']:'')?>
                                   </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>Other remarks</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_remarks'])?$_POST['maid_remarks']:(isset($maid['maid_remarks'])?$maid['maid_remarks']:'')?>
                                   </td>
                                </tr>   
 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> 
</div>





<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading" id="MedicalHistory">
               Skill of FDW 
               <a class="btn btn-default btn-xs" href="#Top"><i class="fa fa-eye"></i> Back to top</a>
            </div>
            <div class="panel-body">
                <div class="row">
                    <?php if(validation_errors()) { ?>
                    <div class="col-lg-12">
                        <div class="alert alert-danger">
                            <strong><?= validation_errors();?></strong>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <br>
              <div class="table-responsive">
                    <table class="table table-striped table-hover">
        
                        <tbody>
                      
                                <tr>
                                    <td>
                                        <b>Based on FDW's declaration, no evaluation/observation by Singapore EA or overseas training centre/EA</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_FDW_dec'])?$_POST['maid_FDW_dec']:(isset($maid['maid_FDW_dec'])?$maid['maid_FDW_dec']:'')?>
                                   </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>Interviewed by Singapore EA</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_interview_sg'])?$_POST['maid_interview_sg']:(isset($maid['maid_interview_sg'])?$maid['maid_interview_sg']:'')?>
                                   </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>Interviewed via telephone/teleconference</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_int_tel_sg'])?$_POST['maid_int_tel_sg']:(isset($maid['maid_int_tel_sg'])?$maid['maid_int_tel_sg']:'')?>
                                   </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>Interviewed via videoconference</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_int_vid_sg'])?$_POST['maid_int_vid_sg']:(isset($maid['maid_int_vid_sg'])?$maid['maid_int_vid_sg']:'')?>
                                   </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>Interviewed in person</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_int_person_sg'])?$_POST['maid_int_person_sg']:(isset($maid['maid_int_person_sg'])?$maid['maid_int_person_sg']:'')?>
                                   </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>Interviewed in person and also made observation of FDW in the areas of work listed in table</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_int_observed_sg'])?$_POST['maid_int_observed_sg']:(isset($maid['maid_int_observed_sg'])?$maid['maid_int_observed_sg']:'')?>
                                   </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>Interviewed by overseas training centre/EA</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_interview_foreign'])?$_POST['maid_interview_foreign']:(isset($maid['maid_interview_foreign'])?$maid['maid_interview_foreign']:'')?>
                                   </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>name of foreign training centre/EA</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_foreigncenter_name'])?$_POST['maid_foreigncenter_name']:(isset($maid['maid_foreigncenter_name'])?$maid['maid_foreigncenter_name']:'')?>
                                   </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>State if the third party is certified (e.g. ISO9001) </b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_foreign_certified'])?$_POST['maid_foreign_certified']:(isset($maid['maid_foreign_certified'])?$maid['maid_foreign_certified']:'')?>
                                   </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>Interviewed via telephone/teleconference (Foreign)</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_int_tel_foreign'])?$_POST['maid_int_tel_foreign']:(isset($maid['maid_int_tel_foreign'])?$maid['maid_int_tel_foreign']:'')?>
                                   </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>Interviewed via videoconference (Foreign)</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_int_vid_foreign'])?$_POST['maid_int_vid_foreign']:(isset($maid['maid_int_vid_foreign'])?$maid['maid_int_vid_foreign']:'')?>
                                   </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>Interviewed in person (Foreign) </b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_int_person_foreign'])?$_POST['maid_int_person_foreign']:(isset($maid['maid_int_person_foreign'])?$maid['maid_int_person_foreign']:'')?>
                                   </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>Interviewed in person and also made observation of FDW in the areas of work listed in table (Foreign)</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_int_observed_foreign'])?$_POST['maid_int_observed_foreign']:(isset($maid['maid_int_observed_foreign'])?$maid['maid_int_observed_foreign']:'')?>
                                   </td>
                                </tr>

                                
 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> 
</div>


<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading" id="EmploymentHistory">
               EMPLOYMENT HISTORY OF THE FDW 
               <a class="btn btn-default btn-xs" href="#Top"><i class="fa fa-eye"></i> Back to top</a>
            </div>
            <div class="panel-body">
                <div class="row">
                    <?php if(validation_errors()) { ?>
                    <div class="col-lg-12">
                        <div class="alert alert-danger">
                            <strong><?= validation_errors();?></strong>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <br>
              <div class="table-responsive">
                    <table class="table table-striped table-hover">
        
                        <tbody>
                      
                                  <tr>
                                    <td>
                                        <b>First employment history beginning date</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_his_frm_1'])?$_POST['maid_his_frm_1']:(isset($maid['maid_his_frm_1'])?$maid['maid_his_frm_1']:'')?>
                                   </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>First employment history end date</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_his_to_1'])?$_POST['maid_his_to_1']:(isset($maid['maid_his_to_1'])?$maid['maid_his_to_1']:'')?>
                                   </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>First employment history country</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_his_country_1'])?$_POST['maid_his_country_1']:(isset($maid['maid_his_country_1'])?$maid['maid_his_country_1']:'')?>
                                   </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>First employment history</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_his_emp_1'])?$_POST['maid_his_emp_1']:(isset($maid['maid_his_emp_1'])?$maid['maid_his_emp_1']:'')?>
                                   </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>First employment history duties</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_his_work_1'])?$_POST['maid_his_work_1']:(isset($maid['maid_his_work_1'])?$maid['maid_his_work_1']:'')?>
                                   </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>First employment history remarks</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_his_rem_1'])?$_POST['maid_his_rem_1']:(isset($maid['maid_his_rem_1'])?$maid['maid_his_rem_1']:'')?>
                                   </td>
                                </tr>

                               <tr>
                                    <td>
                                        <b>Second employment history beginning date</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_his_frm_2'])?$_POST['maid_his_frm_2']:(isset($maid['maid_his_frm_2'])?$maid['maid_his_frm_2']:'')?>
                                   </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>Second employment history end date</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_his_to_2'])?$_POST['maid_his_to_2']:(isset($maid['maid_his_to_2'])?$maid['maid_his_to_2']:'')?>
                                   </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>Second employment history country</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_his_country_2'])?$_POST['maid_his_country_2']:(isset($maid['maid_his_country_2'])?$maid['maid_his_country_2']:'')?>
                                   </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>Second employment history </b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_his_emp_2'])?$_POST['maid_his_emp_2']:(isset($maid['maid_his_emp_2'])?$maid['maid_his_emp_2']:'')?>
                                   </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>Second employment history duties</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_his_work2'])?$_POST['maid_his_work2']:(isset($maid['maid_his_work2'])?$maid['maid_his_work2']:'')?>
                                   </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>Second employment history remarks</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_his_rem_2'])?$_POST['maid_his_rem_2']:(isset($maid['maid_his_rem_2'])?$maid['maid_his_rem_2']:'')?>
                                   </td>
                                </tr>


                                <tr>
                                    <td>
                                        <b>Previous working experience in Singapore</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_prev_sg'])?$_POST['maid_prev_sg']:(isset($maid['maid_prev_sg'])?$maid['maid_prev_sg']:'')?>
                                   </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>Feedback from first employer</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_feedback1'])?$_POST['maid_feedback1']:(isset($maid['maid_feedback1'])?$maid['maid_feedback1']:'')?>
                                   </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>Feedback from second employer</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_feedback2'])?$_POST['maid_feedback2']:(isset($maid['maid_feedback2'])?$maid['maid_feedback2']:'')?>
                                   </td>
                                </tr> 

                                

                                <tr>
                                    <td>
                                        <b>FDW is not available for interview</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_no_interview'])?$_POST['maid_no_interview']:(isset($maid['maid_no_interview'])?$maid['maid_no_interview']:'')?>
                                   </td>
                                </tr> 

                                <tr>
                                    <td>
                                        <b>FDW can be interviewed by phone</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_interview_phone'])?$_POST['maid_interview_phone']:(isset($maid['maid_interview_phone'])?$maid['maid_interview_phone']:'')?>
                                   </td>
                                </tr> 

                                <tr>
                                    <td>
                                        <b>FDW can be interviewed in person</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_interview_video'])?$_POST['maid_interview_video']:(isset($maid['maid_interview_video'])?$maid['maid_interview_video']:'')?>
                                   </td>
                                </tr> 

                                <tr>
                                    <td>
                                        <b>Feedback from second employer</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_interview_person'])?$_POST['maid_interview_person']:(isset($maid['maid_interview_person'])?$maid['maid_interview_person']:'')?>
                                   </td>
                                </tr> 
 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> 
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading" id="PersonalInformation">
               Big Table 1 
              
            </div>
            <div class="panel-body">
                <div class="row">
                    <?php if(validation_errors()) { ?>
                    <div class="col-lg-12">
                        <div class="alert alert-danger">
                            <strong><?= validation_errors();?></strong>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <br>
              <div class="table-responsive">
                    <table class="table table-striped table-hover">
        
                        <tbody>
                                
                                <tr>
                                    <td>
                                        <b>Infants age</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_care_infants_age_1'])?$_POST['maid_care_infants_age_1']:(isset($maid['maid_care_infants_age_1'])?$maid['maid_care_infants_age_1']:'')?>
                                   </td>
                                </tr>
                                
                                <tr>
                                    <td>
                                        <b>Care for infants Will</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_care_infants_will_1'])?$_POST['maid_care_infants_will_1']:(isset($maid['maid_care_infants_will_1'])?$maid['maid_care_infants_will_1']:'')?>
                                   </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>Care for infants no. of years</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_care_infants_exp_1'])?$_POST['maid_care_infants_exp_1']:(isset($maid['maid_care_infants_exp_1'])?$maid['maid_care_infants_exp_1']:'')?>
                                   </td>
                                </tr>
                                
                                <tr>
                                    <td>
                                        <b>Care for infants evaluation</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_care_infants_eva_1'])?$_POST['maid_care_infants_eva_1']:(isset($maid['maid_care_infants_eva_1'])?$maid['maid_care_infants_eva_1']:'')?>
                                   </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>care for elderly will</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_care_elderly_will_1'])?$_POST['maid_care_elderly_will_1']:(isset($maid['maid_care_elderly_will_1'])?$maid['maid_care_elderly_will_1']:'')?>
                                   </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>care for elderly number of years</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_care_elderly_exp_1'])?$_POST['maid_care_elderly_exp_1']:(isset($maid['maid_care_elderly_exp_1'])?$maid['maid_care_elderly_exp_1']:'')?>
                                   </td>
                                </tr>

                                  <tr>
                                    <td>
                                        <b>care for elderly evaluation</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_care_elderly_eva_1'])?$_POST['maid_care_elderly_eva_1']:(isset($maid['maid_care_elderly_eva_1'])?$maid['maid_care_elderly_eva_1']:'')?>
                                   </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>Care for disabled Will</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_care_disable_will_1'])?$_POST['maid_care_disable_will_1']:(isset($maid['maid_care_disable_will_1'])?$maid['maid_care_disable_will_1']:'')?>
                                   </td>
                                </tr>
                       
                                <tr>
                                    <td>
                                        <b>Care for disabled no. of years</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_care_disable_exp_1'])?$_POST['mmaid_care_disable_exp_1']:(isset($maid['maid_care_disable_exp_1'])?$maid['maid_care_disable_exp_1']:'')?>
                                   </td>
                                </tr>

                                  <tr>
                                    <td>
                                        <b>Care for disabled evaluation</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_care_disable_eva_1'])?$_POST['maid_care_disable_eva_1']:(isset($maid['maid_care_disable_eva_1'])?$maid['maid_care_disable_eva_1']:'')?>
                                   </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>Housework will</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_care_housework_will_1'])?$_POST['maid_care_housework_will_1']:(isset($maid['maid_care_housework_will_1'])?$maid['maid_care_housework_will_1']:'')?>
                                   </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>House work number of years</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_care_housework_exp_1'])?$_POST['maid_care_housework_exp_1']:(isset($maid['maid_care_housework_exp_1'])?$maid['maid_care_housework_exp_1']:'')?>
                                   </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>House work evaluation</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_care_housework_eva_1'])?$_POST['maid_care_housework_eva_1']:(isset($maid['maid_care_housework_eva_1'])?$maid['maid_care_housework_eva_1']:'')?>
                                   </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>cooking cuisine</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_cooking_cuisines_1'])?$_POST['maid_cooking_cuisines_1']:(isset($maid['maid_cooking_cuisines_1'])?$maid['maid_cooking_cuisines_1']:'')?>
                                   </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>Cooking will</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_cooking_will_1'])?$_POST['maid_cooking_will_1']:(isset($maid['maid_cooking_will_1'])?$maid['maid_cooking_will_1']:'')?>
                                   </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>Cooking number of years</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_cooking_exp_1'])?$_POST['maid_cooking_exp_1']:(isset($maid['maid_cooking_exp_1'])?$maid['maid_cooking_exp_1']:'')?>
                                   </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>Cooking evaluation</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_cooking_eva_1'])?$_POST['maid_cooking_eva_1']:(isset($maid['maid_cooking_eva_1'])?$maid['maid_cooking_eva_1']:'')?>
                                   </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>Maid Other language</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_language_1'])?$_POST['maid_language_1']:(isset($maid['maid_language_1'])?$maid['maid_language_1']:'')?>
                                   </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>Language years</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_language_exp_1'])?$_POST['maid_language_exp_1']:(isset($maid['maid_language_exp_1'])?$maid['maid_language_exp_1']:'')?>
                                   </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>Language Evaluation</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_language_eva_1'])?$_POST['maid_language_eva_1']:(isset($maid['maid_language_eva_1'])?$maid['maid_language_eva_1']:'')?>
                                   </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>Maid other skills</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_skill_1'])?$_POST['maid_skill_1']:(isset($maid['maid_skill_1'])?$maid['maid_skill_1']:'')?>
                                   </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>Skill number of years</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_skill_exp_1'])?$_POST['maid_skill_exp_1']:(isset($maid['maid_skill_exp_1'])?$maid['maid_skill_exp_1']:'')?>
                                   </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>Skill evaluation</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_skill_eva_1'])?$_POST['maid_skill_eva_1']:(isset($maid['maid_skill_eva_1'])?$maid['maid_skill_eva_1']:'')?>
                                   </td>
                                </tr>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> 
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading" id="PersonalInformation">
               Big Table 2 
              
            </div>
            <div class="panel-body">
                <div class="row">
                    <?php if(validation_errors()) { ?>
                    <div class="col-lg-12">
                        <div class="alert alert-danger">
                            <strong><?= validation_errors();?></strong>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <br>
              <div class="table-responsive">
                    <table class="table table-striped table-hover">
        
                        <tbody>
                                
                                <tr>
                                    <td>
                                        <b>Infants age</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_care_infants_age_2'])?$_POST['maid_care_infants_age_2']:(isset($maid['maid_care_infants_age_2'])?$maid['maid_care_infants_age_2']:'')?>
                                   </td>
                                </tr>
                                
                                <tr>
                                    <td>
                                        <b>Care for infants Will</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_care_infants_will_2'])?$_POST['maid_care_infants_will_2']:(isset($maid['maid_care_infants_will_2'])?$maid['maid_care_infants_will_2']:'')?>
                                   </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>Care for infants no. of years</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_care_infants_exp_2'])?$_POST['maid_care_infants_exp_2']:(isset($maid['maid_care_infants_exp_2'])?$maid['maid_care_infants_exp_2']:'')?>
                                   </td>
                                </tr>
                                
                                <tr>
                                    <td>
                                        <b>Care for infants evaluation</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_care_infants_eva_2'])?$_POST['maid_care_infants_eva_2']:(isset($maid['maid_care_infants_eva_2'])?$maid['maid_care_infants_eva_2']:'')?>
                                   </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>care for elderly will</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_care_elderly_will_2'])?$_POST['maid_care_elderly_will_2']:(isset($maid['maid_care_elderly_will_2'])?$maid['maid_care_elderly_will_2']:'')?>
                                   </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>care for elderly number of years</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_care_elderly_exp_2'])?$_POST['maid_care_elderly_exp_2']:(isset($maid['maid_care_elderly_exp_2'])?$maid['maid_care_elderly_exp_2']:'')?>
                                   </td>
                                </tr>

                                  <tr>
                                    <td>
                                        <b>care for elderly evaluation</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_care_elderly_eva_2'])?$_POST['maid_care_elderly_eva_2']:(isset($maid['maid_care_elderly_eva_2'])?$maid['maid_care_elderly_eva_2']:'')?>
                                   </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>Care for disabled Will</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_care_disable_will_2'])?$_POST['maid_care_disable_will_2']:(isset($maid['maid_care_disable_will_2'])?$maid['maid_care_disable_will_2']:'')?>
                                   </td>
                                </tr>
                       
                                <tr>
                                    <td>
                                        <b>Care for disabled no. of years</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_care_disable_exp_2'])?$_POST['mmaid_care_disable_exp_2']:(isset($maid['maid_care_disable_exp_2'])?$maid['maid_care_disable_exp_2']:'')?>
                                   </td>
                                </tr>

                                  <tr>
                                    <td>
                                        <b>Care for disabled evaluation</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_care_disable_eva_2'])?$_POST['maid_care_disable_eva_2']:(isset($maid['maid_care_disable_eva_2'])?$maid['maid_care_disable_eva_2']:'')?>
                                   </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>Housework will</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_care_housework_will_2'])?$_POST['maid_care_housework_will_2']:(isset($maid['maid_care_housework_will_2'])?$maid['maid_care_housework_will_2']:'')?>
                                   </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>House work number of years</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_care_housework_exp_2'])?$_POST['maid_care_housework_exp_2']:(isset($maid['maid_care_housework_exp_2'])?$maid['maid_care_housework_exp_2']:'')?>
                                   </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>House work evaluation</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_care_housework_eva_2'])?$_POST['maid_care_housework_eva_2']:(isset($maid['maid_care_housework_eva_2'])?$maid['maid_care_housework_eva_2']:'')?>
                                   </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>cooking cuisine</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_cooking_cuisines_2'])?$_POST['maid_cooking_cuisines_2']:(isset($maid['maid_cooking_cuisines_2'])?$maid['maid_cooking_cuisines_2']:'')?>
                                   </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>Cooking will</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_cooking_will_2'])?$_POST['maid_cooking_will_2']:(isset($maid['maid_cooking_will_2'])?$maid['maid_cooking_will_2']:'')?>
                                   </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>Cooking number of years</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_cooking_exp_2'])?$_POST['maid_cooking_exp_2']:(isset($maid['maid_cooking_exp_2'])?$maid['maid_cooking_exp_2']:'')?>
                                   </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>Cooking evaluation</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_cooking_eva_2'])?$_POST['maid_cooking_eva_2']:(isset($maid['maid_cooking_eva_2'])?$maid['maid_cooking_eva_2']:'')?>
                                   </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>Maid Other language</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_language_2'])?$_POST['maid_language_2']:(isset($maid['maid_language_2'])?$maid['maid_language_2']:'')?>
                                   </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>Language years</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_language_exp_2'])?$_POST['maid_language_exp_2']:(isset($maid['maid_language_exp_2'])?$maid['maid_language_exp_2']:'')?>
                                   </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>Language Evaluation</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_language_eva_2'])?$_POST['maid_language_eva_2']:(isset($maid['maid_language_eva_2'])?$maid['maid_language_eva_2']:'')?>
                                   </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>Maid other skills</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_skill_2'])?$_POST['maid_skill_2']:(isset($maid['maid_skill_2'])?$maid['maid_skill_2']:'')?>
                                   </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>Skill number of years</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_skill_exp_2'])?$_POST['maid_skill_exp_2']:(isset($maid['maid_skill_exp_2'])?$maid['maid_skill_exp_2']:'')?>
                                   </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>Skill evaluation</b>
                                   </td> 
                                   <td>
                                        <?=isset($_POST['maid_skill_eva_2'])?$_POST['maid_skill_eva_2']:(isset($maid['maid_skill_eva_2'])?$maid['maid_skill_eva_2']:'')?>
                                   </td>
                                </tr>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> 
</div>








