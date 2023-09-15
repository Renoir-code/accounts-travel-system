<?php include("inc/header.php"); ?>

<?php // added 8/14/2023 Renoir Elliott
//testarray($month[0]);
$time = strtotime($month[0]);
$clientYear = date("Y-F",$time);
$clientMonth = date("M",$time);

//if($clientMonth == $time)

//testarray($data);

?>


<button id = "print_report" class= "btn btn-primary text-right" style = "margin-top:10px;">Print</button>
<div class="container" id = "report_to_print">


  <hr>
	<!--<h5>Court Administration Division</h5>-->
	<h5>Accounts Travel Management System</h5>
	<h6>Upkeep Report for the month of : <?php echo date("F",strtotime($month[0]));?> <?php echo date("Y");  ?></h6>
	
	<hr>
      <div class="row" >
        <table class="table table-striped table-hover " >
          <thead>
              <tr>
                <th scope="col "> First Name </th>
                <th scope="col "> Last Name </th> 
                <th scope="col"> Court/Location </th>
                <th scope="col"> Upkeep Value </th>
              </tr>
          </thead>
      <tbody>
       <?php $total = 0;?>
           <?php if(!empty($data)): ?>
            <?php foreach($data as $row): ?>
              <?php 
                //$date_set = strtotime($row['date_set']); //converting the date to the
                //$date_set = date("Y-F",$date_set); 
                ?>
              <?php 
               $key = array_search($row['staff_id'], array_column($dataCustomUpkeep, 'staff_id'));

              if($key !== FALSE){ //comparision is made between the datatypes  by using !==
               $row['upkeep_value'] = $dataCustomUpkeep[$key]['custom_upkeep_value'];
               
              }
              ?>

              <tr class = 'table-active'>
          <td> <?php echo $row['firstname']; ?></td> 
          <td> <?php echo $row['lastname']; ?></td> 
          <td> <?php echo $row['location_name']; ?></td> 
          <td> <?php echo '$'.number_format($row['upkeep_value']);  if($key !== FALSE)echo '...Custom Upkeep Value'; ?></td>      
        
         </tr>
         <?php $total += $row['upkeep_value']; ?>
        <?php  endforeach; ?>
       <?php else: ?>
         <?php endif; ?>

         <tr class = 'table-active'>          
          <td> </td> 
          <td> </td> 
          <td> </td> 
          <td> Total :  <?php echo '<b>$'.number_format($total).'</b>'; ?></td> 
        </tr>
        
        
        </tbody>
        
      </table>

      <br>
		  
		  
		  Prepared by   _________________________________
		  
		  
		  Authorized by _________________________________  
		  
		  
		  Certified by __________________________________
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