<link rel="stylesheet" href="<?= BASEURL; ?>/public/css/navbar.css">
<nav>
  <div>
    <div style="display: flex; gap: .95em;">
      <a href="<?= BASEURL; ?>" class="logo">LOGO</a>
      <section class="nav-menu">
        <a class="logo" href="<?= BASEURL; ?>" class="logo">LOGO</a>
        <button id="close"><i class="fa-solid fa-xmark"></i></button>
        <a href="<?= BASEURL; ?>">Home</a>
        <a href="<?= BASEURL; ?>/about">About</a>
        <a href="<?= BASEURL; ?>/tulis">Tulis Artikel</a>

      </section>

    </div>

    <section style="align-items: baseline;">
      <a href="<?= BASEURL; ?>/pencarian">Pencarian</a>
      <?php if(isset($_SESSION['pengguna'])) { ?>
        <a href="<?= BASEURL; ?>/login/auth/logout"><span><?= $_SESSION['pengguna']['nama_pengguna']; ?></span></a>
      <?php } else{ ?>
        <a href="<?= BASEURL; ?>/login">Login</a>
      <?php } ?>
      <button id="burger-menu"><i class="fa-solid fa-bars"></i></button>

    </section>

  </div>

</nav>
<script src="<?= BASEURL; ?>/public/js/navbar.js"></script>
