<?php
include "Database.php";

$email = mysqli_real_escape_string($conn,$_POST['change_pwd_email']);
$oldpassword = mysqli_real_escape_string($conn,$_POST['pwChange_oldPwd']);
$newpassword = mysqli_real_escape_string($conn,$_POST['pwChange_newPwd']);
$conpassword = mysqli_real_escape_string($conn,$_POST['pwChange_conPwd']);


$sql_query = "SELECT * FROM user WHERE email='".$email."' and password='".$oldpassword."'";
$result = mysqli_query($conn,$sql_query);
$row = mysqli_fetch_array($result);
$id = $row['id'];
if($row){
    if($newpassword == $conpassword){
        $insert_record=mysqli_query($conn, "UPDATE `user` SET `password` = '$newpassword' WHERE `id` = '$id'"); 
        echo "<script>alert('Password successfully updated.');</script>";
        echo "<script>window.location.href='http://localhost/theator%20booking/theater/login_form.php';</script>";
    }else{
        echo "<script>alert('Confirmed password did not matched.');</script>";
        echo "<script>window.location.href='http://localhost/theator%20booking/theater/login_form.php';</script>";
        echo "<script>pwdOpenPopup();</script>";
    }
    
}else{
    echo "<script>alert('Invlid email or password');</script>";
    echo "<script>window.location.href='http://localhost/theator%20booking/theater/login_form.php';</script>";
    echo "<script>pwdOpenPopup();</script>";
}