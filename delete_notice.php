<?php
include 'config.php';

$id = $_GET['id']; // Get the ID 

// SQL to delete the notice
$sql = "DELETE FROM notices WHERE id = $id";

if ($con->query($sql) === TRUE) {
    echo "Notice deleted successfully";
} else {
    echo "Error deleting record: " . $con->error;
}

// Redirect back to the publish_notice.php
header("Location: publish_notices.php");
exit();
?>