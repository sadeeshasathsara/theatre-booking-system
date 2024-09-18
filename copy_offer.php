<?php

include "Database.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "update offer set collected = 1 where offerId = $id";

    if(!mysqli_query($conn, $sql)){
        echo mysqli_error($conn);
    }else{
        echo "<script>window.location.href='http://localhost/theator%20booking/theater/offers.php'</script>";
    }
}

