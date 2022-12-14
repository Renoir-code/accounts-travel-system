


<?php include_once('inc/header.php') ?>

<?php echo form_open('staff/insert_rate_submit')?>
<br>

<div class="row">
    <div class="col-md-4">
            <div class="form-group ">
             <label for=""> Role</label>
                <div class="col-md input-group mb-6">
                   <select class="form-select" name="rate_id" >
                       <option value="0"  >Choose an option</option>
                       <option value="1" <?php if(isset($_POST['rate_id']) && $_POST['rate_id']==1) echo ' selected';?> >Mileage_Rate </option>
                       <option value="2" <?php if(isset($_POST['rate_id']) && $_POST['rate_id']==2) echo ' selected';?> >Passenger RAte </option>
                       <option value="3" <?php if(isset($_POST['rate_id']) && $_POST['rate_id']==3) echo ' selected';?> >Subsistence Rate </option>
                       <option value="4" <?php if(isset($_POST['rate_id']) && $_POST['rate_id']==4) echo ' selected';?> >Supper Rate</option>
                       <option value="5" <?php if(isset($_POST['rate_id']) && $_POST['rate_id']==5) echo ' selected';?> >Refreshment Rate/option>
                       <option value="6" <?php if(isset($_POST['rate_id']) && $_POST['rate_id']==6) echo ' selected';?> >Taxi Out Town Rate/option>
                       <option value="7" <?php if(isset($_POST['rate_id']) && $_POST['rate_id']==7) echo ' selected';?> >Taxi In Town Rate/option>
                    </select>
                </div>
               
            </div>
    </div>
    <small> <?php echo form_error('rate_id','<div class="text-danger">','</div>');?>  </small>   
</div>

  <div class="form-group ">
    <label class="form-label">Enter the Value of the Rate </label>
    <div class="col-sm-10">
      <input type="text" name = "rate_value"  class="form-control-lg" value="<?php // set_value('rate_value') ?>" placeholder="">
    </div>
  </div>
  <small> <?php echo form_error('rate_value','<div class="text-danger">','</div>');?> </small>

  <button type="submit" class="btn  btn-success ">Add new Rate </button>