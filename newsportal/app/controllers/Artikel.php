<?php

class Artikel extends Controller {
  public function index($params) {
    $data['artikel']= $this->model('Artikel_model')->getArtikelById($params[0]);
    if(empty($data['artikel']['artikelId'])) header('Location: '. BASEURL);
    $data['judul']= $data['artikel']['judulArtikel']. ' - '. TITLE;

    $this->view('templates/header', $data['judul']);
    $this->view('templates/navbar');
    $this->view('artikel/index', $data['artikel']);
    $this->view('templates/footer');

  }

  public function validate($params) {
    echo __CLASS__. '/'. __FUNCTION__. '<br>';
    foreach ($_POST as $key => $value) {
      echo '<b>'. $key. '</b> => '. $value. '<br>';

    } echo '<br>';
    foreach ($_FILES['bannerArtikel'] as $key => $value) {
      echo '<b>'. $key. '</b> => '. $value. '<br>';

    }

  }

}
