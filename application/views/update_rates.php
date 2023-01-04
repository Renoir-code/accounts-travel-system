


<?php include_once('inc/header.php') ?>

<?php echo form_open('staff/insert_rate_submit')?>
<br>

<div class="row">
    <div class="col-md-4">
            <div class="form-group ">
             <label for=""> Add a New Rate </label>
                <div class="col-md input-group mb-6">
                   <select class="form-select" name="rate_name" >
                       <option value="0"  >Choose an option</option>
                       <option value="mileage" <?php if(isset($_POST['rate_name']) && $_POST['rate_name']==1) echo ' selected';?> >Mileage_Rate </option>
                       <option value="passenger" <?php if(isset($_POST['rate_name']) && $_POST['rate_name']==2) echo ' selected';?> >Passenger RAte </option>
                       <option value="subsistence" <?php if(isset($_POST['rate_name']) && $_POST['rate_name']==3) echo ' selected';?> >Subsistence Rate </option>
                       <option value="supper" <?php if(isset($_POST['rate_name']) && $_POST['rate_name']==4) echo ' selected';?> >Supper Rate </option>
                       <option value="refreshment" <?php if(isset($_POST['rate_name']) && $_POST['rate_name']==5) echo ' selected';?> >Refreshment Rate </option>
                       <option value="taxi_out_town" <?php if(isset($_POST['rate_name']) && $_POST['rate_name']==6) echo ' selected';?> >Taxi Out Town Rate </option>
                       <option value="taxi_in_town" <?php if(isset($_POST['rate_name']) && $_POST['rate_name']==7) echo ' selected';?> >Taxi In Town Rate </option>
                       
                    </select>
                      
                </div>
               
            </div>
    </div>
    <small> <?php echo form_error('rate_name','<div class="text-danger">','</div>');?>  </small>   
</div>

  <div class="form-group ">
    <label class="form-label">Enter the Value of the Rate </label>
    <div class="col-sm-10">
      <input type="text" name = "rate_value"  class="form-control-lg" value="<?php // set_value('rate_value') ?>" placeholder="">
    </div>
  </div>
  <small> <?php echo form_error('rate_value','<div class="text-danger">','</div>');?> </small>

  <button type="submit" class="btn  btn-success ">Add new Rate </button>