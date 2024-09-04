<?php

class Session {
  public function __construct() {
    if(!isset($_SESSION)) { session_start(); }

  }

  public function createUser($userData) {
    $_SESSION['pengguna']= $userData;

  }

  public function userAuth($userData) {
    if(!empty($userData)) {
      $this->createUser($userData);

    }

  }

  public function deleteUserSession() {
    unset($_SESSION['pengguna']);

  }

  public function setFlashMessage($key, $value) {
      // Store flash message in session
  }

  public function getFlashMessage($key) {
      // Retrieve flash message from session
  }

  public function clearFlashMessage($key) {
      // Clear flash message from session
  }

}
