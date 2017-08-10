
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?=$action=='add'?'New':'Edit'?> Maid </h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
          <li><a href="<?=base_url()?>dashboard"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a></li>
          <li><a href="<?=base_url()?>maid">Maid</a></li>
          <li class="active"><?=$action=='add'?'New':'Edit'?>Maid</li>
            <div class="pull-right">
                <div class="btn-group">
                    <a class="btn btn-default btn-xs" href="<?=base_url()?>maid"><i class="fa fa-arrow-circle-o-left"></i> Back</a>
                </div>
            </div>
        </ol>
    </div>
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Maid Info
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
                <div class="row">
                    <form role="form" method="post">
                        <div class="col-lg-6">

                            <div class="form-group">
                                <div class="row">
                                    <h4><?=$action=='add'?'BIODATA OF FOREIGN DOMESTIC WORKER (FDW) Please ensure that you run through the information within the biodata as it is an important document to help you select a suitable FDW':''?>  </h4>
                                </div>
                            </div>


                          <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label>Ref No</label></div>
                                    <div class="col-lg-6 required-field-block">
                                        <input class="form-control input-sm" name="maid_ref_no" value="<?=isset($_POST['maid_ref_no'])?$_POST['maid_ref_no']:(isset($maid['maid_ref_no'])?$maid['maid_ref_no']:'')?>">
                                        <div class="required-icon">
                                            <div class="text">*</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label>Name</label></div>
                                    <div class="col-lg-6 required-field-block">
                                        <input class="form-control input-sm" name="maid_name" value="<?=isset($_POST['maid_name'])?$_POST['maid_name']:(isset($maid['maid_name'])?$maid['maid_name']:'')?>" required>
                                        <div class="required-icon">
                                            <div class="text">*</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                             <!--  <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label>Arrival Date /</label></div>
                            <div class="input-group date" data-provide="datepicker">
                                <input type="text" name="maid_arrival" class="form-control" value="<?=isset($_POST['maid_arrival'])?$_POST['maid_arrival']:(isset($maid['maid_arrival'])?$maid['maid_arrival']:'')?>">
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </div>
                            </div>
                             </div>
                            </div> -->

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label>Remarket/Hold/Selected Date /</label></div>
                                        <div class="input-group date col-lg-6" data-provide="datepicker">
                                            <input type="text" name="maid_rhs_date" class="form-control" value="<?=isset($_POST['maid_rhs_date'])?$_POST['maid_rhs_date']:(isset($maid['maid_rhs_date'])?$maid['maid_rhs_date']:'')?>">
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </div>
                                     </div>
                                </div>
                            </div>

                            <!--<div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label>Status</label></div>
                                    <div class="col-lg-6"><input class="form-control input-sm" name="maid_status" value="<?=isset($_POST['maid_status'])?$_POST['maid_status']:(isset($maid['maid_status'])?$maid['maid_status']:'')?>"></div>
                                </div>
                            </div>-->
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label>Status</label></div>
                                    <div class="col-lg-6">
                                        <select name="status_id" class="form-control input-sm" id="status">
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
                                    <div class="col-lg-4"><label>Branch</label></div>
                                    <div class="col-lg-6"><input class="form-control input-sm" name="maid_branch" value="<?=isset($_POST['maid_branch'])?$_POST['maid_branch']:(isset($maid['maid_branch'])?$maid['maid_branch']:'')?>" required></div>
                                </div>
                            </div>
                            <div class="form-group">
                                  <div class="row">
                                    <div class="col-lg-4"><label>Staff</label></div>
                                    <div class="col-lg-6"><input class="form-control input-sm" name="maid_staff" value="<?=isset($_POST['maid_staff'])?$_POST['maid_staff']:(isset($maid['maid_staff'])?$maid['maid_staff']:'')?>"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                  <div class="row">
                                    <div class="col-lg-4"><label>Employer</label></div>
                                    <div class="col-lg-6"><input class="form-control input-sm" name="maid_employer" value="<?=isset($_POST['maid_employer'])?$_POST['maid_employer']:(isset($maid['maid_employer'])?$maid['maid_employer']:'')?>"></div>
                                </div>
                            </div>
                            
                             <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label>Supplier</label></div>
                                    <div class="col-lg-6">
                                        <select name="supplier_id" class="form-control input-sm" id="supplier">
                                            <option value="">- Please Select Supplier -</option>
                                            <?php if ($suppliers!=''): ?>
                                                  <?php foreach ($suppliers as $supplier): ?>
                                                    <option value="<?=$supplier['supplier_id']?>" <?=isset($_POST['supplier_id'])&&$supplier['supplier_id']==$_POST['supplier_id']?'select':(isset($maid['supplier_id'])&&$maid['supplier_id']==$supplier['supplier_id']?'selected':'')?>><?=$supplier['supplier_name']?></option>
                                                    <?php endforeach ?>
                                            <?php endif ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                  <div class="row">
                                    <div class="col-lg-4"><label>Arrival date *Note:the date maid was created*</label></div>
                                    <div class="col-lg-6"><input class="form-control input-sm" name="maid_arrival" value="<?=isset($_POST['maid_arrival'])?$_POST['maid_arrival']:(isset($maid['maid_arrival'])?$maid['maid_arrival']:'')?>"></div>
                                </div>
                            </div>

                            <div class="form-group">
                                  <div class="row">
                                    <div class="col-lg-4"><label>Passport No.</label></div>
                                    <div class="col-lg-6"><input class="form-control input-sm" name="maid_passport" value="<?=isset($_POST['maid_passport'])?$_POST['maid_passport']:(isset($maid['maid_passport'])?$maid['maid_passport']:'')?>"></div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label>21 days</label></div>
                                        <div class="input-group date col-lg-6" data-provide="datepicker">
                                            <input type="text" name="maid_21_days" class="form-control" value="<?=isset($_POST['maid_21_days'])?$_POST['maid_21_days']:(isset($maid['maid_21_days'])?$maid['maid_21_days']:'')?>">
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </div>
                                     </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label>21 days</label></div>
                                        <div class="input-group date col-lg-6" data-provide="datepicker">
                                            <input type="text" name="maid_21_days_due" class="form-control" value="<?=isset($_POST['maid_21_days_due'])?$_POST['maid_21_days_due']:(isset($maid['maid_21_days_due'])?$maid['maid_21_days_due']:'')?>">
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </div>
                                     </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label>Date of birth</label></div>
                                        <div class="input-group date col-lg-6" data-provide="datepicker">
                                            <input type="text" name="maid_bday" class="form-control" value="<?=isset($_POST['maid_bday'])?$_POST['maid_bday']:(isset($maid['maid_bday'])?$maid['maid_bday']:'')?>">
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </div>
                                     </div>
                                </div>
                            </div>

                            <div class="form-group">
                                  <div class="row">
                                    <div class="col-lg-4"><label>Age</label></div>
                                    <div class="col-lg-6"><input class="form-control input-sm" name="maid_age" value="<?=isset($_POST['maid_age'])?$_POST['maid_age']:(isset($maid['maid_age'])?$maid['maid_age']:'')?>"></div>
                                </div>
                            </div>

                            <div class="form-group">
                                  <div class="row">
                                    <div class="col-lg-4"><label>Place of birth</label></div>
                                    <div class="col-lg-6"><input class="form-control input-sm" name="maid_place_birth" value="<?=isset($_POST['maid_place_birth'])?$_POST['maid_place_birth']:(isset($maid['maid_place_birth'])?$maid['maid_place_birth']:'')?>"></div>
                                </div>
                            </div>

                            <div class="form-group">
                                  <div class="row">
                                    <div class="col-lg-4"><label>Height</label></div>
                                    <div class="col-lg-6"><input class="form-control input-sm" name="maid_height" value="<?=isset($_POST['maid_height'])?$_POST['maid_height']:(isset($maid['maid_height'])?$maid['maid_height']:'')?>"></div>
                                </div>
                            </div>

                            <div class="form-group">
                                  <div class="row">
                                    <div class="col-lg-4"><label>Weight</label></div>
                                    <div class="col-lg-6"><input class="form-control input-sm" name="maid_weight" value="<?=isset($_POST['maid_weight'])?$_POST['maid_weight']:(isset($maid['maid_weight'])?$maid['maid_weight']:'')?>"></div>
                                </div>
                            </div>

                            <div class="form-group">
                                  <div class="row">
                                    <div class="col-lg-4"><label>Nationality</label></div>
                                    <div class="col-lg-6"><input class="form-control input-sm" name="maid_nationality" value="<?=isset($_POST['maid_nationality'])?$_POST['maid_nationality']:(isset($maid['maid_nationality'])?$maid['maid_nationality']:'')?>"></div>
                                </div>
                            </div>

                            <div class="form-group">
                                  <div class="row">
                                    <div class="col-lg-4"><label>Residential address in home country</label></div>
                                    <div class="col-lg-6"><input class="form-control input-sm" name="maid_res_home" value="<?=isset($_POST['maid_res_home'])?$_POST['maid_res_home']:(isset($maid['maid_res_home'])?$maid['maid_res_home']:'')?>"></div>
                                </div>
                            </div>

                            <div class="form-group">
                                  <div class="row">
                                    <div class="col-lg-4"><label>Name of port / airport to be repatriated to </label></div>
                                    <div class="col-lg-6"><input class="form-control input-sm" name="maid_port" value="<?=isset($_POST['maid_port'])?$_POST['maid_port']:(isset($maid['maid_port'])?$maid['maid_port']:'')?>"></div>
                                </div>
                            </div>

                            <div class="form-group">
                                  <div class="row">
                                    <div class="col-lg-4"><label>Contact number in home country </label></div>
                                    <div class="col-lg-6"><input class="form-control input-sm" name="maid_contact_home" value="<?=isset($_POST['maid_contact_home'])?$_POST['maid_contact_home']:(isset($maid['maid_contact_home'])?$maid['maid_contact_home']:'')?>"></div>
                                </div>
                            </div>

                            <div class="form-group">
                                  <div class="row">
                                    <div class="col-lg-4"><label>Religion </label></div>
                                    <div class="col-lg-6"><input class="form-control input-sm" name="maid_religion" value="<?=isset($_POST['maid_religion'])?$_POST['maid_religion']:(isset($maid['maid_religion'])?$maid['maid_religion']:'')?>"></div>
                                </div>
                            </div>

                            <div class="form-group">
                                  <div class="row">
                                    <div class="col-lg-4"><label>Education Level </label></div>
                                    <div class="col-lg-6"><input class="form-control input-sm" name="maid_educ" value="<?=isset($_POST['maid_educ'])?$_POST['maid_educ']:(isset($maid['maid_educ'])?$maid['maid_educ']:'')?>"></div>
                                </div>
                            </div>

                            <div class="form-group">
                                  <div class="row">
                                    <div class="col-lg-4"><label>Number of siblings </label></div>
                                    <div class="col-lg-6"><input class="form-control input-sm" name="maid_sibs" value="<?=isset($_POST['maid_sibs'])?$_POST['maid_sibs']:(isset($maid['maid_sibs'])?$maid['maid_sibs']:'')?>"></div>
                                </div>
                            </div>

                            <div class="form-group">
                                  <div class="row">
                                    <div class="col-lg-4"><label>Marital status </label></div>
                                    <div class="col-lg-6"><input class="form-control input-sm" name="maid_mar_status" value="<?=isset($_POST['maid_mar_status'])?$_POST['maid_mar_status']:(isset($maid['maid_mar_status'])?$maid['maid_mar_status']:'')?>"></div>
                                </div>
                            </div>

                            <div class="form-group">
                                  <div class="row">
                                    <div class="col-lg-4"><label>Number of children </label></div>
                                    <div class="col-lg-6"><input class="form-control input-sm" name="maid_children" value="<?=isset($_POST['maid_children'])?$_POST['maid_children']:(isset($maid['maid_children'])?$maid['maid_children']:'')?>"></div>
                                </div>
                            </div>

                            <div class="form-group">
                                  <div class="row">
                                    <div class="col-lg-4"><label>Age(s) of children (if any): </label></div>
                                    <div class="col-lg-6"><input class="form-control input-sm" name="maid_children_age" value="<?=isset($_POST['maid_children_age'])?$_POST['maid_children_age']:(isset($maid['maid_children_age'])?$maid['maid_children_age']:'')?>"></div>
                                </div>
                            </div>

                            <div class="form-group">
                                  <div class="row">
                                    <div class="col-lg-4"><label>Allergies (if any): </label></div>
                                    <div class="col-lg-6"><input class="form-control input-sm" name="maid_allergies" value="<?=isset($_POST['maid_allergies'])?$_POST['maid_allergies']:(isset($maid['maid_allergies'])?$maid['maid_allergies']:'')?>"></div>
                                </div>
                            </div>

                            <div class="form-group">
                                  <div class="row">
                                    <div class="col-lg-4"><label>Mental illness </label></div>
                                    <div class="col-lg-6"><input class="form-control input-sm" name="maid_mental" value="<?=isset($_POST['maid_mental'])?$_POST['maid_mental']:(isset($maid['maid_mental'])?$maid['maid_mental']:'')?>"></div>
                                </div>
                            </div>

                            <div class="form-group">
                                  <div class="row">
                                    <div class="col-lg-4"><label>Epilepsy </label></div>
                                    <div class="col-lg-6"><input class="form-control input-sm" name="maid_epilepsy" value="<?=isset($_POST['maid_epilepsy'])?$_POST['maid_epilepsy']:(isset($maid['maid_epilepsy'])?$maid['maid_epilepsy']:'')?>"></div>
                                </div>
                            </div>

                            <div class="form-group">
                                  <div class="row">
                                    <div class="col-lg-4"><label>Asthma </label></div>
                                    <div class="col-lg-6"><input class="form-control input-sm" name="maid_asthma" value="<?=isset($_POST['maid_asthma'])?$_POST['maid_asthma']:(isset($maid['maid_asthma'])?$maid['maid_asthma']:'')?>"></div>
                                </div>
                            </div>

                            <div class="form-group">
                                  <div class="row">
                                    <div class="col-lg-4"><label>Diabetis </label></div>
                                    <div class="col-lg-6"><input class="form-control input-sm" name="maid_diabetis" value="<?=isset($_POST['maid_diabetis'])?$_POST['maid_diabetis']:(isset($maid['maid_diabetis'])?$maid['maid_diabetis']:'')?>"></div>
                                </div>
                            </div>

                            <div class="form-group">
                                  <div class="row">
                                    <div class="col-lg-4"><label>Hyper Tension </label></div>
                                    <div class="col-lg-6"><input class="form-control input-sm" name="maid_hypertension" value="<?=isset($_POST['maid_hypertension'])?$_POST['maid_hypertension']:(isset($maid['maid_hypertension'])?$maid['maid_hypertension']:'')?>"></div>
                                </div>
                            </div>

                            <div class="form-group">
                                  <div class="row">
                                    <div class="col-lg-4"><label>Tuberculosis </label></div>
                                    <div class="col-lg-6"><input class="form-control input-sm" name="maid_tb" value="<?=isset($_POST['maid_tb'])?$_POST['maid_tb']:(isset($maid['maid_tb'])?$maid['maid_tb']:'')?>"></div>
                                </div>
                            </div>

                            <div class="form-group">
                                  <div class="row">
                                    <div class="col-lg-4"><label>Heart Disease </label></div>
                                    <div class="col-lg-6"><input class="form-control input-sm" name="maid_heart_disease" value="<?=isset($_POST['maid_heart_disease'])?$_POST['maid_heart_disease']:(isset($maid['maid_heart_disease'])?$maid['maid_heart_disease']:'')?>"></div>
                                </div>
                            </div>

                            <div class="form-group">
                                  <div class="row">
                                    <div class="col-lg-4"><label>Malaria </label></div>
                                    <div class="col-lg-6"><input class="form-control input-sm" name="maid_malaria" value="<?=isset($_POST['maid_malaria'])?$_POST['maid_malaria']:(isset($maid['maid_malaria'])?$maid['maid_malaria']:'')?>"></div>
                                </div>
                            </div>

                            <div class="form-group">
                                  <div class="row">
                                    <div class="col-lg-4"><label>Operation </label></div>
                                    <div class="col-lg-6"><input class="form-control input-sm" name="maid_operation" value="<?=isset($_POST['maid_operation'])?$_POST['maid_operation']:(isset($maid['maid_operation'])?$maid['maid_operation']:'')?>"></div>
                                </div>
                            </div>

                            <div class="form-group">
                                  <div class="row">
                                    <div class="col-lg-4"><label>Others </label></div>
                                    <div class="col-lg-6"><input class="form-control input-sm" name="maid_other" value="<?=isset($_POST['maid_other'])?$_POST['maid_other']:(isset($maid['maid_other'])?$maid['maid_other']:'')?>"></div>
                                </div>
                            </div>

                             <div class="form-group">
                                  <div class="row">
                                    <div class="col-lg-4"><label>Physical disability </label></div>
                                    <div class="col-lg-6"><input class="form-control input-sm" name="maid_physical_d" value="<?=isset($_POST['maid_physical_d'])?$_POST['maid_physical_d']:(isset($maid['maid_physical_d'])?$maid['maid_physical_d']:'')?>"></div>
                                </div>
                            </div>

                             <div class="form-group">
                                  <div class="row">
                                    <div class="col-lg-4"><label>Dietary restriction </label></div>
                                    <div class="col-lg-6"><input class="form-control input-sm" name="maid_dietary_res" value="<?=isset($_POST['maid_dietary_res'])?$_POST['maid_dietary_res']:(isset($maid['maid_dietary_res'])?$maid['maid_dietary_res']:'')?>"></div>
                                </div>
                            </div>

                             <div class="form-group">
                                  <div class="row">
                                    <div class="col-lg-4"><label>No pork </label></div>
                                    <div class="col-lg-6"><input class="form-control input-sm" name="maid_no_pork" value="<?=isset($_POST['maid_no_pork'])?$_POST['maid_no_pork']:(isset($maid['maid_no_pork'])?$maid['maid_no_pork']:'')?>"></div>
                                </div>
                            </div>

                             <div class="form-group">
                                  <div class="row">
                                    <div class="col-lg-4"><label>No beef </label></div>
                                    <div class="col-lg-6"><input class="form-control input-sm" name="maid_no_beef" value="<?=isset($_POST['maid_no_beef'])?$_POST['maid_no_beef']:(isset($maid['maid_no_beef'])?$maid['maid_no_beef']:'')?>"></div>
                                </div>
                            </div>

                             <div class="form-group">
                                  <div class="row">
                                    <div class="col-lg-4"><label>Handling other food </label></div>
                                    <div class="col-lg-6"><input class="form-control input-sm" name="maid_handling_others" value="<?=isset($_POST['maid_handling_others'])?$_POST['maid_handling_others']:(isset($maid['maid_handling_others'])?$maid['maid_handling_others']:'')?>"></div>
                                </div>
                            </div>

                             <div class="form-group">
                                  <div class="row">
                                    <div class="col-lg-4"><label>Preference for rest day: __ restday per month </label></div>
                                    <div class="col-lg-6"><input class="form-control input-sm" name="maid_rest" value="<?=isset($_POST['maid_rest'])?$_POST['maid_rest']:(isset($maid['maid_rest'])?$maid['maid_rest']:'')?>"></div>
                                </div>
                            </div>

                             <div class="form-group">
                                  <div class="row">
                                    <div class="col-lg-4"><label>Other remarks </label></div>
                                    <div class="col-lg-6"><input class="form-control input-sm" name="maid_remarks" value="<?=isset($_POST['maid_remarks'])?$_POST['maid_remarks']:(isset($maid['maid_remarks'])?$maid['maid_remarks']:'')?>"></div>
                                </div>
                            </div>

                            <div class="form-group">
                                  <div class="row">
                                    <div class="col-lg-4"><label>First employment history beginning date </label></div>
                                    <div class="col-lg-6"><input class="form-control input-sm" name="maid_his_frm_1" value="<?=isset($_POST['maid_his_frm_1'])?$_POST['maid_his_frm_1']:(isset($maid['maid_his_frm_1'])?$maid['maid_his_frm_1']:'')?>"></div>
                                </div>
                            </div>

                            <div class="form-group">
                                  <div class="row">
                                    <div class="col-lg-4"><label>First employment history end date </label></div>
                                    <div class="col-lg-6"><input class="form-control input-sm" name="maid_his_to_1" value="<?=isset($_POST['maid_his_to_1'])?$_POST['maid_his_to_1']:(isset($maid['maid_his_to_1'])?$maid['maid_his_to_1']:'')?>"></div>
                                </div>
                            </div>

                            <div class="form-group">
                                  <div class="row">
                                    <div class="col-lg-4"><label>First employment history country </label></div>
                                    <div class="col-lg-6"><input class="form-control input-sm" name="maid_his_country_1" value="<?=isset($_POST['maid_his_country_1'])?$_POST['maid_remarks']:(isset($maid['maid_his_country_1'])?$maid['maid_his_country_1']:'')?>"></div>
                                </div>
                            </div>

                            <div class="form-group">
                                  <div class="row">
                                    <div class="col-lg-4"><label>First employment history </label></div>
                                    <div class="col-lg-6"><input class="form-control input-sm" name="maid_his_emp_1" value="<?=isset($_POST['maid_his_emp_1'])?$_POST['maid_his_emp_1']:(isset($maid['maid_his_emp_1'])?$maid['maid_his_emp_1']:'')?>"></div>
                                </div>
                            </div>

                            <div class="form-group">
                                  <div class="row">
                                    <div class="col-lg-4"><label>First employment history duties </label></div>
                                    <div class="col-lg-6"><input class="form-control input-sm" name="maid_his_work_1" value="<?=isset($_POST['maid_his_work_1'])?$_POST['maid_his_work_1']:(isset($maid['maid_his_work_1'])?$maid['maid_his_work_1']:'')?>"></div>
                                </div>
                            </div>

                            <div class="form-group">
                                  <div class="row">
                                    <div class="col-lg-4"><label>First employment history remarks </label></div>
                                    <div class="col-lg-6"><input class="form-control input-sm" name="maid_his_rem_1" value="<?=isset($_POST['maid_his_rem_1'])?$_POST['maid_his_rem_1maid_his_rem_1']:(isset($maid['maid_his_rem_1'])?$maid['maid_his_rem_1']:'')?>"></div>
                                </div>
                            </div>

                            <div class="form-group">
                                  <div class="row">
                                    <div class="col-lg-4"><label>Second employment history beginning date </label></div>
                                    <div class="col-lg-6"><input class="form-control input-sm" name="maid_his_frm_2" value="<?=isset($_POST['maid_his_frm_2'])?$_POST['maid_his_frm_2']:(isset($maid['maid_his_frm_2'])?$maid['maid_his_frm_2']:'')?>"></div>
                                </div>
                            </div>

                            <div class="form-group">
                                  <div class="row">
                                    <div class="col-lg-4"><label>Second employment history end date </label></div>
                                    <div class="col-lg-6"><input class="form-control input-sm" name="maid_his_to_2" value="<?=isset($_POST['maid_his_to_2'])?$_POST['maid_his_to_2']:(isset($maid['maid_his_to_2'])?$maid['maid_his_to_2']:'')?>"></div>
                                </div>
                            </div>

                            <div class="form-group">
                                  <div class="row">
                                    <div class="col-lg-4"><label>Second employment history country </label></div>
                                    <div class="col-lg-6"><input class="form-control input-sm" name="maid_his_country_2" value="<?=isset($_POST['maid_his_country_2s'])?$_POST['maid_his_country_2']:(isset($maid['maid_his_country_2'])?$maid['maid_his_country_2']:'')?>"></div>
                                </div>
                            </div>

                            <div class="form-group">
                                  <div class="row">
                                    <div class="col-lg-4"><label>Second employment history </label></div>
                                    <div class="col-lg-6"><input class="form-control input-sm" name="maid_his_emp_2" value="<?=isset($_POST['maid_his_emp_2'])?$_POST['maid_his_emp_2']:(isset($maid['maid_his_emp_2'])?$maid['maid_his_emp_2']:'')?>"></div>
                                </div>
                            </div>

                            <div class="form-group">
                                  <div class="row">
                                    <div class="col-lg-4"><label>Second employment history duties </label></div>
                                    <div class="col-lg-6"><input class="form-control input-sm" name="maid_his_work2" value="<?=isset($_POST['maid_his_work2'])?$_POST['maid_his_work2']:(isset($maid['maid_his_work2'])?$maid['maid_his_work2']:'')?>"></div>
                                </div>
                            </div>

                            <div class="form-group">
                                  <div class="row">
                                    <div class="col-lg-4"><label>Second employment history remarks </label></div>
                                    <div class="col-lg-6"><input class="form-control input-sm" name="maid_his_rem_2" value="<?=isset($_POST['maid_his_rem_2'])?$_POST['maid_his_rem_2']:(isset($maid['maid_his_rem_2'])?$maid['maid_his_rem_2']:'')?>"></div>
                                </div>
                            </div>

                            <div class="form-group">
                                  <div class="row">
                                    <div class="col-lg-4"><label>Previous working experience in Singapore </label></div>
                                    <div class="col-lg-6"><input class="form-control input-sm" name="maid_prev_sg" value="<?=isset($_POST['maid_prev_sg'])?$_POST['maid_prev_sg']:(isset($maid['maid_prev_sg'])?$maid['maid_prev_sg']:'')?>"></div>
                                </div>
                            </div>

                            <div class="form-group">
                                  <div class="row">
                                    <div class="col-lg-4"><label>Feedback from first employer </label></div>
                                    <div class="col-lg-6"><input class="form-control input-sm" name="maid_feedback1" value="<?=isset($_POST['maid_feedback1'])?$_POST['maid_feedback1']:(isset($maid['maid_feedback1'])?$maid['maid_feedback1']:'')?>"></div>
                                </div>
                            </div>

                            <div class="form-group">
                                  <div class="row">
                                    <div class="col-lg-4"><label>Feedback from second employer </label></div>
                                    <div class="col-lg-6"><input class="form-control input-sm" name="maid_feedback2" value="<?=isset($_POST['maid_feedback2'])?$_POST['maid_feedback2']:(isset($maid['maid_feedback2'])?$maid['maid_feedback2']:'')?>"></div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"></div>
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