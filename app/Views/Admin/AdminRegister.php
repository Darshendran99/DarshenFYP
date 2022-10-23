<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/Admin/CSS/custom.css'); ?>">
<script src='https://www.google.com/recaptcha/api.js'></script>
<div class="container-fluid pt-4 px-4">

<form class="RegisterRow" action="/AdminRegister" method="post">
<h2 style="text-align: center;"> Stellar PC Admin Login Page</h2>
  <div class="row">
    <div class="col-12">
      <div class="form-group">
       <label for="name">Name</label>
       <input type="text" class="form-control" name="name" id="name" value="<?= set_value('name') ?>"> </input>
      </div>
    </div>

    <div class="col-12">
      <div class="form-group">
       <label for="email">Email</label>
       <input type="text" class="form-control" name="email" id="email" value="<?= set_value('email') ?>"></input>
      </div>
    </div>

    <div class="col-12 col-sm-6">
      <div class="form-group">
       <label for="password">Password</label>
       <input type="password" class="form-control" name="password" id="password" value=""></input>
     </div>
   </div>

   <div class="col-12 col-sm-6">
     <div class="form-group">
      <label for="password_confirm">Confirm Password</label>
      <input type="password" class="form-control" name="password_confirm" id="password_confirm" value=""></input>
    </div>
    <br>
  </div>

  <div class="col-12 col-sm-6">
    <div class="form-group">
     <div class="g-recaptcha" data-sitekey="6LegAqEiAAAAALsZgnqnxGAoFWiF5zpO9WQPvjX-"></div>
   </div>
   <br>
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
                <button type="submit" class="btn btn-primary">Register</button>
              </div>
              <div class="col-12 col-sm-8 text-right">
                <a href='<?php echo base_url();?>/Home/Login'>Already have an account?</a>
              </div>

            </form>
    </div>


</div>
