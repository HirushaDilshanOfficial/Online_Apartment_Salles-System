<?php
//include DB connection
require 'config.php';

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $ID = $_POST["id"];
    $fname = $_POST["fname"];
    $email = $_POST["email"];
    $nic = $_POST["nic"];
    $cno = $_POST["cno"];
    $password = $_POST["password"];

    //Update data in the database
    $sql = "UPDATE buyers SET fullName ='$fname' email ='$email'
    nic ='$nic' contactNo ='$cno' userPassword ='$password'
    WHERE id = '$ID'";

    //check if update was successful
    if($conn->query($sql) === TRUE){
        echo "<script>alert('User Details Updated successfully');</script>";
        echo "<script>window.location.href='display.php';</script>";
        exit();
    }
    else{
        echo "Details Updated Failed :" .$conn->error;
    }
}
//close connection
$conn->close();
?>