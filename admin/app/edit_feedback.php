<?php
include("../Database.php");

if (isset($_POST["edit_id"])){
    $movie_id = $_POST['edit_id'];
    $name = !empty($_POST["edit_name"]) ? $_POST["edit_name"] : null;
    $email = !empty($_POST['email']) ? $_POST["email"] : null;
    $message = !empty($_POST["message"]) ? $_POST["message"] : null;

    $query = "UPDATE feedback SET ";

    if ($name !== null) {
        $query = $query . "`name` = '$name', ";
    }
    if ($email !== null) {
        $query = $query . "`email` = '$email', ";
    }
    if ($message !== null) {
        $query = $query . "`massage` = '$message', ";
    }

    $query = substr($query, 0, -2);

    $query = $query . " where id = $movie_id";

    if(mysqli_query($conn, $query)){
        echo "<script>
        alert('Successfully updated');
        sessionStorage.removeItem('selectedBtnId');
        window.location.href = 'http://localhost/theator%20booking/theater/admin/Feedback.php';
        </script>";
    }else{
        echo "<script>
        alert('Error Occured');
        sessionStorage.removeItem('selectedBtnId');
        </script>";
        echo mysqli_error($conn);
    }
    
}