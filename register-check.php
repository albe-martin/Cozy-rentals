<?php
session_start();
include "db_connect.php";

if (isset($_POST['submit-btn'])) {
// if (isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['fname'])&& isset($_POST['lname'])&& isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$email = validate($_POST['email']);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Invalid email format");
	    exit();
    }
	$phone = validate($_POST['phone']);
	$fname = validate($_POST['fname']);
	$lname = validate($_POST['lname']);
	$pass = validate($_POST['password']);

	$sql = "SELECT * FROM user WHERE Email='$email' ";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
        header("Location: register.php?error=The email is taken please try another");
        exit();
    } else {
		$sql2 = "INSERT INTO user(Email, Phone_no, Password, FName, LName) VALUES('$email', '$phone', '$pass', '$fname', '$lname')";
		$result2 = mysqli_query($conn, $sql2);
		$sql3 = "INSERT INTO client(User_email) VALUES('$email')";
		$result3 = mysqli_query($conn, $sql3);
		if ($result2 && $result3) {
			header("Location: register.php?success=Your account has been created successfully");
		  	exit();
		}else {
			header("Location: register.php?error=Unknown error occurred&$user_data");
			exit();
		}
    }

}else{
	header("Location: register.php");
	exit();
}

?>