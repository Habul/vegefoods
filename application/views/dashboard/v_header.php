<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Vegefoods | <?= $title ?></title>
   <link rel='icon' href="<?= base_url('assets/img/favicon.png') ?>" type="image/gif">
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
   <link rel="stylesheet" href="<?= base_url('assets/plugins/fontawesome-free/css/all.min.css') ?>">
   <link rel="stylesheet" href="<?= base_url('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') ?>">
   <link rel="stylesheet" href="<?= base_url('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') ?>">
   <link rel="stylesheet" href="<?= base_url('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') ?>">
   <link rel="stylesheet" href="<?= base_url('assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') ?>">
   <link rel="stylesheet" href="<?= base_url('assets/plugins/toastr/toastr.min.css') ?>">
   <link rel="stylesheet" href="<?= base_url('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>">
   <link rel="stylesheet" href="<?= base_url('assets/dist/css/adminlte.min.css') ?>">
   <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
</head>

<body class="hold-transition layout-top-nav">
   <div class="wrapper">

      <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
         <div class="container-fluid">
            <a href="<?= base_url('/') ?>" class="navbar-brand">
               <img src="<?= base_url('assets/img/logo.png') ?>" alt="Hampers" class="brand-image " style="opacity: .8">
               <span class="brand-text font-weight-light">Vegefoods</span>
            </a>

            <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse order-3" id="navbarCollapse">
               <ul class="navbar-nav">
                  <li class="nav-item">
                     <a href="<?= base_url('dashboard'); ?>" <?= $this->uri->uri_string() == 'dashboard'   ? 'class="nav-link active"' : 'class="nav-link"' ?>>
                        <i class="fas fa-home"></i> Dashboard
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="<?= base_url('dashboard/item'); ?>" <?= $this->uri->segment(2) == 'item'   ? 'class="nav-link active"' : 'class="nav-link"' ?>>
                        <i class="fas fa-tags"></i> Produk
                     </a>
                  </li>
                  <li class="nav-item dropdown">
                     <a <?= $this->uri->segment(2) == 'new'  || $this->uri->segment(2) == 'delivery' || $this->uri->segment(2) == 'complete' ? 'class="nav-link active"' : 'class="nav-link"' ?> data-toggle="dropdown" href="#">
                        <i class="fas fa-truck-loading"></i> Transaction <i class="fas fa-angle-down"></i></a>
                     <div class="dropdown-menu">
                        <a href="<?= base_url('dashboard/new'); ?>" class="dropdown-item"><i class="fas fa-cart-plus"></i>
                           New Order
                        </a>
                        <a href="<?= base_url('dashboard/delivery'); ?>" class="dropdown-item"><i class="fas fa-truck"></i>
                           Delivery Order
                        </a>
                        <a href="<?= base_url('dashboard/complete'); ?>" class="dropdown-item"><i class="fas fa-check-double"></i>
                           Completed Order
                        </a>
                     </div>
                  </li>
                  <li class="nav-item">
                     <a href="<?= base_url('dashboard/blog'); ?>" <?= $this->uri->segment(2) == 'blog'   ? 'class="nav-link active"' : 'class="nav-link"' ?>>
                        <i class="fas fa-blog"></i> Blog
                     </a>
                  </li>
                  <?php if ($this->session->userdata('level') == 'admin') : ?>
                     <li class="nav-item">
                        <a href="<?= base_url('dashboard/user'); ?>" <?= $this->uri->segment(2) == 'user'   ? 'class="nav-link active"' : 'class="nav-link"' ?>>
                           <i class="fas fa-users"></i> Users
                        </a>
                     </li>
                  <?php endif ?>
               </ul>
            </div>

            <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
               <li class="nav-item">
                  <span class="nav-link" id='hclock'><?php mdate('%Y-%m-%d %H:%i:%s') ?></span>
                  </a>
               </li>

               <li class="nav-item dropdown">
                  <a class="nav-link" data-toggle="modal" data-target="#modal-logout">
                     <i class="fas fa-sign-out-alt"></i> Logout
                  </a>
               </li>
            </ul>
         </div>
      </nav>