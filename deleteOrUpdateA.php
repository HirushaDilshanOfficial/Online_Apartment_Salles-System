<?php
session_start();
include 'config.php';

//Check if the user is logged in
if (!isset($_SESSION['NIC'])) {
    header("Location: Login.php");
    exit();
}

//Handle the update operation
if (isset($_POST['update'])) {
    $apartment_id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
    if ($apartment_id) {
        
        header("Location: updateApartment.php?id=" . $apartment_id);
        exit();
    } else {
        $_SESSION['error_message'] = "Invalid apartment ID.";
    }
}

//Handle the delete 
if (isset($_POST['delete'])) {
    $apartment_id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

    if ($apartment_id) {
        $sql = "DELETE FROM apartments WHERE id = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("i", $apartment_id);

        if ($stmt->execute()) {
            $_SESSION['success_message'] = "Apartment deleted successfully!";
        } else {
            $_SESSION['error_message'] = "Error deleting apartment: " . $stmt->error;
        }
    } else {
        $_SESSION['error_message'] = "Invalid apartment ID.";
    }
}

$stmt->close();
$con->close();


header("Location: sellerDashboard.php");
exit();
?>