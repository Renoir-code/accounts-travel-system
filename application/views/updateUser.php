<?php include("inc/header.php"); ?>

<div class="container">
    <?php echo form_open("admin/modifyUser/{$userData->user_id}",['class'=>'form-horizontal']); ?>
    <?php if($msg = $this->session->flashdata('message')):?>
        <div class="row">
            <div class ="col-md-6">
                <div class="alert alert-dismissable alert-success">
                     <?php echo $msg; ?>
                    
                    </div>

            </div>
        </div>
    <?php endif; ?>

<h3>EDIT USER</h3>
<hr>

<!--------------------------------------->
<div class="row">
    <div class="col-md-6">
            <div class="form-group">
                <label class="col-md-3 control-label"></label>
                <div class="col-md-9">
                    <?php echo form_input(['name'=>'email', 'class'=>'form-control',
                    'placeholder'=>'Email','value'=>set_value('email',$userData->email)]); ?> <!-- set value makes it so data stays in form-->
                </div>
            </div>
    </div>
    <div class="col-md-6">
    <?php echo form_error('email','<div class="text-danger">','</div>');?>
    </div>
</div>

<!-------------------------------------------->


<div class="row">
    <div class="col-md-6">
            <div class="form-group">
                <label class="col-md-3 control-label"></label>
                <div class="col-md-9">
                    <?php echo form_input(['name'=>'firstname', 'class'=>'form-control',
                    'placeholder'=>'Firstname','value'=>set_value('firstname',$userData->firstname)]); ?> <!-- set value makes it so data stays in form-->
                </div>
            </div>
    </div>
    <div class="col-md-6">
    <?php echo form_error('firstname','<div class="text-danger">','</div>');?>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
            <div class="form-group">
                <label class="col-md-3 control-label"></label>
                <div class="col-md-9">
                    <?php echo form_input(['name'=>'lastname', 'class'=>'form-control',
                    'placeholder'=>'Lastname','value'=>set_value('lastname',$userData->lastname)]); ?> <!-- set value makes it so data stays in form-->
                </div>
            </div>
    </div>
    <div class="col-md-6">
    <?php echo form_error('lastname','<div class="text-danger">','</div>');?>
    </div>
</div>

<br>

<div class="row">
    <div class="col-md-6">
            <div class="form-group">
                <label class="col-md-3 control-label">Role </label>
                <div class="col-md-9">
                   <select class="col-lg-9" name="role_id" >
                       <option value="" > <?php echo $userData->rolename ?></option>
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
    <div class="col-md-6">
    <?php echo form_error('role_id','<div class="text-danger">','</div>');?>
    </div>
</div>

<br>


<button type="submit" class="btn btn-success">UPDATE</button>
<?php echo anchor("admin/dashboard/{$userData->user_id}","BACK",['class' =>'btn btn-primary']); ?>




<?php echo form_close(); ?>
</div>
<?php include("inc/footer.php"); ?>