<?php include("inc/header.php"); ?>




<button id = "print_report" class= "btn btn-primary text-right" style = "margin-top:10px;">Print</button>
<div class="container" id = "report_to_print">


  <h4>Report for the month of : <?php echo date("F",strtotime($month[0]));?></h4>
      <div class="row" >
        <table class="table table-striped table-hover " >
          <thead>
              <tr>
                <th scope="col ">Name of Employee</th>
                <th scope="col ">Report Type</th> 
                <th scope="col">Value</th>          
              </tr>
          </thead>
      <tbody>
       
        
        <tr class = 'table-active'>
           <?php if(!empty($data)): ?>
            <?php foreach($data as $row): ?>
          <td> <?php echo $row['firstname'] .' '.$row['lastname'] ; ?></td> 
          <td><?php  echo  '$'. number_format ($row['monthly_allotment'],2); ?></td>
          <td><?php  echo  '$'. number_format ($row['arrears'],2); ?></td>
            </tr>
         
         

        <?php endforeach; ?>
       <?php else: ?>
         <?php endif; ?>
        
        
        </tbody>
        
      </table>
    </div>
    
</div>
</div>




<?php include("inc/footer.php"); ?>