<br>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
          <li><a href="<?=base_url()?>dashboard"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a></li>
          <li class="active">Supplier</li>
           <li class="active">Maid List</li>
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
                Maid Listing
                 <div class="pull-right">
                    <div class="btn-group">
                        <a class="btn btn-default btn-xs" href="<?=base_url()?>supplier/index"></i> BACK</a>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <form role="form" action="<?=base_url()?>supplier/maid_list">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <input class="form-control input-sm" name="maid_name" placeholder="Name" value="<?=isset($_GET['maid_name'])?$_GET['maid_name']:''?>">                                 
                            </div>
                        </div>

                        <input type="hidden" class="form-control input-sm" name="supplier_id" placeholder="Name" value="<?=isset($_GET['supplier_id'])?$_GET['supplier_id']:''?>"> 

                      

                        <div class="col-lg-3">
                            <div class="form-group">
                                <select class="form-control input-sm" name="nationality_name" id="nationality_id">
                                    <option value=""> - All Nationality - </option>
                                    <?php foreach ($nationalities as $nationality): ?>
                                    <option value="<?=$nationality['nationality_id']?>" <?=isset($_GET['nationality_name'])&&$_GET['nationality_name']==$nationality['nationality_id']?"selected":""?>><?=$nationality['nationality_name']?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>

                             <div class="col-lg-3">
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
                        <div class="col-lg-3">
                            <button type="submit" class="btn btn-default btn-sm">Search</button>
                        </div>
                    </div>
                </form>
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Photo</th>
                            	<th>Ref No</th>
                                <th>Name</th>
                                <th>Remarket/Hold/ <br> Selected Date</th>
                                <th>Status</th>
                                <th>Branch</th>
                                <th>Staff</th>
                                <th>Employer</th>
                                <th>Supplier</th>
                                <th>Arrived</th>
                              
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($maids)): ?>
                                <?php foreach ($maids as $maid): ?>
                                <tr>
                                    <td><img class="img-rounded" src = "<?=base_url()?><?=$maid->maid_img?>" height="120" width="95"> </td>
                                    <td><?=$maid->maid_ref_no?></td>
                                    <td> <img  src="<?=base_url()?><?=$maid->nationality_flag?>" height="12" width="16"> &nbsp <?=$maid->maid_name?> <br> Age: <?=$maid->maid_age?></td>
                                    <td><?=$maid->nationality_name?></td>
                                    <td><?=$maid->status_name?></td>
                                    <td><?=$maid->branch_name?></td>
                                    <td><?=$maid->staff_name?></td>
                                    <td><?=$maid->maid_employer?></td>
                                    <td><?=$maid->supplier_name?></td>
                                    <td><?php 
                                         if($maid->arrived == 1)
                                         {echo "Yes";}
                                         elseif ($maid->arrived == 0)
                                         { echo "No"; }
                                         ?>
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
                        <?php
                        // var_dump($links);
                         echo $links; ?>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</div>

