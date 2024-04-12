<?php
session_start();
include "db_connect.php";  // Include your DB configuration

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['type']) && $_SESSION['type'] === 'admin') {
    // Image Upload Handling
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["propertyimage"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["propertyimage"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["propertyimage"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Try to upload file if all checks are passed
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["propertyimage"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["propertyimage"]["name"])). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    // Insert Owner Information
    $stmt_owner = $conn->prepare("INSERT INTO Owner (Email, Phone_no, FName, LName) VALUES (?, ?, ?, ?)");
    $stmt_owner->bind_param("siss", $owneremail, $ownerphone, $ownerfname, $ownerlname);
    $owneremail = $_POST['owneremail'];
    $ownerphone = $_POST['ownerphone'];
    $ownerfname = $_POST['ownerfname'];
    $ownerlname = $_POST['ownerlname'];
    $stmt_owner->execute();

    // Insert Property Information
    $stmt_property = $conn->prepare("INSERT INTO Property (Property_id, Size, Property_type, Pet, Smoke, Cost_Per_Month, Utility, Furnish, District, No, Street, PostalCode, Province, num_bedrooms, num_bathrooms, rental_status, admin_who_post, Image_Path) VALUES (?, ?, ?, ?, ?, ?, ?, 'Yes', ?, ?, ?, ?, ?, ?, ?, 'Available', ?, ?)");
    $stmt_property->bind_param("iissssississsiiiss", $propertyid, $size, $propertytype, $pets, $smoke, $cost, $utilityfees, $district, $no, $street, $postalcode, $province, $numbedrooms, $numbathrooms, $_SESSION['email'], $target_file);
    $propertyid = $_POST['propertyid'];
    $size = $_POST['size'];
    $propertytype = $_POST['propertytype'];
    $pets = $_POST['pets'];
    $smoke = $_POST['smoke'];
    $cost = $_POST['cost'];
    $utilityfees = $_POST['utilityfees'];
    $district = $_POST['district'];
    $no = $_POST['no'];
    $street = $_POST['street'];
    $postalcode = $_POST['postalcode'];
    $province = $_POST['province'];
    $numbedrooms = $_POST['numbedrooms'];
    $numbathrooms = $_POST['numbathrooms'];
    $stmt_property->execute();

    // Link Owner with Property
    $stmt_own = $conn->prepare("INSERT INTO Own (owner_email, property_id) VALUES (?, ?)");
    $stmt_own->bind_param("si", $owneremail, $propertyid);
    $stmt_own->execute();

    echo "New property and owner records created successfully";
    $stmt_owner->close();
    $stmt_property->close();
    $stmt_own->close();
    $conn->close();
} else {
    header("Location: index.php"); // Redirect to login page or home page if not admin
    exit();
}
?>
