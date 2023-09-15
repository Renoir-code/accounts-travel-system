
<?php include_once('inc/header.php') ?>
<!--<script src="https://phpcoder.tech/multiselect/js/jquery.multiselect.js"></script>
<link rel="stylesheet" href="https://phpcoder.tech/multiselect/css/jquery.multiselect.css">-->

<?php

if($msg = $this->session->flashdata('message')):?>
    <div class="row ">
        <div class ="col-md-3">
            <div class="alert alert-dismissable alert-success">
                <?php echo $msg; ?>
                <?php endif;?>
            </div> 
        </div>
	</div>

<?php unset($_SESSION['message']);?>

<?php
echo $this->session->flashdata('message');
unset($_SESSION['message']);
?>


<div class = "container">
<div class = "row">
<hr>
	<h4>Changes Report</h4>
<?php 
$attributes = array('name' => 'myform');
echo form_open('report/changesReport',$attributes );

?>
<br>
<table class="table table-striped table-hover " >
          <thead>
              <tr>
                <th scope="col ">Choose Date</th>
				<th scope="col ">Location</th> 
				<th scope="col "></th> 
              </tr>
          </thead>
      <tbody>
	  
	  
		<tr class = 'table-active'>

 
 <td> 
                    
<select name="monthly_change" class="datefield month form-control">
    <option value="">Month</option>
    <option value="01-01-2023" <?php if(date('m') < 1) echo 'disabled'; ?>>Jan</option>
    <option value="02-02-2023" <?php if(date('m') < 2) echo 'disabled'; ?>>Feb</option>
    <option value="03-03-2023" <?php if(date('m') < 3) echo 'disabled'; ?>>Mar</option>
    <option value="04-04-2023" <?php if(date('m') < 4) echo 'disabled'; ?>>Apr</option>
    <option value="05-05-2023" <?php if(date('m') < 5) echo 'disabled'; ?>>May</option>
    <option value="06-06-2023" <?php if(date('m') < 6) echo 'disabled'; ?>>Jun</option>
    <option value="07-07-2023" <?php if(date('m') < 7) echo 'disabled'; ?>>Jul</option>
    <option value="08-08-2023" <?php if(date('m') < 8) echo 'disabled'; ?>>Aug</option>
    <option value="09-09-2023" <?php if(date('m') < 9) echo 'disabled'; ?>>Sep</option>
    <option value="10-10-2023" <?php if(date('m') < 10) echo 'disabled'; ?>>Oct</option>
    <option value="11-11-2023" <?php if(date('m') < 11) echo 'disabled'; ?>>Nov</option>
    <option value="12-12-2023" <?php if(date('m') < 12) echo 'disabled'; ?>>Dec</option>
</select> 
                
  </td>              
            
			<td>
			<!--<label for="" class="form-label"> Location of Officer </label>-->
                   
                    <select  class="form-control" name="location_id">
                       <option value=""  <?php if(isset($_POST['location_id']) && $_POST['location_id']=='') echo ' selected';?>>Choose Location..</option>
                       <option value="1" <?php if(isset($_POST['location_id']) && $_POST['location_id']=='1') echo ' selected';?>>Court Administration Division </option>
                       <option value="2" <?php if(isset($_POST['location_id']) && $_POST['location_id']=='2') echo ' selected';?>>Supreme Court </option>
                       <option value="3" <?php if(isset($_POST['location_id']) && $_POST['location_id']=='3') echo ' selected';?>>Parish Court </option>
                       <option value="4" <?php if(isset($_POST['location_id']) && $_POST['location_id']=='4') echo ' selected';?>>Court of Appeal </option>

                    </select>
			</td>
			
		 <td>
  <button type="submit" class="btn  btn-success ">Generate Report </button>
 </td> 
    <small> <?php echo form_error('rate_name','<div class="text-danger">','</div>');?>  </small>   


		   
		 </tbody>
        
      </table>   

<?php echo form_close(); ?>
</div>

<div class = "row">
<?php 
$attributes = array('name' => 'myform2');
echo form_open('report/generalReport'); 

?>
    <hr>
	<h4>General Report</h4><br>

      <table class="table table-striped table-hover " >
          <thead>
              <tr>
                <th scope="col ">Choose Start Date</th>
                <th scope="col ">Choose End Date</th>
				<th scope="col ">Enter the Officer Name </th> 
				<th scope="col "> </th> 
              </tr>
          </thead>
      <tbody>
	  <tr class = 'table-active'>

    <td>               
    <input type="date" id="start" name="date_from" min="2018-03-01" value="2023-01-01" class="form-control">                   
    
    </td>   
    
    
    <td>               
    <input type="date" id="end" name="date_to" min="2018-03-01" value="2023-01-01" class="form-control">                   
   
    </td> 
    
    <td> 
<select  class="form-control" name="staff_member_report[]" id = "staff_member_report" multiple <!--style="display:none"--> >
   <?php
	if(count($staff) > 0):
		foreach($staff as $row => $row_value): ?>
			<option value=<?php echo $row_value['staff_id'];?> <?php if(isset($_POST['staff_member_report']) && $_POST['staff_member_report']=='1') echo ' selected';?>><?php echo $row_value['firstname'] .' '. $row_value['lastname'];?></option>
<?php endforeach; 
	endif; ?>
</select>


   </td>		
    
    <!-- <td>
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
    <small> <?php echo form_error('rate_name','<div class="text-danger">','</div>');?>  </small>   -->

<td>
  <button type="submit" class="btn  btn-success ">Generate Report </button>
 </td>
 </tbody>
 </table>
 <?php echo form_close(); ?>
 </div>



 <hr>
	<h4>Upkeep Report</h4>
<?php 
$attributes = array('name' => 'myform');
echo form_open('report/upkeepMonthReport',$attributes );

?>
<br>
<table class="container" >
          <thead>
              <tr>
                <th scope="col ">Date</th>
				<th scope="col ">Court/Location</th> 
				<th scope="col "></th> 
              </tr>
          </thead>
      <tbody>
	  
	  
		<tr class = 'table-active'>

 
 <td> 
                    
<select name="monthly_change" class="datefield month form-control">
    <option value="">Month</option>
    <option value="01-01-2023" <?php if(date('m') < 1) echo 'disabled'; ?>>Jan</option>
    <option value="02-02-2023" <?php if(date('m') < 2) echo 'disabled'; ?>>Feb</option>
    <option value="03-03-2023" <?php if(date('m') < 3) echo 'disabled'; ?>>Mar</option>
    <option value="04-04-2023" <?php if(date('m') < 4) echo 'disabled'; ?>>Apr</option>
    <option value="05-05-2023" <?php if(date('m') < 5) echo 'disabled'; ?>>May</option>
    <option value="06-06-2023" <?php if(date('m') < 6) echo 'disabled'; ?>>Jun</option>
    <option value="07-07-2023" <?php if(date('m') < 7) echo 'disabled'; ?>>Jul</option>
    <option value="08-08-2023" <?php if(date('m') < 8) echo 'disabled'; ?>>Aug</option>
    <option value="09-09-2023" <?php if(date('m') < 9) echo 'disabled'; ?>>Sep</option>
    <option value="10-10-2023" <?php if(date('m') < 10) echo 'disabled'; ?>>Oct</option>
    <option value="11-11-2023" <?php if(date('m') < 11) echo 'disabled'; ?>>Nov</option>
    <option value="12-12-2023" <?php if(date('m') < 12) echo 'disabled'; ?>>Dec</option>
</select> 
                
  </td>              
            
			<td>
			<!--<label for="" class="form-label"> Location of Officer </label>-->
                   
                    <select  class="form-control" name="location_id">
                       <option value=""  <?php if(isset($_POST['location_id']) && $_POST['location_id']=='') echo ' selected';?>>Choose Location..</option>
                       <option value="1" <?php if(isset($_POST['location_id']) && $_POST['location_id']=='1') echo ' selected';?>>Court Administration Division </option>
                       <option value="2" <?php if(isset($_POST['location_id']) && $_POST['location_id']=='2') echo ' selected';?>>Supreme Court </option>
                       <option value="3" <?php if(isset($_POST['location_id']) && $_POST['location_id']=='3') echo ' selected';?>>Parish Court </option>
                       <option value="4" <?php if(isset($_POST['location_id']) && $_POST['location_id']=='4') echo ' selected';?>>Court of Appeal </option>
                       <option value="11" <?php if(isset($_POST['location_id']) && $_POST['location_id']=='11') echo ' selected';?>>Manchester </option>

                    </select>
			</td>
			
		 <td>
  <button type="submit" class="btn  btn-success ">Generate Report </button>
 </td> 
    <small> <?php echo form_error('rate_name','<div class="text-danger">','</div>');?>  </small>   


		   
		 </tbody>
        
      </table>   

<?php echo form_close(); ?>
</div>



<br>

<div class = "container">
    <h4>Count Claim Report</h4>

<hr>
<?php 
$attributes = array('name' => 'myform4');
echo form_open('report/countClaims',$attributes); 

?>

<table class="table table-striped table-hover " >
          <thead>
              <tr>
                <th scope="col ">Date From</th>
                <th scope="col ">Date To</th>
				<th scope="col ">Courts </th> 
              </tr>
          </thead>
      <tbody>
	    <tr class = 'table-active'>

    <td>               
    <input type="date" id="start" name="date_from" min="2018-03-01" value="2023-01-01" class="form-control">                    
    </td>   
    
    <td>               
    <input type="date" id="end" name="date_to" min="2018-03-01" value="2023-01-01" class="form-control">                   
    </td> 

    <td>    <select  class="form-control" name="location_id">
                       <option value="77"  <?php if(isset($_POST['location_id']) && $_POST['location_id']=='') echo ' selected';?>>All Courts..</option>
                       <option value="1" <?php if(isset($_POST['location_id']) && $_POST['location_id']=='1') echo ' selected';?>>Court Administration Division </option>
                       <option value="2" <?php if(isset($_POST['location_id']) && $_POST['location_id']=='2') echo ' selected';?>>Supreme Court </option>
                       <option value="3" <?php if(isset($_POST['location_id']) && $_POST['location_id']=='3') echo ' selected';?>>Parish Court </option>
                       <option value="4" <?php if(isset($_POST['location_id']) && $_POST['location_id']=='4') echo ' selected';?>>Court of Appeal </option>
                       <option value="5" <?php if(isset($_POST['location_id']) && $_POST['location_id']=='5') echo ' selected';?>>Family Court</option>
                       <option value="6" <?php if(isset($_POST['location_id']) && $_POST['location_id']=='6') echo ' selected';?>>Traffic Court </option>
                       <option value="7" <?php if(isset($_POST['location_id']) && $_POST['location_id']=='7') echo ' selected';?>>Special Coroners Court </option>
                       <option value="8" <?php if(isset($_POST['location_id']) && $_POST['location_id']=='8') echo ' selected';?>>Coroners Court </option>
                       <option value="9" <?php if(isset($_POST['location_id']) && $_POST['location_id']=='9') echo ' selected';?>>Gun Court </option>
                       <option value="10" <?php if(isset($_POST['location_id']) && $_POST['location_id']=='10') echo ' selected';?>>Revenue Court </option>
                       <option value="11" <?php if(isset($_POST['location_id']) && $_POST['location_id']=='11') echo ' selected';?>>Hanover Parish Court</option>
                       <option value="12" <?php if(isset($_POST['location_id']) && $_POST['location_id']=='12') echo ' selected';?>>Hanover Family Court </option>
                       <option value="13" <?php if(isset($_POST['location_id']) && $_POST['location_id']=='13') echo ' selected';?>>Westmorland Parish Court </option>
                       <option value="14" <?php if(isset($_POST['location_id']) && $_POST['location_id']=='14') echo ' selected';?>>Westmorland Family Court </option>
                       <option value="15" <?php if(isset($_POST['location_id']) && $_POST['location_id']=='15') echo ' selected';?>>St.James Parish Court </option>
                       <option value="16" <?php if(isset($_POST['location_id']) && $_POST['location_id']=='16') echo ' selected';?>>St.James Family Court </option>
                       <option value="17" <?php if(isset($_POST['location_id']) && $_POST['location_id']=='17') echo ' selected';?>>St.Elizabeth Parish Court </option>
                       <option value="18" <?php if(isset($_POST['location_id']) && $_POST['location_id']=='18') echo ' selected';?>>Trelawny Parish Court </option>
                       <option value="19" <?php if(isset($_POST['location_id']) && $_POST['location_id']=='19') echo ' selected';?>>Trelawny Family Court</option>
                       <option value="20" <?php if(isset($_POST['location_id']) && $_POST['location_id']=='20') echo ' selected';?>>Manchester Family Court</option>
                       <option value="21" <?php if(isset($_POST['location_id']) && $_POST['location_id']=='21') echo ' selected';?>>St.Ann Parish Court </option>
                       <option value="22" <?php if(isset($_POST['location_id']) && $_POST['location_id']=='22') echo ' selected';?>>St.Ann Family Court </option>
                       <option value="23" <?php if(isset($_POST['location_id']) && $_POST['location_id']=='23') echo ' selected';?>>Clarendon Parish Court </option>
                       <option value="24" <?php if(isset($_POST['location_id']) && $_POST['location_id']=='24') echo ' selected';?>>Chapleton Family Court </option>
                       <option value="25" <?php if(isset($_POST['location_id']) && $_POST['location_id']=='25') echo ' selected';?>>St.Catherine Parish Court</option>
                       <option value="26" <?php if(isset($_POST['location_id']) && $_POST['location_id']=='26') echo ' selected';?>>St.Mary Parish Court </option>
                       <option value="27" <?php if(isset($_POST['location_id']) && $_POST['location_id']=='27') echo ' selected';?>>Corporate Area Criminal Court</option>
                       <option value="28" <?php if(isset($_POST['location_id']) && $_POST['location_id']=='28') echo ' selected';?>>Corporate Area Civil Court </option>
                       <option value="29" <?php if(isset($_POST['location_id']) && $_POST['location_id']=='29') echo ' selected';?>>Portland PArish Court </option>
                       <option value="30" <?php if(isset($_POST['location_id']) && $_POST['location_id']=='20') echo ' selected';?>>St.Thomas Parish Court </option>


        </select> 
    </td>

   <td> <button type="submit" class="btn  btn-success">Generate Report </button> </td>
    
</tr>
</tbody>
    </table>
    <?php echo form_close(); ?>



 </div>

