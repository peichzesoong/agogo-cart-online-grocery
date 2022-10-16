<?php
    session_start();
    require('connection.php');

    $orderID = $_POST['orderID'];

    $sql = "UPDATE orders SET orderReceived = '1' WHERE orderID = '$orderID'";
    if ($con->query($sql) === TRUE) {
        // echo "Congratulations, product Record Updated : D";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    };

    header("location: order.php");
