<?php
include("../Database.php");

if(isset($_GET['id'])){
    $id = $_GET['id'];
    
    $query = "delete from user where id=$id";

    if(mysqli_query($conn, $query)){
        echo "<script>
        alert('Successfully deleted');
        window.location.href = 'http://localhost/theator%20booking/theater/admin/users.php';
        </script>";
    }else{
        echo "<script>
        alert('Error Ocured');
        </script>";
        echo mysqli_error($conn);
    }
}