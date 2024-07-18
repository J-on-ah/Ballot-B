<?php
require '../../connect.php';

$targetDirectory = 'image/';
        $image = $_FILES['image']['name'];
        $tmp_img = $_FILES['image']['tmp_name'];

        // Move the uploaded file to the target directory
        if (move_uploaded_file($tmp_img, $targetDirectory . $image)) {
            // Insert the image filename into the database
            $sql = "INSERT INTO event (image) VALUES (?)";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "s", $image);
        }

?>