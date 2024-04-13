<?php 
session_start(); 
include "db_connect.php";   // connects to database

if (isset($_POST['delete'])) {
    $delete_id = mysqli_real_escape_string($conn, $_POST['delete_id']);
    if (!empty($delete_id)) {
        // Start transaction
        mysqli_begin_transaction($conn);

        try {
            // SQL to delete a record from own table
            $sql_own = "DELETE FROM own WHERE Property_id = ?";
            $stmt_own = mysqli_prepare($conn, $sql_own);
            mysqli_stmt_bind_param($stmt_own, 'i', $delete_id);
            mysqli_stmt_execute($stmt_own);
            mysqli_stmt_close($stmt_own);

            // SQL to delete a record from Interior Design table
            $sql_interior = "DELETE FROM `Interior Design` WHERE Property_id = ?";
            $stmt_interior = mysqli_prepare($conn, $sql_interior);
            mysqli_stmt_bind_param($stmt_interior, 'i', $delete_id);
            mysqli_stmt_execute($stmt_interior);
            mysqli_stmt_close($stmt_interior);

            // SQL to delete a record from property table
            $sql_property = "DELETE FROM property WHERE Property_id = ?";
            $stmt_property = mysqli_prepare($conn, $sql_property);
            mysqli_stmt_bind_param($stmt_property, 'i', $delete_id);
            mysqli_stmt_execute($stmt_property);
            mysqli_stmt_close($stmt_property);

            // Commit transaction
            mysqli_commit($conn);
            echo "Record deleted successfully";

        } catch (mysqli_sql_exception $exception) {
            mysqli_rollback($conn); // Rollback transaction on error
            echo "Error deleting record: " . mysqli_error($conn);
        }
    }
} else {
    header("Location: adminpropertylist.php");
    exit();
}
?>
