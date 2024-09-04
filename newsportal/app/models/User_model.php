<?php

class User_model {
  private $table= 'pengguna';
  private $db;

  public function __construct() {
    $this->db= new Database;

  }

  public function getAllPengguna() {
    $this->db->query('SELECT * FROM '. $this->table);
    return $this->db->resultSet();

  }

  public function getPenggunaByIdSandi($params= []) {
    $this->db->query('SELECT * FROM '. $this->table. ' WHERE id_pengguna=:id_pengguna AND sandi=:sandi');
    $this->db->bind('id_pengguna', $params['username']);
    $this->db->bind('sandi', $params['password']);
    return $this->db->single();

  }

}
