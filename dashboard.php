<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manager Dashboard</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/footer.css">

</head>

<body>
    <?php include 'header.php';?>

    <div class="heading">
    <h2>Manager Dashboard</h2>
    <form method="POST" action="logout.php">
        <button type="submit" class="logout-btn">Logout</button>
    </form>
    </div>
    <br>

    <div class="dashboard-container">
        <div class="chart">
            <canvas id="chartWeekLyAdds"></canvas>
            <div class="chart-label">Adds posted weekly</div>
        </div>
       
        <div class="chart">
            <canvas id="chartMonthlyAdds"></canvas>
            <div class="chart-label">Adds posted monthly</div>

        </div>
        <p>Do you want to delete the property?<a href="property_delete.php">Delete</a></p>
        <a href="publish_notices.php" class="publish-notice-btn">Publish Notice</a>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="js/chart.js"></script>
    
    <?php include 'footer.php';
    ?>
</body>

</html>