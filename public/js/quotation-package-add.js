

$( document ).ready(function() {
  $(window).on('beforeunload', function(){     

    if (!$.isEmptyObject(detailarr)) {
      return 'If you leave right now, the data will not be saved.';
    }
  });

  //Add Detail
  $("#product-add").click(function(e){ 
    e.preventDefault();
   
    
    
    
    if($("#product-id").val() == '' ) {
      alert("Please Select Product");
    }
    else if (!$.isNumeric($("#unit-price").val())) {
      alert("Please Check Price");
    }
    else if (!$.isNumeric($("#quantity").val())) {
      alert("Please Check Quantity");
    }
    else if ( !$.isNumeric($("#total").val()) ) {
      alert("Please Check Total");
    }
    else {
       $(".edr").hide();
       $("#product-add-i").show();

      //Add new form data to array
      var formdata = $("#detail-form").serializeObject();    
      detailarr[detailkey] = formdata;
      //Add new data to Table
      var row =  ($('.product-grid .row').length%2)==1 ? 'row even': 'row odd';
      var classname = row + ' id-'+ detailkey;   
      $('.product-add-area').before("<div class='"+ classname +"'>"+
                        "<div class='col-md-2'><b>FDW:</b></div>"+
                        "<div class='col-md-10'>"+ $("#product_maid_id option:selected").text() +"</div><br>"+

                       "<div class='col-md-2'><b>Package:</b></div>"+
                        "<div class='col-md-4'>"+ $("#product-id option:selected").text() +"</div>"+
                        "<div class='col-md-2'><b>Package Price:</b></div>"+
                        "<div class='col-md-4 col-total'>"+ $("#unit-price").val() +"</div><br>"+
                        //"<div class='col-md-1'>"+ $("#quantity").val() +"</div>"+
                       // "<div class='col-md-2 '>"+ $("#total").val() +"</div>"+
                        // "<div class='col-md-2'>"+ $("#p-remark").val() +"</div>"+
                        

                        "<div class='col-md-2'><b>Insurance:</b></div>"+
                         "<div class='col-md-4'>"+ $("#product_insurance_id option:selected").text() +"</div>"+
                         "<div class='col-md-2'><b>Insurance Price:</b></div>"+
                          "<div class='col-md-4 col-total-i'>"+ $("#unit_insurance_price").val() +"</div><br>"+

                          "<div class='col-md-2'><b>Addhoc Item</b></div>"+
                          "<div class='col-md-10'>"+ $("#product_item").val() +"</div>"+
                           "<div class='col-md-2'><b>Addhoc Qty</b></div>"+
                          "<div class='col-md-10'>"+ $("#quantity_item").val() +"</div><br>"+
                          "<div class='col-md-2'><b>Addhoc Price</b></div>"+
                          "<div class='col-md-4 '>"+ $("#unit_item_price").val() +"</div>"+
                          "<div class='col-md-2'><b>Addhoc Total Price</b></div>"+
                          "<div class='col-md-4 col-total-a'>"+ $("#total_item").val() +"</div>"+
                           

                           "<div class='col-md-2'><b>Remark</b></div>"+
                          "<div class='col-md-4'>"+ $("#p-remark").val() +"</div>"+
                           "<div class='col-md-2'><b>Discount</b></div>"+
                          "<div class='col-md-4 col-total-disc'>"+ $("#discount").val() +"</div>"+


                        "<div class='col-md-2'><a href='#' class='edit-id'><i class='fa fa-edit ico'></i></a> / " +
                          "<a href='#' class='delete-id'><i class='fa fa-trash-o ico'></i></a> </div></div>");
      detailkey++;
      //Calculate Total
      $("#total-amount").val(get_detailtotalamount() + get_detailtotalamount_i() + get_detailtotalamount_a() - get_detailtotaldiscount());
      calculateGST();
      $("#discount").val(obj.discount);
      //Resert Form
      $("#detail-form").each(function(){
        this.reset();
      });
      $("#product-id").select2("val", '');

    }
  });















  $("#product-add-i").click(function(e){ 
    e.preventDefault();
 
    $("#product-add-i").show();
  

      //Add new form data to array
      var formdata = $("#detail-form").serializeObject();    
      detailarr[detailkey] = formdata;
      //Add new data to Table
      var row =  ($('.product-grid .row').length%2)==1 ? 'row even': 'row odd';
      var classname = row + ' id-'+ detailkey;   
      $('.product-add-area').before("<div class='"+ classname +"'>"+
     

                  
                          "<div class='col-md-2'><b>Addhoc Item</b></div>"+
                          "<div class='col-md-10'>"+ $("#product_item").val() +"</div>"+
                           "<div class='col-md-2'><b>Addhoc Qty</b></div>"+
                          "<div class='col-md-10'>"+ $("#quantity_item").val() +"</div><br>"+
                          "<div class='col-md-2'><b>Addhoc Price</b></div>"+
                          "<div class='col-md-4 '>"+ $("#unit_item_price").val() +"</div>"+
                          "<div class='col-md-2'><b>Addhoc Total Price</b></div>"+
                          "<div class='col-md-4 col-total-a'>"+ $("#total_item").val() +"</div>"+
         

                        "</div>");
      detailkey++;
      //Calculate Total
      $("#total-amount").val(get_detailtotalamount() + get_detailtotalamount_i() + get_detailtotalamount_a() - get_detailtotaldiscount());
      calculateGST();
      //Resert Form
      $("#detail-form").each(function(){
        this.reset();
      });
      $("#product-id").select2("val", '');

  
  });






















  //Click Detail Edit link
  $('.product-grid').on('click', '.edit-id', function(e) {
    e.preventDefault();
    var classname = $(this).closest(".row").attr('class');
    var row = classname.split('-');
    var obj = JSON.parse(JSON.stringify(detailarr[row[1]]));
     $(".edr").show();
      
    $("#product-id").val(obj.product_id);
    $("#product-id").select2("val", obj.product_id);

    $("#product_maid_id").val(obj.product_maid_id);
    $("#product_maid_id").select2("val", obj.product_maid_id);

    $("#product_insurance_id").val(obj.product_insurance_id);
    $("#product_insurance_id").select2("val", obj.product_insurance_id);

    $("#product_item").val(obj.product_item);
    $("#discount").val(obj.discount);
    $("#unit_item_price").val(obj.unit_item_price);

    $("#unit-price").val(obj.unit_price);
    $("#unit_insurance_price").val(obj.unit_insurance_price);
    $("#quantity").val(obj.quantity);
    $("#quantity_item").val(obj.quantity_item);
    $("#total").val(obj.total);
    $("#total_maid").val(obj.total_maid);
    $("#total_insurance").val(obj.total_insurance);
    $("#total_item").val(obj.total_item);
    $("#p-remark").val(obj.p_remark);
    $("#hid-edit-id").val(row[1]);
    $("#product-add").hide();
    $("#product-update").show();
    $("#product-cancel").show();
    $("#product-add-i").hide();

  });

  //Click Detail Update Button
  $("#product-update").click(function(e){
    e.preventDefault();
    if($("#product-id").val() == '' ) {
      alert("Please Select product");
    }
    else if (!$.isNumeric($("#unit-price").val())) {
      alert("Please Check Price");
    }
    else if (!$.isNumeric($("#quantity").val())) {
      alert("Please Check Quantity");
    }
    else if ( !$.isNumeric($("#total").val()) ) {
      alert("Please Check Total");
    }
    //Insert
    else {
      $(".edr").hide();
      $("#product-add-i").show();

  
      var formdata = $("#detail-form").serializeObject();  
      var editkey = $("#hid-edit-id").val();  
      detailarr[editkey] = formdata;
      var classname = $('.id-'+$('#hid-edit-id').val()).attr('class');
      $('.id-'+editkey).replaceWith("<div class='"+ classname +"'>"+
                        "<div class='col-md-2'><b>FDW:</b></div>"+
                        "<div class='col-md-10'>"+ $("#product_maid_id option:selected").text() +"</div><br>"+

                       "<div class='col-md-2'><b>Package:</b></div>"+
                        "<div class='col-md-4'>"+ $("#product-id option:selected").text() +"</div>"+
                        "<div class='col-md-2'><b>Package Price:</b></div>"+
                        "<div class='col-md-4 col-total'>"+ $("#unit-price").val() +"</div><br>"+
                        //"<div class='col-md-1'>"+ $("#quantity").val() +"</div>"+
                       // "<div class='col-md-2 '>"+ $("#total").val() +"</div>"+
                        // "<div class='col-md-2'>"+ $("#p-remark").val() +"</div>"+
                        

                        "<div class='col-md-2'><b>Insurance:</b></div>"+
                         "<div class='col-md-4'>"+ $("#product_insurance_id option:selected").text() +"</div>"+
                         "<div class='col-md-2'><b>Insurance Price:</b></div>"+
                          "<div class='col-md-4 col-total-i'>"+ $("#unit_insurance_price").val() +"</div><br>"+

                          "<div class='col-md-2'><b>Addhoc Item</b></div>"+
                          "<div class='col-md-10'>"+ $("#product_item").val() +"</div>"+
                           "<div class='col-md-2'><b>Addhoc Qty</b></div>"+
                          "<div class='col-md-10'>"+ $("#quantity_item").val() +"</div><br>"+
                          "<div class='col-md-2'><b>Addhoc Price</b></div>"+
                          "<div class='col-md-4 '>"+ $("#unit_item_price").val() +"</div>"+
                          "<div class='col-md-2'><b>Addhoc Total Price</b></div>"+
                          "<div class='col-md-4 col-total-a'>"+ $("#total_item").val() +"</div>"+
                           

                           "<div class='col-md-2'><b>Remark</b></div>"+
                          "<div class='col-md-4'>"+ $("#p-remark").val() +"</div>"+
                           "<div class='col-md-2'><b>Discount</b></div>"+
                          "<div class='col-md-4 col-total-disc'>"+ $("#discount").val() +"</div>"+


                        "<div class='col-md-2'><a href='#' class='edit-id'><i class='fa fa-edit ico'></i></a> / " +
                          "<a href='#' class='delete-id'><i class='fa fa-trash-o ico'></i></a> </div></div>");
      //Calculate Total
      $("#total-amount").val(get_detailtotalamount() + get_detailtotalamount_i() + get_detailtotalamount_a() - get_detailtotaldiscount());
      calculateGST();
      //Resert Form
      $("#detail-form").each(function(){
        this.reset();
      });
      $("#product-id").select2("val", '');
      $("#product_maid_id").select2("val", '');
      $("#product_insurance_id").select2("val", '');
      $("#hid-edit-id").val("");
      $("#product-add").show();
      $("#product-update").hide();
      $("#product-cancel").hide();
    }
  });



  //Click Detail Delete link
  $('.product-grid').on('click', '.delete-id', function(e) {
    e.preventDefault();

    var classname = $(this).closest(".row").attr('class');
    var row = classname.split('-');
    $(".edr").show();
    $("#product-add-i").hide();
    delete detailarr[row[1]];
    $(".id-"+row[1]).remove();
    //Calculate Total
      $("#total-amount").val(get_detailtotalamount() + get_detailtotalamount_i() + get_detailtotalamount_a() - get_detailtotaldiscount());
    calculateGST();
  });

  //Click Detail Cancel Button
  $("#product-cancel").click(function(e){
    e.preventDefault();
    $("#hid-edit-id").val("");
    $("#product-add").show();
    $("#product-update").hide();
    $("#product-cancel").hide();
     $(".edr").hide();
     $("#product-add-i").show();
    //Resert Form
    $("#detail-form").each(function(){
        this.reset();
    });
    $("#product-id").select2("val", '');
  });



  // Submit New Sale Order
  $("#btn-submit").click(function(e) {
    if($('#customer-id').val() == '') {
      alert("Please Select Customer"); 
    }else if($('#branch_id').val() == '') {
      alert("Please Select Branch"); 
    }
    else if ($('#quotation-date').val() == '') {
      alert("Please Select Date");
    }
    // else if ($('#customer-id').val() == '') {
    //   alert("Please Select Customer");
    // }
    // else if ($('#unit-id').val() == '') {
    //   alert("Please Select Unit");
    // }
    else if ($.isEmptyObject(detailarr)) {
      alert("Please Add at least one product");
    }
    else {

      $.ajax({
        type: "POST",
        url: burl + "invoice/add_package", 
        data: { 
          
          customer_id     : $('#customer-id').val(),
          branch_id       : $('#branch_id').val(),
          quotation_date  : $('#quotation-date').val(),
          payment_terms   : $('#payment-terms').val(),
          issued_by       : $('#issued-by').val(),
          sale_person_id  : $('#sale_person_id').val(),
          remark          : $('#remark').val(),
          internal_remark : $('#internal-remark').val(),
          total_amount    : $('#total-amount').val(),
          gst             : $('#gst').val(),
          total_inc_gst   : $('#total-inc-gst').val(),
          sale_detail     : detailarr,
        },
        success: function(data){  

          var result = $.parseJSON(data);
          if(result['status'] == 'success') {
            detailarr = {};  
            window.location.href = burl + 'invoice/view_package/' + result['quotation_id'];


          }
          else {
            alert("Something wrong with data");
          }
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) { 
          alert("ERROR!!!");         
        } 
      });
    }
  });

    
});