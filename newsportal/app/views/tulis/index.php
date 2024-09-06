<link rel="stylesheet" href="<?= BASEURL; ?>/public/css/artikel.css">
<main>
  <form action="<?= BASEURL; ?>/artikel/validate/<?php if($data['artikelId']!= '') echo $data['artikelId']. '/'; ?>" method="post" class="jumbotron" style="position: relative;" enctype="multipart/form-data">
    <input type="text" name="kategoriArtikel" placeholder="Kategori artikel" value="<?= $data['kategoriArtikel']; ?>">
    <input type="text" name="judulArtikel" placeholder="Judul artikel" value="<?= $data['judulArtikel']; ?>">
    <input type="file" id="bannerArtikel" name="bannerArtikel">
    <input type="text" name="captionBanner" placeholder="Caption" value="<?= $data['captionBanner']; ?>">
    <input type="text" name="isiArtikel" placeholder="Isi artikel" value="<?= $data['isiArtikel']; ?>">
    <input type="text" name="penulis" placeholder="Penulis" value="<?= $data['penulis']; ?>">
    <input type="text" name="tagsArtikel" placeholder="Tags" value="<?= $data['tagsArtikel']; ?>">
    <input type="text" name="kontakPenulis" placeholder="Kontak penulis" value="<?= $data['kontakPenulis']; ?>">

    <?php if (isset($_SESSION['pengguna'])): ?>
      <label for="featured" class="featured">
        <input type="checkbox" id="featured" name="featured" value="true" trigger="<?= $data['featured']; ?>">
        <span class="slide"></span>
        <span>featured</span>
      </label>
    <?php endif; ?>

    <div>
      <span contenteditable id="kategoriArtikel" placeholder="Kategori"></span>
      <?php if ($data['dateTerbitArtikel']!= 'Tanggal terbit'): ?>
        <span>.</span>
        <span id="dateTerbitArtikel">
          <?php if($data['dateTerbitArtikel']== '') {
            echo 'Belum terbit';
          } else {
            echo date('j F, Y h:i', strtotime($data['dateTerbitArtikel']));
          }?>
        </span>
      <?php endif; ?>
    </div>
    <span contenteditable id="judulArtikel" placeholder="Judul artikel"><?= $data['judulArtikel']; ?></span>

    <div style="padding: .5em 0; position: relative;">
      <span class="hidden" id="clearBanner"><i class="fa-solid fa-xmark"></i></span>
      <label class="banner" for="bannerArtikel" style="
      background:
      linear-gradient(180deg, rgba(1, 1, 3, .05), rgba(1, 1, 3, .5)),
      url('<?= BASEURL; ?>/public/uploads/<?= $data['bannerArtikel']; ?>')
      center center / cover;">
      <span><i class="fa-solid fa-cloud-arrow-up"></i></span>
      <span>Klik untuk memilih banner</span>
      </label>
      <span class="caption hidden" contenteditable id="captionBanner" placeholder="Caption"></span>

    </div>
    <hr>
    <div style="display: flex; gap: .25em; align-items: center;">
      <span>Oleh: </span>
      <span contenteditable id="penulis" placeholder="Penulis"></span>
      <span>.</span>
      <span contenteditable id="kontakPenulis" placeholder="Kontak(wa/email dll.)"></span>
    </div>

    <div class="isiArtikel">
      <p contenteditable id="isiArtikel" placeholder="Isi artikel"></p>

    </div>
    <div>
      <span>Tags: </span>
      <span contenteditable id="tagsArtikel" placeholder="#tags"></span>

    </div>
    <div class="button-wrapper">
      <?php if($data['artikelId']== '') { ?>
        <button type="button" id="post">Kirim</button>
      <?php } else { ?>
        <button type="button" id="update">Simpan</button>
        <button type="button" id="delete">Hapus</button>
        <?php if($data['statusArtikel']!= 'terbit') { ?>
        <button type="button" id="update" name="statusArtikel" value="terbit">Simpan & terbitkan</button>
        <?php }} ?>

    </div>
    <dialog>
      <span>artikel?</span>
      <button type="submit">Lanjutkan</button>
      <button type="button" id="cls-modal">Batal</button>

    </dialog>

  </form>

</main>

<script src="<?= BASEURL; ?>/public/js/tulis.js"></script>
