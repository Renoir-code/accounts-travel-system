
 $(document).ready(function(){
 
  jQuery('#checkAll').click(function () {
	jQuery('input:checkbox').not(this).prop('checked', this.checked);
 
 });


 
 
 
 });
 
