<br>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
          <li><a href="<?=base_url()?>dashboard"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a></li>
          <li><a href="<?=base_url()?>maid">Maid</a></li>
          <li class="active"><?=$action=='add'?'New':'Edit'?> Maid</li>
            <div class="pull-right">
                <div class="btn-group">
                    <a class="btn btn-default btn-xs" href="<?=base_url()?>customer"><i class="fa fa-arrow-circle-o-left"></i> Back</a>
                </div>
            </div>
        </ol>
    </div>
</div>





<center>
    <div class="row">
                  <?php if(isset($msg) && $msg != '') { ?>
                    <div class="alert alert-danger"><?php echo $msg; ?></div>
                    <?php } ?>

                    <?php if(validation_errors()) { ?>
                    <div class="col-lg-12">
                        <div class="alert alert-danger">
                            <strong><?= validation_errors();?></strong>
                        </div>
                    </div>
                    <?php } ?>
     </div>
    <div class="row">
                 <form role="form" id="JackForm"  method="post" enctype = "multipart/form-data">
                    
<!--                       <img style="width: 250px; height: 300px;" src = "<?= (isset($maid['maid_img'])) ? base_url().$maid['maid_img'] : base_url().'public/maid_pictures/ID-0.jpg' ?>" name="maid_img" class="img-responsive">
                       
                                    <h5>.jpg files only *to be updated</h5>
                                    <input type="file" name="userfile" size="20"  />

                                    <br />                               
                                  
                                    <input type="hidden" name="maid_id" value="<?= (isset($maid['maid_id'])) ? $maid['maid_id'] :  $maxid + 1  ?>"> -->
                                  
          

    </div>
</center>
<br>






<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                 <p> <?=$action=='add'?'BIODATA OF FOREIGN DOMESTIC WORKER (FDW) Please ensure that you run through the information within the biodata as it is an important document to help you select a suitable FDW':'Maid Info'?> </p>
            </div>
            <div class="panel-body" style="position: relative;">

                <div style="position: absolute; top: 1%; right: 15%; z-index: 9999;">   

                            <img style="width: 250px; height: 300px;" src = "<?= (isset($maid['maid_img'])) ? base_url().$maid['maid_img'] : base_url().'public/maid_pictures/ID-0.jpg' ?>" name="maid_img" class="img-responsive">
                       
                                    <h5>.jpg files only *to be updated</h5>
                                    <input type="file" name="userfile" size="20"  />

                                    <br />                               
                                  
                                    <input type="hidden" name="maid_id" value="<?= (isset($maid['maid_id'])) ? $maid['maid_id'] :  $maxid + 1  ?>">
                                  
                    
                </div>
         
                <div class="row">
                   
                        <div class="col-lg-12"> <!-- F -->

                        <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2"><label>Supplier</label></div>
                                    <div class="col-lg-4">
                                        <select name="supplier_id" class="form-control input-sm" id="supplier" required>
                                           
                                            <?php if ($suppliers!=''): ?>
                                                <?php if($this->session->userdata('fcs_role_id') ==4){ ?>

                                                            
                                                        <option value="<?=$this->session->userdata('fcs_supplier_id')?>" selected>
                                                                <?php foreach ($suppliers as $supplier): ?> 
                                                                    <?= ($this->session->userdata('fcs_supplier_id') == $supplier['supplier_id']) ? ucwords($supplier['supplier_code']) : '' ?>
                                                                <?php endforeach ?>                                                         
                                                        </option>
                                                       
                                                <?php }else {?>
                                                         <option value="">- Please Select Supplier -</option>
                                                      <?php foreach ($suppliers as $supplier): ?>
                                                        <option value="<?=$supplier['supplier_id']?>" <?=isset($_POST['supplier_id'])&&$supplier['supplier_id']==$_POST['supplier_id']?'select':(isset($maid['supplier_id'])&&$maid['supplier_id']==$supplier['supplier_id']?'selected':'')?>><?=$supplier['supplier_code']?></option>
                                                        <?php endforeach ?>

                                                <?php } ?>
                                            <?php endif ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2"><label>Status</label></div>
                                    <div class="col-lg-4">
                                        <select name="status_id" class="form-control input-sm" id="status" required>
                                            <option value="">- Please Select Status-</option>
                                            <?php if ($statusx!=''): ?>
                                                  <?php foreach ($statusx as $status): ?>
                                                    <option value="<?=$status['status_id']?>" <?=isset($_POST['status_id'])&&$status['status_id']==$_POST['status_id']?'select':(isset($maid['status_id'])&&$maid['status_id']==$status['status_id']?'selected':'')?>><?=$status['status_name']?></option>
                                                    <?php endforeach ?>
                                            <?php endif ?>
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2"><label>Branch</label></div>
                                    <div class="col-lg-4">
                                        <select name="branch_id" class="form-control input-sm" id="branch" required>
                                            <option value="">- Please Select Branch-</option>
                                            <?php if ($branches!=''): ?>
                                                  <?php foreach ($branches as $branch): ?>
                                                    <option value="<?=$branch['branch_id']?>" <?=isset($_POST['branch_id'])&&$branch['branch_id']==$_POST['branch_id']?'select':(isset($maid['branch_id'])&&$maid['branch_id']==$branch['branch_id']?'selected':'')?>><?=$branch['branch_name']?></option>
                                                    <?php endforeach ?>
                                            <?php endif ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                          <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2"><label>Staff</label></div>
                                    <div class="col-lg-4">
                                        <select name="staff_id" class="form-control input-sm" id="staff" required>
                                            <option value="">- Please Select Staff-</option>
                                            <?php if ($staffx!=''): ?>
                                                  <?php foreach ($staffx as $staff): ?>
                                                    <option value="<?=$staff['staff_id']?>" <?=isset($_POST['staff_id'])&&$staff['staff_id']==$_POST['staff_id']?'select':(isset($maid['staff_id'])&&$maid['staff_id']==$staff['staff_id']?'selected':'')?>><?=$staff['staff_name']?></option>
                                                    <?php endforeach ?>
                                            <?php endif ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                  <div class="row">
                                    <div class="col-lg-2"><label>Employer</label></div>
                                    <div class="col-lg-4"><input class="form-control input-sm" name="maid_employer" value="<?=isset($_POST['maid_employer'])?$_POST['maid_employer']:(isset($maid['maid_employer'])?$maid['maid_employer']:'')?>"></div>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2"><label>Remarket/Hold/<br>Selected Date /</label></div>
                                        <div class="input-group date col-lg-4" data-provide="datepicker">
                                            <input type="text" name="maid_rhs_date" class="form-control" value="<?=isset($_POST['maid_rhs_date'])?$_POST['maid_rhs_date']:(isset($maid['maid_rhs_date'])?$maid['maid_rhs_date']:'')?>">
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar" ></span>
                                        </div>
                                     </div>
                                </div>
                            </div>

                        

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2"><label>Ref No</label></div>
                                    <div class="col-lg-4 -field-block">
                                        <input class="form-control input-sm" name="maid_ref_no" value="<?=isset($_POST['maid_ref_no'])?$_POST['maid_ref_no']:(isset($maid['maid_ref_no'])?$maid['maid_ref_no']:'')?>" >
                                       
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2"><label>Passport No.</label></div>
                                    <div class="col-lg-4"><input class="form-control input-sm" name="maid_passport" value="<?=isset($_POST['maid_passport'])?$_POST['maid_passport']:(isset($maid['maid_passport'])?$maid['maid_passport']:'')?>" ></div>
                                </div>
                            </div>

                             <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2"><label>21 days</label></div>
                                        <div class="input-group date col-lg-4" data-provide="datepicker">
                                            <input type="text" name="maid_21_days" class="form-control" value="<?=isset($_POST['maid_21_days'])?$_POST['maid_21_days']:(isset($maid['maid_21_days'])?$maid['maid_21_days']:'')?>" >
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </div>
                                     </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2"><label>21 days due</label></div>
                                        <div class="input-group date col-lg-4" data-provide="datepicker">
                                            <input type="text" name="maid_21_days_due" class="form-control" value="<?=isset($_POST['maid_21_days_due'])?$_POST['maid_21_days_due']:(isset($maid['maid_21_days_due'])?$maid['maid_21_days_due']:'')?>">
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </div>
                                     </div>
                                </div>
                            </div>

                             <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2"><label>Passport Arrived</label></div>
                                    <div class="col-lg-4"><input type="checkbox" name="arrived" value="1"> </div><br>
                                 </div>
                            </div>



                            <div class="form-group">
                                  <div class="row">
                                    <div class="col-lg-2"><label>Salary</label></div>
                                    <div class="col-lg-4"><input class="form-control input-sm" name="maid_salary" value="<?=isset($_POST['maid_salary'])?$_POST['maid_salary']:(isset($maid['maid_salary'])?$maid['maid_salary']:'')?>"></div>
                                </div>
                            </div>




                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2"><label>Arrival Date</label></div>
                                        <div class="input-group date col-lg-4" data-provide="datepicker">
                                            <input type="text" name="arrival_date" class="form-control" value="<?=isset($_POST['arrival_date'])?$_POST['arrival_date']:(isset($maid['arrival_date'])?$maid['arrival_date']:'')?>">
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar" ></span>
                                        </div>
                                     </div>
                                </div>
                            </div>





                            <div class="form-group">
                            <br>
                                <div class="row">
                                    <div class="col-lg-12"><h4><b>( A )PROFILE OF FDW </b></h4></div>
                              
                                </div>
                                <div class="row">
                                    <div class="col-lg-12"><h4><b>A1 Personal Information  <b></h4></div>
                              
                                </div>
                             <br>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2"><label>1. Name</label></div>
                                    <div class="col-lg-4"><input class="form-control input-sm" name="maid_name" value="<?=isset($_POST['maid_name'])?$_POST['maid_name']:(isset($maid['maid_name'])?$maid['maid_name']:'')?>" ></div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2"><label>2. Date of birth</label></div>
                                        <div class="input-group date col-lg-4" data-provide="datepicker">
                                            <input type="text" name="maid_bday" class="form-control" value="<?=isset($_POST['maid_bday'])?$_POST['maid_bday']:(isset($maid['maid_bday'])?$maid['maid_bday']:'')?>">
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </div>
                                     </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2"><label>Age:</label></div>
                                    <div class="col-lg-4"><input class="form-control input-sm" name="maid_age" value="<?=isset($_POST['maid_age'])?$_POST['maid_age']:(isset($maid['maid_age'])?$maid['maid_age']:'')?>" ></div>
                                </div>
                            </div>

                              
                            <div class="form-group">
                                  <div class="row">
                                    <div class="col-lg-2"><label>3. Place of birth</label></div>
                                    <div class="col-lg-4"><input class="form-control input-sm" name="maid_place_birth" value="<?=isset($_POST['maid_place_birth'])?$_POST['maid_place_birth']:(isset($maid['maid_place_birth'])?$maid['maid_place_birth']:'')?>" ></div>
                                </div>
                            </div>

                            <div class="form-group">
                                  <div class="row">
                                    <div class="col-lg-2"><label>4.a Height</label></div>
                                    <div class="col-lg-4"><input class="form-control input-sm" name="maid_height" value="<?=isset($_POST['maid_height'])?$_POST['maid_height']:(isset($maid['maid_height'])?$maid['maid_height']:'')?>" ></div>
                                </div>
                            </div>

                            <div class="form-group">
                                  <div class="row">
                                    <div class="col-lg-2"><label>4.b Weight</label></div>
                                    <div class="col-lg-4"><input class="form-control input-sm" name="maid_weight" value="<?=isset($_POST['maid_weight'])?$_POST['maid_weight']:(isset($maid['maid_weight'])?$maid['maid_weight']:'')?>" ></div>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2"><label>5. Nationality</label></div>
                                    <div class="col-lg-4">
                                        <select name="nationality_id" class="form-control input-sm" id="nationality" required>
                                            <option value="">- Please Select Nationality -</option>
                                            <?php if ($nationalities!=''): ?>
                                                  <?php foreach ($nationalities as $nationality): ?>
                                                    <option value="<?=$nationality['nationality_id']?>" <?=isset($_POST['nationality_id'])&&$nationality['nationality_id']==$_POST['nationality_id']?'select':(isset($maid['nationality_id'])&&$maid['nationality_id']==$nationality['nationality_id']?'selected':'')?>><?=$nationality['nationality_name']?></option>
                                                    <?php endforeach ?>
                                            <?php endif ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                  <div class="row">
                                    <div class="col-lg-2"><label>6. Residential address in home country</label></div>
                                    <div class="col-lg-4"><input class="form-control input-sm" name="maid_res_home" value="<?=isset($_POST['maid_res_home'])?$_POST['maid_res_home']:(isset($maid['maid_res_home'])?$maid['maid_res_home']:'')?>" ></div>
                                </div>
                            </div>

                            <div class="form-group">
                                  <div class="row">
                                    <div class="col-lg-2"><label>7. Name of port / airport to be repatriated to </label></div>
                                    <div class="col-lg-4"><input class="form-control input-sm" name="maid_port" value="<?=isset($_POST['maid_port'])?$_POST['maid_port']:(isset($maid['maid_port'])?$maid['maid_port']:'')?>" ></div>
                                </div>
                            </div>

                            <div class="form-group">
                                  <div class="row">
                                    <div class="col-lg-2"><label>8. Contact number in home country </label></div>
                                    <div class="col-lg-4"><input class="form-control input-sm" name="maid_contact_home" value="<?=isset($_POST['maid_contact_home'])?$_POST['maid_contact_home']:(isset($maid['maid_contact_home'])?$maid['maid_contact_home']:'')?>" ></div>
                                </div>
                            </div>


                            <div class="form-group">
                                  <div class="row">
                                    <div class="col-lg-2"><label>9. Religion </label></div>
                                    <div class="col-lg-4"><input class="form-control input-sm" name="maid_religion" value="<?=isset($_POST['maid_religion'])?$_POST['maid_religion']:(isset($maid['maid_religion'])?$maid['maid_religion']:'')?>" ></div>
                                </div>
                            </div>

                            <div class="form-group">
                                  <div class="row">
                                    <div class="col-lg-2"><label>10. Education Level </label></div>
                                    <div class="col-lg-4"><input class="form-control input-sm" name="maid_educ" value="<?=isset($_POST['maid_educ'])?$_POST['maid_educ']:(isset($maid['maid_educ'])?$maid['maid_educ']:'')?>" ></div>
                                </div>
                            </div>

                            <div class="form-group">
                                  <div class="row">
                                    <div class="col-lg-2"><label>11. Number of siblings </label></div>
                                    <div class="col-lg-4"><input class="form-control input-sm" name="maid_sibs" value="<?=isset($_POST['maid_sibs'])?$_POST['maid_sibs']:(isset($maid['maid_sibs'])?$maid['maid_sibs']:'')?>" ></div>
                                </div>
                            </div>

                            <div class="form-group">
                                  <div class="row">
                                    <div class="col-lg-2"><label>12. Marital status </label></div>
                                    <div class="col-lg-4"><input class="form-control input-sm" name="maid_mar_status" value="<?=isset($_POST['maid_mar_status'])?$_POST['maid_mar_status']:(isset($maid['maid_mar_status'])?$maid['maid_mar_status']:'')?>" ></div>
                                </div>
                            </div>

                            <div class="form-group">
                                  <div class="row">
                                    <div class="col-lg-2"><label>13. Number of children </label></div>
                                    <div class="col-lg-4"><input class="form-control input-sm" name="maid_children" value="<?=isset($_POST['maid_children'])?$_POST['maid_children']:(isset($maid['maid_children'])?$maid['maid_children']:'')?>" ></div>
                                </div>
                            </div>

                           <div class="form-group">
                                  <div class="row">
                                    <div class="col-lg-2"><label>-Age(s) of children (if any): </label></div>
                                    <div class="col-lg-4"><input class="form-control input-sm" name="maid_children_age" value="<?=isset($_POST['maid_children_age'])?$_POST['maid_children_age']:(isset($maid['maid_children_age'])?$maid['maid_children_age']:'')?>" ></div>
                                </div>
                            </div>

                            <div class="form-group">
                            <br>
                                <div class="row">
                                    <div class="col-lg-12"><h4><b>A2 Medical History/Dietary/ Restrictions  </b></h4></div>
                              
                                </div>
                             <br>
                            </div>

                            <div class="form-group">
                                  <div class="row">
                                    <div class="col-lg-2"><label>14. Allergies (if any): </label></div>
                                    <div class="col-lg-4"><input class="form-control input-sm" name="maid_allergies" value="<?=isset($_POST['maid_allergies'])?$_POST['maid_allergies']:(isset($maid['maid_allergies'])?$maid['maid_allergies']:'')?>" ></div>
                                </div>
                            </div>

                            <div class="form-group">
                            <br>
                                <div class="row">
                                    <div class="col-lg-12"><h4>15. Past and existing illnesses (including chronic ailments and illnesses requiring medication)  </h4></div>
                              
                                </div>
                           
                            </div>


                            <div class="form-group">
                                  <div class="row">

                                    <div class="col-lg-2"><label>i. Mental illness </label></div>
                  
                                    <div class="col-lg-4"> 
                                    <input type="radio" name="maid_mental" value="Yes"> Yes
                                    <input type="radio" name="maid_mental" value="No" checked> No
                              
                                </div>
                            </div>
                            <br>

                            <div class="form-group">
                                  <div class="row">
                                    <div class="col-lg-2"><label>ii. Epilepsy </label></div>
                  
                                    <div class="col-lg-4"> 
                                    <input type="radio" name="maid_epilepsy" value="Yes"> Yes
                                    <input type="radio" name="maid_epilepsy" value="No" checked> No
                              
                                </div>
                            </div>
                            <br>

                            <div class="form-group">
                                  <div class="row">
                                    <div class="col-lg-2"><label>iii. Asthma </label></div>
                  
                                    <div class="col-lg-4"> 
                                    <input type="radio" name="maid_asthma" value="Yes"> Yes
                                    <input type="radio" name="maid_asthma" value="No" checked> No
                              
                                </div>
                            </div>
                            <br>

                            <div class="form-group">
                                  <div class="row">
                                    <div class="col-lg-2"><label>iv. Diabetis </label></div>
                  
                                    <div class="col-lg-4"> 
                                    <input type="radio" name="maid_diabetis" value="Yes"> Yes
                                    <input type="radio" name="maid_diabetis" value="No" checked> No
                              
                                </div>
                            </div>
                            <br>

                            <div class="form-group">
                                  <div class="row">
                                    <div class="col-lg-2"><label>v. Hyper Tension </label></div>
                  
                                    <div class="col-lg-4"> 
                                    <input type="radio" name="maid_hypertension" value="Yes"> Yes
                                    <input type="radio" name="maid_hypertension" value="No" checked> No
                              
                                </div>
                            </div>
                            <br>

                            <div class="form-group">
                                  <div class="row">
                                    <div class="col-lg-2"><label>vi.Tuberculosis</label></div>
                  
                                    <div class="col-lg-4"> 
                                    <input type="radio" name="maid_tb" value="Yes"> Yes
                                    <input type="radio" name="maid_tb" value="No" checked> No
                              
                                </div>
                            </div>
                            <br>

                               <div class="form-group">
                                  <div class="row">
                                    <div class="col-lg-2"><label>vii. Heart Disease</label></div>
                  
                                    <div class="col-lg-4"> 
                                    <input type="radio" name="maid_heart_disease" value="Yes"> Yes
                                    <input type="radio" name="maid_heart_disease" value="No" checked> No
                              
                                </div>
                            </div>
                            <br>

                             <div class="form-group">
                                  <div class="row">
                                    <div class="col-lg-2"><label>viii. Malaria </label></div>
                  
                                    <div class="col-lg-4"> 
                                    <input type="radio" name="maid_malaria" value="Yes"> Yes
                                    <input type="radio" name="maid_malaria" value="No" checked> No
                              
                                </div>
                            </div>
                            <br>

                            <div class="form-group">
                                  <div class="row">
                                    <div class="col-lg-2"><label>ix. Operation </label></div>
                  
                                    <div class="col-lg-4"> 
                                    <input type="radio" name="maid_operation" value="Yes"> Yes
                                    <input type="radio" name="maid_operation" value="No" checked> No
                              
                                </div>
                            </div>
                            <br>

                             <div class="form-group">
                                  <div class="row">
                                    <div class="col-lg-2"><label>x. Others </label></div>
                  
                                    <div class="col-lg-4"> 
                                    <input type="radio" name="maid_other" value="Yes"> Yes
                                    <input type="radio" name="maid_other" value="No" checked> No
                              
                                </div>
                            </div>
                            <br>

                             <div class="form-group">
                                  <div class="row">
                                    <div class="col-lg-2"><label>16. Physical disability </label></div>
                                    <div class="col-lg-4"><input class="form-control input-sm" name="maid_physical_d" value="<?=isset($_POST['maid_physical_d'])?$_POST['maid_physical_d']:(isset($maid['maid_physical_d'])?$maid['maid_physical_d']:'')?>" ></div>
                                </div>
                            </div>

                             <div class="form-group">
                                  <div class="row">
                                    <div class="col-lg-2"><label>17. Dietary restriction </label></div>
                                    <div class="col-lg-4"><input class="form-control input-sm" name="maid_dietary_res" value="<?=isset($_POST['maid_dietary_res'])?$_POST['maid_dietary_res']:(isset($maid['maid_dietary_res'])?$maid['maid_dietary_res']:'')?>" ></div>
                                </div>
                            </div>


                            <div class="form-group">
                                  <div class="row">
                                    <div class="col-lg-2"><label>Food handling preferences:  </label></div>
                  
                                    <div class="col-lg-4"> 
                                    <input type="checkbox" name="maid_no_pork" value="Maid is alergic to pork"> No Pork &nbsp&nbsp

                                    <input type="checkbox" name="maid_no_beef" value="Maid is alergic to beef">No Beef
                              
                                </div>
                            </div>
                            <br>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2"><label>Problems Handling other food </label></div>
                                    <div class="col-lg-4"><input class="form-control input-sm" name="maid_handling_others" value="<?=isset($_POST['maid_handling_others'])?$_POST['maid_handling_others']:(isset($maid['maid_handling_others'])?$maid['maid_handling_others']:'')?>" ></div>
                                </div>
                            </div>
                            <br>

                            <div class="form-group">
                            <br>
                                <div class="row">
                                    <div class="col-lg-12"><h4>A3 Other  </h4></div>
                                </div>
                            
                            </div>

                             <div class="form-group">
                                  <div class="row">
                                    <div class="col-lg-2"><label>19. Preference for rest day: restday per month</label></div>
                                    <div class="col-lg-4"><input class="form-control input-sm" name="maid_rest" value="<?=isset($_POST['maid_rest'])?$_POST['maid_rest']:(isset($maid['maid_rest'])?$maid['maid_rest']:'')?>" ></div>
                                </div>
                            </div>

                             <div class="form-group">
                                  <div class="row">
                                    <div class="col-lg-2"><label>20. Any Other remarks </label></div>
                                    <div class="col-lg-4"><input class="form-control input-sm" name="maid_remarks" value="<?=isset($_POST['maid_remarks'])?$_POST['maid_remarks']:(isset($maid['maid_remarks'])?$maid['maid_remarks']:'')?>" ></div>
                                </div>
                            </div>

                            <div class="form-group">
                            <br>
                                <div class="row">
                                    <div class="col-lg-12"><h4><b> ( B ) SKILL OF FDW  </b> </h4></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12"><h4><b> B1 Method of Evaluation of Skills   </b> </h4></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12"><h4><p> Please indicate the method(s) used to evaluate the FDW's skills (can tick more than one)   </p> </h4></div>
                                </div>
                            </div>

                            <div class="form-group">
                                  <div class="row">
                                    <div class="col-lg-12"> 
                                    <input type="checkbox" name="maid_FDW_dec" 
                                        value="Based on FDW's">
                                        Based on FDW's declaration, no evaluation/observation by Singapore EA or overseas training centre/EA
                                    <br>
                                    <input type="checkbox" name="maid_interview_sg" value="Maid was evaluated by Singapore EA"> Interviewed by <u>Singapore EA</u>
                                </div>
                                </div>
                            </div>
                            <br>

                            <div class="form-group">
                                  <div class="row">
                                    <div class="col-lg-12 col-md-offset-1"> 
                                    <input type="checkbox" name="maid_int_tel_sg" value="telephone sg"> Interviewed via telephone/teleconference
                                    <br>
                                    <input type="checkbox" name="maid_int_vid_sg" value="videoconference sg"> Interviewed via videoconference
                                    <br>
                                    <input type="checkbox" name="maid_int_person_sg" value="Interviewed in person"> Interviewed in person
                                    <br>
                                    <input type="checkbox" name="maid_int_observed_sg" value="Interviewed in person FDW "> Interviewed in person and also made observation of FDW in the areas of work listed in table
                                </div>
                                </div>
                            </div>
                            <br>
<!-- first table big table -->
                                  <div class="table-responsive">
                        <table class="table table-bordered ">
                        <tbody>
                            <tr>
                                <th><h4><center>S/No</center></h4></th>
                                <th><h4><center>Areas of Work </center></h4></th>
                                <th><h4><center>Willingness<br>Yes/No</center></h4></th>
                                <th><h4><center>Experience<br>Yes/No<br>If yes, state the no. of years </center></h4></th>
                                <th><h4><center>Assessment/Observation<br>Please state qualitative observations of FDW and/or rate the<br>FDW (indicate N.A. of no evaluations was done)<br>Poor.....Excellent...N.A.<br>1 2 3 4 5 N.A.</center></h4></th>
                            </tr>

                            <tr>
                                <td><h4><center>1.</center></h4></td>
                                <td><h4><center>Care of infants/childrenPlease specify age range:   <br> 
                                <div class="col-lg-12">
                                        <input class="form-control input-sm" 
                                                name="maid_care_infants_age_1" 
                                                value="<?=isset($_POST['maid_care_infants_age_1'])?$_POST['maid_care_infants_age_1']:
                                                (isset($maid['maid_care_infants_age_1'])?$maid['maid_care_infants_age_1']:'')?>" >
                                </div>
                                </center>
                                </h4>
                                </td>
                                

                                <td>
                                <h4>
                                <center>
                                <div class="form-group">
                                <div class="row">
                                <div class="col-lg-12">
                                        <select name="maid_care_infants_will_1" class="form-control input-sm" id="maid_care_infants_will_1">
                                                    <option value="">---</option>
                                                     <option value="No">No</option>
                                                    <option value="Yes">Yes</option>
                                        </select>
                                </div>
                                </div>
                                </div>
                                </center>
                                </h4>
                                </td>


                                <td>
                                <h4>
                                <center>No. of years:<br> 
                                <div class="col-lg-12">
                                        <input class="form-control input-sm" 
                                               name="maid_care_infants_exp_1" 
                                               value="<?=isset($_POST['maid_care_infants_exp_1'])?$_POST['maid_care_infants_exp_1']:
                                               (isset($maid['maid_care_infants_exp_1'])?$maid['maid_care_infants_exp_1']:'')?>" >
                                </div>
                                </center>
                                </h4>
                                </td>


                                <td>
                                <h4>
                                <center>
                                <div class="row">
                                <div class="col-lg-3 col-md-offset-5">
                                        <select name=" maid_care_infants_eva_1" class="form-control input-sm" id=" maid_care_infants_eva_1">
                                                    <option value="">N.A.</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                        </select>
                                </div>
                                </div>
                                </center>
                                </h4>
                                </td>
                            </tr>
                            <tr>

                                <td><h4><center>2.</center></h4></td>
                                <td><h4><center>care of elderly</center></h4></td>
                                
                                <td>
                                <h4>
                                <center>
                                <div class="form-group">
                                <div class="row">
                                <div class="col-lg-12">
                                        <select name="maid_care_elderly_will_1" class="form-control input-sm" id="maid_care_elderly_will_1">
                                                    <option value="">---</option>
                                                     <option value="No">No</option>
                                                    <option value="Yes">Yes</option>
                                        </select>
                                </div>
                                </div>
                                </div>   
                                </center>
                                </h4>
                                </td>

                                <td>
                                <h4>
                                <center>No. of years: <br>
                                <div class="col-lg-12">
                                        <input class="form-control input-sm" 
                                                name="maid_care_elderly_exp_1" 
                                                value="<?=isset($_POST['maid_care_elderly_exp_1'])?$_POST[' maid_care_elderly_exp_1']:
                                                (isset($maid['maid_care_elderly_exp_1'])?$maid['maid_care_elderly_exp_1']:'')?>" >
                                </div>
                                </center>
                                </h4>
                                </td>


                                <td>
                                <h4>
                                <center>
                                <div class="row">
                                <div class="col-lg-3 col-md-offset-5">
                                        <select name="maid_care_elderly_eva_1" class="form-control input-sm" id=" maid_care_elderly_eva_1">
                                                    <option value="">N.A.</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                        </select>
                                </div>
                                </div>
                                </div>
                                </center>
                                </h4>
                                </td>

                            </tr>
                            <tr>

                                <td><h4><center>3.</center></h4></td>
                                <td><h4><center>Care of disabled </center></h4></td>

                                <td>
                                <h4>
                                <center>
                                <div class="form-group">
                                <div class="row">
                                <div class="col-lg-12">
                                        <select name="maid_care_disable_will_1" class="form-control input-sm" id="maid_care_disable_will_1">
                                                    <option value="">---</option>
                                                    <option value="No">No</option>
                                                    <option value="Yes">Yes</option>
                                        </select>
                                    </div>
                                </div>
                                </div>   
                                </center>
                                </h4>
                                </td>


                                <td>
                                <h4><center>No. of years: <br> 
                                <div class="col-lg-12">
                                        <input class="form-control input-sm" 
                                        name="maid_care_disable_exp_1" 
                                        value="<?=isset($_POST['maid_care_disable_exp_1'])?$_POST['maid_care_disable_exp_1']:
                                        (isset($maid['maid_care_disable_exp_1'])?$maid['maid_care_disable_exp_1']:'')?>" >
                                </div>
                                </center>
                                </h4>
                                </td>

                                <td>
                                <h4>
                                <center>
                                <div class="row">
                                <div class="col-lg-3 col-md-offset-5">
                                        <select name="maid_care_disable_eva_1" class="form-control input-sm" id="maid_care_disable_eva_1">
                                                    <option value="">N.A.</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                        </select>
                                </div>
                                </div>
                                </div>
                                </center>
                                </h4>
                                </td>

                            </tr>
                            <tr>

                                <td><h4><center>4.</center></h4></td>
                                <td><h4><center>General housework </center></h4></td>
                                <td><h4><center>

                                <div class="form-group">
                                <div class="row">
                                <div class="col-lg-12">
                                        <select name=" maid_care_housework_will_1" class="form-control input-sm" id=" maid_care_housework_will_1">
                                                    <option value="">---</option>
                                                     <option value="No">No</option>
                                                    <option value="Yes">Yes</option>
                                        </select>
                                    </div>
                                </div>
                                </div>
                                </center>
                                </h4>
                                </td>

                                <td>
                                <h4>
                                <center>No. of years: <br> 
                                <div class="col-lg-12">
                                        <input class="form-control input-sm" 
                                                name="maid_care_housework_exp_1" 
                                                value="<?=isset($_POST['maid_care_housework_exp_1'])?$_POST['maid_care_housework_exp_1']:
                                                (isset($maid['maid_care_housework_exp_1'])?$maid['maid_care_housework_exp_1']:'')?>" >
                                </div>
                                </center>
                                </h4>
                                </td>

                                <td>
                                <h4>
                                <center>
                                <div class="row">
                                <div class="col-lg-3 col-md-offset-5">
                                        <select name="maid_care_housework_eva_1" class="form-control input-sm" id="maid_care_housework_eva_1">
                                                    <option value="">N.A.</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                        </select>
                                </div>
                                </div>
                                </div>   
                                </center>
                                </h4>
                                </td>
                            </tr>
                            <tr>

                                <td><h4><center>5.</center></h4></td>
                                <td><h4><center>CookingPlease specify cuisines: <br> <div class="col-lg-12">
                                        <input class="form-control input-sm" 
                                        name="maid_cooking_cuisines_1" value="<?=isset($_POST['maid_cooking_cuisines_1'])?$_POST['maid_cooking_cuisines_1']:
                                        (isset($maid['maid_cooking_cuisines_1'])?$maid['maid_cooking_cuisines_1']:'')?>" >
                                </div>
                                </center>
                                </h4>
                                </td>

                                <td><h4><center>
                                <div class="form-group">
                                <div class="row">
                                <div class="col-lg-12">
                                        <select name="maid_cooking_will_1" class="form-control input-sm" id="maid_cooking_will_1">
                                                    <option value="">---</option>
                                                     <option value="No">No</option>
                                                    <option value="Yes">Yes</option>
                                        </select>
                                </div>
                                </div>
                                </div>   
                                </center>
                                </h4>
                                </td>

                                <td>
                                <h4>
                                <center>No. of years: <br> 
                                <div class="col-lg-12">
                                        <input class="form-control input-sm" 
                                                name="maid_cooking_exp_1" 
                                                value="<?=isset($_POST['maid_cooking_exp_1'])?$_POST['maid_cooking_exp_1']:
                                                (isset($maid['maid_cooking_exp_1'])?$maid['maid_cooking_exp_1']:'')?>">
                                </div>
                                </center>
                                </h4>
                                </td>

                                <td>
                                <h4>
                                <center>
                                <div class="row">
                                <div class="form-group">
                                <div class="col-lg-3 col-md-offset-5">
                                        <select name="maid_cooking_eva_1" class="form-control input-sm" id="maid_cooking_eva_1">
                                                    <option value="">N.A.</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                        </select>
                                </div>
                                </div>
                                </div>
                                </center>
                                </h4>
                                </td>
                            </tr>
                            <tr>
                                <td><h4><center>6..</center></h4></td>
                                <td>
                                <h4>
                                <center>Language abilities (spoken)Please specify <br> 

                                <div class="col-lg-12">
                                        <input class="form-control input-sm" 
                                        name="maid_language_1" value="<?=isset($_POST['maid_language_1'])?$_POST['maid_language_1']:
                                        (isset($maid['maid_language_1'])?$maid['maid_language_1']:'')?>" >
                                </div>
                                </center>
                                </h4>
                                </td>

                                <td><h4><center>-</center></h4></td>
                                <td><h4><center>No. of years: <br> 
                                <div class="col-lg-12">
                                        <input class="form-control input-sm" 
                                        name="maid_language_exp_1" 
                                        value="<?=isset($_POST['maid_language_exp_1'])?$_POST['maid_language_exp_1']:
                                        (isset($maid['maid_language_exp_1'])?$maid['maid_language_exp_1']:'')?>" >
                                </div>
                                </center>
                                </h4>
                                </td>

                                <td><h4><center>
                                <div class="row">
                                <div class="form-group">
                                <div class="col-lg-3 col-md-offset-5">
                                        <select name=" maid_language_eva_1" class="form-control input-sm" id=" maid_language_eva_1">
                                                    <option value="">N.A.</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                        </select>
                                </div>
                                </div>
                                </div>
                                </center>
                                </h4>
                                </td>

                            </tr>
                            <tr>

                                <td><h4><center>7..</center></h4></td>
                                <td><h4><center>Other skills, if any Please specify <br> 
                                <div class="col-lg-12">
                                        <input class="form-control input-sm" 
                                        name="maid_skill_1" value="<?=isset($_POST['maid_skill_1'])?$_POST['maid_skill_1']:
                                        (isset($maid['maid_skill_1'])?$maid['maid_skill_1']:'')?>" >
                                </div>
                                </center>
                                </h4>
                                </td>

                                <td>
                                <h4>
                                <center>
                                <div class="form-group">-</div></center></h4></td>
                                <td>
                                <h4>
                                <center>No. of years: <br> 
                                <div class="col-lg-12">
                                        <input class="form-control input-sm" 
                                                name="maid_skill_exp_1" 
                                                value="<?=isset($_POST['maid_skill_exp_1'])?$_POST['maid_skill_exp_1']:
                                                (isset($maid['maid_skill_exp_1'])?$maid['maid_skill_exp_1']:'')?>" >
                                </div>
                                </center>
                                </h4>
                                </td>

                                <td>
                                <h4>
                                <center>
                                <div class="row ">
                                <div class="form-group">
                                <div class="col-lg-3  col-md-offset-5">
                                        <select name="maid_skill_eva_1" class="form-control input-sm" id="maid_skill_eva_1">
                                                    <option value="">N.A.</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                        </select>
                                </div>
                                </div>
                                </div>
                                </center>
                                </h4>
                                </td>
                            </tr>
                          
                        </tbody>
                    </table>
                </div>

                            <br>
                            <br>


                            <div class="form-group">
                                  <div class="row">
                                    <div class="col-lg-12 "> 
                                    <input type="checkbox" name="maid_interview_foreign" value="Interviewed via telephone/teleconference"> Interviewed via telephone/teleconference
                                    <br>   
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                  <div class="row">
                                    <div class="col-lg-8 col-md-offset-1"><label>Interviewed by overseas training centre/EA (Please state name of foreign training centre/EA):</label></div>
                                    <div class="col-lg-3 "><input class="form-control input-sm" name="maid_foreigncenter_name" value="<?=isset($_POST['maid_foreigncenter_name'])?$_POST['maid_foreigncenter_name']:(isset($maid['maid_foreigncenter_name'])?$maid['maid_foreigncenter_name']:'')?>"></div>
                                </div>
                            </div>

                            <div class="form-group">
                                  <div class="row">
                                    <div class="col-lg-7 col-md-offset-1"><label>State if the third party is certified (e.g. ISO9001) or audited periodically by the EA</label></div>
                                    <div class="col-lg-3 "><input class="form-control input-sm" name="maid_foreign_certified" value="<?=isset($_POST['maid_foreign_certified'])?$_POST['maid_foreign_certified']:(isset($maid['maid_foreign_certified'])?$maid['maid_foreign_certified']:'')?>"></div>
                                </div>
                            </div>

                            

                            <div class="form-group">
                                  <div class="row">
                                    <div class="col-lg-12 col-md-offset-1"> 
                                    <input type="checkbox" name="maid_int_tel_foreign" value="Interviewed via telephone"> Interviewed via telephone/teleconference
                                    <br>   
                                    <input type="checkbox" name="maid_int_vid_foreign" value="Interviewed via videoconference"> Interviewed via videoconference
                                    <br>  
                                    <input type="checkbox" name="maid_int_person_foreign" value="Interviewed in person"> Interviewed in person
                                    <br>  
                                    <input type="checkbox" name="maid_int_observed_foreign" value="Interviewed in person and also made observation of FDW in the areas of work listed in table"> Interviewed in person and also made observation of FDW in the areas of work listed in table
                                    </div>
                                </div>
                            </div>

<!-- second big table -->


                          <div class="table-responsive">
                        <table class="table table-bordered ">
                        <tbody>
                            <tr>
                                <th><h4><center>S/No</center></h4></th>
                                <th><h4><center>Areas of Work </center></h4></th>
                                <th><h4><center>Willingness<br>Yes/No</center></h4></th>
                                <th><h4><center>Experience<br>Yes/No<br>If yes, state the no. of years </center></h4></th>
                                <th><h4><center>Assessment/Observation<br>Please state qualitative observations of FDW and/or rate the<br>FDW (indicate N.A. of no evaluations was done)<br>Poor.....Excellent...N.A.<br>1 2 3 4 5 N.A.</center></h4></th>
                            </tr>

                            <tr>
                                <td><h4><center>1.</center></h4></td>
                                <td><h4><center>Care of infants/childrenPlease specify age range:   <br> 
                                <div class="col-lg-12">
                                        <input class="form-control input-sm" 
                                                name="maid_care_infants_age_2" 
                                                value="<?=isset($_POST['maid_care_infants_age_2'])?$_POST['maid_care_infants_age_2']:
                                                (isset($maid['maid_care_infants_age_2'])?$maid['maid_care_infants_age_2']:'')?>" >
                                </div>
                                </center>
                                </h4>
                                </td>
                                

                                <td>
                                <h4>
                                <center>
                                <div class="form-group">
                                <div class="row">
                                <div class="col-lg-12">
                                        <select name="maid_care_infants_will_2" class="form-control input-sm" id="maid_care_infants_will_2">
                                                    <option value="">---</option>
                                                     <option value="No">No</option>
                                                    <option value="Yes">Yes</option>
                                        </select>
                                </div>
                                </div>
                                </div>
                                </center>
                                </h4>
                                </td>


                                <td>
                                <h4>
                                <center>No. of years:<br> 
                                <div class="col-lg-12">
                                        <input class="form-control input-sm" 
                                               name="maid_care_infants_exp_2" 
                                               value="<?=isset($_POST['maid_care_infants_exp_2'])?$_POST['maid_care_infants_exp_2']:
                                               (isset($maid['maid_care_infants_exp_2'])?$maid['maid_care_infants_exp_2']:'')?>" >
                                </div>
                                </center>
                                </h4>
                                </td>


                                <td>
                                <h4>
                                <center>
                                <div class="row">
                                <div class="col-lg-3 col-md-offset-5">
                                        <select name=" maid_care_infants_eva_2" class="form-control input-sm" id=" maid_care_infants_eva_2">
                                                    <option value="">N.A.</option>
                                                     <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                              
                                        </select>
                                </div>
                                </div>
                                </center>
                                </h4>
                                </td>
                            </tr>
                            <tr>

                                <td><h4><center>2.</center></h4></td>
                                <td><h4><center>care of elderly</center></h4></td>
                                
                                <td>
                                <h4>
                                <center>
                                <div class="form-group">
                                <div class="row">
                                <div class="col-lg-12">
                                        <select name="maid_care_elderly_will_2" class="form-control input-sm" id="maid_care_elderly_will_2">
                                                    <option value="">---</option>
                                                     <option value="No">No</option>
                                                    <option value="Yes">Yes</option>
                                        </select>
                                </div>
                                </div>
                                </div>   
                                </center>
                                </h4>
                                </td>

                                <td>
                                <h4>
                                <center>No. of years: <br>
                                <div class="col-lg-12">
                                        <input class="form-control input-sm" 
                                                name="maid_care_elderly_exp_2" 
                                                value="<?=isset($_POST['maid_care_elderly_exp_2'])?$_POST[' maid_care_elderly_exp_2']:
                                                (isset($maid['maid_care_elderly_exp_2'])?$maid['maid_care_elderly_exp_2']:'')?>" >
                                </div>
                                </center>
                                </h4>
                                </td>


                                <td>
                                <h4>
                                <center>
                                <div class="row">
                                <div class="col-lg-3 col-md-offset-5">
                                        <select name="maid_care_elderly_eva_2" class="form-control input-sm" id=" maid_care_elderly_eva_2">
                                                    <option value="">N.A.</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                        </select>
                                </div>
                                </div>
                                </div>
                                </center>
                                </h4>
                                </td>

                            </tr>
                            <tr>

                                <td><h4><center>3.</center></h4></td>
                                <td><h4><center>Care of disabled </center></h4></td>

                                <td>
                                <h4>
                                <center>
                                <div class="form-group">
                                <div class="row">
                                <div class="col-lg-12">
                                        <select name="maid_care_disable_will_2" class="form-control input-sm" id="maid_care_disable_will_2">
                                                    <option value="">---</option>
                                                    <option value="No">No</option>
                                                    <option value="Yes">Yes</option>
                                        </select>
                                    </div>
                                </div>
                                </div>   
                                </center>
                                </h4>
                                </td>


                                <td>
                                <h4><center>No. of years: <br> 
                                <div class="col-lg-12">
                                        <input class="form-control input-sm" 
                                        name="maid_care_disable_exp_2"  
                                        value="<?=isset($_POST['maid_care_disable_exp_2'])?$_POST['maid_care_disable_exp_2']:
                                        (isset($maid['maid_care_disable_exp_2'])?$maid['maid_care_disable_exp_2']:'')?>" >
                                </div>
                                </center>
                                </h4>
                                </td>

                                <td>
                                <h4>
                                <center>
                                <div class="row">
                                <div class="col-lg-3 col-md-offset-5">
                                        <select name="maid_care_disable_eva_2" class="form-control input-sm" id="maid_care_disable_eva_2">
                                                   <option value="">N.A.</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                        </select>
                                </div>
                                </div>
                                </div>
                                </center>
                                </h4>
                                </td>

                            </tr>
                            <tr>

                                <td><h4><center>4.</center></h4></td>
                                <td><h4><center>General housework </center></h4></td>
                                <td><h4><center>

                                <div class="form-group">
                                <div class="row">
                                <div class="col-lg-12">
                                        <select name=" maid_care_housework_will_2" class="form-control input-sm" id=" maid_care_housework_will_2">
                                                    <option value="">---</option>
                                                     <option value="No">No</option>
                                                    <option value="Yes">Yes</option>
                                        </select>
                                    </div>
                                </div>
                                </div>
                                </center>
                                </h4>
                                </td>

                                <td>
                                <h4>
                                <center>No. of years: <br> 
                                <div class="col-lg-12">
                                        <input class="form-control input-sm" 
                                                name="maid_care_housework_exp_2" 
                                                value="<?=isset($_POST['maid_care_housework_exp_2'])?$_POST['maid_care_housework_exp_2']:
                                                (isset($maid['maid_care_housework_exp_2'])?$maid['maid_care_housework_exp_2']:'')?>" >
                                </div>
                                </center>
                                </h4>
                                </td>

                                <td>
                                <h4>
                                <center>
                                <div class="row">
                                <div class="col-lg-3 col-md-offset-5">
                                        <select name="maid_care_housework_eva_2" class="form-control input-sm" id="maid_care_housework_eva_2">
                                                    <option value="">N.A.</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                        </select>
                                </div>
                                </div>
                                </div>   
                                </center>
                                </h4>
                                </td>
                            </tr>
                            <tr>

                                <td><h4><center>5.</center></h4></td>
                                <td><h4><center>CookingPlease specify cuisines: <br> <div class="col-lg-12">
                                        <input class="form-control input-sm" 
                                        name="maid_cooking_cuisines_2" value="<?=isset($_POST['maid_cooking_cuisines_2'])?$_POST['maid_cooking_cuisines_2']:
                                        (isset($maid['maid_cooking_cuisines_2'])?$maid['maid_cooking_cuisines_2']:'')?>" >
                                </div>
                                </center>
                                </h4>
                                </td>

                                <td><h4><center>
                                <div class="form-group">
                                <div class="row">
                                <div class="col-lg-12">
                                        <select name="maid_cooking_will_2" class="form-control input-sm" id="maid_cooking_will_2">
                                                    <option value="">---</option>
                                                     <option value="No">No</option>
                                                    <option value="Yes">Yes</option>
                                        </select>
                                </div>
                                </div>
                                </div>   
                                </center>
                                </h4>
                                </td>

                                <td>
                                <h4>
                                <center>No. of years: <br> 
                                <div class="col-lg-12">
                                        <input class="form-control input-sm" 
                                                name="maid_cooking_exp_2" 
                                                value="<?=isset($_POST['maid_cooking_exp_2'])?$_POST['maid_cooking_exp_2']:
                                                (isset($maid['maid_cooking_exp_2'])?$maid['maid_cooking_exp_2']:'')?>">
                                </div>
                                </center>
                                </h4>
                                </td>

                                <td>
                                <h4>
                                <center>
                                <div class="row">
                                <div class="form-group">
                                <div class="col-lg-3 col-md-offset-5">
                                        <select name="maid_cooking_eva_2" class="form-control input-sm" id="maid_cooking_eva_2">
                                                    <<option value="">N.A.</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                        </select>
                                </div>
                                </div>
                                </div>
                                </center>
                                </h4>
                                </td>
                            </tr>
                            <tr>
                                <td><h4><center>6..</center></h4></td>
                                <td>
                                <h4>
                                <center>Language abilities (spoken)Please specify <br> 

                                <div class="col-lg-12">
                                        <input class="form-control input-sm" 
                                        name="maid_language_2" value="<?=isset($_POST['maid_language_2'])?$_POST['maid_language_2']:
                                        (isset($maid['maid_language_2'])?$maid['maid_language_2']:'')?>" >
                                </div>
                                </center>
                                </h4>
                                </td>

                                <td><h4><center>-</center></h4></td>
                                <td><h4><center>No. of years: <br> 
                                <div class="col-lg-12">
                                        <input class="form-control input-sm" 
                                        name="maid_language_exp_2" 
                                        value="<?=isset($_POST['maid_language_exp_2'])?$_POST['maid_language_exp_2']:
                                        (isset($maid['maid_language_exp_2'])?$maid['maid_language_exp_2']:'')?>" >
                                </div>
                                </center>
                                </h4>
                                </td>

                                <td><h4><center>
                                <div class="row">
                                <div class="form-group">
                                <div class="col-lg-3 col-md-offset-5">
                                        <select name=" maid_language_eva_2" class="form-control input-sm" id=" maid_language_eva_2">
                                                   <option value="">N.A.</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                        </select>
                                </div>
                                </div>
                                </div>
                                </center>
                                </h4>
                                </td>

                            </tr>
                            <tr>

                                <td><h4><center>7..</center></h4></td>
                                <td><h4><center>Other skills, if any Please specify <br> 
                                <div class="col-lg-12">
                                        <input class="form-control input-sm" 
                                        name="maid_skill_2" value="<?=isset($_POST['maid_skill_2'])?$_POST['maid_skill_2']:
                                        (isset($maid['maid_skill_2'])?$maid['maid_skill_2']:'')?>" >
                                </div>
                                </center>
                                </h4>
                                </td>

                                <td>
                                <h4>
                                <center>
                                <div class="form-group">-</div></center></h4></td>
                                <td>
                                <h4>
                                <center>No. of years: <br> 
                                <div class="col-lg-12">
                                        <input class="form-control input-sm" 
                                                name="maid_skill_exp_2" 
                                                value="<?=isset($_POST['maid_skill_exp_2'])?$_POST['maid_skill_exp_2']:
                                                (isset($maid['maid_skill_exp_2'])?$maid['maid_skill_exp_2']:'')?>" >
                                </div>
                                </center>
                                </h4>
                                </td>

                                <td>
                                <h4>
                                <center>
                                <div class="row ">
                                <div class="form-group">
                                <div class="col-lg-3  col-md-offset-5">
                                        <select name="maid_skill_eva_2" class="form-control input-sm" id="maid_skill_eva_2">
                                                    <option value="">N.A.</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                        </select>
                                </div>
                                </div>
                                </div>
                                </center>
                                </h4>
                                </td>
                            </tr>
                          
                        </tbody>
                    </table>
                </div>


    <!--end table-->
                            <div class="form-group">
                            <br>
                                <div class="row">
                                    <div class="col-lg-12"><h4><b>EMPLOYMENT HISTORY OF THE FDW  </b> </h4></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12"><h4><b>C1 Employment History Overseas  </b> </h4></div>
                                </div>
                             <br>
                            </div>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th colspan="2"> <h4><center>Date</center></h4></th>
                                <th rowspan="2"> <h4><center>Country <br> (including FDW's <br> home country)</center></h4></th>
                                <th rowspan="2"> <h4><center><br>Employment</center></h4></th>
                                <th rowspan="2"> <h4><center><br>Work Duties</center></h4></th>
                                <th rowspan="2"> <h4><center><br>Remarks</center></h4></th>
                            </tr>
                            <tr>
                                <td> <center>From</center> </td>
                                <td> <center>To</center> </td>
                            </tr>
                            <tr>
                                <td> <div class="input-group date col-lg-12" data-provide="datepicker">
                                            <input type="text" name="maid_his_frm_1" class="form-control" value="<?=isset($_POST['maid_his_frm_1'])?$_POST['maid_his_frm_1']:(isset($maid['maid_his_frm_1'])?$maid['maid_his_frm_1']:'')?>" >
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </div>
                                     </div> 
                                </td>
                                <td> <div class="input-group date col-lg-12" data-provide="datepicker">
                                            <input type="text" name="maid_his_to_1" class="form-control" value="<?=isset($_POST['maid_his_to_1'])?$_POST['maid_his_to_1']:(isset($maid['maid_his_to_1'])?$maid['maid_his_to_1']:'')?>" >
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </div>
                                     </div> 
                                </td>

                                <td> <div class="col-lg-12"><input class="form-control input-sm" name="maid_his_country_1" value="<?=isset($_POST['maid_his_country_1'])?$_POST['maid_his_country_1']:(isset($maid['maid_his_country_1'])?$maid['maid_his_country_1']:'')?>" ></div></td>


                                <td> <div class="col-lg-12"><input class="form-control input-sm" name="maid_his_emp_1" value="<?=isset($_POST['maid_his_emp_1'])?$_POST['maid_his_emp_1']:(isset($maid['maid_his_emp_1'])?$maid['maid_his_emp_1']:'')?>" ></div></td>

                                <td> <div class="col-lg-12"><input class="form-control input-sm" name="maid_his_work_1" value="<?=isset($_POST['maid_his_work_1'])?$_POST['maid_his_work_1']:(isset($maid['maid_his_work_1'])?$maid['maid_his_work_1']:'')?>" ></div></td>

                                <td> <div class="col-lg-12"><input class="form-control input-sm" name="maid_his_rem_1" value="<?=isset($_POST['maid_his_rem_1'])?$_POST['maid_his_rem_1']:(isset($maid['maid_his_rem_1'])?$maid['maid_his_rem_1']:'')?>" ></div></td>

                                
                            </tr>
                            <tr>
                                <td> <div class="input-group date col-lg-12" data-provide="datepicker">
                                            <input type="text" name="maid_his_frm_2" class="form-control" value="<?=isset($_POST['maid_his_frm_2'])?$_POST['maid_his_frm_2']:(isset($maid['maid_his_frm_2'])?$maid['maid_his_frm_2']:'')?>" >
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </div>
                                     </div> 
                                </td>
                                <td> <div class="input-group date col-lg-12" data-provide="datepicker">
                                            <input type="text" name="maid_his_to_2" class="form-control" value="<?=isset($_POST['maid_his_to_2'])?$_POST['maid_his_to_2']:(isset($maid['maid_his_to_2'])?$maid['maid_his_to_2']:'')?>" >
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </div>
                                     </div> 
                                </td>

                                <td> <div class="col-lg-12"><input class="form-control input-sm" name="maid_his_country_2" value="<?=isset($_POST['maid_his_country_2'])?$_POST['maid_his_country_2']:(isset($maid['maid_his_country_2'])?$maid['maid_his_country_2']:'')?>" ></div></td>

                                <td> <div class="col-lg-12"><input class="form-control input-sm" name="maid_his_emp_2" value="<?=isset($_POST['maid_his_emp_2'])?$_POST['maid_his_emp_2']:(isset($maid['maid_his_emp_2'])?$maid['maid_his_emp_2']:'')?>" ></div></td>

                                <td> <div class="col-lg-12"><input class="form-control input-sm" name="maid_his_work2" value="<?=isset($_POST['maid_his_work2'])?$_POST['maid_his_work2']:(isset($maid['maid_his_work2'])?$maid['maid_his_work2']:'')?>" ></div></td>

                                <td> <div class="col-lg-12"><input class="form-control input-sm" name="maid_his_rem_2" value="<?=isset($_POST['maid_his_rem_2'])?$_POST['maid_his_rem_2']:(isset($maid['maid_his_rem_2'])?$maid['maid_his_rem_2']:'')?>" ></div></td>
                            </tr>
                         </tbody>
                    </table>
                </div>

                <div class="form-group">
                            <br>
                                <div class="row">
                                    <div class="col-lg-12"><h4>C2 Employment History in Singapore   </h4></div>
                                </div>
                             <br>
                </div>
        


                <div class="form-group">
                                  <div class="row">
                                    <div class="col-lg-4"><label>Previous working experience in Singapore  </label></div>
                  
                                    <div class="col-lg-4"> 
                                    <input type="radio" name="maid_prev_sg" value="Yes"> Yes
                                    <input type="radio" name="maid_prev_sg" value="No" checked> No
                                </div>
                </div>



                <div class="form-group">
                            <br>
                                <div class="row">
                                    <div class="col-lg-12"><h4> (The EA is  to obtain the FDW's employment history from MOM and furnish the employer with the employment history of the FDW. The employer may also verify the FDW's employment history in Singapore through WPOL using SingPass)   </h4></div>
                                </div>
                             <br>
                </div>

                <div class="form-group">
                            <br>
                                <div class="row">
                                    <div class="col-lg-12"><h4> C3Feedback from previous employers in Singapore    </h4></div>
                                </div>
                             <br>
                </div>

                <div class="form-group">
                            <br>
                                <div class="row">
                                    <div class="col-lg-12"><h4> Feedback was/was not obtained by the EA from the previous employer. If feedback was obtained (attach testimonial if possible), please indicate the feedback in the table below: </h4></div>
                                </div>
                             <br>
                </div>





                   <div class="table-responsive">
                    <table class="table table-bordered ">
                        <tbody>
                            <tr>
                                <th><h4><center></center></h4></th>
                                <th><h4><center>Feedback</center></h4></th>
                            </tr>
                            <tr>
                                <td> Emloyer 1</td>
                                <td> <div class="col-lg-12"><input class="form-control input-sm" name="maid_feedback1" value="<?=isset($_POST['maid_feedback1'])?$_POST['maid_feedback1']:(isset($maid['maid_feedback1'])?$maid['maid_feedback1']:'')?>" ></div></td>
                            </tr>
                            <tr>
                                <td> Employer 2</div></td>
                                <td> <div class="col-lg-12"><input class="form-control input-sm" name="maid_feedback2" value="<?=isset($_POST['maid_feedback2'])?$_POST['maid_feedback2']:(isset($maid['maid_feedback2'])?$maid['maid_feedback2']:'')?>" ></div></td>
                            </tr>
                         </tbody>
                    </table>
                </div>

                <div class="form-group">
                            <br>
                                <div class="row">
                                    <div class="col-lg-12"><h4> ( D ) AVAILABILITY OF FDW TO BE INTERVIEWED BY PROSPECTIVE EMPLOYER   </h4></div>
                                </div>
                            
                </div>

                 <div class="form-group">
                                  <div class="row">
                                    <div class="col-lg-4 col-md-offset-1"> 
                                    <input type="checkbox" name="maid_no_interview" value="FDW is not available for interview"> FDW is not available for interview<br>
                                    <input type="checkbox" name="maid_interview_phone" value="FDW can be interviewed by phone"> FDW can be interviewed by phone<br>
                                    <input type="checkbox" name="maid_interview_video" value="FDW can be interviewed by video-conference "> FDW can be interviewed by video-conference <br>
                                    <input type="checkbox" name="maid_interview_person" value="FDW can be interviewed in person"> FDW can be interviewed in person <br>
                                  </div>
                </div>
                <br>
                <br>


                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-6">
                                        <button type="submit" onclick="return confirm_submit()" class="btn btn-primary btn-sm"><?=$action=='add'?'Create':'Update'?></button>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> 
</div>



