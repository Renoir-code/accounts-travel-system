<?php include("inc/header.php"); ?>
<br>



<div class="panel panel-primary">
  <div class="panel-heading"></div>
<div class=" container">
<div class="panel-body">
    <br>
<h4 > Enter Travelling/Non Travelling Officer Details : </h4>
<br>
        <?php echo form_open('staff/staff_submit') ?>
        <?php if($msg = $this->session->flashdata('message')):?>
        <div class="row ">
            <div class ="col-md-6">
                <div class="alert alert-dismissable alert-danger">
                     <?php echo $msg; ?>
                    
                    </div>

            </div>
        
        </div>
    <?php endif; ?>

            <div class="form-group col-md-6">
                <div class="form-group">
                <label for=""> First Name </label>
                <input type="text" class="form-control" name="firstname" value="<?php echo set_value('firstname') ?>" placeholder="">
                <div class="col-md-6">
               <small> <?php echo form_error('firstname','<div class="text-danger">','</div>');?>   </small> 
                </div>
            </div>
             <br>
            <div class="form-group">
            <label for=""> Last Name </label>
                <input type="text" class="form-control" name="lastname" value="<?php echo set_value('lastname') ?>" placeholder="">
                <div class="col-md-6">
                <small> <?php echo form_error('lastname','<div class="text-danger">','</div>');?>  </small>
                </div>
            </div>
            <br>
            <div class="form-group">
            <label for=""> Post Title </label>
                <input type="text" class="form-control" name="post_title" value="<?php echo set_value('post_title') ?>" placeholder="">
                <div class="col-md-6">
                <small> <?php echo form_error('post_title','<div class="text-danger">','</div>');?> </small>
                </div>
            </div>
            <br>
            <div class="form-group">
            <label for=""> Tax Registration Number (TRN)</label>
                <input type="text" class="form-control" name="trn" value="<?php echo set_value('trn') ?>" placeholder="">
                <div class="col-md-6">
                <small> <?php echo form_error('trn','<div class="text-danger">','</div>');?> </small>
                </div>
            </div>
            <br>
            <div class="form-group">
            <label for=""> Type of Upkeep Received </label>
                <input type="text" class="form-control" name="typeof_upkeep" value="<?php echo set_value('typeof_upkeep') ?>" placeholder="">
                <div class="col-md-6">
                <small> <?php echo form_error('typeof_upkeep','<div class="text-danger">','</div>');?>  </small>
                </div>
            </div>
            <br>
            <div class="form-group col-md-4">
            <label for=""> Location of Officer </label>
            <label for="inputState"></label>
            <select  class="form-control" name="location_id">
            <option value="">Choose Location..</option>
                <?php if(count($location)):?>
                <?php foreach($location as $x):?>
                <option value=<?php echo $x->location_id?>>
                <?php echo $x->location_name?></option>
                <?php endforeach;?>
                <?php endif;?>
            </select>
            <div class="col-md-6">
                <small> <?php echo form_error('location_id','<div class="text-danger">','</div>');?>  </small>
                </div>
            </div>
            <br>
            <div class="form-group">
            <label for=""> Vehicle Model </label>
                <input type="text" class="form-control" name="vehicle_model" value="<?php echo set_value('vehicle_model') ?>" placeholder="">
                <div class="col-md-6">
                <small>  <?php echo form_error('vehicle_model','<div class="text-danger">','</div>');?> </small>
                </div>
            </div>
            <br>
            <div class="form-group">
            <label for=""> Vehicle Make </label>
                <input type="text" class="form-control" name="vehicle_make" value="<?php echo set_value('vehicle_make') ?>"  placeholder="">
                <div class="col-md-6">
                <small> <?php echo form_error('vehicle_make','<div class="text-danger">','</div>');?> </small>
                </div>
            </div>
            <br>
            <div class="form-group">
            <label for=""> Vehicle Chasis Number  </label>
                <input type="text" class="form-control" name="vehicle_chasisnum" value="<?php echo set_value('vehicle_chasisnum') ?>"  placeholder="">
                <div class="col-md-6">
                <small> <?php echo form_error('vehicle_chasisnum','<div class="text-danger">','</div>');?> </small>
                </div>
            </div>
            <br>
            <div class="form-group">
            <label for=""> Vehcile Engine Number </label>
                <input type="text" class="form-control" name="vehicle_engine_num"  value="<?php echo set_value('vehicle_engine_num') ?>" placeholder="">
                <div class="col-md-6">
                <small>  <?php echo form_error('vehicle_engine_num','<div class="text-danger">','</div>');?> </small>
                </div>  
            </div>
            <br>
             
            
            <button type="submit" class="btn  btn-success "> Submit Details</button>
          
            
            <?php echo form_close(); ?>
            </div>
  <div class="panel-footer">
</div>
</div>
            </div>
            </div>



<?php include("inc/footer.php"); ?>