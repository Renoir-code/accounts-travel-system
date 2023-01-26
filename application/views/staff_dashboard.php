

<?php include("inc/header.php"); ?>
<br>
<?php // $staff_session = $_SESSION[$trn_records['staff_id']]?>

<?php if($msg = $this->session->flashdata('success_message')):?>
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

<?php 
unset($_SESSION['message']);
unset($_SESSION['fail_message']);
unset($_SESSION['success_message']);
//testarray( $trn_records);
?>
<br>

<!--<h4> Please Enter the TRN Number for the Staff Member : </h4>
<?php //echo form_open('staff/staff_information') ?>
<input type="text" class="form-control-sm" name ="trn"> 
<input type="submit" value="submit" class="btn btn-primary btn-lg"> 
<br><br>-->

<?php //echo form_close(); ?>

      <h4> Staff Information Dashboard </h4>
      <?php echo anchor ("staff/staff_create" , "Add Travelling/CasualOfficer", ['class'=> 'btn btn-primary']); ?>
      <?php echo anchor ("staff/insert_rate_submit" , "Add a Rate ", ['class'=> 'btn btn-success']); ?>
      <?php 
      $hash_staff_email = md5($_SESSION['email']);
      
      ?>
      <?php echo anchor ("staff/view_all_payment_records/{$_SESSION['role_id']}/1" , "View all payment records ", ['class'=> 'btn btn-success']); ?>
      <?php //echo ($_SESSION['role_id'] == 2 ) ? anchor ("staff/view_all_payment_records/2" , "View records to be certified ", ['class'=> 'btn btn-success']): ''; ?>
      <?php echo ($_SESSION['role_id'] == 3 ) ? anchor ("staff/view_all_payment_records/3" , "View All Records", ['class'=> 'btn btn-success']): ''; ?>

	  
	  <?php echo anchor ("report/chooseReport" , "Reports", ['class'=> 'btn btn-grey']); ?>
      <hr>
      <div class="row">
        <table class="table table-striped table-hover " id = "view_all_records">
          <thead>
              <tr>
               <!-- <th scope="col" >Staff ID</th> -->
                <th scope="col">First Name</th>
                <th scope="col">Last Name </th>
                <th scope="col">Post Title</th>
                <th scope="col">Tax Registration Number</th>
                <th scope="col"> Type of Upkeep</th>
                <th scope="col"> Type of Officer</th>
             <!--    <th scope="col"> Vehicle Model</th>
                <th scope="col"> Vehicle Make</th>
                <th scope="col"> Vehicle Chasis Number</th>
                <th scope="col"> Vehicle Engine Number</th> -->
                <th scope="col"> Location</th>
                <th scope="col"> Action </th>
				<th scope="col">  </th>
              </tr>
          </thead>
      <tbody>
       
        
        <tr class = 'table-active'>
          <?php ?>
           <?php if(!empty($trn_records)): ?>
            <?php foreach($trn_records as $row): ?>
          <td><?php  echo $row['firstname']; ?></td>
          <td><?php  echo $row['lastname']; ?></td>
          <td><?php  echo $row['post_title']; ?></td>
          <td><?php  echo $row['trn']; ?></td> 
          <td><?php  echo $row['upkeep_name']; ?></td> 
          <td><?php  echo $row['officer_name']; ?></td> 
          <td><?php  echo $row['location_name']; ?></td> 
          <td>      
				<?php  // Only insertor can access this button/page
				if(isset($_SESSION['user_id']) &&  ($_SESSION['role_id'] == 1)){
                echo ''.anchor ("staff/staff_payment_submit/{$row['staff_id']}/{$row['firstname']}/{$row['lastname']}" , "Add Payment", ['class'=> 'btn btn-success text-right'])  ;
				}
				?>  
		  </td>
         <td>  <?php  //echo anchor ("staff/view_payment_records/{$trn_records['staff_id']}" , "View Payment Records", ['class'=> 'btn btn-primary text-right']);
			echo anchor ("staff/view_all_payment_records/100{$row['staff_id']}" , "View Payment Records", ['class'=> 'btn btn-primary text-right']);
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