

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

<h4> Please Enter the TRN Number for the Staff Member : </h4>
<?php echo form_open('staff/staff_information') ?>
<input type="text" class="form-control-sm" name ="trn"> 
<input type="submit" value="submit" class="btn btn-primary btn-lg"> 
<br><br>

<?php echo form_close(); ?>

      <h4> Staff Information Dashboard </h4>
      <?php echo anchor ("staff/staff_create" , "Add Travelling/CasualOfficer", ['class'=> 'btn btn-primary']); ?>
      <?php echo anchor ("staff/insert_rate_submit" , "Add a Rate ", ['class'=> 'btn btn-danger']); ?>
      
     
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
         <td>  <?php  echo anchor ("staff/view_payment_records/{$trn_records['staff_id']}" , "View Payment Records", ['class'=> 'btn btn-primary text-right']); ?>   </td>
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