<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        include("php/dbconn.php"); 

        for ($i=1; $i<24; $i++) {
            $sql = "INSERT INTO art_det_us (art_id, art_loc, username) VALUES ('Art-$i', 'imgs/Art/Art-$i.jpg', 'emmjyyque')";
            $conn->query($sql);
        }
    ?>
</body>
</html>