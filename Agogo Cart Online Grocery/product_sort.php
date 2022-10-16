<?php require('templates/header.php') ?>


<div class="d-flex mt-4 mx-4">
	<?php $order = $_GET['order']; // get the choice of order selected by user 
	?>
	<h3>Sort by: <?php echo "$order<br>"; ?></h3>
</div>
<?php require('templates/backtoall.php') ?>
<div class="d-flex my-2">
	<?php // output success or failed message.
	if (isset($smsg)) { ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
	<?php if (isset($fmsg)) { ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
</div>

<div class="row main-section">
	<?php

	switch ($order) {
		case 'Price Low to High':
			$product_list = filterData("SELECT * FROM product ORDER BY productUnitPrice");
			break;
		case 'Price High to Low':
			$product_list = filterData("SELECT * FROM product ORDER BY productUnitPrice DESC");
			break;
		case 'A to Z':
			$product_list = filterData("SELECT * FROM product ORDER BY productName");
			break;
		case 'Z to A':
			$product_list = filterData("SELECT * FROM product ORDER BY productName DESC");
			break;
	}
	foreach ($product_list as $product) {
		include('templates/product.php');
	}

	?>
</div>