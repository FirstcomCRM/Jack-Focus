
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Delivery Order</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
          <li><a href="<?=base_url()?>dashboard"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a></li>
          <li class="active">Delivery Order</li>
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
                Delivery Order Listing
               <!--  <div class="pull-right">
                    <input type="hidden" name="hid-exp" id="hid-exp">
                    <a class="btn btn-default btn-xs" id="btn-export" href="<?=base_url()?>invoice/export_invoice"><i class="fa fa-file-excel-o ico-btn"></i> Export</a>
                </div> -->
            </div>
            <div class="panel-body">
                <form role="form"  action="<?=base_url()?>delivery_order">
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="form-group">
                                <input class="form-control input-sm" name="do_no" placeholder="DO No." value="<?=isset($_GET['do_no'])?$_GET['do_no']:''?>">
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <select class="form-control input-sm" name="customer" id="customer">
                                    <option value=""> - All Customers - </option>
                                    <?php foreach ($customers as $customer): ?>
                                    <option value="<?=$customer['customer_id']?>" <?=isset($_GET['customer'])&&$_GET['customer']==$customer['customer_id']?"selected":""?>><?=$customer['company_name']?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <select class="form-control input-sm" name="sort_by">
                                    <option value=""> - Sort By Delivery Date - </option>
                                    <option value="asc" <?=isset($_GET['sort_by'])&&$_GET['sort_by']=='asc'?'selected':''?>>Ascending</option>
                                    <option value="desc" <?=isset($_GET['sort_by'])&&$_GET['sort_by']=='desc'?'selected':''?>>Descending</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-1">
                            <button type="submit" class="btn btn-default btn-sm">Search</button>
                        </div>
                    </div>
                </form>
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>DO No.</th>
                                <th>Customer</th>
                                <th>Date</th>
                                <th>Remark</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($delivery_orders)): ?>
                                <?php foreach ($delivery_orders as $delivery_order): ?>
                                <tr>
                                    <td><?=$delivery_order->do_no?></td>
                                    <td><?=$delivery_order->company_name?></td>
                                    <td><?=date('d M Y', $delivery_order->do_date)?></td>
                                    <td><?=$delivery_order->remark?></td>
                                    <td>
                                        <a title="View" href="<?=base_url()?>delivery_order/view/<?=$delivery_order->do_id?>"><i class="fa fa-search"></i></a>&nbsp
                                        <a title="Edit" href="<?=base_url()?>delivery_order/edit/<?=$delivery_order->do_id?>"><i class="fa fa-pencil-square-o"></i></a>&nbsp
                                        <a title="Delete" href="<?=base_url()?>delivery_order/delete/<?=$delivery_order->do_id?>" onclick="return confirm_delete()" ><i class="fa fa-trash-o"></i></a>
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
    $('#customer').select2();
});
</script>