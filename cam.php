<?php
include 'includes/header_inc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width">
    <title>Camagru</title>
    <link rel="stylesheet" href="./cam/css/main.css">
</head>

<body>
    <header>
        <!-- <div class="container">
            <div id="logo">
                <h1><span class="highlight">C</span>a<span class="highlight">m</span>a<span class="highlight">g</span>r<span class="highlight">u</span></h1>
            </div>
            <nav>
                <ul>
                    <li><a href="#Home">Camagru</a></li>
                    <li><a href="#profile" target="_blank">Your Profile</a></li>
                    <li><a href="../front_end/signin.html" target="_blank">Sign in</a></li>
                    <li><a href="../front_end/about.html" target="_blank">About</a></li>
                </ul>
            </nav>
        </div> -->
    </header>

    <div class="top-container" style="position:relative">
        <video id="video">Stream not available</video>
        <img src="" alt="" id="sticker">
        <canvas id="imgCanvas"></canvas>
        <button id="photo-button" class="btn btn-dark">
            Take Photo
        </button>
        <select id="photo-filter" class="select">
            <option value="none">Normal</option>
            <!-- <option value="grayscale(100%)">Grayscale</option> -->
            <!-- <option value="invert(100%)">Invert</option> -->
            <!-- <option value="hue-rotate(90deg)">Hue</option> -->
            <!-- <option value="Blur(2px)">Blur</option> -->
            <!-- <option value="contrast(200%)">Contrast</option> -->
            <!-- <option value="drop-shadow(12px 12px 14px gray)">drop-shadow</option> -->
            <option value="./cam/imgs/tumblr_mioj38CUml1qic5avo1_1280">snapchat</option>
            <option id="flower" value="./cam/imgs/Snapchat-Flower-Crown-PNG-Clipart.png">love crown</option>
            <option value="./cam/imgs/Alien-PNG-Picture.png">Alien</option>
            <option value="https://media.giphy.com/media/3ohhwI4QBeZdeVC1na/giph.gif">Do your thing</option>
            <option value="https://media.giphy.com/media/3oKIPcOfappH4z6uZ2/giphy.gif">Kim K</option>
           
        </select>
        <button id="clear-button" class="btn btn-light">Clear</button>
        <form  id="something" action="saveimg.php" method="POST">
            <input id="hiddenpicuri" name="photourl"type="hidden" >
            <input id="emoji" name="emojiurl" type="hidden" >
            <input type="submit" name="save" value="save.jpg">
        </form>
        <!-- <button id="save-button" class="btn btn-light">Save Image</button> -->
        <canvas id="canvas"></canvas>
    </div>
    <div class="bottom-container">
        <div id="photos"></div>
    </div>
    <footer>
        <!-- <div>
            <a href="#"></a><img src="https://res.cloudinary.com/dwl0dq3sv/image/upload/v1542709468/share-raw-512.png" alt="Share with friends"/></a>
            <a href="#"></a><img src="https://res.cloudinary.com/dwl0dq3sv/image/upload/v1542710884/twitter-png-picture-5a2301683c6206.6917714115122435602473.jpg" alt="share on twitter" /></a>
            <a href="#home">
            <img src="https://res.cloudinary.com/dwl0dq3sv/image/upload/v1542710982/kisspng-computer-icons-logo-photography-instagram-icon-instagram-5b4c0f1e2ab983.830384891531711262175.jpg" alt="share on instagram" />
            </a>
        </div>    -->
       
    </footer>
</body>
<script src="cam/js/main.js"></script>

</html>

<!-- create this into form
value will be image name(html)

when posting (php) , just do an insert query to database 
with image name and user id
-->