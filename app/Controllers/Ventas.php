<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Ventas extends BaseController
{
  function index()
  {
    $data = ['titulo' => 'Historial de compras | CopyTickets 🎫'];
    /* TODO: obtener las compras del usuario y pasarselos a la vista */
    return view('ventas/index', $data);
  }

  function boleto($id)
  {
    $data = ['titulo' => 'Boleto | CopyTickets 🎫'];
    /* TODO: obtener los datos del boleto, venta, evento y usuario y pasarselos a la vista */
    return view('ventas/boleto', $data);
  }
}