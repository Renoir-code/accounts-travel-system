
    <?php include_once('inc/header.php') ?>
    <br>

    <?php 
      
      //$s = $this->uri->segment(3);
      // $staff_id=11;
     // $lastname = $this->uri->segment(5);
        if($fname == "")
        {
          $x = $this->uri->segment(4);
        }
        else
        {
          $x = $fname;
        }
    
        if($staff == "")
        {
          $s =  $this->uri->segment(3);
        }
        else
        {
          $s = $staff;
        }

      if($lname == "")
      {
        $l =  $this->uri->segment(5);
      }
      else
      {
        $l = $lname;
      }


  ?>

<?php // testarray($months) ?>
<!-- <div class="error_holder"><?//=validation_errors()?></div> -->

<?php echo form_open("staff/staff_payment_submit/{$s}") ?>
 <h4> Enter Staff Payment Details For Officer : </h4>
<div class="row">


   
      
    <div class="col-md-4 col-md-offset-4">
      
    <div class="form-group">
      <label for=""> Staff ID </label>
      <div class="col-sm-10">
      <input type="text" readonly  name='staff_id' id="" class="form-control-lg" value = "<?php echo $s ?>" placeholder="<?php echo $s; // echo $_GET['varname'];  ?>">
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
      <input type="text" name= "voucher_number" class="form-control-lg" value="<?php set_value('voucher_number') ?>" placeholder="">
    </div>
  </div>
  <small> <?php echo form_error('voucher_number','<div class="text-danger">','</div>');?> </small>

  <div class="form-group ">
    <label class="form-label">Year Travelled </label>
    <div class="col-sm-10">
    <select  class="form-control-lg" name="year_travelled">
        <option value="">Choose The Year Travelled ..</option>
            <?php if(count($years)):?>
            <?php foreach($years as $row):?>
              <?php  if($row ==  $currentYear){ ?>
            
            <option value=<?php echo $row?>selected> <?php echo $row ?></option>
           <?php } else { ?>

            <option value=<?php echo $row?> > <?php echo $row ?></option>
             <?php } ?>
                    
            <?php endforeach;?>
            <?php endif;?>
        </select>
    </div>
  </div>

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
      <input type="text" name = "mileage_km" class="form-control-lg" value="<?php set_value('mileage_km') ?>" placeholder="">
    </div>
  </div>
  <small> <?php echo form_error('mileage_km','<div class="text-danger">','</div>');?> </small>


  <div class="form-group ">
    <label class="form-label">Mileage Rate </label>
    <div class="col-sm-10">
    <select  class="form-control-lg" name="mileage_rate">
        <option value="">Choose The Mileage Rate ..</option>
            <?php if(count($mileage_rate)):?>
            <?php foreach($mileage_rate as $row):?>
            <option value=<?php echo $row?> > <?php echo $row ?></option>
            <?php endforeach;?> 
            <?php endif?>       
        </select>
    </div>
  </div>

  <div class="form-group ">
    <label class="form-label">Passenger (Km)</label>
    <div class="col-sm-10">
      <input type="text" name = "passenger_km"  class="form-control-lg" value="<?php set_value('passenger_km') ?>" placeholder="">
    </div>
  </div>
  <small> <?php echo form_error('passenger_km','<div class="text-danger">','</div>');?> </small>

  <div class="form-group ">
    <label class="form-label">Passenger Rate </label>
    <div class="col-sm-10">
    <select  class="form-control-lg" name="passenger_rate">
        <option value="">Choose The Passenger Rate ..</option>
            <?php if(count($passenger_rate)):?>
            <?php foreach($passenger_rate as $row):?>
            <option value=<?php echo $row?> > <?php echo $row ?></option>
            <?php endforeach;?>  
            <?php endif?>      
        </select>
    </div>
  </div>
  
  <div class="form-group ">
    <label class="form-label">Toll Amount </label>
    <div class="col-sm-10">
      <input type="text" name = "toll_amt" class="form-control-lg" value="<?php set_value('toll_amt') ?>" placeholder="">
    </div>
  </div>
  <small> <?php echo form_error('toll_amt','<div class="text-danger">','</div>');?> </small>

  <div class="form-group ">
    <label class="form-label">Subsistence (km) </label>
    <div class="col-sm-10">
      <input type="text" name="subsistence_km" class="form-control-lg" value="<?php set_value('subsistence_km') ?>" placeholder="">
    </div>
  </div>
  <small> <?php echo form_error('subsistence_km','<div class="text-danger">','</div>');?> </small>

  <div class="form-group ">
    <label class="form-label">Subsistence Rate </label>
    <div class="col-sm-10">
    <select  class="form-control-lg" name="subsistence_rate">
        <option value="">Choose The Subsistence Rate ..</option>
            <?php if(count($subsistence_rate)):?>
            <?php foreach($subsistence_rate as $row):?>
            <option value=<?php echo $row?> > <?php echo $row ?></option>
            <?php endforeach;?>   
            <?php endif?>    
        </select>
    </div>
  </div>


  <div class="form-group ">
    <label class="form-label">Actual Expense </label>
    <div class="col-sm-10">
      <input type="text" name="actual_expense" class="form-control-lg" value="<?php set_value('actual_expense') ?>" placeholder="">
    </div>
  </div>
  <small> <?php echo form_error('actual_expense','<div class="text-danger">','</div>');?> </small>
  
  
  <div class="form-group ">
    <label class="form-label">Supper (days) </label>
    <div class="col-sm-10">
      <input type="text" name ="supper_days" class="form-control-lg" value="<?php set_value('supper_days') ?>" placeholder="">
    </div>
  </div>
  <small> <?php echo form_error('supper_days','<div class="text-danger">','</div>');?> </small>

  <div class="form-group ">
    <label class="form-label">Supper Rate </label>
    <div class="col-sm-10">
    <select  class="form-control-lg" name="supper_rate">
        <option value="">Choose The Supper Rate ..</option>
            <?php if(count($supper_rate)):?>
            <?php foreach($supper_rate as $row):?>
            <option value=<?php echo $row?> > <?php echo $row ?></option>
            <?php endforeach;?>      
            <?php endif?>  
        </select>
    </div>
  </div>

  <div class="form-group ">
    <label class="form-label">Refreshment(days)</label>
    <div class="col-sm-10">
      <input type="text" name="refreshment_days" class="form-control-lg" value="<?php set_value('refreshment_days') ?>" placeholder="">
    </div>
  </div>
  <small> <?php echo form_error('refreshment_days','<div class="text-danger">','</div>');?> </small>

  <div class="form-group ">
    <label class="form-label">Refreshment Rate </label>
    <div class="col-sm-10">
    <select  class="form-control-lg" name="refreshment_rate">
        <option value="">Choose The Refreshment Rate ..</option>
            <?php if(count($refreshment_rate)):?>
            <?php foreach($refreshment_rate as $row):?>
            <option value=<?php echo $row?> > <?php echo $row ?></option>
            <?php endforeach;?>      
            <?php endif?>  
        </select>
    </div>
  </div>

  <div class="form-group ">
    <label class="form-label">Taxi Out Town (Days)</label>
    <div class="col-sm-10">
      <input type="text" name="taxi_out_town" class="form-control-lg" value="<?php set_value('taxi_out_town') ?>" placeholder="">
    </div>
  </div>
  <small> <?php echo form_error('taxi_out_town','<div class="text-danger">','</div>');?> </small>

  <div class="form-group ">
    <label class="form-label">Taxi Out Rate </label>
    <div class="col-sm-10">
    <select  class="form-control-lg" name="taxi_out_rate">
        <option value="">Choose The Out TOwn Taxi Rate ..</option>
            <?php if(count($taxi_out_rate)):?>
            <?php foreach($taxi_out_rate as $row):?>
            <option value=<?php echo $row?> > <?php echo $row ?></option>
            <?php endforeach;?> 
            <?php endif?>       
        </select>
    </div>
  </div>


  <div class="form-group ">
    <label class="form-label"> Taxi In Town (Days)</label>
    <div class="col-sm-10">
      <input type="text" name="taxi_in_town" class="form-control-lg" value="<?php set_value('taxi_in_town') ?>" placeholder="">
    </div>
  </div>
  <small> <?php echo form_error('taxi_in_town','<div class="text-danger">','</div>');?> </small>

  <div class="form-group ">
    <label class="form-label">Taxi In Town Rate </label>
    <div class="col-sm-10">
    <select  class="form-control-lg" name="taxi_in_rate">
        <option value="">Choose The In Town Taxi Rate ..</option>
            <?php if(count($taxi_in_rate)):?>
            <?php foreach($taxi_in_rate as $row):?>
            <option value=<?php echo $row?> > <?php echo $row ?></option>
            <?php endforeach;?>   
            <?php endif?>     
        </select>
    </div>
  </div>

  <div class="form-group ">
    <label class="form-label"> Remarks </label>
    <div class="col-sm-10">
      <input type="text" name="certifier_remarks" class="form-control-lg" value="<?php set_value('certifier_remarks') ?>" placeholder="">
    </div>
  </div>
  <small> <?php echo form_error('certifier_remarks','<div class="text-danger">','</div>');?> </small>
<br>

  <input type="submit" class="btn btn-primary btn block"></input>
  <hr>
</div>
  </div>
























<?php include_once('inc/footer.php') ?>