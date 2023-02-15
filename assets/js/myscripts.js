
 $(document).ready(function(){
 const home = window.location.protocol + '//' +window.location.hostname + '/';
//alert(home+"testproject/staff/certifier_record/1/2");
 
 
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
			url  : home+"testproject/staff/certifier_record/1/2",
			dataType : "JSON",
			data : {reject_certify_single_payment:1,certify_record_to_reject:record_to_reject,certifier_remarks:certifier_remarks},
			success: function(data){
				//$('#'+data.rejected_record).remove();
				
				$('#'+data.rejected_record).fadeOut(300, function(){ $(this).remove();});
			}
		});
		return false;

 });


  jQuery('#print_report').click(function () {
      var mywindow = window.open('', 'PRINT', 'height=720,width=920');

    mywindow.document.write('<html><head><title>xzcx' + document.title  + '</title>');
      mywindow.document.write('<meta charset="UTF-8">');
    mywindow.document.write('<meta http-equiv="X-UA-Compatible" content="IE=edge">');
    mywindow.document.write('<meta name="viewport" content="width=device-width, initial-scale=1.0">');
    mywindow.document.write('<link rel="stylesheet" href="http://localhost/testproject/assets/css/bootstrap.min.css">');
    
	/* var link = document.createElement('link');
    link.rel = "stylesheet";
    link.media = "print";
    link.type = "text/css";
    link.href = "http://localhost/testproject/assets/css/style.css"; */
    
	
	
	
	//mywindow.document.write('<script src="http://localhost/testproject/assets/js/bootstrap.js"><\/script>');
    //mywindow.document.write('<script src="http://localhost/testproject/assets/js/jquery-3.6.1.min"><\/script>');
//mywindow.document.write('<<link href="http://localhost/testproject/assets/css/style.css" rel="stylesheet">');
  
    //mywindow.document.write('<style>body{background-color:white !important;}@page { size: 84.1cm 59.4cm;margin: 1cm 1cm 1cm 1cm; }</style>');
    
    mywindow.document.write('</head><body style = "margin:20px;">');
    mywindow.document.write(document.getElementById("report_to_print").innerHTML);
    mywindow.document.write('</body></html>');
	
	

    mywindow.document.close(); // necessary for IE >= 10
    mywindow.focus(); // necessary for IE >= 10

    mywindow.print();
   // mywindow.close();

    return true; 
 });





/* document.getElementById("print_report").onclick = function PrintElem(report_to_print)
{
     var mywindow = window.open('', 'PRINT', 'height=720,width=920');

    mywindow.document.write('<html><head><title>' + document.title  + '</title>');
      mywindow.document.write('<meta charset="UTF-8">');
    mywindow.document.write('<meta http-equiv="X-UA-Compatible" content="IE=edge">');
    mywindow.document.write('<meta name="viewport" content="width=device-width, initial-scale=1.0">');
    mywindow.document.write('<link rel="stylesheet" href="http://localhost/testproject/assets/css/bootstrap.min.css">');
    
	var link = document.createElement('link');
    link.rel = "stylesheet";
    link.media = "print";
    link.type = "text/css";
    link.href = "http://localhost/testproject/assets/css/style.css";
    
	
	
	
	//mywindow.document.write('<script src="http://localhost/testproject/assets/js/bootstrap.js"><\/script>');
    //mywindow.document.write('<script src="http://localhost/testproject/assets/js/jquery-3.6.1.min"><\/script>');
//mywindow.document.write('<<link href="http://localhost/testproject/assets/css/style.css" rel="stylesheet">');
  
    //mywindow.document.write('<style>body{background-color:white !important;}@page { size: 84.1cm 59.4cm;margin: 1cm 1cm 1cm 1cm; }</style>');
    
    mywindow.document.write('</head><body style = "margin:20px;">');
    mywindow.document.write(document.getElementById("report_to_print").innerHTML);
    mywindow.document.write('</body></html>');
	document.querySelector("head").appendChild(link);
	
	

    //mywindow.document.close(); // necessary for IE >= 10
    mywindow.focus(); // necessary for IE >= 10

    mywindow.print();
    mywindow.close();

    return true; 
}

 */

 jQuery('#staff_member_report').multiselect({
    columns: 1,
    placeholder: 'Choose Staff',
    search: true
}); 

/*$('.demo').dropdown({
  // search field
 input: '<input type="text" maxLength="20" placeholder="Search">',


	});*/





 
 
 
 });
 
