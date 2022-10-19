
<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <div class="page-content">

        <!-- ***** Featured Games Start ***** -->
        <div class="row">
          <div class="heading-section"style="text-align: center;">
            <h4><em>GAME</em>REWARD</h4>
            <br><br>
          </div>
          <div class="col-lg-8">
          <div id="gameBody">
            <button id="startButton" onclick="startGame()"> Start </button>

            <!-- JavaScript for Game -->
            <script type="text/javascript" src="<?php echo base_url('js/game.js'); ?>"></script>

            <br>
            <button id="accButton" onmousedown="accelerate(-0.3)" onmouseup="accelerate(0.05)">Click on Button To Accelerate</button>
          </div>
        </div>
          <div class="col-lg-4">
            <div class="top-downloaded">
              <div class="heading-section">
                <h5 style=" text-align: center;">Rewards Up for Grab</h5>
                <div class="item">
                <?php foreach ($reward as $reward ): ?>

                  <img src="data:image/png;base64,<?php echo base64_encode($reward["RewardImage"]); ?>" style="width:50px;height:50px;"/></img>
                  <button value="<?php echo $reward["RewardScore"]; ?>" <?php echo $reward["RewardName"]; ?> </button>
                <?php endforeach; ?>
              </div>
              </div>


            </div>
          </div>
        </div>

        </div>
      </div>
    </div>
    </div>
  </div>
	<?php echo view('sections/footer.php');?>
