<?php
    session_start();
    include("dbconn.php"); 
    $username = $_SESSION["username"];

    $sql = "SELECT * FROM reviews WHERE username='".$username."'";

    if ($result->num_rows > 0) {
        while($rows = $result->fetch_assoc()) {
            $id = $row['review_id'];
            $username = $row['username'];
            $art_no = $row['art_no'];
            $review = $row['review'];
            $rating = $row['rating'];

            foreach($result as $reviews) {
                $resultSet = [
                    ['review_id' => $reviews[$id], 'username' => $reviews[$username], 'art_no' => $reviews[$art_no], 'review' => $reviews[$review], 'rating' => $reviews[$rating]],
                ];  
            }

            foreach($result as $reviews) {
                echo "ID: {$reviews['review_id']}, Name: {$reviews['username']}<br>";
                
            }
            
        }
    }

    // header("Location: " . $_SERVER["HTTP_REFERER"]);
    // if ($conn->query($sql)) {
    //     header("Location: ../galleryVR.php");
    // } else {
    //     echo "Error in reviewing";
    // }
?>

