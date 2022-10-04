<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <div class="page-content">

        <!-- ***** Banner Start ***** -->
        <div class="row">
          <div class="col-lg-12">
            <div class="main-profile ">
              <div class="row">
                <div class="col-lg-4">
                  <img src="<?php echo base_url('assets/image/loginImage.jpg'); ?>" alt="" style="border-radius: 23px;">
                </div>


               <div class="col-lg-4 align-self-center">
                 <div class="main-info header-text">

                   <?php if (session()->get('success')): ?>
                      <div class="alert alert-success" role="alert">
                         <?= session()->get('success') ?>
                        </div>
                   <?php endif; ?>
	                  <form class="" action="/Login" method="post">

						                <div class="row">
	                             <div class="form-group">
	                                <label for="email">Email address</label>
	                                 <input type="text" class="form-control" name="email" id="email" value="<?= set_value('email') ?>">
	                                </div>
	                                 <div class="form-group">
	                                    <label for="password">Password</label>
	                                     <input type="password" class="form-control" name="password" id="password" value="">
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
	                                                  <button type="submit" class="btn btn-primary">Login</button>
	                                                 </div>
	                                                  <div class="col-12 col-sm-8 text-right">
	                                                     <a href='<?php echo base_url();?>/Home/Register'>Don't have an account yet?</a>
	                                                    </div>
	                                                   </div>

	              </form>
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
