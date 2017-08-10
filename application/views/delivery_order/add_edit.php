
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?=$action=='add'?'New':'Edit'?> Delivery Order</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
          <li><a href="<?=base_url()?>dashboard"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a></li>
          <li><a href="<?=base_url()?>delivery_order">Delivery Order</a></li>
          <li class="active"><?=$action=='add'?'New':'Edit'?> Delivery Order</li>
            <div class="pull-right">
                <div class="btn-group">
                    <a class="btn btn-default btn-xs" href="<?=base_url()?>delivery_order"><i class="fa fa-arrow-circle-o-left"></i> Back</a>
                </div>
            </div>
        </ol>
    </div>
</div>
<!-- /.row -->
<?php if ($action=='add'): ?>
<div class="row">
    <div class="col-lg-12 text-right">
        <a class="btn btn-default btn-sm" href="<?=base_url()?>invoice/view/<?=$quotation['quotation_id']?>">Cancel</a>
    </div>
</div>
<br>
<?php endif ?>
<?php if ($action=='edit'): ?>
    <div class="row">
        <div class="col-lg-12 text-right">
            <a class="btn btn-default btn-sm" href="<?=base_url()?>delivery_order/view/<?=$quotation['quotation_id']?>"><i class="fa fa-search"></i> View</a>
        </div>
    </div>
<br>
<?php endif ?>
<div class="row">
    <div class="col-lg-12">
        <?php if(isset($msg) && $msg != '') { ?>
        <div class="alert alert-success"><?php echo $msg; ?></div>
        <?php } ?>
    </div>
</div>
<div class="row">
    <?php if(validation_errors()) { ?>
    <div class="col-lg-12">
        <div class="alert alert-danger">
            <strong><?= validation_errors();?></strong>
        </div>
    </div>
    <?php } ?>
</div>
<form method="post">
<?php if ($action=='add'): ?>
    <input type="hidden" name="do_id" value="<?=$invoice['invoice_id']?>">
<?php endif ?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Delivery Order Details
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-4"><label>Customer</label></div>
                                <div class="col-lg-6">
                                    <a href="#" data-toggle="modal" data-target="#cusomter-info"><?=$quotation['company_name']?></a>
                                </div>
                                <div class="modal fade" id="cusomter-info" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                <h4 class="modal-title" id="myModalLabel">Customer Info</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-xs-3 text-right">Company Name:</div>
                                                    <div class="col-xs-9"><?=$customer_info['company_name']?></div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-3 text-right">Contact Person:</div>
                                                    <div class="col-xs-9" ><?=$customer_info['contact_person']?></div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-3 text-right">Title:</div>
                                                    <div class="col-xs-9" ><?=$customer_info['title']?></div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-3 text-right">Email:</div>
                                                    <div class="col-xs-9"><?=$customer_info['email']?></div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-3 text-right">Tel:</div>
                                                    <div class="col-xs-9"><?=$customer_info['tel']?></div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-3 text-right">Fax:</div>
                                                    <div class="col-xs-9"><?=$customer_info['fax']?></div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-3 text-right">Address:</div>
                                                    <div class="col-xs-9"><?=nl2br($customer_info['address'])?></div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-3 text-right">Postal Code:</div>
                                                    <div class="col-xs-9"><?=$customer_info['postal_code']?></div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-4"><label>Invoice No.</label></div>
                                    <div class="col-lg-6 required-field-block">
                                        <input class="form-control input-sm" name="invoice_no" value="<?=isset($invoice['invoice_no'])?$invoice['invoice_no']:(isset($inv_no)?$inv_no:'')?>" readonly>
                                        <div class="required-icon">
                                            <div class="text">*</div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-4"><label>DO No.</label></div>
                                    <div class="col-lg-6 required-field-block">
                                        <input class="form-control input-sm" name="do_no" value="<?=isset($delivery_order['do_no'])?$delivery_order['do_no']:(isset($do_no)?$do_no:'')?>" readonly>
                                        <div class="required-icon">
                                            <div class="text">*</div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-4"><label>Date</label></div>
                                    <div class="col-lg-6 required-field-block">
                                        <input class="form-control input-sm" id="do_date" name="do_date" value="<?=isset($_POST['do_date'])?$_POST['do_date']:(isset($delivery_order['do_date'])?date('d-m-Y',$delivery_order['do_date']):date('d-m-Y'))?>">
                                        <div class="required-icon">
                                            <div class="text">*</div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-4"><label>Remark</label></div>
                                <div class="col-lg-6"><textarea class="form-control input-sm" rows="5" name="remark"><?=isset($_POST['remark'])?$_POST['remark']:(isset($delivery_order['remark'])?$delivery_order['remark']:$invoice['remark'])?></textarea> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                            <div class="clearfix margin-sm-b"></div>
                            <div class="col-sm-12 order-header">Order Product Information</div>
                            <div class="clearfix margin-sm-b"></div>
                            <div class="col-sm-12">
                                <div class="row-fluid grid-area product-grid"> 
                                    <div class="row tbl-head">
                                        <div class="col-md-3">Product</div>
                                        <div class="col-md-2">Quantity</div>
                                        <div class="col-md-2">Remark</div>
                                    </div>
                                    <?php 
                                        if(isset($quotation_products) && count($quotation_products) != 0) { 
                                            $count = 0; 
                                            foreach ($quotation_products as $quotation_product) : 
                                              $row =  ($count%2)==1 ? 'row odd': 'row even';
                                              $classname = $row . ' id-'.$quotation_product['quotation_product_id']; 
                                    ?>
                                            <div class="<?= $classname; ?>"> 
                                                <div class='col-md-3'><?= $quotation_product['product_name']; ?></div>
                                                <div class='col-md-2'><?= $quotation_product['quantity']; ?></div>
                                                <div class='col-md-2'><?= $quotation_product['remark']; ?></div>  
                                            </div>
                                    <?php 
                                            $count++;
                                            endforeach;
                                        }
                                    ?>
                                    <div class="product-add-area"></div>
                                    <div class="clearfix margin-sm-b"></div>
                                    <div class="row">
                                    
                                </div>
                            </div>
                            <div class="clearfix margin-sm-b"></div>
                            <div class="form-group">
                                <label for="dob" class="col-sm-9 control-label"></label>
                                <div class="col-md-3">
                                    <button type="submit" onclick="return confirm_submit()" class="btn btn-primary btn-sm"><?=$action=='add'?'Create':'Update'?></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</div>
</form>
<script>
var base_url = "<?=base_url()?>";
var quotation_id = "<?=$quotation_id?>";
</script>