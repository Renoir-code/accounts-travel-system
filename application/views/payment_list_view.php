<?php include("inc/header.php"); ?>

<?php // testarray($payment_records);) ;?>

<?php if($msg = $this->session->flashdata('success_message')):?>
            <div class="row ">
                <div class ="col-md-3">
                    <div class="alert alert-dismissable alert-success">
                        <?php echo $msg; ?>
                        <?php endif;?>
                    </div> 
                </div>
                <!--Update here 8/28/2023 -->
                <?php if($msg = $this->session->flashdata('success_update')):?>
        <div class="row ">
            <div class ="col-md-6">
                <div class="alert alert-dismissable alert-success">
                     <?php echo $msg; ?>    
                </div>
            </div>       
        </div>
    <?php endif; ?>



<div class="container">


    <br> <br>

    
     
 <?php  echo '<h4>  These are the payment Records for : <span style="color: red; font-size: 30px;"> '.$staff_name.' </span>  </h4>'   ?>
 <br>

 <td> <?php  echo anchor ("staff/modify_staff_records/{$data['staff_id']}" , "Update $staff_name 's Account Details ", ['class'=> 'btn btn-primary text-right']); ?>   </td>
       

      
    <?php $test1 =2;?>
    <?php $test2 =3;?>

      <hr>
     <?php echo form_open("staff/certifier_record/{$test1}/{$test2}" ) ?>
      <div class="row">
        <table class="table table-striped table-hover ">
          <thead>
              <tr>
              <!--  <th scope="col ">Staff ID</th> -->
                <th scope="col">Voucher Number </th>
                <th scope="col">Period</th>
                <!--<th scope="col">Month Travelled</th>-->
                <th scope="col">Mileage Amount </th>
                <th scope="col"> Passenger Miles </th>
                <th scope="col"> Toll Amount </th>
                <th scope="col"> Subsistence Amount </th>
                <th scope="col"> Actual Expense </th>
                <th scope="col"> Supper Days </th>
                <th scope="col"> Refreshment Days </th>
                <th scope="col"> Taxi Out Town  </th>
                <th scope="col"> Taxi In Town </th>
				 <th scope="col"> Status </th>
              <!--  <th scope="col">Certifier Remarks </th> -->
             
              </tr>
          </thead>
      <tbody>
       
        
        <tr class = 'table-active'>
           <?php if(!empty($payment_records)): ?>
            <?php foreach($payment_records as $row): ?>
       <!--   <td> <?php // echo $row['staff_id']; ?></td> -->
          <td><?php  echo $row['voucher_number']; ?></td>
          <td><?php  echo $row['year_travelled'] .'<br>'. $row['month_travelled']; ?></td>
          <!--<td><?php // echo $row['month_travelled']; ?></td>-->
          <td><?php  echo '$'. number_format( $row['mileage_km'] * $row['mileage_rate'], 2) ; ?> <br> <sub>  <?php   echo '('. $row['mileage_km'] . '*'. $row['mileage_rate'] . ') </sub> '; ?></td> 
          <td><?php  echo '$'. number_format ($row['passenger_km'] * $row['passenger_rate'],2) ; ?> <br> <sub>  <?php echo '('. $row['passenger_km'] . '*'. $row['passenger_rate'] . ') </sub> ' ; ?></td> 
          <td><?php  echo $row['toll_amt']; ?></td> 
          <td><?php  echo '$'. number_format( $row['subsistence_km'] * $row['subsistence_rate'],2) ; ?> <br> <sub>  <?php echo '('. $row['subsistence_km'] . '*'. $row['subsistence_rate'] . ') </sub> '; ?></td> 
          <td><?php  echo $row['actual_expense']; ?></td> 
          <td><?php  echo '$'. number_format ($row['supper_days'] * $row['supper_rate'],2); ?> <br> <sub>  <?php echo '('. $row['supper_days'] . '*'. $row['supper_rate'] . ') </sub> ' ;  ?> </td> 
          <td><?php  echo '$'. number_format( $row['refreshment_days'] * $row['refreshment_rate']); ?> <br> <sub>  <?php echo '('. $row['refreshment_days'] . '*'. $row['refreshment_rate'] . ') </sub> ';?></td> 
          <td><?php  echo '$'. number_format( $row['taxi_out_town'] * $row['taxi_out_rate']); ?> <br> <sub>  <?php echo '('. $row['taxi_out_town'] . '*'. $row['taxi_out_rate'] . ') </sub> ' ;?></td> 
          <td><?php  echo '$'. number_format( $row['taxi_in_town'] * $row['taxi_in_rate']); ?> <br> <sub>  <?php echo '('. $row['taxi_in_town'] . '*'. $row['taxi_in_rate'] . ') </sub> ' ;  ?> </td> 
        <!--  <td><?php // echo $row['certifier_remarks']; ?> </td> -->
          <td>  <?php   
          /*if($row['view_by']== NULL)
          {
          echo anchor ("staff/certifier_record/{$row['staff_payment_id']}/{$row['staff_id']}" , "Send for Certification", ['class'=> 'btn btn-danger btn-sm text-right ']); 
          }
          elseif($row['view_by']!= NULL)
          {
            echo anchor ("staff/certifier_record/{$row['staff_payment_id']}/{$row['staff_id']}" , "Pending Certification", ['class'=> 'btn btn-light  btn-sm text-right disabled']); 
          }
          elseif($row['certified_by']!= NULL)
          {
            echo anchor ("staff/certifier_record/{$row['staff_payment_id']}/{$row['staff_id']}" , "Certified", ['class'=> 'btn btn-primary btn-sm text-right disabled']); 
          }
	  
		  */
		 
		  switch($row['view_by']){
			 
			 case 1:
			 echo "Record Inserted";
			 break;
			 
			 case 2:
			 echo "Pending Certification";
			 break;
			 
			 case 3:
			 echo "Pending Authorization";
			 break;
			 
			 case 3:
			 echo "Authorized";
			 break;
			 			 
			 default:
			 echo "Record Inserted";
			 break;
		 
		 
	 }
		  ?>   </td>
          
         
         
         <td>  <?php   echo anchor ("staff/modify_payment_records/{$row['staff_payment_id']}/{$row['staff_id']}" , "Update Record", ['class'=> 'btn btn-primary btn-sm text-right']); ?>   </td>
           <td> <input type="checkbox" name ="payment_record_to_certify[]" class = "payment_record_to_certify" value = "<?php echo $row['staff_payment_id'] ?>"></td>
        </td>
        </tr>
        </tr>
        <?php endforeach; ?>
       <?php else: ?>
       
          <tr>
            <td> No Records</td>
          </tr>
         
       <?php endif; ?>
	   
        
        </tbody>
        
      </table>

    </div><hr>
		<div  style = "float:right;"><input type="checkbox" id="checkAll"> <label for ="checkAll" >Check All</label>
      <input type="submit" value = "Send to certify">
	  </div>
      <?php  echo form_close(); ?>
</div>
      

</div>

<?php include("inc/footer.php"); ?>