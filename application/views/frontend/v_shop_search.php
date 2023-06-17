<section id="page-header">
  <h2>#stayhome</h2>

  <p>Save more with coupons & up to 20% off!</p>
</section>

<div class="col-md-3 p-3 mt-2">
  <form class="d-flex justify-item-end" action="<?= base_url('shop/shop_search') ?>" method="GET">
    <input class="form-control me-2" type="text" placeholder="Search" name="keyword" value="<?= $keyword ?>">
    <button class="btn btn-outline-success" type="submit"><i class="fas fa-search"></i></button>
  </form>
</div>

<section id="product1" class="section-p1">
  <div class="pro-container">
    <?php if ($result != '') : ?>
      <?php foreach ($result as $p) : ?>
        <div class="pro" onclick="window.location.href='<?= base_url('shop/' . $p->id) ?>';">
          <img src="<?= base_url('assets/imgbeautyhampers/products/' . $p->image) ?>" alt="" />
          <div class="des">
            <h5><?= ucwords($p->nama) ?></h5>
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <h4>Rp <?= number_format($p->harga, 0, ",", ".") ?></h4>
          </div>
          <a href="#"><i class="fal fa-shopping-cart cart"></i></a>
        </div>
      <?php endforeach ?>
    <?php else : ?>
      <h5>Data tidak di temukan</h5>
    <?php endif ?>
  </div>
</section>