<?php
    include '../config/database.php';
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    // session_start();
    
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
<style>
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover:not(.active) {
  background-color: #111;
}

.active {
  /* background-color: #4CAF50; */
}
</style>
</head>
<body>
<ul>
  <?php

if(isset($_SESSION["username"])){
  ?>
  <li><a class="active" href="#home">Home</a></li>
  <li><a href="./index.php">Dashboard</a></li>
  <?php
}else{
  ?>
  
  <li><a href="./signup.php">Register</a></li>
  <li><a href="./login.php">Login</a></li>
  <?php
}
?>

</ul>
</body>
</html>