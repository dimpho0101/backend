<?php
include './includes/header_inc.php';
if(isset($_POST['submit'])){
    $comment = $_POST['comment'];

    $stmt = $conn->prepare("INSERT INTO `comments`(`comment`) VALUES(?)");
    $stmt->execute(array($comment));
}