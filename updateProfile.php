<?php
include './includes/header_inc.php';
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "UPDATE MyGuests SET username=?, email=?, password=? WHERE id=?";

    // Prepare statement
    $stmt = $conn->prepare($sql);

    // execute the query
    $stmt->execute();

    // echo a message to say the UPDATE succeeded
    echo $stmt->rowCount() . " records UPDATED successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;

?>
<h3>Update Profile Details</h3>
<form method="post" action="updateProfile.php">
<input type="text" name="username" placeholder="Insert Username" ><br><br>
<input type="email" name="email" placeholder="Insert email"><br><br>
<input type="password" name="password" placeholder="Insert Password"><br><br>
<input type="submit" name="submit" value="change">
</form>