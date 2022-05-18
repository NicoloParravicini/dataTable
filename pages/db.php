<?php
    $host = "172.17.0.1:3306";
    $user = "root";
    $pass = "my-secret-pw";
    $db = "mydb";

    $mysqli = new mysqli($host, $user, $pass, $db);
    
    if($mysqli -> connect_error){
        echo "Connessione falita".$mysqli->connect_error;
    }
?>