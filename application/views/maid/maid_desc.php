<br>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
          <li><a href="<?=base_url()?>dashboard"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a></li>
          <li class="active">Maid Description</li>
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
                Maid Description
                <div class="pull-right">
                   
                </div>
            </div>
            <div class="panel-body">
                <form role="form" action="<?=base_url()?>maid/maid_desc">
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="form-group">
                                <input class="form-control input-sm" name="maid_name" placeholder="Maid Name" value="<?=isset($_GET['maid_name'])?$_GET['maid_name']:''?>">
                            </div>
                        </div>

                        <div class="col-lg-2">
                            <div class="form-group">
                                <input class="form-control input-sm" name="maid_code" placeholder="Maid Code" value="<?=isset($_GET['maid_code'])?$_GET['maid_code']:''?>">
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
                           
                                <th>Photo</th>
                                <th>Maid Code</th>
                                <th>Name</th>
                                <th>Maid Description</th>
                                <th>Maid Amount</th>
                                <th>Balance Loan</th>
                                <th>Used Loan</th>
                                <th>Top Up</th>
                                <th class="col-md-1">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($maids)): ?>
                                <?php foreach ($maids as $maid): ?>
                                <tr>
                                    <td>
                                        <img class="img-rounded" src = "<?=base_url()?><?=$maid->maid_img?>" height="120" width="95">
                                    </td>                                   
                                    <td><?=$maid->maid_code?></td>
                                    <td> <?=$maid->maid_name?></td>
                                    <td><?=$maid->maid_description?></td>
                                    <td><?=$maid->maid_amount?></td> 
                                    <td><?=$maid->balance_loan?></td> 
                                    <td><?=$maid->used_loan?></td> 
                                    <td><?=$maid->top_up?></td> 
                                    <td>                                     
                                        <a title="Edit" href="<?=base_url()?>maid/maid_desc_edit/<?=$maid->maid_id?>"><i class="fa fa-pencil-square-o"></i></a>&nbsp
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

<script>
$(function(){
    $('#supplier_id').select2();
    $('#nationality_id').select2();
    $('#status_id').select2();
});
</script>









