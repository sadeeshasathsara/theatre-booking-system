<?php
include("../Database.php");

if (isset($_POST["add_show"])){
    $show_time = $_POST["add_show"];
    $theater = $_POST["add_theater"];

    $add_movie = "INSERT INTO theater_show 
    (`show`, `theater`) 
    VALUES 
    ('$show_time', '$theater');
    ";

    if(mysqli_query($conn, $add_movie)){
        echo "<script>alert('Successfully Added');</script>";
        echo "<script>window.location.href = 'http://localhost/theator%20booking/theater/admin/Theater_and_show.php'</script>";
    }else{
        echo "<script>alert('Error Occured');</script>";
        echo mysqli_errno($conn);
    }
}