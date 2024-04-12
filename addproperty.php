<?php
session_start();

// Redirect non-admins back to the index page
if (!isset($_SESSION['login']) || $_SESSION['type'] !== 'admin') {
    header("Location: index.php");
    exit();
}

require 'db_connect.php';  // Ensure you have this file to handle DB connection

function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $property_id = validate($_POST['property_id']);
    $property_type = validate($_POST['property_type']);
    $num_bedrooms = validate($_POST['num_bedrooms']);
    $num_bathrooms = validate($_POST['num_bathrooms']);
    $size = validate($_POST['size']);
    $cost_per_month = validate($_POST['cost_per_month']);
    $street = validate($_POST['street']);
    $district = validate($_POST['district']);
    $postal_code = validate($_POST['postal_code']);
    $province = validate($_POST['province']);
    $utility = validate($_POST['utility']);
    $pet = validate($_POST['pet']);
    $smoke = validate($_POST['smoke']);
    $interior_design = validate($_POST['interior_design']);

    $sql = "INSERT INTO property (Property_id, Property_type, num_bedrooms, num_bathrooms, Size, Cost_Per_Month, Street, District, Postal_code, Province, Utility, Pet, Smoke, Interior_design)
            VALUES ('$property_id', '$property_type', '$num_bedrooms', '$num_bathrooms', '$size', '$cost_per_month', '$street', '$district', '$postal_code', '$province', '$utility', '$pet', '$smoke', '$interior_design')";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>
