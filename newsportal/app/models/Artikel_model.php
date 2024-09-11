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
    !isset($data['artikel']['statusArtikel'])?
      $data['artikel']['statusArtikel']= 'pending':
      false;
    !isset($data['artikel']['featured'])?
      $data['artikel']['featured']= 'false':
      false;
    $data['artikel']['dateArtikel']= date('Y-m-d H:i:s');
    $data['artikel']['bannerArtikel']=
      $data['artikel']['judulArtikel']. ' '.
      $data['artikel']['penulis']. ' '.
      date('Y-m-d H i s', strtotime($data['artikel']['dateArtikel'])). ' '.
      $data['artikel']['captionBanner']. '.'.
      pathinfo($data['file']['name'], PATHINFO_EXTENSION);

    $this->db->query('INSERT INTO '. $this->table. "(
      artikelId, kategoriArtikel, judulArtikel, isiArtikel, penulis,
      tagsArtikel, kontakPenulis, statusArtikel, featured, dateArtikel, bannerArtikel)
      VALUES (
      '0', :kategoriArtikel, :judulArtikel, :isiArtikel, :penulis,
      :tagsArtikel, :kontakPenulis, :statusArtikel, :featured, :dateArtikel, :bannerArtikel)");

    foreach($data['artikel'] as $a=> $b) {
      if($a== 'captionBanner') continue;
      $this->db->bind($a, $b);
    }

    $this->db->execute();
    Upload::uploadGambar($data['artikel']['bannerArtikel'], $data['file']);

  }

  public function updateArtikel( $data= [] ) {
    $this->db->query('SELECT bannerArtikel, dateArtikel FROM '. $this->table. ' WHERE artikelId=:id_artikel');
    $this->db->bind('id_artikel', $data['id']);
    $data['buffer']= $this->db->single();

    !empty($data['file']['name'])?
      $data['buffer']['extension']= pathinfo($data['file']['name'], PATHINFO_EXTENSION):
      $data['buffer']['extension']= pathinfo($data['buffer']['bannerArtikel'], PATHINFO_EXTENSION);

    !isset($data['artikel']['featured'])?
      $data['artikel']['featured']= 'false':
      false;

    isset($data['artikel']['statusArtikel'])?
      $data['artikel']['dateTerbitArtikel']= date('Y-m-d H:i:s'):
      false;

    $data['artikel']['bannerArtikel']=
      $data['artikel']['judulArtikel']. ' '.
      $data['artikel']['penulis']. ' '.
      date('Y-m-d h i s', strtotime($data['buffer']['dateArtikel'])). ' '.
      $data['artikel']['captionBanner']. '.'.
      $data['buffer']['extension'];

    foreach($data['artikel'] as $key => $value) {
      if($key== 'captionBanner') continue;
      $this->db->query('UPDATE '. $this->table. ' SET '. $key. '= :data WHERE artikelId=:id_artikel');
      $this->db->bind('data', $value);
      $this->db->bind('id_artikel', $data['id']);
      $this->db->execute();
    }

    rename('public/uploads/'. $data['buffer']['bannerArtikel'], 'public/uploads/'. $data['artikel']['bannerArtikel']);
    Upload::uploadGambar($data['artikel']['bannerArtikel'], $data['file']);

  }

  public function deleteArtikel( $data= [] ) {
    $this->db->query('SELECT bannerArtikel FROM '. $this->table. ' WHERE artikelId=:id_artikel');
    $this->db->bind('id_artikel', $data['id']);
    $targetFile= array_values($this->db->single())[0];
    $this->db->query('DELETE FROM '. $this->table. ' WHERE artikelId=:id_artikel');
    $this->db->bind('id_artikel', $data['id']);
    $this->db->execute();
    unlink('public/uploads/'. $targetFile);

  }

}
