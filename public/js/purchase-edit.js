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
		    url  :  burl + "purchase_order/aj_add_product_details",
		    data :  { 
		      	purchase_order_id : $("#hid-po-id").val(),
		      	product_id        : $("#product-id").val(),
		      	unit_price        : $("#unit-price").val(),
		      	quantity          : $("#quantity").val(),
		      	total             : $("#total").val(),
		      	p_remark          : $("#p-remark").val(),
		    },
		    success: function(data){  
		      var result = $.parseJSON(data);
		      if(result['status'] == 'success') {
		        //Add new data to Table
		        var row =  ($('.product-grid .row').length%2)==1 ? 'row even': 'row odd';
		        var classname = row + ' id-'+ result['pp_id'];   
		       	$('.product-add-area').before("<div class='"+ classname +"'>"+
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

      			//start second
				var total = $("#total-amount").val();
				var total_incl_gst = $("#total-inc-gst").val();
				var po_id = $("#hid-po-id").val();
	      		$.ajax({
				  type :  "POST",
				  url  :  burl + "purchase_order/aj_update_po_total/"+po_id,
				  data :  { total_amount : total, total_inc_gst : total_incl_gst},
				  success: function(data){  
				    var result = $.parseJSON(data);
				    if(result['status'] == 'success') {
				      	
				    }
				    else {
				      alert("Something wrong with data.");
				    }
				  },
				  error: function(XMLHttpRequest, textStatus, errorThrown) { 
				    alert("ERROR!!!");          
				  } 
				});
	      		//end



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
		      alert("ERROR!!!");     
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
		  url  :  burl + "purchase_order/aj_get_product_details/"+row[1],
		  data: { },
		  success: function(data){ 
		  	// alert(data);
		    var result = $.parseJSON(data);
		    if(result['status'] == 'success') {
		       	$("#product-id").val(result['product_id']);
		       	$("#product-id").select2("val", result['product_id']);
			    $("#unit-price").val(result['unit_price']);
			    $("#quantity").val(result['quantity']);
			    $("#total").val(result['total_amount']);
			    $("#p-remark").val(result['remark']);
			    $("#hid-edit-id").val(row[1]);
			    $("#product-add").hide();
			    $("#product-update").show();
			    $("#product-cancel").show();
		    }
		  },
		  error: function(XMLHttpRequest, textStatus, errorThrown) { 
		    alert("ERROR!!!");           
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
		    url  :  burl + "purchase_order/aj_edit_product_details/"+editkey,
		    data :  { 
		    	purchase_order_id : $("#hid-po-id").val(),
		      	product_id     	  : $("#product-id").val(),
		      	unit_price        : $("#unit-price").val(),
		      	quantity          : $("#quantity").val(),
		      	total             : $("#total").val(), 
		      	p_remark          : $("#p-remark").val(),
		    },
		    success: function(data) {  
		      var result = $.parseJSON(data);
		      if(result['status'] == 'success') {
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
		      else {
		        alert("Something wrong with data.");
		      }
		    },
		    error: function(XMLHttpRequest, textStatus, errorThrown) { 
		      alert("ERROR!!!");      
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
	  url  :  burl + "purchase_order/aj_remove_po_product/"+row[1],
	  data :  { },
	  success: function(data){  
	    var result = $.parseJSON(data);
	    if(result['status'] == 'success') {
	      	$(".id-"+row[1]).remove();
	      	//Calculate Total
	       	$("#total-amount").val(get_detailtotalamount());
      		calculateGST();
//start second
			var total = $("#total-amount").val();
			var total_incl_gst = $("#total-inc-gst").val();
			var po_id = $("#hid-po-id").val();
      		$.ajax({
			  type :  "POST",
			  url  :  burl + "purchase_order/aj_update_po_total/"+po_id,
			  data :  { total_amount : total, total_inc_gst : total_incl_gst},
			  success: function(data){  
			    var result = $.parseJSON(data);
			    if(result['status'] == 'success') {
			      	
			    }
			    else {
			      alert("Something wrong with data.");
			    }
			  },
			  error: function(XMLHttpRequest, textStatus, errorThrown) { 
			    alert("ERROR!!!");          
			  } 
			});
      	//end

	    }
	    else {
	      alert("Something wrong with data.");
	    }
	  },
	  error: function(XMLHttpRequest, textStatus, errorThrown) { 
	    alert("ERROR!!!");          
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
	});

	// Submit Update sale Order
  	$("#btn-submit").click(function(e) {
		if($('#customer-id').val() == '') {
		  alert("Please Select Customer"); 
		}
		else if ($('#purchase_order-date').val() == '') {
		  alert("Please Select Date");
		}
	    else {

		    $.ajax({
		        type: "POST",
		        url: burl + "purchase_order/edit/" + $("#hid-po-id").val(), 
		        data: { 
			          supplier_id     : $('#supplier-id').val(),
			          po_date  : $('#po-date').val(),
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
		          	alert(result['status']);
		          	if(result['status'] == 'success') {
		            	detailarr = {};  
		            	window.location.href = burl + 'purchase_order';
		          	}
		          	else {
		            	alert("Something wrong with data");
		          	}
		        },
		        error: function(XMLHttpRequest, textStatus, errorThrown) { 
		         	alert("ERROR!!!");  
		         	alert(errorThrown);        
		        } 
		    });
	    }
  });

});