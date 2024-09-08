<link rel="stylesheet" href="<?= BASEURL; ?>/public/css/artikel.css">
<main>
  <div class="jumbotron">
    <div>
      <span id="kategoriArtikel"><?= $data['kategoriArtikel']; ?></span>
      <span>.</span>
      <span id="dateTerbitArtikel">
        <?php if($data['dateTerbitArtikel']== '') {
          echo 'Belum terbit';
        } else {
          echo date('j F, Y H:i', strtotime($data['dateTerbitArtikel']));
        }?>
      </span>
    </div>
    <span id="judulArtikel"><?= $data['judulArtikel']; ?></span>

    <div style="padding: .5em 0;">
      <div class="banner" style="
      background:
      linear-gradient(180deg, rgba(1, 1, 3, .05), rgba(1, 1, 3, .5)),
      url('<?= BASEURL; ?>/public/uploads/<?= $data['bannerArtikel']; ?>')
      center center / cover;"></div>
      <span class="caption"><?= $data['captionBanner']; ?></span>

    </div>
    <hr>
    <div style="display: flex; gap: .25em; align-items: center;">
      <span id="penulis">Oleh: <?= $data['penulis']; ?></span>
    </div>

    <div class="isiArtikel">
      <p><?= $data['isiArtikel']; ?></p>

    </div>
    <span>Tags: <?= $data['tagsArtikel']; ?></span>
    <?php if (!empty($_SESSION['pengguna'])): ?>
      <div class="button-wrapper">
        <a href="<?= BASEURL; ?>/tulis/<?= $data['artikelId']; ?>">Sunting</a>

      </div>
    <?php endif; ?>

  </div>

</main>
