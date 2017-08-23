<br>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
          <li><a href="<?=base_url()?>dashboard"><i class="fa fa-dashboard fa-fw"></i> Dashboard </a></li>
          <li class="active">Maid</li>
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
                    <?php if($this->session->userdata('maid_add') == 1) {?>  
                        <a class="btn btn-default btn-xs" href="<?=base_url()?>maid/add"><i class="fa fa-plus"></i> Add</a>
                    <?php } ?>    
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <form role="form" action="<?=base_url()?>maid">
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="form-group">
                                <input class="form-control input-sm" name="maid_name" placeholder="Name" value="<?=isset($_GET['maid_name'])?$_GET['maid_name']:''?>">
                            </div>
                        </div>


                <?php if($b !== '4'){ ?>         
      
                  
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

                <?php } ?>        

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
                            	<th>Ref No</th>
                                <th>Maid Code</th>
                                <th>Name</th>
                                <!-- <th>Remarket/Hold/ <br> Selected Date</th> -->
                                <th>Status</th>
                                <!-- <th>Branch</th> -->
                                <!-- <th>Staff</th> -->
                                <!-- <th>Employer</th> -->
                                <th>Supplier</th>
                                <th>Arrived</th>
                                <th>Amount</th>
                                <th>Description</th>
                           
                                <th class="col-md-1">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($maids)): ?>
                                <?php foreach ($maids as $maid): ?>
                                <tr id="<?=$maid->maid_id?>">
                                    
                                    <td><a title="Edit" href="<?=base_url()?>maid/view_full_details/<?=$maid->maid_id?>">
                                    <img class="img-rounded" src = "<?=base_url()?><?=$maid->maid_img?>" height="120" width="95">
                                    </a></td>
                                    <td><?=$maid->maid_ref_no?></td>
                                    <td><?=$maid->maid_code?></td>
                                    <td> <img  src="<?=base_url()?><?=$maid->nationality_flag?>" height="12" width="16"> &nbsp <?=$maid->maid_name?> <br> Age: <?=$maid->maid_age?></td>
                                    <!-- <td><?=$maid->nationality_name?></td> -->
                                    <td><?=$maid->status_name?></td>
                                    <!-- <td><?=$maid->branch_name?></td> -->
                                    <!-- <td><?=$maid->staff_name?></td> -->
                                    <!-- <td><?=$maid->maid_employer?></td> -->
                                    <td><?=$maid->supplier_name?></td>
                                    <td><?php 
                                         if($maid->arrived == 1)
                                         {echo "Yes";}
                                         elseif ($maid->arrived == 0)
                                         { echo "No"; }
                                         ?>
                                    </td>

                                    <td><?=$maid->maid_amount?></td>
                                    <td><?=$maid->maid_description?></td>
                                    <td>
                                        <a title="View More" href="<?=base_url()?>maid/view_full_details/<?=$maid->maid_id?>"><i class="fa fa-info-circle"></i></a>&nbsp
                                        <?php if($this->session->userdata('maid_edit') == 1) {?>  
                                        <a title="Edit" href="<?=base_url()?>maid/edit/<?=$maid->maid_id?>"><i class="fa fa-pencil-square-o"></i></a>&nbsp
                                        <?php } ?>
                                        <?php if($this->session->userdata('maid_del') == 1) {?>  
                                        <a title="Delete" href="<?=base_url()?>maid/delete/<?=$maid->maid_id?>" onclick="return confirm_delete()" ><i class="fa fa-trash-o"></i></a> &nbsp
                                         <?php } ?>
                                        
                                    </td>
                                </tr>
                                <?php endforeach ?>
                            <?php endif ?>
                        </tbody>
                       
                    </table>
                </div>
            </div>
 <!--            <div class="panel-footer">
                <div class="row">
                    <div class="col-lg-6 text-left">
                        <strong><?php echo $pagination_msg?></strong>
                    </div>
                    <div class="col-lg-6 text-right">
                        <?php echo $links; ?>
                    </div>
                </div>
            </div> -->
        </div>
    </div> 
</div>

<script>
$(function(){
    $('#supplier_id').select2();
    $('#nationality_id').select2();
    $('#status_id').select2();
  

        $(window).scroll(function() {
            if($(window).scrollTop() + $(window).height() >= $(document).height()) {
                 

                   var maid_id = $('.table tr:last').attr("id");

                      var url_link = "<?=base_url()?>maid/ajax_load/"+maid_id;

                      $.ajax({
                        url: url_link,
                        beforeSend:function(){
                        // 

                        },                        
                        success: function(data){
                            $('load-img').hide();
                            $('.table tbody').append(data);
                        }
                        });



            }
        });

     
 


});
</script>