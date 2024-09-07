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
    $data['artikel']= $_POST;
    $data['file']= $_FILES['bannerArtikel'];

    if($params[0]== 'post') {
      $data['id']= '';
      $action= $params[0]. 'Artikel';
    } else {
      $data['id']= $params[0];
      $action= $params[1]. 'Artikel';
    }

    $this->model('Artikel_model')->$action($data);
    header('Location: '. BASEURL);

  }

}
