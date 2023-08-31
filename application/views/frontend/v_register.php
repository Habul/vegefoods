<section id="page-header" class="about-header">
  <h2>#let's talk</h2>
  <p>LEAVE A MESSAGE. We love to hear from you!</p>
</section>

<section id="contact-details" class="section-p1">
  <main class="form-signin">
    <form method="POST" action="<?= base_url('login/register_proses') ?>">
      <h1 class="h5 mb-3 fw-normal text-center">Register !</h1>
      <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingnama" placeholder="Name" name="name" required>
        <label for="floatingnama">Name</label>
      </div>
      <div class="form-floating mb-3">
        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email" required>
        <label for="floatingInput">Email address</label>
      </div>
      <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatinghp" placeholder="08xxxxx" name="no_hp" required>
        <label for="floatinghp">No HP</label>
      </div>
      <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingaddres" placeholder="Address" name="address" required>
        <label for="floatingaddres">Address</label>
      </div>
      <div class="form-floating mb-3">
        <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password" required>
        <label for="floatingPassword">Password</label>
      </div>
      <div class="form-floating mb-4">
        <input type="password" class="form-control" id="floatingconfrimPassword" placeholder="confrim Password" name="password2" required>
        <label for="floatingconfrimPassword">Confirm Password</label>
      </div>
      <button class="w-100 btn btn-lg btn-info" type="submit">Register</button>
      <div class="text-center mt-3">
        <p>Do you member? <a href="<?= base_url('login') ?>" class="text-decoration-none">Login</a></p>
      </div>
    </form>
    <?php
    if (isset($_GET['alert'])) {
      if ($_GET['alert'] == "not_registered") {
        echo "<div class='alert font-weight-bold text-center'><i class='icon fas fa-exclamation-triangle'></i> User gagal di tambah!</div>";
      }
    }
    ?>
  </main>
</section>