<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Urban Heaven - Delete Data</title>
    <link rel="stylesheet" href="css/delete.css">
    <link rel="stylesheet" href="css/footer.css">
    <script src="js/delete.js" defer></script>
</head>
<body>
    
    <?php include 'admin_header.php'; ?>

    <main>
        <h1>Delete Data</h1>
        <div class="warning">Warning! After you press the delete button, the relevant data will be permanently deleted from the database. Think twice before deleting.</div>

        <div class="delete-options">
        <div class="delete-section">
    <h2>Seller Account Delete</h2>
    <form method="POST" action="delete_backend.php" onsubmit="return confirmDelete(event)">
        <input type="text" name="sid" placeholder="Enter NIC">
        <button class="delete-btn" type="submit">DELETE</button>
    </form>
</div>

<div class="delete-section">
    <h2>Buyer Account Delete</h2>
    <form method="POST" action="delete_backend.php" onsubmit="return confirmDelete(event)">
        <input type="text" name="bid" placeholder="Enter NIC">
        <button class="delete-btn" type="submit">DELETE</button>
    </form>
</div>

<div class="delete-section">
    <h2>Manager Account Delete</h2>
    <form method="POST" action="delete_backend.php" onsubmit="return confirmDelete(event)">
        <input type="text" name="mid" placeholder="Enter Work ID">
        <button class="delete-btn" type="submit">DELETE</button>
    </form>
</div>
        </div>

        <div class="back_admin">
            <button type="button" class="back" onclick="window.location.href='admin.php'" style="margin-top: 80px; margin-left:1200px;">Back to adminDashboard</button>
        </div>
    </main>

    <?php include 'admin_footer.php'; ?> 
    
</body>
</html>
