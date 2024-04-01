<?php
session_start();
include "db_connnect.php";
echo "thats cool";

if (isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['fname'])&& isset($_POST['lname'])&& isset($_POST['password'])) {

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
        echo "thats cool";
    }
/*			$row = mysqli_fetch_assoc($result);
            if ($row['user_name'] === $uname && $row['password'] === $pass) {
            	$_SESSION['user_name'] = $row['user_name'];
            	$_SESSION['name'] = $row['name'];
            	$_SESSION['id'] = $row['id'];
            	header("Location: home.php");
		        exit();
            }else{
				header("Location: register.php?error=Incorect User name or password");
		        exit();
			}
		}else{
			header("Location: register.php?error=Incorect User name or password");
	        exit();
		}*/

}else{
	header("Location: register.php");
	exit();
}

?>