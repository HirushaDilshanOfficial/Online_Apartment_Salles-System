<?php
// Include Connection PHP File
require "config.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $uname = $_POST["uname"];
    $email = $_POST["email"];
    $nic = $_POST["nic"];
    $cno = $_POST["cno"];
    $password = $_POST["password"];

    //check gmail
    $checkQuery = "SELECT * FROM buyers WHERE email = '$email'";
    $result = $con->query($checkQuery);

    if($result->num_rows > 0){
        //Email already exists
        echo "<script>alert('This Email address is already registered. please use different one.')</script>";
        echo "<script>window.location.href='insert_N.php'</script>";
    }
    else{

    // Insert data into the database
    $sql = "INSERT INTO buyers (first_name , last_name , username, email, nic, phone_number, password)
            VALUES ('$fname','$lname' , '$uname' ,'$email', '$nic', '$cno', '$password')";

    // Check if the insert was successful
    if($con->query($sql) === TRUE){
        echo "<script>alert('Data Added successfully');</script>";
        echo "<script>window.location.href='display_n.php'</script>";
    }
    else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
    }
}
// Close the connection
$con->close();
?>
