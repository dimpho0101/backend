<?php
    include './includes/header_inc.php';
    // session_destroy();
    // session_start();
    try{
        $con = new PDO ("mysql:host=localhost;dbname=camagru",$username, $password);
        if(isset($_POST['submit'])){
            $pass = $_POST['password'];

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE user SET password=$pass WHERE id=?";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            echo $stmt->rowcount(). "Password successfully updated";
        }
    }catch(PDOException $e){
        echo 'error'.$e->getMessage();
    }
?>

<form method="post" action="">
<input type="password" name="password" placeholder="Insert new password" required>
<input type="submit" name="submit">
</form>