
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Purchase Order</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
          <li><a href="<?=base_url()?>dashboard"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a></li>
          <li class="active">Purchase Order</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <?php if(isset($msg) && $msg != '') { ?>
        <div class="alert alert-success"><?php echo $msg; ?></div>
        <?php } ?>
    </div>
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Purchase Order Listing
                <div class="pull-right">
                    <a class="btn btn-default btn-xs" id="btn-export" href="<?=base_url()?>purchase_order/export_po"><i class="fa fa-file-excel-o ico-btn"></i> Export</a>
                    <div class="btn-group">
                        <a class="btn btn-default btn-xs" href="<?=base_url()?>purchase_order/add"><i class="fa fa-plus"></i> Add</a>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <form role="form"  action="<?=base_url()?>purchase_order">
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="form-group">
                                <input class="form-control input-sm" name="po_no" placeholder="PO No." value="<?=isset($_GET['po_no'])?$_GET['po_no']:''?>">
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <select class="form-control input-sm" name="supplier" id="supplier">
                                    <option value=""> - All Suppliers - </option>
                                    <?php foreach ($suppliers as $supplier): ?>
                                    <option value="<?=$supplier['supplier_id']?>" <?=isset($_GET['supplier'])&&$_GET['supplier']==$supplier['supplier_id']?"selected":""?>><?=$supplier['company_name']?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <select class="form-control input-sm" name="sort_by">
                                    <option value=""> - Sort By Date - </option>
                                    <option value="asc" <?=isset($_GET['sort_by'])&&$_GET['sort_by']=='asc'?'selected':''?>>Ascending</option>
                                    <option value="desc" <?=isset($_GET['sort_by'])&&$_GET['sort_by']=='desc'?'selected':''?>>Descending</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <input class="form-control input-sm" name="issued_by" placeholder="Issued By" value="<?=isset($_GET['issued_by'])?$_GET['issued_by']:''?>">
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <select class="form-control input-sm" name="status">
                                    <option value=""> - Status - </option>
                                    <option value="1" <?=isset($_GET['status'])&&$_GET['status']=='1'?'selected':''?>>Fully Paid</option>
                                    <option value="-1" <?=isset($_GET['status'])&&$_GET['status']=='-1'?'selected':''?>>Partial Paid</option>
                                    <option value="0" <?=isset($_GET['status'])&&$_GET['status']=='0'?'selected':''?>>Unpaid</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <button type="submit" class="btn btn-default btn-sm">Search</button>
                        </div>
                    </div>
                </form>
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>PO No.</th>
                                <th>supplier</th>
                                <th>Date</th>
                                <th>Issued By</th>
                                <th>Total Amount</th>
                                <th>GST</th>
                                <th>Total Inc GST</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($purchase_orders)): ?>
                                <?php foreach ($purchase_orders as $purchase_order): ?>
                                <tr>
                                    <td><?=$purchase_order->po_no?></td>
                                    <td><?=$purchase_order->company_name?></td>
                                    <td><?=date('d M Y', $purchase_order->po_date)?></td>
                                    <td><?=$purchase_order->issued_by?></td>
                                    <td>$<?=number_format($purchase_order->total_amount,2)?></td>
                                    <td><?=$purchase_order->gst?>%</td>
                                    <td>$<?=number_format($purchase_order->total_inc_gst,2)?></td>
                                    <td class="<?=$purchase_order->is_paid==1?'text-success':($purchase_order->is_paid==0?'text-danger':'text-warning')?>"><?=$purchase_order->is_paid==1?'Fully Paid':($purchase_order->is_paid==0?'Unpaid':'Partial Paid')?></td>
                                    <td>
                                        <a title="View" href="<?=base_url()?>purchase_order/view/<?=$purchase_order->purchase_order_id?>"><i class="fa fa-search"></i></a>&nbsp
                                        <?php if ($purchase_order->is_paid==0): ?>
                                            <a title="Edit" href="<?=base_url()?>purchase_order/edit/<?=$purchase_order->purchase_order_id?>"><i class="fa fa-pencil-square-o"></i></a>&nbsp
                                            <a title="Delete" href="<?=base_url()?>purchase_order/delete/<?=$purchase_order->purchase_order_id?>" onclick="return confirm_delete()" ><i class="fa fa-trash-o"></i></a>
                                        <?php endif ?>
                                    </td>
                                </tr>
                                <?php endforeach?>
                            <?php endif ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="panel-footer">
                <div class="row">
                    <div class="col-lg-6 text-left">
                        <strong><?php echo $pagination_msg?></strong>
                    </div>
                    <div class="col-lg-6 text-right">
                        <?php echo $links; ?>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</div>

<script>
$(function(){
    $('#supplier').select2();
});
</script>