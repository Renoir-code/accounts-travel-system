<?php include("inc/header.php"); ?>
<br>
<br>
<?php //testarray($jury_rate); ?>
<link rel="stylesheet" href="<?php echo base_url('assets/css/date.css'); ?>">

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

    <?php echo anchor ("jury/jury_information" , "Jury Dashboard", ['class'=> 'btn btn-primary btn-lg ']); ?>
    
    <?php echo form_open('jury/jury_submit') ?>
    <br>

    <div class="container mt-5">
   
  <div class="card">
    <form>
      <!-- Card header -->
      <div class="card-header" >
        <h4 class="fw-bold" style="text-align :center">Enter Jury Claim Details </h4>
      </div>

      <!-- Card body -->
      <div class="card-body">
      <div class="row">
      <h5 style= "text-align :center"> <!--<b> Personal Details</b> --></h5>

          <div class="col-md-6">
          <div class="mb-3">
          <label for="exampleInput5" class="form-label"><b>Date_Received</b></label>
            <input type="date" class="form-control" name="date_received" value="<?php echo set_value('date_received') ?>" placeholder="">  
          </div>
          </div>

          <div class="col-md-6">
            <div class="mb-3">
            <label for="exampleInput5" class="form-label"><b> First Name</b></label>
            <input type="text" class="form-control" name="first_name" value="<?php echo set_value('first_name') ?>" placeholder="">  
            </div>
          </div>
          <div class="col-md-6">
            <div class="mb-3">
            <label for="exampleInput5" class="form-label"><b> Last Name</b></label>
            <input type="text" class="form-control" name="last_name" value="<?php echo set_value('last_name') ?>" placeholder=""> 
            </div>
          </div>
          <div class="col-md-6">
            <div class="mb-3">
            <label for="exampleInput5" class="form-label"><b> Tax Registration Number </b></label>
            <input type="text" class="form-control" name="trn" value="<?php echo set_value('trn') ?>" placeholder="">  
            </div>
          </div>
        </div>


        <div class="row">
         
          <hr>  <h5 style= "text-align :center"> <!--<b> Officer Details</b>--></h5>
        <br>

          <div class="col-md-6">
          <label for="exampleInput5" class="form-label"><b> Rate Paid</b></label>
          <select  class="form-control" name="rate_paid">
                   <option value="">Choose The Rate Paid ..</option>
                    <?php if(count($jury_rate)):?>
                    <?php foreach($jury_rate as $row):?>
                    <option value=<?php echo $row['rate_value']; if(isset($_POST['rate_paid']) && $_POST['rate_paid']==$row['rate_value']) echo ' selected';?>> <?php echo $row['rate_value'] ?></option>
                    <?php  endforeach;?>  
                    <?php  endif?>      
                </select>
          </div>

          <div class="col-md-6">
            <div class="mb-3">
              <label for="exampleInput5" class="form-label"><b> Days Worked </b></label>
            <input type="text" class="form-control" name="days_worked" value="<?php echo set_value('days_worked') ?>" placeholder="">  
            </div>
          </div>

          
         <!--  <div class="col-md-6">
            <div class="mb-3">
              <label for="exampleInput5" class="form-label"><b> Pick the Dates worked </b></label>
              <input type="text" class="form-control date" placeholder="Click to Choose the Dates Worked" name="dates_worked" value="<?php echo set_value('dates_worked') ?>" >
            </div>
          </div>
 -->


        </div>

        <div class="row">
         

          <div class="col-md-6">
          <label for="exampleInput4" class="form-label""> <b>Location of the Bail Claim</b></label>
              <select  class="form-control" name="location_id">
                       <option value=""  > Choose the Location.. </option>
                       <option value="1" <?php if(isset($_POST['location_id']) && $_POST['location_id']==1) echo ' selected';?> >Court Administration Division </option>
                      <option value="2" <?php if(isset($_POST['location_id']) && $_POST['location_id']==2) echo ' selected';?> >Supreme Court </option>
                      <option value="4" <?php if(isset($_POST['location_id']) && $_POST['location_id']==4) echo ' selected';?> >Court of Appeal </option>
                      <option value="5" <?php if(isset($_POST['location_id']) && $_POST['location_id']==5) echo ' selected';?> >Family Court </option>
                      <option value="6" <?php if(isset($_POST['location_id']) && $_POST['location_id']==6) echo ' selected';?> >Traffic Court </option>
                      <option value="7" <?php if(isset($_POST['location_id']) && $_POST['location_id']==7) echo ' selected';?> >Special Coroners Court </option>
                      <option value="8" <?php if(isset($_POST['location_id']) && $_POST['location_id']==8) echo ' selected';?> >Coroners Court </option>
                      <option value="9" <?php if(isset($_POST['location_id']) && $_POST['location_id']==9) echo ' selected';?> >Gun Court </option>
                      <option value="10" <?php if(isset($_POST['location_id']) && $_POST['location_id']==10) echo ' selected';?> >Revenue Court </option>
                      <option value="11" <?php if(isset($_POST['location_id']) && $_POST['location_id']==11) echo ' selected';?> >Hanover Parish Court </option>
                      <option value="12" <?php if(isset($_POST['location_id']) && $_POST['location_id']==12) echo ' selected';?> >Hanover Family Court </option>
                      <option value="13" <?php if(isset($_POST['location_id']) && $_POST['location_id']==13) echo ' selected';?> >Westmorland Parish Court </option>
                      <option value="14" <?php if(isset($_POST['location_id']) && $_POST['location_id']==14) echo ' selected';?> >Westmorland Family Court </option>
                      <option value="15" <?php if(isset($_POST['location_id']) && $_POST['location_id']==15) echo ' selected';?> >St.James Parish Court </option>
                      <option value="16" <?php if(isset($_POST['location_id']) && $_POST['location_id']==16) echo ' selected';?> >St.James Family Court </option>
                      <option value="17" <?php if(isset($_POST['location_id']) && $_POST['location_id']==17) echo ' selected';?> >St.Elizabeth Parish Court </option>
                      <option value="18" <?php if(isset($_POST['location_id']) && $_POST['location_id']==18) echo ' selected';?> >Trelawny Parish Court </option>
                      <option value="19" <?php if(isset($_POST['location_id']) && $_POST['location_id']==19) echo ' selected';?> >Trelawny Family Court </option>
                      <option value="20" <?php if(isset($_POST['location_id']) && $_POST['location_id']==20) echo ' selected';?> >Manchester Family Court </option>
                      <option value="21" <?php if(isset($_POST['location_id']) && $_POST['location_id']==21) echo ' selected';?> >St.Ann Parish Court </option>
                      <option value="22" <?php if(isset($_POST['location_id']) && $_POST['location_id']==22) echo ' selected';?> >St.Ann Family Court </option>
                      <option value="23" <?php if(isset($_POST['location_id']) && $_POST['location_id']==23) echo ' selected';?> >Clarendon Parish Court </option>
                      <option value="24" <?php if(isset($_POST['location_id']) && $_POST['location_id']==24) echo ' selected';?> >Chapleton Family Court </option>
                      <option value="25" <?php if(isset($_POST['location_id']) && $_POST['location_id']==25) echo ' selected';?> >St.Catherine Parish Court </option>
                      <option value="26" <?php if(isset($_POST['location_id']) && $_POST['location_id']==26) echo ' selected';?> >St.Mary Parish Court </option>
                      <option value="27" <?php if(isset($_POST['location_id']) && $_POST['location_id']==27) echo ' selected';?> >Corporate Area Criminal Court </option>
                      <option value="28" <?php if(isset($_POST['location_id']) && $_POST['location_id']==28) echo ' selected';?> >Corporate Area Civil Court </option>
                      <option value="29" <?php if(isset($_POST['location_id']) && $_POST['location_id']==29) echo ' selected';?> >Portland Parish Court </option>
                      <option value="30" <?php if(isset($_POST['location_id']) && $_POST['location_id']==30) echo ' selected';?> >St.Thomas Parish Court </option>
                      <option value="31" <?php if(isset($_POST['location_id']) && $_POST['location_id']==31) echo ' selected';?> >Manchester Parish Court </option>
                    </select>
                    </select>
          </div>


          <div class="col-md-6">
            <div class="mb-3">
              <label for="exampleInput4" class="form-label"><b> General Comments </b></label>
              <input type="text" class="form-control" name="comments" value="<?php echo set_value('comments') ?>" placeholder="">
            </div>
          </div>
        </div>

        <div class="col-md-6">
            <div class="mb-3">
              <label for="exampleInput4" class="form-label"><b> Reason Returned </b></label>
              <input type="text" class="form-control" name="reason_returned" value="<?php echo set_value('reason_returned') ?>" placeholder="">
            </div>
          </div>
        </div>

        <div class="row">
  
        <br>

        </div>

        </div>

        <button type="submit" class="btn btn-primary btn-lg btn-block ">Submit</button>
                      <br>
      </div>

      <?php echo form_close(); ?>

      <!-- Card footer -->
      <div class="card-footer">
      </div>
    </form>
  </div>
</div>


<script type="text/javascript">


$('.date').datepicker({
  multidate: true,
	format: 'dd-mm-yyyy'
});


</script>

