<?php
session_start();
include "db_connect.php"; // Ensure your DB connection settings are correct

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['type']) && $_SESSION['type'] === 'admin') {
    // Retrieve all information from the form using the correct POST indices
    $propertyid = $_POST['propertyid'];
    $owner_email = $_POST['owneremail']; 
    $owner_phone = $_POST['ownerphone'];
    $owner_fname = $_POST['ownerfname'];
    $owner_lname = $_POST['ownerlname'];

    $size = $_POST['size'];
    $propertytype = $_POST['propertytype'];
    $pets = $_POST['pets'];
    $smoke = $_POST['smoke'];
    $cost = $_POST['cost'];
    $utilityfees = $_POST['utilityfees'];
    $furnish = $_POST['furnishing'];
    $district = $_POST['district'];
    $no = $_POST['no'];
    $street = $_POST['street'];
    $postalcode = $_POST['postalcode'];
    $province = $_POST['province'];
    $numbedrooms = $_POST['numbedrooms'];
    $numbathrooms = $_POST['numbathrooms'];
    $adminwhopost = $_SESSION['email'];
    $interiorDesigns = $_POST['interiordesign'];

    $target_dir = "img/" . $propertyid . "/";
    if (!file_exists($target_dir) && !mkdir($target_dir, 0755, true)) {
        echo "Failed to create directory: " . htmlspecialchars($target_dir);
        exit();
    }

    $target_file = $target_dir . "temp.png";
    if (!move_uploaded_file($_FILES["propertyimage"]["tmp_name"], $target_file)) {
        echo "Sorry, there was an error uploading your file.";
        exit();
    }

    // Insert property details into Property table
    $stmt_property = $conn->prepare("INSERT INTO Property (Property_id, Size, Property_type, Pet, Smoke, Cost_Per_Month, Utility, Furnish, District, `No.`, Street, PostalCode, Province, num_bedrooms, num_bathrooms, rental_status, admin_who_post) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'Yes', ?)");
    $stmt_property->bind_param("iissssssissssiis", $propertyid, $size, $propertytype, $pets, $smoke, $cost, $utilityfees, $furnish, $district, $no, $street, $postalcode, $province, $numbedrooms, $numbathrooms, $adminwhopost);
    $stmt_property->execute() or die("Error: " . $stmt_property->error);
    $stmt_property->close();

    // Insert owner details into Owner table, update if exists
    $stmt_owner = $conn->prepare("INSERT INTO Owner (Email, Phone_no, FName, LName) VALUES (?, ?, ?, ?) ON DUPLICATE KEY UPDATE Phone_no=VALUES(Phone_no), FName=VALUES(FName), LName=VALUES(LName)");
    $stmt_owner->bind_param("siss", $owner_email, $owner_phone, $owner_fname, $owner_lname);
    $stmt_owner->execute() or die("Error: " . $stmt_owner->error);
    $stmt_owner->close();

    // Link property and owner in Own table
    $stmt_own = $conn->prepare("INSERT INTO Own (owner_email, property_id) VALUES (?, ?)");
    $stmt_own->bind_param("si", $owner_email, $propertyid);
    $stmt_own->execute() or die("Error: " . $stmt_own->error);
    $stmt_own->close();

    // Insert each selected interior design into the Interior Design table
    $stmt_design = $conn->prepare("INSERT INTO `Interior Design` (Property_id, interior_design) VALUES (?, ?)");
    foreach ($interiorDesigns as $design) {
        $stmt_design->bind_param("is", $propertyid, $design);
        $stmt_design->execute() or die("Error inserting interior design: " . $stmt_design->error);
    }
    $stmt_design->close();

    echo "New property record created, image uploaded, interior designs added, and owner information stored successfully.";
    $conn->close();
} else {
    header("Location: index.php"); // Redirect if not accessed properly
    exit();
}
?>
