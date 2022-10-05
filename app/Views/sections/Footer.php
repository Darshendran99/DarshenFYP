<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/footer.css'); ?>">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<footer>
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
            <p>Find Us On Our Social Media</p>

          <ul class="socials">
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
            <li><a href="#"><i class="fa fa-youtube"></i></a></li>

          </ul>
            <p>Copyright &copy;2022 <a href="#">StellarPC</a>  </p>

        </div>
      </div>
    </div>



</footer>

<!-- BOOTSTRAP JS -->
<script type="text/javascript" src="<?php echo base_url('assets/JS/bootstrap.min.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/JS/custom.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/JS/isotope.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/JS/isotope.min.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/JS/owl-carousel.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/JS/popup.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/JS/tabs.js'); ?>"></script>


  	<script type="text/javascript" src="<?php echo base_url('assets/JS/loader.js'); ?>"></script>
  	<script>
  		google.charts.load('current', {'packages':['corechart']});
  		google.charts.setOnLoadCallback(drawLineChart);

  					// Line Chart
  		function drawLineChart() {
  			var data = google.visualization.arrayToDataTable([
  				['Day', 'RTX 4090 price'],
  					<?php
  						foreach ($gpuchart as $row){
  							 echo "['".$row['day']."',".$row['sell']."],";
  					} ?>
  			]);
  			var options = {
  				title: 'Line chart product sell wise',
  				curveType: 'function',
  				legend: {
  					position: 'top'
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
  				['Day', 'Intel® Core™ i9-13900KF'],
  					<?php
  						foreach ($cpuchart as $row){
  							 echo "['".$row['day']."',".$row['sell']."],";
  					} ?>
  			]);
  			var options = {
  				title: 'Line chart product sell wise',
  				curveType: 'function',
  				legend: {
  					position: 'top'
  				}
  			};
  			var chart = new google.visualization.LineChart(document.getElementById('GoogleLineChart2'));
  			chart.draw(data, options);
  		}

  	</script>

</body>
</html>
