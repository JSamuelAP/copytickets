<?php

namespace App\Controllers;

class Home extends BaseController
{
  public function index(): string
  {
    $data = ['titulo' => 'CopyTickets 🎫'];
    return view('home', $data);
  }
}
