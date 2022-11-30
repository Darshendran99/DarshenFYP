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
          <div id="gameBody" >
            <button id="startButton" onclick="startGame()"> Start </button>

            <!-- JavaScript for Game -->
            <script type="text/javascript" src="<?php echo base_url('js/game.js'); ?>"></script>
            <br>
            <button id="accButton" onmousedown="accelerate(-0.3)" onmouseup="accelerate(0.03)">Click on Button To Accelerate</button>
            <br><br><br><br><br><br><br><br>
            <a style="padding-left: 12em;" href="<?php echo base_url(); ?>/Home/ExitGame"/>Exit Game</a>
          </div>
        </div>
          <div class="col-lg-4">
            <div class="top-downloaded">
              <div class="heading-section">
                <h5 style=" text-align: center;">Rewards Up for Grab</h5>
                <div class="item-reward">
                  <ul>
                    <!-- Score is stored here -->
                    <li id="theScore" style="color: white; font-size: 25px;"></li>
                  </ul>
                  <ul>

                  <li id="theRewards1">
                  <img src="data:image/png;base64,<?php echo base64_encode($rewardTier1["RewardImage"]); ?>" style="width:75px;height:75px;"/></img>
                  <a class="rewardBtn" href="<?php echo base_url(); ?>/Home/GameReward/<?php echo $rewardTier1["RewardID"]; ?>"/><?php echo $rewardTier1["RewardName"]; ?></a>
                </li>
                <li id="theRewards2">
                <img src="data:image/png;base64,<?php echo base64_encode($rewardTier2["RewardImage"]); ?>" style="width:75px;height:75px;"/></img>
                <a class="rewardBtn" href="<?php echo base_url(); ?>/Home/GameReward/<?php echo $rewardTier2["RewardID"]; ?>"/><?php echo $rewardTier2["RewardName"]; ?></a>
              </li>
              <li id="theRewards3">
              <img src="data:image/png;base64,<?php echo base64_encode($rewardTier3["RewardImage"]); ?>" style="width:75px;height:75px;"/></img>
              <a class="rewardBtn" href="<?php echo base_url(); ?>/Home/GameReward/<?php echo $rewardTier3["RewardID"]; ?>"/><?php echo $rewardTier3["RewardName"]; ?></a>
            </li>

              </ul>
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
	<?php echo view('sections/footer.php'); ?>
