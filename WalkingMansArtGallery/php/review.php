<?php
    session_start();
    include("dbconn.php"); 
    
    $username = $_SESSION['username'];
    $artNo = $_POST['artNumField'];
    $review = $_POST['review'];
    $rating = $_POST['rating']; 

    $sql = "INSERT INTO reviews (username, art_no, review, rating) VALUES ('$username', '$artNo', '$review', $rating)";

    if ($conn->query($sql)) {
        header("Location: ../galleryVR.php");
    } else {
        echo "Error in reviewing";
    }
    
?>