<?php
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $database = "blog";

    $conn = new mysqli($servername,$username,$password,$database);

    if($conn->connect_error){
        die("ERROR".$conn->error);
    }

?>