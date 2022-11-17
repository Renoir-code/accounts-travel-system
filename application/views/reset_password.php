<?php include("inc/header.php"); ?>

<br>

<div class=" container">
    <div class="panel panel-primary">
        <div class="panel-heading">  </div>
            
                <div class="panel-body">
                    
                    <h3 >Change Your Password</h3>
                   <br>
                   <form class="loginArea" action="<?=base_url('user/reset_password').'/'.$this->uri->segment(3).'/'.$this->uri->segment(4)?>" method="post">
        
                   <div class="error_holder"><?php if(isset($message) && $message != '') echo $message; ?></div>

            <div class="form-group col-md-6">
                
        <div class="form-group">
            <label for=""> Password</label>
            <input type="password" class="form-control" name="password" value="<?php echo set_value('password') ?>" placeholder="">
            <div class="col-md-6">
            <small> <?php echo form_error('password','<div class="text-danger">','</div>');?>   </small> 
            </div>
        </div>

            <br>

        <div class="form-group">
            <label for=""> Confirm Password </label>
            <input type="password" class="form-control" name="confirm_pass" value="<?php echo set_value('confirm_pass') ?>" placeholder=" ">
            <div class="col-md-6">
            <small> <?php echo form_error('confirm_pass','<div class="text-danger">','</div>');?>  </small>
            </div>
        </div>

            <br>

            <br>

            <button type="submit" class="btn  btn-success "> Change Password </button>
           
            <hr>
            <?php echo form_close(); ?>

            </div>
    </div>