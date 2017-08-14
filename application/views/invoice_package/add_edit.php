

<br>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
          <li><a href="<?=base_url()?>dashboard"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a></li>
          <li><a href="<?=base_url()?>invoice">Invoice</a></li>
          <li class="active"><?=$action=='add'?'New':'Edit'?> Invoice</li>
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
               Invoice Details
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
                                            <option value="<?=$customer['customer_id']?>" <?=isset($_POST['customer_id'])&&$customer['customer_id']==$_POST['customer_id']?"select":(isset($quotation['customer_id'])&&$quotation['customer_id']==$customer['customer_id']?'selected':'')?>>
                                            <?=$customer['customer_code']." ".ucwords($customer['customer_name'])." ".ucwords($customer['employer_ic_no'])?>
                                              
                                            </option>
                                          
                                            <?php endforeach ?>
                                        <?php endif ?>
                                    </select>
                                </div>
                              
                            </div>
                        </div>

                        <!-- ($this->session->userdata('fcs_validate_user') !== 5) ? 'disabled' : ''?> -->
                        <div class="form-group">
                                <div class="row">                            
                                <div class="col-lg-4"><label>Branch</label></div>
                                <div class="col-lg-6">
                                    <select class="form-control input-sm" name="branch_id" id="branch_id"  >

                                            <?php if ($branches!=''): ?>
                                               

                                                <?php if($this->session->userdata('fcs_role_id') ==5){ ?>
                                                          <option value="<?=$this->session->userdata('branch_id')?>" selected>
                                                                  <?php foreach ($branches as $branch): ?>
                                                                  <?= ($this->session->userdata('branch_id') == $branch['branch_id']) ? ucwords($branch['branch_name']) : '' ?>
                                                                  <?php endforeach ?> 
                                                          </option>
                                                <?php }else { ?>
                                                    <option value=""> - Please Select Branch - </option> 
                                                      <?php foreach ($branches as $branch): ?>
                                                   
                                                      <option value="<?=$branch['branch_id']?>"  <?= isset($quotation['branch_id'])&&$quotation['branch_id']==$branch['branch_id']?'selected':'' ?> ><?= ucwords($branch['branch_name']) ?></option>
                                                    
                                                      <?php endforeach ?>
                                                
                                                <?php } ?>
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
                        <div class="col-sm-12 order-header">Order Package</div>
                        <div class="clearfix margin-sm-b"></div>
                        <div class="col-sm-12">
                            <div class="row-fluid grid-area product-grid"> 
                                <div class="row tbl-head">
                                    <!-- <div class="col-md-3">Includes</div>
                                    <div class="col-md-2">Price</div>
                                    <div class="col-md-1">Quantity</div>
                                    <div class="col-md-2">Total</div>
                                   <!--  <div class="col-md-2">Remark</div>
                                    <div class="col-md-2">Action</div> --> 
                                </div>
                                <?php /*************************************************************************************************noted***********/

                                    if(isset($quotation_products) && count($quotation_products) != 0) { 
                                       // echo count($quotation_products);
                                        //print_r($quotation_products);
                                        $count = 0; 
                                        //echo $quotation_products[0]['maid_name']."<---"; 
                                        foreach ($quotation_products as $quotation_product) : 
                                          $row =  ($count%2)==1 ? 'row odd': 'row even';
                                          $classname = $row . ' id-'.$quotation_product['invoice_package_id']; 
                                ?>
                                        <div class="<?= $classname; ?>"> 

                                        <?php if ($quotation_product['maid_name'] != "")
                                            { ?>
                          
                                              <div class='col-md-2'><b>FDW:</b></div>
                                             <div class='col-md-10'><?= $quotation_product['maid_name']; ?></div>
                         
                        
                                              <div class='col-md-2'><b>Package:</b></div>
                                              <div class='col-md-4'><?= $quotation_product['package_name']; ?></div>
                                              <div class='col-md-2'><b>Package Price:</b></div>
                                              <div class='col-md-4 col-total'><?= $quotation_product['total_amount']; ?></div>
                                 
                    
                                              <div class='col-md-2'><b>Insurance:</b></div>
                                              <div class='col-md-4'><?= $quotation_product['insurance_name']; ?></div>
                                              <div class='col-md-2'><b>Insurance Price:</b></div>
                                              <div class='col-md-4 col-total-i'><?= $quotation_product['insurance_fee']; ?></div>
                                  
                                              <div class='col-md-2'><b>Addhoc Item</b></div>
                                              <div class='col-md-10'><?= $quotation_product['addhoc']; ?></div>
                              
                                              <div class='col-md-2'><b>Addhoc Quantity</b></div>
                                              <div class='col-md-10'><?= $quotation_product['addhoc_qty']; ?></div>
                                   
                                              <div class='col-md-2'><b>Item Price:</b></div>
                                              <div class='col-md-4'><?= $quotation_product['addhoc_price']; ?></div>
                                              <div class='col-md-2'><b>Addhoc Total:</b></div>
                                              <div class='col-md-4 col-total-a'><?= $quotation_product['total_addhoc_price']; ?></div>
                                
                                              <div class='col-md-2'><b>Remark:</b></div>
                                              <div class='col-md-4'><?= $quotation_product['remark']; ?></div>
                                              <div class='col-md-2 '><b>Discount:</b></div>
                                              <div class='col-md-4 col-total-disc'><?= $quotation_product['discount']; ?></div>
                                  
                                            <div class="col-md-2">    
                                              <a href="#" class="edit-id"><i class="fa fa-edit ico"></i></a>                                   
                                              <a href="#" class="delete-id"><i class="fa fa-trash-o ico"></i></a>                                                                  
                                            </div>

                                             <?php }else if($quotation_product['maid_name'] == '')
                                              {?>
                                              <div class='col-md-2'><b>Addhoc Quantity</b></div>
                                              <div class='col-md-10'><?= $quotation_product['addhoc_qty']; ?></div>
                                   
                                              <div class='col-md-2'><b>Item Price:</b></div>
                                              <div class='col-md-4'><?= $quotation_product['addhoc_price']; ?></div>
                                              <div class='col-md-2'><b>Addhoc Total</b></div>
                                              <div class='col-md-4 col-total-a'><?= $quotation_product['total_addhoc_price']; ?></div>

                                              <?php } ?>
                                        </div>
                                        <br>
                                        <br>
                                <?php 
                                        $count++;
                                        endforeach;
                                    }
                                ?>
                              
                                <div class="product-add-area"></div>
                                <div class="clearfix margin-sm-b"></div>
                                 
 <!--******************************************package area**********************************-->                                   
                                <div class="edr">
                                     <div class="row">
                                   <form id="detail-form">
                                  <div class="col-lg-1"><label>Package</label></div>
                                    <div class="col-md-3">
                                        <select class="form-control input-sm" name="product_id" id="product-id">
                                            <option value="" selected> --- </option>
                                            <?php if($products != '') { ?>
                                                <?php foreach($products as $product) {  
                                                    echo "<option value='". $product['package_id'] . "' data_val = '".$product['package_price']."' >" . $product['package_name'] . "</option>";
                                                } ?>
                                            <?php } ?>
                                        </select>   
                                    </div>
                                     <div class="col-lg-1"><label>Package Price</label></div>
                                        <div class="col-md-2">
                                            <input type="text" class="form-control input-sm" name="unit_price" id='unit-price' placeholder="Enter Price" readonly>
                                        </div>
                                               <!-- <div class="col-md-1">
                                                    <input type="text" class="form-control input-sm" name="quantity" id='quantity' placeholder="Qty" />
                                                </div>-->
                                            <input type="hidden" name="quantity" id="quantity" value="1" >
                                            <input type="hidden" name="total" id="total" value="1" >
                                                   <!-- <div class="col-md-2">
                                                        <input type="text" class="form-control input-sm" name="total" id='total' placeholder="Enter Total" readonly />   
                                                    </div>-->
                                                    <!-- <div class="col-md-2">
                                                        <input type="text" class="form-control input-sm" name="p_remark" id='p-remark' placeholder="Enter Remark" />   
                                                    </div> -->
                                        <div class="col-md-2">
                                            <input type="hidden" id="hid-edit-id" value="" />
                                                <a href="#" id="product-add"><i class="fa fa-plus ico"></i></a>
                                                <a href="#" id="product-update"><i class="fa fa-save ico"></i></a>&nbsp&nbsp
                                                <a href="#" id="product-cancel"><i class="fa fa-eraser ico" ></i></a>
                                        </div> 
                                        </div>
                                  
<!--******************************************maid area**********************************--> 
                                     <br>
                           
                                </div>
                                          <div class="row edr">
                                    <div class="col-lg-1"><label>Maid</label></div>
                                            <div class="col-md-5">
                                        <select class="form-control input-sm" name="product_maid_id" id="product_maid_id">
                                            <option value="0" selected> --- </option>
                                            <?php if($maid_products != '') { ?>
                                                <?php foreach($maid_products as $maid_product) {  
                                                    echo "<option value='". $maid_product['maid_id'] . "' >" . $maid_product['maid_code']." ".$maid_product['maid_name'] . "</option>";
                                                } ?>
                                            <?php } ?>
                                        </select>   
                                    </div>

                                    
                                   <!-- <div class="col-md-1">
                                        <input type="text" class="form-control input-sm" name="quantity" id='quantity' placeholder="Qty" />
                                    </div>-->

                                    <input type="hidden"  name="unit_maid_price" id='unit_maid_price' value="0" />
                                      <input type="hidden" name="quantity_maid" id="quantity_maid" value="1" >
                                          <input type="hidden" name="total_maid" id="total_maid" value="1" >
                                   <!-- <div class="col-md-2">
                                        <input type="text" class="form-control input-sm" name="total" id='total' placeholder="Enter Total" readonly />   
                                    </div>-->
                                  
                                    </div>
                                      <br>
<!--******************************************insurance area**********************************--> 
                                    <div class="row edr">
                                        <div class="col-lg-1"><label>Insurance</label></div>
                                            <div class="col-md-3">
                                                <select class="form-control input-sm" name="product_insurance_id" id="product_insurance_id">
                                                <option value="0" selected> --- </option>
                                                    <?php if($insurance_products != '') { ?>
                                                        <?php foreach($insurance_products as $insurance_product) {  
                                                    echo "<option value='". $insurance_product['insurance_id'] . "' data_val = '".$insurance_product['fee']."' >" . $insurance_product['insurance_name'] . "</option>";
                                                        } ?>
                                                    <?php } ?>
                                                </select>   
                                            </div>
                                            <div class="col-lg-1"><label>Insurance Price</label></div>
                                            <div class="col-md-2">
                                                <input type="text" class="form-control input-sm" name="unit_insurance_price" id='unit_insurance_price' placeholder="Insurance Fee" readonly>
                                            </div>
                                                   <!-- <div class="col-md-1">
                                                        <input type="text" class="form-control input-sm" name="quantity" id='quantity' placeholder="Qty" />
                                                    </div>-->
                                                <input type="hidden" name="quantity_insurance" id="quantity_insurance" value="1" >
                                                <input type="hidden" name="total_insurance" id="total_insurance" value="1" >
                                   <!-- <div class="col-md-2">
                                        <input type="text" class="form-control input-sm" name="total" id='total' placeholder="Enter Total" readonly />   
                                    </div>-->
                                   
                                    </div>
                                   
                                    <br>
 <!--******************************************Item area**********************************-->                                     
                                    <div class="row">
                                     <div class="col-lg-1"><label>Addhoc Item</label></div>
                                    <div class="col-md-3">
                                        <textarea  class="form-control input-sm" rows="2" name="product_item" id='product_item'  > </textarea>
                                    </div>

                                    <div class="col-lg-1"><label>Quantity</label></div>
                                   <div class="col-md-1">
                                        <input type="text" class="form-control input-sm" name="quantity_item" id='quantity_item' placeholder="Qty" />
                                    </div>
                                      <!-- <input type="hidden" name="quantity" id="quantity" value="1" > -->
                                        <!--   <input type="hidden" name="total_item" id="total_item" value="1" > -->
                                   <!-- <div class="col-md-2">
                                        <input type="text" class="form-control input-sm" name="total" id='total' placeholder="Enter Total" readonly />   
                                    </div>-->
                                    <div class="col-lg-1"><label>Item Price</label></div>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control input-sm" name="unit_item_price" id='unit_item_price' placeholder="Enter Price"/>
                                    </div>
                                    <div class="col-lg-1"><label>Total</label></div>
                                    <div class="col-md-2">
                                         <input type="text" class="form-control input-sm" name="total_item" id='total_item'  readonly />   
                                    </div>
                                  
                                    </div>

                                     <div class="col-md-2" id="add-item">
                                            <input type="hidden" id="hid-edit-id" value="" />
                                                <a href="#" id="product-add-i"><i class="fa fa-plus ico"></i></a>
                                                <a href="#" id="product-update-i"><i class="fa fa-save ico"></i></a>&nbsp&nbsp
                                                <a href="#" id="product-cancel-i"><i class="fa fa-eraser ico" ></i></a>
                                    </div> 

                                    <br>
<!--******************************************Remark area**********************************-->     
                                     
                                    <div class="row edr">
                                    <div class="col-lg-1"><label>Remark</label></div>
                                            <div class="col-md-3">
                                        <textarea  class="form-control input-sm" rows="3" name="p_remark" id='p-remark' placeholder="Enter Remark" > </textarea>
                                    </div>
                                   <!--  <div class="col-lg-1"><label>Discount</label></div>
                                       <div class="col-md-2">
                                        <input type="text" class="form-control input-sm" name="discount" id='discount' />
                                    </div> -->

                                    </div>
                                   
                                </div>


                                <div class="clearfix margin-sm-b"></div>
                                <div class="row">
                                    <div class="col-md-9 text-right" id="discount_label">Discount :</div>
                                     <div class="col-md-2"><input type="text" class="form-control input-sm" name="discount" id='discount' /></div>
                                    <div class="clearfix margin-sm-b"></div> 
                                </form>
                                    <div class="col-md-9 text-right">Total Amount :</div>
                                    <div class="col-md-2"><input type="text" class="form-control input-sm" name="total_amount" id='total-amount' placeholder="Total Amount" value="<?= isset($_POST['total_amount']) ? $_POST['total_amount'] : ( isset($quotation['total_amount']) ? $quotation['total_amount'] : '') ; ?>" readonly/></div> 
                                    <div class="clearfix margin-sm-b"></div> 
                                    <div class="col-md-9 text-right">GST :</div>
                                    <div class="col-md-2"><input type="text" class="form-control input-sm" name="gst" id='gst' placeholder="Enter GST Percentage" value="<?= isset($_POST['gst']) ? $_POST['gst'] : ( isset($quotation['gst']) ? $quotation['gst'] : 7) ; ?>"/></div> 
                                    <div class="col-md-1">%</div>
                                    <div class="clearfix margin-sm-b"></div> 
                                    <div class="col-md-9 text-right">Total Inc. GST :</div>
                                    <div class="col-md-2"><input type="text" class="form-control input-sm" name="total_inc_gst" id='total-inc-gst' placeholder="Total Inc GST" value="<?= isset($_POST['total_inc_gst']) ? $_POST['total_inc_gst'] : ( isset($quotation['total_inc_gst']) ? $quotation['total_inc_gst'] : '') ; ?>" readonly/></div> 
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

$(document).ready(function(){
      $('#product-id').change(function(){
       
        var a = $(this).find('option:selected').attr('data_val');           
          $('#unit-price').val(a);
      });


      

       $('#product_insurance_id').change(function(){
        
        var a = $(this).find('option:selected').attr('data_val');           
          $('#unit_insurance_price').val(a);
      });
});



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

    function get_detailtotalamount_i() {
    var sum = 0;
    $(".col-total-i").each(function() {
        var value = $(this).text();
        // add only if the value is number
      if(!isNaN(value) && value.length != 0) {
          sum += parseFloat(value);
      }
    });
    return sum;
  }

  function get_detailtotalamount_a() {
    var sum = 0;
    $(".col-total-a").each(function() {
        var value = $(this).text();
        // add only if the value is number
      if(!isNaN(value) && value.length != 0) {
          sum += parseFloat(value);
      }
    });
    return sum;
  }

  function get_detailtotaldiscount() {
    var sum = 0;
    $(".col-total-disc").each(function() {
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

    $("#product-update, #product-cancel,#product-update-i,#product-add-i, #product-cancel-i").hide();


    $('#unit-price, #quantity').change(function(){
        if( $.isNumeric($("#unit-price").val()) && $.isNumeric($("#quantity").val()) ) {    
           // $("#total").val( $("#unit-price").val() * $("#quantity").val() );
              $("#total").val( $("#unit-price").val()  );
        }
    });

     $('#unit_maid_price, #quantity_maid').change(function(){
        if( $.isNumeric($("#unit_maid_price").val()) && $.isNumeric($("#quantity_maid").val()) ) {    
              $("#total_maid").val( $("#unit_maid_price").val()  );
        }
    });

       $('#unit_insurance_price, #quantity_insurance').change(function(){
        if( $.isNumeric($("#unit_insurance_price").val()) && $.isNumeric($("#quantity_insurance").val()) ) {    
              $("#total_insurance").val( $("#unit_insurance_price").val()  );
        }
    });

         $('#unit_item_price, #quantity_item').change(function(){
        if( $.isNumeric($("#unit_item_price").val()) && $.isNumeric($("#quantity_item").val()) ) {    
              $("#total_item").val( $("#unit_item_price").val() * $("#quantity_item").val() );
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
    $("#product_maid_id").select2();
    $("#product_insurance_id").select2();

   document.getElementById("quantity_item").defaultValue = "1";
   document.getElementById("product_item").defaultValue = "---";
   document.getElementById("unit_insurance_price").defaultValue = "0";
   document.getElementById("unit_item_price").defaultValue = "0";
   document.getElementById("total_item").defaultValue = "0";
   document.getElementById("discount").defaultValue = "0";
    document.getElementById("p-remark").defaultValue = "---";

});
</script>

<?php if ( $action == "add" ) { ?>
  <script src="<?= base_url();?>public/js/quotation-package-add.js"></script>
<?php } elseif ( $action == "edit" ) { ?>
  <script src="<?= base_url();?>public/js/quotation-package-edit.js"></script>
<?php } ?>