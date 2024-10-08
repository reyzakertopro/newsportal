<?php
foreach($data as $key => $value) {
  if($value['statusArtikel']== 'pending') {
    $data[$key]['dateUi']= 'belum terbit';
    continue;
  }

  $data[$key]['dateUi']=
    date_diff(date_create($data[$key]['dateTerbitArtikel']), date_create(date('Y-m-d H:i:s')));
  switch($data[$key]['dateUi']) {
    case $data[$key]['dateUi']->y > 0:
    $data[$key]['dateUi']= $data[$key]['dateUi']->y. ' tahun lalu';
    break;
    case $data[$key]['dateUi']->m > 0:
    $data[$key]['dateUi']= $data[$key]['dateUi']->m. ' bulan lalu';
    break;
    case $data[$key]['dateUi']->days > 0:
    $data[$key]['dateUi']= $data[$key]['dateUi']->days. ' hari lalu';
    break;
    case $data[$key]['dateUi']->h > 0:
    $data[$key]['dateUi']= $data[$key]['dateUi']->h. ' jam lalu';
    break;
    case $data[$key]['dateUi']->i > 0:
    $data[$key]['dateUi']= $data[$key]['dateUi']->i. ' menit lalu';
    break;
    default: $data[$key]['dateUi']= 'baru saja';

  }

}

?>
<main>
  <section>
    <div class="wrapper">
      <div class="jumbotron edipick">
        <?php foreach($data as $art): if($art['statusArtikel']== 'terbit'&& $art['featured']== 'true'): ?>
          <a class="edipick-card" href="<?= BASEURL; ?>/artikel/<?= $art['artikelId']; ?>">
            <span class="date-desc"><?= $art['dateUi']; ?></span>
            <span class="judul"><?= $art['judulArtikel']; ?></span>
            <span class="caption">
              <?=
              pathinfo(
                str_replace(
                  $art['judulArtikel']. ' '.
                  $art['penulis']. ' '.
                  date('Y-m-d H i s', strtotime($art['dateArtikel'])). ' ',
                  ' ', $art['bannerArtikel'])
                , PATHINFO_FILENAME);
              ?>
            </span>
            <div class="banner"
            style="
            background: linear-gradient(180deg, rgba(1, 1, 3, .15), rgba(1, 1, 3, .5)),
            url('<?= BASEURL; ?>/public/uploads/<?= $art['bannerArtikel']; ?>') center center / cover;
            "></div>
          </a>
        <?php endif; endforeach; ?>
        <div class="btn-wrapper">
          <button><i class="fa-solid fa-chevron-left"></i></button>
          <button><i class="fa-solid fa-chevron-right"></i></button>
        </div>
      </div>

      <?php if(isset($_SESSION['pengguna'])): ?>
        <div class="jumbotron">
          <h2>Belum terbit</h2>
          <?php foreach($data as $art):
            if($art['statusArtikel']!= 'pending') continue; ?>
            <a class="artikel-card" href="<?= BASEURL; ?>/artikel/<?= $art['artikelId']; ?>"
              style="
              background: linear-gradient(225deg, rgba(1, 1, 3, .05), rgba(1, 1, 3, .75)),
              url('<?= BASEURL; ?>/public/uploads/<?= $art['bannerArtikel']; ?>') center center / cover;
              ">
              <span><?= $art['judulArtikel']; ?></span>
              <span><?= $art['penulis']; ?></span>
              <div>
                <span><?= $art['kategoriArtikel']; ?></span>
                <span> . </span>
                <span><?= $art['dateUi']; ?></span>
              </div>
            </a>
          <?php endforeach; ?>

        </div>

      <?php endif; ?>

      <div class="jumbotron">
        <h2>Daftar artikel</h2>
        <?php
        usort($data, fn($a, $b)=> $b['dateTerbitArtikel']<=> $a['dateTerbitArtikel']);
        foreach($data as $art):
        if($art['statusArtikel']== 'pending') continue; ?>
          <a class="artikel-card" href="<?= BASEURL; ?>/artikel/<?= $art['artikelId']; ?>"
            style="
            background: linear-gradient(225deg, rgba(1, 1, 3, .05), rgba(1, 1, 3, .75)),
            url('<?= BASEURL; ?>/public/uploads/<?= $art['bannerArtikel']; ?>') center center / cover;
            ">
            <span><?= $art['judulArtikel']; ?></span>
            <span><?= $art['penulis']; ?></span>
            <div>
              <span><?= $art['kategoriArtikel']; ?></span>
              <span> . </span>
              <span><?= $art['dateUi']; ?></span>
            </div>
          </a>
        <?php endforeach; ?>

      </div>

    </div>

    <div class="wrapper">
      <div class="jumbotron ads">
        <h2>Iklan & lainnnya</h2>
        <hr>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

      </div>

    </div>

  </section>

</main>
