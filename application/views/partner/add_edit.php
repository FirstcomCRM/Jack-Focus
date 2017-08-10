<br>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Business Partner Info
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
                                        <input class="form-control input-sm" name="partner_name" value="<?=isset($_POST['partner_name'])?$_POST['partner_name']:(isset($partner['partner_name'])?$partner['partner_name']:'')?>">
                          
                                    </div>
                                </div>
                            </div>

                            

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label>Contact Person</label></div>
                                    <div class="col-lg-6 required-field-block">
                                        <input class="form-control input-sm" name="partner_contact_person" value="<?=isset($_POST['partner_contact_person'])?$_POST['partner_contact_person']:(isset($partner['partner_contact_person'])?$partner['partner_contact_person']:'')?>">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label>Address</label></div>
                                    <div class="col-lg-6 required-field-block">
                                        <input class="form-control input-sm" name="partner_address" value="<?=isset($_POST['partner_address'])?$_POST['partner_address']:(isset($partner['partner_address'])?$partner['partner_address']:'')?>">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label>Contract No.</label></div>
                                    <div class="col-lg-6 required-field-block">
                                        <input class="form-control input-sm" name="partner_contact_no" value="<?=isset($_POST['partner_contact_no'])?$_POST['partner_contact_no']:(isset($partner['partner_contact_no'])?$partner['partner_contact_no']:'')?>">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label>Email</label></div>
                                    <div class="col-lg-6 required-field-block">
                                        <input class="form-control input-sm" name="partner_email" value="<?=isset($_POST['partner_email'])?$_POST['partner_email']:(isset($partner['partner_email'])?$partner['partner_email']:'')?>">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label>Remarks</label></div>
                                    <div class="col-lg-6 required-field-block">
                                        <input class="form-control input-sm" name="partner_remarks" value="<?=isset($_POST['partner_remarks'])?$_POST['partner_remarks']:(isset($partner['partner_remarks'])?$partner['partner_remarks']:'')?>">
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