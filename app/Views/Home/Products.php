<?php

	echo view('sections/header.php');

?>
	  <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/product.css'); ?>">
  <script type="text/javascript" src="<?php echo base_url('js/custom.js'); ?>"></script>
  <h2>Products Page</h2>

	<div class="productContainer">
		<?php foreach ($product as $product): ?>
		<div class="products">
			<img class="productImg" src="data:image/png;base64,<?php echo base64_encode($product["ProductImage"]); ?>"/>
			<h4 class="productName"> <?php echo $product["ProductName"]; ?> </h4>
			<p class="productPrice">RM <?php echo $product["ProductPrice"]; ?>/-</p>
			<button type="button"> More Details</button>
		</div>
		<?php endforeach; ?>

	</div>


	<?php echo view('sections/footer.php');?>
