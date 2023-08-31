<div class="content-wrapper">
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0">Transaction</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                  <li class="breadcrumb-item active">Transaction</li>
               </ol>
            </div>
         </div>
      </div>
   </div>

   <section class="content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-md-12">
               <div class="card card-success card-outline">
                  <div class="card-header">
                     <h4 class="card-title">
                        Transaction
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
                     <table id="index2" class="table table-bordered table-striped table-sm">
                        <thead class="thead-light text-center">
                           <tr>
                              <th width="5%">No</th>
                              <th>Name</th>
                              <th>Trans Id</th>
                              <th>Produk</th>
                              <th>Qty</th>
                              <th>Price</th>
                              <th>Status</th>
                           </tr>
                        </thead>
                        <?php foreach ($history as $u) {    ?>
                           <tr class="align-middle">
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
                              <td class="align-middle">
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
                                 <?php $sum2 = $this->db->select_sum('harga')->where(['id_tran' => $u->id, 'id_produk!=' => '0'])->get('d_transaksi')->row() ?>
                                 <?php foreach ($detail as $d) : ?>
                                    <?php if ($d->id_tran == $u->id) : ?>
                                       <?php foreach ($produk as $p) : ?>
                                          <?php if ($p->id == $d->id_produk) : ?>
                                             <li><?= $d->jumlah . ' ' . ucwords($p->satuan) ?></li>
                                          <?php endif ?>
                                       <?php endforeach ?>
                                    <?php endif ?>
                                 <?php endforeach ?>
                              </td>
                              <td class="align-middle text-center"><?= number_format($sum2->harga, 0, ",", ".") ?></td>
                              <td class="align-middle text-center">
                                 <?php if ($u->status == 0) : ?>
                                    <span class="badge badge-warning"> - </span>
                                 <?php elseif ($u->status == 1) : ?>
                                    <span class="badge badge-info">In Process</span>
                                 <?php elseif ($u->status == 2) : ?>
                                    <span class="badge badge-secondary">Is on delivery</span>
                                 <?php elseif ($u->status == 3) : ?>
                                    <span class="badge badge-success">Finished</span>
                                 <?php else : ?>
                                    <span class="badge badge-warning">Retur</span>
                                 <?php endif ?>
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