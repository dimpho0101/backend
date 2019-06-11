<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include './includes/header_inc.php';
session_destroy();
session_start();
try{
    $con = new PDO ("mysql:host=localhost;dbname=camagru",$username,$password);
    if(isset($_POST['submit'])){
            $email = $_POST['email'];  

            $select = $con->prepare("SELECT * FROM users WHERE email='$email' LIMIT 1");
            $select->setFetchMode(PDO::FETCH_ASSOC);
            $select->execute();
            $data=$select->fetch();
            if ($data) {
                if ($data['verify'])
                {
                    $_SESSION['email']=$data['email'];
                    header("location: ./newpassword.php"); 
                     
                }else {
                    echo 'verify your account first!';
                    exit();
                }
            }else {
                echo 'please enter a valid email';
                exit();
            }
        }
    }catch(PDOException $e)
    {
    echo "error".$e->getMessage();
    }
        
?> 


<h3>Reset your password </h3>
<form method="post" action="">
<input type="email" name="email" placeholder="Insert email" required><br><br>
<input type="submit" name="submit" value="Submit" <?php echo "hello"; ?>>
</form>

</div>