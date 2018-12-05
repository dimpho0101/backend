<?php 
include './includes/header_inc.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') { //server if the request type is a post
    if (isset($_POST['uname'], $_POST['email'], $_POST['password'])) { //check if all variables are set
        $uname = htmlentities(trim($_POST['uname']), ENT_QUOTES, 'UTF-8');
        $email = htmlentities(trim($_POST['email']), ENT_QUOTES, 'UTF-8');
        $password = hash('whirlpool', trim($_POST['password']));
        $token = md5(md5(time().$email.rand(0,9999)));
        
        //check if user exists
        $sql = $conn->prepare("SELECT COUNT(*) FROM users WHERE `email` = ? OR `username` = ?");
        $sql->execute(array($email, $uname));
        if ($sql->fetchColumn()){
            echo 'Email and/or username already exists';
        } else{
            //insert the data into the database
            $stmt = $conn->prepare("INSERT INTO `users`(`username`, `email`, `password`, `verify_token`) VALUES(?,?,?,?)");
            $stmt->execute(array($uname, $email, $password,$token));
            //if ($stmt->rowCount()){
                $localhost= "localhost:8080/backend";
                $subject = "Comfirmation process";
                $headers  = 'MIME-Version: 1.0' . "\r\n";
                $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
                $headers .= 'From: <diputu@42.FR>' . "\r\n";
                $message = '
                <html>
                    <head>
                        <title>' . $subject . '</title>
                    </head>
                    <body>
                        Hello ' . htmlspecialchars($uname) . ' </br>
                        sign up request has been recieved to finish the  subscribtion process please click the link below </br>
                        <a href="http://' . $localhost . '/verify.php?email=' .$email. '&token=' . $token. '">confirm email</a>
                    </body>
                </html>
                ';
                mail($email, $subject, $message, $headers);
                header('location: open.php?msg="Registration Successful. Check Your Email To Verify Your Account"');
                // echo "<script>alert('Please check your email to verify your account');</script>";

                echo 'Please check your email to verify your account';
            //} else{
              //  echo "There was an error creating account";
            //}
        }
    }
}
?>
<h3>This is Signup</h3>

<form action="" method="post">
    <input type="text" name="uname" placeholder="Enter Username" required> 
    <input type="email" name="email" placeholder="Enter Email" required>
    <input type="password" name="password" placeholder="Enter Password" required>
    <input type="submit" name="submit" value="Signup">
</form>


