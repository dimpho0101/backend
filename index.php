<?php

session_start();
include './includes/header_inc.php';
$username = 'root';
$password = 'coding01';
$array = [];
try{
    $conn = new PDO ("mysql:host=localhost;dbname=camagru",$username,$password);
    $select = "SELECT * FROM images";

    foreach($conn->query($select) as $row){
        $array[] = $row['imgName'];
    }

}catch(PDOexception $e){
    echo "error".$e->getMessage();
}


if (isset($_SESSION['email'])){
    echo "YES";
    var_dump($_SESSION);
}else{
    echo "NO";
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width">
    <title>Feed</title>
    <link rel="stylesheet" href="style.css">
</head>
<style>
    body {
        background-color: white;
    }
    
    .image {
        text-align: center;
        margin-top: 2%;
        border-radius: 25px;
    }
    
    .text {
        margin-top: 2%;
        text-align: center;
    }
    
    .pagination {
        text-align: center;
        margin-top: 5%;
    }
    
    .pagination a {
        color: black;
        /* float: left; */
        padding: 8px 16px;
        text-decoration: none;
    }
    
</style>

<body>
    <?php
        foreach($array as $link){
            ?>
              <div class="image">
            <img src="<?= $array[0] ?>" width="50px" height="50px" alt="">
            <br><a href="#"><img src="https://res.cloudinary.com/djqvinizl/image/upload/v1542466146/heart-shape-icon-.png" data-url="23" width="50px" height=" 50px" onclick="myFunction(this)"></a>
        <div id="like"></div>
        <!-- <form action="" method="post"> -->
        <textarea class="comment" name="comment" id="ucomments" min="10" max="50"></textarea>
        <button onClick="comment()">enter</button>
        <span id="result"></span>
       <!-- </form> -->
        </div>
        </div> 
            <?php
        }
?>
  

        
  

        <!-- <div class="home"></div> -->
    
        <!-- <img src="https://res.cloudinary.com/dljvavcko/image/upload/v1539527956/Screen_Shot_2018-10-14_at_16.36.20.png" width="150px" height=" 150px">
        <img src="https://res.cloudinary.com/dljvavcko/image/upload/v1539527956/Screen_Shot_2018-10-14_at_16.38.21.png" width="150px" height=" 150px"> -->
    <!-- <div class="image">
        <img src="https://res.cloudinary.com/dljvavcko/image/upload/v1539527956/Screen_Shot_2018-10-14_at_16.36.36.png" width="150px" height=" 150px">
        <br><a href="#"><img src="https://res.cloudinary.com/djqvinizl/image/upload/v1542466146/heart-shape-icon-.png" data-url="liked" width="50px" height=" 50px" onclick="myFunction(this)"></a>
        <div id="like"></div>
        <img src="https://res.cloudinary.com/dljvavcko/image/upload/v1539527956/Screen_Shot_2018-10-14_at_16.36.20.png" width="150px" height=" 150px">
        <img src="https://res.cloudinary.com/dljvavcko/image/upload/v1539527956/Screen_Shot_2018-10-14_at_16.38.21.png" width="150px" height=" 150px">
    </div>
    <div class="image">
        <img src="https://res.cloudinary.com/dljvavcko/image/upload/v1539527956/Screen_Shot_2018-10-14_at_16.36.36.png" width="150px" height=" 150px">
        <img src="https://res.cloudinary.com/dljvavcko/image/upload/v1539527956/Screen_Shot_2018-10-14_at_16.36.20.png" width="150px" height=" 150px">
        <img src="https://res.cloudinary.com/dljvavcko/image/upload/v1539527956/Screen_Shot_2018-10-14_at_16.38.21.png" width="150px" height=" 150px">
    </div>
    <div class="image">
        <img src="https://res.cloudinary.com/dljvavcko/image/upload/v1539527956/Screen_Shot_2018-10-14_at_16.36.36.png" width="150px" height=" 150px">
        <img src="https://res.cloudinary.com/dljvavcko/image/upload/v1539527956/Screen_Shot_2018-10-14_at_16.36.20.png" width="150px" height=" 150px">
        <img src="https://res.cloudinary.com/dljvavcko/image/upload/v1539527956/Screen_Shot_2018-10-14_at_16.38.21.png" width="150px" height=" 150px">
    </div> -->
    <div class="pagination">
        <a href="#">&laquo;</a>
        <a href="#feed2.php">1</a>
        <a href="#feed2.php">2</a>
        <a href="#feed2.php">3</a>
        <a href="#">&raquo;</a>
    </div>

    <script>
    var xhttp = new XMLHttpRequest();
    function myFunction(d){
        if (localStorage.getItem(d.getAttribute("data-url")) != 'YES')
        {
            xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            // Typical action to be performed when the document is ready:
                var likeBox = document.getElementById("like").innerHTML = xhttp.responseText;
                localStorage.setItem(d.getAttribute("data-url"), "YES");
                }
            };
            xhttp.open("POST", "likes.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("imgid="+d.getAttribute("data-url"));
        } else {
            alert("fuck u!!");
        }
    }
    
    //comment
    function comment() {
        var x = document.getElementById("username").value;
        var y = document.getElementById("ucomments").value;
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // Typical action to be performed when the document is ready:
                document.getElementById("result").innerHTML = this.response;
            }
        };
        xhttp.open("POST", "comment.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("submit=true&comment="+y+"&user="+x);
    }
    </script>
</body>
</html>