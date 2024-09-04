<?php

class Artikel_model {
  private $table= 'artikel';
  private $db;

  public function __construct() {
    $this->db= new Database;

  }

  public function getAllArtikel() {
    $this->db->query('SELECT * FROM '. $this->table);
    return $this->db->resultSet();

  }

  public function getArtikelById($id_artikel) {
    $this->db->query('SELECT * FROM '. $this->table. ' WHERE artikelId=:id_artikel');
    $this->db->bind('id_artikel', $id_artikel);
    $data= $this->db->single();

    if($data) {
      $data['captionBanner']=
        str_replace(
          $data['judulArtikel']. ' '.
          $data['penulis']. ' '.
          date('Y-m-d h i s', strtotime($data['dateArtikel'])). ' '
          , '', $data['bannerArtikel']);
      $data['captionBanner']= pathinfo($data['captionBanner'], PATHINFO_FILENAME);

    } else {
      $data= [];
      $data['artikelId']= '';
      $data['kategoriArtikel']= '';
      $data['dateTerbitArtikel']= 'Tanggal terbit';
      $data['judulArtikel']= '';
      $data['bannerArtikel']= '';
      $data['captionBanner']= '';
      $data['isiArtikel']= '';
      $data['penulis']= '';
      $data['featured']= 'false';
      $data['tagsArtikel']= '';
      $data['kontakPenulis']= '';

    }

    return $data;

  }

  public function postArtikel( $data= [] ) {
    if( !isset($data['statusArtikel']) ) { $data['statusArtikel']= 'pending'; }
    if( !isset($data['featured']) ) { $data['featured']= false; }

    $this->db->query('INSERT INTO '. $this->table. " VALUES ('0', :judulArtikel, :penulis, :isiArtikel, :statusArtikel, :bannerArtikel, :dateArtikel, :kategoriArtikel, :tagsArtikel, :kontakPenulis, '', :featured)");

    $this->db->bind('judulArtikel', $data['judulArtikel']);
    $this->db->bind('penulis', $data['penulis']);
    $this->db->bind('isiArtikel', $data['isiArtikel']);
    $this->db->bind('statusArtikel', $data['statusArtikel']);
    $this->db->bind('bannerArtikel', $data['bannerArtikel']);
    $this->db->bind('dateArtikel', $data['dateArtikel']);
    $this->db->bind('kategoriArtikel', $data['kategoriArtikel']);
    $this->db->bind('tagsArtikel', $data['tagsArtikel']);
    $this->db->bind('kontakPenulis', $data['kontakPenulis']);
    $this->db->bind('featured', $data['featured']);

    $this->db->execute();
    return true;

  }

  public function updateArtikel( $data= [] ) {
    var_dump($data);

  }

  public function deleteArtikel( $data= [] ) {
    var_dump($data);

  }

}
