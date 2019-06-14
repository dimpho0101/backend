<?php

if (isset($_SESSION)){
    echo "sesion set";
    var_dump($_SESSION);
}else{
    session_start();
    session_destroy();
    echo "session is onside";
}


?>