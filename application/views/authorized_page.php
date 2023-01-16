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



<div class="container">

<h3>  These Records Need to be Approved for Payment !!! </h3>
    <br> <br>

      <hr>
      <div class="row">
        <table class="table table-striped table-hover ">
          <thead>
              <tr>
                <th scope="col ">Staff ID</th>
                <th scope="col">Voucher Number </th>
                <th scope="col">Year Travelled </th>
                <th scope="col">Month Travelled</th>
                <th scope="col">Mileage Amount </th>
                <th scope="col"> Passenger Miles </th>
                <th scope="col"> Toll Amount </th>
                <th scope="col"> Subsistence Amount </th>
                <th scope="col"> Actual Expense </th>
                <th scope="col"> Supper Days </th>
                <th scope="col"> Refreshment Days </th>
                <th scope="col"> Taxi Out Town  </th>
                <th scope="col"> Taxi In Town </th>
                <th scope="col">Certifier Remarks </th>
             
              </tr>
          </thead>
      <tbody>
       
        
        <tr class = 'table-active'>
           <?php if(!empty($data)): ?>
            <?php foreach($data as $row): ?>
          <td> <?php echo $row['staff_id']; ?></td>
          <td><?php  echo $row['voucher_number']; ?></td>
          <td><?php  echo $row['year_travelled']; ?></td>
          <td><?php  echo $row['month_travelled']; ?></td>
          <td><?php  echo '$'. number_format( $row['mileage_km'] * $row['mileage_rate'], 2) ; ?> <br> <sub>  <?php   echo '('. $row['mileage_km'] . '*'. $row['mileage_rate'] . ') </sub> '; ?></td> 
          <td><?php  echo '$'. number_format ($row['passenger_km'] * $row['passenger_rate'],2) ; ?> <br> <sub>  <?php echo '('. $row['passenger_km'] . '*'. $row['passenger_rate'] . ') </sub> ' ; ?></td> 
          <td><?php  echo $row['toll_amt']; ?></td> 
          <td><?php  echo '$'. number_format( $row['subsistence_km'] * $row['subsistence_rate'],2) ; ?> <br> <sub>  <?php echo '('. $row['subsistence_km'] . '*'. $row['subsistence_rate'] . ') </sub> '; ?></td> 
          <td><?php  echo $row['actual_expense']; ?></td> 
          <td><?php  echo '$'. number_format ($row['supper_days'] * $row['supper_rate'],2); ?> <br> <sub>  <?php echo '('. $row['supper_days'] . '*'. $row['supper_rate'] . ') </sub> ' ;  ?> </td> 
          <td><?php  echo '$'. number_format( $row['refreshment_days'] * $row['refreshment_rate']); ?> <br> <sub>  <?php echo '('. $row['refreshment_days'] . '*'. $row['refreshment_rate'] . ') </sub> ';?></td> 
          <td><?php  echo '$'. number_format( $row['taxi_out_town'] * $row['taxi_out_rate']); ?> <br> <sub>  <?php echo '('. $row['taxi_out_town'] . '*'. $row['taxi_out_rate'] . ') </sub> ' ;?></td> 
          <td><?php  echo '$'. number_format( $row['taxi_in_town'] * $row['taxi_in_rate']); ?> <br> <sub>  <?php echo '('. $row['taxi_in_town'] . '*'. $row['taxi_in_rate'] . ') </sub> ' ;  ?> </td> 
          <td><?php  echo $row['certifier_remarks']; ?></td> 
          <td>  <?php   
          
          if($row['authorized_by']== NULL){
            echo anchor ("staff/authorize_payments/{$row['voucher_number']}" , "Approved for Payment ", ['class'=> 'btn btn-success btn-sm text-right']); 
          }
          elseif($row['authorized_by']!= NULL)
          {
             echo anchor ("staff/authorize_payments/{$row['voucher_number']}" , "Approved/Authorized ", ['class'=> 'btn btn-light  btn-sm text-right disabled']); 
           
          }
            ?>   
            
          </td>
         
          
        
          <!-- <td class="text-right " > <a class="btn btn-danger" href="<? //= base_url('staff/staff_payment_submit') ?>?varname=<?php // echo $trn_records['staff_id'] ?>"> Add Payment</a> -->
          <!-- <td class="text-right " > <a class="btn btn-danger" href="<? //= base_url('staff/staff_payment_submit') ?>?varname=<?php // echo $this->uri->segment(3) ?>"> Add Payment</a> -->
         <td>  <?php // echo anchor ("staff/staff_payment_submit/{$trn_records['staff_id']}/{$trn_records['firstname']}/{$trn_records['lastname']}" , "Add Payment", ['class'=> 'btn btn-success text-right']); ?>   </td>
         <td>  <?php //  echo anchor ("staff/modify_payment_records/{$row['staff_payment_id']}/{$row['staff_id']}" , "Update Record", ['class'=> 'btn btn-primary btn-sm text-right']); ?>   </td>

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
    </div>
</div>
</div>
<?php include("inc/footer.php"); ?>