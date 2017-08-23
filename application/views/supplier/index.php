<br>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
          <li><a href="<?=base_url()?>dashboard"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a></li>
          <li class="active">Supplier</li>
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
                Supplier
                <div class="pull-right">
                    <div class="btn-group">
                        <?php if($this->session->userdata('supp_add') == 1) {?> 
                            <a class="btn btn-default btn-xs" href="<?=base_url()?>supplier/add"><i class="fa fa-plus"></i> Add</a>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <form role="form" action="<?=base_url()?>supplier">
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="form-group">
                                <input class="form-control input-sm" name="supplier_name" placeholder="Supplier Name" value="<?=isset($_GET['supplier_name'])?$_GET['supplier_name']:''?>">
                            </div>
                        </div>
                        <!-- insert here -->
                        <div class="col-lg-2">
                            <button type="submit" class="btn btn-default btn-sm">Search</button>
                        </div>
                    </div>
                </form>
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Supplier Code</th>
                                <th>Supplier Name</th>
                                <th>Maids</th>
                                <th>Contact Person</th>
                                <th>Contact Number</th>
                                <th>Address</th>
                                <th>Email</th>
                                <th class="col-md-1">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($suppliers)): ?>
                                <?php foreach ($suppliers as $supplier): ?>
                                <tr>
                                    <td><?=$supplier->supplier_code?></td>
                                    <td><?=$supplier->supplier_name?></td>
                                    <td><a href="<?=base_url()?>supplier/maid_list?supplier_id=<?=$supplier->supplier_id?>"><?=$supplier->mcount?></a></td>
                                    <td><?=$supplier->supplier_contact_person?></td>
                                    <td><?=$supplier->supplier_contact_number?></td>
                                    <td><?=$supplier->supplier_address?></td>
                                    <td><?=$supplier->supplier_email?></td>
                                  
                                    <td>                      
                                        <?php if($this->session->userdata('supp_edit') == 1) {?> 
                                            <a title="Edit" href="<?=base_url()?>supplier/edit/<?=$supplier->supplier_id?>"><i class="fa fa-pencil-square-o"></i></a>
                                          &nbsp
                                        <?php } ?>
                                        <?php if($this->session->userdata('supp_del') == 1) {?> 
                                            <a title="Delete" href="<?=base_url()?>supplier/delete/<?=$supplier->supplier_id?>" onclick="return confirm_delete()" ><i class="fa fa-trash-o"></i></a>
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