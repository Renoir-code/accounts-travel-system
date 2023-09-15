<?php include("inc/header.php"); ?>
<br>
<?php   ?>
<?php if($msg = $this->session->flashdata('message')):?>
            <div class="row ">
                <div class ="col-md-3">
                    <div class="alert alert-dismissable alert-success">
                        <?php echo $msg; ?>
                        <?php endif;?>
                    </div> 
                </div>
              </div>
              <?php if($msg = $this->session->flashdata('deactivate_success')):?>
            <div class="row ">
                <div class ="col-md-3">
                    <div class="alert alert-dismissable alert-success">
                        <?php echo $msg; ?>
                        <?php endif;?>
                    </div> 
                </div>
              </div>
              <?php if($msg = $this->session->flashdata('success_message')):?>
            <div class="row ">
                <div class ="col-md-3">
                    <div class="alert alert-dismissable alert-success">
                        <?php echo $msg; ?>
                        <?php endif;?>
                    </div> 
                </div>
              </div>
	
	<div class = "container"><button id = "print_report" class= "btn btn-primary text-right" style = "margin-top:10px;">Print</button></div>
    <div class ="container" id = "report_to_print">
      
     
    <?php if(count($data)):?>

    
     
      <h4> General Report for  <?php  
      $date = date_create("$month[0]");
      $date2 = date_create("$month[1]");
      echo date_format($date,"M/d/Y") . ' - '. date_format($date2,"M/d/Y")
      
      
      ?> </h4>
      <?php // if(isset($_SESSION['role_id']) && ($_SESSION['role_id'] !=4) ){ ?>
      <?php // echo anchor ("user/adminRegister" , "ADD USER", ['class'=> 'btn btn-primary']); ?>
      <?php //echo anchor ("staff/staff_create" , "ADD OFFICER", ['class'=> 'btn btn-light']); ?>
      <?php //echo anchor ("user/payment", "STAFF PAYMENT DETAILS", ['class'=> 'btn btn-light']); ?>

      <hr>
      <div class="row">
        <table class="table table-striped table-hover ">
          <thead>
              <tr>
                <th scope="col">Officer Name </th>
                <th scope="col">Mileage Amount</th>
                <th scope="col">Passenger Amount</th>
                <th scope="col">Toll Amount </th>
                <th scope="col">Subsistence Amount</th>
                <th scope="col">Actual Expense  </th>
                <th scope="col">Supper Expense </th>
                <th scope="col">Refreshments </th>
                <th scope="col">Taxi Out Town </th>
                <th scope="col">Taxi In Town </th>
				<th scope="col">Total </th>
              </tr>
          </thead>
      <tbody>
       
        <?php foreach($data as $row):?>
        <tr class = 'table-active'>
         <?php //testarray($row)?>
          <td><?php echo $row['firstname']. ' '.$row['lastname'] ; ?> </td>
          <td><?php echo '$'. number_format ($row['mileage'] * $row['mileage_rate']) .'<br><sub>('.$row['mileage'].'*'.$row['mileage_rate'] .')</sub></td>'; ?>  
          <td><?php echo '$'. number_format ($row['passenger_km'] * $row['passenger_rate']) .'<br><sub>('.$row['passenger_km'].'*'.$row['passenger_rate'] .')</sub></td>'; ?>  
          <td><?php echo '$'.number_format  ($row['toll_amt']) ?> </td>
          <td><?php echo '$'. number_format ($row['subsistence'] * $row['subsistence_rate']) .'<br><sub>('.$row['subsistence'].'*'.$row['subsistence_rate'] .')</sub></td>'; ?>  
          <td><?php echo '$'.number_format  ($row['actual_expense']) ?> </td>
          <td><?php echo '$'. number_format ($row['supper'] * $row['supper_rate']) .'<br><sub>('.$row['supper'].'*'.$row['supper_rate'] .')</sub></td>'; ?>
          <td><?php echo '$'. number_format ($row['refreshment'] * $row['refreshment_rate']) .'<br><sub>('.$row['refreshment'].'*'.$row['refreshment_rate'] .')</sub></td>'; ?> 
          <td><?php echo '$'. number_format ($row['taxi_out_town'] * $row['taxi_out_rate']) .'<br><sub>('.$row['taxi_out_town'].'*'.$row['taxi_out_rate'] .')</sub></td>'; ?> 
          <td><?php echo '$'. number_format ($row['taxi_in_town'] * $row['taxi_in_rate']) .'<br><sub>('.$row['taxi_in_town'].'*'.$row['taxi_in_rate'] .')</sub></td>'; ?>             
			<td><?php echo '$'. number_format ( $row['mileage']*$row['mileage_rate'] + $row['passenger_km']*$row['passenger_rate'] + $row['toll_amt'] +  $row['subsistence'] +   $row['actual_expense'] + $row['supper'] 
          + $row['refreshment'] + $row['taxi_out_town'] + $row['taxi_in_town']); ?> </td>
          
       
          
          <td class="text-right"><?php //echo anchor ("admin/editUsers/{$user->user_id}" , "Edit User", ['class'=> 'btn btn-success text-right']); ?>
        </td>
        </tr>
        </tr>
        
        <?php endforeach;?>
        <?php else: ?>
          <tr>
            <td> No Records</td>
          </tr>
        <?php endif;?>
        
        </tbody>
        
      </table>
    </div>
</div>
<?php include("inc/footer.php"); ?>