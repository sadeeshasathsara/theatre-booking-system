<?php
include_once "Database.php";
session_start();
if (isset($_POST['submit'])) {
	$username = $_POST['usname'];
	$email = $_POST['email'];
	$mobile = $_POST['phone'];
	$city = $_POST['city'];
	$password = $_POST['pwd'];
	$confPwd = $_POST['confirmedPassword'];
	$filename = $_FILES['image']['name'];

	$location = 'admin/image/' . $filename;



	$file_extension = pathinfo($location, PATHINFO_EXTENSION);
	$file_extension = strtolower($file_extension);
	$image_ext = array('jpg', 'png', 'jpeg', 'gif');

	$response = 0;

	if (in_array($file_extension, $image_ext)) {
		if (move_uploaded_file($_FILES['image']['tmp_name'], $location)) {
			$response = $location;
		}
	}
	echo $response;

	$status = 1;
	if ($password == $confPwd) {
		$insert_record = mysqli_query($conn, "INSERT INTO user (`username`,`email`,`mobile`,`city`,`password`,`image`)VALUES('" . $username . "','" . $email . "','" . $mobile . "','" . $city . "','" . $password . "','" . $filename . "')");
		if (!$insert_record) {
			echo "<script>alert('Error occured. Please try again !');window.location.href='http://localhost/theator%20booking/theater/login_form.php';openPopup();</script>";
		} else {
			echo "You are Successfully Registered. Please log in !";
			echo "<script>alert('You have successfully registered. Please Log in !'); window.location.href='http://localhost/theator%20booking/theater/login_form.php';</script>";
		}
	}else{
		echo "<script>alert('Confirmed password did not matched.');</script>";
        echo "<script>window.location.href='http://localhost/theator%20booking/theater/login_form.php';</script>";
        echo "<script>openPopup();</script>";
	}
}
?>