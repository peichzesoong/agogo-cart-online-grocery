<?php


$ID = $_SESSION['id'];
$total = $_SESSION['grandTotal'];

$sql = "INSERT INTO orders VALUES (NULL, '$ID','$total',NULL,NULL)";

global $con;

if ($con->query($sql) === TRUE) {
    // echo "Congratulations, product Record Updated : D";
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
};
?>