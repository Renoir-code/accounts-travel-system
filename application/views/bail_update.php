<?php include("inc/header.php"); ?>
<br>
<br>
<?php  //testarray($data['date_received']); 


//echo date("Y-m-d", strtotime($data['date_received'])); die(); ?>

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

    <?php //echo anchor ("bail/bail_report" , "Bail Reports", ['class'=> 'btn btn-primary']); ?>


    <?php echo form_open("bail/update_bail_information/{$data['bail_id']}") ?>
    <br>

<div class="container ">
  <div class="card">
    <form>
      <!-- Card header -->
      <div class="card-header">
        <h4 class="fw-bold">Update Bail Record </h4>
      </div>

      <!-- Card body -->
      <div class="card-body">
     <!--  <div class="row"> -->
      <h5 style= "text-align :center"> <b> </b></h5>
          

          <div class="col-md-6">
          <div class="mb-3">
            <label for="exampleInput5" class="form-label"><b>Date_Received</b></label>
            <input type="date" class="form-control" name="date_received" value="<?php if(isset($_POST['date_received'])) {echo $_POST['date_received'];}elseif (isset($data['date_received'])){echo date("Y-m-d", strtotime($data['date_received']));}?>" placeholder="">  
          </div>
          </div>

          <div class="col-md-6">
          <div class="mb-3">
            <label for="exampleInput5" class="form-label"><b> Date Processed</b></label>
            <input type="date" class="form-control" name="date_processed" value="<?php if(isset($_POST['date_processed'])) {echo $_POST['date_processed'];}elseif (isset($data['date_processed'])){echo date("Y-m-d", strtotime($data['date_processed']));}?>" placeholder="">  
          </div>
          </div>

          <div class="col-md-6">
          <div class="mb-3">
            <label for="exampleInput5" class="form-label"><b> First Name</b></label>
            <input type="text" class="form-control" name="first_name" value="<?php if(isset($_POST['first_name'])) {echo $_POST['first_name'];}elseif (isset($data['first_name'])){echo $data['first_name'];}?>" placeholder="">  
          </div>
          </div>

          <div class="col-md-6">
          <div class="mb-3">
            <label for="exampleInput5" class="form-label"><b> Last Name</b></label>
            <input type="text" class="form-control" name="last_name" value="<?php if(isset($_POST['last_name'])) {echo $_POST['last_name'];}elseif (isset($data['last_name'])){echo $data['last_name'];}?>" placeholder="">  
          </div>
          </div>

          <div class="col-md-6">
          <div class="mb-3">
            <label for="exampleInput5" class="form-label"><b> Amount Paid</b></label>
            <input type="text" class="form-control" name="amount_paid" value="<?php if(isset($_POST['amount_paid'])) {echo $_POST['amount_paid'];}elseif (isset($data['amount_paid'])){echo $data['amount_paid'];}?>" placeholder="">  
          </div>
          </div>

          <div class="col-md-6">
          <div class="mb-3">
            <label for="exampleInput5" class="form-label"><b> Tax Registration Number </b></label>
            <input type="text" class="form-control" name="trn" value="<?php if(isset($_POST['trn'])) {echo $_POST['trn'];}elseif (isset($data['trn'])){echo $data['trn'];}?>" placeholder="">  
          </div>
          </div>

          <div class="col-md-6">
            <div class="mb-3">
              <label for="exampleInput4" class="form-label""> <b>Location of the Bail Claim</b></label>
              <select  class="form-control" name="location_id">
              <option value="0"  >Choose Location..</option>
                       <option value="1" <?php if(isset($_POST['location_id']) && $_POST['location_id']==1) {echo ' selected';} elseif($data['location_id']==1)   {echo ' selected';}?> >Court Administration Division  </option>
                       <option value="2" <?php if(isset($_POST['location_id']) && $_POST['location_id']==2) {echo ' selected';} elseif($data['location_id']==2)   {echo ' selected';}?> >Supreme Court </option>
                       <option value="3" <?php if(isset($_POST['location_id']) && $_POST['location_id']==3) {echo ' selected';} elseif($data['location_id']==3)   {echo ' selected';}?> >Parish Court </option>
                       <option value="4" <?php if(isset($_POST['location_id']) && $_POST['location_id']==4) {echo ' selected';} elseif($data['location_id']==4)   {echo ' selected';}?> >Court of Appeal </option>
                    <option value="5" <?php if(isset($_POST['location_id']) && $_POST['location_id']==5) {echo ' selected';} elseif($data['location_id']==5)      {echo ' selected';}?>  >Family Court </option>
                    <option value="6" <?php if(isset($_POST['location_id']) && $_POST['location_id']==6) {echo ' selected';} elseif($data['location_id']==6)      {echo ' selected';}?>  >Traffic Court </option>
                    <option value="7" <?php if(isset($_POST['location_id']) && $_POST['location_id']==7) {echo ' selected';} elseif($data['location_id']==7)      {echo ' selected';}?>  >Special Coroners Court </option>
                    <option value="8" <?php if(isset($_POST['location_id']) && $_POST['location_id']==8) {echo ' selected';} elseif($data['location_id']==8)      {echo ' selected';}?>   >Coroners Court </option>
                    <option value="9" <?php if(isset($_POST['location_id']) && $_POST['location_id']==9) {echo ' selected';} elseif($data['location_id']==9)       {echo ' selected';}?>   >Gun Court </option>
                  <option value="10" <?php if(isset($_POST['location_id']) && $_POST['location_id']==10) {echo ' selected';} elseif($data['location_id']==10)
                        {echo ' selected';}?>   >Revenue Court </option>
                   <option value="11" <?php if(isset($_POST['location_id']) && $_POST['location_id']==11) {echo ' selected';} elseif($data['location_id']==11)      {echo ' selected';}?>   >Manchester Parish Court </option>
                    </select>
            </div>
          </div>

          <div class="col-md-6">
            <div class="mb-3">
              <label for="exampleInput4" class="form-label"><b>Reason for Return </b></label>
              <input type="text" class="form-control" name="reason_returned" value="<?php if(isset($_POST['reason_returned'])) {echo $_POST['reason_returned'];}elseif (isset($data['reason_returned'])){echo $data['reason_returned'];}?>" placeholder="">
            </div>
          </div>
        </div>
              
        <div class="col-md-6">
            <div class="mb-3">
               
            <label for="exampleInput4" class="form-label"><b>Is Return needed ? </b></label>
            <input type="checkbox" id="scales" name="returned" value="yes" <?php if(isset($_POST['returned'])) {echo'checked';}elseif (isset($data['returned'])){echo'checked';}?> />
            <label for="yes">Yes</label>
        </div>

  </div>

      <?php echo form_close(); ?>

      <!-- Card footer -->
      <div class="card-footer">
        <button type="submit" class="btn btn-primary btn-block">Submit</button>
      </div>
    </form>
  </div> 
</div>
</div>



<!-- <script type="text/javascript">
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
</script> -->


<?php include("inc/footer.php"); ?>