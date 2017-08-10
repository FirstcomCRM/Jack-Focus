
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?=$action=='add'?'New':'Edit'?> Announcement</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
          <li><a href="<?=base_url()?>dashboard"><i class="fa fa-dashboard fa-fw"></i>Dashboard</a></li>
          <li><a href="<?=base_url()?>announcement">Announcement</a></li>
          <li class="active"><?=$action=='add'?'New':'Edit'?> Announcement</li>
            <div class="pull-right">
                <div class="btn-group">
                    <a class="btn btn-default btn-xs" href="<?=base_url()?>announcement"><i class="fa fa-arrow-circle-o-left"></i> Back</a>
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
                Announcement Details
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
                                    <div class="col-lg-4"><label>Title</label></div>
                                    <div class="col-lg-6 required-field-block">
                                        <input class="form-control input-sm" name="announce_title" value="<?=isset($_POST['announce_title'])?$_POST['announce_title']:(isset($announcement['announce_title'])?$announcement['announce_title']:'')?>">
                                        <div class="required-icon">
                                            <div class="text">*</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label>Announcement</label></div>
                                    <div class="col-lg-6"><textarea class="form-control input-sm" rows="5" name="announce_body"><?=isset($_POST['announce_body'])?$_POST['announce_body']:(isset($announcement['announce_body'])?$announcement['announce_body']:'')?></textarea> </div>
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