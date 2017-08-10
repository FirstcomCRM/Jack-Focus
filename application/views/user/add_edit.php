
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?=$action=='add'?'New':'Edit'?> User</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
          <li><a href="<?=base_url()?>dashboard"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a></li>
          <li><a href="<?=base_url()?>users">User</a></li>
          <li class="active"><?=$action=='add'?'New':'Edit'?> User</li>
            <div class="pull-right">
                <div class="btn-group">
                    <a class="btn btn-default btn-xs" href="<?=base_url()?>users"><i class="fa fa-arrow-circle-o-left"></i> Back</a>
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
                User Info
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
                                    <div class="col-lg-4"><label>Username</label></div>
                                    <div class="col-lg-6 required-field-block">
                                        <input class="form-control input-sm" name="username" value="<?=isset($_POST['username'])?$_POST['username']:(isset($user['username'])?$user['username']:'')?>">
                                        <div class="required-icon">
                                            <div class="text">*</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label>Password</label></div>
                                    <div class="col-lg-6 required-field-block">
                                        <input class="form-control input-sm" type="password" name="password" value="<?=isset($_POST['password'])?$_POST['password']:''?>">
                                        <div class="required-icon">
                                            <div class="text">*</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label>Confirm Password</label></div>
                                    <div class="col-lg-6 required-field-block">
                                        <input class="form-control input-sm" type="password" name="confirm_password" value="<?=isset($_POST['confirm_password'])?$_POST['confirm_password']:''?>">
                                        <div class="required-icon">
                                            <div class="text">*</div>
                                        </div>
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
                                                    <option value="<?=$role['role_id']?>" <?=isset($_POST['role_id'])&&$role['role_id']==$_POST['role_id']?'select':(isset($user['role_id'])&&$user['role_id']==$role['role_id']?'selected':'')?>><?=$role['role_name']?></option>
                                                <?php endforeach ?>
                                            <?php endif ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-1 required-icon">
                                        <div class="text" style="color:#B80000;font-size: 26px;">*</div>
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
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> 
</div>
<script>
$(function(){
    $('#role').select2();
});
</script>