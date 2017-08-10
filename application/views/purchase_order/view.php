
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">View Purchase Order</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
          <li><a href="<?=base_url()?>dashboard"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a></li>
          <li><a href="<?=base_url()?>purchase_order">Purchase Order</a></li>
          <li class="active">View Purchase Order</li>
            <div class="pull-right">
                <div class="btn-group">
                    <a class="btn btn-default btn-xs" href="<?=base_url()?>purchase_order"><i class="fa fa-arrow-circle-o-left"></i> Back</a>
                </div>
            </div>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 text-right">
        <a class="btn btn-default btn-sm" href="<?=base_url()?>purchase_order/print_preview/<?=$purchase_order['purchase_order_id']?>" target="_blank"><i class="fa fa-print"></i> Print</a>
        <?php if ($purchase_order['is_paid']==0): ?>
            <a class="btn btn-default btn-sm" href="<?=base_url()?>purchase_order/edit/<?=$purchase_order['purchase_order_id']?>"><i class="fa fa-pencil-square-o"></i> Edit</a>
        <?php endif ?>
    </div>
</div>
<br>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <?php if(isset($msg) && $msg != '') { ?>
        <div class="alert alert-success"><?php echo $msg; ?></div>
        <?php } ?>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Purchase Order Details
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-4"><label>Supplier</label></div>
                                <div class="col-lg-6">
                                    <a href="#" data-toggle="modal"data-target="#supplier-info" value="<?=$purchase_order['supplier_id']?>"><?=$purchase_order['company_name']?></a>
                                </div>
                                <div class="modal fade" id="supplier-info" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                <h4 class="modal-title" id="myModalLabel">Supplier Info</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-xs-3 text-right">Company Name:</div>
                                                    <div class="col-xs-9"><?=$supplier_info['company_name']?></div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-3 text-right">Contact Person:</div>
                                                    <div class="col-xs-9" ><?=$supplier_info['contact_person']?></div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-3 text-right">Title:</div>
                                                    <div class="col-xs-9" ><?=$supplier_info['title']?></div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-3 text-right">Email:</div>
                                                    <div class="col-xs-9"><?=$supplier_info['email']?></div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-3 text-right">Tel:</div>
                                                    <div class="col-xs-9"><?=$supplier_info['tel']?></div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-3 text-right">Fax:</div>
                                                    <div class="col-xs-9"><?=$supplier_info['fax']?></div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-3 text-right">Address:</div>
                                                    <div class="col-xs-9"><?=nl2br($supplier_info['address'])?></div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-3 text-right">Postal Code:</div>
                                                    <div class="col-xs-9"><?=$supplier_info['postal_code']?></div>
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
                                <div class="col-lg-4"><label>PO No.</label></div>
                                <div class="col-lg-6"><?=$purchase_order['po_no']?></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-4"><label>Date</label></div>
                                <div class="col-lg-6"><?=date('d M Y',$purchase_order['po_date'])?></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-4"><label>Status</label></div>
                                <div class="col-lg-6 <?=$purchase_order['is_paid']==1?'text-success':($purchase_order['is_paid']==0?'text-danger':'text-warning')?>"><?=$purchase_order['is_paid']==1?'Fully Paid':($purchase_order['is_paid']==0?'Unpaid':'Partial Paid')?></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-4"><label>Issued By</label></div>
                                <div class="col-lg-6"><?=$purchase_order['issued_by']?></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-4"><label>Remark</label></div>
                                <div class="col-lg-6"><?=nl2br($purchase_order['remark'])?></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-4"><label>Internal Remark</label></div>
                                <div class="col-lg-6"><?=nl2br($purchase_order['internal_remark'])?></div>
                            </div>
                        </div>
                    </div>
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
                                    if(isset($po_products) && count($po_products) != 0) { 
                                        $count = 0; 
                                        foreach ($po_products as $po_product) : 
                                          $row =  ($count%2)==1 ? 'row odd': 'row even';
                                          $classname = $row . ' id-'.$po_product['po_product_id']; 
                                ?>
                                        <div class="<?= $classname; ?>"> 
                                            <div class='col-md-3'><?= $po_product['product_name']; ?></div>
                                            <div class='col-md-2'><?= $po_product['unit_price']; ?></div>
                                            <div class='col-md-2'><?= $po_product['quantity']; ?></div>
                                            <div class='col-md-2 col-total'><?= $po_product['total_amount']; ?></div>  
                                            <div class='col-md-2'><?= $po_product['remark']; ?></div>  
                                        </div>
                                <?php 
                                        $count++;
                                        endforeach;
                                    }
                                ?>
                                <div class="clearfix margin-sm-b"></div>
                                <div class="row">
                                    <div class="col-md-9 text-right">Total Amount :</div>
                                    <div class="col-md-2">$<?=$purchase_order['total_amount']?></div> 
                                    <div class="clearfix margin-sm-b"></div> 
                                    <div class="col-md-9 text-right">GST :</div>
                                    <div class="col-md-2"><?=$purchase_order['gst']?>%</div> 
                                    <div class="clearfix margin-sm-b"></div> 
                                    <div class="col-md-9 text-right">Total Inc. GST :</div>
                                    <div class="col-md-2">$<?=$purchase_order['total_inc_gst']?></div> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Payment Details
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-8">
                        <table class="table table-hover" id="payment-records">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Amount</th>
                                    <th>Payment Type</th>
                                    <th>Remark</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($payments!=''): ?>
                                    <?php foreach ($payments as $payment): ?>
                                        <tr>
                                            <td><?=date('d M Y', $payment['payment_date'])?></td>
                                            <td>$<?=number_format($payment['amount'],2)?></td>
                                            <td><?=$payment['payment_type']?></td>
                                            <td><?=nl2br($payment['remark'])?></td>
                                            <td>
                                                <a class="btn btn-xs"  title="Delete" href="<?=base_url()?>purchase_order/delete_payment/<?=$purchase_order['purchase_order_id']?>/<?=$payment['po_payment_id']?>" onclick="return confirm_delete()" ><i class="fa fa-trash-o"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                <?php endif ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-4">
                        <div class="row">
                            <div class="col-xs-12">Total Paid: $<?=number_format($purchase_order['total_paid'], 2)?></div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">Total Payable: $<?=round($purchase_order['total_paid'],2)<round($purchase_order['total_amount']*($purchase_order['gst']/100+1),2)?number_format($purchase_order['total_amount']*($purchase_order['gst']/100+1)-$purchase_order['total_paid'],2):'0.00'?></div>
                        </div>
                        <br>
                        <form method="post">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Add Payment
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
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <div class="row">
                                                <input type="hidden" name="purchase_order_id" value="<?=$purchase_order['purchase_order_id']?>">
                                                <div class="col-lg-4"><label>Date</label></div>
                                                <div class="col-lg-8"><input class="form-control input-sm" id="payment_date" name="payment_date" value="<?=isset($_POST['payment_date'])?$_POST['payment_date']:date('d-m-Y')?>"></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-4"><label>Amount</label></div>
                                                <div class="col-lg-8"><input class="form-control input-sm" name="amount" value="<?=isset($_POST['amount'])?$_POST['amount']:''?>"></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-4"><label>Payment Type</label></div>
                                                <div class="col-lg-8">
                                                    <select class="form-control input-sm" name="payment_type">
                                                        <option value="">- Please Select Payment Type -</option>
                                                        <option value="Cash">Cash</option>
                                                        <option value="Cheque">Cheque</option>
                                                        <option value="Other">Other</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-4"><label>Remark</label></div>
                                                <div class="col-lg-8">
                                                    <textarea class="form-control input-sm" name="remark"><?=isset($_POST['remark'])?$_POST['remark']:''?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-4"></div>
                                                <div class="col-lg-8">
                                                    <button type="submit" onclick="return confirm_payment()" class="btn btn-primary btn-sm">Add</button>
                                                </div>
                                            </div>
                                        </div>
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
</div>
<script>
var base_url = "<?=base_url()?>";
var purchase_order_id = "<?=$purchase_order_id?>";
</script>