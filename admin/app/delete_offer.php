<?php
include("../Database.php");

if(isset($_GET['id'])){
    $id = $_GET['id'];
    
    $query = "delete from offer where offerId=$id";

    if(mysqli_query($conn, $query)){
        echo "<script>
        alert('Successfully deleted');
        window.location.href = 'http://localhost/theator%20booking/theater/admin/offers.php';
        </script>";
    }else{
        echo "<script>
        alert('Error Ocured');
        </script>";
        echo mysqli_errno($conn);
    }
}