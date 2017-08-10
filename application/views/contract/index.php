<br>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
          <li><a href="<?=base_url()?>dashboard"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a></li>
          <li class="active">Contract</li>
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
                Contract
                <div class="pull-right">
                    <div class="btn-group">
                        <a class="btn btn-default btn-xs" href="<?=base_url()?>contract/add"><i class="fa fa-plus"></i> Add</a>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <form role="form" action="<?=base_url()?>contract">
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="form-group">
                                <input class="form-control input-sm" name="contract_name" placeholder="Contract Name" value="<?=isset($_GET['contract_name'])?$_GET['contract_name']:''?>">
                            </div>
                        </div>
                        <!------ dito -->
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
                                <th>Date Created</th>
                                <th>Date Updated</th>
                                <th>Customer Name</th>
                                <th>Staff</th>
                                <th>Remarks</th>
                                <th class="col-md-1">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($contracts)): ?>
                                <?php foreach ($contracts as $contract): ?>
                                <tr>
                                    <td><?=$contract->contract_name?></td>
                                    <td><?=$contract->contract_created?></td>
                                    <td><?=$contract->contract_update?></td>
                                    <td><?=$contract->contract_customer?></td>
                                    <td><?=$contract->contract_staff?></td>
                                    <th><?=$contract->contract_remarks?></th>
                                    <td>
                                        <a title="Edit" href="<?=base_url()?>contract/edit/<?=$contract->contract_id?>"><i class="fa fa-pencil-square-o"></i></a>&nbsp
                                        <a title="Delete" href="<?=base_url()?>contract/delete/<?=$contract->contract_id?>" onclick="return confirm_delete()" ><i class="fa fa-trash-o"></i></a>
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