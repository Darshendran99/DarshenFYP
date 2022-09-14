<!doctype html>
<html lang="en">

<head>
<meta charset="UTF-8">
  <title>Stellar PC</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/header.css'); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/style.css'); ?>">


</head>
<body>
  <?php
    $uri = service('uri');
    ?>

<div class="header">
  <?php if (session()->get('isLoggedIn')): ?>
   <a href="">Account Management</a>
   <?php endif; ?>
   <div class="header_left">
   <br></br>
   <button type="button" onclick="location.href='<?php echo base_url();?>/Home/Products'">Products</button>
   <button type="button" onclick="location.href='<?php echo base_url();?>/Home/Promotion'">Promotion</button>
   <h1 onclick="location.href='<?php echo base_url();?>'">STELLAR PC</h1>
   <button type="button" onclick="location.href='<?php echo base_url();?>/Home/Build_PC'">Build Your PC</button>
   <button type="button" onclick="location.href='<?php echo base_url();?>/Home/Cart'">Cart</button>

   <?php if (session()->get('isLoggedIn')): ?>
     <button type="button" onclick="location.href='/logout'">Logout</button>
   <?php else: ?>
     <li class="loginbtn <?= ($uri->getSegment(1) == 'register' ? 'active' : null) ?>">
       <button type="button" onclick="location.href='<?php echo base_url();?>/Home/Login'">Login/Register</button>
   <?php endif; ?>
 </div>
</div>
