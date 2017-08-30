<!-- <br>
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
               Sales
                <div class="pull-right">
                
                </div>
            </div>
            <div class="panel-body">
                <form role="form" action="<?=base_url()?>sales">
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="form-group">
                                <input class="form-control input-sm" name="receipt_no" placeholder="Receipt No" value="<?=isset($_GET['insurance_name'])?$_GET['insurance_name']:''?>">
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
                                <th>Customer's name</th>
                                <th>FDW's name</th>
                                <th>FDW Id</th>
                                <th>Ref no.</th>
                                <th>Fee</th>
                                <th>Net Before GST</th>
                                <th>GST</th>
                                <th>Total Inc. GST </th>
                            
                                <th>Remarks</th>
                                <th>Invoice no.</th>
                                <th>Payment mode</th>
                                <th>Staff Id</th>
                                
                                <th class="col-md-1">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($salesx)): ?>
                                <?php foreach ($salesx as $sales): ?>
                                <tr>
                                    <td><?=date('d M Y',$sales->payment_date)?></td>
                                    <td><?=$sales->customer_name?></td>
                                    <td><?=$sales->maid_name?></td>
                                    <td><?=$sales->maid_id?></td>
                                    <td><?=$sales->maid_ref_no?></td>
                                    <td><?=$sales->amount?></td>
                                    <td><?=$sales->total_amount?></td>
                                    <td><?=$sales->gst?></td>
                                    <td><?=$sales->total_inc_gst?></td>
                       
                                    <td><?=$sales->remark?></td>
                                    <td><?=$sales->quotation_no?></td>
                                    <td><?=$sales->payment_type?></td>
                                     <td><?=$sales->staff_id?></td>

                              
                               
                              
                                
                               
                           
                     
                           
                            
           

  
                                 <td>
             
                                        
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
</div> -->