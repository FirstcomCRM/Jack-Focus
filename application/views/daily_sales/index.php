<br>
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
               Daily Sales
                <div class="pull-right">
                 
                </div>
            </div>
            <div class="panel-body">
                <form role="form" action="<?=base_url()?>daily_sales">
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="form-group">
                                <input class="form-control input-sm" name="date" placeholder="Date" value="<?=isset($_GET['date'])?$_GET['date']:''?>">
                            </div>
                        </div>
                        <!------ dito -->
                        <div class="col-lg-2">
                            <button type="submit" class="btn btn-default btn-sm">Search</button>
                        </div>
                    </div>
                </form>
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                            	<th>Date</th>
                                <th>Cash</th>
                                <th>Cheque</th>
                                <th>Nets</th>
                                <th>Credit Cards</th>
                                <th>Total(CASH/CHQ/NETS)</th>
                                <th>Total(7% GST)</th>     
                                <th class="col-md-1">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($daily_salesx)): ?>
                                <?php foreach ($daily_salesx as $daily_sales): ?>
                                <tr>
                                    <td><?=$daily_sales->date?></td>
                                    <td><?=$daily_sales->cash?></td>
                                    <td><?=$daily_sales->cheque?></td>
                                    <td><?=$daily_sales->nets?></td>
                                    <td><?=$daily_sales->credit_cards?></td>
                                    <td><?=$daily_sales->total?></td>
                                    <td><?=$daily_sales->total_gst?></td>
                                    
                                    <td>
             
                                        <a title="Edit" href="<?=base_url()?>daily_sales/edit/<?=$daily_sales->daily_sales_id?>"><i class="fa fa-pencil-square-o"></i></a>&nbsp
                                        <a title="Delete" href="<?=base_url()?>daily_sales/delete/<?=$daily_sales->daily_sales_id?>" onclick="return confirm_delete()" ><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                                <?php endforeach ?>
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