<?php
include './includes/header_inc.php';

function updateuser($user)
    try{
    $check = $con->prepare('SELECT * FROM users WHERE username = :username AND email != :email');
    $check->bindParam(':username', $user[0]);
    $check->bindParam(':email', $user[1]);
    $check->execute();
   } catch (Exception $e){
       echo 'Error: ' . $e->getMessage();
   }

   $num = $check->rowCount();
   if ($num > 0){
       header('Location: ../dashboard.php?profileexits')
   }else {
       $password = password_hash(trim($user[3]), PASSWORD_BCRYPT, array('cost' => 5));
       try {
            update
       }
   }

?>
<h3>Update Profile Details</h3>
<form method="post" action="updateProfile.php">
<input type="text" name="username" placeholder="Insert Username" ><br><br>
<input type="email" name="email" placeholder="Insert email"><br><br>
<input type="password" name="password" placeholder="Insert Password"><br><br>
<input type="submit" name="submit" value="change">
