<?php include("inc/header.php"); ?>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<?php //echo $idd;

?>

<div class="panel panel-primary">
  <div class="panel-heading"></div>
<div class=" container">
<div class="panel-body">
<div class="error_holder alert-danger "><?php if(isset($message) && $message != '') echo $message; ?></div>
<br>

<h3 > Please CLICK THE BUTTON TO RETURN TO RECORDS </h3>

<?php 
if($email_sent_page == 1){
  $hashed_email = md5 ($_SESSION['email']);
//echo anchor ("staff/view_all_payment_records/{$hashed_email}" , "Return to Payment Records for Certiciation", ['class'=> 'btn btn-danger btn-sm text-right ']); 
echo anchor ("staff/view_payment_records/{$staff_id}" , "Return to Payment Record for ", ['class'=> 'btn btn-danger btn-sm text-right ']); 
}
elseif($email_sent_page==2){

echo anchor ("staff/certified_page/{$staff_id}" , "Return to Payments to be Sent for Authorization", ['class'=> 'btn btn-danger btn-sm text-right ']); 
}

?>
        
       

      
   
 

    
             <br>

            
            </div>
  <div class="panel-footer"></div>
</div>
</div>
            </div>
            </div>



<?php include("inc/footer.php"); ?>