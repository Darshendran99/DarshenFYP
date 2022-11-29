<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/details.css'); ?>">

	  <div class="container">
	    <div class="row">
	      <div class="col-lg-12">
	        <div class="page-content">

						<div class="game-details">
							<div class="row">
								<div class="col-lg-12">
									<h2>Promotion	 Details</h2>
								</div>

								<div class="col-lg-12">
									<div class="content">
										<div class="row">
											<div class="col-lg-6">
												<div class="left-info">
													<div class="left">
														<h4> <?php echo $promotion["PromotionName"]; ?></h4>
													</div>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="right-info">
													<h4>RM <?php echo $promotion["PromotionPrice"]; ?> </h4>
                          <span>BEFORE [RM <?php echo $promotion["PromotionOriPrice"]; ?>] </span>
                            <h4> SAVE UP TO <?php echo round((($promotion["PromotionOriPrice"] - $promotion["PromotionPrice"]) / $promotion["PromotionOriPrice"]) * 100); ?> %</h4>
													</div>
													</div>
													<div class="col-lg-4">
			                      <img class="productDetailsImage" src="data:image/png;base64,<?php echo base64_encode($promotion["PromotionImage"]); ?>" alt="" style="border-radius: 23px; margin-bottom: 30px; ">
			                    </div>
													<div class="col-lg-12">

                            <?php if ($promotion["PromotionCPU"] != "")
{ ?>
														<div class="productDetails">
														<img class="iconImg" src="<?php echo base_url('assets/image/cpuIcon.png'); ?>">
														<h5>Processor: &emsp; <?php echo $promotion["PromotionCPU"]; ?></h5>
														</div>
                            <?php
} ?>

                            <?php if ($promotion["PromotionGPU"] != "")
{ ?>
														<div class="productDetails">
														<img class="iconImg" src="<?php echo base_url('assets/image/gpuIcon.png'); ?>">
														<h5>Graphic Card: &emsp; <?php echo $promotion["PromotionGPU"]; ?></h5>
														</div>
                            <?php
} ?>

                            <?php if ($promotion["PromotionMobo"] != "")
{ ?>
														<div class="productDetails">
														<img class="iconImg" src="<?php echo base_url('assets/image/moboIcon.png'); ?>">
														<h5>Moptherboard: &emsp; <?php echo $promotion["PromotionMobo"]; ?></h5>
														</div>
                            <?php
} ?>

                            <?php if ($promotion["PromotionRAM"] != "")
{ ?>
														<div class="productDetails">
														<img class="iconImg" src="<?php echo base_url('assets/image/ramIcon.png'); ?>">
														<h5>RAM: &emsp; <?php echo $promotion["PromotionRAM"]; ?></h5>
														</div>
                            <?php
} ?>

                            <?php if ($promotion["PromotionSSD"] != "")
{ ?>
														<div class="productDetails">
														<img class="iconImg" src="<?php echo base_url('assets/image/ssdIcon.png'); ?>">
														<h5>SSD: &emsp; <?php echo $promotion["PromotionSSD"]; ?></h5>
														</div>
                            <?php
} ?>

                            <?php if ($promotion["PromotionPSU"] != "")
{ ?>
														<div class="productDetails">
														<img class="iconImg" src="<?php echo base_url('assets/image/psuIcon.png'); ?>">
														<h5>Power Supply: &emsp; <?php echo $promotion["PromotionPSU"]; ?></h5>
														</div>
                            <?php
} ?>

                            <?php if ($promotion["PromotionCasing"] != "")
{ ?>
														<div class="productDetails">
														<img class="iconImg" src="<?php echo base_url('assets/image/casingIcon.png'); ?>">
														<h5>Casing: &emsp; <?php echo $promotion["PromotionCasing"]; ?></h5>
														</div>
                            <?php
} ?>

														<?php if ($promotion["PromotionOther"] != "")
{ ?>
															<div class="productDetails">
																<span>Additional parts include [ <?php echo $promotion["PromotionOther"]; ?> ] </span>
															</div>
														<?php
} ?>

                            <?php if ($promotion["NonPCDetails"] != "")
{ ?>
                              <div class="productDetails">
                                <span> <?php echo $promotion["NonPCDetails"]; ?> </span>
                              </div>
                            <?php
} ?>

													</div>
													<div class="col-lg-12">
			                      <div class="main-border-button">
															<?php if ($promotion["PromotionStatus"] == "ready")
{ ?>
																<?php if (session()->get('isLoggedIn')): ?>
			                        			<a href="<?php echo base_url(); ?>/Home/AddCart2/<?php echo $promotion["PromotionId"]; ?>">Add To Cart</a>
																	<?php
    else: ?>
																		<a href="<?php echo base_url(); ?>/Home/Login">Login to Add to Cart</a>
																	<?php
    endif; ?>
																	<?php
} ?>
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
			                  <h4><em>Product</em> Details</h4>
			                </div>
			              </div>

                    <?php if ($promotion["PromotionDetail1"] != "")
{ ?>
										<div class="col-lg-6">
											<div class="item">
												<img class="iconImg2" src="<?php echo base_url('assets/image/infoIcon.png'); ?>">
												<h5><?php echo $promotion["PromotionDetail1"]; ?></h5>
											</div>
                  	</div>
                    <?php
} ?>
                    <?php if ($promotion["PromotionDetail2"] != "")
{ ?>
										<div class="col-lg-6">
											<div class="item">
												<img class="iconImg2" src="<?php echo base_url('assets/image/infoIcon.png'); ?>">
												 <h5><?php echo $promotion["PromotionDetail2"]; ?></h5>
											</div>
										</div>
                    <?php
} ?>
                    <?php if ($promotion["PromotionDetail3"] != "")
{ ?>
										<div class="col-lg-6">
											<div class="item">
												<img class="iconImg2" src="<?php echo base_url('assets/image/infoIcon.png'); ?>">
												<h5><?php echo $promotion["PromotionDetail3"]; ?></h5>
											</div>
										</div>
                  <?php
} ?>
                  <?php if ($promotion["PromotionDetail4"] != "")
{ ?>
										<div class="col-lg-6">
											<div class="item">
												<img class="iconImg2" src="<?php echo base_url('assets/image/infoIcon.png'); ?>">
												<h5><?php echo $promotion["PromotionDetail4"]; ?></h5>
											</div>
										</div>
                  <?php
} ?>

										<div class="col-lg-6-p">
												<p>Posted on <?php echo $promotion["PromoCreatedOn"]; ?></p>
												<br>
										</div>

										</div>
										</div>



</div>
</div>
</div>
</div>



<?php echo view('sections/footer.php'); ?>
