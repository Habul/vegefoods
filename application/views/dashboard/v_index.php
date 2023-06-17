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
                     <p>New Orders</p>
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
                     <h3><?= $total_user ?></h3>
                     <p>Total Users</p>
                  </div>
                  <div class="icon">
                     <i class="fas fa-users"></i>
                  </div>
                  <a href="<?= base_url('dashboard/user') ?>" class="small-box-footer">
                     More info <i class="fas fa-arrow-circle-right"></i>
                  </a>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-6">
               <div class="card card-outline card-info">
                  <div class="card-header">
                     <h3 class="card-title"><b>History Login</b></h3>
                     <div class="card-tools">
                        <button type="button" class="btn btn-xs btn-icon" data-card-widget="collapse">
                           <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-xs btn-icon" data-card-widget="maximize">
                           <i class="fas fa-expand"></i>
                        </button>
                        <button type="button" class="btn btn-xs btn-icon" data-card-widget="remove">
                           <i class="fas fa-times"></i>
                        </button>
                     </div>
                  </div>
                  <div class="card-body">
                     <table id="index1" class="table table-hover table-sm">
                        <thead class="thead-light text-center">
                           <tr>
                              <th width="6%">No</th>
                              <th>Name</th>
                              <th>Ip</th>
                              <th>Os</th>
                              <th>Browser</th>
                              <th>Date</th>
                           </tr>
                        </thead>
                        <?php $no = 1;
                        foreach ($history_log as $log) { ?>
                           <tr>
                              <td class="text-center align-middle"><?= $no++ ?></td>
                              <td class="align-middle"></td>
                              <td class="align-middle"></td>
                              <td class="align-middle"></td>
                              <td class="align-middle"></td>
                              <td class="align-middle"></td>
                           </tr>
                        <?php } ?>
                     </table>
                  </div>
               </div>
            </div>
         </div>
   </section>
</div>