<?php
   
   $con = new mysqli("localhost","root","","apartment-salles-systems");
   
    if($con->connect_error)
    {
       die("Connection failed.".$con->connect_error);
    }
    
?>