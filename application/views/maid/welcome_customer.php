<br>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
          <li><a href="<?=base_url()?>dashboard"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a></li>
          <li><a href="<?=base_url()?>maid">Maid</a></li>
          <li><a href="<?=base_url()?>maid/tablet_view">Tablet View</a></li>
          <li class="active">Replace</li>
            <div class="pull-right">
                <div class="btn-group">
                    <a class="btn btn-default btn-xs" href="<?=base_url()?>maid/tablet_view"><i class="fa fa-arrow-circle-o-left"></i> Back</a>
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
                 Customer Information
                 <div class="pull-right">
                    <div class="btn-group">
                        <a class="btn btn-default btn-xs" href="<?=base_url()?>customer_maid/add"><i class="fa fa-plus"></i> Create Customer Profile</a>
                    </div>
                </div>

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
                    <form role="form" id="JackForm" method="post" action="<?php echo base_url() . 'maid/replace'?>">
                        <div class="col-lg-12"> <!-- F -->
                   
                        
                       <div class="form-group">
                                <div class="row">
                                <div class="col-lg-2"><label>Name </label></div>
                                <div class="col-lg-5">
                                   <input type="hidden" name="maid_id" id="maid_id" value="<?php echo $maidn['maid_id']; ?>" > 
                                    <select class="form-control input-sm" name="customer_id" id="customer-id">
                                        <?php if ($customers!=''): ?>
                                            <option value=""> - Your Name Here - </option>
                                            <?php foreach ($customers as $customer): ?>
                                            <option value="<?=$customer['customer_id']?>" <?=isset($_POST['customer_id'])&&$customer['customer_id']==$_POST['customer_id']?"select":(isset($quotation['customer_id'])&&$quotation['customer_id']==$customer['customer_id']?'selected':'')?>><?= $customer['customer_name'] . "       ID-" . $customer['customer_id'] ?></option>
                                          
                                            <?php endforeach ?>
                                        <?php endif ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                                <div class="row">
                                <div class="col-lg-2"><label>Current Maid </label></div>
                                <div class="col-lg-5">
                                    <select class="form-control input-sm" name="maid_id_1" id="maid_id_1">
                                        <?php if ($maids!=''): ?>
                                            <option value=""> - Your Maid Here - </option>
                                            <?php foreach ($maids as $maid): ?>
                                            <option value="<?=$maid['maid_id']?>" <?=isset($_POST['maid_id'])&&$maid['maid_id']==$_POST['maid_id']?"select":(isset($quotation['maid_id'])&&$quotation['maid_id']==$maid['maid_id']?'selected':'')?>><?= $maid['maid_name'] . "       ID-" . $maid['maid_id'] ?></option>
                                          
                                            <?php endforeach ?>
                                        <?php endif ?>
                                    </select>
                                </div>
                            </div>
                        </div>

 


                    


                       

                            

                           

                           

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2">
                                    	<button type="submit" onclick="return confirm_submit()" class="btn btn-primary btn-sm">Proceed</button>
                                      
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


<script type="text/javascript">
$("#customer-id").select2();
$("#maid_id_1").select2();
</script>