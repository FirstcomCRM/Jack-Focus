

<br>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
          <li><a href="<?=base_url()?>dashboard"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a></li>
          <li><a href="<?=base_url()?>invoice">Invoice</a></li>
          <li class="active"><?=$action=='add'?'New':'Edit'?> FDW Invoice</li>
            <div class="pull-right">
                <div class="btn-group">
                    <a class="btn btn-default btn-xs" href="<?=base_url()?>invoice"><i class="fa fa-arrow-circle-o-left"></i> Back</a>
                </div>
            </div>
        </ol>
    </div>
</div>
<?php if ($action=='edit'): ?>
    <div class="row">
        <div class="col-lg-12 text-right">
            <a class="btn btn-default btn-sm" href="<?=base_url()?>invoice/view/<?=$quotation['quotation_id']?>"><i class="fa fa-search"></i> View</a>
        </div>
    </div>
<br>
<?php endif ?>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <?php if(isset($msg) && $msg != '') { ?>
        <div class="alert alert-success"><?php echo $msg; ?></div>
        <?php } ?>
    </div>
</div>
<div class="row">
    <?php if(validation_errors()) { ?>
    <div class="col-lg-12">
        <div class="alert alert-danger">
            <strong><?= validation_errors();?></strong>
        </div>
    </div>
    <?php } ?>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
               FDW Invoice Details
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                                <div class="row">
                                <input type="hidden" name="hid_quo_id" id="hid-quo-id" value="<?= ($action == 'edit') ? $quotation['quotation_id'] : ''; ?>" >
                                <div class="col-lg-4"><label>Customer</label></div>
                                <div class="col-lg-6">
                                    <select class="form-control input-sm" name="customer_id" id="customer-id">
                                        <?php if ($customers!=''): ?>
                                            <option value=""> - Please Select Customer - </option>
                                            <?php foreach ($customers as $customer): ?>
                                            <option value="<?=$customer['customer_id']?>" <?=isset($_POST['customer_id'])&&$customer['customer_id']==$_POST['customer_id']?"select":(isset($quotation['customer_id'])&&$quotation['customer_id']==$customer['customer_id']?'selected':'')?>><?=$customer['customer_name']?></option>
                                          
                                            <?php endforeach ?>
                                        <?php endif ?>
                                    </select>
                                </div>
                              
                            </div>
                        </div>
                        <?php if ($action=='edit'): ?>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label>Quotation No.</label></div>
                                    <div class="col-lg-6"><?=$quotation['quotation_no']?></div>
                                </div>
                            </div>
                        <?php endif ?>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-4"><label>Date</label></div>
                                <div class="col-lg-6 required-field-block">
                                    <input class="form-control input-sm" id="quotation-date" name="quotation_date" value="<?=isset($_POST['quotation_date'])?$_POST['quotation_date']:(isset($quotation['quotation_date'])?date('d-m-Y',$quotation['quotation_date']):date('d-m-Y'))?>">
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <div class="row">
                            	<?//=$action=='add'?'Create':'Update'?>
                            	<?php if ($action == 'add')
                            	{?>
                            			<div class="col-lg-4"><label>Payment</label></div>
                                		<div class="col-lg-6">
                                        <select name="payment_terms" class="form-control input-sm" id="payment-terms">
                                                    <option value="Full">Full Payment</option>
                                                    <option value="Deposit">Deposit</option>                                            
                                      	</select>
                           				</div>
                            	<?php
                            	}
                            	
                            	else 
                            	{?>
                            		<div class="col-lg-4"><label>Payment</label></div>
                            		<div class="col-lg-6">
                                       <!-- <h4><?php $quotation['payment_terms'] ;?></h4>-->
                                       <input class="form-control input-sm" id="payment-terms" name="payment_terms" value="<?=isset($_POST['payment_terms'])?$_POST['payment_terms']:(isset($quotation['payment_terms'])?$quotation['payment_terms']:'')?>" readonly>
                           			</div>
                            	<?php
                            	}
                            	?>
                                
                                <!--<div class="col-lg-6"><input class="form-control input-sm" id="payment-terms" name="payment_terms" value="<?=isset($_POST['payment_terms'])?$_POST['payment_terms']:(isset($quotation['payment_terms'])?$quotation['payment_terms']:'')?>"></div>-->
                            </div>
                        </div>
                         






                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-4"><label>Issued By</label></div>
                                <div class="col-lg-6"><input class="form-control input-sm" id="issued-by" name="issued_by" value="<?=isset($_POST['issued_by'])?$_POST['issued_by']:(isset($quotation['issued_by'])?$quotation['issued_by']:'')?>"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-4"><label>Staff</label></div>
                                <div class="col-lg-6">
                                    <select class="form-control input-sm" name="sale_person_id" id="sale_person_id">
                                        <?php if ($sale_persons!=''): ?>
                                            <option value=""> - Please Select Staff - </option>
                                            <?php foreach ($sale_persons as $sale_person): ?>
                                            <option value="<?=$sale_person['staff_id']?>" <?=isset($_POST['sale_person_id'])&&$_POST['sale_person_id']==$sale_person['staff_id']?"selected":(isset($quotation['staff_id'])&&$quotation['staff_id']==$sale_person['staff_id']?'selected':'')?>><?=$sale_person['staff_name']?></option>
                                            <?php endforeach ?>
                                        <?php endif ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-4"><label>Remark</label></div>
                                <div class="col-lg-6"><textarea class="form-control input-sm" id="remark" rows="5" name="remark"><?=isset($_POST['remark'])?$_POST['remark']:(isset($quotation['remark'])?$quotation['remark']:'')?></textarea> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-4"><label>Internal Remark <br>(Not showing on printing page)</label></div>
                                <div class="col-lg-6"><textarea class="form-control input-sm" id="internal-remark" rows="5" name="internal_remark" placeholder="This field is only for internal use, the content will not show on printing page"><?=isset($_POST['internal_remark'])?$_POST['internal_remark']:(isset($quotation['internal_remark'])?$quotation['internal_remark']:'')?></textarea> </div>
                            </div>
                        </div>


                    </div>
                    <div class="col-lg-12">
                        <div class="clearfix margin-sm-b"></div>
                        <div class="col-sm-12 order-header">Request Maid</div>
                        <div class="clearfix margin-sm-b"></div>
                        <div class="col-sm-12">
                            <div class="row-fluid grid-area product-grid"> 
                                <div class="row tbl-head">
                                    <div class="col-md-3"><b>Maid</b></div>
                                    <div class="col-md-2">Price</div>
                                    <!--<div class="col-md-1">Quantity</div>
                                    <div class="col-md-2">Total</div>-->
                                    <div class="col-md-2">Remark</div>
                                    <div class="col-md-2">Action</div>
                                </div>
                                <?php /*************************************************************************************************noted***********/
                              



                                    if(isset($quotation_products) && count($quotation_products) != 0) { 
                                       // echo count($quotation_products);
                                        //print_r($quotation_products);
                                        $count = 0; 
                                        //echo $quotation_products[0]['maid_name']."<---"; 
                                        foreach ($quotation_products as $quotation_product) : 






                                            
                                          $row =  ($count%2)==1 ? 'row odd': 'row even';
                                          $classname = $row . ' id-'.$quotation_product['quotation_product_id']; 
                                ?>
                                        <div class="<?= $classname; ?>"> 
                                            <div class='col-md-3'><?= $quotation_product['maid_name']; ?></div>
                                            <div class='col-md-2 col-total'><?= $quotation_product['unit_price']; ?></div>     
                                            <div class='col-md-2'><?= $quotation_product['remark']; ?></div>  
                                            <div class="col-md-2">    
                                              <a href="#" class="edit-id"><i class="fa fa-edit ico"></i></a> /                                   
                                              <a href="#" class="delete-id"><i class="fa fa-trash-o ico"></i></a>                                                                  
                                            </div>
                                        </div>
                                <?php 
                                        $count++;
                                        endforeach;
                                    }
                                ?>
                                <div class="product-add-area"></div>
                                <div class="clearfix margin-sm-b"></div>
                                <div class="row">
                                  <form id="detail-form">
                                    <div class="col-md-3">
                                        <select class="form-control input-sm" name="product_id" id="product-id">
                                            <option value="" selected>Select Maid</option>
                                            <?php if($products != '') { ?>
                                                <?php foreach($products as $product) {  
                                                    echo "<option value='". $product['maid_id'] . "' >" . $product['maid_name'] . "</option>";
                                                } ?>
                                            <?php } ?>
                                        </select>   
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control input-sm" name="unit_price" id='unit-price' placeholder="Enter Price" />
                                    </div>
                                   <!-- <div class="col-md-1">
                                        <input type="text" class="form-control input-sm" name="quantity" id='quantity' placeholder="Qty" />
                                    </div>-->
                                      <input type="hidden" name="quantity" id="quantity" value="1" >
                                          <input type="hidden" name="total" id="total" value="1" >
                                   <!-- <div class="col-md-2">
                                        <input type="text" class="form-control input-sm" name="total" id='total' placeholder="Enter Total" readonly />   
                                    </div>-->
                                    <div class="col-md-2">
                                        <input type="text" class="form-control input-sm" name="p_remark" id='p-remark' placeholder="Enter Remark" />   
                                    </div>
                                    <div class="col-md-2">
                                        <input type="hidden" id="hid-edit-id" value="" />
                                        <a href="#" id="product-add"><i class="fa fa-plus ico"></i></a>
                                        <a href="#" id="product-update"><i class="fa fa-save ico"></i></a>&nbsp&nbsp
                                        <a href="#" id="product-cancel"><i class="fa fa-eraser ico" ></i></a>
                                    </div> 
                                    </div>
                                    <div class="form-group">

                                    <br>
                            <div class="row">
                                <div class="col-lg-2"><label>Package</label></div>
                                <div class="col-lg-4">
                                    <select class="form-control input-sm" name="package_id" id="package_id">
                                        <?php if ($packages!=''): ?>
                                            <option value=""> - Package - </option>
                                            <?php foreach ($packages as $package): ?>
                                            
                                            <option value="<?=$package['package_id']?>" <?=isset($_POST['package_id'])&&$_POST['package_id']==$package['package_id']?"selected":(isset($quotation['package_id'])&&$quotation['package_id']==$package['package_id']?'selected':'')?>><?=$package['package_name']?></option>
                                            <?php endforeach ?>
                                        <?php endif ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                         <div class="form-group">
                            <div class="row">
                                <div class="col-lg-2"><label>Insurance</label></div>
                                <div class="col-lg-4">
                                    <select class="form-control input-sm" name="insurance_id" id="insurance_id">
                                        <?php if ($insurances!=''): ?>

                                             <option value=""> - Insurance - </option>
                                            <?php foreach ($insurances as $insurance): ?>
                                             <option value="<?=$insurance['insurance_id']?>" <?=isset($_POST['insurance_id'])&&$_POST['insurance_id']==$insurance['insurance_id']?"selected":(isset($quotation['insurance_id'])&&$quotation['insurance_id']==$insurance['insurance_id']?'selected':'')?>><?=$insurance['insurance_name']?></option>
                                            <?php endforeach ?>
                                        <?php endif ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                                  </form>  
                                
                                <div class="clearfix margin-sm-b"></div>
                                <div class="row">
                                    <div class="col-md-9 text-right">Total Amount :</div>
                                    <div class="col-md-2"><input type="text" class="form-control input-sm" name="total_amount" id='total-amount' placeholder="Enter Total Amount" value="<?= isset($_POST['total_amount']) ? $_POST['total_amount'] : ( isset($quotation['total_amount']) ? $quotation['total_amount'] : '') ; ?>" readonly/></div> 
                                    <div class="clearfix margin-sm-b"></div> 
                                    <div class="col-md-9 text-right">GST :</div>
                                    <div class="col-md-2"><input type="text" class="form-control input-sm" name="gst" id='gst' placeholder="Enter GST Percentage" value="<?= isset($_POST['gst']) ? $_POST['gst'] : ( isset($quotation['gst']) ? $quotation['gst'] : 7) ; ?>"/></div> 
                                    <div class="col-md-1">%</div>
                                    <div class="clearfix margin-sm-b"></div> 
                                    <div class="col-md-9 text-right">Total Inc. GST :</div>
                                    <div class="col-md-2"><input type="text" class="form-control input-sm" name="total_inc_gst" id='total-inc-gst' placeholder="Enter Total Inc GST" value="<?= isset($_POST['total_inc_gst']) ? $_POST['total_inc_gst'] : ( isset($quotation['total_inc_gst']) ? $quotation['total_inc_gst'] : '') ; ?>" readonly/></div> 
                                </div>
                            </div>
                        </div>
                        <div class="clearfix margin-sm-b"></div>
                        <div class="form-group">
                            <label for="dob" class="col-sm-9 control-label"></label>
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-primary btn-sm" id="btn-submit"><?php echo ($action == 'add') ? "Save" : "Update" ?></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</div>
<script>
   var burl = "<?= base_url() ?>";
   var state = "<?= $action ?>";
   var detailarr = {};
   var detailkey = 0;

  function get_detailtotalamount() {
    var sum = 0;
    $(".col-total").each(function() {
        var value = $(this).text();
        // add only if the value is number
      if(!isNaN(value) && value.length != 0) {
          sum += parseFloat(value);
      }
    });
    return sum;
  }

  function calculateGST() {
    if( $.isNumeric($("#total-amount").val()) && $.isNumeric($("#gst").val()) ) {
        var result =  parseFloat($("#total-amount").val()) * (parseFloat($("#gst").val()) / 100 );
        result = parseFloat(result) + parseFloat($("#total-amount").val());
       $("#total-inc-gst").val(myRound(result, 2));
    } 
    else if ($.isNumeric($("#total-amount").val()))  {
       $("#total-inc-gst").val($("#total-amount").val());   
    }
  }

  $(function(){

    $("#product-update, #product-cancel").hide();


    $('#unit-price, #quantity').change(function(){
        if( $.isNumeric($("#unit-price").val()) && $.isNumeric($("#quantity").val()) ) {    
           // $("#total").val( $("#unit-price").val() * $("#quantity").val() );
              $("#total").val( $("#unit-price").val()  );
        }
    });

    $('#gst').change(function(){
        calculateGST();
    });

    $.fn.serializeObject = function() {
        var o = {};
        var a = this.serializeArray();
        $.each(a, function() {
          if (o[this.name] !== undefined) {
            if (!o[this.name].push) {
              o[this.name] = [o[this.name]];
            }
            o[this.name].push(this.value || '');
          } else {
            o[this.name] = this.value || '';
          }
        });
        return o;
    };

    $("#customer-id").select2();
    $("#sale_person_id").select2();
    $("#product-id").select2();
    $("#package_id").select2();
    $("#insurance_id").select2();
});
</script>

<?php if ( $action == "add" ) { ?>
  <script src="<?= base_url();?>public/js/quotation-add.js"></script>
<?php } elseif ( $action == "edit" ) { ?>
  <script src="<?= base_url();?>public/js/quotation-edit.js"></script>
<?php } ?>