
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?=$action=='add'?'New':'Edit'?> Nationality</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
          <li><a href="<?=base_url()?>dashboard"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a></li>
          <li><a href="<?=base_url()?>nationality"> Nationality</a></li>
          <li class="active"><?=$action=='add'?'New':'Edit'?> Nationality</li>
            <div class="pull-right">
                <div class="btn-group">
                    <a class="btn btn-default btn-xs" href="<?=base_url()?>nationality"><i class="fa fa-arrow-circle-o-left"></i> Back</a>
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
                Nationality Info
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
                                    <div class="col-lg-4"><label>Nationality Name</label></div>
                                    <div class="col-lg-6 required-field-block">
                                        <input class="form-control input-sm" name="nationality_name" value="<?=isset($_POST['nationality_name'])?$_POST['nationality_name']:(isset($nationality['nationality_name'])?$nationality['nationality_name']:'')?>">
                                        <div class="required-icon">
                                            <div class="text">*</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label>Nationality Remarks</label></div>
                                    <div class="col-lg-6 required-field-block">
                                        <input class="form-control input-sm" name="nationality_remarks" value="<?=isset($_POST['nationality_remarks'])?$_POST['nationality_remarks']:(isset($nationality['nationality_remarks'])?$nationality['nationality_remarks']:'')?>">
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