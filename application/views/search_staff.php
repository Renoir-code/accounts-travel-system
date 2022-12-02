<?php include_once('inc/header.php') ?>


<br>

<h4> Please Enter the TRN Number for the Staff Member : </h4>
<br><br>
<?php echo form_open('staff/staff_information') ?>
<input type="text" class="form-control-sm" name ="trn"> 
<input type="submit" value="submit" class="btn btn-primary btn-lg"> 
<br><br>

<?php echo form_close(); ?>