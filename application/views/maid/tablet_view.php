<br>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
          <li><a href="<?=base_url()?>dashboard"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a></li>
          <li><a href="<?=base_url()?>maid">Maid</a></li>
          <li class="active"> Tablet View</li>
            <div class="pull-right">
                <div class="btn-group">
                    <a class="btn btn-default btn-xs" href="<?=base_url()?>maid"><i class="fa fa-arrow-circle-o-left"></i> Back</a>
                </div>
            </div>
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
                        <a class="btn btn-default btn-xs" href="<?=base_url()?>maid/add"><i class="fa fa-plus"></i> Add</a>
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


                         </form>

                      

                    </div>
               


                    
                         <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle pull-right" type="button" data-toggle="dropdown">
                                     Cart &nbsp<i class="fa fa-shopping-cart"></i>&nbsp( 
                                     <span id="cart-item-count">
                                         <?php echo ($this->session->userdata('arr_data')) ? count($this->session->userdata('arr_data')) : 0 ?>
                                     </span> )
                            </button> 

                            <ul class="dropdown-menu" id="dropdown-cart-item">
                               <?php  if($cart_item){
            
                                            foreach ($cart_item as $value => $r) {          
                                ?>
                                                <li>
                                                    <div class="row">
                                                        <div class="col-xs-4">
                                                             <img class="img-rounded" src = "<?=base_url()?><?=$r[0]->maid_img?>" height="120" width="95">
                                                        </div>
                                                        <div class="col-xs-7">
                                                            <p><?=$r[0]->maid_name?></p>
                                                            <p><?=$r[0]->maid_code?></p>
                                                        </div>
                                                        <div class="col-xs-1">
                                                           <button onClick="removeToCart(<?=$r[0]->maid_id?>)" class="btn btn-danger btn-xs"><i class="fa fa-times"></i></button> 
                                                        </div>
                                                        
                                                    </div>

                                                </li>       
                                                


                                <?php    } ?>
                                            <li><a class="pull-right red-view" href="<?=base_url()?>maid/view_cart_summary"> View Summary </a></li>

                                 <?php       } else { ?>

                                        <li>Empty Cart</li>
                                 <?php  } ?>        
                          
                            </ul>
                          </div>
                    


               

                 

                 <br> <br>     
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
                                <th class="col-md-1">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($maids)): ?>
                                <?php foreach ($maids as $maid): ?>
                                <tr>
                                    <td><a title="Edit" href="<?=base_url()?>maid/edit_img/<?=$maid->maid_id?>">
                                    <img class="img-rounded" src = "<?=base_url()?><?=$maid->maid_img?>" height="120" width="95">
                                    </a></td>
                                    <td><?=$maid->maid_ref_no?></td>
                                    <td> <img  src="<?=base_url()?><?=$maid->nationality_flag?>" height="12" width="16"> &nbsp <?=$maid->maid_name?> <br> Age: <?=$maid->maid_age?><br><?=$maid->nationality_name?></td>
                                    <td><?=$maid->status_name?></td>
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

                                    <!--<td><?=date('d M Y', $customer->last_update)?></td>-->
                                    <td>
                                        <a title="View More" href="<?=base_url()?>maid/view_full_details/<?=$maid->maid_id?>"><i class="fa fa-info-circle"></i></a>&nbsp&nbsp
                                         <span title="Add Cart" id="add-to-cart" onClick="addToCart(<?=$maid->maid_id?>)"><i class="fa fa-shopping-cart"></i></span>&nbsp&nbsp
                                     <!--    <a title="Purchase" href="<?=base_url()?>invoice/add_by_customer/<?=$maid->maid_id?>"><i class="fa fa-shopping-cart"></i></a>&nbsp -->
                                        <a title="Replace" href="<?=base_url()?>maid/welcome_customer/<?=$maid->maid_id?>"  ><i class="fa fa-retweet"></i></a> &nbsp
                                       

                                        
                                    </td>
                                </tr>
                                <?php endforeach ?>
                            <?php endif ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <<!-- div class="panel-footer">
               
            </div> -->
        </div>
    </div> 
</div>

<script type="text/javascript">

<?php if($this->session->userdata('arr_data')){ ?>
          var a = <?php echo count($this->session->userdata('arr_data'));?>;
         $('#cart-item').val(a);
<?php } ?>    

 function addToCart(id){

            // alert(id);

              $.ajax({
                        url: '<?=base_url()?>maid/maid_cart_button/'+id,                      
                                
                        success: function(data) {
                        
                    

                            if(data == 1){

                                alert('Item Already in Cart');
                            }else{   

                                     var c =$('#cart-item-count').text();
                                     $('#cart-item-count').html(parseInt(c)+1);
                                 
                          
                                $('#dropdown-cart-item').html(data);

                                $('html, body').animate({ scrollTop: 0 }, 'slow');
                            }

                        
                        }
                        
                    });


   

    }


 function removeToCart(id) {


         $.ajax({
                        url: '<?=base_url()?>maid/remove_cart_button/'+id,                      
                                
                        success: function(data) {

                          

                                $('#dropdown-cart-item').html(data);
                                $('html, body').animate({ scrollTop: 50 }, 'slow');                         

                                    var c =$('#cart-item-count').text();
                                     $('#cart-item-count').html(parseInt(c)-1);
                        
                        }
                        
                    });




 }  


$(document).ready(function(){
    $('#supplier_id').select2();
    $('#nationality_id').select2();
    $('#status_id').select2();


 

    // $('#add-to-cart').click(function(){
      
       
    //    var a =  $('#cart-item').val();
    
    //    $('#cart-item').val(parseInt(a)+1);

    //     // $('cart-item').html()



        // $.ajax({
        //                 url: '',
        //                 type: 'post',
        //                 data: 'cart-item=' + $('#cart-item').val(),                       
                        
                                    
        //                 success: function(response) {
                        
        //                 alert(response);
                        
        //                 }
                        
        //             });


    // });





});

</script>
<style type="text/css">
    .dropdown-menu {
    right: 0 !important;
    left: 50% !important;
    float: right !important;
    width: 40%;

    padding: 2%;
}

.red-view{
    color: red !important;
}

</style>