<?php
require('templates/header.php');
$order_list = getData('orders');

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: account_login.php");
    exit;
}
?>
<div id="cartView" class="row main-section ">
    <?php
        foreach ($order_list as $order) {
            if ($order['customerID'] == $_SESSION['id']) {
                include('templates/orderItem.php');
            }
        }
    ?>
</div>
<?php require('templates/footer.php') ?>