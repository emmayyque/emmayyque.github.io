<?php
    session_start();
    include("dbconn.php"); 
    
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
 

        $sql = "SELECT * FROM users WHERE username='".$username."' AND password='".$password."'";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            $_SESSION["username"] = $username;
            // Get Specific User Reviews !!!
            header("location: ../galleryVR.php");
        } else {
            header("location: ../index.php");
        }
    }
    $conn->close();
?>