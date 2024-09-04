<?php

 class Login extends Controller {
   public function index($params= []) {
     $data['judul']= 'Login - '. TITLE;

     if(isset($_SESSION['pengguna'])) : header('Location: '. BASEURL); endif;

     $this->view('templates/header', $data['judul']);
     $this->view('login/index');

   }

   public function auth($params= []) {
     if($params[0]== 'login') {
       $data['pengguna']= $this->model('User_model')->getPenggunaByIdSandi($_POST);
       if(!empty($data['pengguna'])) {
         $this->session->userAuth($data['pengguna']);
         header('Location: '. BASEURL);

       } else {
         header('Location: '. BASEURL. '/login');

       }

     } elseif($params[0]== 'logout') {
       $this->session->deleteUserSession();
       header('Location: '. $_SERVER['HTTP_REFERER']);

     }

   }

 }
