<div class="content-wrapper">
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0">Delivery Order</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                  <li class="breadcrumb-item active">Delivery Order</li>
               </ol>
            </div>
         </div>
      </div>
   </div>

   <section class="content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-md-12">
               <div class="card card-danger card-outline">
                  <div class="card-header">
                     <h4 class="card-title">
                        Delivery Orders
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
                     <table id="index1" class="table table-bordered table-striped table-sm">
                        <thead class="thead-light text-center">
                           <tr>
                              <th width="5%">No</th>
                              <th>Pembeli</th>
                              <th>Trans Id</th>
                              <th>Address</th>
                              <th>Produk</th>
                              <th>Qty</th>
                              <th>Price</th>
                           </tr>
                        </thead>
                        <?php foreach ($delivery as $u) {    ?>
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
                                 <?php $sum = $this->db->select_sum('jumlah')->where(['id_tran' => $u->id])->get('d_transaksi')->row();
                                 $sum2 = $this->db->select_sum('harga')->where(['id_tran' => $u->id, 'id_produk!=' => '0'])->get('d_transaksi')->row() ?>
                                 <?= $sum->jumlah ?>
                              </td>
                              <td class="align-middle text-center"><?= number_format($sum2->harga, 0, ",", ".") ?></td>
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