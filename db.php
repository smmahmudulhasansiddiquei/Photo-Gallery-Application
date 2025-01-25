<?php

    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbName = "photo_gallery_application";
    
    $conn = new mysqli($host, $user, $pass, $dbName);

    if($conn->connect_error){
        die("Can't Connect Database" . $conn->connect_error);
    }

?>