
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<div class="page-content">

			<?php if (session()->get('isLoggedIn')): ?>
			<h1>Hello, <?= session()->get('firstname') ?></h1>
			<?php endif; ?>

<!-- Banner -->
			<div class="main-banner">
				<div class="row">
					<div class="col-lg-7">
						<div class="header-text">
							<h6>Welcome To StellarPC</h6>
							<h4><em>Build Your Own </em>Custom PC</h4>
							<div class="main-button">
								<a href="<?php echo base_url();?>/Home/Build_PC">Check It Out Now</a>
							</div>
						</div>
					</div>
				</div>
			</div>

<!-- Most Popular Product -->
<div class="most-popular">
	<div class="row">
		<div class="col-lg-12">
			<div class="heading-section">
				<h4><em>Most Popular</em> Right Now</h4>
			</div>
			<div class="row">
				<!-- Product -->
				<div class="col-lg-3 col-sm-6">
					<div class="item">
						<img src="data:image/png;base64,<?php echo base64_encode($product["ProductImage"]); ?>" style="width:220px;height:200px;"/>
						<h4> <?php echo $product["ProductName"]; ?> </h4>
					  <h4>Product <span>Prebuilt Custom PC</span></h4>
						<ul>
							<li><i class="fa fa-star"></i> RM <?php echo $product["ProductPrice"];?></li>
						</ul>
					</div>
				</div>
				<!-- Promotion -->
				<div class="col-lg-3 col-sm-6">
					<div class="item">
						<img src="data:image/png;base64,<?php echo base64_encode($promotion["PromotionImage"]); ?>" style="width:220px;height:200px;"/>
						<h4> <?php echo $promotion["PromotionName"]; ?>	 </h4>
						<h4>Promotion <span>Bang for the buck</span></h4>
						<ul>
							<li><i class="fa fa-star"></i> RM <?php echo $promotion["PromotionPrice"];?></li>
						</ul>
					</div>
				</div>
				<!-- BuildYourPC -->
				<div class="col-lg-3 col-sm-6">
					<div class="item">
						<img src="data:image/png;base64,"/>
						<h4>  </h4>
						<h4>BuildYourPC<span>Prebuilt Custom PC</span></h4>
						<ul>
							<br>
							<li><i class="fa fa-star"></i> RM </li>
						</ul>
					</div>
				</div>
				<!-- BuildYourPC -->
				<div class="col-lg-3 col-sm-6">
					<div class="item">
						<img src="data:image/png;base64,"/>
						<h4>  </h4>
						<h4>BuildYourPC<span>Prebuilt Custom PC</span></h4>
						<ul>
							<br>
							<li><i class="fa fa-star"></i> RM </li>
						</ul>
					</div>
				</div>

				<div class="col-lg-12">
					<div class="main-button">
						<a href="<?php echo base_url();?>/Home/Products">Discover Products</a>
						<a href="<?php echo base_url();?>/Home/Promotion">Discover Promotion</a>
						<a href="<?php echo base_url();?>/Home/Build_PC">Build Your Own PC</a>
						<a href="">More Soon</a>
											</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Price Graph -->
<div class="gaming-library">
	<div class="col-lg-12">
		<div class="heading-section">
			<h4><em>Price</em> Graph</h4>
		</div>
		<div class="item">
			<ul>
				<li><img src="assets/images/game-01.jpg" alt="" class="templatemo-item"></li>
				<li><h4>GPU</h4><span>Price</span></li>
				<li><h4>C	PU</h4><span>Price</span></li>
		</div>
		</div>
		</div>






	</div>
	</div>
	</div>
	<?php echo view('sections/footer.php');?>
