<script type="text/javascript">
    $(document).ready(function(){
        
 $('.datepicker').datepicker({
    format: 'yyyy-mm-dd'
 });

        var oc_val =  $('#occupation').find(":selected").val(); 
          if(oc_val == "other") {
                 $('#occupation_others').html('<br><div class="form-group"><input class="form-control input-sm" name="occupation_other" value="<?= (isset($customer['customer_occupation_other'])?$customer['customer_occupation_other']:'') ?>" placeholder="Other Occupation"></div></div>');
          }


         $('#occupation').change(function(){
            var selected =  $(this).find(":selected").val(); 
            if(selected == "other"){
                $('#occupation_others').html('<br><div class="form-group"><input class="form-control input-sm" name="occupation_other" value="<?= (isset($customer['customer_occupation_other'])?$customer['customer_occupation_other']:'') ?>" placeholder="Other Occupation"></div></div>');
            }else{

                  $('#occupation_others').html('');
            }
         });

         var nat_val =  $('#nationality').find(":selected").val(); 
          if(nat_val == "other") {
                $('#nationality_others').html('<br><div class="form-group"><input class="form-control input-sm" name="nationality_other" value="<?= (isset($customer['customer_nationality_other'])?$customer['customer_nationality_other']:'') ?>" placeholder="Other Nationality"></div></div>');
          }


         $('#nationality').change(function(){
            var selected =  $(this).find(":selected").val(); 
            if(selected == "other"){
                $('#nationality_others').html('<br><div class="form-group"><input class="form-control input-sm" name="nationality_other" value="<?= (isset($customer['customer_nationality_other'])?$customer['customer_nationality_other']:'') ?>" placeholder="Other Nationality"></div></div>');
            }else{

                  $('#nationality_others').html('');
            }
         });


        var res_val =  $('#type_of_residence').find(":selected").val(); 
          if(res_val == "other") {
                 $('#type_of_residence_others').html('<br><div class="form-group"><input class="form-control input-sm" name="type_of_residence_other" value="<?= (isset($customer['customer_residence_other'])?$customer['customer_residence_other']:'') ?>" placeholder="Other Residence"></div></div>');
          }



        $('#type_of_residence').change(function(){
            var selected =  $(this).find(":selected").val(); 
            if(selected == "other"){
                $('#type_of_residence_others').html('<br><div class="form-group"><input class="form-control input-sm" name="type_of_residence_other" value="<?= (isset($customer['customer_residence_other'])?$customer['customer_residence_other']:'') ?>" placeholder="Other Residence"></div></div>');
            }else{

                  $('#type_of_residence_others').html('');
            }
         });


         var spo_nat_val =  $('#spouse_nationality').find(":selected").val(); 
          if(spo_nat_val == "other") {
                $('#spouse_nationality_others').html('<br><div class="form-group"><input class="form-control input-sm" name="spouse_nationality_other" value="<?= (isset($customer['spouse_nationality_other'])?$customer['spouse_nationality_other']:'') ?>" placeholder="Other Nationality"></div></div>');
          }


         $('#spouse_nationality').change(function(){
            var selected =  $(this).find(":selected").val(); 
            if(selected == "other"){
                $('#spouse_nationality_others').html('<br><div class="form-group"><input class="form-control input-sm" name="spouse_nationality_other" value="<?= (isset($customer['spouse_nationality_other'])?$customer['spouse_nationality_other']:'') ?>" placeholder="Other Nationality"></div></div>');
            }else{

                  $('#spouse_nationality_others').html('');
            }
         });


        var spo_oc_val =  $('#spouse_occupation').find(":selected").val(); 
          if(spo_oc_val == "other") {
                 $('#spouse_occupation_others').html('<br><div class="form-group"><input class="form-control input-sm" name="spouse_occupation_other" value="<?= (isset($customer['spouse_occupation_other'])?$customer['spouse_occupation_other']:'') ?>" placeholder="Other Occupation"></div></div>');
          }


         $('#spouse_occupation').change(function(){
            var selected =  $(this).find(":selected").val(); 

            if(selected == "other"){
                $('#spouse_occupation_others').html('<br><div class="form-group"><input class="form-control input-sm" name="spouse_occupation_other" value="<?= (isset($customer['spouse_occupation_other'])?$customer['spouse_occupation_other']:'') ?>" placeholder="Other Occupation"></div></div>');
            }else{

                  $('#spouse_occupation_others').html('');
            }
         });

        
    });
</script>


<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
          <li><a href="<?=base_url()?>dashboard"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a></li>
          <li><a href="<?=base_url()?>customer_maid">Employer</a></li>
          <li class="active"><?=$action=='add'?'New':'Edit'?> Employer</li>
            <div class="pull-right">
                <div class="btn-group">
                    <a class="btn btn-default btn-xs" href="<?=base_url()?>customer_maid"><i class="fa fa-arrow-circle-o-left"></i> Back</a>
                </div>
            </div>
        </ol>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">

                <div class="row">
                    <?php if(validation_errors()) { ?>
                    <div class="col-lg-12">
                        <div class="alert alert-danger">
                            <strong><?= validation_errors();?></strong>
                        </div>
                    </div>
                    <?php } ?>
                </div>
        <div class="panel panel-primary">
            <div class="panel-heading">
           <?=$action=='add'?'New':'Edit'?> Customer
            </div>
            <div class="panel-body">
            <form role="form" method="post" data-toggle="validator" >  
            
            <div class="panel panel-default">
                <div class="panel-heading">
                    Customer Info
                </div>
                <div class="panel-body">
                    <div class="row">

                             <div class="col-lg-6"> <!-- =================================  -->
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label>Name</label></div>
                                    <div class="col-lg-6 -field-block">
                                    <div class="help-block with-errors"></div>
                                        <input data-error="This field is required"  class="form-control input-sm" name="customer_name" value="<?=isset($_POST['customer_name'])?$_POST['customer_name']:(isset($customer['customer_name'])?$customer['customer_name']:'')?>" required>
                                
                                    </div>
                                     
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label>Date of Birth</label></div>
                                        <div class="input-group date col-lg-6" data-provide="datepickers"> 
                                            <input type="text" class="form-control input-sm datepicker" name="customer_dob" id="customer_dob" value="<?= (isset($customer['customer_dob'])?$customer['customer_dob']:'') ?>" style="margin-left: 5%; width: 95%;">
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar" ></span>
                                        </div>
                                     </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label>Education</label></div>
                                    <div class="col-lg-6 ">
                                        <input class="form-control input-sm" name="customer_education" value="<?= (isset($customer['customer_education'])?$customer['customer_education']:'') ?>" >
                                
                                    </div>
                            </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label>Email</label></div>
                                    <div class="col-lg-6">
                                         <div class="help-block with-errors"></div>
                                    <input type="email" data-error="Email address is invalid format" class="form-control input-sm" name="customer_email" value="<?=isset($_POST['customer_email'])?$_POST['customer_email']:(isset($customer['customer_email'])?$customer['customer_email']:'')?>" ></div>
                                </div>
                                
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label>Telephone No.</label></div>
                                    <div class="col-lg-6"><input class="form-control input-sm" name="customer_tel" value="<?=isset($_POST['customer_tel'])?$_POST['customer_tel']:(isset($customer['customer_tel'])?$customer['customer_tel']:'')?>"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label>Cp No.</label></div>
                                    <div class="col-lg-6"><input class="form-control input-sm"   name="customer_cp" value="<?=isset($_POST['customer_cp'])?$_POST['customer_cp']:(isset($customer['customer_cp'])?$customer['customer_cp']:'')?>"></div>
                                </div>
                            </div>
                    

                             <div class="form-group">
                                <div class="row">
                                         <div class="col-lg-4"><label>Marital Status</label></div>
                                         <div class="col-lg-6"><select name="customer_marital_status" class="form-control input-sm" id="customer_marital_status" >
                                                                    <option value="">- Please Select Marital Status -</option>
                                                                    <option value="single" <?= (isset($customer['customer_marital_status'])) ? ($customer['customer_marital_status'] == "single") ? "selected" : "" : "" ?>> Single </option>

                                                                    <option value="married" <?= (isset($customer['customer_marital_status'])) ? ($customer['customer_marital_status'] == "married") ? "selected" : "" : "" ?>> Married </option>

                                                                    <option value="divorced" <?= (isset($customer['customer_marital_status'])) ? ($customer['customer_marital_status'] == "divorced") ? "selected" : "" : "" ?>> Divorced </option>

                                                                    <option value="seperated" <?= (isset($customer['customer_marital_status'])) ? ($customer['customer_marital_status'] == "seperated") ? "selected" : "" : "" ?>> Seperated </option>

                                                                    <option value="widowed" <?= (isset($customer['customer_marital_status'])) ? ($customer['customer_marital_status'] == "widowed") ? "selected" : "" : "" ?>> Widowed </option> 

                                                               </select>
                                                          
                                        </div>
                                </div> 
                            </div>

                             <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label>Occupation</label></div>
                                    <div class="col-lg-6">
                                        <select name="occupation" class="form-control input-sm" id="occupation" >
                                            <option value="">- Please Select Occupation-</option>
                                            <option value="Legislator / Senior Official & Manager" <?= (isset($customer['customer_occupation'])) ? ($customer['customer_occupation'] == "Legislator / Senior Official & Manager") ? "selected" : "" : "" ?>> Legislator / Senior Official & Manager </option>

                                            <option value="Technician & Associate Professional" <?= (isset($customer['customer_occupation'])) ? ($customer['customer_occupation'] == "Technician & Associate Professional") ? "selected" : "" : "" ?>> Technician & Associate Professional </option>

                                            <option value="Service Worker / Shop & Market Sales Worker" <?= (isset($customer['customer_occupation'])) ? ($customer['customer_occupation'] == "Service Worker / Shop & Market Sales Worker") ? "selected" : "" : "" ?>>Service Worker / Shop & Market Sales Worker</option>

                                            <option value="other" <?= (isset($customer['customer_occupation'])) ? ($customer['customer_occupation'] == "other") ? "selected" : "" : "" ?>> Other </option>
                                                                                                                            
                                        </select>
                                         <div id="occupation_others"></div>    
                                    </div>
                                </div>
                            </div>

                             <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label>Company Name</label></div>
                                    <div class="col-lg-6"><input class="form-control input-sm" name="company_name" value="<?= (isset($customer['customer_companyname'])?$customer['customer_companyname']:'') ?>"></div>
                                </div>
                            </div> 
              
    
                        </div>
                     <div class="col-lg-6">    <!-- =================================  -->
                         
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label>Postal Code</label></div>
                                    <div class="col-lg-6"><input class="form-control input-sm" name="customer_postal" value="<?=isset($_POST['customer_postal'])?$_POST['customer_postal']:(isset($customer['customer_postal'])?$customer['customer_postal']:'')?>"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                                    <div class="col-lg-4"><label>Branch</label></div>
                                         <div class="col-lg-6"><select name="branch_id" class="form-control input-sm" id="branch" >
                                                            <option value="">- Please Select Branch -</option>
                                                            <?php if ($branches!=''): ?>
                                                                  <?php foreach ($branches as $branch): ?>
                                                                    <option value="<?=$branch['branch_id']?>" <?=isset($customer['branch_id'] ) ? ($customer['branch_id'] == $branch['branch_id']) ? 'selected' :'' : '' ?> ><?=$branch['branch_name']?></option>
                                                                    <?php endforeach ?>
                                                            <?php endif ?>
                                                        </select>
                                        </div>
                                </div> 
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label>Religion</label></div>
                                    <div class="col-lg-6"><input class="form-control input-sm" name="customer_religion" value="<?= (isset($customer['customer_religion'])?$customer['customer_religion']:'') ?>"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label>Fax</label></div>
                                    <div class="col-lg-6"><input class="form-control input-sm" name="customer_fax" value="<?=isset($_POST['customer_fax'])?$_POST['customer_fax']:(isset($customer['customer_fax'])?$customer['customer_fax']:'')?>"></div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label>Nationality</label></div>
                                    <div class="col-lg-6">
                                        <select name="nationality" class="form-control input-sm" id="nationality" >
                                                <option value="">- Please Select Nationality-</option>
                                                <option value="singaporean" <?= (isset($customer['customer_nationality'])) ? ($customer['customer_nationality'] == "singaporean") ? "selected" : "" : "" ?>> Singaporean </option>

                                                <option value="singaporean pr" <?= (isset($customer['customer_nationality'])) ? ($customer['customer_nationality'] == "singaporean pr") ? "selected" : "" : "" ?>> Singaporean PR </option>

                                                <option value="employment pass holder" <?= (isset($customer['customer_nationality'])) ? ($customer['customer_nationality'] == "employment pass holder") ? "selected" : "" : "" ?>>Employment Pass Holder</option>

                                                <option value="other" <?= (isset($customer['customer_nationality'])) ? ($customer['customer_nationality'] == "other") ? "selected" : "" : "" ?>> Other </option>
                                                                                                                            
                                        </select>
                                         <div id="nationality_others"></div>
                                    </div>
                                </div>
                            </div>

               
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label>Address</label></div>
                                    <div class="col-lg-6"><textarea class="form-control input-sm" rows="5" name="customer_address"><?=isset($_POST['customer_address'])?$_POST['customer_address']:(isset($customer['customer_address'])?$customer['customer_address']:'')?></textarea> </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label>Type Of Residence</label></div>
                                    <div class="col-lg-6">
                                        <select name="type_of_residence" class="form-control input-sm" id="type_of_residence" >
                                                 <option value="">- Please Select Type Of Residence-</option>

                                                <option value="Bungalow" <?= (isset($customer['customer_residence'])) ? ($customer['customer_residence'] == "Bungalow") ? "selected" : "" : "" ?>>Bungalow</option>

                                                <option value="Semi-Detached House" <?= (isset($customer['customer_residence'])) ? ($customer['customer_residence'] == "Semi-Detached House") ? "selected" : "" : "" ?>>Semi-Detached House</option>

                                                <option value="Terrace House" <?= (isset($customer['customer_residence'])) ? ($customer['customer_residence'] == "Terrace House") ? "selected" : "" : "" ?>>Terrace House</option>

                                                <option value="Shop House" <?= (isset($customer['customer_residence'])) ? ($customer['customer_residence'] == "Shop House") ? "selected" : "" : "" ?>>Shop House</option>

                                                <option value="HDB (3RM)" <?= (isset($customer['customer_residence'])) ? ($customer['customer_residence'] == "HDB (3RM)") ? "selected" : "" : "" ?>>HDB (3RM)</option>

                                                <option value="HDB (4RM)" <?= (isset($customer['customer_residence'])) ? ($customer['customer_residence'] == "HDB (4RM)") ? "selected" : "" : "" ?>>HDB (4RM)</option>

                                                <option value="HDB (5RM)" <?= (isset($customer['customer_residence'])) ? ($customer['customer_residence'] == "HDB (5RM)") ? "selected" : "" : "" ?>>HDB (5RM)</option>

                                                <option value="HUDC / EXECUTIVE" <?= (isset($customer['customer_residence'])) ? ($customer['customer_residence'] == "HUDC / EXECUTIVE") ? "selected" : "" : "" ?>>HUDC / EXECUTIVE</option>

                                                <option value="HDB (others)" <?= (isset($customer['customer_residence'])) ? ($customer['customer_residence'] == "HDB (others)") ? "selected" : "" : "" ?>>HDB (others)</option>

                                                <option value="Private Flat / APT / Condo" <?= (isset($customer['customer_residence'])) ? ($customer['customer_residence'] == "Private Flat / APT / Condo") ? "selected" : "" : "" ?>>Private Flat / APT / Condo</option>

                                                <option value="other" <?= (isset($customer['customer_residence'])) ? ($customer['customer_residence'] == "other") ? "selected" : "" : "" ?>>Other</option>                                                                                                                     
                                        </select>
                                         <div id="type_of_residence_others"></div>
                                    </div>
                                </div>
                            </div> 


                        </div>
                        
                    </div>
                </div>
         
            </div>

    <div class="panel panel-default">
        <div class="panel-heading">
                    Spouse Info
        </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label>Spouse's Name (AS IN NRIC)</label></div>
                                    <div class="col-lg-6"><input class="form-control input-sm" name="spouse_name" value="<?= (isset($customer['spouse_name'])?$customer['spouse_name']:'') ?>"></div>
                                </div>
                            </div>   


                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label>Spouse's Date of Birth</label></div>
                                        <div class="input-group date col-lg-6" data-provide="datepickers">
                                            <input type="text" class="form-control input-sm datepicker" name="spouse_dob" id="spouse_dob" value="<?= (isset($customer['spouse_dob'])?$customer['spouse_dob']:'') ?>" style="margin-left: 5%; width: 95%;">
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar" ></span>
                                        </div>
                                     </div>
                                </div>
                            </div>


                           <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label>Spouse's Occupation</label></div>
                                    <div class="col-lg-6">
                                        <select name="spouse_occupation" class="form-control input-sm" id="spouse_occupation" >
                                            <option value="">- Please Select Occupation-</option>
                                            <option value="Legislator / Senior Official & Manager" <?= (isset($customer['spouse_occupation'])) ? ($customer['spouse_occupation'] == "Legislator / Senior Official & Manager") ? "selected" : "" : "" ?>> Legislator / Senior Official & Manager </option>

                                            <option value="Technician & Associate Professional" <?= (isset($customer['spouse_occupation'])) ? ($customer['spouse_occupation'] == "Technician & Associate Professional") ? "selected" : "" : "" ?>> Technician & Associate Professional </option>

                                            <option value="Service Worker / Shop & Market Sales Worker" <?= (isset($customer['spouse_occupation'])) ? ($customer['spouse_occupation'] == "Service Worker / Shop & Market Sales Worker") ? "selected" : "" : "" ?>>Service Worker / Shop & Market Sales Worker</option>

                                            <option value="other" <?= (isset($customer['spouse_occupation'])) ? ($customer['spouse_occupation'] == "other") ? "selected" : "" : "" ?>> Other </option>
                                                                                                                            
                                        </select>
                                        <div id="spouse_occupation_others"></div>
                                    </div>
                                </div>
                            </div>


                        </div>

                        <div class="col-lg-6">

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label>I/C No.</label></div>
                                    <div class="col-lg-6"><input class="form-control input-sm" name="spouse_ic_no" value="<?= (isset($customer['spouse_ic_no'])?$customer['spouse_ic_no']:'') ?>"></div>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label>Spouse's Nationality</label></div>
                                    <div class="col-lg-6">
                                        <select name="spouse_nationality" class="form-control input-sm" id="spouse_nationality" >
                                                <option value="">- Please Select Gender-</option>
                                                <option value="singaporean" <?= (isset($customer['spouse_nationality'])) ? ($customer['spouse_nationality'] == "singaporean") ? "selected" : "" : "" ?>> Singaporean </option>

                                                <option value="singaporean pr" <?= (isset($customer['spouse_nationality'])) ? ($customer['spouse_nationality'] == "singaporean pr") ? "selected" : "" : "" ?>> Singaporean PR </option>

                                                <option value="employment pass holder" <?= (isset($customer['spouse_nationality'])) ? ($customer['spouse_nationality'] == "employment pass holder") ? "selected" : "" : "" ?>>Employment Pass Holder</option>

                                                <option value="other" <?= (isset($customer['spouse_nationality'])) ? ($customer['spouse_nationality'] == "other") ? "selected" : "" : "" ?>> Other </option>
                                                                                                                            
                                        </select>
                                         <div id="spouse_nationality_others"></div>
                                    </div>
                                </div>
                            </div> 


                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label>Spouse's Company Name</label></div>
                                    <div class="col-lg-6"><input class="form-control input-sm" name="spouse_company_name" value="<?= (isset($customer['spouse_company_name'])?$customer['spouse_company_name']:'') ?>"></div>
                                </div>
                            </div> 


                        </div>
                        
                    </div>
                </div>
    </div>


    <div class="panel panel-default">
        <div class="panel-heading">
                   Particular Family Members
        </div>
                <div class="panel-body">

                <div class="row">
                      <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>BC/IC No.</th>
                                        <th>DOB</th>
                                        <th>Relationship</th>
                                        <th>Gender</th>                                       
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    for ($i=1; $i <=6; $i++) {     
                                ?>
                                    <tr>
                                        <td>
                                            <div class="form-group">  
                                                <input class="form-control input-sm" name="mem_name<?=$i?>" value="<?= (isset($customer['mem_name'.$i])?$customer['mem_name'.$i]:'') ?>" >
                                            </div> 
                                        </td>
                                        <td>
                                           <div class="form-group">                                               
                                                <input class="form-control input-sm" name="mem_ic_no<?=$i?>" value="<?= (isset($customer['mem_ic_no'.$i])?$customer['mem_ic_no'.$i]:'') ?>">                                               
                                            </div> 
                                        </td>
                                        <td>
                                            <div class="form-group">                                               
                                                        <div class="input-group date col-lg-6" data-provide="datepickers" style="width: 100%;">
                                                            <input type="text" class="form-control input-sm datepicker" name="mem_dob<?=$i?>" id="mem_dob<?=$i?>" value="<?= (isset($customer['mem_dob'.$i])?$customer['mem_dob'.$i]:'') ?>">
                                                            <div class="input-group-addon">
                                                                <span class="glyphicon glyphicon-calendar" ></span>
                                                            </div>
                                                        </div>     
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">                                               
                                                    <input class="form-control input-sm" name="mem_rel<?=$i?>" value="<?= (isset($customer['mem_rel'.$i])?$customer['mem_rel'.$i]:'') ?>">                                               
                                            </div> 
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <select name="mem_gender<?=$i?>" class="form-control input-sm" id="mem_gender<?=$i?>" >
                                                            <option value="">- Please Select Gender-</option>

                                                            <option value="male"  <?= (isset($customer['mem_gender'.$i])) ? ($customer['mem_gender'.$i] == "male") ? "selected" : "" : "" ?>> Male </option>

                                                            <option value="female" <?= (isset($customer['mem_gender'.$i])) ? ($customer['mem_gender'.$i] == "female") ? "selected" : "" : "" ?>> Female </option>
                                                                      
                                                                                                                                
                                                </select>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?> 
                                </tbody>
                            </table>
                    
                </div>            
            </div>
    </div>            
</div>
    <div class="panel panel-default">
        <div class="panel-heading">
                   FDW Info
        </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">

                             <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label>Current Employer Name</label></div>
                                    <div class="col-lg-6">
                                        <input class="form-control input-sm" name="current_employer_name" value="<?= (isset($customer['current_employer_name'])?$customer['current_employer_name']:'') ?>"></div>
                                    </div>

                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label></label></div>
                                    <div class="col-lg-6"></div>
                                </div>

                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label>Employer Name (AS IN NRIC)</label></div>
                                    <div class="col-lg-6"><input class="form-control input-sm" name="employer_name" value="<?= (isset($customer['employer_name'])?$customer['employer_name']:'') ?>"></div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                     <div class="col-lg-4"><label>Employer Marital Status</label></div>
                                     <div class="col-lg-6"><select name="employer_marital_status" class="form-control input-sm" id="employer_marital_status" >
                                                                <option value="">- Please Select Marital Status -</option>
                                                                <option value="single" <?= (isset($customer['employer_marital_status'])) ? ($customer['employer_marital_status'] == "single") ? "selected" : "" : "" ?>> Single </option>

                                                                <option value="married" <?= (isset($customer['employer_marital_status'])) ? ($customer['employer_marital_status'] == "married") ? "selected" : "" : "" ?>> Married </option>

                                                                <option value="divorced" <?= (isset($customer['employer_marital_status'])) ? ($customer['employer_marital_status'] == "divorced") ? "selected" : "" : "" ?>> Divorced </option>

                                                                <option value="seperated" <?= (isset($customer['employer_marital_status'])) ? ($customer['employer_marital_status'] == "seperated") ? "selected" : "" : "" ?>> Seperated </option>

                                                                <option value="widowed" <?= (isset($customer['employer_marital_status'])) ? ($customer['employer_marital_status'] == "widowed") ? "selected" : "" : "" ?>> Widowed </option>                                                             
                                                           </select>
                                    </div>
                                </div>    
                            </div> 


                        </div>
                        <div class="col-lg-6">
                            
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label>W/P No.</label></div>
                                    <div class="col-lg-6"><input class="form-control input-sm" name="current_employer_wp_no" value="<?= (isset($customer['current_employer_wp_no'])?$customer['current_employer_wp_no']:'') ?>"></div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label>FIN No.</label></div>
                                    <div class="col-lg-6"><input class="form-control input-sm" name="current_employer_fin_no" value="<?= (isset($customer['current_employer_fin_no'])?$customer['current_employer_fin_no']:'') ?>"></div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label>I/C No.</label></div>
                                    <div class="col-lg-6"><input class="form-control input-sm" name="employer_ic_no" value="<?= (isset($customer['employer_ic_no'])?$customer['employer_ic_no']:'') ?>"></div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>   
    </div>      
        
        <div class="container">
            <div class="row">
                                    <div class="col-lg-10"></div>
                                    <div class="col-lg-2">
                                        <button type="submit" onclick="return confirm_submit()" class="btn btn-primary btn-md"><?=$action=='add'?'Create':'Update'?></button>
                                    </div>
                                </div>

        </div>
                                
          


            </form>  <!-- FORM /////////////////////////////////////// -->

            </div>                        
        </div>
    </div>
</div>        