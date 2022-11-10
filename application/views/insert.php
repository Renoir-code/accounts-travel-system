<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php include_once('inc/header.php') ?>
    <div class ="container">

    'user_id' => $userExist->user_id,
								'username' => $userExist->username,
								'email' => $userExist->email,
								'password'=>$userExist->password,    // add pass to session
								'role_id' => $userExist->role_id,
<hr>
<h3> Insertor Dashboard </h3>
         <?php $user_id = $this->session->userdata('user_id') ;?>
         <h5> Welcome <?php echo var_dump($user_id); ?></h5>

</body>
</html>
         

