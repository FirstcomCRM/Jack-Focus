<br>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
          <li><a href="<?=base_url()?>dashboard"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a></li>
          <li class="active">Customer</li>
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
                Customer Listing
                <div class="pull-right">
                    <div class="btn-group">
                        <a class="btn btn-default btn-xs" href="<?=base_url()?>customer_maid/add"><i class="fa fa-plus"></i> Add</a>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <form role="form" action="<?=base_url()?>customer_maid">
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="form-group">
                                <input class="form-control input-sm" name="customer_name" placeholder="Customer Name" value="<?=isset($_GET['customer_name'])?$_GET['customer_name']:''?>">
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <input class="form-control input-sm" name="customer_code" placeholder="Customer Code" value="<?=isset($_GET['customer_code'])?$_GET['customer_code']:''?>">
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <input class="form-control input-sm" name="customer_email" placeholder="Customer Email" value="<?=isset($_GET['customer_email'])?$_GET['customer_email']:''?>">
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <input class="form-control input-sm" name="employer_ic_no" placeholder="Employer I/C No." value="<?=isset($_GET['employer_ic_no'])?$_GET['employer_ic_no']:''?>">
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <button type="submit" class="btn btn-default btn-sm">Search</button>
                        </div>
                    </div>
                </form>
                <div class="table-responsive">
                <div style="overflow-x:auto;">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                            	<th>Customer Code</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Email</th>
                                <th>Telephone</th>
                                <th>Cellular Phone</th>
                                <th>Fax</th>
                                <th>Postal Code</th>
                                <th>Branch Name</th>
                                <th class="col-md-1">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($customers)): ?>
                                <?php foreach ($customers as $customer): ?>
                                <tr>
                                    <td><?=$customer->customer_code?></td>
                                    <td><?=$customer->customer_name?></td>
                                    <td><?=$customer->customer_address?></td>
                                    <td><?=$customer->customer_email?></td>
                                    <td><?=$customer->customer_tel?></td>
                                    <td><?=$customer->customer_cp?></td>
                                    <td><?=$customer->customer_fax?></td>
                                    <td><?=$customer->customer_postal?></td>
                                    <td><?=$customer->branch_name?></td>
                                    <td>
                                        <a title="Edit" href="<?=base_url()?>customer_maid/edit/<?=$customer->customer_id?>"><i class="fa fa-pencil-square-o"></i></a>&nbsp
                                        <a title="Delete" href="<?=base_url()?>customer_maid/delete/<?=$customer->customer_id?>" onclick="return confirm_delete()" ><i class="fa fa-trash-o"></i></a>
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
</div>