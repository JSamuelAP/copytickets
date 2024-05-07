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
}
