<br>

<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
          <li><a href="<?=base_url()?>dashboard"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a></li>
          <li><a href="<?=base_url()?>supplier_maid"> Supplier</a></li>
          <li class="active"><?=$action=='add'?'New':'Edit'?> Supplier</li>
            <div class="pull-right">
                <div class="btn-group">
                    <a class="btn btn-default btn-xs" href="<?=base_url()?>customer"><i class="fa fa-arrow-circle-o-left"></i> Back</a>
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
                Supplier Info
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
                                    <div class="col-lg-4"><label>Supplier Name</label></div>
                                    <div class="col-lg-6 required-field-block">
                                        <input class="form-control input-sm" name="supplier_name" value="<?=isset($_POST['supplier_name'])?$_POST['supplier_name']:(isset($supplier_maid['supplier_name'])?$supplier_maid['supplier_name']:'')?>">
                              
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label>Contact Person</label></div>
                                    <div class="col-lg-6 required-field-block">
                                        <input class="form-control input-sm" name="supplier_contact_person" value="<?=isset($_POST['supplier_contact_person'])?$_POST['supplier_contact_person']:(isset($supplier_maid['supplier_contact_person'])?$supplier_maid['supplier_contact_person']:'')?>">
                                 
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label>Contact Number</label></div>
                                    <div class="col-lg-6 required-field-block">
                                        <input class="form-control input-sm" name="supplier_contact_number" value="<?=isset($_POST['supplier_contact_number'])?$_POST['supplier_contact_number']:(isset($supplier_maid['supplier_contact_number'])?$supplier_maid['supplier_contact_number']:'')?>">
                               
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label>Address</label></div>
                                    <div class="col-lg-6 required-field-block">
                                        <input class="form-control input-sm" name="supplier_address" value="<?=isset($_POST['supplier_address'])?$_POST['supplier_address']:(isset($supplier_maid['supplier_address'])?$supplier_maid['supplier_address']:'')?>">

                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label>Email</label></div>
                                    <div class="col-lg-6 required-field-block">
                                        <input class="form-control input-sm" name="supplier_email" value="<?=isset($_POST['supplier_email'])?$_POST['supplier_email']:(isset($supplier_maid['supplier_email'])?$supplier_maid['supplier_email']:'')?>">
                               
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