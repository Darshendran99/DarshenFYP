
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/product.css'); ?>">

	  <div class="container">
	    <div class="row">
	      <div class="col-lg-12">
	        <div class="page-content">

						<div class="game-details">
							<div class="row">
								<div class="col-lg-12">
									<h2>Product	 Details</h2>
								</div>

								<div class="col-lg-12">
									<div class="content">
										<div class="row">
											<div class="col-lg-6">
												<div class="left-info">
													<div class="left">
														<h4> <?php echo $product["ProductName"];?></h4>
													</div>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="right-info">
													<h4>RM <?php echo $product["ProductPrice"];?></h>
													</div>
													</div>
													<div class="col-lg-4">
			                      <img class="productDetailsImage" src="data:image/png;base64,<?php echo base64_encode($product["ProductImage"]); ?>" alt="" style="border-radius: 23px; margin-bottom: 30px; ">
			                    </div>
													<div class="col-lg-12">
														<div class="productDetails">
														<img class="iconImg" src="<?php echo base_url('assets/image/cpuIcon.png'); ?>">
														<h5>Processor: &emsp;<?php echo $product["ProductCPU"]; ?> </h5>
														</div>
														<div class="productDetails">
														<img class="iconImg" src="<?php echo base_url('assets/image/gpuIcon.png'); ?>">
														<h5>Graphic Card: &emsp;<?php echo $product["ProductGPU"]; ?> </h5>
														</div>
														<div class="productDetails">
														<img class="iconImg" src="<?php echo base_url('assets/image/moboIcon.png'); ?>">
														<h5>Moptherboard: &emsp;<?php echo $product["ProductMobo"]; ?> </h5>
														</div>
														<div class="productDetails">
														<img class="iconImg" src="<?php echo base_url('assets/image/ramIcon.png'); ?>">
														<h5>RAM: &emsp;<?php echo $product["ProductRAM"]; ?> </h5>
														</div>
														<div class="productDetails">
														<img class="iconImg" src="<?php echo base_url('assets/image/ssdIcon.png'); ?>">
														<h5>SSD: &emsp;<?php echo $product["ProductSSD"]; ?> </h5>
														</div>
														<div class="productDetails">
														<img class="iconImg" src="<?php echo base_url('assets/image/psuIcon.png'); ?>">
														<h5>Power Supply: &emsp;<?php echo $product["ProductPSU"]; ?> </h5>
														</div>
														<div class="productDetails">
														<img class="iconImg" src="<?php echo base_url('assets/image/casingIcon.png'); ?>">
														<h5>Casing: &emsp;<?php echo $product["ProductCasing"]; ?> </h5>
														</div>

													</div>
													<div class="col-lg-12">
			                      <div class="main-border-button">
															<?php if (session()->get('isLoggedIn')): ?>
			                        		<a href="<?php echo base_url();?>/Home/Products">Add To Cart</a>
															<?php else: ?>
																<a href="<?php echo base_url();?>/Home/Login">Login to Add to Cart</a>
															<?php endif; ?>
			                      </div>
			                    </div>


												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="other-games">
			            <div class="row">
			              <div class="col-lg-12">
			                <div class="heading-section">
			                  <h4><em>Product</em> Performance</h4>
			                </div>
			              </div>

										<div class="col-lg-6">
											<div class="item">
												<img class="iconImg2" src="<?php echo base_url('assets/image/csgoIcon.png'); ?>">
												<h5>CGSO: &emsp; [ <?php echo $product["ProductCSGO"]; ?> FPS ]</h5>

											</div>
										</div>
										<div class="col-lg-6">
											<div class="item">
												<img class="iconImg2" src="<?php echo base_url('assets/image/fortniteIcon.png'); ?>">
												 <h5>Fortnite: &emsp; [ <?php echo $product["ProductFortnite"]; ?> FPS ]</h5>

											</div>
										</div>
										<div class="col-lg-6">
											<div class="item">
												<img class="iconImg2" src="<?php echo base_url('assets/image/gtavIcon.png'); ?>">
												<h5>GTA V: &emsp; [ <?php echo $product["ProductGTAV"]; ?> FPS ]</h5>

											</div>
										</div>
										<div class="col-lg-6">
											<div class="item">
												<img class="iconImg2" src="<?php echo base_url('assets/image/cyberpunkIcon.png'); ?>">
												<h5>Cyberpunk: &emsp; [ <?php echo $product["ProductCyberpunk"]; ?> FPS ]</h5>
											</div>

										</div>
										<div class="col-lg-6">
											<div class="item">
												<img class="iconImg3" src="<?php echo base_url('assets/image/3dmarkIcon.png'); ?>">
												<h5>3DMark (CPU): &emsp;<?php echo $product["Product3DMark"]; ?> Points</h5>

											</div>
										</div>
										<div class="col-lg-6">
											<div class="item">
												<img class="iconImg3" src="<?php echo base_url('assets/image/geekbenchIcon.png'); ?>">
												<h5>GeekBench (Multicore): &emsp;<?php echo $product["ProductGeekbench"]; ?> Points</h5>
											</div>
										</div>

										<div class="col-lg-6-p">
												<p>Created on <?php echo $product["CreatedOn"]; ?></p>
												<br>
										</div>

										</div>
										</div>



</div>
</div>
</div>
</div>



<?php echo view('sections/footer.php');?>
