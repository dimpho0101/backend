<?php 
include './includes/header_inc.php';
   session_start();
try{
// $conn = new PDO ("mysql:host=localhost;dbname=camagru",$username,$password);
if(isset($_POST['signin'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        //$pass = $_POST['password'];
        $pass = hash('whirlpool', trim($_POST['password']));
        $user = 'root';
        $password = 'coding01';
        $conn = new PDO ("mysql:host=localhost;dbname=camagru",$user,$password);
   
        $select = $conn->prepare("SELECT * FROM users WHERE username='$username' AND email='$email' AND password='$pass' LIMIT 1");
        $select->setFetchMode(PDO::FETCH_ASSOC);
        $select->execute();
        $data=$select->fetch();
        if ($data) {
            if ($data['verify'] == 1)
            {


                $_SESSION['username']=$data['username'];
                $_SESSION['email']=$data['email'];
                $_SESSION['password']=$data['password'];
               // echo 'correct';
                header("location: index.php"); 
                
            } else {
               // echo 'Account inactive. Please verify your account';
                header('location: ./login.php');
                exit();
            }
        } else {
          // echo 'invalid email or password';
            header('location: ./login.php');
            exit();
        }

}
}catch(PDOException $e)
{
echo "error".$e->getMessage();
}
?>
<h3 style="text-align:center;">This is Login</h3>
<form method="post" style="text-align:center;">
<input type="text" name="username" placeholder="Insert Username" required><br><br>
<input type="email" name="email" placeholder="Insert email" required><br><br>
<input type="password" name="password" placeholder="Insert Password" required><br><br>
<input type="submit" name="signin" value="SIGN IN"> <br>
<a href="forgotpassword.php" >Forgot password</a>
</form>