

<br>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
          <li><a href="<?=base_url()?>dashboard"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a></li>
          <li><a href="<?=base_url()?>invoice">Invoice</a></li>         
            <div class="pull-right">
                <div class="btn-group">
                    <a class="btn btn-default btn-xs" href="<?=base_url()?>invoice"><i class="fa fa-arrow-circle-o-left"></i> Back</a>
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




<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
              Invoice Details
            </div>
            <div class="panel-body">
              	<?php if($inv_dtl){?>  
            	<?php foreach($inv_dtl as $r){?>
            			<input type="hidden" id="inv_id" name="inv_id" value="<?=$r->inv_id?>">
                <div class="row">

                	<div class="col-lg-6">

                			<div class="row">
                					<div class="col-lg-4">
                						<label>Invoice Code</label>
                					</div>
                					<div class="col-lg-6">
                						<?=$r->inv_code?>
                					</div>
                			</div>

                			<div class="row">
                					<div class="col-lg-4">
                						<label>Employer Name</label>
                					</div>
                					<div class="col-lg-6">
                						<?=$r->customer_name?>

                          
                					</div>
                			</div>

                			<div class="row">
                					<div class="col-lg-4">
                						<label>Maid</label>
                					</div>
                					<div class="col-lg-6">
                						<?=$r->maid_name?>
                					</div>
                			</div>


                			<div class="row">
                					<div class="col-lg-4">
                						<label>Date</label>
                					</div>
                					<div class="col-lg-6">
                						<?=$r->date?>
                					</div>
                			</div>

                			<div class="row">
                					<div class="col-lg-4">
                						<label>Staff</label>
                					</div>
                					<div class="col-lg-6">
                						<?=$r->staff_name?>
                					</div>
                			</div>

                				<div class="row">
                					<div class="col-lg-4">
                						<label>Payment</label>
                					</div>
                					<div class="col-lg-6">
                						<?=$r->payment?>
                					</div>
                			</div>

                			<div class="row">
                					<div class="col-lg-4">
                						<label>Issued By</label>
                					</div>
                					<div class="col-lg-6">
                						<?=$r->issued_by?>
                					</div>
                			</div>

                            <div class="row">
                                    <div class="col-lg-4">
                                        <label>Invoice Type</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <?=$r->inv_type?>
                                    </div>
                            </div>
                            <div class="row">
                                    <div class="col-lg-4">
                                        <label>Maid Loan Amount</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <?=$r->maid_loan_amt?>
                                    </div>
                            </div>



                	</div>
                	<!--  -->
                	<div class="col-lg-6">             		            		
                	             	


                			<div class="row">
                					<div class="col-lg-4">
                						<label>Remark</label>
                					</div>
                					<div class="col-lg-6">
                						
                						<textarea class="form-control input-sm"  rows="5"  readonly><?=$r->remark?></textarea>
                					</div>
                			</div>


                			<div class="row">
                					<div class="col-lg-4">
                						<label>Internal Remark</label>
                					</div>
                					<div class="col-lg-6">
                					<textarea class="form-control input-sm"  rows="5"  readonly><?=$r->internal_remark?></textarea>

                						
                					</div>
                			</div>
                		

                		
                	</div>

               </div>
               <br>
               <?php $total_package = 0;?>
               <div class="row">
               <h4>Package Item</h4>

               		<div class="col-lg-6">
               			<div class="row">
                					<div class="col-lg-4">
                						<label>Package Item</label>
                					</div>
                					<div class="col-lg-6">
                						
                						<?=$r->package_item?>
                					</div>
                		</div>	

                		<div class="row">
                					<div class="col-lg-4">
                						<label>Insurance Item</label>
                					</div>
                					<div class="col-lg-6">
                						
                						<?=$r->insurance_item?>
                					</div>
                		</div>	

                 	
               		</div>

               		<div class="col-lg-6">


               			<div class="row">
                					<div class="col-lg-4">
                						<label>Package Price</label>
                					</div>
                					<div class="col-lg-6">
                						
                						<?=$r->package_price?>
                					</div>
                		</div>	

                		<div class="row">
                					<div class="col-lg-4">
                						<label>Insurance Price</label>
                					</div>
                					<div class="col-lg-6">
                						
                						<?=$r->insurance_price?>
                					</div>
                		</div>

               			
               		</div>

               </div>
                <?php $total_package = $r->insurance_price + $r->package_price;?>	

                <?php } ?>
               <?php } ?>


               <div class="row">
               	<h4>Adhoc Item</h4>
               		
               <?php $total_adhoc = 0;?>	
               <?php if($adhoc_dtl){?>




               <div class="table-responsive" style="padding: 2%;">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Adhoc item</th>
                                <th>Qty</th>
                                <th>Price</th>
                                <th>Total</th>
                                <th>Remark</th>
                         
                            </tr>
                        </thead>
                        <tbody>
		           			<?php foreach($adhoc_dtl as $ad){?>
		           				<tr>
									<td><?=$ad->adhoc_item?></td>
									<td><?=$ad->qty?></td>
									<td><?=$ad->price?></td>
									<td><?=$ad->qty*$ad->price?></td>
									<td><?=$ad->remark?></td>
                                </tr>

                                <?php	$total_adhoc += $ad->qty*$ad->price; ?>

		           			 <?php } ?>
                        </tbody>
                    </table>
                </div>





               <?php } ?>

               		</div>
               </div>



            </div>
        </div>
    </div>
              	



<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
               Add Payment
            </div>
            <div class="panel-body">
          
                
                	<div class="col-lg-7">

			               <div class="table-responsive">
			                    <table class="table table-striped table-hover">
			                        <thead>
			                            <tr>
			                                <th>Amount</th>
			                                <th>Payment Date</th>
			                                <th>Payment Type</th>
			                                <th>Remark</th>
			                                <th>&nbsp;</th>
			                            
			                            </tr>
			                        </thead>
			                        <tbody>
			                         		<?php $total_payment = 0;?>
			                         		<?php if($payment_dtl) {?>
			                         		<?php foreach($payment_dtl as $p) { ?>		
			                                <tr>
			                                    <td><?=$p->amount?></td>	
			                                    <td><?=$p->payment_date?></td>
			                                    <td><?=$p->payment_opt_name?></td>
			                                    <td><?=$p->remark?></td>
			                                    <td>
			                                     <a title="Delete" href="<?=base_url()?>invoice/delete_payment/<?=$p->invoice_id?>/<?=$p->invoice_payment_id?>" onclick="return confirm_delete()" ><i class="fa fa-trash-o"></i></a>
			                                     </td>
			                                
			                                 <?php $total_payment += $p->amount; ?>    

			                                </tr>
			                         		<?php } ?>
			                         		<?php } ?>
			                        </tbody>
			                    </table>
			                </div>


					<?php 
                		$gst = 0.07;
                		$total_n_gst = 0;
                		$total_w_gst = 0;

                		$total_n_gst = $total_package + $total_adhoc;
                		$total_w_gst = $total_n_gst + ($total_n_gst * 0.07);

                		$total_balance = $total_w_gst - $total_payment;

                	?>


                		

           		

                		
                	</div>
                
                	<div class="col-lg-5">
                	     <form method="post">
		                        <div class="panel panel-default">
		                            <div class="panel-heading">
		                                Add Payment
		                            </div>
		                            <div class="panel-body">
		                      <!-- 	<?=$total_adhoc?> -->
		                                <div class="row">
		                                    <div class="col-lg-12">		                               

						                        <div class="form-group">
						                            <div class="row">
						                                <div class="col-lg-4"><label>Date</label></div>
						                                <div class="col-lg-6 required-field-block">
						                                    <div class="input-group date " data-provide="datepicker">
						                                                <input type="text" id="payment_date" name="payment_date" class="form-control" value="" readonly>
						                                                    <div class="input-group-addon">
						                                                        <span class="glyphicon glyphicon-calendar" ></span>
						                                                    </div>
						                                     </div>                                 
						                                </div>
						                            </div>
						                        </div>



		                                        <div class="form-group">
		                                            <div class="row">
		                                                <div class="col-lg-4"><label>Amount</label></div>
		                                                <div class="col-lg-8"><input class="form-control input-sm" id="amount" name="amount" ></div>
		                                            </div>
		                                        </div>
		                                        <div class="form-group">
		                                            <div class="row">
		                                                <div class="col-lg-4"><label>Payment Type</label></div>
		                                                <div class="col-lg-8">
		                                                    <select class="form-control input-sm" name="payment_type" id="payment_type">
		                                                        <option value="">- Please Select Payment Type -</option>
		                                                        <?php if($payment_option) {?>
		                                                        	<?php foreach($payment_option as $p){ ?>
		                                                        		<option value="<?=$p->payment_opt_id?>"><?=$p->payment_opt_name?></option>
		                                                			<?php } ?>
		                                                        <?php } ?>
		                                                    </select>
		                                                </div>
		                                            </div>
		                                        </div>
		                                        <div class="form-group">
		                                            <div class="row">
		                                                <div class="col-lg-4"><label>Remark</label></div>
		                                                <div class="col-lg-8">
		                                                    <textarea class="form-control input-sm" name="remark" id="remark"></textarea>
		                                                </div>
		                                            </div>
		                                        </div>
		                       
		                                        <div class="form-group">
		                                            <div class="row">
		                                                <div class="col-lg-4"></div>
		                                                <div class="col-lg-8">
		                                                    <a id="submit_payment" class="btn btn-primary btn-sm">Add</a>
		                                                </div>
		                                            </div>
		                                        </div>
		                 </form>              



		                                    </div>
		                                </div>
		                            </div>
		                        </div>
                  

                		
                	</div>

<div style="padding: 2%;">
	
	<div class="row">		

				    <div class="form-group">
				        <div class="row">
				            <div class="col-lg-4"><label>Total Amount W/ GST(7%) </label></div>
				            <div class="col-lg-8"><?=$total_w_gst?></div>
				        </div>
				    </div>
				    <div class="form-group">
				        <div class="row">
				            <div class="col-lg-4"><label>Total Payment</label></div>
				            <div class="col-lg-8"><?=$total_payment?></div>
				        </div>
				    </div>
				     <div class="form-group">
				        <div class="row">
				            <div class="col-lg-4"><label>Balance</label></div>
				            <div class="col-lg-8"><?=$total_balance?></div>
				        </div>
				    </div>
		   
		</div>

</div>
	



<script type="text/javascript">
	

	 $(document).ready(function(){


	 	$('#submit_payment').click(function(){

	 		if(confirm("Are you sure want to add this payment?")){

	 			var a = $('#inv_id').val();
	 			var b = $('#payment_date').val();
	 			var c = $('#amount').val();
	 			var d = $('#payment_type').val();
	 			var e = $('#remark').val();

				if(isNaN(c) || c == ''){
		            alert('Please enter number only');
		        }else if(isNaN(a) || a== ''){

		        	alert('Error !');

		        }else if(b=='' || null){	
		        	alert('Please enter date');


		        }else if(isNaN(d) || d== ''){

		        	 alert('Please enter Payment Type');
		        }else{ 	

				 				$.ajax({
							    url: '<?=base_url()?>invoice/ins_payment_dtl/'+a+'/'+b+'/'+c+'/'+d+'/'+e,
							    type: 'POST',			    
							    
							    success: function (response) {
							      window.location.href = '<?=base_url()?>invoice/add_invoice_payment/'+a;
							    },
							    error: function () {
							        alert("error");
							    }
							}); 
			
	 			}



	 		}


	 	});




	 });



</script>