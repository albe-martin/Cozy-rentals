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
            $sql_own = "DELETE FROM Own WHERE Property_id = ?";
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
            $sql_property = "DELETE FROM Property WHERE Property_id = ?";
            $stmt_property = mysqli_prepare($conn, $sql_property);
            mysqli_stmt_bind_param($stmt_property, 'i', $delete_id);
            mysqli_stmt_execute($stmt_property);
            mysqli_stmt_close($stmt_property);

            //SQL to delete a record from Watchlist table
            $sql_watchlist = "DELETE FROM Watchlist WHERE Property_id = ?";
            $stmt_watchlist = mysqli_prepare($conn, $sql_watchlist);
            mysqli_stmt_bind_param($stmt_watchlist, 'i', $delete_id);
            mysqli_stmt_execute($stmt_watchlist);
            mysqli_stmt_close($stmt_watchlist);

            //SQL to delete a record from Showlist table
            $sql_showlist = "DELETE FROM Showlist WHERE Property_id = ?";
            $stmt_showlist = mysqli_prepare($conn, $sql_showlist);
            mysqli_stmt_bind_param($stmt_showlist, 'i', $delete_id);
            mysqli_stmt_execute($stmt_showlist);
            mysqli_stmt_close($stmt_showlist);


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
