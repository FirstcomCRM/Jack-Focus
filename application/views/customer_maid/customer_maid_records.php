<br>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
          <li><a href="<?=base_url()?>dashboard"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a></li>
          <li class="active">Maid Records</li>
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
                Maid Records
              <!--   <div class="pull-right">
                    <div class="btn-group">
                        <a class="btn btn-default btn-xs" href="<?=base_url()?>maid/add"><i class="fa fa-plus"></i> Add</a>
                    </div>
                </div> -->
            </div>
            <div class="panel-body">
                <form role="form" action="<?=base_url()?>maid">
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="form-group">
                                <input class="form-control input-sm" name="maid_name" placeholder="Name" value="<?=isset($_GET['maid_name'])?$_GET['maid_name']:''?>">
                            </div>
                        </div>



                         <div class="col-lg-2">
                            <div class="form-group">
                                <select class="form-control input-sm" name="supplier_name" id="supplier_id">
                                    <option value=""> - All Suppliers - </option>
                                    <?php foreach ($suppliers as $supplier): ?>
                                    <option value="<?=$supplier['supplier_id']?>" <?=isset($_GET['supplier_name'])&&$_GET['supplier_name']==$supplier['supplier_id']?"selected":""?>><?=$supplier['supplier_name']?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-2">
                            <div class="form-group">
                                <select class="form-control input-sm" name="nationality_name" id="nationality_id">
                                    <option value=""> - All Nationality - </option>
                                    <?php foreach ($nationalities as $nationality): ?>
                                    <option value="<?=$nationality['nationality_id']?>" <?=isset($_GET['nationality_name'])&&$_GET['nationality_name']==$nationality['nationality_id']?"selected":""?>><?=$nationality['nationality_name']?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>

                             <div class="col-lg-2">
                            <div class="form-group">
                                <select class="form-control input-sm" name="status_name" id="status_id">
                                    <option value=""> - Status - </option>
                                    <?php foreach ($statusx as $status): ?>
                                    <option value="<?=$status['status_id']?>" <?=isset($_GET['status_name'])&&$_GET['status_name']==$status['status_id']?"selected":""?>><?=$status['status_name']?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>

                  


                    
                        <!--insert here -->
                        <div class="col-lg-2">
                            <button type="submit" class="btn btn-default btn-sm">Search</button>
                        </div>
                    </div>
                </form>
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Invoice No.</th>
                                <th>Customer Id</th>
                            	<th>Customer</th>
                                <th>Maid Id</th>
                                <th>Maid</th>
                                <th>Select Date</th>
                                <th>Total Amount</th>
                  
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($customers_and_maids)): ?>
                                <?php foreach ($customers_and_maids as $cnm): ?>
                                <tr>
                             
         
                                 
                                    <td><?=$cnm->quotation_id?></td>
                                    <td><?=$cnm->customer_id?></td>
                                    <td><?=$cnm->customer_name?></td>
                                    <td><?=$cnm->maid_id?></td>
                                    <td><?=$cnm->maid_name?></td>
                                    <td><?=$cnm->select_date?></td>
                                    <td><?=$cnm->total_amount?></td>
                            

                                    <!--<td><?=date('d M Y', $customer->last_update)?></td>-->
                                
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

