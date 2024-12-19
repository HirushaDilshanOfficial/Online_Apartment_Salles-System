<?php

include 'config.php'; 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


if (isset($_GET['id'])) {
    // Get the property ID from the URL
    $property_id = $_GET['id'];

    
    $sql = "SELECT * FROM apartments WHERE id = $property_id";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "<div class='property-info'>";
        echo "<p><strong>ID:</strong> " . $row["id"] . "</p>";
        echo "<p><strong>Name:</strong> " . $row["apartment_name"] . "</p>";
        echo "<p><strong>Price:</strong> Rs " . $row["price"] . "</p>";
        echo "<p><strong>Size:</strong> " . $row["Apartment_type"] . " sqft</p>";
        echo "<p><strong>Location:</strong> " . $row["location"] . "</p>";
        echo "<p><strong>Description:</strong> " . $row["description"] . "</p>";
        echo "</div>";
    } else {
        echo "Property not found";
    }

}





if (isset($_POST['btn-reservation'])) {
    $rnic = $_POST["id"];
    $rname = $_POST["name"];
    $rcontact = $_POST["contact_no"];
    $remail = $_POST["email"];
    $rdate = $_POST["date"];

    $sqli = "INSERT INTO reservation VALUES ('$rnic' , '$rname' , '$rcontact' , '$remail' , '$rdate' )";

    if ($con->query($sqli))
    {
        echo "<script>
                alert('Reservation successfully recorded.');
                window.location.href = 'property.php'; 
              </script>";
        exit(); 
    }
    else
    {
        echo("Error".$con->error);
    }

}


$con->close();

?>
