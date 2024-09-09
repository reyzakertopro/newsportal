<main>
  <section>
    <div style="display: flex; flex-direction: column; gap: .25em;">
      <div class="jumbotron">
        <h2>Selamat datang di website portal berita</h2>
        <hr>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

      </div>
      <?php if (isset($_SESSION['pengguna'])): ?>
        <div class="jumbotron">
          <h2>Belum terbit</h2>
          <div class="wrapper">
            <?php
            foreach ($data as $key => $value) {
              if($value['statusArtikel']== 'terbit') continue;
              $date= date_diff(date_create($value['dateArtikel']), date_create(date('Y-m-d H:i:s')));
              if($date->y> 0) {
                $date= $date->y. ' tahun lalu';
              } elseif($date->m> 0) {
                $date= $date->m. ' bulan lalu';
              } elseif($date->days> 0) {
                $date= $date->days. ' hari lalu';
              } elseif($date->h> 0) {
                $date= $date->h. ' jam lalu';
              } elseif($date->i> 0) {
                $date= $date->i. ' menit lalu';
              } else {
                $date= 'baru saja';
              }

              ?>
              <a href="<?= BASEURL. '/artikel/'. $value['artikelId']; ?>" class="thumbnail"
                style="
                background: linear-gradient(90deg, rgba(1, 1, 3, .75), rgba(1, 1, 3, .05)),
                url('<?= BASEURL; ?>/public/uploads/<?= $data[$key]['bannerArtikel']; ?>');
                background-size: cover;
                background-position: center;"
                >
                <span><?= $value['judulArtikel']; ?></span>
                <span><?= $value['penulis']; ?></span>
                <span><?= $value['kategoriArtikel']. ' . '. $date; ?></span>

              </a>
            <?php } ?>

          </div>

        </div>

      <?php endif; ?>

      <div class="jumbotron">
        <h2>Daftar artikel</h2>
        <div class="wrapper">
          <?php
          usort($data, fn($a, $b)=> $a['dateTerbitArtikel']<=> $b['dateTerbitArtikel']);
          foreach ($data as $key => $value) {
            if(empty($value['dateTerbitArtikel'])) continue;
            $date= date_diff(date_create($value['dateTerbitArtikel']), date_create(date('Y-m-d H:i:s')));
            if($date->y> 0) {
              $date= $date->y. ' tahun lalu';
            } elseif($date->m> 0) {
              $date= $date->m. ' bulan lalu';
            } elseif($date->days> 0) {
              $date= $date->days. ' hari lalu';
            } elseif($date->h> 0) {
              $date= $date->h. ' jam lalu';
            } elseif($date->i> 0) {
              $date= $date->i. ' menit lalu';
            } else {
              $date= 'baru saja';
            }

          ?>
            <a href="<?= BASEURL. '/artikel/'. $value['artikelId']; ?>" class="thumbnail"
              style="
              background: linear-gradient(90deg, rgba(1, 1, 3, .75), rgba(1, 1, 3, .05)),
              url('<?= BASEURL; ?>/public/uploads/<?= $data[$key]['bannerArtikel']; ?>');
              background-size: cover;
              background-position: center;"
              >
              <span><?= $value['judulArtikel']; ?></span>
              <span><?= $value['penulis']; ?></span>
              <span><?= $value['kategoriArtikel']. ' . '. $date; ?></span>

            </a>
          <?php } ?>

        </div>

      </div>

    </div>
    <div class="ads">
      <div class="jumbotron">
        <h2>Iklan dan lainnya.</h2>
        <hr>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

      </div>

    </div>

  </section>

</main>
