

<?php include("inc/header.php"); ?>
<?php // testarray($staff) ?>
<br>
<?php if($msg = $this->session->flashdata('message')):?>
            <div class="row ">
                <div class ="col-md-3">
                    <div class="alert alert-dismissable alert-success">
                        <?php echo $msg; ?>
                        <?php endif;?>
                    </div> 
                </div>
              </div>
              <?php if($msg = $this->session->flashdata('deactivate_success')):?>
            <div class="row ">
                <div class ="col-md-3">
                    <div class="alert alert-dismissable alert-success">
                        <?php echo $msg; ?>
                        <?php endif;?>
                    </div> 
                </div>
              </div>
              <?php if($msg = $this->session->flashdata('success_message')):?>
            <div class="row ">
                <div class ="col-md-3">
                    <div class="alert alert-dismissable alert-success">
                        <?php echo $msg; ?>
                        <?php endif;?>
                    </div> 
                </div>
              </div>
    <div class ="container">
      
     
        

      <h4> Staff List Dashboard </h4>
      <?php // if(isset($_SESSION['role_id']) && ($_SESSION['role_id'] !=4) ){ ?>
      <?php echo anchor ("user/adminRegister" , "Search for Staff Member", ['class'=> 'btn btn-primary']); ?>
      <?php // echo anchor ("staff/staff_create" , "ADD OFFICER", ['class'=> 'btn btn-light']); ?>
      <?php // echo anchor ("user/payment", "STAFF PAYMENT DETAILS", ['class'=> 'btn btn-light']); ?>

      <hr>
      <div class="row">
        <table class="table table-striped table-hover ">
          <thead>
              <tr>
                <th scope="col">Location</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Post_Title </th>
                <th scope="col">TRN</th>
              </tr>
          </thead>
      <tbody>
          
      <tr class = 'table-active'>
           <?php if(!empty($staff)): ?>
            <td><?php echo $staff-> location_id;?></td>
          <td><?php  echo $staff['firstname']; ?></td>
          <td><?php  echo $staff['lastname']; ?></td>
          <td><?php  echo $staff['post_title']; ?></td>
          <td><?php  echo $staff['trn']; ?></td>
          
          <td class="text-right"><?php echo anchor ("admin/editUsers/{$user->user_id}" , "Edit User", ['class'=> 'btn btn-success text-right']); ?>
        </td>
        </tr>
        </tr>
        
        <?php //endforeach;?>
        <?php else: ?>
          <tr>
            <td> No Records</td>
          </tr>
        <?php endif;?>
        
        </tbody>
        
      </table>
    </div>
</div>
<?php include("inc/footer.php"); ?>




