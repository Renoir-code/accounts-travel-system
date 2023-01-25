<?php include("inc/header.php"); ?>
<br>
<br>
<?php // testarray($upkeep); ?>

<div class="error_holder"><?=validation_errors()?></div>
<?php if($msg = $this->session->flashdata('message')):?>
        <div class="row ">
            <div class ="col-md-6">
                <div class="alert alert-dismissable alert-danger">
                     <?php echo $msg; ?>    
                </div>
            </div>       
        </div>
    <?php endif; ?>


    <?php echo form_open('staff/staff_submit') ?>
    <br>

<div class="container mt-5">
  <div class="card">
    <form>
      <!-- Card header -->
      <div class="card-header">
        <h4 class="fw-bold">Edit Officer Details</h4>
      </div>

      <!-- Card body -->
      <div class="card-body">
      <div class="row">
      <h5 style= "text-align :center"> <b> Personal Details</b></h5>
          <div class="col-md-6">
            <div class="mb-3">
              <label for="exampleInput4" class="form-label">First Name </label>
              <input type="text" class="form-control" name="firstname" value="<?php echo set_value('firstname') ?>" placeholder="">
            </div>
          </div>

          <div class="col-md-6">
            <label for="exampleInput5" class="form-label">Last Name</label>
            <input type="text" class="form-control" name="lastname" value="<?php echo set_value('lastname') ?>" placeholder="">  
          </div>
        </div>


        <div class="row">
          <div class="col-md-6">
            <div class="mb-3">
              <label for="exampleInput4" class="form-label">Tax Registration Number</label>
              <input type="text" class="form-control" name="trn" value="<?php echo set_value('trn') ?>" placeholder="">
            </div>
          </div>

          <hr>  <h5 style= "text-align :center"> <b> Officer Details</b></h5>
        <br>

          <div class="col-md-6">
            <label for="exampleInput5" class="form-label">State the Officer Post</label>
            <input type="text" class="form-control" name="post_title" value="<?php echo set_value('post_title') ?>" placeholder=""> 
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="mb-3">
              <label for="exampleInput4" class="form-label"> Choose the Location of Officer</label>
              <select  class="form-control" name="location_id">
                       <option value="0"  > </option>
                       <option value="1" <?php if(isset($_POST['location_id']) && $_POST['location_id']==1) echo ' selected';?> >Court Administration Division </option>
                       <option value="2" <?php if(isset($_POST['location_id']) && $_POST['location_id']==2) echo ' selected';?> >Supreme Court </option>
                       <option value="3" <?php if(isset($_POST['location_id']) && $_POST['location_id']==3) echo ' selected';?> >Parish Court </option>
                       <option value="4" <?php if(isset($_POST['location_id']) && $_POST['location_id']==4) echo ' selected';?> >Court of Appeal </option>
                    </select>
            </div>
          </div>

          <div class="col-md-6">
            <label for="exampleInput5" class="form-label">Choose the Type of Officer</label>
            <select  class="form-control" name="officer_id" id = "officer_id" onchange="val()">
                    <option value=""> </option>
                    <option value="1" <?php if(isset($_POST['officer_id']) && $_POST['officer_id']==1) echo ' selected';?> >Travelling Officer </option>
                    <option value="2" <?php if(isset($_POST['officer_id']) && $_POST['officer_id']==2) echo ' selected';?> >Casual Officer </option>
                    </select> 
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="mb-3">
            <label for="" class="form-label" id = "upkeep_id_label"> Type of Upkeep </label>
              <select  class="form-control" name="upkeep_id" id="upkeep_id">
                    <option value="55"> </option>
                    <option value="1" <?php if(isset($_POST['upkeep_id']) && $_POST['upkeep_id']==1) echo ' selected';?> >Fixed Upkeep Allowance </option>
                    <option value="2" <?php if(isset($_POST['upkeep_id']) && $_POST['upkeep_id']==2) echo ' selected';?> >Fixed Walkfoot Allowance </option>
                    <option value="3" <?php if(isset($_POST['upkeep_id']) && $_POST['upkeep_id']==3) echo ' selected';?> >Judges(Partially Owned) </option>
                    <option value="4" <?php if(isset($_POST['upkeep_id']) && $_POST['upkeep_id']==4) echo ' selected';?> >(Judges) Other Partially Owned Vehicle</option>
                    <option value="5" <?php if(isset($_POST['upkeep_id']) && $_POST['upkeep_id']==5) echo ' selected';?> >Commuted Allowance</option>
                    <option value="6" <?php if(isset($_POST['upkeep_id']) && $_POST['upkeep_id']==6) echo ' selected';?> >Commuted Walkfoot Allowance </option>
                    <option value="7" <?php if(isset($_POST['upkeep_id']) && $_POST['upkeep_id']==7) echo ' selected';?> >Full Allowance </option>
                    <option value="8" <?php if(isset($_POST['upkeep_id']) && $_POST['upkeep_id']==8) echo ' selected';?> >Walkfoot Allowance </option>                    
             </select>
            <input type="hidden" class="form-control-lg" name="upkeep_id" value="55" disabled id="hidden_input">
            </div>
          </div>

          <hr>  <h5 style= "text-align :center"> <b> Vehicle Details</b></h5>
        <br>

         
        </div>


        <div class="row">
          <div class="col-md-6">
            <div class="mb-3">
            <label for="" class="form-label" id = "upkeep_id_label"> Vehicle Make</label>
            <input type="text" class="form-control" name="vehicle_make" value="<?php echo set_value('vehicle_make') ?>"  placeholder="">
            </div>
          </div>

          <div class="col-md-6">
            <label for="exampleInput5" class="form-label">Vehicle Chasis Number</label>
            <input type="text" class="form-control" name="vehicle_chasisnum" value="<?php echo set_value('vehicle_chasisnum') ?>"  placeholder="">
          </div>
        </div>

        <div class="row">
        <div class="col-md-6">
            <label for="exampleInput5" class="form-label">Vehicle Model</label>
            <input type="text" class="form-control" name="vehicle_model" value="<?php echo set_value('vehicle_model') ?>" placeholder=""> 
          </div>

          
        <div class="col-md-6">
            <label for="exampleInput5" class="form-label">Vehicle Engine Number</label>
            <input type="text" class="form-control" name="vehicle_engine_num"  value="<?php echo set_value('vehicle_engine_num') ?>" placeholder="">
          </div>
        </div>


        </div>


 
      </div>

      <?php echo form_close(); ?>

      <!-- Card footer -->
      <div class="card-footer">
        <button class="btn btn-danger">Cancel</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
</div>



<script type="text/javascript">
    if( document.getElementById("officer_id").value == 2)
    {
        document.getElementById("hidden_input").disabled = false;  // enable hidden input ( submit with 55)
        document.getElementById("upkeep_id").disabled = true;  // disable upkeep options
    }
        function val() {  // if travelling officer selected enable upkeep options if Casual officer selected disable upkeep options
  
        d = document.getElementById("officer_id").value;
        if (d==2){
            /* $select = document.querySelector('#upkeep_id');
            $select.value = '55'
            document.getElementById("upkeep_id").style.display = "none";
            document.getElementById("upkeep_id_label").style.display = "none"; */
            document.getElementById("upkeep_id").disabled = true;  
            document.getElementById("hidden_input").disabled = false;  
        }
        else if(d!=2){
            
            /*document.getElementById("upkeep_id").style.display = "inline-block";
            document.getElementById("upkeep_id_label").style.display = "inline-block"; */
            document.getElementById("upkeep_id").disabled = false;
            document.getElementById("hidden_input").disabled = true;  

        }

    
} 
</script>


<?php include("inc/footer.php"); ?>