<?php include("inc/header.php"); ?>

<div class="container">
    <?php echo form_open("user/adminSignup",['class'=>'form-horizontal']); ?>
    <?php if($msg = $this->session->flashdata('message')):?>
        <div class="row ">
            <div class ="col-md-6">
                <div class="alert alert-dismissable alert-success">
                     <?php echo $msg; ?>
                    
                    </div>

            </div>
        </div>
    <?php endif; ?>
    <br>
    <br>
<br>
<br>
<br>

<h3> REGISTER HERE </h3>
<br>

<!--------------------------------------->
<div class="row">
    <div class="col-md-6">
            <div class="form-group ">
                 <label for=""> Email</label>
                <div class="col-md-9">
                    <?php echo form_input(['name'=>'email', 'class'=>'form-control',
                    'placeholder'=>'','value'=>set_value('email')]); ?> <!-- set value makes it so data stays in form-->
                </div>
            </div>
    </div>   
   <small> <?php echo form_error('email','<div class="text-danger">','</div>');?> </small>    
</div>
<br>
<!-------------------------------------------->


<div class="row">
    <div class="col-md-6">
            <div class="form-group">
            <label for=""> First Name </label>
                <div class="col-md-9">
                    <?php echo form_input(['name'=>'firstname', 'class'=>'form-control',
                    'placeholder'=>'','value'=>set_value('firstname')]); ?> <!-- set value makes it so data stays in form-->
                </div>
            </div>
    </div>
   <small> <?php echo form_error('firstname','<div class="text-danger">','</div>');?>  </small>  
</div>
<br>

<div class="row">
    <div class="col-md-6">
            <div class="form-group">
            <label for=""> Last Name</label>
                <div class="col-md-9">
                    <?php echo form_input(['name'=>'lastname', 'class'=>'form-control',
                    'placeholder'=>'','value'=>set_value('lastname')]); ?> <!-- set value makes it so data stays in form-->
                </div>
            </div>
    </div>
   <small> <?php echo form_error('lastname','<div class="text-danger">','</div>');?> </small>
    <br>

</div>

<!--
<div class="row">
    <div class="col-md-6">
            <div class="form-group">
                <label class="col-md-3 control-label"> Gender</label>
                <div class="col-md-9">
                   <select class="col-lg-9" name="gender">
                       <option value="">Select</option>
                       <option value="Male">Male</option>
                       <option value="Female">Female</option>
                   </select>
                </div>
               
            </div>
    </div>
    <div class="col-md-6">
    <?php //echo form_error('gender','<div class="text-danger">','</div>');?>
    </div>
</div>
    -->


<div class="row">
    <div class="col-md-4">
            <div class="form-group ">
             <label for=""> Role</label>
                <div class="col-md input-group mb-6">
                   <select class="form-select" name="role_id" >
                       <option value="">Choose Role</option>
                       <?php if(count($roles)):?>
                       <?php foreach($roles as $role):?>
                       <option value=<?php echo $role->role_id?>>
                       <?php echo $role->rolename?></option>
                       <?php endforeach;?>
                      <?php endif;?>
                   </select>
                </div>
               
            </div>
    </div>
    <small> <?php echo form_error('role_id','<div class="text-danger">','</div>');?>  </small>   
</div>
<br>

<div class="row">
    <div class="col-md-6">
            <div class="form-group">
                 <label for=""> Password</label>
                <div class="col-md-9">
                    <?php echo form_password(['name'=>'password', 'class'=>'form-control',
                    'placeholder'=>'']); ?>
                </div>
               
            </div>
    </div>
    <small> <?php echo form_error('password','<div class="text-danger">','</div>');?> </small> 
</div>
<br>

<div class="row">
    <div class="col-md-6">
            <div class="form-group">
                 <label for=""> Confirm Password</label>
                <div class="col-md-9">
                    <?php echo form_password(['name'=>'confirm_pass', 'class'=>'form-control',
                    'placeholder'=>'']); ?>
                </div>
               
            </div>
    </div>
    <small> <?php echo form_error('confirm_pass','<div class="text-danger">','</div>');?> </small>
  
   
</div>


<br>
<button type="submit" class="btn  btn-success ">REGISTER</button>
<?php echo anchor("welcome/login","BACK TO LOGIN",['class' =>'btn btn-outline-primary']); ?>

<hr>


<?php echo form_close(); ?>
</div>
<?php include("inc/footer.php"); ?>