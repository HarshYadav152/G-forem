<?php
    // establish connectino with mysql db
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "gdiscuss";

    $conn = mysqli_connect($servername,$username,$password,$database);

    if(!$conn){
        die("Failed to connect db");
    }
    
?>