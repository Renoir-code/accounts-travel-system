
    <?php include_once('inc/header.php') ?>
    <br>

    <?php 
      
      //$s = $this->uri->segment(3);
      // $staff_id=11;
      $lastname = $this->uri->segment(5);
    if($fname == ""){
      $x = $this->uri->segment(4);
    }else{
      $x = $fname;
    }
    

    if($staff == ""){
      $s =  $this->uri->segment(3);
    }
    else{
      $s = $staff;
    }


    if($lname == ""){
      $l =  $this->uri->segment(5);
    }
    else{
      $l = $lname;
    }


  ?>

<?php // testarray($months) ?>
<div class="error_holder"><?=validation_errors()?></div>

<?php echo form_open("staff/staff_payment_submit") ?>
 <h4> Enter Staff Payment Details For Officer : </h4>
<div class="row">


   
      
      <div class="col-md-4 col-md-offset-4">
      
    <div class="form-group">
      <label for=""> Staff ID </label>
      <div class="col-sm-10">
      <input type="text" readonly  name='staff_id' id="" class="form-control-lg" value = "<?php echo $s; ?>" placeholder="<?php echo $s; // echo $_GET['varname'];  ?>">
    </div>
    </div>
    
    
    <div class="form-group">
      <label for="">First Name </label>
      <div class="col-sm-10">
      <input type="text" readonly name='firstname' id="" class="form-control-lg" value = "<?php echo $x ?>" placeholder="<?php echo $x; // echo $_GET['varname'];  ?>">
    </div>
    </div>
    
    
    <div class="form-group">
      <label for=""> Last Name </label>
      <div class="col-sm-10">
      <input type="text" readonly name='lastname' id="" class="form-control-lg" value = "<?php echo $l ?>" placeholder="<?php echo $l; // echo $_GET['varname'];  ?>">
    </div>
    </div>
    
<div class="form-group ">
    <label class="form-label">Voucher Number</label>
    <div class="col-sm-10">
      <input type="text" class="form-control-lg" value="<?php set_value('voucher_number') ?>" placeholder="">
    </div>
  </div>
  <small> <?php echo form_error('voucher_number','<div class="text-danger">','</div>');?> </small>

  <div class="form-group ">
    <label class="form-label">Year Travelled </label>
    <div class="col-sm-10">
      <input type="text" class="form-control-lg" value="<?php set_value('year_travelled') ?>" placeholder="">
    </div>
  </div>
  <small> <?php echo form_error('year_travelled','<div class="text-danger">','</div>');?> </small>
  <?php // echo $this->uri->segment(6) ?>
  <div class="form-group ">
    <label class="form-label">Month Travelled </label>
    <div class="col-sm-10">
    <select  class="form-control-lg" name="month_travelled">
        <option value="">Choose The Month Travelled ..</option>
            <?php if(count($months)):?>
            <?php foreach($months as $row):?>
              <?php  if($row ==  $currentMonth){ ?>
            
            <option value=<?php echo $row?>selected> <?php echo $row ?></option>
           <?php } else { ?>

            <option value=<?php echo $row?> > <?php echo $row ?></option>
             <?php } ?>
            
         
            <?php endforeach;?>
            <?php endif;?>
        </select>
    </div>
  </div>
  <div class="form-group ">
    <label class="form-label">Mileage (Km) </label>
    <div class="col-sm-10">
      <input type="text" class="form-control-lg" value="<?php set_value('mileage_km') ?>" placeholder="">
    </div>
  </div>
  <div class="form-group ">
    <label class="form-label">Passenger (Km)</label>
    <div class="col-sm-10">
      <input type="text" class="form-control-lg" value="<?php set_value('passenger_km') ?>" placeholder="">
    </div>
  </div>
  <div class="form-group ">
    <label class="form-label">Toll Amount </label>
    <div class="col-sm-10">
      <input type="text" class="form-control-lg" value="<?php set_value('toll_amt') ?>" placeholder="">
    </div>
  </div>
  <div class="form-group ">
    <label class="form-label">Subsistence (km) </label>
    <div class="col-sm-10">
      <input type="text" class="form-control-lg" value="<?php set_value('subsistence_km') ?>" placeholder="">
    </div>
  </div>
  <div class="form-group ">
    <label class="form-label">Supper (days) </label>
    <div class="col-sm-10">
      <input type="text" class="form-control-lg" value="<?php set_value('supper_days') ?>" placeholder="">
    </div>
  </div>
  <div class="form-group ">
    <label class="form-label">Refreshment(days)</label>
    <div class="col-sm-10">
      <input type="text" class="form-control-lg" value="<?php set_value('refreshment_days') ?>" placeholder="">
    </div>
  </div>
  <div class="form-group ">
    <label class="form-label">Taxi_out_town(days)</label>
    <div class="col-sm-10">
      <input type="text" class="form-control-lg" value="<?php set_value('taxi_out_town') ?>" placeholder="">
    </div>
  </div>
  <div class="form-group ">
    <label class="form-label"> Taxi_in_town(days)</label>
    <div class="col-sm-10">
      <input type="text" class="form-control-lg" value="<?php set_value('taxi_in_town') ?>" placeholder="">
    </div>
  </div>
  <div class="form-group ">
    <label class="form-label"> Remarks </label>
    <div class="col-sm-10">
      <input type="text-area" class="form-control-lg" value="<?php set_value('certifier_remarks') ?>" placeholder="">
    </div>
  </div>
<br>

  <input type="submit" class="btn btn-primary btn block"></input>
  <hr>
</div>
  </div>

























<?php include_once('inc/footer.php') ?>