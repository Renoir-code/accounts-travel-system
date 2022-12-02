<?php include("inc/header.php"); ?>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<div class="panel panel-primary">
  <div class="panel-heading"></div>
<div class=" container">
<div class="panel-body">
<div class="error_holder alert-danger "><?php if(isset($message) && $message != '') echo $message; ?></div>
<br>

<h3 > Reset Your Password : </h3>
        <?php echo form_open('User/forgotPassword') ?>
       

      
   
 

    <div class="form-group col-md-6">
                <div class="form-group">
                <input type="text" class="form-control" name="email" value="<?php echo set_value('email') ?>" placeholder="Enter a Valid Work Email">
                <div class="col-md-6">
               <small> <?php echo form_error('email','<div class="text-danger">','</div>');?>   </small> 
                </div>
            </div>
             <br>

             <button type="submit" class="btn  btn-success "> Reset </button>
             <?php echo anchor("user","BACK TO LOGIN",['class' =>'btn btn-outline-primary']); ?>
            <hr>
            
            <?php echo form_close(); ?>
            </div>
  <div class="panel-footer"></div>
</div>
</div>
            </div>
            </div>



<?php include("inc/footer.php"); ?>