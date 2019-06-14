<?php

//include './includes/header_inc.php';
 var_dump($_POST['emojiurl']);
// session_destroy();
// session_start();
$_SESSION["userid"] = "user1";
try{
if(isset($_POST['save'])){
    $saving = $_POST['save'];

   // $con = new PDO ("mysql:host=localhost;dbname=camagru",$username,$password);
  
        
    $sql = $conn->prepare("INSERT INTO `images` (`imgName`, `imgId`, `userId`,`likes` ) VALUES (?, ?, ?, ?)");
    $sql->execute(array($saving,"jfgfd", $_SESSION["userid"], 1));

    echo $saving;



}

} catch(PDOexception $e){
echo "error".$e->getMessage();
}
// echo 'fddee';

?>


<!-- <HTML>

<h1>
heloo

</h1>


</HTML> -->