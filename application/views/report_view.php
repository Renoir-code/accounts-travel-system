<?php include("inc/header.php"); ?>




<button id = "print_report" class= "btn btn-primary text-right" style = "margin-top:10px;">Print</button>
<div class="container" id = "report_to_print">


  <h4>Report for the month of : <?php echo date("F",strtotime($month[0]));?></h4>
      <div class="row" >
        <table class="table table-striped table-hover " >
          <thead>
              <tr>
                <th scope="col ">Name</th>
                <th scope="col ">Monthly Aallotment</th> 
                <th scope="col">Arrears</th>
                <th scope="col">Travel Recovery </th>
                <th scope="col">Upkeep Change Type </th>
                <th scope="col">Post Change </th>
                <th scope="col">Date of Change </th>
				<th scope="col">Location </th>
                <th scope="col">Changes Remarks </th>            
              </tr>
          </thead>
      <tbody>
       
        
        <tr class = 'table-active'>
           <?php if(!empty($data)): ?>
            <?php foreach($data as $row): ?>
          <td> <?php echo $row['firstname'] .' '.$row['lastname'] ; ?></td> 
          <td><?php  echo  '$'. number_format ($row['monthly_allotment'],2); ?></td>
          <td><?php  echo  '$'. number_format ($row['arrears'],2); ?></td>
          <td><?php  echo  '$'. number_format ($row['travel_recovery'],2); ?></td>
          <td><?php  echo $row['upkeep_name']; ?></td>
          <td><?php  echo $row['post_change']; ?></td>
          <td><?php  echo date(' F j\, Y', strtotime($row['dateof_change'])); ?></td>
           <td><?php  echo $row['location_name']; ?></td>
		  <td><?php  echo $row['changes_remarks']; ?></td>
            </tr>
         
         

        <?php endforeach; ?>
       <?php else: ?>
         <?php endif; ?>
        
        
        </tbody>
        
      </table>
    </div>
    
</div>
</div>


<!-- <script  type="text/javascript">

document.getElementById("print_report").onclick = function PrintElem(report_to_print)
{
     var mywindow = window.open('', 'PRINT', 'height=720,width=920');

    mywindow.document.write('<html><head><title>' + document.title  + '</title>');
      mywindow.document.write('<meta charset="UTF-8">');
    mywindow.document.write('<meta http-equiv="X-UA-Compatible" content="IE=edge">');
    mywindow.document.write('<meta name="viewport" content="width=device-width, initial-scale=1.0">');
    mywindow.document.write('<link rel="stylesheet" href="http://localhost/testproject/assets/css/bootstrap.min.css">');
    //mywindow.document.write('<script src="http://localhost/testproject/assets/js/bootstrap.js"><\/script>');
   // mywindow.document.write('<script src="http://localhost/testproject/assets/js/jquery-3.6.1.min"><\/script>');
//mywindow.document.write('<<link href="http://localhost/testproject/assets/css/style.css" rel="stylesheet">');
  
    //mywindow.document.write('<style>body{background-color:white !important;}@page { size: 84.1cm 59.4cm;margin: 1cm 1cm 1cm 1cm; }</style>');
    
    mywindow.document.write('</head><body style = "margin:20px;">');
    mywindow.document.write(document.getElementById("report_to_print").innerHTML);
    mywindow.document.write('</body></html>');
	
	
	

    mywindow.document.close(); // necessary for IE >= 10
    mywindow.focus(); // necessary for IE >= 10

    mywindow.print();
    mywindow.close();

    return true; 
}

</script> -->



<?php include("inc/footer.php"); ?>