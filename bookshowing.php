<?php
include "db_connect.php";
session_start();

if (isset($_POST['btn'])) {
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
     }

    $pid = $_POST['pid'];
    $showtype = $_POST['showtype'];
    $email = $_SESSION['email'];
    $showtime = $_POST['showtime'];
    // make into right format
    $temp = explode("T", $showtime);
    $date = $temp[0];
    $date_array = explode("-", $date);
    $year = validate($date_array[0]);
    $month = validate($date_array[1]);
    $day = validate($date_array[2]);

    $time = $temp[1];
    $hour = validate(substr($time, 0, 2));
    $min = validate(substr($time, -2));
    $second = "00";

    // check today?
    $today = date("Y-m-d H:i:s");
    $date = $year.'-'.$month.'-'.$day.' '.$hour.':'.$min.':00';
    if ($date < $today){
        header("Location: propertylist.php?error= Error while booking Property ".$pid.": Unvalid booking time: ".$date);
        exit();
    }

    $sql_id = "SELECT MAX(`Booking_id`) AS maxid FROM `showlist`";
    $result_id = mysqli_query($conn, $sql_id);
    if (!$result_id) {
        $showid = 0;
    } else {
        $max_id_row = mysqli_fetch_assoc($result_id);
        $showid = $max_id_row['maxid'] + 1;
    }

    $time = $hour.":".$min.":00";

	$sql = "INSERT INTO `showlist` (`Client_email`, `Booking_id`, `type`, `year`, `month`, `day`, `time`, `property_id`) VALUES ('$email', '$showid', '$showtype', '$year', '$month', '$day', '$time', '$pid')";
	$result = mysqli_query($conn, $sql);

	if ($result) {
        header("Location: propertylist.php?success= Showing for Property ".$pid." has been booked success fully! Booking id = ".$showid );
        exit();
    } else {
        header("Location: propertylist.php?error= Error while booking Property ".$pid."");
        exit();
    }

}else{
	header("Location: propertylist.php");
	exit();
}

?>
       