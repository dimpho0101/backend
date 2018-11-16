<?php 

$socket = '/Applications/MAMP/tmp/mysql/mysql.sock';
$username = 'root';
$password = 'root';
$dbname = 'diputu';

try{
    $conn = new PDO("mysql:unix_socket=$socket;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Error ". $e->getMessage();
}