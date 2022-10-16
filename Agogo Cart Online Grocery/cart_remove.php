<?php
session_start();

$itemNo = $_POST["product"];
$_SESSION['cart'] = array_values($_SESSION['cart']);
unset($_SESSION['cart'][$itemNo]);

header("location: cart.php");
