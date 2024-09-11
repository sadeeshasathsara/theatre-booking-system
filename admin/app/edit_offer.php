<?php
include("../Database.php");

if (isset($_POST["edit_id"])){
    $offer_id = $_POST['edit_id'];
    $edit_offer_title = !empty($_POST["edit_offer_title"]) ? $_POST["edit_offer_title"] : null;
    $edit_user = !empty($_POST['edit_user']) ? $_POST["edit_user"] : null;
    $edit_discount = !empty($_POST['edit_discount']) ? $_POST["edit_discount"] : null;
    $status = !empty($_POST['status']) ? $_POST["status"] : null;

    $query = "UPDATE offer SET ";

    if ($edit_offer_title !== null) {
        $query = $query . "`offerTitle` = '$edit_offer_title', ";
    }
    if ($edit_user !== '--Select One--') {
        $query = $query . "`userId` = '$edit_user', ";
    }
    if ($edit_discount !== null) {
        $query = $query . "`offerDiscount` = '$edit_discount', ";
    }
    if ($status !== '--Select One--') {
        $query = $query . "`collected` = '$status', ";
    }

    $query = substr($query, 0, -2);

    $query = $query . " where offerId = $offer_id";

    if(mysqli_query($conn, $query)){
        echo "<script>
        alert('Successfully updated');
        sessionStorage.removeItem('selectedBtnId');
        window.location.href = 'http://localhost/theator%20booking/theater/admin/offers.php';
        </script>";
    }else{
        echo "<script>
        alert('Error Occured');
        sessionStorage.removeItem('selectedBtnId');
        </script>";
        echo mysqli_error($conn);
    }
    
}