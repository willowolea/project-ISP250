<?php 
    $serverName = "localhost";
    $username = "root";
    $password = "";
    $dbname = "registrationdb";

    $conn = mysqli_connect($serverName, $username, $password, $dbname);

    if ($conn -> connect_error)
    {
        die("Error connecting to database): ". $conn -> connect_error);
    }
    else{
        // echo "connected successfully";
    }
?>