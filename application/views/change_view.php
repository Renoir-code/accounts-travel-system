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
echo $data['dateof_change'];
?>

        <?php echo form_open("staff/change/{$data['staff_id']}") ?>
        <div class="row">
        <h4 > Update Staff Details for Changes: </h4>
                <div class="col-md-4 col-md-offset-4">
                       
            
                        <div class="form-group">
                        <label for="" class=" form-label"> First Name </label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control-lg" name="firstname" value="<?php if(isset($_POST['firstname'])) {echo $_POST['firstname'];}elseif (isset($data['firstname'])){echo $data['firstname'];}?>" placeholder="">
                            </div>
                        </div>
                
                    <div class="form-group">
                    <label for="" class="form-label"> Last Name </label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-lg" name="lastname" value="<?php if(isset($_POST['lastname'])) {echo $_POST['lastname'];}elseif (isset($data['lastname'])){echo $data['lastname'];}?>" placeholder="">
                        </div>
                    </div>
                
                    <div class="form-group">
                    <label for="" class="form-label"> New Post Title </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control-lg" name="post_change" value="<?php if(isset($_POST['post_title'])) {echo $_POST['post_title'];}elseif (isset($data['post_title'])){echo $data['post_title'];}?>" placeholder="">
                        </div>
                    </div>
                
                    <div class="form-group">
                    <label for="" class="form-label">Date of Change</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control-lg" name="date_of_change" value="<?php echo substr($data['dateof_change'],0,10);//echo set_value('date_of_change') ?>" placeholder="">
                        </div>
                    </div>
					
					  <div class="form-group">
					 <label for="" class="form-label">End Date</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control-lg" name="date_of_change_end" value="<?php echo set_value('date_of_change') ?>" placeholder="">
                        </div>
                    </div>

                    <div class="form-group ">
                    <div class="col-sm-10">
                    <label for="" class="form-label" id = "upkeepchange_type _label"> Type of Upkeep </label>
                    <label for="inputState"></label>
                   <select  class="form-control-lg" name="upkeepchange_type" id="upkeepchange_type">
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
                    </div>

                    <div class="form-group">
                    <label for="" class="form-label"> Monthly Allottment  </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control-lg" name="monthly_allotment" value="<?php echo set_value('monthly_allotment') ?>" placeholder="">
                        </div>
                    </div>

                    <div class="form-group">
                    <label for="" class="form-label"> Arrears </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control-lg" name="arrears" value="<?php echo set_value('arrears') ?>" placeholder="">
                        </div>
                    </div>

                    <div class="form-group">
                    <label for="" class="form-label"> Travel Recovery </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control-lg" name="travel_recovery" value="<?php echo set_value('travel_recovery') ?>" placeholder="">
                        </div>
                    </div>

                    <div class="form-group">
                    <label for="" class="form-label"> Comments </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control-lg" name="changes_remarks" value="<?php echo set_value('changes_remarks') ?>" placeholder="">
                        </div>
                    </div>

                    <br>
                    <div class="col-sm-10">
                   <button type="submit" class="btn btn-primary btn-block" value = "submit" name = "changes"> Submit </button> 
                    </div>
                    <hr>
                
                    <?php //echo form_submit('enableUpkeepOptions','submit') ?>
            <?php echo form_close(); ?>

            </div>
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