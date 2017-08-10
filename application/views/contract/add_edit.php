<br>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
          <li><a href="<?=base_url()?>dashboard"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a></li>
          <li><a href="<?=base_url()?>contract">Contract</a></li>
          <li class="active"><?=$action=='add'?'New':'Edit'?> Contract</li>
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
                Contract Info
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
                                    <div class="col-lg-4"><label>Name</label></div>
                                    <div class="col-lg-6 required-field-block">
                                        <input class="form-control input-sm" name="contract_name" value="<?=isset($_POST['contract_name'])?$_POST['contract_name']:(isset($contract['contract_name'])?$contract['contract_name']:'')?>">
                                    
                                    </div>
                                </div>
                            </div>

                            

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label>Customer</label></div>
                                    <div class="col-lg-6 required-field-block">
                                        <input class="form-control input-sm" name="contract_customer" value="<?=isset($_POST['contract_customer'])?$_POST['contract_customer']:(isset($contract['contract_customer'])?$contract['contract_customer']:'')?>">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label>Staff</label></div>
                                    <div class="col-lg-6 required-field-block">
                                        <input class="form-control input-sm" name="contract_staff" value="<?=isset($_POST['contract_staff'])?$_POST['contract_staff']:(isset($contract['contract_staff'])?$contract['contract_staff']:'')?>">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label>Remarks</label></div>
                                    <div class="col-lg-6 required-field-block">
                                        <input class="form-control input-sm" name="contract_remarks" value="<?=isset($_POST['contract_remarks'])?$_POST['contract_remarks']:(isset($contract['contract_remarks'])?$contract['contract_remarks']:'')?>">
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