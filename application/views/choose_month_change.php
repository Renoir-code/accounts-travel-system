






<?php include_once('inc/header.php') ?>


<?php

echo $this->session->flashdata('message');
unset($_SESSION['message']);
?>

<?php echo form_open('report/changesReport')?>
<br>
<table class="table table-striped table-hover " >
          <thead>
              <tr>
                <th scope="col ">Choose Date</th>
				<th scope="col ">Location</th> 
              </tr>
          </thead>
      <tbody>
	  <tr class = 'table-active'>
<!--            <td>
<div class="row">
    <div class="col-md-4">
            <div class="form-group ">
             <label for=""> Choose Month for Report  </label>
                <div class="col-md input-group mb-6">
 </td>  -->
 
 <td> 
                    
                    <input type="date" id="start" name="monthly_change" min="2018-03" value="2018-05" type="date" > 
                      
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
