<?php

class Home extends Controller{
  public function index($id= []) {
    $data['judul']= 'Home - '. TITLE;
    $data['artikel']= $this->model('Artikel_model')->getAllArtikel();

    $this->view('templates/header', $data['judul']);
    $this->view('templates/navbar');
    $this->view('home/index', $data['artikel']);
    $this->view('templates/footer');

  }

}
