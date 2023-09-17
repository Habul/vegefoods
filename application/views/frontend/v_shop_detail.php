<section id="prodetails" class="section-p1">
  <?php foreach ($product_detail as $p) : ?>
    <div class="single-pro-image">
      <img src="<?= base_url('assets/imgbeautyhampers/products/' . $p->image) ?>" class="img-fluid rounded float-star" id="MainImg" alt="" />
      <div class="single-pro-details">
        <h4><?= ucwords($p->nama_produk) ?></h4>
        <h2>Rp <?= number_format($p->harga, 0, ",", ".") ?></h2>
        <small>Sisa Stock <?= $p->stok . ucwords($p->satuan) ?></small>
        <?= form_open(base_url('welcome/add_cart')); ?>
        <input type="hidden" name="id_produk" value="<?= $p->id ?>">
        <input type="hidden" name="harga" value="<?= $p->harga ?>">
        <input type="hidden" name="id_tran" value="<?= $id_tran->id ?>">
        <select name="jumlah">
          <?php for ($x = 1; $x <= $p->stok; $x++) { ?>
            <option value="<?= $x ?>"> <?= $x ?> <?= ucwords($p->satuan) ?></option>
          <?php } ?>
        </select>
        <button class="normal" type="submit"><i class="fas fa-cart-plus"></i> Add to cart</button>
        <?= form_close(); ?>
        <?php if ($this->session->flashdata('gagal')) { ?>
          <div class="alert alert-warning mt-3" role="alert">
            <?= $this->session->flashdata('gagal') ?>
          </div>
        <?php } ?>
        <h4>Product Details</h4>
        <span>
          <?= ucfirst($p->detail) ?>
        </span>
      </div>
    <?php endforeach ?>
</section>