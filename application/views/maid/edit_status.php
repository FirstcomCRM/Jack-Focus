<br>


<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                 <p>Update Maid Status</p>
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
            
                        <div class="col-lg-6 ">
                                   <h3>
                                        <?=isset($_POST['maid_name'])?$_POST['maid_name']:(isset($maid['maid_name'])?$maid['maid_name']:'')?>
                                  </h3>
                        </div>
                  	</div>
                <div class="row">
                    <form role="form" id="JackForm"  method="post">
                        <div class="col-lg-12 "> <!-- F -->
							  <div class="col-lg-2"><label>Status</label></div>
                                    <div class="col-lg-4">
                                        <select name="status_id" class="form-control input-sm" id="status">
                                            <option value="">- Please Select Status-</option>
                                            <?php if ($statusx!=''): ?>
                                                  <?php foreach ($statusx as $status): ?>
                                                    <option value="<?=$status['status_id']?>" <?=isset($_POST['status_id'])&&$status['status_id']==$_POST['status_id']?'select':(isset($maid['status_id'])&&$maid['status_id']==$status['status_id']?'selected':'')?>><?=$status['status_name']?></option>
                                                    <?php endforeach ?>
                                            <?php endif ?>
                                        </select>
                                    </div>
                            </div>
 					</div>
 					<br>
                            <div class="form-group">
                                <div class="row">
                            
                                    <div class="col-lg-6 col-md-offset-5">
                                        <button type="submit" onclick="return confirm_submit()" class="btn btn-primary btn-sm"><?=$action=='add'?'Create':'Update'?></button>
                                    </div>
                                </div>
                            </div>


                       
                    </form>
                </div>
            </div>
        </div>
    </div> 
</div>



