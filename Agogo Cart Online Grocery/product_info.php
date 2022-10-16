<!-- product information page. this page displays product details according to the corresponding product.-->

<?php require('templates/header.php') ?>

<div class="d-flex my-2">
	<?php // output success or failed message.
	if (isset($smsg)) { ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
	<?php if (isset($fmsg)) { ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
</div>

<div class="row main-section">
	<?php
	// get productID value and productCategory value from URL
	$productID = $_GET['productID'];
	$productCategory = $_GET['productCategory'];

	foreach (getData() as $product) :
		if ($product['productID'] == $productID) :
	?>
</div>

<div class="container-fluid d-flex h-100">
	<div class="row align-items-center h-100">
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 mb-4">
			<!-- display product image -->
			<img src="./assets/products/<?php echo $product['productImage']; ?>" alt="Product Image">
		</div>
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
			<h3 class="font-name"><b><?php echo $product['productName'];
										?></b></h3>
			<h5 class="font-paragraph">by
				<?php
				$brandID = $product['productBrand'];
				$brand = filterData("SELECT * FROM brand WHERE brandID='$brandID'");
				foreach ($brand as $item) {
					echo $item['brandName'];
				}
				?>
				<h5 class="font-name">RM <?php echo $product['productUnitPrice']; ?></h5>
				<p class="font-paragraph"><?php echo $product['productDescription']; //product description 
												?></p>
				<br>

				<!-- add to cart button -->
				<form action="cart_function.php" method="POST" class="form-inline my-2 my-lg-2">
					<input class="form-control mr-sm-2 col-3" type="number" name="quantity" value="1">
					<input class="form-control mr-sm-2 col-3" type="hidden" name="productID" value="<?php echo $product['productID'] ?>">
					<button class="btn btn-line-light my-2 my-sm-0" type="submit" id="btnCart">Add to cart</button>
				</form>

		</div>

	</div>
</div>

<div class="container-fluid mt-4">
	<div class="row">
		<div class="col-12">
			<!-- display all product information accordingly -->
			<h5 class="font-name">Product Ingredients</h5>
			<p class="font-paragraph"><?php echo $product['productIngredient']; ?></p>

			<h5 class="font-name">Product Provider</h5>
			<p class="font-paragraph"><?php echo $product['productProvider']; ?></p>

			<h5 class="font-name">Product Numeric Size</h5>
			<p class="font-paragraph"><?php echo $product['productNumericSize']; ?></p>

			<h5 class="font-name">Product Unit</h5>
			<p class="font-paragraph"><?php echo $product['productUnit']; ?></p>

			<h5 class="font-name">Product Stock</h5>
			<p class="font-paragraph"><?php echo $product['productStock']; ?></p>

			<h5 class="font-name">Product Category</h5>
			<p class="font-paragraph">
				<?php
				$categoryID = $product['productCategory'];
				$category = filterData("SELECT * FROM category WHERE categoryID='$productCategory'");

				foreach ($category as $item) {
					echo $item['categoryName'];
				}
				?>
			</p>
		</div>
<?php
		endif;
	endforeach;
?>
	</div>
<?php require('templates/footer.php') ?>