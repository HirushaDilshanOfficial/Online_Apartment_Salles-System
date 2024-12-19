<?php
session_start();
include 'config.php';



// Check if the user is logged in
if (!isset($_SESSION['NIC'])) {
    header("Location: login.php");
    exit();
}

//collect apartment details from the database
if (isset($_GET['id'])) {
    $apartment_id = $_GET['id'];
    $sql = "SELECT * FROM apartments WHERE id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $apartment_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $apartment = $result->fetch_assoc();
    } else {
        echo "Apartment not found.";
        exit();
    }
}

// Handle the update operation
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $apartment_id = $_POST['id'];
    $apartment_type = $_POST['apartment_type'];
    $apartment_name = $_POST['apartment_name'];
    $apartment_location = $_POST['apartment_location'];
    $apartment_price = $_POST['apartment_price'];
    $apartment_description = $_POST['apartment_description'];
    $apartment_district = $_POST['apartment_district'];

    
    $image_path = null;
    if (!empty($_FILES['apartment_image']['name'])) {
        $target_dir = "uploads/"; 
        $image_path = $target_dir . basename($_FILES['apartment_image']['name']);
        move_uploaded_file($_FILES['apartment_image']['tmp_name'], $image_path);
    }

   
    $sql = "UPDATE apartments 
            SET Apartment_type = ?, apartment_name = ?, location = ?, price = ?, description = ?, district = ?";
    
    if ($image_path) {
        $sql .= ", images = ?";
    }

    $sql .= " WHERE id = ?";

    //the SQL statement
    $stmt = $con->prepare($sql);
    
    if ($image_path) {
        $stmt->bind_param("sssssssi", $apartment_type, $apartment_name, $apartment_location, $apartment_price, $apartment_description, $apartment_district, $image_path, $apartment_id);
    } else {
        $stmt->bind_param("ssssssi", $apartment_type, $apartment_name, $apartment_location, $apartment_price, $apartment_description, $apartment_district, $apartment_id);
    }

    //Execute the statement
    if ($stmt->execute()) {
        $_SESSION['success_message'] = "Apartment updated successfully!";
        header("Location: sellerDashboard.php");
        exit();
    } else {
        $_SESSION['error_message'] = "Error updating apartment: " . $stmt->error;
    }

    
    $stmt->close();
}


$con->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Apartment</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 80%;
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        h2 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-top: 10px;
            font-weight: bold;
            color: #555;
        }
        input[type="text"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 10px;
            margin: 5px 0 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        textarea {
            height: 100px;
            resize: vertical;
        }
        .current-image {
            margin: 10px 0;
        }
        .current-image img {
            max-width: 200px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #45a049;
        }
        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #666;
            text-decoration: none;
        }
        .back-link:hover {
            color: #333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Update Apartment</h2>
        <?php if (isset($_SESSION['error_message'])): ?>
            <div style="color: red;"><?php echo $_SESSION['error_message']; unset($_SESSION['error_message']); ?></div>
        <?php endif; ?>
        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($apartment['id']); ?>">
            
            <div class="current-image">
                <label>Current Image:</label><br>
                <img src="<?php echo htmlspecialchars($apartment['images']); ?>" alt="Current Apartment Image">
            </div>
            
            <label for="apartmentImage">Upload New Image (optional):</label>
            <input type="file" id="apartmentImage" name="apartment_image" accept="image/*">
            
            <label for="apartmentType">Apartment Type:</label>
            <input type="text" id="apartmentType" name="apartment_type" 
                   value="<?php echo htmlspecialchars($apartment['Apartment_type']); ?>" required>
            
            <label for="apartmentName">Apartment Name:</label>
            <input type="text" id="apartmentName" name="apartment_name" 
                   value="<?php echo htmlspecialchars($apartment['apartment_name']); ?>" required>
            
            <label for="location">Location:</label>
            <input type="text" id="location" name="apartment_location" 
                   value="<?php echo htmlspecialchars($apartment['location']); ?>" required>
            
            <label for="price">Price:</label>
            <input type="number" id="price" name="apartment_price" 
                   value="<?php echo htmlspecialchars($apartment['price']); ?>" required>
            
            <label for="description">Description:</label>
            <textarea id="description" name="apartment_description" required><?php echo htmlspecialchars($apartment['description']); ?></textarea>
            
            <label for="district">District:</label>
            <input type="text" id="district" name="apartment_district" 
                   value="<?php echo htmlspecialchars($apartment['district']); ?>" required>
            
            <button type="submit">Update Apartment</button>
        </form>
        <a href="sellerDashboard.php" class="back-link">Back to Dashboard</a>
    </div>
</body>
</html>
