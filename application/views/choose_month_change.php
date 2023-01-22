






<?php include_once('inc/header.php') ?>

<?php echo form_open('report/changesReport')?>
<br>
<table class="table table-striped table-hover " >
          <thead>
              <tr>
                <th scope="col ">Monthly Change Report</th>  
              </tr>
          </thead>
      <tbody>
	  <tr class = 'table-active'>
           <td>
<div class="row">
    <div class="col-md-4">
            <div class="form-group ">
             <label for=""> Choose Month for Report  </label>
                <div class="col-md input-group mb-6">
 </td> 
 
 <td> 
                    
                    <input type="date" id="start" name="monthly_change" min="2018-03" value="2018-05" type="date" > 
                      
                </div>
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
