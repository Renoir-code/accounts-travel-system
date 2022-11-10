<?php include("inc/header.php"); ?>

<br>

<div class="container ">
    <div class="row justify-content-center">
        <div class="col-6">
    <?php echo form_open("welcome/signin",['class'=>'form-horizontal']); ?>
    <?php if($msg = $this->session->flashdata('message')):?>
        <div class="row">
            <div class ="col-md-6">
                <div class="alert alert-dismissable alert-danger">
                     <?php echo $msg; ?>
                    
                    </div>

            </div>
        </div>
    <?php endif; ?>

<h3> LOGIN</h3>





<!--------------------------------------->

            <div class="form-group">
                <label class="col-md-3 control-label"> </label>
                <div class="col-md-9">
                    <?php echo form_input(['name'=>'email', 'class'=>'form-control',
                    'placeholder'=>'Email/Username']); ?>
                </div>
               
    
    <div class="col-md-6">
    <?php echo form_error('username','<div class="text-danger">','</div>');?>
    </div>
</div>

<!-------------------------------------------->

            <div class="form-group">
                <label class="col-md-3 control-label"> </label>
                <div class="col-md-9">
                    <?php echo form_password(['name'=>'password', 'class'=>'form-control',
                    'placeholder'=>'Password']); ?>
                </div>
               

    <div class="col-md-6">
    <?php echo form_error('password','<div class="text-danger">','</div>');?>
    </div>
</div>

<br>


<button type="submit" class="btn btn-primary ">LOGIN</button>
<?php echo anchor("welcome/adminRegister"," REGISTER",['class'=>'btn btn-success']); ?>
<hr>
<a href class="btn btn-grey"> Forgot Password</a>


<?php echo form_close(); ?>
</div>
</div>
</div>
<?php include("inc/footer.php"); ?>