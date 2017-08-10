function confirm_logout(){
    return confirm("Are you sure want to logout?");
}
function confirm_delete(){
    return confirm("Are you sure want to delete this record?");
}
function confirm_submit(){
    return confirm("Are you sure want to submit?");
}
function confirm_produce_invoice(){
    return confirm("Are you sure want to produce invoice?");
}
function confirm_produce_do(){
    return confirm("Are you sure want to produce delivery order?");
}
function confirm_produce_cn(){
    return confirm("Are you sure want to produce credit note?");
}
function confirm_produce_dn(){
    return confirm("Are you sure want to produce debit note?");
}
function confirm_payment(){
    return confirm("Are you sure want to add this payment?");
}
function myRound(value, places) {
    var multiplier = Math.pow(10, places);
    return (Math.round(value * multiplier) / multiplier);
}
$(function(){
    $('.carousel').carousel();
	$(".pagination li a").click(function(e){
	    e.preventDefault();
	    var currentUrl = window.location.href;
	    var arr = currentUrl.split("?");
	    if(typeof(arr[1]) != "undefined" && arr[1] !== null) {
	      var newUrl = $(this).attr("href") +'?'+arr[1];
	    }
	    else {
	      var newUrl = $(this).attr("href"); 
	    }
	    window.location.href = newUrl;
    });
    $('.required-icon').tooltip({
        placement: 'left',
        title: 'Required field'
    });

    $('#quotation-date').datepicker({
        format: "dd-mm-yyyy",
        autoclose:true,
    });
    $('#invoice_date').datepicker({
        format: "dd-mm-yyyy",
        autoclose:true,
    });
    $('#due_date').datepicker({
        format: "dd-mm-yyyy",
        autoclose:true,
    });
    $('#payment_date').datepicker({
        format: "dd-mm-yyyy",
        autoclose:true,
    });
    $('#po-date').datepicker({
        format: "dd-mm-yyyy",
        autoclose:true,
    });
    $('#cn_date').datepicker({
        format: "dd-mm-yyyy",
        autoclose:true,
    });
    $('#dn_date').datepicker({
        format: "dd-mm-yyyy",
        autoclose:true,
    });
    $('#do_date').datepicker({
        format: "dd-mm-yyyy",
        autoclose:true,
    });
    $('#start_date').datepicker({
        format: "dd-mm-yyyy",
        autoclose:true,
    });
    $('#end_date').datepicker({
        format: "dd-mm-yyyy",
        autoclose:true,
    });
	// $('#dob').datepicker({
 //        format:'dd-mm-yyyy',
 //    });
     $('#date-from').datepicker({
         format:'dd-mm-yyyy',
     });
     $('#date-to').datepicker({
         format:'dd-mm-yyyy',
     });

});