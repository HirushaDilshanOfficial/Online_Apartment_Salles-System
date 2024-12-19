<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Urban Heaven - Delete Data</title>
    <link rel="stylesheet" href="css/delete.css">
    <link rel="stylesheet" href="css/footer.css">
    <script src="js/property_delete.js" defer></script>
    
</head>
<body>
    
<?php include 'header.php';?>
    <main>
        <h1>Delete Data</h1>
        <div class="warning">Warning ! After you press the delete button, the relevant data will be permanently deleted from the database. Think twice before deleting.</div>

        <div class="delete-options">
            <div class="delete-section">
                <h2>Delete Property</h2>
                <form method="POST" action="delete_backend.php">
                <input type="text" name="id" placeholder="Enter Apartment ID">
                <button class="delete-btn" onclick="confirmDelete(event)" >DELETE</button>
                </form>
            </div>
        </div>

        <div class="back_manager">
            <button type="button" class="back" onclick="window.location.href='dashboard.php'" style="margin-top: 80px; margin-left:1200px;">Back to managerdashboard</button>
        </div>
    </main>  
    
    <?php include 'footer.php';
    ?>

</body>
</html>