<?php 
session_start(); 
include "db_connect.php";   // connects to database

if (isset($_POST['email']) && isset($_POST['password'])) {  // if these input are posted

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

    //get variables from inputs
	$email = validate($_POST['email']);
	$pass = validate($_POST['password']);

    //do mysql query
    $sql = "SELECT * FROM user WHERE Email='$email' AND Password='$pass'";
    $result = mysqli_query($conn, $sql);

    // check query result
    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if ($row['Email'] === $email && $row['Password'] === $pass) {
            // login success, set session variables
            $_SESSION['email'] = $row['Email'];
            // check if login as admin
            $sql_admin = "SELECT * FROM admins WHERE Admin_email='$email'";
            $result = mysqli_query($conn, $sql_admin);
            if (mysql_num_rows($result) === 1) {
                // login as a admin
                $_SESSION['type'] = "admin";
            } else {
                // check if login as client
                $sql_client = "SELECT * FROM client WHERE User_email='$email'";
                $result = mysqli_query($conn, $sql_client);
                if (mysql_num_rows($result) === 1) {
                    // login as a client
                    $_SESSION['type'] = "client";
                } else {
                    // error
                    header("Location: login.php?error=Unexpected error, please contact database manager");
                    exit();
                }
            }
            $_SESSION['fname'] = $row['FName'];
            $_SESSION['lname'] = $row['LName'];
            header("Location: login.php");
            exit();
        }else{
            header("Location: login.php?error=Incorect email or password");
            exit();
        }
    }else{
        header("Location: login.php?error=Incorect email or password");
        exit();
    }
	
	
}else{
	header("Location: login.php");
	exit();
}