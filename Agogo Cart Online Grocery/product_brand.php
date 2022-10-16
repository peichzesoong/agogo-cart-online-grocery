<?php require('templates/header.php') ?>


<div class="d-flex mt-4 mx-4">
	<?php
	// get brandID value and brandName value from URL
	$brandid = $_GET['brandID'];
	$brandname = $_GET['brandName'];
	?>
	<h3>Filter result : <?php echo "$brandname<br>"; ?></h3>
</div>
<?php require('templates/backtoall.php') ?>
<div class="d-flex my-2">
	<?php // output success or failed message.
	if (isset($smsg)) { ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
	<?php if (isset($fmsg)) { ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
</div>

<div class="row main-section">
	<?php
	$brandid = htmlspecialchars($brandid); 
	$product_list = filterData("SELECT * FROM product WHERE productBrand='$brandid'");

	foreach ($product_list as $product) {
		include('templates/product.php');
	}
	?>
</div>
