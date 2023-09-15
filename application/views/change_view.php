<?php include("inc/header.php"); ?>
<br>
<br>


<div class="error_holder"><?=validation_errors()?></div>
<?php if($msg = $this->session->flashdata('message')):?>
        <div class="row ">
            <div class ="col-md-6">
                <divv class="alert alert-dismissable alert-danger">
                     <?php echo $msg; ?>    
                    </divv
            </div>       
        </div>
    <?php endif; ?>

<?php
unset($_SESSION['message']);
//testarray($data);
?>

        <?php echo form_open("staff/change/{$data['staff_id']}") ?>

<div class="container mt-5">
  <div class="card">
    <form>
      <!-- Card header -->
      <div class="card-header">
        <h4 class="fw-bold">Enter Any Changes to the Staff Member  </h4>
      </div>

      <!-- Card body -->
      <div class="card-body">
      <div class="row">
      <h5 style= "text-align :center"> <b> Personal Details</b></h5>
          <div class="col-md-6">
            <div class="mb-3">
              <label for="exampleInput4" class="form-label"> <b> First Name</b> </label>
              <input type="text" readonly class="form-control" name="firstname" value="<?php if(isset($_POST['firstname'])) {echo $_POST['firstname'];}elseif (isset($data['firstname'])){echo $data['firstname'];}?>" placeholder="">
            </div>
          </div>

          <div class="col-md-6">
            <label for="exampleInput5" class="form-label"><b>Last Name</b></label>
            <input type="text" class="form-control" name="lastname" value="<?php if(isset($_POST['lastname'])) {echo $_POST['lastname'];}elseif (isset($data['lastname'])){echo $data['lastname'];}?>" placeholder="">  
          </div>
          <div class="col-md-6">
            <div class="mb-3">
            <label for="" class="form-label"> <b>New Post Title </b></label>
            
                <input type="text" class="form-control" name="post_change" value="<?php if (isset($_POST['post_title'])){echo $_POST['post_title'];}elseif(isset($data['post_change'])) {echo $data['post_change'];}elseif(isset($data['post_title'])) {echo $data['post_title'];} ?>" placeholder="">
           
            </div>
          </div>
        </div>


        <div class="row">
         
            <hr> <h5 style= "text-align :center"> <b> Date / Monthly Allotment</b></h5>
            <br>

            <div class="col-md-6">
                <label for="exampleInput5" class="form-label"><b>Date of Change</b></label>
                <input type="date" class="form-control" name="date_of_change" value="<?php if (isset($_POST['dateof_change'])){echo $_POST['dateof_change'];}elseif (isset($changes)){echo substr($changes['dateof_change'],0,10);}//echo set_value('date_of_change') ?>" placeholder="">
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label for="exampleInput4" class="form-label"> <b>End Date</b></label>
                    <input type="date" class="form-control" name="date_of_change_end" value="<?php if (isset($_POST['date_of_change_end'])){echo $_POST['date_of_change_end'];}elseif (isset($changes)){echo substr($changes['dateof_change_end'],0,10);} ?>" placeholder="">
                </div>
            </div>

           
         
         <div class="col-md-6">
           <label for="exampleInput5" class="form-label"><b>Type of Upkeep Received</b></label>
           <select  class="form-control" name="upkeepchange_type" id="upkeepchange_type">
                   <option value="">Choose The Type of Upkeep Received ..</option>
                   <option value="1" <?php if(isset($_POST['upkeepchange_type']) && $_POST['upkeepchange_type']==1) {echo ' selected';} elseif($data['upkeep_id']==1)   {echo ' selected';}?> >Fixed Upkeep Allowance </option>
                   <option value="2" <?php if(isset($_POST['upkeepchange_type']) && $_POST['upkeepchange_type']==2) {echo ' selected';} elseif($data['upkeep_id']==2)   {echo ' selected';}?> >Fixed Walkfoot Allowance </option>
                   <option value="3" <?php if(isset($_POST['upkeepchange_type']) && $_POST['upkeepchange_type']==3) {echo ' selected';} elseif($data['upkeep_id']==3)   {echo ' selected';}?> >Judges(Partially Owned) </option>
                   <option value="4" <?php if(isset($_POST['upkeepchange_type']) && $_POST['upkeepchange_type']==4) {echo ' selected';} elseif($data['upkeep_id']==4)   {echo ' selected';}?> >(Judges) Other Partially Owned Vehicle </option>
                   <option value="5" <?php if(isset($_POST['upkeepchange_type']) && $_POST['upkeepchange_type']==5) {echo ' selected';} elseif($data['upkeep_id']==5)   {echo ' selected';}?> >Commuted Allowance </option>
                   <option value="6" <?php if(isset($_POST['upkeepchange_type']) && $_POST['upkeepchange_type']==6) {echo ' selected';} elseif($data['upkeep_id']==6)   {echo ' selected';}?> >Commuted Walkfoot Allowance </option>
                   <option value="7" <?php if(isset($_POST['upkeepchange_type']) && $_POST['upkeepchange_type']==7) {echo ' selected';} elseif($data['upkeep_id']==7)   {echo ' selected';}?> >Full Allowance </option>
                   <option value="8" <?php if(isset($_POST['upkeepchange_type']) && $_POST['upkeepchange_type']==8) {echo ' selected';} elseif($data['upkeep_id']==8)   {echo ' selected';}?> >Walkfoot Allowance </option>
                   </select>
         </div>

         <div class="col-md-6">
           <div class="mb-3">
           <label for="" class="form-label" id = "upkeep_id_label"> <b>Monthly Allotment </b> </label>
           <input type="text" class="form-control" name="monthly_allotment" value="<?php if(isset($_POST['monthly_allotment'])) {echo $_POST['monthly_allotment'];}elseif (isset($changes)){echo $changes['monthly_allotment'];}?>" placeholder="">
           <input type="hidden" class="form-control" name="upkeep_id" value="55" disabled id="hidden_input">
           </div>
         </div>
      
          </div>


          <hr>  <h5 style= "text-align :center"> <b> Arrears to be Recovered </b></h5>
 
        <div class="row">
          <div class="col-md-6">
            <div class="mb-3">
            <label for="" class="form-label" id = "upkeep_id_label"> <b>Arrears</b></label>
            <input type="text" class="form-control" name="arrears" value="<?php if(isset($_POST['arrears'])) {echo $_POST['arrears'];}elseif (isset($changes)){echo $changes['arrears'];}?>" placeholder="">
            </div>
          </div>

          <div class="col-md-6">
            <label for="exampleInput5" class="form-label"><b>Travel Recovery</b></label>
            <input type="text" class="form-control" name="travel_recovery" value="<?php if(isset($_POST['travel_recovery'])) {echo $_POST['travel_recovery'];}elseif (isset($changes)){echo $changes['travel_recovery'];}?>" placeholder="">
          </div>

          <div class="col-md-6">
            <label for="exampleInput5" class="form-label"><b>Comments</b></label>
            <input type="text" class="form-control" name="changes_remarks" value="<?php if(isset($_POST['changes_remarks'])) {echo $_POST['changes_remarks'];}elseif (isset($changes)){echo $changes['changes_remarks'];}?>" placeholder="">
          </div>
        </div>

       


 
      </div>

      <?php echo form_close(); ?>

      <!-- Card footer -->
      <div class="card-footer">
        <button type="submit" name = "changes" value = "<?php echo (isset($changes)) ? 'update' : 'submit'; ?>" class="btn btn-primary btn-block"><?php echo (isset($changes)) ? 'Update' : 'Submit'; ?></button>
      </div>
    </form>
  </div>
</div>


<!-- script type="text/javascript">
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