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
		    url  :  burl + "invoice/aj_add_contract_details",
		    data :  { 
		      	quotation_id      : $("#hid-quo-id").val(),
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
		        var classname = row + ' id-'+ result['qp_id'];   
		       	$('.product-add-area').before("<div class='"+ classname +"'>"+
                        "<div class='col-md-3'>"+ $("#product-id option:selected").text() +"</div>"+
                        "<div class='col-md-2 col-total'>"+ $("#unit-price").val() +"</div>"+
                       // "<div class='col-md-1'>"+ $("#quantity").val() +"</div>"+
                       // "<div class='col-md-2 '>"+ $("#total").val() +"</div>"+
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
		  url  :  burl + "invoice/aj_get_contract_details/"+row[1],
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
		    url  :  burl + "invoice/aj_edit_contract_details/"+editkey,
		    data :  { 
		    	quotation_id  	  : $("#hid-quo-id").val(),
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
                        "<div class='col-md-2 col-total'>"+ $("#unit-price").val() +"</div>"+
                       // "<div class='col-md-1'>"+ $("#quantity").val() +"</div>"+
                       // "<div class='col-md-2 '>"+ $("#total").val() +"</div>"+
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
	  url  :  burl + "invoice/aj_remove_contract_product/"+row[1],
	  data :  { },
	  success: function(data){  
	    var result = $.parseJSON(data);
	    if(result['status'] == 'success') {
	      	$(".id-"+row[1]).remove();
	      	//Calculate Total
	       	$("#total-amount").val(get_detailtotalamount());
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
	});

	// Submit Update sale Order
  	$("#btn-submit").click(function(e) {
		if($('#customer-id').val() == '') {
		  alert("Please Select Customer"); 
		}
		else if ($('#quotation-date').val() == '') {
		  alert("Please Select Date");
		}
	    else {
		    $.ajax({
		        type: "POST",
		        url: burl + "invoice/edit_contract/" + $("#hid-quo-id").val(), 
		        data: { 
			          customer_id     : $('#customer-id').val(),
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