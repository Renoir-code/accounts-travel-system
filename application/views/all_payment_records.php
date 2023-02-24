<?php include("inc/header.php"); ?>

<?php //testarray($data);?>

<?php if($msg = $this->session->flashdata('success_message')):?>
            <div class="row ">
                <div class ="col-md-3">
                    <div class="alert alert-dismissable alert-success">
                        <?php echo $msg; ?>
                        <?php endif;?>
                    </div> 
                </div>

<?php unset($_SESSION['success_message']); ?>

<div class="container">


    <br> <br>

    
 <?php 
 if(strlen($this->uri->segment(3))>3)
	
 
   if(count($payment_records)>0 && (strlen($this->uri->segment(3)>3))){
	  //testarray($payment_records);
 $name_of_staff = $payment_records[0]['firstname'].' '.$payment_records[0]['lastname'];    
 echo '<h4>  These are the payment Records for : <span style="color: red; font-size: 30px;"> '.$name_of_staff.' </span>  </h4><br>';  
 echo anchor ("staff/modify_staff_records/{$payment_records[0]['staff_id']}" , "Update $name_of_staff 's Account Details ", ['class'=> 'btn btn-primary text-right']); 
 
 } 
 
 //if(count($payment_records)>0){

 if(count($payment_records) > 0) {
 if (!array_key_exists("staff_payment_id",$payment_records[0])){

 $payment_records = array();
 } 
 }
 ?>
       

      
    
      <?php $test1 =2;?>
    <?php $test2 =3;?>

<!--<h4> Please Enter the TRN Number for the Staff Member : </h4>
<?php //echo form_open('staff/staff_information') ?>
<input type="text" class="form-control-sm" name ="trn"> 
<input type="submit" value="submit" class="btn btn-primary btn-lg"> 
<br><br>

<?php echo form_close(); ?>

      <hr>-->
     <?php echo form_open("staff/certifier_record/{$test1}/{$test2}" ) ?>
      <div class="row">
        <table id = "view_all_records" class="table table-striped table-hover ">
          <thead>
              <tr>
                <th scope="col ">Staff Member</th> 
                <!--<th scope="col">Voucher Number </th>-->
                <th scope="col">Period</th>
                <th scope="col">Mileage </th>
                <th scope="col"> Subsistence Amount/Expense </th>
                <th scope="col"> Supper/Refreshment </th>
                <th scope="col"> Taxi</th>
				<th scope="col"> Status </th>
				<th>Comments</th>
				<th><input type="checkbox" id="checkAll" style = "visibility: hidden;" > <label for ="checkAll" class = "checkAll">Select All</label></th>
              <!--  <th scope="col">Certifier Remarks </th> -->
             
              </tr>
          </thead>
      <tbody>
       
        <?php if(!empty($payment_records)): ?>
            <?php foreach($payment_records as $row): ?>
        <tr class = 'table-active' id ="<?php echo $row['staff_payment_id'] ?>" >
           
          <td> <?php echo $row['firstname'] .' '.$row['lastname']  .'<hr>Voucher Number<br>'.$row['voucher_number'];?></td> 
         <!-- <td><?php  //echo $row['voucher_number']; ?></td>-->
          <td><?php  echo $row['year_travelled'] .'<br>'. $row['month_travelled']; ?></td>
          <!--<td><?php // echo $row['month_travelled']; ?></td>-->
          <td><?php  echo '<sub><b>Actual Mileage</b></sub><br>$'. number_format( $row['mileage_km'] * $row['mileage_rate'], 2) ; ?> <br> <sub>  <?php   echo '('. $row['mileage_km'] . '*'. $row['mileage_rate'] . ') </sub> '; ?>
          <?php  echo '<sub><b>Passenger</b></sub><br>$'. number_format ($row['passenger_km'] * $row['passenger_rate'],2) ; ?> <br> <sub>  <?php echo '('. $row['passenger_km'] . '*'. $row['passenger_rate'] . ') </sub> <br>' ; ?>
          <?php  echo '<sub><b>Toll</b></sub><br>$'. number_format ($row['toll_amt'],2); ?></td> 
          <td>	<?php  echo '<sub><b>Subsistence</b></sub><br>$'. number_format( $row['subsistence_km'] * $row['subsistence_rate'],2) ; ?> <br> <sub>  <?php echo '('. $row['subsistence_km'] . '*'. $row['subsistence_rate'] . ') </sub> <br>'; ?>
				<?php  echo '<sub><b>Actual Expense</b></sub><br>$'. number_format($row['actual_expense'],2); ?></td> 
          <td><?php  echo '<sub><b>Supper</b></sub><br>$'. number_format ($row['supper_days'] * $row['supper_rate'],2); ?> <br> <sub>  <?php echo '('. $row['supper_days'] . '*'. $row['supper_rate'] . ') </sub><br>' ;  ?> 
          <?php  echo '<sub><b>Refreshment</b></sub><br>$'. number_format( $row['refreshment_days'] * $row['refreshment_rate']); ?> <br> <sub>  <?php echo '('. $row['refreshment_days'] . '*'. $row['refreshment_rate'] . ') </sub> ';?></td> 
          <td><?php  echo '<sub><b>Out Town</b></sub><br>$'. number_format( $row['taxi_out_town'] * $row['taxi_out_rate']); ?> <br> <sub>  <?php echo '('. $row['taxi_out_town'] . '*'. $row['taxi_out_rate'] . ') </sub><br>' ;?> 
			<?php  echo '<sub><b>In Town</b></sub><br>$'. number_format( $row['taxi_in_town'] * $row['taxi_in_rate']); ?> <br> <sub>  <?php echo '('. $row['taxi_in_town'] . '*'. $row['taxi_in_rate'] . ') </sub> ' ;  ?> </td> 
       
          <td>  <?php   
          
         switch($row['view_by']){
			 
			 case 1:
			 echo "Record Inserted<br><hr>";
			 echo ($row['view_by']) == 1 || $_SESSION['role_id'] == 2 || $_SESSION['role_id'] == 3?  anchor ("staff/modify_payment_records/{$row['staff_payment_id']}/{$row['staff_id']}" , "Update Record", ['class'=> 'btn btn-primary btn-sm text-right']):'';
			 break;
			 
			 case 2:
			 echo "Pending Certification<br>";
			 if($_SESSION['role_id'] == 2){
			 echo '<button  name = "certify_record_to_reject" class = "btn btn-primary btn-sm text-right reject_payments" value = "'.$row['staff_payment_id'].'">Reject</button>
			 <textarea rows="4" cols="20" ></textarea><br><hr>
			 ';
			 echo ($row['view_by']) == 1 || $_SESSION['role_id'] == 2 || $_SESSION['role_id'] == 3?  anchor ("staff/modify_payment_records/{$row['staff_payment_id']}/{$row['staff_id']}" , "Update Record", ['class'=> 'btn btn-primary btn-sm text-right']):'';
			 }
			 break;
			 
			 case 3:
			 echo "Pending Authorization";
			 if($_SESSION['role_id'] == 3){
			 echo '<button  name = "certify_record_to_reject" class = "btn btn-primary btn-sm text-right reject_payments" value = "'.$row['staff_payment_id'].'">Reject</button>
			 <textarea rows="4" cols="20" ></textarea><br><hr>';
			 echo ($row['view_by']) == 1 || $_SESSION['role_id'] == 2 || $_SESSION['role_id'] == 3?  anchor ("staff/modify_payment_records/{$row['staff_payment_id']}/{$row['staff_id']}" , "Update Record", ['class'=> 'btn btn-primary btn-sm text-right']):'';
			 
			 }
			 break;
			 
			 case 4:
			 echo "Authorized";
			 break;
			 			 
			 default:
			 echo "Record Inserted";
			 break;
		 
		 
	 }
	 
              
          ?>   </td>
          
         
         <?php 
		  
		 ?>
         <td>
		 <?php
		 if($_SESSION['role_id'] == 1)
		 echo $row['certifier_remarks'];
	 
	  if($_SESSION['role_id'] == 2)
		 echo $row['approver_remarks'];
		 
		 //echo ($row['view_by']) == 1 || $_SESSION['role_id'] == 2 || $_SESSION['role_id'] == 3?  anchor ("staff/modify_payment_records/{$row['staff_payment_id']}/{$row['staff_id']}" , "Update Record", ['class'=> 'btn btn-primary btn-sm text-right']):''; 
		 ?>  

		 </td>
         
		 <td> 
		 <?php 
		 if($_SESSION['role_id'] == 1 &&  $row['view_by'] == 1 ){
		 echo '<input type="checkbox" name ="payment_record_to_certify[]" class = "payment_record_to_certify checkAll" value = "'. $row["staff_payment_id"].' ">';
		 }
		 
		 else if($_SESSION['role_id'] == 2 &&  $row['view_by'] == 2 ){
		 echo '<input type="checkbox" name ="payment_record_to_certify[]" class = "payment_record_to_certify checkAll" value = "'. $row["staff_payment_id"].' ">';
		 }
		  else if($_SESSION['role_id'] == 3 &&  $row['view_by'] == 3 ){
		 echo '<input type="checkbox" name ="payment_record_to_certify[]" class = "payment_record_to_certify checkAll" value = "'. $row["staff_payment_id"].' ">';
		 }
		 
		 ?>
		 </td>

        
        </tr>
        
        <?php endforeach; ?>
       <?php else: ?>
       
          
             No Records
          
         
       <?php endif; ?>
        
        </tbody>
        
      </table>
    </div>
	<hr>
		<div  style = "float:right;"><input type="checkbox" id="checkAllLower" > <label for ="checkAllLower" style = "margin-bottom: 28px;">Check All</label><br>
      
		<?php 
		switch($_SESSION['role_id']){
		case 1:
		echo '<input type="submit" value = "Send to certify" name = "certify_records">';
		break;
		
		case 2:
		echo '
		<input type="submit" value = "Send to authorize" name = "certify_records">
		<input type="submit" value = "Reject " name = "deny_certify_records">
		';
		break;
		
		case 3:
		echo '
		<input type="submit" value = "Authorize" name = "certify_records">
		<input type="submit" value = "Reject " name = "deny_certify_records">
		';
		break;
		
		
		default:
		break;
		}
	  ?>
	  
</div>
<?php  echo form_close(); ?>
</div>
<?php include("inc/footer.php"); ?>