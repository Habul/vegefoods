<div class="content-wrapper">
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0">New Order</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                  <li class="breadcrumb-item active">Users</li>
               </ol>
            </div>
         </div>
      </div>
   </div>

   <section class="content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-md-12">
               <div class="card card-warning card-outline">
                  <div class="card-header">
                     <h4 class="card-title">
                        New orders
                     </h4>
                     <div class="card-tools">
                        <button type="button" class="btn btn-xs btn-icon btn-circle" data-card-widget="collapse">
                           <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-xs btn-icon btn-circle" data-card-widget="maximize">
                           <i class="fas fa-expand"></i>
                        </button>
                        <button type="button" class="btn btn-xs btn-icon btn-circle" data-card-widget="remove">
                           <i class="fas fa-times"></i>
                        </button>
                     </div>
                  </div>
                  <div class="card-body">
                     <table id="index1" class="table table-bordered table-hover table-sm">
                        <thead class="thead-light text-center">
                           <tr>
                              <th width="5%">No</th>
                              <th>Name</th>
                              <th>Address</th>
                              <th>Produk</th>
                              <th>Qty</th>
                              <th>Price</th>
                              <th width="9%"><i class="fas fa-cogs"></i></th>
                           </tr>
                        </thead>
                        <?php foreach ($new as $u) {    ?>
                           <tr>
                              <td class="align-middle text-center"></td>
                              <td class="align-middle">
                                 <?php foreach ($pengguna as $p) : ?>
                                    <?php if ($u->id_pengguna == $p->id) : ?>
                                       <?= ucwords($p->nama) ?>
                                    <?php endif ?>
                                 <?php endforeach ?>
                              </td>
                              <td class="align-middle"><?= ucwords($u->alamat) ?></td>
                              <td class="align-middle text-center">
                                 <?php foreach ($detail as $d) : ?>
                                    <?php if ($d->id_tran == $u->id) : ?>
                                       <?php foreach ($produk as $p) : ?>
                                          <?php if ($p->id == $d->id_produk) : ?>
                                             <li><?= ucwords($p->nama_produk) ?></li>
                                          <?php endif ?>
                                       <?php endforeach ?>
                                    <?php endif ?>
                                 <?php endforeach ?>
                              </td>
                              <td class="align-middle text-center">
                                 <?php foreach ($detail as $d) : ?>
                                    <?php if ($d->id_tran == $u->id) :
                                       $sum_qty[] = $d->jumlah;
                                       $total_qty = array_sum($sum_qty);
                                       $sum_price[] = $d->harga;
                                       $total_price = array_sum($sum_price); ?>
                                    <?php endif ?>
                                 <?php endforeach ?>
                                 <?= $total_qty ?>
                              </td>
                              <td class="align-middle text-center">
                                 <?= number_format($total_price, 0, ",", ".") ?>
                              </td>
                              <td class="align-middle text-center">
                                 <?php if ($u->ongkir == 0) : ?>
                                    <a class="btn btn-info" data-toggle="modal" data-target="#modal_ship<?= $u->id; ?>" title="shipping Cost">
                                       <i class="fas fa-comment-dollar"></i>
                                    </a>
                                 <?php endif ?>
                                 <a class="btn btn-warning" data-toggle="modal" data-target="#modal_pick<?= $u->id; ?>" title="Pickup">
                                    <i class="fas fa-truck-loading"></i>
                                 </a>
                              </td>
                           </tr>
                        <?php } ?>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>

<!-- Bootstrap modal edit & delete -->
<?php foreach ($new as $u) : ?>
   <div class="modal fade" id="modal_pick<?= $u->id; ?>" tabindex="-1" data-backdrop="static">
      <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
            <div class="modal-header">
               <h4 class="col-12 modal-title text-center">Pickup Order
                  <button class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
               </h4>
            </div>
            <form onsubmit="pickform.disabled = true; return true;" method="post" action="<?= base_url('dashboard/pickup') ?>">
               <div class="modal-body">
                  <input type="hidden" name="id" value="<?= $u->id ?>">
                  <span>Pickup ?</span>
               </div>
               <div class="modal-footer justify-content-between">
                  <button class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> No</button>
                  <button class="btn btn-warning" id="pickform"><i class="fa fa-check"></i> Yes</button>
               </div>
            </form>
         </div>
      </div>
   </div>

   <div class="modal fade" id="modal_ship<?= $u->id; ?>" tabindex="-1" data-backdrop="static">
      <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
            <div class="modal-header">
               <h4 class="col-12 modal-title text-center">Distance
                  <button class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
               </h4>
            </div>
            <form onsubmit="shipform.disabled = true; return true;" method="post" action="<?= base_url('dashboard/ship') ?>">
               <div class="modal-body">
                  <input type="hidden" name="id" value="<?= $u->id ?>">
                  <select name="distance" class="form-control">
                     <option value="10000">
                        > 10 Km - 10.000 </option>
                     <option value="8000">
                        < 10 Km - 8.000 </option>
                  </select>
               </div>
               <div class="modal-footer justify-content-between">
                  <button class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                  <button class="btn btn-info" id="shipform"><i class="fa fa-check"></i> Save</button>
               </div>
            </form>
         </div>
      </div>
   </div>

<?php endforeach ?>

<!--End Modals Add-->