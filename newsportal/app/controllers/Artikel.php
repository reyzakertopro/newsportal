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
    if($params[0]== 'post') {echo 'Post cuy<br>';}
    else {
      if($params[1]== 'update') {echo 'Update coy<br>';}
      elseif($params[1]== 'delete') {echo 'Delete nih bro<br>';}
      echo $params[0]. '<br>';
    } echo '<br>';
    $data['artikel']= $_POST;
    $data['file']= $_FILES['bannerArtikel'];
    foreach ($data['artikel'] as $key => $value) {
      echo '<b>'. $key. '</b> => '. $value. '<br>';

    } echo '<br>';
    foreach ($data['file'] as $key => $value) {
      echo '<b>'. $key. '</b> => '. $value. '<br>';

    }

  }

}
