<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 90%;
            margin: auto;
            overflow: hidden;
            padding: 20px;
        }
        .tab {
            overflow: hidden;
            border: 1px solid #ccc;
            background-color: #f1f1f1;
            margin-bottom: 20px;
        }
        .tab button {
            background-color: #ddd;
            float: left;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            transition: 0.3s;
            font-size: 17px;
            font-weight: bold;
            margin-right: 5px;
        }
        .tab button:hover {
            background-color: #bbb;
        }
        .tab button.active {
            background-color: #4CAF50;
            color: white;
        }
        .tabcontent {
            display: none;
            padding: 20px;
            border: 1px solid #ccc;
            border-top: none;
            background-color: white;
        }
        .seller-profile {
            background-color: #fff;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"], input[type="number"], textarea, input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
        }
        button:hover {
            background-color: #45a049;
        }
        .action-button {
            padding: 8px 12px;
            margin: 2px;
            font-size: 14px;
        }
        .update-button {
            background-color: #008CBA;
        }
        .delete-button {
            background-color: #f44336;
        }
    </style>
</head>
<body>
    
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
include 'config.php';

if (!isset($_SESSION['NIC'])) {
    header("Location: Login.php");
    exit();
}

$NIC = $_SESSION['NIC'];

$sql = "SELECT NIC, username, Email, first_name, last_name FROM seller WHERE NIC = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $NIC);
$stmt->execute();
$result = $stmt->get_result();
$seller = $result->fetch_assoc();

$seller_username = $seller['username'] ?? 'Unknown';
$seller_email = $seller['Email'] ?? 'No email provided';
$seller_fname = $seller['first_name'] ?? 'No first name provided';
$seller_lname = $seller['last_name'] ?? 'No last name provided';
$seller_nic = $seller['NIC'] ?? 'No seller ID provided';

$stmt->close();
$con->close();
?>


<div class="container">
    <div class="tab">
        <button class="tablinks" id="defaultOpen" onclick="openTab(event, 'MyApartments')">My Apartments</button>
        <button class="tablinks" onclick="openTab(event, 'AddApartment')">Add Apartment</button>
        <button class="tablinks" onclick="openTab(event, 'MyReservations')">My Reservations</button>
        <form method="POST" action="seller_logout.php">
            <button type="submit" class="logout-btn" style="align-items: right; color:#f44336">Logout</button>
        </form>
    </div>

    <div class="seller-profile">
        <h2><?php echo htmlspecialchars($seller_fname . ' ' . $seller_lname); ?></h2>
        <p>Email: <?php echo htmlspecialchars($seller_email); ?></p>
        <p>Seller ID: <?php echo htmlspecialchars($seller_nic); ?></p>
        
        <table>
            <tr>
                <th>Seller ID</th>
                <th>Name</th>
                <th>Email</th>
            </tr>
            <tr>
                <td><?php echo htmlspecialchars($seller_nic); ?></td>
                <td><?php echo htmlspecialchars($seller_fname. ' ' . $seller_lname); ?></td>
                <td><?php echo htmlspecialchars($seller_email); ?></td>
            </tr>
        </table>
    </div>

    <div id="AddApartment" class="tabcontent">
        <h2>Add New Apartment</h2>
        <form action="addApartment.php" method="post" enctype="multipart/form-data">
            <label for="apartmentImage">Upload Image:</label>
            <input type="file" id="apartmentImage" name="apartment_image" accept="image/*" required>

            <label for="apartmentType">Apartment Type:</label>
            <input type="text" id="apartmentType" name="apartment_type" required>

            <label for="apartmentName">Apartment Name:</label>
            <input type="text" id="apartmentName" name="apartment_name" required>

            <label for="location">Location:</label>
            <input type="text" id="location" name="apartment_location" required>

            <label for="price">Price:</label>
            <input type="number" id="price" name="apartment_price" required>

            <label for="description">Description:</label>
            <textarea id="description" name="apartment_description" required></textarea>

            <label for="district">District:</label>
            <input type="text" id="district" name="apartment_district" required>

            <input type="hidden" name="NIC" value="<?php echo htmlspecialchars($NIC); ?>">

            <button type="submit">Add Apartment</button>
        </form>
    </div>

    <div id="MyApartments" class="tabcontent">
    <h2>My Apartments</h2>
    <table id="users">
        <tr>
            <th>Image</th>
            <th>Apartment Name</th>
            <th>Apartment Type</th>
            <th>Location</th>
            <th>Price</th>
            <th>Description</th>
            <th>District</th>
            <th>Actions</th>
        </tr>
        <?php
        include 'config.php';

        $sql = "SELECT * FROM apartments WHERE NIC = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("i", $NIC);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "
                <tr>
                    <td><img src='uploads/".htmlspecialchars($row['images'])."' width='100' height='100'></td>
                    <td>".htmlspecialchars($row['apartment_name'])."</td>
                    <td>".htmlspecialchars($row['Apartment_type'])."</td>
                    <td>".htmlspecialchars($row['location'])."</td>
                    <td>".htmlspecialchars($row['price'])."</td>
                    <td>".htmlspecialchars($row['description'])."</td>
                    <td>".htmlspecialchars($row['district'])."</td>
                    <td>
                        <form action='deleteOrUpdateA.php' method='post'>
                            <input hidden value='".htmlspecialchars($row['id'])."' required type='text' name='id'>
                            <button type='submit' name='update' class='action-button update-button'>Update</button>
                            <button type='submit' name='delete' onclick='return checkdelete()' class='action-button delete-button'>Delete</button>
                        </form>
                    </td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='8'>No apartments found</td></tr>";
        }

        $stmt->close();
        $con->close();
        ?>
    </table>
</div>
    <div id="MyReservations" class="tabcontent">
    <h2>My Reservations</h2>
    <table id="reservations">
        <tr>
            <th>Reservation ID</th>
            <th>Name</th>
            <th>Contact Number</th>
            <th>Email</th>
            <th>Reservation Date</th>
        </tr>
        <?php
        include 'config.php';

        //get all reservations
        $sql = "SELECT * FROM reservation";
        $result = $con->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>".htmlspecialchars($row['id'])."</td>
                    <td>".htmlspecialchars($row['name'])."</td>
                    <td>".htmlspecialchars($row['contact_no'])."</td>
                    <td>".htmlspecialchars($row['email'])."</td>
                    <td>".htmlspecialchars($row['reservation_date'])."</td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No reservations found</td></tr>";
        }

        $con->close();
        ?>
    </table>
</div>
    </table>
</div>
</div>
    </div>
</div>

<script>
function openTab(evt, tabName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(tabName).style.display = "block";
  evt.currentTarget.className += " active";
}

document.getElementById("defaultOpen").click();

function checkdelete() {
  return confirm('Are you sure you want to delete this apartment?');
}
</script>

</body>
</html>