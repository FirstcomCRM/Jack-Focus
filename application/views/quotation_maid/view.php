

</div>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
          <li><a href="<?=base_url()?>dashboard"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a></li>
          <li><a href="<?=base_url()?>quotation_maid">Quotation</a></li>
          <li class="active">View Quotation</li>
            <div class="pull-right">
                <div class="btn-group">
                    <a class="btn btn-default btn-xs" href="<?=base_url()?>quotation_maid"><i class="fa fa-arrow-circle-o-left"></i> Back</a>
                </div>
            </div>
        </ol>
    </div>
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <?php if(isset($msg) && $msg != '') { ?>
        <div class="alert alert-success"><?php echo $msg; ?></div>
        <?php } ?>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 text-right">
        <a class="btn btn-default btn-sm" href="<?=base_url()?>quotation_maid/print_preview/<?=$quotation['quotation_id']?>" target="_blank"><i class="fa fa-print"></i> Print</a>
        <?php if ($quotation['is_close']==0): ?>
            <a class="btn btn-default btn-sm" href="<?=base_url()?>invoice_maid/add/<?=$quotation['quotation_id']?>" onclick="return confirm_produce_invoice()"><i class="fa fa-file-text-o"></i> Generate Invoice</a>
            <a class="btn btn-default btn-sm" href="<?=base_url()?>quotation_maid/edit/<?=$quotation['quotation_id']?>"><i class="fa fa-pencil-square-o"></i> Edit</a>
        <?php endif ?>
    </div>
</div>
<br>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Quotation Details
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-4"><label>Customer</label></div>
                                <div class="col-lg-6">
                                    <a href="#" data-toggle="modal"data-target="#cusomter-info" value="<?=$quotation['customer_id']?>"><?=$quotation['customer_name']?></a>
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
                                <div class="col-lg-4"><label>Quotation No.</label></div>
                                <div class="col-lg-6"><?=$quotation['quotation_no']?></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-4"><label>Date</label></div>
                                <div class="col-lg-6"><?=date('d M Y',$quotation['quotation_date'])?></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-4"><label>Status</label></div>
                                <div class="col-lg-6 <?=$quotation['is_close']==1?'text-success':'text-danger'?>"><?=$quotation['is_close']==1?'Closed':'Pending'?></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-4"><label>Payment Terms</label></div>
                                <div class="col-lg-6"><?=$quotation['payment_terms']?></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-4"><label>Issued By</label></div>
                                <div class="col-lg-6"><?=$quotation['issued_by']?></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-4"><label>Sale Person</label></div>
                                <div class="col-lg-6"><?=$quotation['s_name']?></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-4"><label>Remark</label></div>
                                <div class="col-lg-6"><?=nl2br($quotation['remark'])?></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                    <div class="col-lg-4"><label>Internal Remark <br>(Not showing on printing page)</label></div>
                                <div class="col-lg-6"><?=nl2br($quotation['internal_remark'])?></div>
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
                                        <div class="col-md-2">Unit Pirce</div>
                                        <div class="col-md-2">Quantity</div>
                                        <div class="col-md-2">Total</div>
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
                                                <div class='col-md-3'><?= $quotation_product['maid_name']; ?></div>
                                                <div class='col-md-2'>$<?= $quotation_product['unit_price']; ?></div>
                                                <div class='col-md-2'><?= $quotation_product['quantity']; ?></div>
                                                <div class='col-md-2 col-total'>$<?= $quotation_product['total_amount']; ?></div>  
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
                                    <div class="clearfix margin-sm-b"></div>
                                    <div class="row">
                                        <div class="col-md-9 text-right">Total Amount :</div>
                                        <div class="col-md-2">$<?=$quotation['total_amount']?></div> 
                                        <div class="clearfix margin-sm-b"></div> 
                                        <div class="col-md-9 text-right">GST :</div>
                                        <div class="col-md-2"><?=$quotation['gst']?>%</div> 
                                        <div class="clearfix margin-sm-b"></div> 
                                        <div class="col-md-9 text-right">Total Inc. GST :</div>
                                        <div class="col-md-2">$<?=$quotation['total_inc_gst']?></div> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</div>
<script>
var base_url = "<?=base_url()?>";
</script>