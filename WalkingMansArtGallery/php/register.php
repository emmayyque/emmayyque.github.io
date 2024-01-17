<?php
    session_start();
    include("dbconn.php"); 
    
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $username = $_POST['username'];
        $pNnumber = $_POST['number'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "INSERT INTO users (name, username, email, password, phone_num) VALUES ('$name', '$username', '$email', '$password', $pNnumber)";
        
        if ($conn->query($sql)) {
            $message = "User registered successfully!!!";

            for ($i=1; $i<24; $i++) {
                $sql = "INSERT INTO art_det_us (art_id, art_loc, username) VALUES ('Art-$i', 'imgs/Art/Art-$i.jpg', '$username')";
                $conn->query($sql);
            }

            echo "<script>";
            echo "alert('$message')";
            echo "</script>";
            header("location: ../index.php");
        } else {
            $message = "User not registered !!!";
            echo "<script>";
            echo "alert('$message')";
            echo "</script>";
        }
    }
    $conn->close();
?>