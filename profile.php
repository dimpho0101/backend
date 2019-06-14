<?php
session_start();
   include './includes/header_inc.php';
//    if(isset($_POST['submit'])){

    //    $sql = $conn->prepare("SELECT COUNT(*) FROM users WHERE  `username` = ?");
    //     $sql->execute(array($username));
    //     if ($sql->fetchColumn()){
    //         echo $username;
    // $id = 1;
    // $username = $_POST['username'];
    // $email = $_POST['email'];
    // $password = $_POST['password'];

    // $query = "UPDATE `users` SET `username`=:`username` WHERE id = :id";
    // $pdoResult = $pdoConnect->prepare($query);
    // $pdoExec = $pdoResult->execute(array(":username"=>$username,":email"=>$email,":password"=>$password));
    // if($pdoExec)
    // {
    //     echo 'Data Updated';
    // }else{
    //     echo 'ERROR Data Not Updated';
    // }
// }        
//     $sql = "UPDATE users SET  username=?, email=?, `password`=?";
//     $sql->execute(array($username,$email,$password));
//     echo $sql->rowCount() . " details successfully updated";
//    }
if(isset($_POST['update'])){
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  $query = "UPDATE `users` SET  `username`=:username, `email`=:email, `password`=:password WHERE `id` =:id";


}

// echo $_SESSION["username"];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Camagru | Diputu</title>
    <link rel="stylesheet" href="style.css">
</head>
<style>
    h1{
        text-align: center;
    }
    .row{
        text-align: center;
    }
     /* The switch - the box around the slider */
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

/* Hide default HTML checkbox */
.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
} 
</style>
<body>
<nav>
<header>
        <div class="container">
            <div id="logo">
                <h1><span class="highlight">C</span>a<span class="highlight">m</span>a<span class="highlight">g</span>r<span class="highlight">u</span></h1>
            </div>
            <nav>
                <ul>
                    <li><a href="#Home"><b>Camagru</b></a></li>
                    <li><a href="dashboard.php" target="_blank"><b>Dashboard</b></a></li>
                    <li><a href="signin.html" target="_blank"><b>Feed</b></a></li>
                    <li><a href="home.php" target="_blank"><b>Sign out</b></a></li>
                </ul>
            </nav>
        </div>
    </header>
    <h1> Your profile</h1>
        <div class="row">
            <form action="" method="POST">
            <input type="text" name="username" value="<?= $_SESSION['username']; ?>" placeholder="Change username"><br>
            <input type="text" name="email" value="<?= $_SESSION['email']; ?>" placeholder="Change email address"><br>
            <input type="password" name="password" placeholder="Change password"><br><br>
            <input type="checkbox" value="checkbox" name="password"> <b>Stop receiving mail notification</b> <br>
            <input type="submit" name="update" placeholder="Update"><br>
            </form>
            <!-- Rounded switch -->
            <label class="switch" id="switch">
            <input type="checkbox" onChange="email(this)">
            <span class="slider round"></span>
            </label>
        </div>
        <div>
        <span>Your images</span>
        
        </div>
        <script>
        function email(d) {
            var emailsetting = (d.checked) ? 1 : 0;
            var xhttp = new XMLHttpRequest();
            xhttp.open("POST", "profile.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("notif="+emailsetting);
            }
        </script>
</body>
</html>