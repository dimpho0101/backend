<?php 
   date_default_timezone_set('Africa/Johannesburg');
   include './includes/header_inc.php';
   include 'comments.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
   echo "<form method='POST' action='".setComments()."'>
        <input type='hidden' name='uid' value='Anonymous'>
        <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
        <textarea name='message'></textarea> <br>
        <button type='submit' name='commentSubmit'>Comment</button>

    </form>";
    ?>
</body>
</html>