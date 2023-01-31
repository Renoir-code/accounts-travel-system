
    <?php include_once('inc/header.php') ?>
    <br>

    <?php // testarray($mileage_rate); ?>

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
<div class="row">

  <div class="container my-5">
  <div class="card">
    <form>
      <!-- Card header -->
      <div class="card-header py-4 px-5 bg-light border-0">
        <h4 class="mb-0 fw-bold">Enter the Staff Payment Details :</h4>
      </div>

      <!-- Card body -->
      <div class="card-body px-5">
        <!-- Account section -->
        <div class="row gx-xl-5">
          <div class="col-md-4">
            <h5>Staff Details</h5>
            <p class="text-muted"> The Firstname and the Last name of the staff member is shown here by default. </p>
          </div>

          <div class="col-md-8">

          <div class="mb-3">
              <label for="exampleInput1" class="form-label">  </label >               
              <input type="hidden" readonly  name='staff_id' id="" class="form-control-lg" value = "<?php echo $s ?>" placeholder="<?php echo $s; // echo $_GET['varname'];  ?>">
            </div>


            <div class="mb-3">
              <label for="exampleInput1" class="form-label"> First name </label >               
              <input type="text" readonly name='firstname' class="form-control" value = "<?php echo $x ?>" placeholder="<?php echo $x; ?>" id="exampleInput1" style="max-width: 500px;"/>
            </div>

            <div class="mb-3">
              <label for="exampleInput1" class="form-label">Last name</label>
              <input type="text" readonly name='lastname' id="" class="form-control" value = "<?php echo $l ?>" placeholder="<?php echo $l;  ?>"style="max-width: 500px;"/>
            </div>
          </div>
        </div>

        <hr class="my-5" />

        <!-- Mileage Section -->
        <div class="row gx-xl-5">
          <div class="col-md-4">
            <h5>Date Details </h5>
            <p class="text-muted"> </p>
          </div>

          <div class="col-md-8">
            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="exampleInput4" class="form-label">Voucher Number</label>
                  <input type="text" name= "voucher_number" class="form-control" value="<?php echo set_value('voucher_number') ?>"  style="max-width: 500px;"/>
                  <small> <?php echo form_error('voucher_number','<div class="text-danger">','</div>');?> </small>
                </div>
               

                <div class="mb-3">
                  <label for="exampleInput4" class="form-label">Year Travelled</label>
                  <select  class="form-control" name="year_travelled" style="max-width: 500px;"/>
                  <option value=""> ..</option>
                  <option value="2020" <?php if(isset($_POST['year_travelled']) && $_POST['year_travelled']=='2020') echo ' selected';?> >2020 </option>
                  <option value="2021" <?php if(isset($_POST['year_travelled']) && $_POST['year_travelled']=='2021') echo ' selected';?> >2021 </option>
                  <option value="2022" <?php if(isset($_POST['year_travelled']) && $_POST['year_travelled']=='2022') echo ' selected';?> >2022 </option>
                  <option value="2023" <?php if(isset($_POST['year_travelled']) && $_POST['year_travelled']=='2023') echo ' selected';?> >2023 </option>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="exampleInput4" class="form-label">Month Travelled</label>
                  <select  class="form-control" name="month_travelled">
                  <option value="0"  >Choose  The Month Travelled..</option>
                  <option value="1" <?php if(isset($_POST['month_travelled']) && $_POST['month_travelled']==1) echo ' selected';?> >January </option>
                  <option value="2" <?php if(isset($_POST['month_travelled']) && $_POST['month_travelled']==2) echo ' selected';?> >February </option>
                  <option value="3" <?php if(isset($_POST['month_travelled']) && $_POST['month_travelled']==3) echo ' selected';?> >March </option>
                  <option value="4" <?php if(isset($_POST['month_travelled']) && $_POST['month_travelled']==4) echo ' selected';?> >April </option>
                  <option value="5" <?php if(isset($_POST['month_travelled']) && $_POST['month_travelled']==5) echo ' selected';?> >May </option>
                  <option value="6" <?php if(isset($_POST['month_travelled']) && $_POST['month_travelled']==6) echo ' selected';?> >June </option>
                  <option value="7" <?php if(isset($_POST['month_travelled']) && $_POST['month_travelled']==7) echo ' selected';?> >July</option>
                  <option value="8" <?php if(isset($_POST['month_travelled']) && $_POST['month_travelled']==8) echo ' selected';?> >August </option>
                  <option value="9" <?php if(isset($_POST['month_travelled']) && $_POST['month_travelled']==9) echo ' selected';?> >September </option>
                  <option value="10" <?php if(isset($_POST['month_travelled']) && $_POST['month_travelled']==10) echo ' selected';?> >October </option>
                  <option value="11" <?php if(isset($_POST['month_travelled']) && $_POST['month_travelled']==11) echo ' selected';?> >November </option>
                  <option value="12" <?php if(isset($_POST['month_travelled']) && $_POST['month_travelled']==12) echo ' selected';?> >December </option>
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
                  <input type="text" name = "mileage_km" class="form-control" value="<?php echo set_value('mileage_km') ?>" placeholder="">
                  <small> <?php echo form_error('mileage_km','<div class="text-danger">','</div>');?> </small>
                </div>
              </div>

              <div class="col-md-6">
                <label for="exampleInput8" class="form-label">Mileage Rate </label>
                <select  class="form-control" name="mileage_rate">
                  <option value="">Choose The Mileage Rate ..</option>
                  <?php if(count($mileage_rate)):?>
                  <?php foreach($mileage_rate as $row):?>
                  <option value=<?php echo $row['rate_value']; if(isset($_POST['mileage_rate']) && $_POST['mileage_rate']==$row['rate_value']) echo ' selected';?>> <?php echo $row['rate_value'] ?></option>
                  <?php endforeach;?> 
                  <?php endif?>       
              </select>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="exampleInput9" class="form-label" >Passenger Details </label>
                    <input type="text" name = "passenger_km"  class="form-control" value="<?php echo set_value('passenger_km') ?>" placeholder="">
                    <small> <?php echo form_error('passenger_km','<div class="text-danger">','</div>');?> </small>
                </div>
              </div>

              <div class="col-md-6">
                <label for="exampleInput10" class="form-label" >Passenger Rate</label>
                  <select  class="form-control" name="passenger_rate">
                   <option value="">Choose The Passenger Rate ..</option>
                    <?php if(count($passenger_rate)):?>
                    <?php foreach($passenger_rate as $row):?>
                    <option value=<?php echo $row['rate_value']; if(isset($_POST['passenger_rate']) && $_POST['passenger_rate']==$row['rate_value']) echo ' selected';?>> <?php echo $row['rate_value'] ?></option>
                    <?php endforeach;?>  
                    <?php endif?>      
                </select>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="exampleInput9" class="form-label">Subsistence</label>
                    <input type="text" name="subsistence_km" class="form-control" value="<?php echo set_value('subsistence_km') ?>" placeholder="">
                    <small> <?php echo form_error('subsistence_km','<div class="text-danger">','</div>');?> </small>
                </div>
              </div>

              <div class="col-md-6">
                <label for="exampleInput10" class="form-label">Subsistence Rate</label>
                  <select  class="form-control" name="subsistence_rate">
                    <option value="">Choose The Subsistence Rate ..</option>
                    <?php if(count($subsistence_rate)):?>
                    <?php foreach($subsistence_rate as $row):?>
                    <option value=<?php echo $row['rate_value']; if(isset($_POST['subsistence_rate']) && $_POST['subsistence_rate']==$row['rate_value']) echo ' selected';?>> <?php echo $row['rate_value'] ?></option>
                    <?php endforeach;?>   
                    <?php endif?>    
                  </select>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="exampleInput9" class="form-label">Toll Amount</label>
                    <input type="text" name = "toll_amt" class="form-control" value="<?php echo set_value('toll_amt') ?>" placeholder="">
                    <small> <?php echo form_error('toll_amt','<div class="text-danger">','</div>');?> </small>
                </div>
              </div>

              <div class="col-md-6">
                <label for="exampleInput10" class="form-label" >Actual Expense</label >
                  <input type="text" name="actual_expense" class="form-control" value="<?php echo set_value('actual_expense') ?>" placeholder="">
                  <small> <?php echo form_error('actual_expense','<div class="text-danger">','</div>');?> </small>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="exampleInput9" class="form-label">Supper (days)</label>
                    <input type="text" name = "supper_days" class="form-control" value="<?php echo set_value('supper_days') ?>" placeholder="">
                    <small> <?php echo form_error('supper_days','<div class="text-danger">','</div>');?> </small>
                </div>
              </div>

              <div class="col-md-6">
                <label for="exampleInput10" class="form-label" >Supper Rate</label >
                <select  class="form-control" name="supper_rate">
                    <option value="">Choose The Supper Rate ..</option>
                  <?php if(count($supper_rate)):?>
                  <?php foreach($supper_rate as $row):?>
                    <option value=<?php echo $row['rate_value']; if(isset($_POST['supper_rate']) && $_POST['supper_rate']==$row['rate_value']) echo ' selected';?>> <?php echo $row['rate_value'] ?></option>
                  <?php endforeach;?>      
                  <?php endif?>  
              </select>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="exampleInput9" class="form-label">Refreshment</label>
                    <input type="text" name = "refreshment_days" class="form-control" value="<?php echo set_value('refreshment_days') ?>" placeholder="">
                    <small> <?php echo form_error('refreshment_days','<div class="text-danger">','</div>');?> </small>
                </div>
              </div>

              <div class="col-md-6">
                <label for="exampleInput10" class="form-label" >Refreshment Rate</label >
                <select  class="form-control" name="refreshment_rate">
                  <option value="">Choose The Refreshment Rate ..</option>
                  <?php if(count($refreshment_rate)):?>
                  <?php foreach($refreshment_rate as $row):?>
                    <option value=<?php echo $row['rate_value']; if(isset($_POST['refreshment_rate']) && $_POST['refreshment_rate']==$row['rate_value']) echo ' selected';?>> <?php echo $row['rate_value'] ?></option>
                  <?php endforeach;?>      
                  <?php endif?>  
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
                    <input type="text" name="taxi_in_town" class="form-control" value="<?php echo set_value('taxi_in_town') ?>" placeholder="">
                    <small> <?php echo form_error('taxi_in_town','<div class="text-danger">','</div>');?> </small>
                </div>
              </div>

              <div class="col-md-6">
                <div class="mb-3">
                  <label for="exampleInput12" class="form-label"
                         >Taxi In Town Rate</label
                    >
                    <select  class="form-control" name="taxi_in_rate">
                    <option value="">Choose The Taxi In Town Rate..</option>
                    <?php if(count($taxi_in_rate)):?>
                    <?php foreach($taxi_in_rate as $row):?>
                      <option value=<?php echo $row['rate_value']; if(isset($_POST['taxi_in_rate']) && $_POST['taxi_in_rate']==$row['rate_value']) echo ' selected';?>> <?php echo $row['rate_value'] ?></option>
                    <?php endforeach;?>   
                    <?php endif?>     
                 </select>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="exampleInput11" class="form-label">Taxi Out Town</label >
                    <input type="text" name="taxi_out_town" class="form-control" value="<?php echo set_value('taxi_out_town') ?>" placeholder="">
                    <small> <?php echo form_error('taxi_out_town','<div class="text-danger">','</div>');?> </small>
                </div>
              </div>

              <div class="col-md-6">
                <div class="mb-3">
                  <label for="exampleInput12" class="form-label">Taxi Out Town Rate</label >
                    <select  class="form-control" name="taxi_out_rate">
                    <option value="">Choose The Taxi Out Town Rate ..</option>
                      <?php if(count($taxi_out_rate)):?>
                      <?php foreach($taxi_out_rate as $row):?>
                        <option value=<?php echo $row['rate_value']; if(isset($_POST['taxi_out_rate']) && $_POST['taxi_out_rate']==$row['rate_value']) echo ' selected';?>> <?php echo $row['rate_value'] ?></option>
                      <?php endforeach;?> 
                      <?php endif?>       
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
                    <input type="text" name="certifier_remarks" class="form-control" value="<?php echo set_value('certifier_remarks') ?>" placeholder="">
                    <small> <?php echo form_error('certifier_remarks','<div class="text-danger">','</div>');?> </small>
                </div>
      </div>

      <!-- Card footer -->
      <div class="card-footer text-end py-4 px-5 bg-light border-0">
        <!--<button class="btn btn-link btn-rounded" data-ripple-color="primary">Cancel</button>-->
     <input type="submit" class="btn btn-primary btn block" value = "Submit"></input>
          
        </button>
      </div>
    </form>
  </div>
</div>


<?php include_once('inc/footer.php') ?>