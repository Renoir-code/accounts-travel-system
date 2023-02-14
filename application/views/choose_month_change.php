
<<<<<<< Updated upstream
<?php include_once('inc/header.php') ?>
<script src="https://phpcoder.tech/multiselect/js/jquery.multiselect.js"></script>
<link rel="stylesheet" href="https://phpcoder.tech/multiselect/css/jquery.multiselect.css">

<?php

echo $this->session->flashdata('message');
unset($_SESSION['message']);
?>

<?php include_once('inc/header.php') ?>


<?php

echo $this->session->flashdata('message');
unset($_SESSION['message']);
?>

<?php 
$attributes = array('name' => 'myform');
echo form_open('report/changesReport',$attributes );

?>
=======
<?php include_once('inc/header.php') ?>





<?php echo form_open('report/changesReport')?>
>>>>>>> Stashed changes
<br>
<h4>Changes Report </h4>
<table class="table table-striped table-hover " >
          <thead>
              <tr>
                <th scope="col ">Choose Date</th>
				<th scope="col ">Location</th> 
              </tr>
          </thead>
      <tbody>
	  <tr class = 'table-active'>
<<<<<<< Updated upstream
<!--            <td>
<div class="row">
    <div class="col-md-4">
            <div class="form-group ">
             <label for=""> Choose Month for Report  </label>
                <div class="col-md input-group mb-6">
 </td>  -->
 
 <td> 
                    
                   <!-- <input type="date" id="start" name="monthly_change" min="2018-03" value="2018-05" type="date" >-->
<select name="monthly_change" class="datefield month">
    <option value="">Month</option>
    <option value="01-01-2023">Jan</option>
    <option value="02-02-2023">Feb</option>
    <option value="03-02-2023">Mar</option>
    <option value="04-02-2023">Apr</option>
    <option value="05-02-2023">May</option>
    <option value="06-02-2023">Jun</option>
    <option value="07-02-2023">Jul</option>
    <option value="08-02-2023">Aug</option>
    <option value="09-02-2023">Sep</option>
    <option value="10-02-2023">Oct</option>
    <option value="11-02-2023">Nov</option>
    <option value="12-02-2023">Dec</option>
</select> 
                </div>
  </td>              
            
			<td>
			<!--<label for="" class="form-label"> Location of Officer </label>-->
                   
                    <select  class="form-control-lg" name="location_id">
                       <option value=""  <?php if(isset($_POST['location_id']) && $_POST['location_id']=='') echo ' selected';?>>Choose Location..</option>
                       <option value="1" <?php if(isset($_POST['location_id']) && $_POST['location_id']=='1') echo ' selected';?>>Court Administration Division </option>
                       <option value="2" <?php if(isset($_POST['location_id']) && $_POST['location_id']=='2') echo ' selected';?>>Supreme Court </option>
                       <option value="3" <?php if(isset($_POST['location_id']) && $_POST['location_id']=='3') echo ' selected';?>>Parish Court </option>
                       <option value="4" <?php if(isset($_POST['location_id']) && $_POST['location_id']=='4') echo ' selected';?>>Court of Appeal </option>
=======
>>>>>>> Stashed changes

    <td>               
    <input type="date" id="start" name="monthly_change" min="2018-03" value="2018-05" type="date" >                   
    </div>
    </td> 
                 
    
    <td>
    <select class="form-control" name="location_id">
        <option value=""  <?php if(isset($_POST['location_id']) && $_POST['location_id']=='') echo ' selected';?>>Choose Location..</option>
        <option value="1" <?php if(isset($_POST['location_id']) && $_POST['location_id']=='1') echo ' selected';?>>Court Administration Division </option>
        <option value="2" <?php if(isset($_POST['location_id']) && $_POST['location_id']=='2') echo ' selected';?>>Supreme Court </option>
        <option value="3" <?php if(isset($_POST['location_id']) && $_POST['location_id']=='3') echo ' selected';?>>Parish Court </option>
        <option value="4" <?php if(isset($_POST['location_id']) && $_POST['location_id']=='4') echo ' selected';?>>Court of Appeal </option>
    </select>
    </td>			
    </div>
    </div>
    <small> <?php echo form_error('rate_name','<div class="text-danger">','</div>');?>  </small>   
</div>
 <td>
  <button type="submit" class="btn  btn-success ">Generate Report </button>
 </td> 
		   
		 </tbody>
        
      </table>   

<!----------------------------------------------------------------------------------->
<br>
<h4>General Report</h4>
      <table class="table table-striped table-hover " >
          <thead>
              <tr>
                <th scope="col ">Choose Start Date</th>
                <th scope="col ">Choose End Date</th>
				<th scope="col ">Enter the Officer Name </th> 
                <th scope="col ">Choose the type of Report </th> 
              </tr>
          </thead>
      <tbody>
	  <tr class = 'table-active'>

    <td>               
    <input type="date" id="start" name="monthly_change" min="2018-03" value="2018-05" type="date" >                   
    </div>
    </td>   
    
    
    <td>               
    <input type="date" id="end" name="monthly_change" min="2018-03" value="2018-05" type="date" >                   
    </div>
    </td> 
    
    <td> <!-- Enter the Officer name -->
    <input type="text" name = "mileage_km" class="form-control" value="<?php echo set_value('mileage_km') ?>" placeholder="">
    <small> <?php echo form_error('mileage_km','<div class="text-danger">','</div>');?> </small>
    </td>		
    
    <td>
    <select class="form-control" name="location_id">
        <option value=""  <?php if(isset($_POST['location_id']) && $_POST['location_id']=='') echo ' selected';?>> Total Mileage</option>
        <option value="1" <?php if(isset($_POST['location_id']) && $_POST['location_id']=='1') echo ' selected';?>>Total Subsistence </option>
        <option value="2" <?php if(isset($_POST['location_id']) && $_POST['location_id']=='2') echo ' selected';?>>Total Passenger Mileage </option>
        <option value="3" <?php if(isset($_POST['location_id']) && $_POST['location_id']=='3') echo ' selected';?>>Toll Amt </option>
        <option value="4" <?php if(isset($_POST['location_id']) && $_POST['location_id']=='4') echo ' selected';?>>Actual Expense </option>
        <option value=""  <?php if(isset($_POST['location_id']) && $_POST['location_id']=='') echo ' selected';?>> Supper</option>
        <option value="1" <?php if(isset($_POST['location_id']) && $_POST['location_id']=='1') echo ' selected';?>>Refreshment </option>
        <option value="2" <?php if(isset($_POST['location_id']) && $_POST['location_id']=='2') echo ' selected';?>>Total Passenger Mileage </option>
        <option value="3" <?php if(isset($_POST['location_id']) && $_POST['location_id']=='3') echo ' selected';?>>Toll Amt </option>
        <option value="4" <?php if(isset($_POST['location_id']) && $_POST['location_id']=='4') echo ' selected';?>>Actual Expense </option>
    </select>
    </td>	
    </div>
    </div>
    <small> <?php echo form_error('rate_name','<div class="text-danger">','</div>');?>  </small>   
</div>
 <td>
  <button type="submit" class="btn  btn-success ">Generate Report </button>
 </td> 
		   
		 </tbody>
        
      </table>   

      <?php echo form_close(); ?>


<?php echo form_close(); ?>
<?php 
$attributes = array('name' => 'myform2');
echo form_open('report/generalReport'); 


?>
    <h4>General Report</h4>

<?php echo form_open('report/generalReport') ?>



      <table class="table table-striped table-hover " >
          <thead>
              <tr>
                <th scope="col ">Choose Start Date</th>
                <th scope="col ">Choose End Date</th>
				<th scope="col ">Enter the Officer TRN </th> 
                <th scope="col ">Choose the type of Report </th> 
              </tr>
          </thead>
      <tbody>
	  <tr class = 'table-active'>

    <td>               
    <input type="date" id="start" name="date_from" min="2018-01-01" value="2018-01-01" >                   
    </div>
    </td>   
    
    
    <td>               
    <input type="date" id="end" name="date_to" min="2018-01-01" value="2018-01-01" >                   
    </div>
    </td> 
    
    <td> <!-- Enter the Officer name -->
    <!--<input type="text" name = "trn" class="form-control" value="<?php //echo set_value('trn') ?>" placeholder="">
    <small> <?php //echo form_error('trn','<div class="text-danger">','</div>');?> </small>-->
  <div class="demo"> 
<select  class="form-control-lg" name="staff_member_report[]" id = "staff_member_report" multiple <!--style="display:none"--> >
   <?php
	if(count($staff) > 0):
		foreach($staff as $row => $row_value): ?>
			<option value=<?php echo $row_value['staff_id'];?> <?php if(isset($_POST['staff_member_report']) && $_POST['staff_member_report']=='1') echo ' selected';?>><?php echo $row_value['firstname'] .' '. $row_value['lastname'];?></option>
<?php endforeach; 
	endif; ?>
</select>
</div>

   </td>		
    
    <td>
    <select class="form-control" name="report_type">
        <option value="mileage_km"  <?php if(isset($_POST['report_type']) && $_POST['report_type']=='mileage_km') echo ' selected';?>> Total Mileage</option>
        <option value="subsistence_km" <?php if(isset($_POST['report_type']) && $_POST['report_type']=='subsistence_km') echo ' selected';?>>Total Subsistence </option>
        <option value="passenger_km" <?php if(isset($_POST['report_type']) && $_POST['report_type']=='passenger_km') echo ' selected';?>>Total Passenger Mileage </option>
        <option value="toll_amt" <?php if(isset($_POST['report_type']) && $_POST['report_type']=='toll_amt') echo ' selected';?>>Toll Amt </option>
        <option value="actual_expense" <?php if(isset($_POST['report_type']) && $_POST['report_type']=='actual_expense') echo ' selected';?>>Actual Expense </option>
        <option value="supper_days"  <?php if(isset($_POST['report_type']) && $_POST['report_type']=='supper_days') echo ' selected';?>> Supper</option>
        <option value="refreshment_days" <?php if(isset($_POST['report_type']) && $_POST['report_type']=='refreshment_days') echo ' selected';?>>Refreshment </option>
        <option value="	taxi_out_town" <?php if(isset($_POST['report_type']) && $_POST['report_type']=='taxi_out_town') echo ' selected';?>>Taxi Out Town</option>
        <option value="taxi_in_town" <?php if(isset($_POST['report_type']) && $_POST['report_type']=='taxi_in_town') echo ' selected';?>>Taxi In Town </option>
    </select>
    </td>	
    </div>
    </div>
    <small> <?php echo form_error('rate_name','<div class="text-danger">','</div>');?>  </small>   
</div>
<td>
  <button type="submit" class="btn  btn-success ">Generate Report </button>
 </td>
 <?php echo form_close(); ?>