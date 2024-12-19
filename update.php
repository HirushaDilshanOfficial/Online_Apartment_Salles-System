<?php
//db connection
require 'config.php'; // Ensure this file properly defines $conn

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    echo "ID received: " . $id;  // Debugging output

    // Retrieve the record with the given ID
    $sql = "SELECT * FROM buyers WHERE id = '$id'";
    echo $sql;  // Debugging output
    $result = $con->query($sql);

    // Check if the query was successful
    if ($result === false) {
        die("Error in SQL query: " . $con->error); // Output the error for debugging
    }

    if ($result->num_rows > 0) {
        echo "Record found";  // Debugging output
        $row = $result->fetch_assoc();
        $fname = $row["fullName"];
        $email = $row["email"];
        $nic = $row["nic"];
        $cno = $row["contactNo"];
        $password = $row["userPassword"];

        // Display the update form
        echo "<form action='./update_end.php' method='POST'>";
        echo "<input type='hidden' name='id' value='" . $id . "'>";  // Hidden field for the ID

        echo "<label for='name'>Full Name:</label><br>";
        echo "<input type='text' id='fname' name='fname' value='" . $fname . "'><br>";

        echo "<label for='email'>Email:</label><br>";
        echo "<input type='text' id='email' name='email' value='" . $email . "'><br>";

        echo "<label for='nic'>NIC:</label><br>";
        echo "<input type='text' id='nic' name='nic' value='" . $nic . "'><br>";

        echo "<label for='contact no'>Contact No:</label><br>";
        echo "<input type='text' id='cno' name='cno' value='" . $cno . "'><br>";

        echo "<label for='password'>Password:</label><br>";
        echo "<input type='text' id='password' name='password' value='" . $password . "'><br>";

        echo "<button type='submit'>Update</button>";

        echo "</form>";
    } else {
        echo "No record available";
    }
} else {
     echo "ID parameter is missing";
}
?>
