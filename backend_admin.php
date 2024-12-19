<?php

require 'config.php';


// Check which form was submitted
if (isset($_POST['update_seller'])) {
    // Update seller data
    $unic = $_POST["nic"];
    $uname = $_POST["username"];
    $uemail = $_POST["email"];
    $ucontact = $_POST["contact"];

    $sql = "UPDATE seller SET username='$uname', Email='$uemail', phone_number='$ucontact' WHERE NIC='$unic'";

    if ($con->query($sql)) {
        echo "<script>alert('Seller record updated successfully.');</script>";
    } else {
        echo "<script>alert('Seller record not updated: " . $con->error . "');</script>";
    }
}

if (isset($_POST['update_buyer'])) {
    // Update buyer data
    $unic = $_POST["nic"];
    $uname = $_POST["username"];
    $uemail = $_POST["email"];
    $ucontact = $_POST["contact"];

    $sql = "UPDATE buyers SET username='$uname', email='$uemail', phone_number='$ucontact' WHERE NIC='$unic'";

    if ($con->query($sql)) {
        echo "<script>alert('Buyer record updated successfully.');</script>";
    } else {
        echo "<script>alert('Buyer record not updated: " . $con->error . "');</script>";
    }
}



//Insert manager data
if (isset($_POST['create_manager'])) {
    $mnic = $_POST["nic"];
    $mname = $_POST["username"];
    $memail = $_POST["email"];
    $mpassword = $_POST["password"];

    $sqli = "INSERT INTO Managers (NIC, username, email, password) 
             VALUES ('$mnic', '$mname', '$memail', '$mpassword')";

    if ($con->query($sqli))
    {
        echo "<script>alert('Manager Account  successfully created.');</script>";
    }
    else
    {
        echo("Error".$con->error);
    }

}


//update admin data
if (isset($_POST['update_admin'])) {
    
    $unic = $_POST["work_id"];
    $uname = $_POST["username"];
    $uemail = $_POST["email"];
    

    $sql = "UPDATE admin SET username='$uname', email='$uemail' WHERE NIC='$unic'";

    if ($con->query($sql)) {
        echo "<script>alert('Admin record updated successfully.');</script>";
    } else {
        echo "<script>alert('Admin record not updated: " . $con->error . "');</script>";
    }
}


// Close the database connection 
$con->close();

//include 'index.php';
?>









