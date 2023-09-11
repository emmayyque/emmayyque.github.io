<?php
    // Requisites
    include 'connect.php';

    // Variables
    $fName = $_POST['fName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $pNum = $_POST['pNum'];
    
    // Database Connection
    if ($conn->connect_error) {
        die ('Connection Failed : '.conn->connect_error);
    } else {
        $stmt = $conn->prepare("INSERT INTO users (Name, Email, Password, Phone) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sssi", $fName, $email, $password, $pNum);
        $stmt->execute();
        $stmt->close();
        $conn->close();
        header("Location: ../signup.html");
    }
?>