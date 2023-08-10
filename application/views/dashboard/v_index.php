<div class="content-wrapper">
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0">Dashboard</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item active">Dashboard</li>
               </ol>
            </div>
         </div>
      </div>
   </div>

   <section class="content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-lg-3 col-6">
               <div class="small-box bg-warning">
                  <div class="inner">
                     <h3><?= $new_order ?></h3>
                     <p>New Orders & Retur Orders</p>
                  </div>
                  <div class="icon">
                     <i class="fas fa-cart-plus"></i>
                  </div>
                  <a href="<?= base_url('dashboard/new') ?>" class="small-box-footer">
                     More info <i class="fas fa-arrow-circle-right"></i>
                  </a>
               </div>
            </div>
            <div class="col-lg-3 col-6">
               <div class="small-box bg-danger">
                  <div class="inner">
                     <h3><?= $delivery ?></h3>
                     <p>Delivery Orders</p>
                  </div>
                  <div class="icon">
                     <i class="fas fa-truck"></i>
                  </div>
                  <a href="<?= base_url('dashboard/delivery') ?>" class="small-box-footer">
                     More info <i class="fas fa-arrow-circle-right"></i>
                  </a>
               </div>
            </div>
            <div class="col-lg-3 col-6">
               <div class="small-box bg-success">
                  <div class="inner">
                     <h3><?= $complete ?></h3>
                     <p>Completed Orders</p>
                  </div>
                  <div class="icon">
                     <i class="fas fa-check-double"></i>
                  </div>
                  <a href="<?= base_url('dashboard/complete') ?>" class="small-box-footer">
                     More info <i class="fas fa-arrow-circle-right"></i>
                  </a>
               </div>
            </div>
            <div class="col-lg-3 col-6">
               <div class="small-box bg-info">
                  <div class="inner">
                     <h3><?= $produk ?></h3>
                     <p>Total Produk</p>
                  </div>
                  <div class="icon">
                     <i class="fas fa-leaf"></i>
                  </div>
                  <?php if ($this->session->userdata('level') == 'admin') : ?>
                     <a href="<?= base_url('dashboard/item') ?>" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                     </a>
                  <?php else : ?>
                     <a href="#" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                     </a>
                  <?php endif ?>
               </div>
            </div>
         </div>
   </section>
</div>