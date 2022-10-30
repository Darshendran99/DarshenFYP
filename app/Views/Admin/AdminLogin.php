<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/Admin/CSS/custom.css'); ?>">
<script src='https://www.google.com/recaptcha/api.js'></script>
<div class="container-fluid pt-4 px-4">

<form class="RegisterRow" action="/AdminLogin" method="post">
<h2 style="text-align: center;"> Stellar PC Admin Login Page</h2>
  <div class="row">

    <?php if (session()->get('success')): ?>
       <div class="alert alert-success" role="alert">
          <?= session()->get('success') ?>
         </div>
    <?php endif; ?>

    <div class="col-12">
      <div class="form-group">
         <label for="email">Email address</label>
          <input type="text" class="form-control" name="staffEmail" id="staffEmail" value="<?= set_value('staffEmail') ?>">
         </div>
          <div class="form-group">
             <label for="password">Password</label>
              <input type="password" class="form-control" name="stafPassword" id="stafPassword" value="">
          </div>
          <div class="form-group">
            <br>
           <div class="g-recaptcha" data-sitekey="6LegAqEiAAAAALsZgnqnxGAoFWiF5zpO9WQPvjX-"></div>
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

                    </div>
                    <br>

                     <div class="row">
                        <div class="col-12 col-sm-4">
                           <button type="submit" class="btn btn-primary">Login</button>
                          </div>
                           <div class="col-12 col-sm-8 text-right">
                              <a href='<?php echo base_url();?>/AdminRegister'>Don't have an account yet?</a>
                             </div>
                            </div>

 </form>
    </div>


</div>
