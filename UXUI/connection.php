<?php 

    $conn = mysqli_connect("localhost", "root", "123456789", "uxui");

    if (!$conn) {
        die("Failed to connect to database" . mysqli_error($conn));
    }
?>