
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

<div class="row">

   
<div class="container my-5">
  <div class="card">
    <form>
      <!-- Card header -->
      <div class="card-header py-4 px-5 bg-light border-0">
        <h4 class="mb-0 fw-bold">Update Staff Payment Record</h4>
      </div>

      <!-- Card body -->
      <div class="card-body px-5">
        <!-- Account section -->
        

        <hr class="my-5" />

        <!-- Mileage Section -->
        <div class="row gx-xl-5">
          <div class="col-md-4">
            <h5>Date Details </h5>
            <p class="text-muted"> Please Note Future dates cannot be selected</p>
          </div>

          <div class="col-md-8">
            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="exampleInput4" class="form-label">Voucher Number</label>
                  <input type="text" name= "voucher_number" class="form-control" value="<?=$data['voucher_number']?>" placeholder="">
                  <small> <?php echo form_error('voucher_number','<div class="text-danger">','</div>');?> </small>
                </div>
               

                <div class="mb-3">
                  <label for="exampleInput4" class="form-label">Year Travelled</label>
                  <select class="form-control" name="year_travelled" >
                  <option value="" > Choose the Year Travelled</option>
                  <?php if(count($years)):?>
                  <?php foreach($years as $row):?>
                  <option value=<?php echo $row ?> <?php if($row === $data['year_travelled']) echo "selected" ?> > 
                  <?php echo $row?></option>
                  <?php endforeach;?>
                  <?php endif;?>
                 </select>
                </div>
                <div class="mb-3">
                  <label for="exampleInput4" class="form-label">Month Travelled</label>
                  <select class="form-control" name="month_travelled" >
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

            </div>
          </div>
        </div>

        <hr class="my-5" />

        <div class="row gx-xl-5">
          <div class="col-md-4">
            <h5>Mileage Details</h5>
            <p class="text-muted"></p>
          </div>

          <div class="col-md-8">

            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="exampleInput7" class="form-label">Mileage(km)</label>
                  <input type="text" name = "mileage_km" class="form-control" value="<?=$data['mileage_km']?>" placeholder="">
                  <small> <?php echo form_error('mileage_km','<div class="text-danger">','</div>');?> </small>
                </div>
              </div>

              <div class="col-md-6">
                <label for="exampleInput8" class="form-label">Mileage Rate </label>
                <select  class="form-control" name="mileage_rate">
              <option value="">Choose The Mileage Rate ..</option>
                <?php if(count($mileage_rate)):?>
                <?php foreach($mileage_rate as $row):?>
                <option value=<?php echo $row['rate_value'] ?> <?php if($row['rate_value'] === $data['mileage_rate']) echo "selected" ?> > 
                <?php echo $row['rate_value']?></option>
                <?php endforeach;?>
                <?php endif;?>               
              </select>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="exampleInput9" class="form-label" >Passenger Details </label>
                  <input type="text" name = "passenger_km"  class="form-control" value="<?=$data['passenger_km']?>" placeholder="">
                    <small> <?php echo form_error('passenger_km','<div class="text-danger">','</div>');?> </small>
                </div>
              </div>

              <div class="col-md-6">
                <label for="exampleInput10" class="form-label" >Passenger Rate</label>
                <select  class="form-control" name="passenger_rate">
              <option value="">Choose The Passenger Rate ..</option>
                <?php if(count($passenger_rate)):?>
                <?php foreach($passenger_rate as $row):?>
                <option value=<?php echo $row['rate_value'] ?> <?php if($row['rate_value'] === $data['passenger_rate']) echo "selected" ?> > 
                <?php echo $row['rate_value']?></option>
                <?php endforeach;?>
                <?php endif;?>               
              </select>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="exampleInput9" class="form-label">Subsistence</label>
                  <input type="text" name="subsistence_km" class="form-control" value="<?=$data['subsistence_km']?>" placeholder="">
                    <small> <?php echo form_error('subsistence_km','<div class="text-danger">','</div>');?> </small>
                </div>
              </div>

              <div class="col-md-6">
                <label for="exampleInput10" class="form-label">Subsistence Rate</label>
                <select  class="form-control" name="subsistence_rate">
                <option value="">Choose The Subsistence Rate ..</option>
                  <?php if(count($subsistence_rate)):?>
                  <?php foreach($subsistence_rate as $row):?>
                  <option value=<?php echo $row['rate_value'] ?> <?php if($row['rate_value'] === $data['subsistence_rate']) echo "selected" ?> > 
                  <?php echo $row['rate_value']?></option>
                  <?php endforeach;?>
                  <?php endif;?>               
                </select>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="exampleInput9" class="form-label">Toll Amount</label>
                  <input type="text" name = "toll_amt" class="form-control" value="<?=$data['toll_amt']?>" placeholder="">
                    <small> <?php echo form_error('toll_amt','<div class="text-danger">','</div>');?> </small>
                </div>
              </div>

              <div class="col-md-6">
                <label for="exampleInput10" class="form-label" >Actual Expense</label >
                <input type="text" name="actual_expense" class="form-control" value="<?=$data['actual_expense']?>" placeholder="">
                  <small> <?php echo form_error('actual_expense','<div class="text-danger">','</div>');?> </small>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="exampleInput9" class="form-label">Supper (days)</label>
                  <input type="text" name ="supper_days" class="form-control" value="<?=$data['supper_days']?>" placeholder="">
                    <small> <?php echo form_error('supper_days','<div class="text-danger">','</div>');?> </small>
                </div>
              </div>

              <div class="col-md-6">
                <label for="exampleInput10" class="form-label" >Supper Rate</label >
                <select  class="form-control" name="supper_rate">
              <option value="">Choose The Supper Rate ..</option>
                <?php if(count($supper_rate)):?>
                <?php foreach($supper_rate as $row):?>
                <option value=<?php echo $row['rate_value'] ?> <?php if($row['rate_value'] === $data['supper_rate']) echo "selected" ?> > 
                <?php echo $row['rate_value']?></option>
                <?php endforeach;?>
                <?php endif;?>               
              </select>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="exampleInput9" class="form-label">Refreshment</label>
                  <input type="text" name="refreshment_days" class="form-control" value="<?=$data['refreshment_days']?>" placeholder="">
                    <small> <?php echo form_error('refreshment_days','<div class="text-danger">','</div>');?> </small>
                </div>
              </div>

              <div class="col-md-6">
                <label for="exampleInput10" class="form-label" >Refreshment Rate</label >
                <select  class="form-control" name="refreshment_rate">
              <option value="">Choose The Refreshment Rate ..</option>
                <?php if(count($refreshment_rate)):?>
                <?php foreach($refreshment_rate as $row):?>
                <option value=<?php echo $row['rate_value'] ?> <?php if($row['rate_value'] === $data['refreshment_rate']) echo "selected" ?> > 
                <?php echo $row['rate_value']?></option>
                <?php endforeach;?>
                <?php endif;?>               
              </select>
              </div>
            </div>
          </div>
        </div>

        <hr class="my-5" />

        <!-- Password section -->
        <div class="row gx-xl-5">
          <div class="col-md-4">
            <h5>Taxi Details</h5>
            <p class="text-muted"></p>
          </div>

          <div class="col-md-8">
            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="exampleInput11" class="form-label">Taxi In Town </label>
                  <input type="text" name="taxi_in_town" class="form-control" value="<?=$data['taxi_in_town']?>" placeholder="">
                    <small> <?php echo form_error('taxi_in_town','<div class="text-danger">','</div>');?> </small>
                </div>
              </div>

              <div class="col-md-6">
                <div class="mb-3">
                  <label for="exampleInput12" class="form-label"> Taxi In Town Rate </label>
                    <select  class="form-control" name="taxi_in_rate">
                <option value="">Choose The Taxi In Town Rate ..</option>
                  <?php if(count($taxi_in_rate)):?>
                  <?php foreach($taxi_in_rate as $row):?>
                  <option value=<?php echo $row['rate_value'] ?> <?php if($row['rate_value'] === $data['taxi_in_rate']) echo "selected" ?> > 
                  <?php echo $row['rate_value']?></option>
                  <?php endforeach;?>
                  <?php endif;?>               
                </select>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="exampleInput11" class="form-label">Taxi Out Town</label >
                  <input type="text" name="taxi_out_town" class="form-control" value="<?=$data['taxi_out_town']?>" placeholder="">
                    <small> <?php echo form_error('taxi_out_town','<div class="text-danger">','</div>');?> </small>
                </div>
              </div>

              <div class="col-md-6">
                <div class="mb-3">
                  <label for="exampleInput12" class="form-label">Taxi Out Town Rate</label >
                  <select  class="form-control" name="taxi_out_rate">
                <option value="">Choose The Taxi Out Town Rat..</option>
                  <?php if(count($taxi_out_rate)):?>
                  <?php foreach($taxi_out_rate as $row):?>
                  <option value=<?php echo $row['rate_value'] ?> <?php if($row['rate_value'] === $data['taxi_out_rate']) echo "selected" ?> > 
                  <?php echo $row['rate_value']?></option>
                  <?php endforeach;?>
                  <?php endif;?>               
                </select>
                </div>
              </div>
            </div>
          </div>
        </div>

        <br>
        <hr>

        <div class="mb-3">
                  <label for="exampleInput12" class="form-label">Insertor Remarks</label>
                  <input type="text" name="certifier_remarks" class="form-control" value="<?=$data['certifier_remarks']?>" placeholder="">
                    <small> <?php echo form_error('certifier_remarks','<div class="text-danger">','</div>');?> </small>
                </div>
      </div>

      <!-- Card footer -->
      <div class="card-footer text-end py-4 px-5 bg-light border-0">
        <button class="btn btn-link btn-rounded" data-ripple-color="primary">Cancel</button>
     <input type="submit" class="btn btn-primary btn block"></input>
          
        </button>
      </div>
    </form>
  </div>
</div>

