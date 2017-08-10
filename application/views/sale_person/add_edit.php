
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?=$action=='add'?'New':'Edit'?> Sale person</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
          <li><a href="<?=base_url()?>dashboard"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a></li>
          <li><a href="<?=base_url()?>sale_person">Sale person</a></li>
          <li class="active"><?=$action=='add'?'New':'Edit'?> Sale person</li>
            <div class="pull-right">
                <div class="btn-group">
                    <a class="btn btn-default btn-xs" href="<?=base_url()?>sale_person"><i class="fa fa-arrow-circle-o-left"></i> Back</a>
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
                Sale person Info
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
                                        <input class="form-control input-sm" name="name" value="<?=isset($_POST['name'])?$_POST['name']:(isset($sale_person['name'])?$sale_person['name']:'')?>">
                                        <div class="required-icon">
                                            <div class="text">*</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label>Email</label></div>
                                    <div class="col-lg-6"><input class="form-control input-sm" type="email"  name="email" value="<?=isset($_POST['email'])?$_POST['email']:(isset($sale_person['email'])?$sale_person['email']:'')?>"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label>Handphone</label></div>
                                    <div class="col-lg-6"><input class="form-control input-sm" name="hp" value="<?=isset($_POST['hp'])?$_POST['hp']:(isset($sale_person['hp'])?$sale_person['hp']:'')?>"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label>Tel</label></div>
                                    <div class="col-lg-6"><input class="form-control input-sm" name="tel" value="<?=isset($_POST['tel'])?$_POST['tel']:(isset($sale_person['tel'])?$sale_person['tel']:'')?>"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label>Remark</label></div>
                                    <div class="col-lg-6"><textarea class="form-control input-sm" rows="5" name="remark"><?=isset($_POST['remark'])?$_POST['remark']:(isset($sale_person['remark'])?$sale_person['remark']:'')?></textarea> </div>
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