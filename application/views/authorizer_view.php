
<?php include_once('inc/header.php') ?>

<br>
<?php $staff_payment_id = $this->uri->segment(3); 
 $staff_id = $this->uri->segment(4); 
?>

<h3> Choose Who should Authorize This Record!!  </h3>



<?php echo form_open("staff/authorize_records/{$staff_payment_id}/{$staff_id}") ?>
<div class="form-group ">
    <label class="form-label"> </label>
    <div class="col-sm-10">
    <select  class="form-control-lg" name="authorizer_email">
        <option value="">Choose.. </option>
            <?php if(count($data)):?>
            <?php foreach($data as $row):?>
            <option value=<?php echo $row['email']?> > <?php echo $row['firstname'].' '.$row['lastname'] ?></option>
            <?php endforeach;?>  
            <?php endif?>      
        </select>
    </div>
  </div>
  
<br>
  <button type="submit" class="btn  btn-success "> Email Authorizer! </button>