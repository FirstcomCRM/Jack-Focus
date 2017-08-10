
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?=$action=='add'?'New':'Edit'?> Permission</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
          <li><a href="<?=base_url()?>dashboard"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a></li>
          <li><a href="<?=base_url()?>permission">Permission</a></li>
          <li class="active"><?=$action=='add'?'New':'Edit'?> Permission</li>
            <div class="pull-right">
                <div class="btn-group">
                    <a class="btn btn-default btn-xs" href="<?=base_url()?>permission"><i class="fa fa-arrow-circle-o-left"></i> Back</a>
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
                Permission Info
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
                        <div class="col-lg-12">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2"><label>Role</label></div>
                                    <div class="col-lg-3">
                                        <select name="role_id" class="form-control input-sm" id="role">
                                            <option value="">- Please Select Role -</option>
                                            <?php if ($roles!=''): ?>
                                                <?php foreach ($roles as $role): ?>
                                                    <option value="<?=$role['role_id']?>" <?=isset($_POST['role_id'])&&$role['role_id']==$_POST['role_id']?'select':(isset($permission['role_id'])&&$permission['role_id']==$role['role_id']?'selected':'')?>><?=$role['role_name']?></option>
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
                                    <div class="col-lg-2"><label>Permission</label></div>
                                    <div class="col-lg-10">
                                        <?php foreach ($all_controller as $ck => $controller): ?>
                                            <input type="hidden" name="hidname[<?=$ck?>]" value="<?=$ck?>">
                                            <div><label><?=str_replace('_', ' ', $ck)?></label></div>
                                            <?php foreach ($controller as $mk => $method): ?>
                                                <label class="checkbox-inline">
                                                    <?php
                                                    $check = '';
                                                    if (isset($permissions)&&$permissions!='') {
                                                        foreach ($permissions as $permission) {
                                                            $method_perms = json_decode($permission['perm'], true);
                                                            if ($permission['controller']==$ck&&in_array($method, $method_perms)) {
                                                                $check = 'checked';
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                    <input type="checkbox" name="<?=$ck?>_permission[<?=$mk?>]" value="<?=$method?>" <?=$check?>><?=str_replace('_', ' ', $method=='index'?'listing':$method)?>
                                                </label>
                                            <?php endforeach ?>
                                            <br>
                                            <br>
                                        <?php endforeach ?>
                                    </div>
                                </div>
                            </div>
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

<script>
$(function(){
    $('#role').select2();
});
</script>