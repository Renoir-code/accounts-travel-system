
 $(document).ready(function(){
 
  jQuery('#checkAll').click(function () {
	jQuery('input:checkbox').not(this).prop('checked', this.checked);
 
 });
 
  jQuery('#checkAllLower').click(function () {
	jQuery('input:checkbox.checkAll').not(this).prop('checked', this.checked);
 });

jQuery('.reject_payments').click(function (event) {
		         event.preventDefault();
		
		let record_to_reject = $(this).attr("value");
		let certifier_remarks = $(this).next().val();
		
		$.ajax({
			type : "POST",
			url  : "http://localhost/testproject/staff/certifier_record/1/2",
			dataType : "JSON",
			data : {reject_certify_single_payment:1,certify_record_to_reject:record_to_reject,certifier_remarks:certifier_remarks},
			success: function(data){
				//$('#'+data.rejected_record).remove();
				
				$('#'+data.rejected_record).fadeOut(300, function(){ $(this).remove();});
			}
		});
		return false;

 });









 
 
 
 });
 
