<?php include("inc/header.php"); ?>

<?php //testarray($numberofClaims);?>


<button id = "print_report" class= "btn btn-primary text-right" style = "margin-top:10px;">Print</button>
<div class="container" id = "report_to_print">


  <hr>

	<h5>Count of Claims Report </h5>
    <br>
	<h6> Report for the period of : 
  <?php 
  $date = date_create("$month[0]"); //extracting month only from the date
  $date2 = date_create("$month[1]");
  echo date_format($date,"F/d/Y") . ' - '. date_format($date2,"F/d/Y");
  ?> 
  </h6>
	
	<hr>
      <div class="row" >
        <table class="table table-striped table-hover " >
          <thead>
              <tr>
                  <th scope="col "> User that Entered Claim </th>
                  <th scope="col "> Location/Court </th> 
                  <th scope="col"> Number of Claims Received in this Period </th>
              </tr>
          </thead>
          <tbody>
              <?php if(!empty($numberofClaims)): ?>
                <?php  foreach($numberofClaims as $row): ?>
                  <tr class = 'table-active'>
                      <td> <?php echo 'John Brown'; ?></td> 
                      <td> <?php echo $row['location_name']; ?></td> 
                      <td> <?php echo $row['count(date_received)']; ?></td>     
                </tr>
                <?php  endforeach;?>
                    <?php  else:?>
                        <?php  endif;?>
                  <tr class = 'table-active'>          
                    <td> </td> 
                    <td> </td> 
                    <td> </td> 
                    <td> </td> 
                </tr>       
          </tbody>    
      </table>
      <br>	  
    </div>
    
</div>
</div>


<!--<script  type="text/javascript">

document.getElementById("print_report").onclick = function PrintElem(report_to_print)
{
     var mywindow = window.open('', 'PRINT', 'height=720,width=920');

    mywindow.document.write('<html><head><title>' + document.title  + '</title>');
      mywindow.document.write('<meta charset="UTF-8">');
    mywindow.document.write('<meta http-equiv="X-UA-Compatible" content="IE=edge">');
    mywindow.document.write('<meta name="viewport" content="width=device-width, initial-scale=1.0">');
    mywindow.document.write('<link rel="stylesheet" href="https://cad.gov.jm/atms/assets/css/bootstrap.min.css">');
    
	var link = document.createElement('link');
    link.rel = "stylesheet";
    link.media = "print";
    link.type = "text/css";
    //link.href = "https://cad.gov.jm/atms/assets/css/style.css";
    
	
	
	
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

</script> -->



<?php include("inc/footer.php"); ?>