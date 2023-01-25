


<?php include_once('inc/header.php') ?>

      <?php echo form_open('staff/insert_rate_submit')?>

<div class="container mt-5">
  <div class="card">
    <form>
      <!-- Card header -->
      <div class="card-header">
        <h4 class="fw-bold">Add A New Rate </h4>
      </div>

      <!-- Card body -->
      <div class="card-body">
      <div class="row">
          <div class="col-md-6">
            <div class="mb-3">
              <label for="exampleInput4" class="form-label">Rate Options </label>
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

          <div class="col-md-6">
            <label for="exampleInput5" class="form-label">Add Rate Value</label>
            <input type="text" name = "rate_value"  class="form-control" value="<?php // set_value('rate_value') ?>" placeholder="">
            <small> <?php echo form_error('rate_value','<div class="text-danger">','</div>');?> </small>
          </div>
        </div>

        <div class="card-footer">
        <button class="btn btn-danger">Cancel</button>
        <button type="submit" class="btn  btn-success ">Add new Rate </button>
      </div>
    </form>
  </div>


<br>
<br>
