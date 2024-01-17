<?php
    $serverName = "localhost";
    $dbUser = "root";
    $dbPass = "";
    $dbName = "artgallery";

    $conn = new mysqli($serverName, $dbUser, $dbPass, $dbName);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        echo "Connection Success";
    }
?>