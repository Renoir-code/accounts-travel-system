<?php include("inc/header.php"); ?>
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
      
 
     

      <h4> System Administrator Dashboard </h4>
      <br>
      <?php // if(isset($_SESSION['role_id']) && ($_SESSION['role_id'] !=4) ){ ?>
      <?php echo anchor ("user/adminRegister" , "ADD USER", ['class'=> 'btn btn-primary']); ?>
      <?php //echo anchor ("staff/staff_create" , "ADD OFFICER", ['class'=> 'btn btn-light']); ?>
      <?php //echo anchor ("user/payment", "STAFF PAYMENT DETAILS", ['class'=> 'btn btn-light']); ?>

      <hr>
      <div class="row">
        <table class="table table-striped table-hover ">
          <thead>
              <tr>
                <th scope="col">User ID</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Role </th>
                <th scope="col">Email</th>
                <th scope="col">Enabled(Yes)/Disabled(No) </th>
                <th scope="col">Action</th>
              </tr>
          </thead>
      <tbody>
        <?php if(count($users)):?>
        <?php foreach($users as $user):?>
        <tr class = 'table-active'>
         
          <td><?php echo $user-> user_id;?></td>
          <td><?php echo $user-> firstname;?></td>
          <td><?php echo $user-> lastname;?></td>
          <td><?php echo $user-> rolename;?></td>
          <td><?php echo $user-> email;?></td> 
          <td><?php echo $user-> active;?></td> 
          
          <td class="text-right"><?php echo anchor ("admin/editUsers/{$user->user_id}" , "Edit User", ['class'=> 'btn btn-success text-right']); ?>
        </td>
        </tr>
        </tr>
        
        <?php endforeach;?>
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