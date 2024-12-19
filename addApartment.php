<?php
session_start();
include 'config.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


// Check if the user is logged in
if (!isset($_SESSION['NIC'])) {
    header("Location: login.php");
    exit();
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $apartment_name = htmlspecialchars(trim($_POST['apartment_name'] ?? ''), ENT_QUOTES, 'UTF-8');
    $apartment_type = htmlspecialchars(trim($_POST['apartment_type'] ?? ''), ENT_QUOTES, 'UTF-8');
    $apartment_location = htmlspecialchars(trim($_POST['apartment_location'] ?? ''), ENT_QUOTES, 'UTF-8');
    $apartment_price = filter_input(INPUT_POST, 'apartment_price', FILTER_VALIDATE_FLOAT);
    $apartment_description = htmlspecialchars(trim($_POST['apartment_description'] ?? ''), ENT_QUOTES, 'UTF-8');
    $apartment_district = htmlspecialchars(trim($_POST['apartment_district'] ?? ''), ENT_QUOTES, 'UTF-8');
    $NIC = $_SESSION['NIC'];

    if (!$apartment_name || !$apartment_type || !$apartment_location || !$apartment_price || !$apartment_description || !$apartment_district) {
        $_SESSION['error_message'] = "Please fill in all fields with valid information.";
        header("Location: sellerDashboard.php");
        exit();
    }

    // Handle image upload
    $target_dir = "uploads/";
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    $file_name = basename($_FILES["apartment_image"]["name"]);
    $target_file = $target_dir . time() . '_' . $file_name;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is an actual image
    $check = getimagesize($_FILES["apartment_image"]["tmp_name"]);
    if ($check === false) {
        $_SESSION['error_message'] = "File is not an image.";
        header("Location: seller_dashboard.php");
        exit();
    }

    // Check file size 
    if ($_FILES["apartment_image"]["size"] > 5000000) {
        $_SESSION['error_message'] = "Sorry, your file is too large.";
        header("Location: seller_dashboard.php");
        exit();
    }

    //check image is allow to file size
    $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];
    if (!in_array($imageFileType, $allowed_extensions)) {
        $_SESSION['error_message'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        header("Location: seller_dashboard.php");
        exit();
    }

    //try to upload file
    if (!move_uploaded_file($_FILES["apartment_image"]["tmp_name"], $target_file)) {
        $_SESSION['error_message'] = "Sorry, there was an error uploading your file.";
        header("Location: seller_dashboard.php");
        exit();
    }

    //Insert into database
    $sql = "INSERT INTO apartments (Apartment_Type, apartment_name, location, price, description, district, images, NIC) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("sssdsssi", $apartment_type, $apartment_name, $apartment_location, $apartment_price, $apartment_description, $apartment_district, $target_file, $NIC);

    if ($stmt->execute()) {
        $_SESSION['success_message'] = "New apartment added successfully!";
    } else {
        $_SESSION['error_message'] = "Error: " . $stmt->error;
    }

    $stmt->close();
    $con->close();

    //back to seller dashboard
    header("Location: seller_dashboard.php");
    exit();
} else {
    header("Location: seller_dashboard.php");
    exit();
}
?>