

<?php include_once('inc/header.php') ?>

<br>
<?php $staff_payment_id = $this->uri->segment(3); 
echo $staff_payment_id;
?>

<?php // testarray($data)?>
<?php echo form_open("staff/certifier_record/{$staff_payment_id}") ?>
<div class="form-group ">
    <label class="form-label">Choose the Certifier   </label>
    <div class="col-sm-10">
    <select  class="form-control-lg" name="certifier_email">
        <option value="">Choose.. </option>
            <?php if(count($data)):?>
            <?php foreach($data as $row):?>
            <option value=<?php echo $row['email']?> > <?php echo $row['firstname'].' '.$row['lastname'] ?></option>
            <?php endforeach;?>  
            <?php endif?>      
        </select>
    </div>
  </div>
  

  <button type="submit" class="btn  btn-success ">Send Email </button>