<?php
include 'config.php'; 


$query = "SELECT * FROM notices ORDER BY Date DESC";
$result = $con->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Notices</title>
    <link rel="stylesheet" href="css/notice.css"> 
    <link rel="stylesheet" href="css/footer.css">
</head>
<body>

<?php include 'header.php';?>

<div class="container">
    <h2>Published Notices</h2>
    
    <ul id="notice-list">
    <?php
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<li><strong>" . $row['tittle'] . "</strong>: " . $row['description'] . "</li>";
        }
    } else {
        echo "<p>No notices found</p>";
    }

    $con->close(); 
    ?>
    </ul>
</div>

<?php include 'footer.php';
    ?>

</body>
</html>