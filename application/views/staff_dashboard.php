

<?php include("inc/header.php"); ?>
<br>
<?php // testarray($trn_records); ?>

<br>

<h4> Please Enter the TRN Number for the Staff Member : </h4>
<?php echo form_open('staff/staff_information') ?>
<input type="text" class="form-control-sm" name ="trn"> 
<input type="submit" value="submit" class="btn btn-primary btn-lg"> 
<br><br>

<?php echo form_close(); ?>



     
        

      <h4> Staff Information Dashboard </h4>
      <?php //echo anchor ("user/adminRegister" , "BACK TO TRN SEARCH", ['class'=> 'btn btn-primary']); ?>
    

      <hr>
      <div class="row">
        <table class="table table-striped table-hover ">
          <thead>
              <tr>
                <th scope="col" >Staff ID</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name </th>
                <th scope="col">Post Title</th>
                <th scope="col">Tax Registration Number</th>
                <th scope="col"> Type of Upkeep</th>
                <th scope="col"> Type of Officer</th>
                <th scope="col"> Vehicle Model</th>
                <th scope="col"> Vehicle Make</th>
                <th scope="col"> Vehicle Chasis Number</th>
                <th scope="col"> Vehicle Engine Number</th>
                <th scope="col"> Location</th>
                <th scope="col"> Action </th>
              </tr>
          </thead>
      <tbody>
       
        
        <tr class = 'table-active'>
           <?php if(!empty($trn_records)): ?>
          <td> <?php echo $trn_records['staff_id']; ?></td>
          <td><?php  echo $trn_records['firstname']; ?></td>
          <td><?php  echo $trn_records['lastname']; ?></td>
          <td><?php  echo $trn_records['post_title']; ?></td>
          <td><?php  echo $trn_records['trn']; ?></td> 
          <td><?php  echo $trn_records['upkeep_name']; ?></td> 
          <td><?php  echo $trn_records['officer_name']; ?></td> 
          <td><?php  echo $trn_records['vehicle_model']; ?></td> 
          <td><?php  echo $trn_records['vehicle_make']; ?></td> 
          <td><?php  echo $trn_records['vehicle_chasisnum']; ?></td> 
          <td><?php  echo $trn_records['vehicle_engine_num']; ?></td> 
          <td><?php  echo $trn_records['location_name']; ?></td> 
          
          <!-- <td class="text-right " > <a class="btn btn-danger" href="<? //= base_url('staff/staff_payment_submit') ?>?varname=<?php // echo $trn_records['staff_id'] ?>"> Add Payment</a> -->
          <!-- <td class="text-right " > <a class="btn btn-danger" href="<? //= base_url('staff/staff_payment_submit') ?>?varname=<?php // echo $this->uri->segment(3) ?>"> Add Payment</a> -->
         <td>  <?php  echo anchor ("staff/staff_payment_submit/{$trn_records['staff_id']}/{$trn_records['firstname']}/{$trn_records['lastname']}" , "Add Payment", ['class'=> 'btn btn-success text-right']); ?>   </td>
        </td>
        </tr>
        </tr>
        
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