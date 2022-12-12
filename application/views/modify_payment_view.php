
    <?php include_once('inc/header.php') ?>
    <br>
    <?php  // echo $data['passenger_km']; ?>


<?php // testarray($data[0]) ?>
<!-- <div class="error_holder"><?//=validation_errors()?></div> -->

<?php if($msg = $this->session->flashdata('success_message')):?>
            <div class="row ">
                <div class ="col-md-3">
                    <div class="alert alert-dismissable alert-success">
                        <?php echo $msg; ?>
                        <?php endif;?>
                    </div> 
                </div>

                <?php if($msg = $this->session->flashdata('fail_message')):?>
          
          <div class ="col-md-3">
              <div class="alert alert-dismissable alert-danger">
                  <?php echo $msg; ?>
                  <?php endif;?>
              </div> 
          </div>


              </div>
                
            
              <div class ="container">

<?php //echo form_open("staff/update_payment_records/{$data['staff_payment_id']}") ?>
<!-- <form action="<? //=base_url('staff/update_payment_records/'.$data['staff_payment_id'].$data['staff_id'])?>" method="post"> -->
<form action="<?=base_url("staff/update_payment_records/{$data['staff_payment_id']}/{$data['staff_id']}")?>" method="post"> 
 <h4> MODIFY STAFF PAYMENT RECORD </h4>
<div class="row">

   
    <div class="col-md-4 col-md-offset-4">
      
    
<div class="form-group ">
    <label class="form-label">Voucher Number</label>
    <div class="col-sm-10">
      <input type="text" name= "voucher_number" class="form-control-lg" 
      value="<?=$data['voucher_number']?>" placeholder="">
    </div>
  </div>
  <small> <?php echo form_error('voucher_number','<div class="text-danger">','</div>');?> </small>

  <div class="form-group ">
    <label class="form-label">Year Travelled </label>
    <div class="col-sm-10">
    <select class="form-control-lg" name="year_travelled" >
        <option value="" > Choose the Year Travelled</option>
        <?php if(count($years)):?>
        <?php foreach($years as $row):?>
        <option value=<?php echo $row ?> <?php if($row === $data['year_travelled']) echo "selected" ?> > 
        <?php echo $row?></option>
        <?php endforeach;?>
        <?php endif;?>
    </select>
    </div>
  </div>

  <?php // echo $this->uri->segment(6) ?>
  <div class="form-group ">
    <label class="form-label">Month Travelled </label>
    <div class="col-sm-10">
    <select class="form-control-lg" name="month_travelled" >
        <option value="" > Choose the Year Travelled</option>
        <?php if(count($months)):?>
        <?php foreach($months as $row):?>
        <option value=<?php echo $row ?> <?php if($row === $data['month_travelled']) echo "selected" ?> > 
        <?php echo $row?></option>
        <?php endforeach;?>
        <?php endif;?>
    </select>
    </div>
  </div>

  <div class="form-group ">
    <label class="form-label">Mileage (Km) </label>
    <div class="col-sm-10">
      <input type="text" name = "mileage_km" class="form-control-lg"
       value="<?=$data['mileage_km']?>" placeholder="">
    </div>
  </div>
  <small> <?php echo form_error('mileage_km','<div class="text-danger">','</div>');?> </small>

  <div class="form-group ">
    <label class="form-label">Passenger (Km)</label>
    <div class="col-sm-10">
      <input type="text" name = "passenger_km"  class="form-control-lg"
       value="<?=$data['passenger_km']?>" placeholder="">
    </div>
  </div>
  <small> <?php echo form_error('passenger_km','<div class="text-danger">','</div>');?> </small>
  
  <div class="form-group ">
    <label class="form-label">Toll Amount </label>
    <div class="col-sm-10">
      <input type="text" name = "toll_amt" class="form-control-lg"
       value="<?=$data['toll_amt']?>" placeholder="">
    </div>
  </div>
  <small> <?php echo form_error('toll_amt','<div class="text-danger">','</div>');?> </small>

  <div class="form-group ">
    <label class="form-label">Subsistence (km) </label>
    <div class="col-sm-10">
      <input type="text" name="subsistence_km" class="form-control-lg"
       value="<?=$data['subsistence_km']?>" placeholder="">
    </div>
  </div>
  <small> <?php echo form_error('subsistence_km','<div class="text-danger">','</div>');?> </small>

  <div class="form-group ">
    <label class="form-label">Actual Expense </label>
    <div class="col-sm-10">
      <input type="text" name="actual_expense" class="form-control-lg"
       value="<?=$data['actual_expense']?>" placeholder="">
    </div>
  </div>
  <small> <?php echo form_error('actual_expense','<div class="text-danger">','</div>');?> </small>
  
  
  <div class="form-group ">
    <label class="form-label">Supper (days) </label>
    <div class="col-sm-10">
      <input type="text" name ="supper_days" class="form-control-lg"
       value="<?=$data['supper_days']?>" placeholder="">
    </div>
  </div>
  <small> <?php echo form_error('supper_days','<div class="text-danger">','</div>');?> </small>

  <div class="form-group ">
    <label class="form-label">Refreshment(days)</label>
    <div class="col-sm-10">
      <input type="text" name="refreshment_days" class="form-control-lg"
       value="<?=$data['refreshment_days']?>" placeholder="">
    </div>
  </div>
  <small> <?php echo form_error('refreshment_days','<div class="text-danger">','</div>');?> </small>

  <div class="form-group ">
    <label class="form-label">Taxi_out_town(days)</label>
    <div class="col-sm-10">
      <input type="text" name="taxi_out_town" class="form-control-lg"
       value="<?=$data['taxi_out_town']?>" placeholder="">
    </div>
  </div>
  <small> <?php echo form_error('taxi_out_town','<div class="text-danger">','</div>');?> </small>

  <div class="form-group ">
    <label class="form-label"> Taxi_in_town(days)</label>
    <div class="col-sm-10">
      <input type="text" name="taxi_in_town" class="form-control-lg"
       value="<?=$data['taxi_in_town']?>" placeholder="">
    </div>
  </div>
  <small> <?php echo form_error('taxi_in_town','<div class="text-danger">','</div>');?> </small>

  <div class="form-group ">
    <label class="form-label"> Remarks </label>
    <div class="col-sm-10">
      <input type="text" name="certifier_remarks" class="form-control-lg"
       value="<?=$data['certifier_remarks']?>" placeholder="">
    </div>
  </div>
  <small> <?php echo form_error('certifier_remarks','<div class="text-danger">','</div>');?> </small>
<br>

  <input type="submit" class="btn btn-primary btn block"></input>
  <hr>
</div>
  </div>
  </div>


