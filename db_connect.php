<?php

$sname= "localhost";
$uname= "root";
$password = "mysql";

$db_name = "Cozy_rentals";

$conn = mysqli_connect($sname, $uname, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
}