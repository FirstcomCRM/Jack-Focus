
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?=$action=='add'?'New':'Photo'?>  </h1>
        <?php if(isset($error))
        echo $error;
        ?>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
          <li><a href="<?=base_url()?>dashboard"><i class="fa fa-dashboard fa-fw"></i>Dashboard</a></li>
          <li><a href="<?=base_url()?>Nationality"> Flag</a></li>
          <li class="active"><?=$action=='add'?'New':'Photo'?></li>
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
                Photo
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
                    <form role="form" method="post" enctype = "multipart/form-data">
                        <div class="col-lg-6">
                             <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"></div>
                                    <div class="col-lg-6 required-field-block">
                                    <h1><?=$nationality['nationality_name']?><h1>
                                    <img src = "<?=base_url()?><?=$nationality['nationality_flag']?>" name="flag_img" height="150" width="250">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>

                        <?php echo form_open_multipart('nationality/do_upload/');?>

                        			<h4>.png files only *to be updated<h4>
                                    <input type="file" name="userfile" size="20" />
                                    <br />
                                    <input type="submit" value="upload" />
                                    <input type="hidden" name="image" value="<?php echo "ID-". $nationality['nationality_id'] ?>">
                                    <input type="hidden" name="nationality_id" value="<?php echo $nationality['nationality_id'] ?>">
                                   <!-- <input type="hidden" name="maid_img_path" value="<?php echo "public/flag_pictures/ID-".$nationality['nationality_id'].".jpg"; ?>">-->
                                   	<input type="hidden" name="flag_img_path" value="<?php echo "public/flag_pictures/ID-".$nationality['nationality_id'].".png"; ?>">
                                    </form>
                </div>
            </div>
        </div>
    </div> 
</div>

