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
                <form role="form" action="<?=base_url()?>maid_record">
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="form-group">
                                <input class="form-control input-sm" name="customer_name" placeholder="Employer Name" value="<?=isset($_GET['customer_name'])?$_GET['customer_name']:''?>">
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <input class="form-control input-sm" name="customer_code" placeholder="Employer Code" value="<?=isset($_GET['customer_code'])?$_GET['customer_code']:''?>">
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <input class="form-control input-sm" name="customer_email" placeholder="Employer Email" value="<?=isset($_GET['customer_email'])?$_GET['customer_email']:''?>">
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <input class="form-control input-sm" name="employer_ic_no" placeholder="Employer I/C No." value="<?=isset($_GET['employer_ic_no'])?$_GET['employer_ic_no']:''?>">
                            </div>
                        </div>
                         <div class="col-lg-2">
                            <div class="form-group">
                                <select name="sort_by" class="form-control input-sm">
                                    <option value="DESC" <?=isset($_GET['sort_by']) ? ($_GET['sort_by'] == 'DESC') ? 'selected' : '':''?> >DESC</option>
                                    <option value="ASC" <?=isset($_GET['sort_by']) ? ($_GET['sort_by'] == 'ASC') ? 'selected' : '':''?> >ASC</option>

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
                                <th>Customer Code</th>
                            	<th>Employer Name</th>
                                <th>Maid Code</th>
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
                                    <td><?=$cnm->customer_code?></td>
                                    <td><?=$cnm->customer_name?></td>
                                    <td><?=$cnm->maid_code?></td>
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

