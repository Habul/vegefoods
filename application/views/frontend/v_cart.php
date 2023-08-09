<section id="page-header">
  <h2>#stayhome</h2>

  <p>Save more with coupons & up to 20% off!</p>
</section>


<section id="product1" class="section-p1">
  <div class="d-flex justify-content-between">
    <div class="card col-4">
      <div class="card-body">
        <span class="fw-semibold">Transaction code : VGF-<?= $header->id ?></span>
      </div>
    </div>
    <div class="card col-6">
      <div class="card-body">
        <span class="fw-semibold">Address : <?= $header->alamat ?></span>
      </div>
    </div>
  </div>
  <div class="card shadow-sm mt-2 mb-2">
    <div class="card-body">
      <table class="table table-hover">
        <thead class="table-light">
          <tr>
            <th>No</th>
            <th>Item</th>
            <th>Qty</th>
            <th>Price</th>
            <th>Status</th>
            <th><i class="fas fa-cogs"></i></th>
          </tr>
        </thead>
        <?php $no = 1;
        foreach ($cart as $c) :
          $sum_qty[] = $c->jumlah;
          $total_qty = array_sum($sum_qty);
          $sum_price[] = $c->harga;
          $total_price = array_sum($sum_price); ?>
          <tr class="align-middle">
            <td><?= $no++ ?></td>
            <td>
              <?php if ($c->id_produk != 0) : ?>
                <?= ucwords($c->nama_produk) ?>
              <?php else : ?>
                <?= 'Shipping Cost' ?>
              <?php endif ?>
            </td>
            <td><?= $c->jumlah ?></td>
            <td><?= $c->harga ?></td>
            <td>
              <?php if ($c->status == 0) : ?>
                <span class="badge text-bg-warning"> - </span>
              <?php elseif ($c->status == 1) : ?>
                <span class="badge text-bg-info">In Process</span>
              <?php elseif ($c->status == 2) : ?>
                <span class="badge text-bg-secondary">Is on delivery</span>
              <?php elseif ($c->status == 3) : ?>
                <span class="badge text-bg-success">Finished</span>
              <?php endif ?>
            </td>
            <td>
              <?php if ($c->status == 0) : ?>
                <?= anchor(
                  site_url('welcome/delete/' . $c->id_detil),
                  '<i class="fa fa-trash"></i>',
                  'title="delete" class="btn btn-danger" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'
                ); ?>
              <?php else : ?>
                <button class="btn btn-info" title="Disable" disabled>
                  <i class="fas fa-lock"></i>
                </button>
              <?php endif ?>
            </td>
          </tr>
        <?php endforeach ?>
        <tr class="fw-semibold">
          <td colspan=" 2">
            Total
          </td>
          <td>
            <?= $total_qty ?>
          </td>
          <td>
            <?= $total_price ?>
          </td>
          <td colspan="2">
            <?php if ($header->status == 1 && $header->ongkir == 1) : ?>
              Click <a href="<?= base_url('assets/img/QR.jpg')  ?>" target="_blank" class="text-decoration-none">here</a> for payment <br />
              Note: Please add a description when transferring
            <?php elseif ($header->status == 1 && $header->ongkir == 0) : ?>
              Wait for the seller to add postage
            <?php endif ?>
          </td>
        </tr>
      </table>
      <?php if ($total != 0) : ?>
        <div class="d-flex justify-content-end">
          <?php if ($header->status == 0 && $header->ongkir == 0) : ?>
            <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#address"><i class="fas fa-map"></i> Add address</button>
            <?php if ($header->alamat != '') : ?>
              <?= anchor(
                site_url('welcome/checkout/' . $c->id),
                '<i class="fas fa-check"></i> Checkout',
                'title="Checkout" class="btn btn-info mx-3" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'
              ); ?>
            <?php endif ?>
          <?php elseif ($header->status == 2) : ?>
            <?= anchor(
              site_url('welcome/confrim/' . $c->id),
              '<i class="fas fa-check-double"></i> Confrim',
              'title="Confrim" class="btn btn-success mx-3" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'
            ); ?>
            <?= anchor(
              site_url('welcome/retur/' . $c->id),
              '<i class="fas fa-undo-alt"></i> Retur',
              'title="Retur" class="btn btn-warning mx-3" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'
            ); ?>
          <?php endif ?>
        </div>
      <?php endif ?>
    </div>
  </div>
</section>


<!-- Modal -->
<?php foreach ($cart as $c) : ?>
  <div class="modal fade" id="address" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title fs-5" id="exampleModalLabel">Address</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <?= form_open(base_url('welcome/add_distance')); ?>
        <div class="modal-body">
          <div class="form-group mb-2">
            <input type="hidden" name="id" value="<?= $c->id ?>">
            <textarea name="alamat" class="form-control" rows="3"><?= $c->alamat ?></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button class="btn btn-primary">Save</button>
        </div>
        <?= form_close(); ?>
      </div>
    </div>
  </div>
<?php endforeach ?>