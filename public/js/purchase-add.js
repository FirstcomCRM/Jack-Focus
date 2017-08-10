$( document ).ready(function() {
  $(window).on('beforeunload', function(){        
    if (!$.isEmptyObject(detailarr)) {
      return 'When you leave right now, the data will not be saved.';
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
      //Add new form data to array
      var formdata = $("#detail-form").serializeObject();    
      detailarr[detailkey] = formdata;
      //Add new data to Table
      var row =  ($('.product-grid .row').length%2)==1 ? 'row even': 'row odd';
      var classname = row + ' id-'+ detailkey;   
      $('.product-add-area').before("<div class='"+ classname +"'>"+
                        "<div class='col-md-3'>"+ $("#product-id option:selected").text() +"</div>"+
                        "<div class='col-md-2'>"+ $("#unit-price").val() +"</div>"+
                        "<div class='col-md-1'>"+ $("#quantity").val() +"</div>"+
                        "<div class='col-md-2 col-total'>"+ $("#total").val() +"</div>"+
                        "<div class='col-md-2'>"+ $("#p-remark").val() +"</div>"+
                        "<div class='col-md-2'><a href='#' class='edit-id'><i class='fa fa-edit ico'></i></a> / " +
                          "<a href='#' class='delete-id'><i class='fa fa-trash-o ico'></i></a> </div></div>");
      detailkey++;
      //Calculate Total
      $("#total-amount").val(get_detailtotalamount());
      calculateGST();
      //Resert Form
      $("#detail-form").each(function(){
        this.reset();
      });
      $("#product-id").select2("val", '');
    }
  });

  //Click Detail Edit link
  $('.product-grid').on('click', '.edit-id', function(e) {
    e.preventDefault();
    var classname = $(this).closest(".row").attr('class');
    var row = classname.split('-');
    var obj = JSON.parse(JSON.stringify(detailarr[row[1]]));
    $("#product-id").val(obj.product_id);
    $("#product-id").select2("val", obj.product_id);
    $("#unit-price").val(obj.unit_price);
    $("#quantity").val(obj.quantity);
    $("#total").val(obj.total);
    $("#p-remark").val(obj.p_remark);
    $("#hid-edit-id").val(row[1]);
    $("#product-add").hide();
    $("#product-update").show();
    $("#product-cancel").show();
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
      var formdata = $("#detail-form").serializeObject();  
      var editkey = $("#hid-edit-id").val();  
      detailarr[editkey] = formdata;
      var classname = $('.id-'+$('#hid-edit-id').val()).attr('class');
      $('.id-'+editkey).replaceWith("<div class='"+ classname +"'>"+
                    "<div class='col-md-3'>"+ $("#product-id option:selected").text() +"</div>"+
                    "<div class='col-md-2'>"+ $("#unit-price").val() +"</div>"+
                    "<div class='col-md-1'>"+ $("#quantity").val() +"</div>"+
                    "<div class='col-md-2 col-total'>"+ $("#total").val() +"</div>"+
                    "<div class='col-md-2'>"+ $("#p-remark").val() +"</div>"+
                    "<div class='col-md-2'><a href='#' class='edit-id'><i class='fa fa-edit ico'></i></a> / " +
                      "<a href='#' class='delete-id'><i class='fa fa-trash-o ico'></i></a> </div></div>");
      //Calculate Total
      $("#total-amount").val(get_detailtotalamount());
      calculateGST();
      //Resert Form
      $("#detail-form").each(function(){
        this.reset();
      });
      $("#product-id").select2("val", '');
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
    delete detailarr[row[1]];
    $(".id-"+row[1]).remove();
    //Calculate Total
    $("#total-amount").val(get_detailtotalamount());
    calculateGST();
  });

  //Click Detail Cancel Button
  $("#product-cancel").click(function(e){
    e.preventDefault();
    $("#product-id").select2("val", '');
    $("#hid-edit-id").val("");
    $("#product-add").show();
    $("#product-update").hide();
    $("#product-cancel").hide();
    //Resert Form
    $("#detail-form").each(function(){
        this.reset();
    });
  });

  // Submit New Purchase Order
  $("#btn-submit").click(function(e) {
    if($('#supplier-id').val() == '') {
      alert("Please Select Supplier"); 
    }
    else if ($('#po-date').val() == '') {
      alert("Please Select Date");
    }
    // else if ($('#unit-id').val() == '') {
    //   alert("Please Select Unit");
    // }
    else if ($.isEmptyObject(detailarr)) {
      alert("Please add at lease one product");
    }
    else {
      $.ajax({
        type: "POST",
        url: burl + "purchase_order/add", 
        data: { 
          supplier_id     : $('#supplier-id').val(),
          po_date         : $('#po-date').val(),
          total_amount    : $('#total-amount').val(),
          gst             : $('#gst').val(),
          total_inc_gst   : $('#total-inc-gst').val(),
          issued_by       : $('#issued-by').val(),
          remark          : $('#remark').val(),
          internal_remark : $('#internal-remark').val(),
          purchase_detail : detailarr,
        },
        success: function(data){  
          // alert(data);
          var result = $.parseJSON(data);
          if(result['status'] == 'success') {
            detailarr = {};  
            window.location.href = burl + 'purchase_order/view/' + result['po_id'];
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