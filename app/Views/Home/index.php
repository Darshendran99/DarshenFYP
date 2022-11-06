

<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<div class="page-content">
				<div class="helloText">
			<?php if (session()->get('isLoggedIn')): ?>
			<h1>Hello, <?= session()->get('firstname') ?></h1>
			<?php endif; ?>
		</div>

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
						<img src="data:image/png;base64,<?php echo base64_encode($product["ProductImage"]); ?>" style="width:220px;height:200px;"/></img>
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
						<img src="data:image/png;base64,<?php echo base64_encode($promotion["PromotionImage"]); ?>" style="width:220px;height:200px;"/></img>
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
						<img src="data:image/png;base64,<?php echo base64_encode($component["ComponentImage"]); ?>" style="width:220px;height:200px;"/></img>
						<h4>  <?php echo $component["ComponentName"]; ?>	  </h4>
						<h4>  	  </h4>
						<h4>BuildYourPC<span>Prebuilt Custom PC</span></h4>
						<ul>
							<br>
							<li><i class="fa fa-star"></i> RM <?php echo $component["ComponentPrice"];?></li>
						</ul>
					</div>
				</div>
				<!-- BuildYourPC -->
				<div class="col-lg-3 col-sm-6">
					<div class="item">
						<img src='/assets/image/customKeyboard.jpg'style="width:220px;height:200px;"/></img>
						<h4>  UWUWUWUWUUWUWUWU </h4>
						<h4>  	 </h4>
						<h4>More Soon<span>Custom Keyboard?</span></h4>
						<ul>
							<br>
							<li><i class="fa fa-star"></i> Surprise </li>
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

<!-- Start of GPU Price Graph -->
<div class="gaming-library">
	<div class="col-lg-12">
		<div class="heading-section">
			<h4><em>Price</em> Graph</h4>
		</div>
		<div class="item">
			<ul>

				<li><img src="assets/images/game-01.jpg" alt="" class="templatemo-item"></li>
				<li><h4>GPU</h4><span>Price</span>

				</li>
					<div class="container">
						<div class="mb-5 mt-5">
								<div id="GoogleLineChart" style="height: 300px; width: 100%"></div>
						</div>
					</div>
	</ul>
		</div>
<!-- End of GPU Price Graph -->
<!-- Start of CPU Price Graph -->
		<div class="item">
			<ul>
				<li><img src="assets/images/game-01.jpg" alt="" class="templatemo-item"></li>
				<li><h4>CPU</h4><span>Price</span></li>
				</li>
			<div class="container">
				<div class="mb-5 mt-5">
						<div id="GoogleLineChart2" style="height: 300px; width: 100%"></div>
				</div>
			</div>
			</ul>

		</div>
		</div>
		</div>





	</div>
	</div>
	</div>

	<script type="text/javascript" src="<?php echo base_url('assets/JS/loader.js'); ?>"></script>
	<script>
		google.charts.load('current', {'packages':['corechart']});
		google.charts.setOnLoadCallback(drawLineChart);

					// Line Chart
		function drawLineChart() {
			var data = google.visualization.arrayToDataTable([
				['Month', 'RTX 4090 price (RM)'],
					<?php
						foreach ($gpuchart as $row){
							 echo "['".$row['month']."',".$row['sell']."],";
					} ?>
			]);
			var options = {
				title: 'Line chart of Nvidia GeForce RTX 4090 series Price',
				titleTextStyle:{color: '#FFF'},
				curveType: 'function',
				legend: {
					position: 'top',
					textStyle:{color: '#FFF'}
				},
				colors: ['#ec6090'],
				backgroundColor: 'transparent',
				hAxis: {
					    textStyle:{color: '#FFF'}
					},
				vAxis: {
							textStyle:{color: '#FFF'}
					},
					data: {
								textStyle:{color: '#FFF'}
						}
			};
			var chart = new google.visualization.LineChart(document.getElementById('GoogleLineChart'));
			chart.draw(data, options);
		}

	</script>

	<script>
		google.charts.load('current', {'packages':['corechart']});
		google.charts.setOnLoadCallback(drawLineChart);

					// Line Chart
		function drawLineChart() {
			var data = google.visualization.arrayToDataTable([
				['Month', 'Intel i9-13900KF (RM) '],
					<?php
						foreach ($cpuchart as $row){
							 echo "['".$row['month']."',".$row['sell']."],";
					} ?>
			]);
			var options = {
				title: 'Line chart of Intel® Core™ i9-13900KF series Price',
				titleTextStyle:{color: '#FFF'},
				curveType: 'function',
				legend: {
					position: 'top',
					textStyle:{color: '#FFF'}
				},
				colors: ['#ec6090'],
				backgroundColor: 'transparent',
				hAxis: {
					    textStyle:{color: '#FFF'}
					},
				vAxis: {
							textStyle:{color: '#FFF'}
					},
					data: {
								textStyle:{color: '#FFF'}
						}
			};
			var chart = new google.visualization.LineChart(document.getElementById('GoogleLineChart2'));
			chart.draw(data, options);
		}

	</script>
	<?php echo view('sections/footer.php');?>
