
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
    <header>
        <div class="container">
            <div id="logo">
                <h1><span class="highlight">C</span>a<span class="highlight">m</span>a<span class="highlight">g</span>r<span class="highlight">u</span></h1>
            </div>
            <nav>
                <ul>
                    <li><a href="#Home">Camagru</a></li>
                    <li><a href="feed.html" target="_blank">Feed</a></li>
                    <li><a href="signin.php" target="_blank">Sign in</a></li>
                    <li><a href="profile.php" target="_blank">Profile</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <div class="text">
        <h1><i>For Creators, By creators</i></h1>
    </div>
    <div class="image">
        <img src="https://res.cloudinary.com/dljvavcko/image/upload/v1539527956/Screen_Shot_2018-10-14_at_16.36.36.png" width="150px" height=" 150px">
        <br><a href="#"><img src="https://res.cloudinary.com/djqvinizl/image/upload/v1542466146/heart-shape-icon-.png" data-url="liked" width="50px" height=" 50px" onclick="myFunction(this)"></a>
        <div id="like"></div>
        <!-- <form action="" method="post"> -->
        <textarea class="comment" name="comment" id="ucomments" min="10" max="50"></textarea>
        <button onClick="comment()">enter</button>
        <span id="result"></span>
       <!-- </form> -->
        </div>
        </div> 

        <!-- <div class="home"></div> -->
    
        <!-- <img src="https://res.cloudinary.com/dljvavcko/image/upload/v1539527956/Screen_Shot_2018-10-14_at_16.36.20.png" width="150px" height=" 150px">
        <img src="https://res.cloudinary.com/dljvavcko/image/upload/v1539527956/Screen_Shot_2018-10-14_at_16.38.21.png" width="150px" height=" 150px"> -->
    <!-- <div class="image">
        <img src="https://res.cloudinary.com/dljvavcko/image/upload/v1539527956/Screen_Shot_2018-10-14_at_16.36.36.png" width="150px" height=" 150px">
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
    <!-- <div class="pagination">
        <a href="#">&laquo;</a>
        <a href="feed2.php">1</a>
        <a href="#">2</a>
        <a href="#">3</a>
        <a href="#">4</a>
        <a href="#">5</a>
        <a href="#">6</a>
        <a href="#">&raquo;</a>
    </div> -->

    <script>
    var xhttp = new XMLHttpRequest();
    function myFunction(d){
        xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
       // Typical action to be performed when the document is ready:
       var likeBox = document.getElementById("like").innerHTML = xhttp.responseText;
    }
};
        
        xhttp.open("POST", "likes.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("imgid="+d.getAttribute("data-url"));

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