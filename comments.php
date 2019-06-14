<?php
include './includes/header_inc.php';

function setComments() {
    if(isset($_POST['commentSubmit'])){
       $uid = $_POST['uid'];
       $date = $_POST['date'];
       $message = $_POST['message'];

       $sql = "INSERT INTO comments (userId, comment, dateCreated) VALUES ('$uid', '$date', '$message')";
        $result = $conn->query($sql);
    }
}