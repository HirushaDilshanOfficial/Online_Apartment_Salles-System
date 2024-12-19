
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<?php

include 'config.php';

// If form is submitted, handle the POST request to insert notice
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];

    // Insert notice into the database
    $sql = "INSERT INTO notices (tittle, description) VALUES ('$title', '$description')";
    if ($con->query($sql) === TRUE) {
        echo json_encode(["status" => "success", "message" => "Notice published successfully"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error: " . $con->error]);
    }
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publish Notice</title>
    <link rel="stylesheet" href="css/notice.css">
    <link rel="stylesheet" href="css/footer.css">
</head>
<body>
<?php include 'header.php';?>
<div class="container">
    <h2>Publish New Notice</h2>

    <!-- Form to publish notice -->
    <form id="publishNoticeForm">
        <label for="title">Notice Title:</label>
        <input type="text" id="title" name="title" required>

        <label for="description">Description:</label>
        <textarea id="description" name="description" required></textarea>

        <button type="submit">Publish</button>
    </form>

    <div id="status-message"></div>

    <!-- Display notices  -->
    <h3>Published Notices</h3>
    <ul id="notice-list">
    <?php

    // Fetch all notices from the database
    $result = $con->query("SELECT * FROM notices ORDER BY Date DESC");
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            echo "<li><strong>" . $row['tittle'] . "</strong>: " . $row['description'] . " <button class='delete-btn' data-id='".$row['id']."'>Delete</button></li>";
        }
    } else {
        echo "Error fetching notices: " . $con->error;
    }

    $con->close()
    ?>
    </ul>
    
</div>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="js/notice.js"></script>

<?php include 'footer.php';
    ?>

</body>
</html>