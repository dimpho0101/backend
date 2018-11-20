<?php 

include './includes/header_inc.php';
session_destroy();
 session_start();
try{
$con = new PDO ("mysql:host=localhost;dbname=camagru",$username,$password);
if(isset($_POST['signin'])){
        // $username = $_POST['username'];
        $email = $_POST['email'];
        //$pass = $_POST['password'];
        $pass = hash('whirlpool', trim($_POST['password']));

        $select = $con->prepare("SELECT * FROM users WHERE email='$email' AND password='$pass'");
        $select->setFetchMode(PDO::FETCH_ASSOC);
        $select->execute();
        $data=$select->fetch();
        if($data['email']!=$email || $data['password']!=$pass)
        {
            echo "<script>alert('invalid email or password');</script>";
            header('location: ./login.php');
            exit();

        }
        elseif($data['email']==$email and $data['password']==$pass)
        {
        $_SESSION['email']=$data['email'];
            $_SESSION['password']=$data['password'];
            header("location: ./dashboard.php"); 
        }
}
}catch(PDOException $e)
{
echo "error".$e->getMessage();
}
?>
<h3>This is Login</h3>
<form method="post">
<input type="text" name="username" placeholder="Insert Username" required><br><br>
<input type="email" name="email" placeholder="Insert email" required><br><br>
<input type="password" name="password" placeholder="Insert Password" required><br><br>
<input type="submit" name="signin" value="SIGN IN">
</div>
</div>