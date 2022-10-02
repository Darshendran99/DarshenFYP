
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/product.css'); ?>">
  <script type="text/javascript" src="<?php echo base_url('js/custom.js'); ?>"></script>
			<h2>Product Details Page</h2>
	<div class="home_Container">


			<div class="ImageSection">
				<img class="productImg" src="data:image/png;base64,<?php echo base64_encode($product["ProductImage"]); ?>"/>
				<p>Posted on [ <?php echo $product["CreatedOn"]; ?> ]</p>
				<?php if (session()->get('isLoggedIn')): ?>
				<button type="button" onclick="location.href='<?php echo base_url();?>/Home/Products'">Add To Cart</button>
				<?php else: ?>
				<button type="button" onclick="location.href='<?php echo base_url();?>/Home/Login'">Add To Cart</button>
				<?php endif; ?>
			</div>

			<div class="DescSection">
				<h1><?php echo $product["ProductName"]; ?></h1>
				<p><?php echo $product["ProductDetails"]; ?></p>
				<br>
				<p><?php echo $product["ProductPerformance"]; ?></p>
				<p class="ProductPrice">Total Price: RM<?php echo $product["ProductPrice"]; ?>.00</p>
			</div>
	</div>


<?php echo view('sections/footer.php');?>
