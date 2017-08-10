<br>
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
               Insurance
                <div class="pull-right">
                    <div class="btn-group">
                        <a class="btn btn-default btn-xs" href="<?=base_url()?>insurance_package/add"><i class="fa fa-plus"></i> Add</a>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <form role="form" action="<?=base_url()?>insurance_package">
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="form-group">
                                <input class="form-control input-sm" name="insurance_name" placeholder="Insurance Name" value="<?=isset($_GET['insurance_name'])?$_GET['insurance_name']:''?>">
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
                                <th>Fee</th>
                                <th>Deposit</th>
                                <th>Payment Mode</th>
                                <th>Replacement Period</th>
                                <th>Description</th>
                                
                                <th class="col-md-1">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($insurancex)): ?>
                                <?php foreach ($insurancex as $insurance): ?>
                                <tr>
                                    <td><?=$insurance->insurance_name?></td>
                                    <td><?=$insurance->fee?></td>
                                    <td><?=$insurance->deposit?></td>
                                    <td><?=$insurance->payment_mode?></td>
                                    <td><?=$insurance->replacement_period?></td>
                                    <td><?=$insurance->description?></td>
                                    
                                    <td>
             
                                        <a title="Edit" href="<?=base_url()?>insurance_package/edit/<?=$insurance->insurance_id?>"><i class="fa fa-pencil-square-o"></i></a>&nbsp
                                        <a title="Delete" href="<?=base_url()?>insurance_package/delete/<?=$insurance->insurance_id?>" onclick="return confirm_delete()" ><i class="fa fa-trash-o"></i></a>
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