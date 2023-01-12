<?php include("inc/header.php"); ?>
<br>
<br>
<?php  //  testarray($data); ?>


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


        <?php echo form_open("staff/update_staff_records/{$data['staff_id']}") ?>
        <div class="row">
        <h4 > Enter Officer Details : </h4>
                <div class="col-md-4 col-md-offset-4">
                       
            
                        <div class="form-group">
                        <label for="" class=" form-label"> First Name </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control-lg" name="firstname" value="<?=$data['firstname']?>" placeholder="">
                            </div>
                        </div>
                
                    <div class="form-group">
                    <label for="" class="form-label"> Last Name </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control-lg" name="lastname" value="<?=$data['lastname']?>" placeholder="">
                        </div>
                    </div>
                
                    <div class="form-group">
                    <label for="" class="form-label"> Post Title </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control-lg" name="post_title" value="<?=$data['post_title']?>" placeholder="">
                        </div>
                    </div>
                
                    <div class="form-group">
                    <label for="" class="form-label"> Tax Registration Number (TRN)</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control-lg" name="trn" value="<?=$data['trn']?>" placeholder="">
                        </div>
                    </div>

                    <div class="form-group ">
                    <div class="col-sm-10">
                    <label for="" class="form-label"> Location of Officer </label>
                    <label for="inputState"></label>
                    <select  class="form-control-lg" name="location_id">
                       <option value="0"  >Choose Location..</option>
                       <option value="1" <?php if($data['location_id']==1)  echo ' selected';?> >Court Administration Division </option>
                       <option value="2" <?php if($data['location_id']==2)  echo ' selected';?> >Supreme Court </option>
                       <option value="3" <?php if($data['location_id']==3)  echo ' selected';?> >Parish Court </option>
                       <option value="4" <?php if($data['location_id']==4)  echo ' selected';?> >Court of Appeal </option>

                    </select>
                    </div>
                    </div>

                    <div class="form-group ">
                    <div class="col-sm-10">
                    <label for="" class="form-label"> Type of Officer </label>
                    <label for="inputState"></label>
                    <select  class="form-control-lg" name="officer_id" id="officer_id" onchange="val()">
                    <option value="">Choose Type of Officer..</option>  <!-- if submit is clicked and an eror is there save what was typed if not return whats in the database -->
                    <option value="1" <?php if(isset($_POST['officer_id']) && $_POST['officer_id']==1) {echo ' selected';} elseif($data['officer_id']==1)   {echo ' selected';}?> >Travelling Officer </option>
                    <option value="2" <?php if(isset($_POST['officer_id']) && $_POST['officer_id']==2) {echo ' selected';} elseif($data['officer_id']==2)  {echo ' selected';}?> >Casual Officer </option>
                    </select>

                    </div>
                    </div>
                        

                    <div class="form-group ">
                    <div class="col-sm-10">
                    <label for="" class="form-label"> Type of Upkeep </label>
                    <label for="inputState"></label>
                    <select  class="form-control-lg" name="upkeep_id" id="upkeep_id">
                    <option value="">Choose The Type of Upkeep Received ..</option>
                    <option value="1" <?php  if($data['upkeep_id']==1) echo ' selected';?> >Fixed Upkeep Allowance </option>
                    <option value="2" <?php  if($data['upkeep_id']==2)echo ' selected';?> >Fixed Walkfoot Allowance </option>
                    <option value="3" <?php  if($data['upkeep_id']==3) echo ' selected';?> >Judges(Partially Owned) </option>
                    <option value="4" <?php  if($data['upkeep_id']==4) echo ' selected';?> >(Judges) Other Partially Owned Vehicle</option>
                    <option value="5" <?php  if($data['upkeep_id']==5) echo ' selected';?> >Commuted Allowance</option>
                    <option value="6" <?php  if($data['upkeep_id']==6) echo ' selected';?> >Commuted Walkfoot Allowance </option>
                    <option value="7" <?php  if($data['upkeep_id']==7) echo ' selected';?> >Full Allowance </option>
                    <option value="8" <?php  if($data['upkeep_id']==8) echo ' selected';?> >Walkfoot Allowance </option>
                    
                      
                    </select>
                    <input type="hidden" class="form-control-lg" name="upkeep_id" value="55" disabled id="hidden_input">
                    </div>
                    </div>
                
                    
                    
                    <div class="form-group">
                    <label for="" class="form-label"> Vehicle Model </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control-lg" name="vehicle_model" value="<?=$data['vehicle_model']?>" placeholder="">
                        </div>  
                    </div>
                    
                    <div class="form-group">
                    <label for="" class="form-label"> Vehicle Make </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control-lg" name="vehicle_make" value="<?=$data['vehicle_make']?>"  placeholder="">
                        </div>   
                    </div>

                    <div class="form-group">
                    <label for="" class="form-label"> Vehicle Chasis Number  </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control-lg" name="vehicle_chasisnum" value="<?=$data['vehicle_chasisnum']?>"  placeholder="">
                        </div>  
                    </div>

                    <div class="form-group">
                    <label for="" class="form-label"> Vehicle Engine Number </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control-lg" name="vehicle_engine_num"  value="<?=$data['vehicle_engine_num']?>" placeholder="">
                        </div>  
                    </div>
                    <br>
                    <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary btn-block "> Upodate </button>
                    </div>
                    <hr>
                
            
            <?php echo form_close(); ?>

            </div>
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