<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Auth extends BaseController
{
  public function login() {
    $data = ['titulo' => 'Login | CopyTickets 🎫'];
    return view('auth/login', $data);
  }
}