<?php
include "db_connect.php";
session_start();

if (isset($_POST['btn'])) {
    $pid = $_POST['pid'];
    $email = $_SESSION['email'];

	$sql = "INSERT INTO `watchlist` (`Client_email`, `property_id`) VALUES ('$email', '$pid')";
	$result = mysqli_query($conn, $sql);

	if ($result) {
        header("Location: propertylist.php?success= Property ".$pid." has been added to your watchlist" );
        exit();
    } else {
        header("Location: watchlist.php?error= Property ".$pid." failed to add to your watchlist");
        exit();
    }

}else{
	header("Location: register.php");
	exit();
}

?>