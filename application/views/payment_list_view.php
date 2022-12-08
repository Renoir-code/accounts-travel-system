<?php include("inc/header.php"); ?>

<?php if($msg = $this->session->flashdata('success_message')):?>
            <div class="row ">
                <div class ="col-md-3">
                    <div class="alert alert-dismissable alert-success">
                        <?php echo $msg; ?>
                        <?php endif;?>
                    </div> 
                </div>


<?php // echo 'View Payment recordds'; ?>
<div class="container">


<h4> Payment Record List  </h4>
      <?php // echo anchor ("user/adminRegister" , "Update Payment Record", ['class'=> 'btn btn-primary']); ?>
      
    
      <hr>
      <div class="row">
        <table class="table table-striped table-hover ">
          <thead>
              <tr>
                <th scope="col" >Staff ID</th>
                <th scope="col">Voucher Number </th>
                <th scope="col">Year Travelled </th>
                <th scope="col">Month Travelled</th>
                <th scope="col">Mileage Amount </th>
                <th scope="col"> Passenger Miles </th>
                <th scope="col"> Toll Amount </th>
                <th scope="col"> Subsistence Amount </th>
                <th scope="col"> Supper Days </th>
                <th scope="col"> Refreshment Days </th>
                <th scope="col"> Taxi Out Town  </th>
                <th scope="col"> Taxi In Town </th>
                <th scope="col">Certifier Remarks </th>
              </tr>
          </thead>
      <tbody>
       
        
        <tr class = 'table-active'>
           <?php if(!empty($payment_records)): ?>
            <?php foreach($payment_records as $row): ?>
          <td> <?php echo $row['staff_id']; ?></td>
          <td><?php  echo $row['voucher_number']; ?></td>
          <td><?php  echo $row['year_travelled']; ?></td>
          <td><?php  echo $row['month_travelled']; ?></td>
          <td><?php  echo $row['mileage_km']; ?></td> 
          <td><?php  echo $row['passenger_km']; ?></td> 
          <td><?php  echo $row['toll_amt']; ?></td> 
          <td><?php  echo $row['subsistence_km']; ?></td> 
          <td><?php  echo $row['supper_days']; ?></td> 
          <td><?php  echo $row['refreshment_days']; ?></td> 
          <td><?php  echo $row['taxi_out_town']; ?></td> 
          <td><?php  echo $row['taxi_in_town']; ?></td> 
          <td><?php  echo $row['certifier_remarks']; ?></td> 
          
          <!-- <td class="text-right " > <a class="btn btn-danger" href="<? //= base_url('staff/staff_payment_submit') ?>?varname=<?php // echo $trn_records['staff_id'] ?>"> Add Payment</a> -->
          <!-- <td class="text-right " > <a class="btn btn-danger" href="<? //= base_url('staff/staff_payment_submit') ?>?varname=<?php // echo $this->uri->segment(3) ?>"> Add Payment</a> -->
         <td>  <?php // echo anchor ("staff/staff_payment_submit/{$trn_records['staff_id']}/{$trn_records['firstname']}/{$trn_records['lastname']}" , "Add Payment", ['class'=> 'btn btn-success text-right']); ?>   </td>
         <td>  <?php   echo anchor ("staff/modify_payment_records/{$row['staff_payment_id']}/{$row['staff_id']}" , "Update Payment Records", ['class'=> 'btn btn-primary btn-sm text-right']); ?>   </td>
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