<br>

<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
          <li><a href="<?=base_url()?>dashboard"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a></li>
          <li><a href="<?=base_url()?>package">Package</a></li>
          <li class="active"><?=$action=='add'?'New':'Edit'?> Package</li>
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
                Package Info
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
                                    <div class="col-lg-4"><label>Package Name</label></div>
                                    <div class="col-lg-6 required-field-block">
                                        <input class="form-control input-sm" name="package_name" value="<?=isset($_POST['package_name'])?$_POST['package_name']:(isset($package['package_name'])?$package['package_name']:'')?>">
                       
                                    </div>
                                </div>
                            </div>

                            

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label>Fee</label></div>
                                    <div class="col-lg-6 required-field-block">
                                        <input class="form-control input-sm" name="package_price" value="<?=isset($_POST['package_price'])?$_POST['package_price']:(isset($package['package_price'])?$package['package_price']:'')?>">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label>Deposit</label></div>
                                    <div class="col-lg-6 required-field-block">
                                        <input class="form-control input-sm" name="deposit" value="<?=isset($_POST['deposit'])?$_POST['deposit']:(isset($package['deposit'])?$package['deposit']:'')?>">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label>Payment Mode</label></div>
                                    <div class="col-lg-6 required-field-block">
                                        <input class="form-control input-sm" name="payment_mode" value="<?=isset($_POST['payment_mode'])?$_POST['payment_mode']:(isset($package['payment_mode'])?$package['payment_mode']:'')?>">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label>Replacement Period</label></div>
                                    <div class="col-lg-6 required-field-block">
                                        <input class="form-control input-sm" name="replacement_period" value="<?=isset($_POST['replacement_period'])?$_POST['replacement_period']:(isset($package['replacement_period'])?$package['replacement_period']:'')?>">
                                    </div>
                                </div>
                            </div>

  
                            
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label>Description</label></div>
                                    <div class="col-lg-6 required-field-block">
                                        <input class="form-control input-sm" name="description" value="<?=isset($_POST['description'])?$_POST['description']:(isset($package['description'])?$package['description']:'')?>">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label>Replacement Times</label></div>
                                    <div class="col-lg-6 required-field-block">
                                        <input class="form-control input-sm" name="replacement_times" value="<?=isset($_POST['replacement_times'])?$_POST['replacement_times']:(isset($package['replacement_times'])?$package['replacement_times']:'')?>">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label>Remarks</label></div>
                                    <div class="col-lg-6"><textarea class="form-control input-sm" rows="5" name="remark"><?=isset($_POST['remark'])?$_POST['remark']:(isset($package['remark'])?$package['remark']:'')?></textarea> </div>
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