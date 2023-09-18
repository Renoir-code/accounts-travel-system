<?php include("inc/header.php"); ?>
<br>

<?php // $staff_session = $_SESSION[$trn_records['staff_id']]?>
<?php  //testarray($bail_records);?>

<?php if($msg = $this->session->flashdata('success_update')):?>
        <div class="row">
            <div class ="col-md-6">
                <div class="alert alert-dismissable alert-success close">
                     <?php echo $msg; ?>
                    
                    </div>

            </div>
        </div>
    <?php endif; ?>
    <?php if($msg = $this->session->flashdata('message')):?>
        <div class="row">
            <div class ="col-md-6">
                <div class="alert alert-dismissable alert-success close">
                     <?php echo $this->session->flashdata('message'); ?>
                    
                    </div>

            </div>
        </div>
    <?php endif; ?>

    <?php if($msg = $this->session->flashdata('fail_message')):?>
        <div class="row">
            <div class ="col-md-6">
                <div class="alert alert-dismissable alert-danger close">
                     <?php echo $msg; ?>
                    
                    </div>

            </div>
        </div>
    <?php endif; ?>

<br>



      <h4> Bail Dashboard </h4>
      <?php echo anchor ("bail/bail_create" , "Add Bail Claim", ['class'=> 'btn btn-primary']); ?>
	  
	  <?php echo anchor ("bail/bail_report" , " Bail Reports", ['class'=> 'btn btn-danger']); ?>
      <hr>
      <div class="row">
        <table class="table table-striped table-hover " id = "view_all_records">
          <thead>
              <tr>
               <!-- <th scope="col" >Staff ID</th> -->
                <th scope="col">Name of Claimant</th>
              <!--   <th scope="col">Last Name </th> -->
                <th scope="col">Date Received</th>
                <th scope="col">Date Processed</th>
                <th scope="col"> Amount Paid</th>
                <th scope="col"> TRN</th>
             <!--    <th scope="col"> Vehicle Model</th>
                <th scope="col"> Vehicle Make</th>
                <th scope="col"> Vehicle Chasis Number</th>
                <th scope="col"> Vehicle Engine Number</th> -->
                <th scope="col"> Location </th>
                <th scope="col"> Reason Returned </th>
                <th scope="col"> Action </th>
				<th scope="col">  </th>
              </tr>
          </thead>
      <tbody>
       
      <?php// number_format($row['actual_expense'],2) ?>
        <tr class = 'table-active'>
          <?php  //echo date("Y-m-d", strtotime($data['date_received'])); ?>
           <?php  if(!empty($bail_records)): ?>
            <?php  foreach($bail_records as $row): ?>
          <td><?php  echo $row['first_name'] . ' ' . $row['last_name'];  ?></td>
          <td><?php echo date("Y-m-d", strtotime($row['date_received']));?></td>
          
          <td> 
          <?php if (($row['date_processed'] === '0000-00-00 00:00:00')){echo 'No Process Date';} else{?>
          <?php  echo date("Y-m-d", strtotime($row['date_processed']));}?> </td> 
          
          <td><?php  echo '$'.number_format($row['amount_paid'],2) ?></td> 
          <td><?php  echo $row['trn']; ?></td> 
          <td><?php  echo $row['location_name']; ?></td> 
          <td><?php  echo $row['reason_returned']; ?></td> 
          <td>      
				<?php  // Only insertor can access this button/page
				// if(isset($_SESSION['user_id']) &&  ($_SESSION['role_id'] == 6)){
                echo ''.anchor ("bail/update_bail_information/{$row['bail_id']}" , "Update Bail Record", ['class'=> 'btn btn-success text-right'])  ;
			//	} 
				?>  
		  </td>
         <td>  <?php  //echo anchor ("staff/view_payment_records/{$trn_records['staff_id']}" , "View Payment Records", ['class'=> 'btn btn-primary text-right']);
			//echo anchor ("staff/view_all_payment_records/100{$row['staff_id']}" , "View Payment Records", ['class'=> 'btn btn-primary text-right']);
		 ?>  
		 </td>
        </tr>
        
                <?php endforeach; ?>
       <?php else: ?>
       
          <tr>
            <td> No Records</td>
          </tr>
          
       <?php endif; ?>
        
        </tbody>
        
      </table>
    </div>
</div>
<?php include("inc/footer.php"); ?>