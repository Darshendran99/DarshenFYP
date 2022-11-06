
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/details.css'); ?>">

<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<div class="page-content">
				<div class="heading-section">
					<h4><em>StellarPC's</em> PROMOTION</h4>
				</div>
					<div class="row">
						<?php foreach ($promotion as $ready => $readyPromo) {?>
							<?php if ($readyPromo["PromotionStatus"] == "ready") { ?>
						<div class="col-lg-3 col-sm-6">
							<img class="productImg" src="data:image/png;base64,<?php echo base64_encode($readyPromo["PromotionImage"]); ?>"/>
							<h4 class="productName"> <?php echo $readyPromo["PromotionName"]; ?> </h4>
							<p class="productPrice">RM <?php echo $readyPromo["PromotionPrice"]; ?>/-</p> <br>
							<div class="main-button">
							<a href="<?php echo base_url();?>/Home/PromotionDetails/<?php echo $readyPromo["PromotionId"]; ?>"/> More Details</a>
							<br><br><br><br><br><br>

						</div>
						</div>
					<?php }}  ?>

						<?php foreach ($promotion as $notready => $NoreadyPromo) {  ?>
						<?php if ($NoreadyPromo["PromotionStatus"] != "ready") { ?>

					<div class="heading-section">
					<h4><em>Whats Next? </em> Sneak Peak of Whats to Come</h4>
					</div>

							<div class="col-lg-3 col-sm-6">
								<img class="productImg" src="data:image/png;base64,<?php echo base64_encode($NoreadyPromo["PromotionImage"]); ?>"/>
								<h4 class="productName"> <?php echo $NoreadyPromo["PromotionName"]; ?> </h4>
								<br>
								<p class="productPrice">RM <?php echo $NoreadyPromo["PromotionPrice"]; ?>/-</p> <br>
							</div>
							</div>
						<?php }} ?>

					</div>
			</div>
			</div>
			</div>


			</div>



	<?php echo view('sections/footer.php');?>
