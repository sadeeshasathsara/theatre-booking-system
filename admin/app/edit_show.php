<?php
include("../Database.php");

if (isset($_POST["edit_id"])){
    $movie_id = $_POST['edit_id'];
    $edit_show_time = !empty($_POST["edit_show"]) ? $_POST["edit_show"] : null;
    $edit_theater = !empty($_POST['edit_theater']) ? $_POST["edit_theater"] : null;

    $query = "UPDATE theater_show SET ";

    if ($edit_show_time !== null) {
        $query = $query . "`show` = '$edit_show_time', ";
    }
    if ($edit_theater !== null) {
        $query = $query . "`theater` = '$edit_theater', ";
    }

    $query = substr($query, 0, -2);

    $query = $query . " where id = $movie_id";

    if(mysqli_query($conn, $query)){
        echo "<script>
        alert('Successfully updated');
        sessionStorage.removeItem('selectedBtnId');
        window.location.href = 'http://localhost/theator%20booking/theater/admin/Theater_and_show.php';
        </script>";
    }else{
        echo "<script>
        alert('Error Occured');
        sessionStorage.removeItem('selectedBtnId');
        </script>";
        echo mysqli_error($conn);
    }
    
}