<div class="content-wrapper">
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0">New Order & Retur Order</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                  <li class="breadcrumb-item active">New orders & Retur orders</li>
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
                        New orders & Retur orders
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
                              <th>Pembeli</th>
                              <th>Trans ID</th>
                              <th>Address</th>
                              <th>Produk</th>
                              <th>Qty</th>
                              <th>Price</th>
                              <th>Note</th>
                              <th width="9%"><i class="fas fa-cogs"></i></th>
                           </tr>
                        </thead>
                        <?php foreach ($retur as $u) {    ?>
                           <tr>
                              <td class="align-middle text-center"></td>
                              <td class="align-middle">
                                 <?php foreach ($pengguna as $p) : ?>
                                    <?php if ($u->id_pengguna == $p->id) : ?>
                                       <?= ucwords($p->nama) ?>
                                    <?php endif ?>
                                 <?php endforeach ?>
                              </td>
                              <td class="align-middle text-center">
                                 <?= 'VGF-' . $u->id_pengguna . '.' . $u->id ?>
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
                                 <?php $sum = $this->db->select_sum('jumlah')->where(['id_tran' => $u->id])->get('d_transaksi')->row();
                                 $sum2 = $this->db->select_sum('harga')->where(['id_tran' => $u->id, 'id_produk!=' => '0'])->get('d_transaksi')->row() ?>
                                 <?= $sum->jumlah ?>
                              </td>
                              <td class="align-middle text-center"><?= number_format($sum2->harga, 0, ",", ".") ?></td>
                              <td class="align-middle">
                                 <?= $u->note ?>
                              </td>
                              <td class="align-middle text-center">
                                 <a class="btn btn-warning" data-toggle="modal" data-target="#modal_conf<?= $u->id; ?>" title="Confirm retur">
                                    <i class="fas fa-people-carry"></i>
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

<?php foreach ($retur as $u) : ?>
   <div class="modal fade" id="modal_conf<?= $u->id; ?>" tabindex="-1" data-backdrop="static">
      <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
            <div class="modal-header">
               <h4 class="col-12 modal-title text-center">Confrim Retur
                  <button class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
               </h4>
            </div>
            <form onsubmit="pickform.disabled = true; return true;" method="post" action="<?= base_url('dashboard/confretur') ?>">
               <div class="modal-body">
                  <input type="hidden" name="id" value="<?= $u->id ?>">
                  <span>Confrim retur ?</span>
               </div>
               <div class="modal-footer justify-content-between">
                  <button class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> No</button>
                  <button class="btn btn-warning" id="pickform"><i class="fa fa-check"></i> Yes</button>
               </div>
            </form>
         </div>
      </div>
   </div>
<?php endforeach ?>