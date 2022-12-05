
<?php include_once('inc/header.php') ?>
<br>
<div class="error_holder"><?=validation_errors()?></div>
<?php // testarray($staff_id); ?>

<?php echo form_open("staff/staff_payment_submit") ?>
 <h4> Enter Staff Payment Details For Officer : </h4>
<div class="row">
      
      <div class="col-md-4 col-md-offset-4">
<div class="form-group ">
    <label class="form-label">Voucher Number</label>
    <div class="col-sm-10">
      <input type="text" class="form-control-lg" value="<?php set_value('voucher_number') ?>" placeholder="">
    </div>
  </div>
  <div class="form-group ">
    <label class="form-label">Year Travelled </label>
    <div class="col-sm-10">
      <input type="text" class="form-control-lg" value="<?php set_value('year_travelled') ?>" placeholder="">
    </div>
  </div>

  <div class="form-group ">
    <label class="form-label">Month Travelled </label>
    <div class="col-sm-10">
      <input type="text" class="form-control-lg" value="<?php set_value('month_travelled') ?>" placeholder="">
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