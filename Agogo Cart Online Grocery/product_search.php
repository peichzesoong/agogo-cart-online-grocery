<?php require('templates/header.php') ?>
<div class="d-flex mt-4 mx-4">
	<?php $search = $_POST['search']; //get the search input from user 
	?>
	<h3>Search result for '<?php echo $search ?>'</h3>
</div>

<div class="d-flex my-2">
	<?php // output success or failed message.
	if (isset($smsg)) { ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
	<?php if (isset($fmsg)) { ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
</div>

<div class="row main-section">
	<?php
	$search = htmlspecialchars($search);

	// sql query to select from product database to search by product name
	$SelSql = "SELECT * FROM product WHERE productName LIKE '%" . $search . "%'";

	$productList = filterData("SELECT * FROM product WHERE productName LIKE '%" . $search . "%'");

	if(count($productList)>0){ //if found
		foreach ($productList as $product) {
			include('templates/product.php');
		}
	}else{
		$SelSql = "SELECT * FROM product INNER JOIN brand ON product.productBrand=brand.brandID WHERE brandName LIKE '%" . $search . "%'";
		$productList = filterData("SELECT * FROM product INNER JOIN brand ON product.productBrand=brand.brandID WHERE brandName LIKE '%" . $search . "%'");

		if(count($productList)>0){ //if found
			foreach ($productList as $product) {
				include('templates/product.php');
			}
		}else{ ?>
			<div class="d-flex mt-4 mx-4">
				<?php echo "No products found. Try different keywords."; 
		}?>
			</div>
	<?php } ?>
</div>
