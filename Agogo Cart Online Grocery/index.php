<!-- INITIALIZATION -->
<?php 
require('templates/header.php');
$product_list = getData();
?>


<div class="container-fluid mt-3">
	<div class="d-flex my-2">
		<?php // output success or failed message.
		if (isset($smsg)) { ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
		<?php if (isset($fmsg)) { ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
	</div>
</div>
	<!--filter-->
	<?php require('templates/filternsort.php') ?>
	<!-- all products display here -->
	<?php require('templates/allproduct.php') ?>
	<?php require('templates/footer.php') ?>
	