<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'config.php';


// Fetch properties from the database
$sql = "SELECT * FROM apartments";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo '<div class="property-card" data-district="' . $row["district"] . '">';
        echo '<img src="' . $row["images"] . '" alt="Properties Images' . '">';
        echo '<h3>' . $row["apartment_name"] . '</h3>';
        echo '<p>Price: Rs : ' . $row["price"] . '</p>';
        echo '<p>Type of Apartment: ' . $row["Apartment_type"] ;
        echo '<p>Location: ' . $row["location"] . '</p>';
        echo '<a href="moredetails.php?id=' . $row["id"] . '" class="see-more" style="color:white; background-color:blue; text-decoration:none; padding:5px 10px;">See More</a>';
        echo '</div>';
    }
} else {
    echo "No properties found.";
}

$con->close();
?>