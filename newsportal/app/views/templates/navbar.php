<?php
$tanggal= date('l, d F, Y');

$tanggal= preg_split('/[, ]/', $tanggal, -1, PREG_SPLIT_NO_EMPTY);
switch($tanggal[0]) {
  case 'Monday':
    $tanggal= 'Senin, '. $tanggal[1]. ' '. $tanggal[2]. ', '. $tanggal[3];
    break;
  case 'Tuesday':
    $tanggal= 'Selasa, '. $tanggal[1]. ' '. $tanggal[2]. ', '. $tanggal[3];
    break;
  case 'Wednesday':
    $tanggal= 'Rabu, '. $tanggal[1]. ' '. $tanggal[2]. ', '. $tanggal[3];
    break;
  case 'Thursday':
    $tanggal= 'Kamis, '. $tanggal[1]. ' '. $tanggal[2]. ', '. $tanggal[3];
    break;
  case 'Friday':
    $tanggal= "Jum'at, ". $tanggal[1]. ' '. $tanggal[2]. ', '. $tanggal[3];
    break;
  case 'Saturday':
    $tanggal= 'Sabtu, '. $tanggal[1]. ' '. $tanggal[2]. ', '. $tanggal[3];
    break;
  case 'Sunday':
    $tanggal= 'Ahad, '. $tanggal[1]. ' '. $tanggal[2]. ', '. $tanggal[3];
    break;

}

$tanggal= preg_split('/[, ]/', $tanggal, -1, PREG_SPLIT_NO_EMPTY);
switch($tanggal[2]) {
  case 'January':
    $tanggal= $tanggal[0]. $tanggal[1]. ' Januari, '. $tanggal[3];
    break;
  case 'February':
    $tanggal= $tanggal[0]. $tanggal[1]. ' Februari, '. $tanggal[3];
    break;
  case 'March':
    $tanggal= $tanggal[0]. $tanggal[1]. ' Maret, '. $tanggal[3];
    break;
  case 'May':
    $tanggal= $tanggal[0]. $tanggal[1]. ' Mei, '. $tanggal[3];
    break;
  case 'June':
    $tanggal= $tanggal[0]. $tanggal[1]. ' Juni, '. $tanggal[3];
    break;
  case 'July':
    $tanggal= $tanggal[0]. $tanggal[1]. ' Juli, '. $tanggal[3];
    break;
  case 'August':
    $tanggal= $tanggal[0]. $tanggal[1]. ' Agustus, '. $tanggal[3];
    break;

}
$tanggal= $tanggal[0]. ', '. $tanggal[1]. ' '. $tanggal[2]. ', '. $tanggal[3]

?>
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

    <div>
      <section style="align-items: baseline;">
        <span class="tanggal"><?= $tanggal; ?></span>
        <a href="<?= BASEURL; ?>/pencarian">Pencarian</a>
        <button id="burg">
          <?php if(isset($_SESSION['pengguna'])) { ?>
            <span><?= explode(' ', $_SESSION['pengguna']['nama_pengguna'])[0]; ?></span>
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
