<br>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Customer Info
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
                                    <div class="col-lg-4"><label>Company Name</label></div>
                                    <div class="col-lg-6 required-field-block">
                                        <input class="form-control input-sm" name="company_name" value="<?=isset($_POST['company_name'])?$_POST['company_name']:(isset($customer['company_name'])?$customer['company_name']:'')?>">
                                        <div class="required-icon">
                                            <div class="text">*</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label>Contact Person</label></div>
                                    <div class="col-lg-6"><input class="form-control input-sm" name="contact_person" value="<?=isset($_POST['contact_person'])?$_POST['contact_person']:(isset($customer['contact_person'])?$customer['contact_person']:'')?>"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label>Title</label></div>
                                    <div class="col-lg-6"><input class="form-control input-sm" name="title" value="<?=isset($_POST['title'])?$_POST['title']:(isset($customer['title'])?$customer['title']:'')?>"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label>Email</label></div>
                                    <div class="col-lg-6"><input class="form-control input-sm" type="email"  name="email" value="<?=isset($_POST['email'])?$_POST['email']:(isset($customer['email'])?$customer['email']:'')?>"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label>Handphone</label></div>
                                    <div class="col-lg-6"><input class="form-control input-sm" name="hp" value="<?=isset($_POST['hp'])?$_POST['hp']:(isset($customer['hp'])?$customer['hp']:'')?>"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label>Tel</label></div>
                                    <div class="col-lg-6"><input class="form-control input-sm" name="tel" value="<?=isset($_POST['tel'])?$_POST['tel']:(isset($customer['tel'])?$customer['tel']:'')?>"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label>Fax</label></div>
                                    <div class="col-lg-6"><input class="form-control input-sm" name="fax" value="<?=isset($_POST['fax'])?$_POST['fax']:(isset($customer['fax'])?$customer['fax']:'')?>"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label>Address</label></div>
                                    <div class="col-lg-6"><textarea class="form-control input-sm" rows="5" name="address"><?=isset($_POST['address'])?$_POST['address']:(isset($customer['address'])?$customer['address']:'')?></textarea> </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label>Postal Code</label></div>
                                    <div class="col-lg-6"><input class="form-control input-sm" name="postal_code" value="<?=isset($_POST['postal_code'])?$_POST['postal_code']:(isset($customer['postal_code'])?$customer['postal_code']:'')?>"></div>
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