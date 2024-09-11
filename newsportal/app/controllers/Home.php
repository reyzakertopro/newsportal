<?php

class Home extends Controller{
  public function index($id= []) {
    $data['judul']= 'Home - '. TITLE;
    $data['artikel']= $this->model('Artikel_model')->getAllArtikel();
    $data['pengguna']= '';

    function tanggal($param) {
      $a= date_diff(
        date_create($param),
        date_create(date('Y-m-d H:i:s'))
      );
      switch (true) {
        case $a->y > 0:
            $a = $a->y . ' tahun lalu';
            break;
        case $a->m > 0:
            $a = $a->m . ' bulan lalu';
            break;
        case $a->days > 0:
            $a = $a->days . ' hari lalu';
            break;
        case $a->h > 0:
            $a = $a->h . ' jam lalu';
            break;
        case $a->i > 0:
            $a = $a->i . ' menit lalu';
            break;
        default:
            $a = 'baru saja';
      }

      return $a;

    }

    foreach($data['artikel'] as $key => $value) {
      if(!empty($data['artikel'][$key]['dateTerbitArtikel'])) {
        $data['artikel'][$key]['date']= tanggal($data['artikel'][$key]['dateTerbitArtikel']);

      } else {
        $data['artikel'][$key]['date']= 'Belum terbit';

      }

    }

    $this->view('templates/header', $data['judul']);
    $this->view('templates/navbar');
    $this->view('home/index', $data['artikel']);
    $this->view('templates/footer');

  }

}
