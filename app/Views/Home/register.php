
  <script type="text/javascript" src="<?php echo base_url('js/custom.js'); ?>"></script>
  <h2>/ Register Page</h2>

	<div class="registerContainer">
		<div class="registerRow">
			<div class"registerInnerContainer">
				<hr>
				<h3>Register</h3>
				<hr>
				<form class="" action="/Register" method="post">

          <div class="row">
            <div class="col-12 col-sm-6">
              <div class="form-group">
               <label for="firstname">First Name</label>
               <input type="text" class="form-control" name="firstname" id="firstname" value="<?= set_value('firstname') ?>">
              </div>
            </div>

            <div class="col-12 col-sm-6">
              <div class="form-group">
               <label for="lastname">Last Name</label>
               <input type="text" class="form-control" name="lastname" id="lastname" value="<?= set_value('lastname') ?>">
              </div>
            </div>

						<div class="col-12">
              <div class="form-group">
               <label for="email">Address</label>
               <input type="text" class="form-control" name="address" id="address" value="<?= set_value('address') ?>">
              </div>
            </div>

						<div class="col-12">
              <div class="form-group">
               <label for="email">Email</label>
               <input type="text" class="form-control" name="email" id="email" value="<?= set_value('email') ?>">
              </div>
            </div>

            <div class="col-12 col-sm-6">
              <div class="form-group">
               <label for="password">Password</label>
               <input type="password" class="form-control" name="password" id="password" value="">
             </div>
           </div>

           <div class="col-12 col-sm-6">
             <div class="form-group">
              <label for="password_confirm">Confirm Password</label>
              <input type="password" class="form-control" name="password_confirm" id="password_confirm" value="">
            </div>
          </div>

					<?php if (isset($validation)): ?>
					 <div class="col-12">
						 <div class="alert alert-danger" role="alert">
							 <?= $validation->listErrors() ?>
						 </div>
					 </div>
				 <?php endif; ?>
				 </div>


					<div class="row">
					            <div class="col-12 col-sm-4">
					              <button type="submit" class="btn btn-primary">Register</button>
					            </div>
					            <div class="col-12 col-sm-8 text-right">
					              <a href='<?php echo base_url();?>/Home/Login'>Already have an account?</a>
					            </div>

				</form>
			</div>
		</div>
	</div>
