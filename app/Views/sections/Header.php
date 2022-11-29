<!doctype html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Stellar PC</title>

  <!-- BOOTSTRAP FONTS -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

<!-- BOOTSTRAP CSS -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/CSS/bootstrap.min.css'); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/CSS/animate.css'); ?>">

  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/CSS/fontawesome.css'); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/CSS/owl.css'); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/CSS/templatemo-cyborg-gaming.css'); ?>">

  <!-- Custom CSS -->
</head>
<body>

  <?php
$uri = service('uri');
?>

    <header class="header-area header-sticky">
      <div class="container">
          <div class="row">
              <div class="col-12">
                  <nav class="main-nav">
                      <!-- ***** Logo Start ***** -->
                      <a href="<?php echo base_url(); ?>" class="logo">
                          <img src="<?php echo base_url('assets/image/StellarPC.png'); ?>" alt="STELLAR PC">
                      </a>
                      <!-- ***** Logo End ***** -->

                      <!-- ***** Menu Start ***** -->
                      <ul class="nav">
                          <li><a href="<?php echo base_url(); ?>/Home/Products">Products</a></li>
                          <li><a href="<?php echo base_url(); ?>/Home/Promotion">Promotion</a></li>
                          <li><a href="<?php echo base_url(); ?>/Home/Build_PC">Build Your PC</a></li>
                          <li><a href="<?php echo base_url(); ?>/Home/Cart">Check Cart</a></li>
                            <?php if (session()->get('isLoggedIn')): ?>
                              <li><a href="<?php echo base_url(); ?>/Home/AccountManagement">Account Management <img src=""></a></li>
                              <li><a href='/logout'>Logout</a></li>
                            <?php
else: ?>
                              <li <?=($uri->getSegment(1) == 'register' ? 'active' : null) ?>>
                              <a href="<?php echo base_url(); ?>/Home/Login">Login </a> </li>
                            <?php
endif; ?>

                      </ul>
                      <a class='menu-trigger'>
                          <span>Menu</span>
                      </a>
                      <!-- ***** Menu End ***** -->
                  </nav>
              </div>
          </div>
      </div>
    </header>
