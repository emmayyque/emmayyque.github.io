<?php
    // Requisites
    include 'connect.php';

    // Variables
    $fName = $fNameDB = "";
    $uName = $uNameDB = "";
    $email = $emailDB = "";
    $password = $passwordDB = "";
    $pNum = $pNumDB = "";
    
    $uName = $_POST['uName'];
    $password = $_POST['password'];
    
    if ($uName != "" && $password != "") {
        // Query Section
        if ($conn->connect_error) {
            die ('Connection Failed : '.conn->connect_error);
        } else {
            $sql = "SELECT * FROM users WHERE Username=$uName";
            $result = mysqli_query($conn, $sql);
            $stmt = $conn->prepare("SELECT * FROM users WHERE Username=$uName");
            $stmt->bind_param("sssi", $fName, $email, $password, $pNum);
            $stmt->execute();
            $stmt->close();
            $conn->close();
            header("Location: ../signup.html");
        }
    } else {
        if ($uName != "") {
            echo "Password not entered";
        } else {
            echo "Username not entered";
        }
    }
?>