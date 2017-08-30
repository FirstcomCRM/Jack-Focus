

<br>

<div class="row">
        <div class="col-lg-12">
        <ol class="breadcrumb">
          <li><a href="<?=base_url()?>dashboard"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a></li>        
          <li class="active">Maid Loan</li>
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


<!-- <?php print_r($emp_name); ?> -->

<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
               Maid Deployment Detail
               <div class="pull-right">
                    <div class="btn-group">
                        <a class="btn btn-default btn-xs" href="<?=base_url()?>maid/maid_desc"></i> Back</a>
                    </div>
             </div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <?php if(validation_errors()) { ?>
                    <div class="col-lg-12">
                        <div class="alert alert-danger">
                            <strong><?= validation_errors();?></strong>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                 <form role="form" method="post">

                   <div class="row">
                   
                        <div class="col-lg-4">

                                    <?php 
                                        if(!empty($maids)){
                                            foreach($maids as $r){
                                                $maid_code = $r->maid_code;
                                                $maid_name = $r->maid_name;
                                                 $maid_id = $r->maid_id;
                                              


                                            }
                                        }

                                    ?>

                                      <input type="hidden" class="form-control input-sm" name="maid_id"  value="<?=isset($maid_id) ? $maid_id : '' ?>" >   

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-4"><label>Maid Code</label></div>
                                            <div class="col-lg-6 required-field-block">
                                                <input class="form-control input-sm"  name="maid_code" value="<?=isset($maid_code) ? $maid_code : '' ?>" readonly>
                                      
                                            </div>
                                        </div>
                                    </div>


                        


                                            <div class="form-group">
			                                <div class="row">
			                                    <div class="col-lg-4"><label>	Date Deploy	</label></div>
			                                    	<div class="col-lg-6 required-field-block">
			                                        <div class="input-group date " data-provide="datepicker">
			                                            <input type="text" name="date_deploy" class="form-control" value="">
			                                        <div class="input-group-addon">
			                                            <span class="glyphicon glyphicon-calendar" ></span>
			                                        </div>
			                                    	 </div>
			                                    	</div> 
			                                </div>
			                            </div>



                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-4"><label>Agency / Top Up Placement Fee  </label></div>
                                            <div class="col-lg-6 required-field-block">
                                                <input id="top_fee" class="form-control input-sm number_in calc_add_bal_fee" name="top_up_placement_fee" value="<?=isset($maid_amount) ? $maid_amount : '' ?>">
                                       
                                            </div>
                                        </div>
                                  </div>



                                 <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-4"><label> Refund  </label></div>
                                            <div class="col-lg-6 required-field-block">
                                                <input id="refund" class="form-control input-sm number_in calc_add_bal_fee" name="refund" value="<?=isset($maid_amount) ? $maid_amount : '' ?>">
                                       
                                            </div>
                                        </div>
                                  </div>




                        </div>  



                        <div class="col-lg-4">

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-4"><label>Maid Name</label></div>
                                            <div class="col-lg-6 required-field-block">
                                                <input class="form-control input-sm" name="maid_name"  value="<?=isset($maid_name) ? $maid_name : '' ?>" disabled>
                                         
                                            </div>
                                        </div>
                                    </div>


                                  

	                            <div class="form-group">
	                                <div class="row">
	                                    <div class="col-lg-4"><label>	Date Return	</label></div>
	                                    	<div class="col-lg-6 required-field-block">
	                                        <div class="input-group date " data-provide="datepicker">
	                                            <input type="text" name="date_return" class="form-control" value="">
	                                        <div class="input-group-addon">
	                                            <span class="glyphicon glyphicon-calendar" ></span>
	                                        </div>
	                                    	 </div>
	                                    	</div> 
	                                </div>
	                            </div>






                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-4"><label> Paid Placement Fee  </label></div>
                                            <div class="col-lg-6 required-field-block">
                                                <input id="paid_placement_fee" class="form-control input-sm number_in calc_add_bal_fee" name="paid_placement_fee" value="<?=isset($maid_amount) ? $maid_amount : '' ?>">
                                       
                                            </div>
                                        </div>
                                  </div>



                                  <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-4"><label> 7% GST ON Agency  </label></div>
                                            <div class="col-lg-6 required-field-block">
                                                <input id="gst_on_agency_p_fee" class="form-control input-sm number_in calc_add_bal_fee" name=" gst_on_agency_p_fee" value="<?=isset($maid_amount) ? $maid_amount : '' ?>" readonly>
                                       
                                            </div>
                                        </div>
                                  </div>


                            
                        </div>


                        <div class="col-lg-4">
                                    
                                 

                                  <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-4"><label>Employer Name</label></div>
                                            <div class="col-lg-6 required-field-block">
                                                      <select class="form-control input-sm" name="customer_id" id="maid_employer" required>
                                                        <option value=""> -- Select Employer Name  -- </option>
                                                        <?php if($emp_name){?>
                                                            <?php foreach($emp_name as $emp){ ?>    
                                                            <option value="<?=$emp['customer_id']?>" <?=(isset($maid['maid_employer'])&&$maid['maid_employer']==$emp['customer_id']?'selected':'')?> >

                                                             <?=$emp['customer_name']?></option>

                                                            <?php } ?>
                                                        <?php } ?>
                                                    </select>
                                      
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-4"><label>Overseas Placement Fee  </label></div>
                                            <div class="col-lg-6 required-field-block">
                                                <input id="ove_fee" class="form-control input-sm number_in calc_add_bal_fee" name="overseas_placement_fee" value="<?=isset($maid_amount) ? $maid_amount : '' ?>">
                                       
                                            </div>
                                        </div>
                                  </div>



                                   <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-4"><label> Balance Placement Fee  </label></div>
                                            <div class="col-lg-6 required-field-block">
                                                <input id="total_bal_fee" class="form-control input-sm number_in" name="bal_placement_fee" value="<?=isset($maid_amount) ? $maid_amount : '' ?>" readonly>
                                       
                                            </div>
                                        </div>
                                  </div>


                                  <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-4"><label>  Total Balance Placement Fee </label></div>
                                            <div class="col-lg-6 required-field-block">
                                                <input id="t_bal_p_fee" class="form-control input-sm number_in calc_add_bal_fee" name="t_bal_p_fee" value="<?=isset($maid_amount) ? $maid_amount : '' ?>" readonly>
                                       
                                            </div>
                                        </div>
                                  </div>

                               

                                       <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-4"></div>
                                                <div class="col-lg-6">
                                    <button type="submit" onclick="return confirm_submit()" class="btn btn-primary btn-md">&nbsp&nbsp&nbsp Add &nbsp&nbsp&nbsp </button>
                                                </div>
                                            </div>
                                        </div> 



                        </div>

                      


                   </div>  


                   <div class="row">

                            <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>Employer Name</th>
                                                <th>Date Deploy</th>
                                                <th>Date Return</th>
                                                <th>Overseas Placement Fee</th>                                               
                                                <th>Top Up Placement Fee</th>
                                                <th>Paid Placement Fee</th>
                                                <th>Balance Placement Fee</th>
                                                <th>Refund</th>
                                                <th>7% GST On Agency P. Fee</th>
                                                <th>Total Balance Fee</th> 
                                                <th class="col-md-1">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (!empty($maid_dep_dtl)): ?>
                                                <?php foreach ($maid_dep_dtl as $m): ?>
                                                    <tr id="<?=$m->maid_dep_id?>">
                                                        <td><?=$m->customer_name?></td>
                                                        <td><?=$m->date_deploy?></td>
                                                        <td><?=$m->date_return?></td>
                                                        <td><?=$m->overseas_placement_fee?></td>
                                                        <td><?=$m->top_up_placement_fee?></td>
                                                        <td><?=$m->paid_placement_fee?></td>
                                                        <td><?=$m->bal_placement_fee?></td>
                                                        <td><?=$m->refund?></td>
                                                        <td><?=$m->gst_on_agency_p_fee?></td>
                                                         <td><?=$m->gst_on_agency_p_fee + $m->bal_placement_fee?></td>
                                                        <td>
                                                        <a class="btn btn-primary" title="Edit" href="<?=base_url()?>maid/maid_dep_edit/<?=$m->maid_dep_id?>" ><i class="fa fa-pencil-square-o"></i></a>&nbsp
                                                     <button onclick="delete_maid_dep(<?=$m->maid_dep_id?>)" class="btn btn-primary" title="Delete"  id="del-maid-dep" ><i class="fa fa-trash-o"></i></button> 
                                                        </td>

                                                    
                                                    </tr>
                                                <?php endforeach ?>
                                            <?php endif ?>
                                        </tbody>
                                       
                                    </table>
                                       


                            </div>
                   </div>

                       
                            
               
                        
                   
                                        
             
                </form>
            </div>
        </div>
    </div> 
</div>


<script type="text/javascript">
    
    function delete_maid_dep(id){

            if(confirm('Are you sure want to delete this ?')){
                  

                      var url_link = "<?=base_url()?>maid/maid_loan_del/"+id;

                      $.ajax({
                        url: url_link,                                             
                        success: function(data){
                            if(data == 'success'){
                                alert('Successfully Deleted !');
                                $('#'+id).remove();
                            }
                        }
                        });

            }          

    }

$(function () {




          $('.calc_add_bal_fee').blur(function(){
                var a = $('#ove_fee').val();
                var b = $('#top_fee').val();  
                var c = $('#paid_placement_fee').val();
                var d = $('#refund').val();
                 


                if(a=='' || a == null){ a=0;}
                if(b=='' || b == null){ b=0;}
                if(c=='' || c == null){ c=0;}
                if(d=='' || c == null){ d=0;}
             

                  y =  parseFloat(a) + parseFloat(b); 

                  x = parseFloat(y) - parseFloat(c);
               
                  //	balance placement fee = balance placement fee - refund	 
                  x = parseFloat(x) - parseFloat(d);
                
                  //balance placement fee = top up fee + overseas fee - paid placement fee 
                  $('#total_bal_fee').val(x.toFixed(2));
                  

                
                 
                  if(b !== 0){
                    gst = b*0.07;
                  }else{
                     gst = 0;
                  }

                   //  gst = top up  x 0.07
                  $('#gst_on_agency_p_fee').val(gst.toFixed(2));


                   t_bal_p_fee  = parseFloat(x) + parseFloat(gst);

                   // total placement balance fee = balance placement fee  + gst
                   $('#t_bal_p_fee').val(t_bal_p_fee.toFixed(2));


          });




         $("input[class*='number_in']").keydown(function (event) {


            if (event.shiftKey == true) {
                event.preventDefault();
            }

            if ((event.keyCode >= 48 && event.keyCode <= 57) || (event.keyCode >= 96 && event.keyCode <= 105) || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 37 || event.keyCode == 39 || event.keyCode == 46 || event.keyCode == 190) {

            } else {
                event.preventDefault();
            }
            
            if($(this).val().indexOf('.') !== -1 && event.keyCode == 190)
                event.preventDefault();

        });


});


</script>

