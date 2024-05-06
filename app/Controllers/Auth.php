<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Auth extends BaseController
{
  public function login()
  {
    $data = ['titulo' => 'Login | CopyTickets 🎫'];
    return view('auth/login', $data);
  }

  public function signup()
  {
    $data = ['titulo' => 'Signup | CopyTickets 🎫'];
    return view('auth/signup', $data);
  }

  public function pruebalogin()
  {
    session_start();
    if (isset($_SESSION['email'])) {
      echo $_SESSION;
    } else {
      echo "No hay usuario logeado";
    }
  }
}
