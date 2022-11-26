
<script src='https://www.google.com/recaptcha/api.js'></script>
<div class="container-fluid position-relative d-flex p-0">
    <!-- Sign Up Start -->
    <div class="container-fluid">
        <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
            <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <a href="index.html" class="">

                            <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>StellarPC</h3>
                        </a>
                        <h3>LogIn</h3>
                    </div>

    <?php if (session()->get('success')): ?>
       <div class="alert alert-success" role="alert">
          <?= session()->get('success') ?>
         </div>
    <?php endif; ?>

<form class="LoginrRow" action="/AdminLogin" method="post">
  <div class="form-floating mb-3">
    <input type="email" class="form-control" name="staffEmail" id="staffEmail" placeholder="name@example.com" value="<?= set_value('staffEmail') ?>">
    <label for="staffEmail">Email address</label>
  </div>
  <div class="form-floating mb-4">
    <input type="password" class="form-control" name="stafPassword" id="stafPassword" placeholder="Password" value"">
    <label for="stafPassword">Password</label>
  </div>

  <div class="d-flex align-items-center justify-content-between mb-4">
      <div class="form-check">
        <div class="form-group">
         <div class="g-recaptcha" data-sitekey="6LegAqEiAAAAALsZgnqnxGAoFWiF5zpO9WQPvjX-"></div>
       </div>
      </div>
     </div>
     <?php if (isset($validation)): ?>
      <div class="col-12">
        <div class="alert alert-danger" role="alert">
          <?= $validation->listErrors() ?>
        </div>
      </div>
    <?php endif; ?>

    <?php if (session()->get('msg')): ?>
      <div class="alert alert-danger" role="alert">
        <?= session()->get('msg') ?>
      </div>
    <?php endif; ?>

  <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Login</button>
  <p class="text-center mb-0">Dont have an Account? <a href="<?php echo base_url();?>/AdminRegister">Sign Up</a></p>
  </div>
  </div>
  </div>
  </div>
  <!-- Sign Up End -->
  </div>
