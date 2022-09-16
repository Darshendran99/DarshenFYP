<?php

	echo view('sections/header.php');

?>

  <script type="text/javascript" src="<?php echo base_url('js/custom.js'); ?>"></script>

	<div class="home_Container">
			<h2>Home Page</h2>
			<?php if (session()->get('isLoggedIn')): ?>
			<h1>Hello, <?= session()->get('firstname') ?></h1>
			<?php endif; ?>

	</div>


<?php echo view('sections/footer.php');?>
