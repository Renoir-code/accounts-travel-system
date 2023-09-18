
<?php include_once('inc/header.php') ?>


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
	<h4>Bail Report </h4>
    <?php 
        $attributes = array('name' => 'myform');
        echo form_open('bail/bail_report_submit');
    ?>
<br>
<table class="table table-striped table-hover " >
          <thead>
              <tr>
                <th scope="col ">Choose the Month and Year </th>
				<th scope="col ">Choose an Individual Court / All Courts</th> 
				<th scope="col "></th> 
              </tr>
          </thead>
     <tbody>
	  
	  
    <tr class = 'table-active'>

 <td> 

 <label for="start">Start month:</label>

<input type="month" id="start" name="monthly_change"
       min="2023-01" value="2023-01">
                                  
  </td>              
            
        <td>
            
                <select  class="form-control" name="location_id">
                <option value=""  <?php if(isset($_POST['location_id']) && $_POST['location_id']=='') echo ' selected';?>>Choose Location..</option>
                <option value="77"  <?php if(isset($_POST['location_id']) && $_POST['location_id']=='77') echo ' selected';?>>All Courts</option>
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