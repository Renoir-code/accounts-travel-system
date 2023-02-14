<?php include("inc/header.php"); ?>
<br>
<?php   ?>
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
      
 
     

      <h4> General Report for  <?php echo $data[0]['firstname']. ' '.$data[0]['lastname'] ;?> </h4>
      <?php // if(isset($_SESSION['role_id']) && ($_SESSION['role_id'] !=4) ){ ?>
      <?php // echo anchor ("user/adminRegister" , "ADD USER", ['class'=> 'btn btn-primary']); ?>
      <?php //echo anchor ("staff/staff_create" , "ADD OFFICER", ['class'=> 'btn btn-light']); ?>
      <?php //echo anchor ("user/payment", "STAFF PAYMENT DETAILS", ['class'=> 'btn btn-light']); ?>

      <hr>
      <div class="row">
        <table class="table table-striped table-hover ">
          <thead>
              <tr>
                <th scope="col">Date From - Date To</th>
                <th scope="col">Mileage Amount</th>
                <th scope="col">Passenger Amount</th>
                <th scope="col">Toll Amount </th>
                <th scope="col">Subsistence Amount</th>
                <th scope="col">Actual Expense  </th>
                <th scope="col">Supper Expense </th>
                <th scope="col">Refreshments </th>
                <th scope="col">Taxi Out Town </th>
                <th scope="col">Taxi In Town </th>
              </tr>
          </thead>
      <tbody>
        <?php //if(count($data)):?>
        <?php foreach($data as $row):?>
        <tr class = 'table-active'>
         <?php //testarray($row)?>
          <td><?php echo $month[0] . '|' . $month[1] ?> </td>
          <td><?php echo $row['mileage'] ?> </td>
          <td><?php echo $row['passenger_km'] ?> </td>
          <td><?php echo $row['toll_amt'] ?> </td>
          <td><?php echo $row['subsistence'] ?> </td>
          <td><?php echo $row['actual_expense'] ?> </td>
          <td><?php echo $row['supper'] ?> </td>
          <td><?php echo $row['refreshment'] ?> </td>
          <td><?php echo $row['taxi_out_town'] ?> </td>
          <td><?php echo $row['taxi_in_town'] ?> </td>
          
       
          
          <td class="text-right"><?php //echo anchor ("admin/editUsers/{$user->user_id}" , "Edit User", ['class'=> 'btn btn-success text-right']); ?>
        </td>
        </tr>
        </tr>
        
        <?php endforeach;?>
        <?php //else: ?>
          <tr>
            <td> No Records</td>
          </tr>
        <?php //endif;?>
        
        </tbody>
        
      </table>
    </div>
</div>
<?php include("inc/footer.php"); ?>