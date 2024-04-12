<?php
include "db_connect.php";
session_start();

if (isset($_POST['rm_btn'])) {
	$pid = $_POST['pid'];
	$sql = "DELETE FROM watchlist WHERE property_id='$pid' AND Client_email = '$_SESSION[email]'";
	$result = mysqli_query($conn, $sql);

	if ($result) {
        header("Location: watchlist.php?success= Property ".$pid." has been succuessfully removed from your watchlist");
        exit();
    } else {
		header("Location: watchlist.php?error= Property ".$pid." failed to removed from the watchlist");
    }

}else{
	header("Location: watchlist.php");
	exit();
}

?>