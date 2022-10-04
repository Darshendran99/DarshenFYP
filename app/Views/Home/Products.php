
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/product.css'); ?>">

<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<div class="page-content">
				<div class="heading-section">
					<h4><em>StellarPC's</em> Products</h4>
				</div>
					<div class="row">
						<?php foreach ($product as $product): ?>
						<div class="col-lg-3 col-sm-6">
							<img class="productImg" src="data:image/png;base64,<?php echo base64_encode($product["ProductImage"]); ?>"/>
							<h4 class="productName"> <?php echo $product["ProductName"]; ?> </h4>
							<p class="productPrice">RM <?php echo $product["ProductPrice"]; ?>/-</p> <br>
							<div class="main-button">
							<a href="<?php echo base_url();?>/Home/ProductDetails/<?php echo $product["ProductId"]; ?>"/> More Details</a>
						</div>
						</div>
						<?php endforeach; ?>

					</div>






			</div>
			</div>
			</div>
			</div>



	<?php echo view('sections/footer.php');?>
