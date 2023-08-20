<section id="page-header">
  <h2>#stayhome</h2>

  <p>Save more with coupons & up to 20% off!</p>
</section>


<section id="product1" class="section-p1">
  <div class="card shadow-sm mt-2 mb-2">
    <div class="card-body">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>No</th>
            <th>Trans ID</th>
            <th>Address</th>
            <th>Produk</th>
            <th>Qty</th>
            <th>Price</th>
          </tr>
        </thead>
        <?php $no = 1;
        foreach ($header as $h) { ?>
          <tr class="align-middle">
            <td><?= $no++ ?></td>
            <td><?= 'VGF-' . $h->id_pengguna . '.' . $h->id ?></td>
            <td><?= ucwords($h->alamat) ?></td>
            <td>
              <?php foreach ($detail as $d) : ?>
                <?php if ($d->id_tran == $h->id) : ?>
                  <?php foreach ($produk as $p) : ?>
                    <?php if ($p->id == $d->id_produk) : ?>
                      <li><?= ucwords($p->nama_produk) ?></li>
                    <?php endif ?>
                  <?php endforeach ?>
                <?php endif ?>
              <?php endforeach ?>
            </td>
            <td>
              <?php
              // $sum  = $this->db->select_sum('jumlah')->where(['id_tran' => $h->id])->get('d_transaksi')->row();
              $sum2 = $this->db->select_sum('harga')->where(['id_tran' => $h->id])->get('d_transaksi')->row();
              ?>
              <?php foreach ($detail as $d) : ?>
                <?php if ($d->id_tran == $h->id) : ?>
                  <?php foreach ($produk as $p) : ?>
                    <?php if ($p->id == $d->id_produk) : ?>
                      <li><?= '1 ' . ucwords($p->satuan) ?></li>
                    <?php endif ?>
                  <?php endforeach ?>
                <?php endif ?>
              <?php endforeach ?>
            </td>
            <td>
              <?= number_format($sum2->harga, 0, ",", ".") ?>
            </td>
          </tr>
        <?php } ?>
      </table>
    </div>
  </div>
</section>