<link rel="stylesheet" href="<?= BASEURL; ?>/public/css/navbar.css">
<nav>
  <div>
    <div style="display: flex; gap: .75em; align-items: center;">
      <a href="<?= BASEURL; ?>" class="logo">LOGO</a>
      <section class="nav-menu">
        <a href="<?= BASEURL; ?>">Home</a>
        <a href="<?= BASEURL; ?>/about">About</a>
        <a href="<?= BASEURL; ?>/tulis">Tulis Artikel</a>

      </section>

    </div>

      <section style="align-items: baseline;">
        <a href="<?= BASEURL; ?>/pencarian">Pencarian</a>
        <button id="burg">
          <?php if(isset($_SESSION['pengguna'])) { ?>
            <span><?= $_SESSION['pengguna']['nama_pengguna']; ?></span>
          <?php } else { ?>
            <i class="fa-solid fa-bars"></i>
          <?php } ?>
        </button>
      </section>

      <section class="side-bar">
        <?php if(!isset($_SESSION['pengguna'])){ ?>
          <span class="title">Logo</span>
        <?php } else { ?>
          <span class="title"><?= $_SESSION['pengguna']['nama_pengguna']; ?></span>
        <?php } ?>
        <button id="close-nav"><i class="fa-solid fa-xmark"></i></button>
        <div class="nav-menu">
          <a href="<?= BASEURL; ?>">Home</a>
          <a href="<?= BASEURL; ?>/about">About</a>
          <a href="<?= BASEURL; ?>/tulis">Tulis Artikel</a>
        </div>
        <hr>
        <div class="profile-menu">
          <?php if(isset($_SESSION['pengguna'])) { ?>
          <a href="<?= BASEURL; ?>/profile">Profile</a>
          <a href="<?= BASEURL; ?>/iklan kelola">Kelola Iklan</a>
          <?php } ?>
          <?php if(isset($_SESSION['pengguna']['nama_pengguna'])) { ?>
          <a href="<?= BASEURL; ?>/login/auth/logout">Logout</a>
          <?php } else { ?>
          <a href="<?php BASEURL; ?>/register">Daftarkan Akun</a>
          <a href="<?= BASEURL; ?>/login/auth/login">Login</a>
          <?php } ?>
        </div>

      </section>

    </div>

  </div>

</nav>
<script src="<?= BASEURL; ?>/public/js/navbar.js"></script>
