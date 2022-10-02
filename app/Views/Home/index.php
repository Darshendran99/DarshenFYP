
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<div class="page-content">
			<h2>Home Page</h2>
			<?php if (session()->get('isLoggedIn')): ?>
			<h1>Hello, <?= session()->get('firstname') ?></h1>
			<?php endif; ?>

	</div>
	</div>
	</div>
