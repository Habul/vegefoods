<section id="page-header" class="blog-header">
  <h2>#readmore</h2>

  <p>Mengutamakan Kualitas dan Kesehatan: VegeFoods sebagai Sumber Sayuran Segar Anda!</p>
</section>

<section id="blog">
  <?php foreach ($blog as $b) { ?>
    <div class="blog-box">
      <div class="blog-img">
        <img src="<?= base_url('assets/imgbeautyhampers/blog/' . $b->image) ?>" class="img-fluid img-thumbnail w-100">
      </div>
      <div class="blog-details">
        <h4><?= ucwords($b->judul) ?></h4>
        <p>
          <?= ucfirst($b->detail) ?>
        </p>
      </div>
    </div>
  <?php } ?>
  <?= $links ?>
</section>