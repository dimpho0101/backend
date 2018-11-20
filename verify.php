<?php 
include './includes/header_inc.php';

if ($_GET['token'] && $_GET['email']){
    $token = $_GET['token'];
    $email = $_GET['email'];
    $n = 1;

    try{
        $sql = $conn->prepare("UPDATE users SET verify =:verify WHERE email =:email AND verify_token =:tok");
        $sql->bindParam(':verify', $n, PDO::PARAM_STR);
        $sql->bindParam(':email', $email, PDO::PARAM_STR);
        $sql->bindParam(':tok', $token, PDO::PARAM_STR);
        $sql->execute();
    } catch(PDOexception $e){
        echo "Error" . $e->getMessage();
    }
    echo "You have successfully verified your account";
    header('location: login.php?msg=Account verified, you may now log in');
}