<section id="prodetails" class="section-p1">
  <?php foreach ($product_detail as $p) : ?>
    <div class="single-pro-image">
      <img src="<?= base_url('assets/imgbeautyhampers/products/' . $p->image) ?>" class="rounded float-star" id="MainImg" alt="" />
      <div class="single-pro-details">
        <h6>Home / Produk</h6>
        <h4><?= $p->nama ?></h4>
        <h2>Rp <?= number_format($p->harga, 0, ",", ".") ?></h2>
        <?= form_open(base_url('welcome/add_cart')); ?>
        <input type="hidden" name="id_hampers" value="<?= $p->id ?>">
        <input type="hidden" name="hampers" value="<?= $p->nama_hampers ?>">
        <input type="hidden" name="jumlah" value="<?= 1 ?>">
        <input type="hidden" name="harga" value="<?= $p->harga ?>">
        <input type="hidden" name="id_tran" value="<?= $id_tran->id ?>">
        <button class="normal" type="submit"><i class="fas fa-cart-plus"></i> Add to cart</button>
        <?= form_close(); ?>
        <?php if ($this->session->flashdata('gagal')) { ?>
          <div class="alert alert-warning mt-3" role="alert">
            <?= $this->session->flashdata('gagal') ?>
          </div>
        <?php } ?>
        <h4>Product Details</h4>
        <span>
          Jenis snacknya bisa menyesuaikan dan varian snacknya bisa berubah tergantung ketersediaan snacknya. Perubahan snack akan diganti dgn warna yg sama dan harga yg sama juga, tapi kami tetap mendahulukan sesuai gambar. Ucapan bisa dicustom langsung lewat catatan ketika chat dan kalau tidak dicantumkan akan dikirim secara random :) Kami mengirimkan barang dengan kualitas baru Kerusakan dalam pengiriman bukan tanggung jawab kami 😊🙏Untuk lebih detailnya bisa chat langsung ya, thank you.
        </span>
      </div>
    <?php endforeach ?>
</section>