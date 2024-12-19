<?php

    require 'config.php';

    //Sellers account delete
    if (isset($_POST["sid"])) {
    $id = $_POST["sid"];

    $sql = "DELETE FROM seller WHERE NIC='$id' ";

    if ($con->query($sql))
    {
        echo "SUCCESSFULLY DELETED";
    }
    else
    {
        echo "NOT DELETED";
    }
    }
    


    //Buyers account delete 
    if (isset($_POST["bid"])) {
    $id = $_POST["bid"];

    $sql = "DELETE FROM buyers WHERE NIC='$id' ";

    if ($con->query($sql))
    {
        echo "SUCCESSFULLY DELETED";
    }
    else
    {
        echo "NOT DELETED";
    }
    }

    



    //Managers accounts delete
    if (isset($_POST["mid"])) {
    $id = $_POST["mid"];

    $sql = "DELETE FROM managers WHERE NIC='$id' ";

    if ($con->query($sql))
    {
        echo "SUCCESSFULLY DELETED";
    }
    else
    {
        echo "NOT DELETED";
    }

    $con->close();
    }

?>