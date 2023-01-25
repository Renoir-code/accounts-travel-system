<?php include("inc/header.php"); ?>

<br>
<br>
<br>

<?php //echo $password= hash('sha256', 'x(93gQwerty1@44$b7@'); die(); ?>

<div class="container ">
    <div class="row justify-content-center">
        <div class="col-6">
    <?php echo form_open("user/index"); ?>
    <?php if($msg = $this->session->flashdata('error_message')):?>
        <div class="row">
            <div class ="col-md-6">
                <div class="alert alert-dismissable alert-danger close">
                     <?php echo $msg; ?>
                    
                    </div>

            </div>
        </div>
    <?php endif; ?>

    <?php if($msg = $this->session->flashdata('message')):?>
        <div class="row">
            <div class ="col-md-6">
                <div class="alert alert-dismissable alert-danger close">
                     <?php echo $msg; ?>
                    
                    </div>

            </div>
        </div>
    <?php endif; ?>
    <?php if($msg = $this->session->flashdata('success_message')):?>
        <div class="row">
            <div class ="col-md-6">
                <div class="alert alert-dismissable alert-success close">
                     <?php echo $msg; ?>
                    
                    </div>

            </div>
        </div>
    <?php endif; ?>
	
	
	    <?php 
		if($this->session->flashdata('timeout')){
            echo '<div class="row ">
                
                    <div class="alert alert-dismissable alert-success">
                   ';   
						
							echo $this->session->flashdata('timeout'); 
							unset($_SESSION['timeout']);
				
						
             echo'     
                </div>
			</div>';
	}?>
	
	
    <br>
    <div class="error_holder alert-danger "><?php if(isset($message) && $message != '') echo $message; ?></div>
    <br>

<h3> LOGIN</h3>

            <div class="form-group">
                <label class="col-md-3 control-label"> </label>
                <div class="col-md-9">
                    <?php echo form_input(['name'=>'email', 'class'=>'form-control',
                    'placeholder'=>'Email/Username']); ?>
                </div>
                    <small> <?php echo form_error('email','<div class="text-danger">','</div>');?> </small>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label"> </label>
                <div class="col-md-9">
                    <?php echo form_password(['name'=>'password', 'class'=>'form-control',
                    'placeholder'=>'Password']); ?>
                </div>
                    <small>  <?php echo form_error('password','<div class="text-danger">','</div>');?>  </small>  
            </div>

<br>


        <button type="submit" class="btn btn-primary ">LOGIN</button>
        <?php // echo anchor("user/adminRegister"," REGISTER",['class'=>'btn btn-success']); ?>
        <hr>
        <a href="<?php echo base_url('user/forgotPassword')?>" class="btn btn-grey"> Forgot Password</a>


        <?php echo form_close(); ?>
        </div>
        </div>
        </div>
		
        <?php 
		 
		include("inc/footer.php");
		exit();
		?>