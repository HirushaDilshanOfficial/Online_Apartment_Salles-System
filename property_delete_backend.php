<?php

    require 'config.php';

    //Delete Properties
    if (isset($_POST["id"])) {
    $id = $_POST["id"];

    $sql = "DELETE FROM sellers WHERE NIC='$id' ";

    if ($conn->query($sql))
    {
        echo "SUCCESSFULLY DELETED";
    }
    else
    {
        echo "NOT DELETED";
    }
    }