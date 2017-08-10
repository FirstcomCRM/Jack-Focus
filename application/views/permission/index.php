
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Permission</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
          <li><a href="<?=base_url()?>dashboard"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a></li>
          <li class="active">Permission</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <?php if(isset($msg) && $msg != '') { ?>
        <div class="alert alert-success"><?php echo $msg; ?></div>
        <?php } ?>
    </div>
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Permission Listing
                <div class="pull-right">
                    <div class="btn-group">
                        <a class="btn btn-default btn-xs" href="<?=base_url()?>permission/add"><i class="fa fa-plus"></i> Add</a>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <form permission="form" action="<?=base_url()?>permission">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <select class="form-control input-sm" name="role_id" id="role">
                                    <option value="">- Please Select Role -</option>
                                    <?php foreach ($roles as $role): ?>
                                        <option value="<?=$role['role_id']?>" <?=isset($_GET['role_id'])&&$_GET['role_id']==$role['role_id']?'selected':''?>><?=$role['role_name']?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <button type="submit" class="btn btn-default btn-sm">Search</button>
                        </div>
                    </div>
                </form>
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Role</th>
                                <th>Nav Tab</th>
                                <th>Permission</th>
                                <th class="col-md-1">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($permissions)): ?>
                                <?php foreach ($permissions as $permission): ?>
                                <tr>
                                    <td><?=$permission->role_name?></td>
                                    <td><?=str_replace('_', ' ', $permission->controller)?></td>
                                    <td>
                                        <?php 
                                            $perm_ary = json_decode($permission->perm, true);
                                            foreach ($perm_ary as $pk => $perm) {
                                                $perm_ary[$pk] = $perm=='index'?'listing':$perm;
                                            }
                                            $perm_str = implode(', ', $perm_ary);
                                            echo str_replace('_', ' ', $perm_str);
                                        ?>
                                    </td>
                                    <td>
                                        <a title="Edit" href="<?=base_url()?>permission/edit/<?=$permission->permission_id?>"><i class="fa fa-pencil-square-o"></i></a>&nbsp
                                        <a title="Delete" href="<?=base_url()?>permission/delete/<?=$permission->permission_id?>" onclick="return confirm_delete()" ><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                                <?php endforeach ?>
                            <?php endif ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="panel-footer">
                <div class="row">
                    <div class="col-lg-6 text-left">
                        <strong><?php echo $pagination_msg?></strong>
                    </div>
                    <div class="col-lg-6 text-right">
                        <?php echo $links; ?>
                    </div>
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