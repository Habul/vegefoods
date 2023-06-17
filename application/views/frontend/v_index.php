<section id="hero">
  <h4>Trade-in-offer</h4>
  <h2>Super value deals</h2>
  <h1>On all product</h1>
  <p>Save more with coupons & up to 20% off!</p>
  <button onclick="window.location.href='<?= base_url('shop') ?>';">Shop now</button>
</section>

<section id="feature" class="section-p1">
  <div class="fe-box">
    <img src="<?= base_url('assets/img/features/f1.png') ?>" alt="" />
    <h6>Free Shipping</h6>
  </div>
  <div class="fe-box">
    <img src="<?= base_url('assets/img/features/f2.png') ?>" alt="" />
    <h6>Online Order</h6>
  </div>
  <div class="fe-box">
    <img src="<?= base_url('assets/img/features/f3.png') ?>" alt="" />
    <h6>Save Money</h6>
  </div>
  <div class="fe-box">
    <img src="<?= base_url('assets/img/features/f4.png') ?>" alt="" />
    <h6>Promotions</h6>
  </div>
  <div class="fe-box">
    <img src="<?= base_url('assets/img/features/f5.png') ?>" alt="" />
    <h6>Happy Sell</h6>
  </div>
  <div class="fe-box">
    <img src="<?= base_url('assets/img/features/f6.png') ?>" alt="" />
    <h6>Support</h6>
  </div>
</section>

<section id="product1" class="section-p1">
  <h2>Featured Products</h2>
  <p>Summer Collection New Morden Design</p>
  <div class="pro-container">
    <?php foreach ($now as $n) : ?>
      <div class="pro" onclick="window.location.href='<?= base_url('shop/' . $n->id) ?>';">
        <img src="<?= base_url('assets/imgbeautyhampers/products/' . $n->image) ?>" alt="" />
        <div class="des">
          <h5><?= ucwords($n->nama) ?></h5>
          <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          <h4>Rp <?= number_format($n->harga, 0, ",", ".") ?></h4>
        </div>
        <a href="#"><i class="fal fa-shopping-cart cart"></i></a>
      </div>
    <?php endforeach ?>
  </div>
</section>

<section id="banner" class="section-m1">
</section>

<section id="product1" class="section-p1">
  <h2>Ner Arrivals</h2>
  <p>Summer Collection New Morden Design</p>
  <div class="pro-container">
    <?php foreach ($new as $n) : ?>
      <div class="pro" onclick="window.location.href='<?= base_url('shop/' . $n->id) ?>';">
        <img src="<?= base_url('assets/imgbeautyhampers/products/' . $n->image) ?>" alt="" />
        <div class="des">
          <h5><?= ucwords($n->nama) ?></h5>
          <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          <h4>Rp <?= number_format($n->harga, 0, ",", ".") ?></h4>
        </div>
        <a href="#"><i class="fal fa-shopping-cart cart"></i></a>
      </div>
    <?php endforeach ?>
  </div>
</section>