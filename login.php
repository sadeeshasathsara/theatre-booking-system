<?php
include "Database.php";
session_start();
if ($_POST['username'] == '' || $_POST['password'] == '') {
    foreach ($_POST as $key => $value) {
        echo "<li>Please Enter " . $key . ".</li>";
    }
    exit();
}
$uname = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

$sql_query = "SELECT count(*) as cntUser FROM user WHERE username='" . $uname . "' and password='" . $password . "'";
$sql_query1 = "SELECT count(*) as cntAdmin FROM admin WHERE name='" . $uname . "' and password='" . $password . "'";
$result = mysqli_query($conn, $sql_query);
$result1 = mysqli_query($conn, $sql_query1);
$row = mysqli_fetch_array($result);
$row1 = mysqli_fetch_array($result1);
$count = $row['cntUser'];
$count1 = $row1['cntAdmin'];

if ($row && $row1) {
    if ($count > 0) {
        $_SESSION['uname'] = $uname;
        echo "<script>window.location.href='http://localhost/theator%20booking/theater/index.php';</script>";
    } else if ($count1 > 0){
        $_SESSION['admin'] = $uname;
        echo "<script>window.location.href='http://localhost/theator%20booking/theater/admin/index.php';</script>";
    }else {
        echo "<script>
    window.location.href='http://localhost/theator%20booking/theater/login_form.php';
    sessionStorage.setItem('loginErr', 'true');
    </script>";
    }
} else {
    echo "<script>sessionStorage.setItem('loginErr') = 'true'</script>";
    exit();
}