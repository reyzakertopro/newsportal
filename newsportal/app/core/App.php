<?php

class App {
  protected $controller= 'Home';
  protected $method= 'index';
  protected $params= [];

  public function __construct() {
    $url= $this->parseURL();

    if( !empty($url[0]) ) {
      if( file_exists('app/controllers/'. $url[0]. '.php') ) {
        $this->controller= $url[0];
        unset($url[0]);

      }

    }

    require_once 'app/controllers/'. $this->controller. '.php';
    $this->controller= new $this->controller;

    if( !empty($url[1]) ) {
      if( method_exists($this->controller, $url[1]) ) {
        $this->method= $url[1];
        unset($url[1]);

      }

    }

    if( !empty($url) ) {
      $this->params= array_values($url);

    }

    call_user_func( [$this->controller, $this->method], $this->params);

  }

  public function parseURL() {
    if( !empty($_SERVER['PATH_INFO']) ) {
      $url= ltrim($_SERVER['PATH_INFO'], '/');
      $url= rtrim($url, '/');
      $url= filter_var($url, FILTER_SANITIZE_URL);
      $url= explode('/', $url);
      return $url;

    }

    $url= trim($_SERVER['REQUEST_URI'], '/');

  }

}
