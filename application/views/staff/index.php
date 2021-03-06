

<br>

<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
          <li><a href="<?=base_url()?>dashboard"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a></li>
          <li class="active">Staff</li>
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
                Staff Listing
                <div class="pull-right">
                    <div class="btn-group">
                        <?php if($this->session->userdata('staff_add') == 1) {?> 
                        <a class="btn btn-default btn-xs" href="<?=base_url()?>staff/add"><i class="fa fa-plus"></i> Add</a>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <form role="form" action="<?=base_url()?>staff">
                    <div class="row">
                        <!--<div class="col-lg-2">
                            <div class="form-group">
                                <input class="form-control input-sm" name="staff_branch" placeholder="Branch" value="<?=isset($_GET['staff_branch'])?$_GET['staff_branch']:''?>">
                            </div>
                        </div>-->
                        <div class="col-lg-2">
                            <div class="form-group">
                                <input class="form-control input-sm" name="staff_name" placeholder="Staff Name" value="<?=isset($_GET['staff_name'])?$_GET['staff_name']:''?>">
                            </div>
                        </div>
                        <!--- insert here -->
                        <div class="col-lg-2">
                            <button type="submit" class="btn btn-default btn-sm">Search</button>
                        </div>
                    </div>
                </form>
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                
                                <th>Name</th>
                                <th>Username</th>
                                <th>Branch</th>
                                <th>Role</th>
                                <th class="col-md-1"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($staffx)): ?>
                                <?php foreach ($staffx as $staff): ?>
                                <tr>
                                    
									<td><a href="<?=base_url()?>staff/edit/<?=$staff->staff_id?>"><?=$staff->staff_name?></a></td>
									<td><?=$staff->staff_username?></td>
                                    <td><?=$staff->branch_name?></td>
									<td><?=$staff->role_title?></td>
                                    <td>

                                        <?php if($this->session->userdata('staff_edit') == 1) {?> 
                                        <a title="Edit" href="<?=base_url()?>staff/edit/<?=$staff->staff_id?>"><i class="fa fa-pencil-square-o"></i></a>&nbsp
                                        <?php } ?>

                                        <?php if($this->session->userdata('staff_del') == 1) {?> 
                                        <a title="Delete" href="<?=base_url()?>staff/delete/<?=$staff->staff_id?>" onclick="return confirm_delete()" ><i class="fa fa-trash-o"></i></a>
                                        <?php } ?>
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