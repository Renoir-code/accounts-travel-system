<?php include("inc/header.php"); ?>

<div class="row">
        <table class="table table-striped table-hover " id = "view_all_records">
          <thead>
              <tr>
               <!-- <th scope="col" >Staff ID</th> -->
                <th scope="col">First Name</th>
                <th scope="col">Last Name </th>
                <th scope="col">Tax Registration Number</th>
                <th scope="col">Parishes</th>
                <th scope="col"> Update</th>
              </tr>
          </thead>
      <tbody>
       
        
       
          <?php ?>
           <?php if(!empty($noparishes)): ?>
            <?php foreach($noparishes as $row): ?>
       
                <tr class = 'table-active' id = "<?php echo $row['staff_id']?>">
                <td><?php  echo $row['firstname']; ?></td>
          <td><?php  echo $row['lastname']; ?></td>
          <td><?php  echo $row['trn']; ?></td> 
          <td> <select  class="form-control tester" name="location_id" id = "<?php echo 'parish_'. $row['staff_id'];?>" >
                       <option value="66"  >Choose Location..</option>
                       <option value="1"  >Court Administration Division  </option>
                       <option value="2"  >Supreme Court </option>
                       <option value="4"  >Court of Appeal </option>
                        <option value="5"   >Family Court </option>
                        <option value="6"  >Traffic Court </option>
                        <option value="7"   >Special Coroners Court </option>
                        <option value="8"    >Coroners Court </option>
                        <option value="9"    >Gun Court </option>
                        <option value="10"    >Revenue Court </option>
                        <option value="11"    >Hanover Parish Court </option>
                        <option value="12"   >Hanover Family Court </option>
                        <option value="13"    >Westmorland Parish Court </option>
                        <option value="14"   >Westmorland Family Court </option>
                        <option value="15"   >St.James Parish Court </option>
                        <option value="16"    >St.James Family Court </option>
                        <option value="17"    >St.Elizabeth Parish Court </option>
                        <option value="18"    >Trelawny Parish Court </option>
                        <option value="19"   >Trelawny Family Court</option>
                        <option value="20"   >Manchester Family Court</option>
                        <option value="21"    >St.Ann Parish Court</option>
                        <option value="22"   >St.Ann Family Court</option>
                        <option value="23"   >Clarendon Parish Court</option>
                        <option value="24"   >Chapleton Family Court</option>
                        <option value="25"   >St.Catherine Parish Court</option>

                    </select></td> 
         <td>  <button type="submit" class="poi btn  btn-success" data-staffid = <?php echo $row['staff_id']; ?> data-parish = <?php ?>>Update </button>   </td>
		
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