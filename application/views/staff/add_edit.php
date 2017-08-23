
<!-- /.row -->
<br>

<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
          <li><a href="<?=base_url()?>dashboard"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a></li>
          <li><a href="<?=base_url()?>staff">Staff</a></li>
          <li class="active"><?=$action=='add'?'New':'Edit'?> Staff</li>
            <div class="pull-right">
                <div class="btn-group">
                    <a class="btn btn-default btn-xs" href="<?=base_url()?>staff"><i class="fa fa-arrow-circle-o-left"></i> Back</a>
                </div>
            </div>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Staff Info
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
                                    <div class="col-lg-4"><label>Branch</label></div>
                                    <div class="col-lg-6">
                                        <select name="branch_id" class="form-control input-sm" id="branch">
                                            <option value="">- Please Select Branch -</option>
                                            <?php if ($branches!=''): ?>
                                                  <?php foreach ($branches as $branch): ?>
                                                    <option value="<?=$branch['branch_id']?>" <?=(isset($staff['branch_id'])&&$staff['branch_id']==$branch['branch_id']?'selected':'')?>><?=$branch['branch_name']?></option>
                                                    <?php endforeach ?>
                                            <?php endif ?>
                                        </select>
                                    </div>
                                </div>
                            </div>


                          <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label>Name</label></div>
                                    <div class="col-lg-6"><input class="form-control input-sm" name="staff_name" value="<?=isset($_POST['staff_name'])?$_POST['staff_name']:(isset($staff['staff_name'])?$staff['staff_name']:'')?>"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label>Username</label></div>
                                    <div class="col-lg-6"><input class="form-control input-sm" name="staff_username" value="<?=isset($_POST['staff_username'])?$_POST['staff_username']:(isset($staff['staff_username'])?$staff['staff_username']:'')?>"></div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label>Password</label></div>
                                    <div class="col-lg-6 required-field-block">
                                        <input class="form-control input-sm" type="password" name="staff_password" value="<?=isset($_POST['staff_password'])?$_POST['staff_password']:''?>">
                                    </div>
                                </div>
                            </div>

                                <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label>Confirm Password</label></div>
                                    <div class="col-lg-6 required-field-block">
                                        <input class="form-control input-sm" type="password" name="confirm_password" value="<?=isset($_POST['confirm_password'])?$_POST['confirm_password']:''?>">
                                     </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label>Role</label></div>
                                    <div class="col-lg-6">
                                        <select name="role_id" class="form-control input-sm" id="role">
                                            <option value="">- Please Select Role -</option>
                                            <?php if ($roles!=''): ?>
                                                  <?php foreach ($roles as $role): ?>
                                                    <option value="<?=$role['role_id']?>" <?=(isset($staff['role_id'])&&$staff['role_id']==$role['role_id']?'selected':'')?>><?=$role['role_title']?></option>
                                                    <?php endforeach ?>
                                            <?php endif ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div id="sup-cont">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-4"><label>Supplier</label></div>
                                        <div class="col-lg-6">
                                            <select name="supp_id" class="form-control input-sm" id="supp">
                                                <option value="">- Please Select Supplier -</option>
                                                <?php if ($suppliers!=''): ?>
                                                      <?php foreach ($suppliers as $supp): ?>
                                                        <option value="<?=$supp['supplier_id']?>" <?=isset($staff['supplier_id'])&&$staff['supplier_id']==$supp['supplier_id']?'selected':''?> ><?=$supp['supplier_code']." - ".$supp['supplier_name']?></option>
                                                        <?php endforeach ?>
                                                <?php endif ?>
                                            </select>
                                        </div>
                                </div>                                    
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
                       
                    </form>
                </div>
            </div>
        </div>
    </div> 
</div>


<script type="text/javascript">
    $(document).ready(function(){

        if($("#role").val() !== '4' ) {
            $('#sup-cont').hide();
            $("#supp").val('');
        }

        $("#role").change(function(){
            var a = $(this).val();
            if(a=='4'){
                $('#sup-cont').show();
            }else{
                $('#sup-cont').hide();
                $("#supp").val('');
            }

        });

    });


</script>