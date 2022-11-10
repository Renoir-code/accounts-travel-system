<?php include("inc/header.php"); ?>
    <div class ="container">

    <?php $email= $this->session->userdata('email'); 
     echo $email;
    ?>

         <h3> System Administrator Dashboard </h3>
        <?php echo anchor ("welcome/adminRegister" , "ADD USER", ['class'=> 'btn btn-primary']); ?>
        <?php echo anchor ("admin/testButton" , "TESTING", ['class'=> 'btn btn-primary']); ?>
        <?php echo anchor ("welcome/deviceDetails" , "DO SOMETHING", ['class'=> 'btn btn-light']); ?>
        <?php echo anchor ("welcome/filterComputers" , "FILTER BY LOCATION", ['class'=> 'btn btn-danger']); ?>

  <hr>
  <div class="row">
    <table class="table table-striped ">
      <thead class="table table-hover ">
          <tr>
            <th scope="col">User ID</th>
            <th scope="col">FirstName</th>
            <th scope="col">LastName</th>
            <th scope="col">Role </th>
            <th scope="col">Email</th>
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
      <td><?php echo anchor ("admin/editUsers/{$user->user_id}" , "Edit User", ['class'=> 'btn btn-primary']); ?></td>
      <td><?php echo anchor ("admin/disableUser/{$user->user_id}" , "Disable User", ['class'=> 'btn btn-light']); ?></td>  
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
<?php include("inc/footer.php"); ?>