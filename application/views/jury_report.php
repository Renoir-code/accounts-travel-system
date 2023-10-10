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
	<h4> Jury Report </h4>
    <?php 
        $attributes = array('name' => 'myform');
        echo form_open('jury/jury_report_submit');
    ?>
<br>
<table class="table table-striped table-hover table-bordered">
          <thead>
              <tr class="table-primary">
                <th scope="col ">Choose the Month and Year </th>
				<th scope="col ">Choose an Individual Court / All Courts</th> 
				<th scope="col ">  </th> 
              </tr>
          </thead>
<tbody>
	  
	  
    <tr class="table-active">

            <td> 
               
                <input class="form-control" type="month" id="start" name="monthly_change"
                    min="2023-01" value="2023-01">                                
            </td>              
            
            <td>
          
                <select  class="form-select" name="location_id">

                    <option value=""  <?php if(isset($_POST['location_id']) && $_POST['location_id']=='') echo ' selected';?>>Choose Location..</option>
                    <option value="77"  <?php if(isset($_POST['location_id']) && $_POST['location_id']=='77') echo ' selected';?>>All Courts</option>
                    <option value="1" <?php if(isset($_POST['location_id']) && $_POST['location_id']==1) echo ' selected';?> >Court Administration Division </option>
                      <option value="2" <?php if(isset($_POST['location_id']) && $_POST['location_id']==2) echo ' selected';?> >Supreme Court </option>
                      <option value="4" <?php if(isset($_POST['location_id']) && $_POST['location_id']==4) echo ' selected';?> >Court of Appeal </option>
                      <option value="5" <?php if(isset($_POST['location_id']) && $_POST['location_id']==5) echo ' selected';?> >Family Court </option>
                      <option value="6" <?php if(isset($_POST['location_id']) && $_POST['location_id']==6) echo ' selected';?> >Traffic Court </option>
                      <option value="7" <?php if(isset($_POST['location_id']) && $_POST['location_id']==7) echo ' selected';?> >Special Coroners Court </option>
                      <option value="8" <?php if(isset($_POST['location_id']) && $_POST['location_id']==8) echo ' selected';?> >Coroners Court </option>
                      <option value="9" <?php if(isset($_POST['location_id']) && $_POST['location_id']==9) echo ' selected';?> >Gun Court </option>
                      <option value="10" <?php if(isset($_POST['location_id']) && $_POST['location_id']==10) echo ' selected';?> >Revenue Court </option>
                      <option value="11" <?php if(isset($_POST['location_id']) && $_POST['location_id']==11) echo ' selected';?> >Hanover Parish Court </option>
                      <option value="12" <?php if(isset($_POST['location_id']) && $_POST['location_id']==12) echo ' selected';?> >Hanover Family Court </option>
                      <option value="13" <?php if(isset($_POST['location_id']) && $_POST['location_id']==13) echo ' selected';?> >Westmorland Parish Court </option>
                      <option value="14" <?php if(isset($_POST['location_id']) && $_POST['location_id']==14) echo ' selected';?> >Westmorland Family Court </option>
                      <option value="15" <?php if(isset($_POST['location_id']) && $_POST['location_id']==15) echo ' selected';?> >St.James Parish Court </option>
                      <option value="16" <?php if(isset($_POST['location_id']) && $_POST['location_id']==16) echo ' selected';?> >St.James Family Court </option>
                      <option value="17" <?php if(isset($_POST['location_id']) && $_POST['location_id']==17) echo ' selected';?> >St.Elizabeth Parish Court </option>
                      <option value="18" <?php if(isset($_POST['location_id']) && $_POST['location_id']==18) echo ' selected';?> >Trelawny Parish Court </option>
                      <option value="19" <?php if(isset($_POST['location_id']) && $_POST['location_id']==19) echo ' selected';?> >Trelawny Family Court </option>
                      <option value="20" <?php if(isset($_POST['location_id']) && $_POST['location_id']==20) echo ' selected';?> >Manchester Family Court </option>
                      <option value="21" <?php if(isset($_POST['location_id']) && $_POST['location_id']==21) echo ' selected';?> >St.Ann Parish Court </option>
                      <option value="22" <?php if(isset($_POST['location_id']) && $_POST['location_id']==22) echo ' selected';?> >St.Ann Family Court </option>
                      <option value="23" <?php if(isset($_POST['location_id']) && $_POST['location_id']==23) echo ' selected';?> >Clarendon Parish Court </option>
                      <option value="24" <?php if(isset($_POST['location_id']) && $_POST['location_id']==24) echo ' selected';?> >Chapleton Family Court </option>
                      <option value="25" <?php if(isset($_POST['location_id']) && $_POST['location_id']==25) echo ' selected';?> >St.Catherine Parish Court </option>
                      <option value="26" <?php if(isset($_POST['location_id']) && $_POST['location_id']==26) echo ' selected';?> >St.Mary Parish Court </option>
                      <option value="27" <?php if(isset($_POST['location_id']) && $_POST['location_id']==27) echo ' selected';?> >Corporate Area Criminal Court </option>
                      <option value="28" <?php if(isset($_POST['location_id']) && $_POST['location_id']==28) echo ' selected';?> >Corporate Area Civil Court </option>
                      <option value="29" <?php if(isset($_POST['location_id']) && $_POST['location_id']==29) echo ' selected';?> >Portland Parish Court </option>
                      <option value="30" <?php if(isset($_POST['location_id']) && $_POST['location_id']==30) echo ' selected';?> >St.Thomas Parish Court </option>
                      <option value="31" <?php if(isset($_POST['location_id']) && $_POST['location_id']==31) echo ' selected';?> >Manchester Parish Court </option>
                    </select>

                </select>
            </td>
        
            <td> 
            <button type="submit" class="btn btn-primary btn-SM btn-block">Generate Report </button>
            </td> 

    </tr>
    <small> <?php echo form_error('rate_name','<div class="text-danger">','</div>');?>  </small>   


		   
</tbody>
        
      </table>   

<?php echo form_close(); ?>
</div>