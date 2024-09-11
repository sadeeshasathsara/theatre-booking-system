<?php
include("../Database.php");

if (isset($_POST["add_offer_title"])){
    $offer_title = $_POST["add_offer_title"];
    $discount = $_POST["add_discount"];
    $usr = $_POST["add_user"];

    $add_offer = "INSERT INTO offer 
    (`offerTitle`, `offerDiscount`, `userId`, `collected`) 
    VALUES 
    ('$offer_title', '$discount', '$usr', 0);
    ";

    if(mysqli_query($conn, $add_offer)){
        echo "<script>alert('Successfully Added');</script>";
        echo "<script>window.location.href = 'http://localhost/theator%20booking/theater/admin/offers.php'</script>";
    }else{
        echo "<script>alert('Error Occured');</script>";
        echo mysqli_error($conn);
    }
}