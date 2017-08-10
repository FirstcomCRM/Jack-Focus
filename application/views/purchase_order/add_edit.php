
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?=$action=='add'?'New':'Edit'?> Purchase Order</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
          <li><a href="<?=base_url()?>dashboard"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a></li>
          <li><a href="<?=base_url()?>purchase_order">Purchase Order</a></li>
          <li class="active"><?=$action=='add'?'New':'Edit'?> Purchase Order</li>
            <div class="pull-right">
                <div class="btn-group">
                    <a class="btn btn-default btn-xs" href="<?=base_url()?>purchase_order"><i class="fa fa-arrow-circle-o-left"></i> Back</a>
                </div>
            </div>
        </ol>
    </div>
</div>
<?php if ($action=='edit'): ?>
    <div class="row">
        <div class="col-lg-12 text-right">
            <a class="btn btn-default btn-sm" href="<?=base_url()?>purchase_order/view/<?=$purchase_order['purchase_order_id']?>"><i class="fa fa-search"></i> View</a>
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
                Purchase Order Details
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-4"><label>Supplier</label></div>
                                <div class="col-lg-6">
                                <input type="hidden" name="hid_po_id" id="hid-po-id" value="<?= ($action == 'edit') ? $purchase_order['purchase_order_id'] : ''; ?>" >
                                    <select class="form-control input-sm" name="supplier_id" id="supplier-id">
                                        <?php if ($suppliers!=''): ?>
                                            <option value=""> - Please Select Supplier - </option>
                                            <?php foreach ($suppliers as $supplier): ?>
                                            <option value="<?=$supplier['supplier_id']?>" <?=isset($_POST['supplier_id'])&&$_POST['supplier_id']==$supplier['supplier_id']?"selected":(isset($purchase_order['supplier_id'])&&$purchase_order['supplier_id']==$supplier['supplier_id']?'selected':'')?>><?=$supplier['company_name']?></option>
                                            <?php endforeach ?>
                                        <?php endif ?>
                                    </select>
                                </div>
                                <div class="col-lg-1 required-icon">
                                    <div class="text" style="color:#B80000;font-size: 26px;">*</div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-4"><label>Date</label></div>
                                <div class="col-lg-6  required-field-block">
                                    <input class="form-control input-sm" id="po-date" name="po_date" value="<?=isset($_POST['po_date'])?$_POST['po_date']:(isset($purchase_order['po_date'])?date('d-m-Y',$purchase_order['po_date']):date('d-m-Y'))?>">
                                    <div class="required-icon">
                                        <div class="text">*</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-4"><label>Issued By</label></div>
                                <div class="col-lg-6"><input class="form-control input-sm" id="issued-by" name="issued_by" value="<?=isset($_POST['issued_by'])?$_POST['issued_by']:(isset($purchase_order['issued_by'])?$purchase_order['issued_by']:'')?>"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-4"><label>Remark</label></div>
                                <div class="col-lg-6"><textarea class="form-control input-sm" id="remark" rows="5" name="remark"><?=isset($_POST['remark'])?$_POST['remark']:(isset($purchase_order['remark'])?$purchase_order['remark']:'')?></textarea> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-4"><label>Internal Remark <br>(Not showing on printing page)</label></div>
                                <div class="col-lg-6"><textarea class="form-control input-sm" id="internal-remark" rows="5" name="internal_remark" placeholder="This field is only for internal use, the content will not show on printing page"><?=isset($_POST['internal_remark'])?$_POST['internal_remark']:(isset($purchase_order['internal_remark'])?$purchase_order['internal_remark']:'')?></textarea> </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="clearfix margin-sm-b"></div>
                        <div class="col-sm-12 order-header">Order Product Information</div>
                        <div class="clearfix margin-sm-b"></div>
                        <div class="col-sm-12">
                            <div class="row-fluid grid-area product-grid"> 
                                <div class="row tbl-head">
                                    <div class="col-md-3">Product</div>
                                    <div class="col-md-2">Unit Pirce</div>
                                    <div class="col-md-1">Quantity</div>
                                    <div class="col-md-2">Total</div>
                                    <div class="col-md-2">Remark</div>
                                    <div class="col-md-2">Action</div>
                                </div>
                                <?php 
                                    if(isset($po_products) && count($po_products) != 0) { 
                                        $count = 0; 
                                        foreach ($po_products as $po_product) : 
                                          $row =  ($count%2)==1 ? 'row odd': 'row even';
                                          $classname = $row . ' id-'.$po_product['po_product_id']; 
                                ?>
                                        <div class="<?= $classname; ?>"> 
                                            <div class='col-md-3'><?= $po_product['product_name']; ?></div>
                                            <div class='col-md-2'><?= $po_product['unit_price']; ?></div>
                                            <div class='col-md-1'><?= $po_product['quantity']; ?></div>
                                            <div class='col-md-2 col-total'><?= $po_product['total_amount']; ?></div>  
                                            <div class='col-md-2'><?= $po_product['remark']; ?></div>  
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
                                            <option value="" selected>Select Product</option>
                                            <?php if($products != '') { ?>
                                                <?php foreach($products as $product) {  
                                                    echo "<option value='". $product['product_id'] . "' >" . $product['product_name'] . "</option>";
                                                } ?>
                                            <?php } ?>
                                        </select>   
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control input-sm" name="unit_price" id='unit-price' placeholder="Enter Price" />
                                    </div>
                                    <div class="col-md-1">
                                        <input type="text" class="form-control input-sm" name="quantity" id='quantity' placeholder="Qty" />
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control input-sm" name="total" id='total' placeholder="Enter Total" readonly />   
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control input-sm" name="p_remark" id='p-remark' placeholder="Enter Remark" />   
                                    </div>
                                    <div class="col-md-2">
                                        <input type="hidden" id="hid-edit-id" value="" />
                                        <a href="#" id="product-add"><i class="fa fa-plus ico"></i></a>
                                        <a href="#" id="product-update"><i class="fa fa-save ico"></i></a>&nbsp&nbsp
                                        <a href="#" id="product-cancel"><i class="fa fa-eraser ico" ></i></a>
                                    </div> 
                                  </form>  
                                </div>
                                <div class="clearfix margin-sm-b"></div>
                                <div class="row">
                                    <div class="col-md-9 text-right">Total Amount :</div>
                                    <div class="col-md-2"><input type="text" class="form-control input-sm" name="total_amount" id='total-amount' placeholder="Enter Total Amount" value="<?= isset($_POST['total_amount']) ? $_POST['total_amount'] : ( isset($purchase_order['total_amount']) ? $purchase_order['total_amount'] : '') ; ?>" readonly/></div> 
                                    <div class="clearfix margin-sm-b"></div> 
                                    <div class="col-md-9 text-right">GST :</div>
                                    <div class="col-md-2"><input type="text" class="form-control input-sm" name="gst" id='gst' placeholder="Enter GST Percentage" value="<?= isset($_POST['gst']) ? $_POST['gst'] : ( isset($purchase_order['gst']) ? $purchase_order['gst'] : 7) ; ?>"/></div> 
                                    <div class="col-md-1">%</div>
                                    <div class="clearfix margin-sm-b"></div> 
                                    <div class="col-md-9 text-right">Total Inc. GST :</div>
                                    <div class="col-md-2"><input type="text" class="form-control input-sm" name="total_inc_gst" id='total-inc-gst' placeholder="Enter Total Inc GST" value="<?= isset($_POST['total_inc_gst']) ? $_POST['total_inc_gst'] : ( isset($purchase_order['total_inc_gst']) ? $purchase_order['total_inc_gst'] : '') ; ?>" readonly/></div> 
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

    $("#supplier-id").select2();
    $("#product-id").select2();

    $("#product-update, #product-cancel").hide();
    // $('#unit-id').change(function(){
    //     if( $('#unit-id').val() != '') {
    //         $('.unit-area').html($("#unit-id option:selected").text()); 
    //     }
    // });

    $('#unit-price, #quantity').change(function(){
        if( $.isNumeric($("#unit-price").val()) && $.isNumeric($("#quantity").val()) ) {    
            $("#total").val( $("#unit-price").val() * $("#quantity").val() );
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
  });
</script>
<?php if ( $action == "add" ) { ?>
  <script src="<?= base_url();?>public/js/purchase-add.js"></script>
<?php } elseif ( $action == "edit" ) { ?>
  <script src="<?= base_url();?>public/js/purchase-edit.js"></script>
<?php } ?>