<?php 

include './includes/header_inc.php';
session_destroy();
 session_start();
try{
$con = new PDO ("mysql:host=localhost;dbname=camagru",$username,$password);
if(isset($_POST['signin'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        //$pass = $_POST['password'];
        $pass = hash('whirlpool', trim($_POST['password']));

        $select = $con->prepare("SELECT * FROM users WHERE username='$username' AND email='$email' AND password='$pass' LIMIT 1");
        $select->setFetchMode(PDO::FETCH_ASSOC);
        $select->execute();
        $data=$select->fetch();
        if ($data) {
            if ($data['verify'])
            {
                $_SESSION['username']=$data['username'];
                $_SESSION['email']=$data['email'];
                $_SESSION['password']=$data['password'];
                header("location: ./dashboard.php"); 
            } else {
                echo "<script type='application/javascript'>alert('Acoount inactive. Please verify account to login');</script>";
                header('location: ./login.php');
                exit();
            }
        } else {
            // echo "you don fucked up";
           echo "<script>alert('invalid email or password');</script>";
            header('location: ./login.php');
            exit();
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
</form>
</div>
</div>
<a href="forgotpassword.php">Forgot password</a>