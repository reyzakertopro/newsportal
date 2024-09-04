<?php

class Tulis extends Controller {
  public function index($params= []) {
    $data['judul']= 'Tulis artikel - '. TITLE;

    if(!empty($_SESSION['pengguna'])&& !empty($params[0]))
    {$id= $params[0];}
    else {$id= '';}

    $data['artikel']= $this->model('Artikel_model')->getArtikelById($id);

    $this->view('templates/header', $data['judul']);
    $this->view('templates/navbar');
    $this->view('tulis/index', $data['artikel']);
    $this->view('templates/footer');

  }

}
