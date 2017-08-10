$( document ).ready(function() {

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
		  $.ajax({
		    type :  "POST",
		    url  :  burl + "invoice/aj_add_package_details",
		    data :  { 
		      	quotation_id         : $("#hid-quo-id").val(),
			    product_id           : $("#product-id").val(),
			    unit_price      	 : $("#unit-price").val(),
			    quantity       	     : $("#quantity").val(),
			    total          	     : $("#total").val(),
		      	product_maid_id 	 : $("#product_maid_id").val(),
		      	product_insurance_id : $("#product_insurance_id").val(),
		      	quantity_item        : $("#quantity_item").val(),
		      	product_item         : $("#product_item").val(),
		      	total_insurance   	 : $("#total_insurance").val(),
		      	total_item       	 : $("#total_item").val(),
		      	total_maid       	 : $("#total_maid").val(),
		      	unit_item_price      : $("#unit_item_price").val(),
		      	discount         	 : $("#discount").val(),
		      	p_remark         	 : $("#p-remark").val(),
		      	unit_insurance_price : $("#unit_insurance_price").val()
		   
		    },
		    success: function(data){  
		      var result = $.parseJSON(data);
		      if(result['status'] == 'success') {
		        //Add new data to Table
		        var row =  ($('.product-grid .row').length%2)==1 ? 'row even': 'row odd';
		        var classname = row + ' id-'+ result['qp_id'];   
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
		        //Calculate Total
		        $("#total-amount").val(get_detailtotalamount() + get_detailtotalamount_i() + get_detailtotalamount_a() - get_detailtotaldiscount());
      			calculateGST();
		         //Resert Form
		        $("#detail-form").each(function(){
		          this.reset();
		        });
		        $("#product-id").select2("val", '');
		      }
		      else {
		        alert("Something wrong with data.");
		      }
		    },
		    error: function(XMLHttpRequest, textStatus, errorThrown) { 
		      alert("ERROR - A!!!");     
		      alert(errorThrown);      
		    } 
		  });
		}
	}); 

	//Click Detail Edit link
	$('.product-grid').on('click', '.edit-id', function(e) {
		e.preventDefault();
		var classname = $(this).closest(".row").attr('class');
		var row = classname.split('-');
		$.ajax({
		  type: "POST",
		  url  :  burl + "invoice/aj_get_package_details/"+row[1],
		  data: { },
		  success: function(data){ 
		  	// alert(data);
		    var result = $.parseJSON(data);
		    if(result['status'] == 'success') {
		       	$("#product-id").val(result['package_id']);
		       	$("#product-id").select2("val", result['package_id']);
		       	$("#product_maid_id").val(result['maid_id']);
		       	$("#product_maid_id").select2("val", result['maid_id']);
		       	$("#product_insurance_id").val(result['insurance_id']);
		       	$("#product_insurance_id").select2("val", result['insurance_id']);

			    $("#unit-price").val(result['unit_price']);
			    $("#unit_insurance_price").val(result['insurance_fee']);
			    $("#unit_item_price").val(result['addhoc_price']);

			    $("#discount").val(result['discount']);

			    $("#quantity").val(result['quantity']);
			    $("#total").val(result['total_amount']);
			    $("#p-remark").val(result['remark']);
			    $("#product_item").val(result['addhoc']);
			    $("#discount").val(result['discount']);
			    $("#total").val(result['total_amount']);
			  
			    $("#quantity_item").val(result['addhoc_qty']);
			    $("#total_maid").val(result['total_maid']);
			    $("#total_insurance").val(result['total_insurance']);
			    $("#total_item").val(result['addhoc_total']);
			
			    $("#total_maid").val(result['total_maid']);
			    $("#hid-edit-id").val(row[1]);
			    $("#product-add").hide();
			    $("#product-update").show();
			    $("#product-cancel").show();

			  



		    }
		  },

		  error: function(XMLHttpRequest, textStatus, errorThrown) { 
		    alert("ERROR   -  B!!!");           
		    alert(errorThrown);
		  } 
		});  
	});

	//Click Detail Update Button
	$("#product-update").click(function(e){
		//Validate
		e.preventDefault();
		//Validation
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
		  var editkey = $("#hid-edit-id").val();  
		  $.ajax({
		    type :  "POST",
		    url  :  burl + "invoice/aj_edit_package_details/"+editkey,
		    data :  { 
		      	quotation_id         : $("#hid-quo-id").val(),
			    product_id           : $("#product-id").val(),
			    unit_price      	 : $("#unit-price").val(),
			    quantity       	     : $("#quantity").val(),
			    total          	     : $("#total").val(),
		      	product_maid_id 	 : $("#product_maid_id").val(),
		      	product_insurance_id : $("#product_insurance_id").val(),
		      	quantity_item        : $("#quantity_item").val(),
		      	product_item         : $("#product_item").val(),
		      	total_insuranc   	 : $("#total_insurance").val(),
		      	total_item       	 : $("#total_item").val(),
		      	total_maid       	 : $("#total_maid").val(),
		      	unit_item_price      : $("#unit_item_price").val(),
		      	discount         	 : $("#discount").val(),
		      	p_remark         	 : $("#p-remark").val(),
		      	unit_insurance_price : $("#unit_insurance_price").val()
		      

		    },
		    success: function(data) {  
		      var result = $.parseJSON(data);
		      if(result['status'] == 'success') {
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
		      else {
		        alert("Something wrong with data.");
		      }
		    },
		    error: function(XMLHttpRequest, textStatus, errorThrown) { 
		      alert("ERROR - C!!!");      
		    } 
		  });
		}
	});

	//Click Detail Delete link
	$('.product-grid').on('click', '.delete-id', function(e) {
	e.preventDefault();
	var classname = $(this).closest(".row").attr('class');
	var row = classname.split('-');
	$.ajax({
	  type :  "POST",
	  url  :  burl + "invoice/aj_remove_package_product/"+row[1],
	  data :  { },
	  success: function(data){  
	    var result = $.parseJSON(data);
	    if(result['status'] == 'success') {
	      	$(".id-"+row[1]).remove();
	      	//Calculate Total
	       	$("#total-amount").val(get_detailtotalamount() + get_detailtotalamount_i() + get_detailtotalamount_a() - get_detailtotaldiscount());
      		calculateGST();
	    }
	    else {
	      alert("Something wrong with data.");
	    }
	  },
	  error: function(XMLHttpRequest, textStatus, errorThrown) { 
	    alert("ERROR   -   D!!!");          
	  } 
	});
	});

	//Click Detail Cancel Button
	 $("#product-cancel").click(function(e){
	    e.preventDefault();
	    $("#hid-edit-id").val("");
	    $("#product-add").show();
	    $("#product-update").hide();
	    $("#product-cancel").hide();
	    //Resert Form
	    $("#detail-form").each(function(){
	        this.reset();
	    });
	    $("#product-id").select2("val", '');
	    $("#product_maid_id").select2("val", '');
        $("#product_insurance_id").select2("val", '');
	});

	// Submit Update sale Order
  	$("#btn-submit").click(function(e) {
		if($('#customer-id').val() == '') {
		  alert("Please Select Customer"); 
		}else if($('#branch_id').val() == '') {
     		 alert("Please Select Branch"); 
   		}
		else if ($('#quotation-date').val() == '') {
		  alert("Please Select Date");
		}else if ($('#branch_id').val() == '') {
		  alert("Please Select Branch");
		}
	    else {
	    	
		    $.ajax({
		        type: "POST",
		        url: burl + "invoice/edit_package/" + $("#hid-quo-id").val(), 
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
		        },
		        success: function(data) {  
		          	var result = $.parseJSON(data);
		          	if(result['status'] == 'success') {
		            	detailarr = {};  
		            	window.location.href = burl + 'invoice';
		          	}
		          	else {
		            	alert("Something wrong with data");
		          	}
		        },
		        error: function(XMLHttpRequest, textStatus, errorThrown) { 
		         	alert("ERROR   E   !!!");           
		        } 
		    });
	    }
  });

});