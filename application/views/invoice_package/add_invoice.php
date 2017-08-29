

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

<form method="post" id="form_inv">


                <input type="hidden" name="inv_id" value="<?=$m_inv?>">
               

                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                                <div class="row">
                              
                                <div class="col-lg-4"><label>Invoice Code</label></div>
                                <div class="col-lg-6">
                                     <input class="form-control input-sm" type="text-align" name="" value="INV-<?=$m_inv?>" readonly>
                                </div>
                              
                            </div>
                        </div>
                    </div>    

                </div>    

                <div class="row">

                    <div class="col-lg-6">
                        <div class="form-group">
                                <div class="row">
                              
                                <div class="col-lg-4"><label>Employer</label></div>
                                <div class="col-lg-6">
                                    <select class="form-control input-sm" name="customer_id" id="customer-id">
                                        <?php if ($customers!=''): ?>
                                            <option value=""> - Please Select Employer - </option>
                                            <?php foreach ($customers as $customer): ?>
                                            <option value="<?=$customer['customer_id']?>" >
                                            <?=$customer['customer_code']." ".ucwords($customer['customer_name'])." ".ucwords($customer['employer_ic_no'])?>
                                              
                                            </option>
                                          
                                            <?php endforeach ?>
                                        <?php endif ?>
                                    </select>
                                </div>
                              
                            </div>
                        </div>


                            <div class="form-group">
                                <div class="row">
                              
                                <div class="col-lg-4"><label>Maid</label></div>
                                <div class="col-lg-6">
                                    <select class="form-control input-sm" name="maid_id" id="maid_id">
                                            <option value="" > --- </option>
                                            <?php if($maid_products != '') { ?>
                                                <?php foreach($maid_products as $maid_product) {  
                                                    echo "<option value='". $maid_product['maid_id'] . "' >" . $maid_product['maid_code']." ".$maid_product['maid_name'] . "</option>";
                                                } ?>
                                            <?php } ?>
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
                                               

                                                <?php if($this->session->userdata('fcs_role_id') > 2){ ?>
                                                          <option value="<?=$this->session->userdata('branch_id')?>" selected>
                                                                  <?php foreach ($branches as $branch): ?>
                                                                  <?= ($this->session->userdata('branch_id') == $branch['branch_id']) ? ucwords($branch['branch_name']) : '' ?>
                                                                  <?php endforeach ?> 
                                                          </option>
                                                <?php }else { ?>
                                                    <option value=""> - Please Select Branch - </option> 
                                                      <?php foreach ($branches as $branch): ?>
                                                   
                                                      <option value="<?=$branch['branch_id']?>"  <?=($this->session->userdata('branch_id') == $branch['branch_id']) ? 'selected' : '' ?> ><?= ucwords($branch['branch_name']) ?></option>
                                                    
                                                      <?php endforeach ?>
                                                
                                                <?php } ?>
                                            <?php endif ?>

                                    </select>
                                </div>
                              
                            </div>
                        </div>




                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-4"><label>Date</label></div>
                                <div class="col-lg-6 required-field-block">
                                    
                                                <input type="text" name="date" class="form-control" value="<?=date('Y-m-d')?>" readonly>
                                                   
                                                                  
                                </div>
                            </div>
                        </div>
            </div>
                    <div class="col-lg-6">

                        <div class="form-group">
                            <div class="row">
                         
                            			<div class="col-lg-4"><label>Payment</label></div>
                                		<div class="col-lg-6">
                                        <select name="payment_terms" class="form-control input-sm" id="payment-terms">
                                                    <option value="Full">Full Payment</option>
                                                    <option value="Deposit">Deposit</option>                                            
                                      	</select>
                           				</div>
                            
                            </div>
                        </div>
                         

                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-4"><label>Issued By</label></div>
                                <div class="col-lg-6"><input class="form-control input-sm" id="issued-by" name="issued_by" value=""></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-4"><label>Staff</label></div>
                                <div class="col-lg-6">
                                    <select class="form-control input-sm" name="staff_id">
                                        <?php if ($sale_persons!=''): ?>
                                            <option value=""> - Please Select Staff - </option>
                                            <?php foreach ($sale_persons as $sale_person): ?>
                                            <option value="<?=$sale_person['staff_id']?>" <?=($sale_person['staff_id'] == $this->session->userdata('fcs_role_id')) ? 'selected' : '' ?> ><?=$sale_person['staff_name']?></option>
                                            <?php endforeach ?>
                                        <?php endif ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-4"><label>Remark</label></div>
                                <div class="col-lg-6"><textarea class="form-control input-sm" id="remark" rows="5" name="inv_remark"></textarea> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-4"><label>Internal Remark <br>(Not showing on printing page)</label></div>
                                <div class="col-lg-6"><textarea class="form-control input-sm" id="internal-remark" rows="5" name="internal_remark" placeholder="This field is only for internal use, the content will not show on printing page"></textarea> </div>
                            </div>
                        </div>
                    </div>
                  </div>


                  <div class="row">
                      <h4>Order Package</h4><br>
                      <div class="col-md-6">

                         <div class="form-group">
                            <div class="row">
                                <div class="col-lg-4"><label>Package</label></div>
                                <div class="col-lg-6">
                                     <select class="form-control input-sm" name="package_id" id="package_id">
                                            <option value="0" data_val ="0" selected> --- </option>
                                            <?php if($products != '') { ?>
                                                <?php foreach($products as $product) {  
                                                    echo "<option value='". $product['package_id'] . "' data_val = '".$product['package_price']."' >" . $product['package_name'] . "</option>";
                                                } ?>
                                            <?php } ?>
                                        </select>   
                                </div>
                            </div>
                        </div>


                         <div class="form-group">
                            <div class="row">
                                <div class="col-lg-4"><label>Insurance</label></div>
                                <div class="col-lg-6">
                                      <select class="form-control input-sm" name="product_insurance_id" id="product_insurance_id">
                                                <option value="0" data_val ="0" selected> --- </option>
                                                    <?php if($insurance_products != '') { ?>
                                                        <?php foreach($insurance_products as $insurance_product) {  
                                                    echo "<option value='". $insurance_product['insurance_id'] . "' data_val = '".$insurance_product['fee']."' >" . $insurance_product['insurance_name'] . "</option>";
                                                        } ?>
                                                    <?php } ?>
                                                </select>   
                                </div>
                            </div>
                        </div>
                        




                            
                      </div>
                      <div class="col-md-6">

                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-4"><label>Package Price</label></div>
                                <div class="col-lg-6">
                                     <input type="text" class="form-control input-sm" name="unit_price" id='unit_price' placeholder="Enter Price" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-4"><label>Insurance Price</label></div>
                                <div class="col-lg-6">
                                      <input type="text" class="form-control input-sm" name="unit_insurance_price" id='unit_insurance_price' placeholder="Enter Insurance" readonly>
                                </div>
                            </div>
                        </div>
                        
                      </div>                    
                  </div>



                  <div class="row">
                  <h4>Adhoc Item</h4><br>

                      <div class="col-lg-12">
                           <table id="myTable" class=" table order-list">
                                <thead>
                                    <tr>
                                        <td>Adhoc Item</td>
                                        <td>Qty</td>
                                        <td>Item Price</td>
                                        <td>Total</td>
                                        <td>Remark</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>



                             <!--            <td class="col-sm-3">
                                            <input type="text" name="addhoc_item" id ="addhoc_item0" class="form-control" />
                                        </td>
                                        <td class="col-sm-1">
                                            <input type="mail" name="qty"  id="qty0" class="form-control" onblur="addhoc_calc(0)"/>
                                        </td>
                                        <td class="col-sm-2">
                                            <input type="text" name="item_p" id="item_p0" class="form-control" onblur="addhoc_calc(0)"/>
                                        </td>
                                          <td class="col-sm-2">
                                            <input type="text" name="total"  id="total0" class="form-control" readonly />
                                        </td>
                                          <td class="col-sm-3">
                                            <input type="text" name="remark" id="remark0" class="form-control"/>
                                        </td>
                                        <td class="col-sm-1"><a class="deleteRow"></a>
 -->

                                        </td>

                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="5" style="text-align: left;">
                                            <input type="button" class="btn btn-lg btn-primary " id="addrow" value="Add Item" />
                                        </td>
                                    </tr>
                                    <tr>
                                    </tr>
                                </tfoot>
                            </table>


                      </div>
                    
                  </div>

                     
                      <!-- <button id="submit_inv"> Save </button> -->

<br>
                 

                      <div class="row">
                        <div class="col-lg-6">
                            
                        </div>
                         <div class="col-lg-6">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-4"><label>Total : </label></div>
                                        <div class="col-lg-6">
                                             <input type="tex" class="form-control input-sm" name="total_value" id="total_value" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-4"><label>Total GST (7%)</label></div>
                                        <div class="col-lg-6">
                                              <input type="tex" class="form-control input-sm" name="total_gst" id="total_gst" readonly>  
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-4"><label>Total Inc. GST</label></div>
                                        <div class="col-lg-6">
                                             <input type="tex" class="form-control input-sm" name="total_value_w_gst" id="total_value_w_gst" readonly>
                                        </div>
                                    </div>
                                </div>


                               <div class="row">
                                        <div class="col-lg-4"><label></label></div>
                                        <div class="col-lg-6">
                                                 <button class="btn btn-lg btn-primary " id="save_val" name="" > SAVE </button>
                                        </div>
                                </div>
                                
                               
                                 <br>

                                  <br>

                                  <br>

                                  <br>

                        </div>

                          
                      </div>


                  </form>


              </div>
          </div>
      </div>

     

</div>
     


<script type="text/javascript">
   $("#maid_id").select2();
  //   $('#unit_price').find('option:selected').attr('data_val');   
  // $('#unit_insurance_price').find('option:selected').attr('data_val');   




   $(document).ready(function(){
      $('#package_id').change(function(){
       
        var a = $(this).find('option:selected').attr('data_val');           
          
        $('#unit_price').val(a);

        if(isNaN(a) || a == ''){
            a= 0;
        }
               // counting the table row value

        total = 0;
        cnt_tr = $('#myTable tbody tr').length;

        if(cnt_tr !==0){
            for (i = 1; i < cnt_tr; i++) {

                t =  $('#total'+i).val();

                if(isNaN(t) || t==''){
                   
                    t = 0;
                }

                total += parseFloat(t);

            }
        }


        b = $('#unit_insurance_price').val();

        if(isNaN(b) || b ==''){           
            b = 0;
        }



        total_val = parseFloat(total) + parseFloat(a) +  parseFloat(b);

           // total value
         $('#total_value').val(total_val);

         // total gst
         total_gst = parseFloat(total_val) * 0.07;
          $('#total_gst').val(total_gst);

          // total w/ gst
          total_value_w_gst =  parseFloat(total_val) + parseFloat(total_gst);
          $('#total_value_w_gst').val(total_value_w_gst);


      });


      

       $('#product_insurance_id').change(function(){
        
        var a = $(this).find('option:selected').attr('data_val');           
          $('#unit_insurance_price').val(a);

        if(isNaN(a)){
            a= 0;
        }

               // counting the table row value

        total = 0;
        cnt_tr = $('#myTable tbody tr').length;

        if(cnt_tr !==0){
            for (i = 1; i < cnt_tr; i++) {

                t =  $('#total'+i).val();

                if(isNaN(t) || t == ''){
                   
                    t = 0;
                }

                total += parseFloat(t);

            }
        }


         b = $('#unit_price').val();

        if(isNaN(b) || b == ''){           
            b = 0;
        }

        total_val = parseFloat(total) + parseFloat(a) +  parseFloat(b);

        
                  // total value
         $('#total_value').val(total_val);

         // total gst
         total_gst = parseFloat(total_val) * 0.07;
          $('#total_gst').val(total_gst);

          // total w/ gst
          total_value_w_gst =  parseFloat(total_val) + parseFloat(total_gst);
          $('#total_value_w_gst').val(total_value_w_gst);


      });




    var counter = 1;

    $("#addrow").on("click", function () {
        var newRow = $("<tr>");
        var cols = "";

        cols += '<td><input type="text" class="form-control" name="addhoc_item[]" id="addhoc_item' + counter + '"/></td>';
        cols += '<td><input type="text" class="form-control" name="qty[]" id="qty' + counter + '"  onblur="addhoc_calc('+ counter +')"/></td>';
        cols += '<td><input type="text" class="form-control number_in" name="item_p[]" id="item_p' + counter + '"  onblur="addhoc_calc('+ counter +')"/></td>';
         cols += '<td><input type="text" class="form-control" name="total[]" id="total' + counter + '" readonly/></td>';
         cols += '<td><input type="text" class="form-control" name="remark[]" id="remark' + counter + '"/></td>';

        cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Delete"></td>';
        newRow.append(cols);
        $("table.order-list").append(newRow);
        counter++;
    });




    $("table.order-list").on("click", ".ibtnDel", function (event) {
        $(this).closest("tr").remove();       
        counter -= 1



            total = 0;
        cnt_tr = $('#myTable tbody tr').length;

        if(cnt_tr !==0){
            for (i = 1; i < cnt_tr; i++) {

                t =  $('#total'+i).val();

                if(isNaN(t) || t == ''){
                   
                    t = 0;
                }

                total += parseFloat(t);

            }
        }

        unit_p_val = $('#unit_price').val();
        unit_i_val =  $('#unit_insurance_price').val();

            if(isNaN(unit_p_val) || unit_p_val == ''){
               
                unit_p_val = 0;
            }

            if(isNaN(unit_i_val) || unit_i_val == ''){
               
                unit_i_val = 0;
            }

         total_val =   parseFloat(total) + parseFloat(unit_p_val) + parseFloat(unit_i_val);


                 // total value
         $('#total_value').val(total_val);

         // total gst
         total_gst = parseFloat(total_val) * 0.07;
          $('#total_gst').val(total_gst);

          // total w/ gst
          total_value_w_gst =  parseFloat(total_val) + parseFloat(total_gst);
          $('#total_value_w_gst').val(total_value_w_gst);


    });





    $( "#form_inv" ).submit(function( event ) {
               
        total = 0;
        cnt_tr = $('#myTable tbody tr').length;
        var arr_data =[];
                  x=0;  
            for (i = 1; i < cnt_tr; i++) {

                ad = $('#addhoc_item'+i).val();
                qt = $('#qty'+i).val();
                ip = $('#item_p'+i).val();
                r = $('#remark'+i).val();

                // arr_data.push({'addhoc':ad,'qty':qt,'item_p':ip,'remark':r});
               // arr_data.push(ad,qt,ip,r);
               // data_val = [ad,qt,ip,r]


                  var data_value =  { 
                            addhoc_item: ad,
                            qty: qt, 
                            item_p: ip,
                            remark: r
                        }; 
                        
               arr_data.push( JSON.stringify(data_value) );

            
                x++;    
            }
     
              var input = $("<input>").attr("type", "hidden").attr("name", "mydata").val(arr_data);
            $(this).append($(input));

    });




});



    function addhoc_calc(id){

        var a = $('#qty'+id).val();
        var b = $('#item_p'+id).val();

            if(isNaN(a) || a == ''){
                $('#qty'+id).val(0);
                a = 0;
            }
            if(isNaN(b) || b == ''){
                $('#item_p'+id).val(0);
                b = 0;
            }

            if(a=='' || a == null){ a=0;}
            if(b=='' || b == null){ b=0;}

            

        y =  parseFloat(a) * parseFloat(b); 

        $('#total'+id).val(y);


        // counting the table row value

        total = 0;
        cnt_tr = $('#myTable tbody tr').length;

        if(cnt_tr !==0){
            for (i = 1; i < cnt_tr; i++) {

                t =  $('#total'+i).val();

                if(isNaN(t) || t == ''){
                   
                    t = 0;
                }

                total += parseFloat(t);

            }
        }

        unit_p_val = $('#unit_price').val();
        unit_i_val =  $('#unit_insurance_price').val();

            if(isNaN(unit_p_val) || unit_p_val == ''){
               
                unit_p_val = 0;
            }

            if(isNaN(unit_i_val) || unit_i_val == ''){
               
                unit_i_val = 0;
            }

         total_val =   parseFloat(total) + parseFloat(unit_p_val) + parseFloat(unit_i_val);


                 // total value
         $('#total_value').val(total_val);

         // total gst
         total_gst = parseFloat(total_val) * 0.07;
          $('#total_gst').val(total_gst);

          // total w/ gst
          total_value_w_gst =  parseFloat(total_val) + parseFloat(total_gst);
          $('#total_value_w_gst').val(total_value_w_gst);

   }


</script>                






                 