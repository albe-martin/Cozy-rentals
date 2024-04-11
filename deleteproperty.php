<?php 
session_start(); 
include "db_connect.php";   // connects to database

if (isset($_POST['delete'])) {
    $delete_id = mysqli_real_escape_string($conn, $_POST['delete_id']);
    if (!empty($delete_id)) {
        // SQL to delete a record
        $sql = "DELETE FROM property WHERE Property_id = $delete_id";

        if (mysqli_query($conn, $sql)) {
            echo "Record deleted successfully";
            // Optionally, redirect or perform other follow-up actions
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }
    }
}else{
	header("Location: adminpropertylist.php");
	exit();
}
?>