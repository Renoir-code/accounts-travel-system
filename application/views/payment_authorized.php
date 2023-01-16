<?php include("inc/header.php"); ?>

<?php //testarray($data) ;?>
<?php
echo '<h3>  Voucher Number  : '.$voucher_number.' for  is Authorized for Payment  </h3> ' ;
echo '<h2> The Record for : '. $data['firstname'].''. $data['lastname']. '</h2>';





echo anchor ("staff/authorized_page/" , "Return to Payments to be Approved", ['class'=> 'btn btn-danger btn-sm text-right ']); 



?>