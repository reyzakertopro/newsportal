<main>
  <section>
    <div class="wrapper">
      <!-- Featured artikel -->
      <div class="jumbotron featured">
        <?php foreach($data as $k => $v):
          if($v['statusArtikel']. $v['featured']!= 'terbittrue') continue; ?>
          <a class="card" href="<?= BASEURL; ?>/artikel/<?= $v['artikelId']; ?>"
            style="
            background: linear-gradient(270deg, rgba(1, 1, 3, .05), rgba(1, 1, 3, .5)), url('<?= BASEURL; ?>/public/uploads/<?= $v['bannerArtikel']; ?>');
            background-position: center;
            background-size: cover;
            ">
            <span class="judul"><?= $v['judulArtikel']; ?></span>
            <div class="desc">
              <span class="kategori"><?= $v['kategoriArtikel']; ?></span>
              <span> . </span>
              <span class="penulis"><?= $v['penulis']; ?></span>
              <span> . </span>
              <span class="date"><?= $v['date']; ?></span>
            </div>
          </a>
        <?php endforeach; ?>
        <button class="feat-btn" id="next"><i class="fa-solid fa-chevron-right"></i></button>
        <button class="feat-btn" id="prev"><i class="fa-solid fa-chevron-left"></i></button>
      </div>

      <!-- Artikel belum terbit -->
      <?php if(isset($_SESSION['pengguna'])): ?>
        <div class="jumbotron list">
          <h3>Belum terbit</h3>
          <?php foreach($data as $k => $v):
            if($v['statusArtikel']!= 'pending') continue; ?>
            <a class="bar" href="<?= BASEURL; ?>/artikel/<?= $v['artikelId']; ?>"
              style="
              background: linear-gradient(270deg, rgba(1, 1, 3, .05), rgba(1, 1, 3, .5)), url('<?= BASEURL; ?>/public/uploads/<?= $v['bannerArtikel']; ?>');
              background-position: center;
              background-size: cover;
              ">
              <span><?= $v['judulArtikel']; ?></span>
              <span><?= $v['penulis']; ?></span>
              <div>
                <span><?= $v['kategoriArtikel']; ?></span>
                <span> . </span>
                <span><?= $v['date']; ?></span>
              </div>
            </a>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>

      <!-- Artikel sudah terbit -->
      <div class="jumbotron list">
        <h3>Daftar artikel</h3>
        <?php
        usort($data, fn($a, $b)=> $b['dateTerbitArtikel']<=> $a['dateTerbitArtikel']);
        foreach($data as $k => $v):
          if($v['statusArtikel']== 'pending') continue; ?>
          <a class="bar" href="<?= BASEURL; ?>/artikel/<?= $v['artikelId']; ?>"
            style="
            background: linear-gradient(225deg, rgba(1, 1, 3, .15), rgba(1, 1, 3, .95)), url('<?= BASEURL; ?>/public/uploads/<?= $v['bannerArtikel']; ?>');
            background-position: center;
            background-size: cover;
            ">
            <span><?= $v['judulArtikel']; ?></span>
            <span><?= $v['penulis']; ?></span>
            <div>
              <span><?= $v['kategoriArtikel']; ?></span>
              <span> . </span>
              <span><?= $v['date']; ?></span>
            </div>
          </a>
        <?php endforeach; ?>
      </div>

    </div>

    <!-- Iklan side -->
    <div class="jumbotron ads">
      <h3>Iklan & lainnya</h3>
      <hr>
      <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span>

    </div>

  </section>

  <section>

  </section>

</main>
