<?php
    session_start();
    include("dbconn.php"); 
    
    $fileName = $_FILES["artwork"]["name"];
    $tempName = $_FILES["artwork"]["tmp_name"];
    $folder = "../imgs/Art/".$fileName;
    $artID = $_POST['artNumField1'];
    $newImgPath = "imgs/Art/".$fileName;
    move_uploaded_file($tempName, $folder);

    $username = $_SESSION["username"];

    $sql = "UPDATE art_det_us SET art_loc='".$newImgPath."' WHERE art_id='".$artID."' AND username='".$username."'";
    if ($conn->query($sql)) {
        header("Location: ../galleryVR.php");
    } else {
        echo "Error in uploading file to DB";
    }

   
?>