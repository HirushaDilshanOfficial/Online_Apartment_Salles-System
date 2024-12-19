<?php
//insert DB connection
require 'config.php';

//Retrieve data from the database
$sql = "SELECT * FROM buyers";
$result = $con->query($sql);

if($result->num_rows > 0 ){
    while($row = $result -> fetch_assoc()){
        echo "<tr>";
        echo "<td>" . $row["first_name"] . "</td>";
        echo "<td>" . $row["username"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["NIC"] . "</td>";
        echo "<td>" . $row["phone_number"] . "</td>";
        echo "<td>" . $row["password"] . "</td>";
        echo "<td>";
        echo "<button onclick=\"redirectToUpdateForm(".$row["NIC"] .")\">Update</button>";
        echo "<a href =\"delete_N.php?delete_id=" .$row["NIC"] . "\">Delete</a>";
        echo"</td>";
        echo"</tr>";
    }
}
else{
    echo "No data available";
}
$con->close();
?>