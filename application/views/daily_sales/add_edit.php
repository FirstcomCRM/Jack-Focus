<br>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Insurance Info
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
                                    <div class="col-lg-4"><label>Insurance Name</label></div>
                                    <div class="col-lg-6 required-field-block">
                                        <input class="form-control input-sm" name="insurance_name" value="<?=isset($_POST['insurance_name'])?$_POST['insurance_name']:(isset($insurance_package['insurance_name'])?$insurance_package['insurance_name']:'')?>">
                          
                                    </div>
                                </div>
                            </div>

                            

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label>Fee</label></div>
                                    <div class="col-lg-6 required-field-block">
                                        <input class="form-control input-sm" name="fee" value="<?=isset($_POST['fee'])?$_POST['fee']:(isset($insurance_package['fee'])?$insurance_package['fee']:'')?>">
                                    </div>
                                </div>
                            </div>

                              <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label>Deposit</label></div>
                                    <div class="col-lg-6 required-field-block">
                                        <input class="form-control input-sm" name="deposit" value="<?=isset($_POST['deposit'])?$_POST['deposit']:(isset($insurance_package['deposit'])?$insurance_package['deposit']:'')?>">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label>Payment Mode</label></div>
                                    <div class="col-lg-6 required-field-block">
                                        <input class="form-control input-sm" name="payment_mode" value="<?=isset($_POST['payment_mode'])?$_POST['payment_mode']:(isset($insurance_package['payment_mode'])?$insurance_package['payment_mode']:'')?>">
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label>Replacement Period</label></div>
                                    <div class="col-lg-6 required-field-block">
                                        <input class="form-control input-sm" name="replacement_period" value="<?=isset($_POST['replacement_period'])?$_POST['replacement_period']:(isset($insurance_package['replacement_period'])?$insurance_package['replacement_period']:'')?>">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label>Description</label></div>
                                    <div class="col-lg-6 required-field-block">
                                        <input class="form-control input-sm" name="description" value="<?=isset($_POST['description'])?$_POST['description']:(isset($insurance_package['description'])?$insurance_package['description']:'')?>">
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