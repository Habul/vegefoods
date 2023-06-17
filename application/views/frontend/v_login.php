<section id="page-header" class="about-header">
  <h2>#let's talk</h2>
  <p>LEAVE A MESSAGE. We love to hear from you!</p>
</section>

<section id="contact-details" class="section-p1">
  <main class="form-signin mb-4">
    <form method="POST" action="<?= base_url('login/proses') ?>">
      <h1 class="h5 mb-3 fw-normal text-center">Please login !</h1>

      <div class="form-floating mb-3">
        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email" autofocus required>
        <label for="floatingInput">Email address</label>
      </div>
      <div class="form-floating mb-3">
        <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password" required>
        <label for="floatingPassword">Password</label>
      </div>

      <button class="w-100 btn btn-lg btn-info" type="submit">Login</button>
      <div class="text-center mt-3">
        <p>Not a member? <a href="<?= base_url('register') ?>" class="text-decoration-none">Register</a></p>
      </div>
    </form>
    <?php
    if (isset($_GET['alert'])) {
      if ($_GET['alert'] == "gagal") {
        echo "<div class='alert alert-warning font-weight-bold text-center text-warning'><i class='icon fas fa-exclamation-triangle'></i> Login failed!</div>";
      } else if ($_GET['alert'] == "belum_login") {
        echo "<div class='alert alert-danger font-weight-bold text-center text-danger'><i class='icon fas fa-ban'></i> Please login first !</div>";
      } else if ($_GET['alert'] == "logout") {
        echo "<div class='alert alert-success font-weight-bold text-center text-success'><i class='icon fas fa-bell'></i> You Are Log Out!</div>";
      }
    }
    ?>
  </main>
</section>