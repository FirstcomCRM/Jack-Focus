<script type="text/javascript">
  window.print();
</script>


<style tyle="text/css">

@media print {
  h3{
  background: red !important;
  tr{
  /*border: 1px solid;*/
 box-shadow: 0px 0px 1px #888888 !important;
}
}
}
table {
    font-family: arial, sans-serif;
   
    width: 100%;
    font-size: 14px;
}

td, th {
  /*border: 1px solid #dddddd;*/

    text-align: left;
    padding: 3px;
}

tr{
  /*border: 1px solid;*/
 box-shadow: 0px 0px 1px #888888 !important;
}



</style>

<center><h3>  Maid Information   </h3></center>
<br>

<div style="width: 100%; width: 100%;  display: table; content: '' ;">
      <div style="width: 30%; float: left;">
             <img src = "<?=isset($maid['maid_img'])? base_url().$maid['maid_img']:''?>" height="300px" width="200px">
      </div>

       <br> 
       <br> 
       <br> 
       <table style="width: 70%; float: left;">
          <tr >
              <td> <b>Name</b>  </td>
              <td><?=isset($maid['maid_name'])?$maid['maid_name']:''?></td>
          </tr>
          <tr>
              <td> <b>Ref No</b> </td>
              <td><?=isset($maid['maid_ref_no'])?$maid['maid_ref_no']:''?></td>
          </tr>
          <tr>
             <td><b>Supplier</b></td>
             <td><?=isset($maid['supplier_name'])?$maid['supplier_name']:''?></td>
          </tr>
          <tr>
             <td><b>Passport No.</b></td>
             <td><?=isset($maid['maid_passport'])?$maid['maid_passport']:''?></td>
          </tr>
          <tr>
             <td> <b>Branch</b></td>
             <td><?=isset($maid['branch_name'])?$maid['branch_name']:''?></td>
          </tr>
          <tr>
            <td><b>Employer</b></td>
            <td><?=isset($maid['maid_employer'])?$maid['maid_employer']:''?></td>
          </tr>    
          <tr>
            <td><b>Salary</b></td>
            <td><?=isset($maid['maid_salary'])?$maid['maid_salary']:''?></td>
          </tr>
       </table> 

</div>

<br> 
<br> 

<div style="width: 100%; padding: 0;  display: table; content: '' ;">

<h3 >(A) Personal Information </h3>

<div style="width: 50%; float: left;">
      
      <table>
    


    <tr>
        <td><b>Status</b></td>
        <td><?=isset($maid['status_name'])?$maid['status_name']:''?></td>
       
    </tr>

    <tr>
        <td> <b>Date of birth</b></td>
        <td><?=isset($maid['maid_bday'])?$maid['maid_bday']:''?></td>
       
    </tr>
    <tr>
        <td> <b>Place of birth</b></td>
        <td><?=isset($maid['maid_place_birth'])?$maid['maid_place_birth']:''?></td>
      
    </tr>
    <tr>
        <td><b>Weight</b></td>
        <td><?=isset($maid['maid_weight'])?$maid['maid_weight']:''?></td>
      
    </tr>
    <tr>
        <td><b>Residential address<br> in home country</b></td>
        <td><?=isset($maid['maid_res_home'])?$maid['maid_res_home']:''?></td>
        
    </tr>
    <tr>
        <td><b>Contact number<br> in home country</b></td>
        <td><?=isset($maid['maid_contact_home'])?$maid['maid_contact_home']:''?></td>
       
    </tr>
    <tr>
        <td><b>Education Level</b></td>
        <td><?=isset($maid['maid_educ'])?$maid['maid_educ']:''?></td>
      
    </tr>
    <tr>
        <td> <b>Marital status</b> </td>
        <td><?=isset($maid['maid_mar_status'])?$maid['maid_mar_status']:''?></td>
       
     
    </tr>
    <tr>
        <td><b>Age of children <br>if any</b> </td>
        <td><?=isset($maid['maid_children_age'])?$maid['maid_children_age']:''?></td>
        
    </tr>





    </table>

</div>
<div style="width: 50%; float: left;">
      <table>
    


      <tr>
         
         
          <td> <b>Staff</b></td>
          <td><?=isset($maid['staff_name'])?$maid['staff_name']:''?></td>
      </tr>

      <tr>
         
          <td>  <b>Age</b></td>
          <td><?=isset($maid['maid_age'])?$maid['maid_age']:''?></td>
      </tr>
      <tr>
         
          <td> <b>Height</b></td>
          <td><?=isset($maid['maid_height'])?$maid['maid_height']:''?></td>
      </tr>
      <tr>
        
          <td> <b>Nationality</b></td>
          <td><?=isset($maid['nationality_name'])?$maid['nationality_name']:''?></td>
      </tr>
      <tr>
          
          <td><b>Name of port / airport<br> to be repatriated to</b></td>
          <td><?=isset($maid['maid_port'])?$maid['maid_port']:''?></td>
      </tr>
      <tr>
          
          <td><b>Religion</b> </td>
          <td><?=isset($maid['maid_religion'])?$maid['maid_religion']:''?></td>
      </tr>
      <tr>
          
          <td><b>Number of siblings</b></td>
          <td><?=isset($maid['maid_sibs'])?$maid['maid_sibs']:''?></td>
      </tr>
      <tr>
         
          <td><b>Number of children</b></td>
          <td><?=isset($maid['maid_children'])?$maid['maid_children']:''?></td>
      </tr>


      </table>

</div>




</div>

<br>


<div style="width: 100%; padding: 0;  display: table; content: '' ;">



<h3 >(B) Medical History/Dietary/ Restrictions </h3>




<div style="width: 50%; float: left;">


<table>

    <tr>
        <td> <b>Allergies (if any)</b></td>
        <td><?=isset($maid['maid_allergies'])?$maid['maid_allergies']:''?></td>
      
    </tr>

    <tr>
        <td><b>Epilepsy</b></td>
        <td><?=isset($maid['maid_epilepsy'])?$maid['maid_epilepsy']:''?></td>
       
    </tr>
    
        <tr>
        <td> <b>Diabetis</b></td>
        <td><?=isset($maid['maid_diabetis'])?$maid['maid_diabetis']:''?></td>
        
    </tr>
        <tr>
        <td><b>Tuberculosis</b></td>
        <td><?=isset($maid['maid_tb'])?$maid['maid_tb']:''?></td>
     
    </tr>
        <tr>
        <td><b>Malaria</b></td>
        <td><?=isset($maid['maid_malaria'])?$maid['maid_malaria']:''?></td>
      
    </tr>
        <tr>
        <td><b>Other Disease</b></td>
        <td><?=isset($maid['maid_other'])?$maid['maid_other']:''?></td>
       
    </tr>
        <tr>
        <td> <b>Dietary restriction</b></td>
        <td><?=isset($maid['maid_dietary_res'])?$maid['maid_dietary_res']:''?></td>
     
    </tr>
        <tr>
        <td>  <b>No beef</b></td>
        <td><?=isset($maid['maid_no_beef'])?$maid['maid_no_beef']:''?></td>
        
    </tr>
        <tr>
        <td><b>Preference for rest day: </b></td>
        <td><?=isset($maid['maid_rest'])?$maid['maid_rest']:''?></td>
      
    </tr>



</table>
  
</div>

<div style="width: 50%; float: left;">
      
<table>

    <tr>
      
        <td><b>Mental illness</b></td>
        <td><?=isset($maid['maid_mental'])?$maid['maid_mental']:''?></td>
    </tr>

    <tr>
       
        <td><b>Asthama</b></td>
        <td><?=isset($maid['maid_asthma'])?$maid['maid_asthma']:''?></td>
    </tr>
    
        <tr>
        
        <td> <b>Hypertension</b></td>
        <td><?=isset($maid['maid_hypertension'])?$maid['maid_hypertension']:''?></td>
    </tr>
        <tr>
        
        <td><b>Heart disease</b></td>
        <td><?=isset($maid['maid_heart_disease'])?$maid['maid_heart_disease']:''?></td>
    </tr>
        <tr>
       
        <td><b>Opearation</b></td>
        <td><?=isset($maid['maid_operation'])?$maid['maid_operation']:''?></td>
    </tr>
        <tr>
        
        <td><b>Physical disability</b></td>
        <td><?=isset($maid['maid_physical_d'])?$maid['maid_physical_d']:''?></td>
    </tr>
        <tr>
        
        <td><b>No pork</b></td>
        <td><?=isset($maid['maid_no_pork'])?$maid['maid_no_pork']:''?></td>
    </tr>
        <tr>
        
        <td><b>Handling other food</b></td>
        <td><?=isset($maid['maid_handling_others'])?$maid['maid_handling_others']:''?></td>
    </tr>
        <tr>
        
        <td><b>Other remarks</b></td>
        <td><?=isset($maid['maid_remarks'])?$maid['maid_remarks']:''?></td>
    </tr>



</table>
</div>




</div>

<br>

<!-- ======================================================================== -->

<div style="width: 100%; padding: 0;  display: table; content: '' ;">



<h3 >(C) Skill of FDW </h3>




<div style="width: 100%; float: left;">


    <table>

                        <tr>
                            <td>
                                <b>Based on FDW's declaration, no evaluation/observation <br> by Singapore EA or overseas training centre/EA</b>
                           </td> 
                           <td>
                                <?=isset($maid['maid_FDW_dec'])?$maid['maid_FDW_dec']:''?>
                           </td>
                        </tr>

                        <tr>
                            <td>
                                <b>Interviewed by Singapore EA</b>
                           </td> 
                           <td>
                                <?=isset($maid['maid_interview_sg'])?$maid['maid_interview_sg']:''?>
                           </td>
                        </tr>

                        <tr>
                            <td>
                                <b>Interviewed via telephone/teleconference</b>
                           </td> 
                           <td>
                                <?=isset($maid['maid_int_tel_sg'])?$maid['maid_int_tel_sg']:''?>
                           </td>
                        </tr>

                        <tr>
                            <td>
                                <b>Interviewed via videoconference</b>
                           </td> 
                           <td>
                                <?=isset($maid['maid_int_vid_sg'])?$maid['maid_int_vid_sg']:''?>
                           </td>
                        </tr>

                        <tr>
                            <td>
                                <b>Interviewed in person</b>
                           </td> 
                           <td>
                                <?=isset($maid['maid_int_person_sg'])?$maid['maid_int_person_sg']:''?>
                           </td>
                        </tr>

                        <tr>
                            <td>
                                <b>Interviewed in person and also made observation <br> of FDW in the areas of work listed in table</b>
                           </td> 
                           <td>
                                <?=isset($maid['maid_int_observed_sg'])?$maid['maid_int_observed_sg']:''?>
                           </td>
                        </tr>

                        <tr>
                            <td>
                                <b>Interviewed by overseas training centre/EA</b>
                           </td> 
                           <td>
                                <?=isset($maid['maid_interview_foreign'])?$maid['maid_interview_foreign']:''?>
                           </td>
                        </tr>

                         <tr>
                            <td>
                                <b>name of foreign training centre/EA</b>
                           </td> 
                           <td>
                                <?=isset($maid['maid_foreigncenter_name'])?$maid['maid_foreigncenter_name']:''?>
                           </td>
                        </tr>

                        <tr>
                            <td>
                                <b>State if the third party is certified (e.g. ISO9001) </b>
                           </td> 
                           <td>
                                <?isset($maid['maid_foreign_certified'])?$maid['maid_foreign_certified']:''?>
                           </td>
                        </tr>

                        <tr>
                            <td>
                                <b>Interviewed via telephone/teleconference (Foreign)</b>
                           </td> 
                           <td>
                                <?=isset($maid['maid_int_tel_foreign'])?$maid['maid_int_tel_foreign']:''?>
                           </td>
                        </tr>

                        <tr>
                            <td>
                                <b>Interviewed via videoconference (Foreign)</b>
                           </td> 
                           <td>
                                <?=isset($maid['maid_int_vid_foreign'])?$maid['maid_int_vid_foreign']:''?>
                           </td>
                        </tr>

                        <tr>
                            <td>
                                <b>Interviewed in person (Foreign) </b>
                           </td> 
                           <td>
                                <?=isset($maid['maid_int_person_foreign'])?$maid['maid_int_person_foreign']:''?>
                           </td>
                        </tr>

                        <tr>
                            <td>
                                <b>Interviewed in person and also made observation of FDW <br> in the areas of work listed in table (Foreign)</b>
                           </td> 
                           <td>
                                <?=isset($maid['maid_int_observed_foreign'])?$maid['maid_int_observed_foreign']:''?>
                           </td>
                        </tr>


                        

    </table>



  
</div>


</div>


<br>


<!-- =================================================================================== -->

<div style="width: 100%; padding: 0;  display: table; content: '' ;">



<h3 >(C1) </h3>




<div style="width: 100%; float: left;">


    <table>

                 
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

                        

    </table>



  
</div>



</div>

<br>
<br>
<br>

<!-- =================================================================================== -->

<div style="width: 100%; padding: 0;  display: table; content: '' ;">



<h3 >(C2) </h3>




<div style="width: 100%; float: left;">


    <table>

         
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
          
                     

                        

    </table>



  
</div>



</div>

<br>
<br>
<br>

<!-- =================================================================================== -->


<div style="width: 100%; padding: 0;  display: table; content: '' ;">



<h3 >(D) EMPLOYMENT HISTORY OF THE FDW </h3>




<div style="width: 100%; float: left;">


    <table>

               <tr>
                    <td>
                        <b>First employment history beginning date</b>
                   </td> 
                   <td>
                        <?=isset($maid['maid_his_frm_1'])?$maid['maid_his_frm_1']:''?>
                   </td>
                </tr>

                <tr>
                    <td>
                        <b>First employment history end date</b>
                   </td> 
                   <td>
                        <?=isset($maid['maid_his_to_1'])?$maid['maid_his_to_1']:''?>
                   </td>
                </tr>

                <tr>
                    <td>
                        <b>First employment history country</b>
                   </td> 
                   <td>
                        <?=isset($maid['maid_his_country_1'])?$maid['maid_his_country_1']:''?>
                   </td>
                </tr>

                <tr>
                    <td>
                        <b>First employment history</b>
                   </td> 
                   <td>
                        <?=isset($maid['maid_his_emp_1'])?$maid['maid_his_emp_1']:''?>
                   </td>
                </tr>

                <tr>
                    <td>
                        <b>First employment history duties</b>
                   </td> 
                   <td>
                        <?=isset($maid['maid_his_work_1'])?$maid['maid_his_work_1']:''?>
                   </td>
                </tr>

                <tr>
                    <td>
                        <b>First employment history remarks</b>
                   </td> 
                   <td>
                        <?=isset($maid['maid_his_rem_1'])?$maid['maid_his_rem_1']:''?>
                   </td>
                </tr>

               <tr>
                    <td>
                        <b>Second employment history beginning date</b>
                   </td> 
                   <td>
                        <?=isset($maid['maid_his_frm_2'])?$maid['maid_his_frm_2']:''?>
                   </td>
                </tr>

                <tr>
                    <td>
                        <b>Second employment history end date</b>
                   </td> 
                   <td>
                        <?=isset($maid['maid_his_to_2'])?$maid['maid_his_to_2']:''?>
                   </td>
                </tr>

                <tr>
                    <td>
                        <b>Second employment history country</b>
                   </td> 
                   <td>
                        <?=isset($maid['maid_his_country_2'])?$maid['maid_his_country_2']:''?>
                   </td>
                </tr>

               <br>
               <br>

                     
                        

    </table>



  
</div>



</div>



<!-- =================================================================================== -->






<div style="width: 100%; padding: 0;  display: table; content: '' ;">


<div style="width: 100%; float: left;">

<br>
<br>

<br>

    <table>
             <tr>
                    <td>
                        <b>Second employment history </b>
                   </td> 
                   <td>
                        <?=isset($maid['maid_his_emp_2'])?$maid['maid_his_emp_2']:''?>
                   </td>
                </tr>             
                        



             <tr>
                    <td>
                        <b>Second employment history duties</b>
                   </td> 
                   <td>
                        <?=isset($maid['maid_his_work2'])?$maid['maid_his_work2']:''?>
                   </td>
                </tr>

                <tr>
                    <td>
                        <b>Second employment history remarks</b>
                   </td> 
                   <td>
                        <?=isset($maid['maid_his_rem_2'])?$maid['maid_his_rem_2']:''?>
                   </td>
                </tr>
              


                <tr>
                    <td>
                        <b>Previous working experience in Singapore</b>
                   </td> 
                   <td>
                        <?=isset($maid['maid_prev_sg'])?$maid['maid_prev_sg']:''?>
                   </td>
                </tr>

                <tr>
                    <td>
                        <b>Feedback from first employer</b>
                   </td> 
                   <td>
                        <?=isset($maid['maid_feedback1'])?$maid['maid_feedback1']:''?>
                   </td>
                </tr>

                <tr>
                    <td>
                        <b>Feedback from second employer</b>
                   </td> 
                   <td>
                        <?=isset($maid['maid_feedback2'])?$maid['maid_feedback2']:''?>
                   </td>
                </tr> 

                

                <tr>
                    <td>
                        <b>FDW is not available for interview</b>
                   </td> 
                   <td>
                        <?=isset($maid['maid_no_interview'])?$maid['maid_no_interview']:''?>
                   </td>
                </tr> 

                <tr>
                    <td>
                        <b>FDW can be interviewed by phone</b>
                   </td> 
                   <td>
                        <?=isset($maid['maid_interview_phone'])?$maid['maid_interview_phone']:''?>
                   </td>
                </tr> 

                <tr>
                    <td>
                        <b>FDW can be interviewed in person</b>
                   </td> 
                   <td>
                        <?=isset($maid['maid_interview_video'])?$maid['maid_interview_video']:''?>
                   </td>
                </tr> 

                <tr>
                    <td>
                        <b>Feedback from second employer</b>
                   </td> 
                   <td>
                        <?=isset($maid['maid_interview_person'])?$maid['maid_interview_person']:''?>
                   </td>
                </tr>                     
                        

    </table>



  
</div>



</div>

<!-- ============================================================================================================================= -->

<br>
<br>
<br>

<p style="border-top: 1px solid; width: 300px; text-align: center;">FDW Name and Signature</p>
<p>Date: </p>
<br>
<br>

<p style="border-top: 1px solid; width: 300px; text-align: center;">EA Personnel Name and Registration Number </p>
<p>Date: </p>
 
<br>
<br>
<p> I have gone through the biodata of this FDW and confirm that I would like to employ her </p>

 <br>
 <br>


<p style="border-top: 1px solid; width: 300px; text-align: center;"> Employer Name and NRIC No. </p>
<p> Date:</p>
<br>

<p> ***************</p>
<p> IMPORTANT NOTES FOR EMPLOYERS WHEN USING THE SERVICES OF AN EA</p>

<p> Do consider asking for an FDW who is able to communicate in a language you require, and interview her (in person/phone/videoconference) to ensure that she can communicate adequately.
Do consider requesting for an FDW who has a proven ability to perform the chores you require, for example, performing household chores (especially if she is required to hang laundry from a high-rise unit), cooking and caring for young children or the elderly.
Do work together with the EA to ensure that a suitable FDW is matched to you according to your needs and requirements.
You may wish to pay special attention to your prospective FDW's employment history and feedback from the FDW's previous employer(s) before employing her.</p>
