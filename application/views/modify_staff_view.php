



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

    <?php echo anchor ("staff/change/{$data['staff_id']}" , "Click Here to Insert a Change", ['class'=> 'btn btn-success btn-lg text-right ']); ?>
    <br>


    <?php echo form_open("staff/update_staff_records/{$data['staff_id']}") ?>

<div class="container mt-5">
  <div class="card">
    <form>
      <!-- Card header -->
      <div class="card-header">
        <h4 class="fw-bold">Edit the Staff Member Details</h4>
        <?php //testarray($changes);
        if (isset($changes) && count($changes) > 0 ){
        //
        if(isset($data['firstname']))
          echo $data['firstname'] .' '. $data['lastname'] .' is currenly acting as a '.$changes['post_change'];
        }

        ?>
      </div>

      <!-- Card body -->
      <div class="card-body">
      <div class="row">
      <h5 style= "text-align :center"> <b> Edit Staff Details</b></h5>
          <div class="col-md-6">
            <div class="mb-3">
              <label for="exampleInput4" class="form-label"><b>First Name</b> </label>
              <input type="text" class="form-control" name="firstname" value="<?php if(isset($_POST['firstname'])) {echo $_POST['firstname'];}elseif (isset($data['firstname'])){echo $data['firstname'];}?>" placeholder="">
            </div>
          </div> 

          <div class="col-md-6">
            <label for="exampleInput5" class="form-label"><b>Last Name</b></label>
            <input type="text" class="form-control" name="lastname" value="<?php if(isset($_POST['lastname'])) {echo $_POST['lastname'];}elseif (isset($data['lastname'])){echo $data['lastname'];}?>" placeholder="">  
          </div>

          <div class="col-md-6">
            <div class="mb-3">
              <label for="exampleInput4" class="form-label"> <b>Tax Registration Number </b></label>
              <input type="text" class="form-control" name="trn" value="<?php if(isset($_POST['trn'])) {echo $_POST['trn'];}elseif (isset($data['trn'])){echo $data['trn'];}?>" placeholder="">
            </div>
          </div>

        </div>

        

        <div class="row">
          
          <hr>  <h5 style= "text-align :center"> <b> Officer Details</b></h5>
        <br>

          <div class="col-md-6">
            <label for="exampleInput5" class="form-label"><b>Post Title</b></label>
            <input type="text" class="form-control" name="post_title" value="<?php if(isset($_POST['post_title'])) {echo $_POST['post_title'];}elseif (isset($data['post_title'])){echo $data['post_title'];}?>" placeholder="">    
          </div>

          <div class="col-md-6">
            <div class="mb-3">
              <label for="exampleInput4" class="form-label"> <b>Choose the Officer Location </b></label>
              <select  class="form-control" name="location_id">
                       <option value="0"  >Choose Location..</option>
                       <option value="1" <?php if(isset($_POST['location_id']) && $_POST['location_id']==1) {echo ' selected';} elseif($data['location_id']==1)   {echo ' selected';}?> >Court Administration Division  </option>
                       <option value="2" <?php if(isset($_POST['location_id']) && $_POST['location_id']==2) {echo ' selected';} elseif($data['location_id']==2)   {echo ' selected';}?> >Supreme Court </option>
                       <option value="3" <?php if(isset($_POST['location_id']) && $_POST['location_id']==3) {echo ' selected';} elseif($data['location_id']==3)   {echo ' selected';}?> >Parish Court </option>
                       <option value="4" <?php if(isset($_POST['location_id']) && $_POST['location_id']==4) {echo ' selected';} elseif($data['location_id']==4)   {echo ' selected';}?> >Court of Appeal </option>

                      

                    </select>
            </div>
          </div>
        </div>

        <div class="row">
         

          <div class="col-md-6">
            <label for="exampleInput5" class="form-label"><b>Choose the Officer Type</b></label>
            <select  class="form-control" name="officer_id" id="officer_id" onchange="val()">
                    <option value="">Choose Type of Officer..</option>  <!-- if submit is clicked and an eror is there save what was typed if not return whats in the database -->
                    <option value="1" <?php if(isset($_POST['officer_id'])) { if($_POST['officer_id']==1) {echo ' selected';}} elseif($data['officer_id']==1)  {echo ' selected';}?> >Travelling Officer </option>
                    <option value="2" <?php if(isset($_POST['officer_id']))  { if($_POST['officer_id']==2) {echo ' selected';}} elseif($data['officer_id']==2)  {echo ' Selected';}?> >Casual Officer </option>
                    </select>

          </div>

          <div class="col-md-6">
            <div class="mb-3">
            <label for="" class="form-label" id = "upkeep_id_label"> <b>Choose the Type of Upkeep </b> </label>
            <select  class="form-control" name="upkeep_id" id="upkeep_id">
                    <option value="">Choose The Type of Upkeep Received ..</option>
                    <option value="1" <?php if(isset($_POST['upkeep_id']) && $_POST['upkeep_id']==1) {echo ' selected';} elseif($data['upkeep_id']==1)   {echo ' selected';}?> >Fixed Upkeep Allowance </option>
                    <option value="2" <?php if(isset($_POST['upkeep_id']) && $_POST['upkeep_id']==2) {echo ' selected';} elseif($data['upkeep_id']==2)   {echo ' selected';}?> >Fixed Walkfoot Allowance </option>
                    <option value="3" <?php if(isset($_POST['upkeep_id']) && $_POST['upkeep_id']==3) {echo ' selected';} elseif($data['upkeep_id']==3)   {echo ' selected';}?> >Judges(Partially Owned) </option>
                    <option value="4" <?php if(isset($_POST['upkeep_id']) && $_POST['upkeep_id']==4) {echo ' selected';} elseif($data['upkeep_id']==4)   {echo ' selected';}?> >(Judges) Other Partially Owned Vehicle </option>
                    <option value="5" <?php if(isset($_POST['upkeep_id']) && $_POST['upkeep_id']==5) {echo ' selected';} elseif($data['upkeep_id']==5)   {echo ' selected';}?> >Commuted Allowance </option>
                    <option value="6" <?php if(isset($_POST['upkeep_id']) && $_POST['upkeep_id']==6) {echo ' selected';} elseif($data['upkeep_id']==6)   {echo ' selected';}?> >Commuted Walkfoot Allowance </option>
                    <option value="7" <?php if(isset($_POST['upkeep_id']) && $_POST['upkeep_id']==7) {echo ' selected';} elseif($data['upkeep_id']==7)   {echo ' selected';}?> >Full Allowance </option>
                    <option value="8" <?php if(isset($_POST['upkeep_id']) && $_POST['upkeep_id']==8) {echo ' selected';} elseif($data['upkeep_id']==8)   {echo ' selected';}?> >Walkfoot Allowance </option>
					</select>
            <input type="hidden" class="form-control" name="upkeep_id" value="55" disabled id="hidden_input">
            </div>
          </div>
        </div>

        <div class="row">
          

          <hr>  <h5 style= "text-align :center"> <b> Vehicle Details</b></h5>
        <br>



        <div class="row">
          <div class="col-md-6">
            <div class="mb-3">
            <label for="" class="form-label" id = "upkeep_id_label"> <b>Vehicle Make </b></label>
            <input type="text" class="form-control" name="vehicle_make" value="<?php if(isset($_POST['vehicle_make'])) {echo $_POST['vehicle_make'];}elseif (isset($data['vehicle_make'])){echo $data['vehicle_make'];}?>"  placeholder="">
            </div>
          </div>

          <div class="col-md-6">
            <label for="exampleInput5" class="form-label"><b>Vehicle Chasis Number</b></label>
            <input type="text" class="form-control" name="vehicle_chasisnum" value="<?php if(isset($_POST['vehicle_chasisnum'])) {echo $_POST['vehicle_chasisnum'];}elseif (isset($data['vehicle_chasisnum'])){echo $data['vehicle_chasisnum'];}?>"  placeholder="">
          </div>
        </div>

        <div class="row">
        <div class="col-md-6">
            <label for="exampleInput5" class="form-label"><b>Vehicle Model</b></label>
           <input type="text" class="form-control" name="vehicle_model" value="<?php if(isset($_POST['vehicle_model'])) {echo $_POST['vehicle_model'];}elseif (isset($data['vehicle_model'])){echo $data['vehicle_model'];}?>" placeholder="">    
          </div>

          
        <div class="col-md-6">
            <label for="exampleInput5" class="form-label"><b>Vehicle Engine Number</b></label>
            <input type="text" class="form-control" name="vehicle_engine_num"  value="<?php if(isset($_POST['vehicle_engine_num'])) {echo $_POST['vehicle_engine_num'];}elseif (isset($data['vehicle_engine_num'])){echo $data['vehicle_engine_num'];}?>" placeholder="">
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