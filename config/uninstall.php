<?php

include 'database.php';

try{
    $conn->query('DROP DATABASE IF EXISTS diputu');
    echo "Database has been deleted";
}catch(PDOException $e){
    echo "Error" . $e->getMessage();
}