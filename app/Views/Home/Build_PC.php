<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/details.css'); ?>">

  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="page-content">

          <!-- ***** Featured Games Start ***** -->
          <div class="row">
            <div class="col-lg-8">
              <div class="featured-games header-text">
                <div class="heading-section"style="text-align: center;">
                  <h4>Build <em>YOUR</em> PC</h4>
                </div>
                <form class="" action="/AddCart3" method="post">
								<div class="row">
									<!-- CPU -->
                  <div class="item">
										<h3 class="componentTitles"> CPU Processor <em>*Selct Either INTEL or AMD CPU Processor*</em></h3>
										<hr class="ComponentDivider">
										<div class="ComponentItem">
										<h5>Intel CPU:</h5>

										<select name="intelCpu" id="intelCpu" onchange="update1()">
											<option value=""> -- Select an option -- </option>
											<?php foreach ($component as $cpu => $intelCpu) { ?>
												<?php if ($intelCpu["ComponentType"] == "CPU") { ?>
													<?php if ($intelCpu["ComponentBrand"] == "Intel") { ?>
													<option value="<?php echo $intelCpu["ComponentId"]; ?>"><?php echo $intelCpu["ComponentName"]; ?></option>
												<?php } } } ?>
										</select>
										<br><br>
										<h5>AMD CPU:</h5>
										<select name="amdCpu" id="amdCpu" onchange="update2()">
											<option value=""> -- Select an option -- </option>
											<?php foreach ($component as $cpu => $amdCpu) { ?>
												<?php if ($amdCpu["ComponentType"] == "CPU") { ?>
													<?php if ($amdCpu["ComponentBrand"] == "AMD") { ?>
													<option value="<?php echo $amdCpu["ComponentId"]; ?>"><?php echo $amdCpu["ComponentName"]; ?></option>
												<?php } } } ?>
										</select>
									</div>
									<br><br>
								</div>

								<!-- Motherboard -->
								<div class="item">
									<h3 class="componentTitles"> Motherboard <em>*Selct Either INTEL or AMD Motherboard Based On Your Processor*</em></h3>
									<hr class="ComponentDivider">
									<div class="ComponentItem">
									<h5>Intel Motherboard:</h5>
									<select name="intelMobo" id="intelMobo" onchange="update3()">
										<option  name="amdCpu" value=""> -- Select an option -- </option>
										<?php foreach ($component as $mobo => $intelMobo) { ?>
											<?php if ($intelMobo["ComponentType"] == "Mobo") { ?>
												<?php if ($intelMobo["ComponentBrand"] == "Intel") { ?>
												<option value="<?php echo $intelMobo["ComponentId"]; ?>"><?php echo $intelMobo["ComponentName"]; ?></option>
											<?php } } } ?>
									</select>
									<br><br>
									<h5>AMD Motherboard:</h5>
									<select name="amdMobo" id="amdMobo" onchange="update4()">
										<option  name="amdCpu" value=""> -- Select an option -- </option>
										<?php foreach ($component as $mobo => $amdMobo) { ?>
											<?php if ($amdMobo["ComponentType"] == "Mobo") { ?>
												<?php if ($amdMobo["ComponentBrand"] == "AMD") { ?>
												<option value="<?php echo $amdMobo["ComponentId"]; ?>"><?php echo $amdMobo["ComponentName"]; ?></option>
											<?php } } } ?>
									</select>
								</div>
								<br><br>
							</div>

							<!-- GPU -->
							<div class="item">
								<h3 class="componentTitles"> GPU (Graphic Card)<em>*Selct any prefered GPU*</em></h3>
								<hr class="ComponentDivider">
								<div class="ComponentItem">
								<h5>Intel GPU:</h5>
								<select name="intelGpu" id="intelGpu" onchange="update5()">
									<option value=""> -- Select an option -- </option>
									<?php foreach ($component as $gpu => $intelGpu) { ?>
										<?php if ($intelGpu["ComponentType"] == "GPU") { ?>
											<?php if ($intelGpu["ComponentBrand"] == "Intel") { ?>
											<option value="<?php echo $intelGpu["ComponentId"]; ?>"><?php echo $intelGpu["ComponentName"]; ?></option>
										<?php } } } ?>
								</select>
								<br><br>
								<h5>AMD GPU:</h5>
								<select name="amdGpu" id="amdGpu" onchange="update6()">
									<option value=""> -- Select an option -- </option>
									<?php foreach ($component as $gpu => $amdGpu) { ?>
										<?php if ($amdGpu["ComponentType"] == "GPU") { ?>
											<?php if ($amdGpu["ComponentBrand"] == "AMD") { ?>
											<option value="<?php echo $amdGpu["ComponentId"]; ?>"><?php echo $amdGpu["ComponentName"]; ?></option>
										<?php } } } ?>
								</select>
								<br><br>
								<h5>NIVDIA GPU:</h5>
								<select name="nvidiaGpu" id="nvidiaGpu" onchange="update7()">
									<option value=""> -- Select an option -- </option>
									<?php foreach ($component as $gpu => $nvidiaGpu) { ?>
										<?php if ($nvidiaGpu["ComponentType"] == "GPU") { ?>
											<?php if ($nvidiaGpu["ComponentBrand"] == "NVIDIA") { ?>
											<option value="<?php echo $nvidiaGpu["ComponentId"]; ?>"><?php echo $nvidiaGpu["ComponentName"]; ?></option>
										<?php } } } ?>
								</select>
							</div>
							<br><br>
							</div>

							<!-- RAM -->
							<div class="item">
								<h3 class="componentTitles">RAM<em>*Selct any prefered RAM*</em></h3>
								<hr class="ComponentDivider">
								<div class="ComponentItem">
								<h5>Avaiable Options:</h5>
								<select name="ram_" id="ram_" onchange="update8()">
									<option value=""> -- Select an option -- </option>
									<?php foreach ($component as $ram => $ram_) { ?>
										<?php if ($ram_["ComponentType"] == "RAM") { ?>
											<option value="<?php echo $ram_["ComponentId"]; ?>"><?php echo $ram_["ComponentName"]; ?></option>
										<?php } } ?>
								</select>
								<br><br>
						</div>
						<br><br>
						</div>

						<!-- SSD -->
						<div class="item">
							<h3 class="componentTitles">SSD<em>*Selct any prefered SSD*</em></h3>
							<hr class="ComponentDivider">
							<div class="ComponentItem">
							<h5>Avaiable Options:</h5>
							<select name="ssd_" id="ssd_" onchange="update9()">
								<option value=""> -- Select an option -- </option>
								<?php foreach ($component as $ssd => $ssd_) { ?>
									<?php if ($ssd_["ComponentType"] == "SSD") { ?>
										<option value="<?php echo $ssd_["ComponentId"]; ?>"><?php echo $ssd_["ComponentName"]; ?></option>
									<?php } } ?>
							</select>
							<br><br>
					</div>
					<br><br>
					</div>

					<!-- PSU -->
					<div class="item">
						<h3 class="componentTitles">PSU (Power Supply)<em>*Selct any prefered PSU*</em></h3>
						<hr class="ComponentDivider">
						<div class="ComponentItem">
						<h5>Avaiable Options:</h5>
						<select name="psu_" id="psu_" onchange="update10()">
							<option value=""> -- Select an option -- </option>
							<?php foreach ($component as $psu => $psu_) { ?>
								<?php if ($psu_["ComponentType"] == "PSU") { ?>
									<option value="<?php echo $psu_["ComponentId"]; ?>"><?php echo $psu_["ComponentName"]; ?></option>
								<?php } } ?>
						</select>
						<br><br>
					</div>
					<br><br>
					</div>

					<!-- Casing -->
					<div class="item">
						<h3 class="componentTitles">Chasis / Case <em>*Selct any prefered Casing*</em></h3>
						<hr class="ComponentDivider">
						<div class="ComponentItem">
						<h5>Avaiable Options:</h5>
						<select name="casing_" id="casing_" onchange="update11()">
							<option value=""> -- Select an option -- </option>
							<?php foreach ($component as $casing => $casing_) { ?>
								<?php if ($casing_["ComponentType"] == "Casing") { ?>
									<option id="casing_" value="<?php echo $casing_["ComponentId"]; ?>"><?php echo $casing_["ComponentName"]; ?></option>
                <?php } } ?>
						</select>
						<br><br>
					</div>
					<br><br>
					</div>

          </div>
          </div>
          </div>

					<div class="col-lg-4">
						<div class="top-downloaded">
							<div class="heading-section">
								<h4 style="font-size: 25px; text-align: center;"><em>Your</em> Selected Options</h4>
							</div>
							<br>

						<ul>
							<li>
								<img src="assets/images/game-01.jpg" alt="" class="templatemo-item">
                <input type="text" id="text1" readonly>
							</li>

							<li>
								<img src="assets/images/game-01.jpg" alt="" class="templatemo-item">
                <input type="text" id="text2" readonly>
							</li>

							<li>
								<img src="assets/images/game-01.jpg" alt="" class="templatemo-item">
                <input type="text" id="text3" readonly>
							</li>

							<li>
								<img src="assets/images/game-01.jpg" alt="" class="templatemo-item">
                <input type="text" id="text4" readonly>
							</li>

							<li>
								<img src="assets/images/game-01.jpg" alt="" class="templatemo-item">
                <input type="text" id="text5" readonly>
							</li>

							<li>
								<img src="assets/images/game-01.jpg" alt="" class="templatemo-item">
                <input type="text" id="text6" readonly>
							</li>

							<li>
								<img src="assets/images/game-01.jpg" alt="" class="templatemo-item">
                <input type="text" id="text7" readonly>
							</li>

              <li>
                <img src="assets/images/game-01.jpg" alt="" class="templatemo-item">
                <input type="text" id="text8" readonly>
              </li>

              <li>
                <img src="assets/images/game-01.jpg" alt="" class="templatemo-item">
                <input type="text" id="text9" readonly>
              </li>

              <li>
                <img src="assets/images/game-01.jpg" alt="" class="templatemo-item">
                <input type="text" id="text10" readonly>
              </li>

              <li>
                <img src="assets/images/game-01.jpg" alt="" class="templatemo-item">
                <input type="text" id="text11" name="text11" readonly>
              </li>
						</ul>

						</div>
					</div>

          <div class="col-lg-12">
            <div class="main-button" style="margin-left: 20%;margin-top: 2em;">
              <?php if (session()->get('isLoggedIn')): ?>
                <div class="col-12 col-sm-4" style="margin-left: 10%;">
                  <button type="submit" class="btn btn-primary">Add To Cart</button>
                </div>
                  </form>
              <?php else: ?>
              <div class="col-12 col-sm-4">
                <a href="<?php echo base_url();?>/Home/Login">Login to Add to Cart</a>
                </div>
              <?php endif; ?>
            </div>
          </div>




				</div>
			</div>
		</div>
	</div>
	</div>




  <script type="text/javascript" src="<?php echo base_url('js/computer.js'); ?>"></script>
		<?php echo view('sections/footer.php');?>
