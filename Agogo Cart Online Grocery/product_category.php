<?php require('templates/header.php') ?>
<!-- Import Database Elements -->

<div class="d-flex mt-4 mx-4">
	<?php
	// get cateogryID value and categoryName value from URL
	$categoryid = $_GET['categoryID'];
	$categoryname = $_GET['categoryName'];
	?>
	<h3>Filter result : <?php echo "$categoryname<br>"; ?></h3>
</div>
<?php require('templates/backtoall.php') ?>
<div class="d-flex my-2">
	<?php // output success or failed message.
	if (isset($smsg)) { ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
	<?php if (isset($fmsg)) { ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
</div>

<div class="row main-section">
	<?php
	$categoryid = htmlspecialchars($categoryid);
	$product_list = filterData("SELECT * FROM product WHERE productCategory='$categoryid'");

	foreach ($product_list as $product) {
		include('templates/product.php');
	}
	?>
</div>
