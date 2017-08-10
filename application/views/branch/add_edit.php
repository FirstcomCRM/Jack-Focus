<br>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
          <li><a href="<?=base_url()?>dashboard"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a></li>
          <li><a href="<?=base_url()?>branch">Branch</a></li>
          <li class="active"><?=$action=='add'?'New':'Edit'?> Branch</li>
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
                Branch Info
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
                                    <div class="col-lg-4"><label>Branch Name</label></div>
                                    <div class="col-lg-6 required-field-block">
                                        <input class="form-control input-sm" name="branch_name" value="<?=isset($_POST['branch_name'])?$_POST['branch_name']:(isset($branch['branch_name'])?$branch['branch_name']:'')?>">
                               
                                    </div>
                                </div>
                            </div>

                            

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label>Contact Person</label></div>
                                    <div class="col-lg-6 required-field-block">
                                        <input class="form-control input-sm" name="branch_contact_person" value="<?=isset($_POST['branch_contact_person'])?$_POST['branch_contact_person']:(isset($branch['branch_contact_person'])?$branch['branch_contact_person']:'')?>">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label>Contact Number</label></div>
                                    <div class="col-lg-6 required-field-block">
                                        <input class="form-control input-sm" name="branch_contact_number" value="<?=isset($_POST['branch_contact_number'])?$_POST['branch_contact_number']:(isset($branch['branch_contact_number'])?$branch['branch_contact_number']:'')?>">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label>Address</label></div>
                                    <div class="col-lg-6 required-field-block">
                                        <input class="form-control input-sm" name="branch_address" value="<?=isset($_POST['branch_address'])?$_POST['branch_address']:(isset($branch['branch_address'])?$branch['branch_address']:'')?>">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label>Email</label></div>
                                    <div class="col-lg-6 required-field-block">
                                        <input class="form-control input-sm" name="branch_email" value="<?=isset($_POST['branch_email'])?$_POST['branch_email']:(isset($branch['branch_email'])?$branch['branch_email']:'')?>">
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