<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>E-Vegefoods</title>
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
  <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>" />
  <link href="<?= base_url('assets/img/favicon.png') ?>" rel='icon'>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>

<body cz-shortcut-listen="true">
  <section id="header">
    <a href="#"><img src="<?= base_url('assets/img/logo.png') ?>" width="200px" alt="" />
    </a>

    <ul id="navbar">
      <li><a class="<?= $this->uri->segment(1) == '' ? 'active' : '' ?>" href="<?= base_url('/') ?>">Home</a></li>
      <li><a class="<?= $this->uri->segment(1) == 'shop' || $this->uri->segment(1) == 'shop_detail' ? 'active' : '' ?>" href="<?= base_url('shop') ?>">Shop</a></li>
      <li><a class="<?= $this->uri->segment(1) == 'blog' || $this->uri->segment(1) == 'blog_detail' ? 'active' : '' ?>" href="<?= base_url('blog') ?>">Blog</a></li>
      <li><a class="<?= $this->uri->segment(1) == 'about' ? 'active' : '' ?>" href="<?= base_url('about') ?>">About</a></li>
      <?php if ($this->session->userdata('status') == '') : ?>
        <li><a class="<?= $this->uri->segment(1) == 'login' ? 'active' : '' ?>" href="<?= base_url('login') ?>"><i class="fas fa-sign-in-alt"></i></a></li>
      <?php elseif ($this->session->userdata('level') == 'penjual' || $this->session->userdata('level') == 'admin') : ?>
        <li><a href="<?= base_url('dashboard') ?>"><i class="fas fa-user"></i></a></li>
      <?php else : ?>
        <li><a class="<?= $this->uri->segment(1) == 'cart' ? 'active' : '' ?>" href="<?= base_url('cart') ?>" title="Cart"><i class="fas fa-shopping-basket"></i></a>
          <?php if ($total != '0') : ?>
            <span class="badge text-bg-warning"><?= $total ?></span>
          <?php else : ?>
            <span class="badge text-bg-warning"></span>
          <?php endif ?>
        </li>
        <li><a class="<?= $this->uri->segment(1) == 'history' ? 'active' : '' ?>" href="<?= base_url('history') ?>" title="History Transaksi"><i class="fas fa-check-double"></i></a></li>
        <li><a href="<?= base_url('logout') ?>" title="Logout" onclick="javasciprt:return confirm('Are You Sure ?')" title="Logout"><i class="fas fa-power-off"></i></a></li>
      <?php endif ?>
    </ul>
  </section>