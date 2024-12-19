<?php
//insert DB connection
require 'config.php';

//check the delete_id parameter exists in the URL
if(isset($_GET['delete'])){
   $deleteID = $_GET['NIC'];

   $sql = "DELETE FROM buyers WHERE id ='$deleteID'";
   if($con->query($sql)=== TRUE){
        echo"<script> alert('User Account Deleted'); </script>";
   }
   else{
    echo " Account Deleted failed";
   }

    //else{
    //echo " Deleted id arameter not found";}  
}

$con->close();
   
?>