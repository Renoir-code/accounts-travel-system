
<?php include("inc/header.php"); ?>
<br>

<?php // $staff_session = $_SESSION[$trn_records['staff_id']]?>
<?php  //testarray($jury_records);?>

<?php if($msg = $this->session->flashdata('success_update')):?>
        <div class="row">
            <div class ="col-md-6">
                <div class="alert alert-dismissable alert-success close">
                     <?php echo $msg; ?>
                    
                    </div>

            </div>
        </div>
    <?php endif; ?>
    <?php if($msg = $this->session->flashdata('message')):?>
        <div class="row">
            <div class ="col-md-6">
                <div class="alert alert-dismissable alert-success close">
                     <?php echo $this->session->flashdata('message'); ?>
                    
                    </div>

            </div>
        </div>
    <?php endif; ?>

    <?php if($msg = $this->session->flashdata('fail_message')):?>
        <div class="row">
            <div class ="col-md-6">
                <div class="alert alert-dismissable alert-danger close">
                     <?php echo $msg; ?>
                    
                    </div>

            </div>
        </div>
    <?php endif; ?>

<br>


      <div class='error_holder'></div>
      <h4> Jury Dashboard </h4>
      <?php echo anchor ("jury/jury_create" , "Add Jury Claim", ['class'=> 'btn btn-primary']); ?>
	  
      
	  <?php echo anchor ("jury/jury_report" , " Jury Reports", ['class'=> 'btn btn-primary']); ?>
      <hr>
      <div class="row">
        <table class="table table-striped table-hover " id = "view_all_records">
          <thead>
              <tr class="table-primary">
                <th scope="col">Name of Claimant</th>
                <th scope="col">Date Received</th>
                <th scope="col">Rate to be paid </th>
                <th scope="col"> Days Worked</th>
                <th scope="col"> Amount to be Paid</th>
                <th scope="col"> TRN</th>
                <th scope="col"> Location </th>
                <th scope="col"> Comments </th>
                <th scope="col"> Reason Returned </th>
                <th scope="col"> Action </th>
               <!-- <th scope="col"> Test </th> -->
              </tr>
          </thead>
      <tbody>
       
     
      <?php// LIST OF RESULTS ?>
        <tr class = 'table-active'>
          <?php  //echo date("Y-m-d", strtotime($data['date_received'])); ?>
           <?php  if(!empty($jury_records)): ?>
            <?php  foreach($jury_records as $row): ?>
          <td><?php  echo $row['first_name'] . ' ' . $row['last_name'];  ?></td>
          <td><?php echo date("Y-m-d", strtotime($row['date_received']));?></td>
          <td><?php  echo $row['rate_paid']; ?></td>  
          <td><?php  echo $row['days_worked']; ?></td>      
          <td><?php  echo '$'.number_format($row['days_worked']*$row['rate_paid'],2) ?></td> 
          <td><?php  echo $row['trn']; ?></td> 
          <td><?php  echo $row['location_name']; ?></td> 
          <td><?php  echo $row['comments']; ?></td> 
          <td><?php  echo $row['reason_returned']; ?></td> 
          <td> <?php echo ''.anchor ("jury/update_jury_information/{$row['jury_id']}" , "Update", ['class'=> 'btn btn-outline-primary text-right'])  ; ?>   </td>
          <!-- <td><button onClick='saveTRN(<?php // echo $row['jury_id'] ?>)' class='btn btn-outline-primary text-right'</button></td>				 -->
        </tr>
        
                <?php endforeach; ?>
       <?php else: ?>
       
          <tr>
            <td> No Records</td>
          </tr>
          
       <?php endif; ?>
        
        </tbody>
        
      </table>
    </div>
</div>
<?php include("inc/footer.php"); ?>