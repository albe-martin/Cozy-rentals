<?php
include "db_connect.php";
session_start();

if (isset($_POST['btn']) && isset($_SESSION['login']) && $_SESSION['type'] === 'client') {
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
     }

    $email = $_SESSION['email'];
    $pid = $_POST['pid'];   // this is property id
    $amount = $_POST['amount'];
    $cardnum = $_POST['cardnum'];
    $exp = $_POST['expdate'];
    $cvc = $_POST['cvc'];
    
    $sql_id = "SELECT MAX(`Payment_ID`) AS maxid FROM `payment`";
    $result_id = mysqli_query($conn, $sql_id);
    if (!$result_id) {
        $payid = 0;
    } else {
        $max_id_row = mysqli_fetch_assoc($result_id);
        $payid = $max_id_row['maxid'] + 1;
    }

    $sql_pay = "INSERT INTO `pay` (`Clients_email`, `payment_id`) VALUES ('$email', '$payid')";
	$result_pay = mysqli_query($conn, $sql_pay);

	$sql_payment = "INSERT INTO `payment` (`Payment_id`, `amount`, `card_num`, `exp_date`, `cvc`, `property_id`) VALUES ('$payid', '$amount', '$cardnum', '$exp', '$cvc', '$pid')";
	$result_payment = mysqli_query($conn, $sql_payment);

    //query owner
    $sql_own = "SELECT * FROM `own` WHERE `property_id` = '$pid' ";
    $result_own = mysqli_query($conn, $sql_own);
    if (!$result_own) {
        header("Location: propertylist.php?error= Payment for Property ID ".$pid." cannot be completed: Owner missing! Check table own" );
    } else {
        $row_own = mysqli_fetch_assoc($result_own);
        $owner_email = $row_own['owner_email'];
    }

    $sql_receive = "INSERT INTO `receive` (`Owner_email`, `payment_id`) VALUES ('$owner_email', '$payid')";
    $result_receive = mysqli_query($conn, $sql_receive);

    //update peoperty rental status to No
    $sql_update = "UPDATE `property` SET `rental_status` = 'No' WHERE `property_id` = $pid";
    $result_update = mysqli_query($conn, $sql_update);

    // remove from everyone's waatchlist
    $sql_rm = "DELETE FROM watchlist WHERE property_id='$pid' ";
    $result_rm = mysqli_query($conn, $sql_rm);

	if ($result_pay && $result_payment && $sql_receive && $sql_update && $sql_rm ) {
        header("Location: propertylist.php?success= Payment for Property ".$pid." success! Payment id = ".$payid );
        exit();
    } else {
        header("Location: propertylist.php?error= Error while paying for Property ".$pid."");
        exit();
    }

}else{
	header("Location: propertylist.php");
	exit();
}

?>
       