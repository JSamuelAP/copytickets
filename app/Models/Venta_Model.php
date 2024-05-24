<?php

namespace App\Models;

use CodeIgniter\Model;

class Venta_Model extends Model
{
  protected $table = 'ventas';
  protected $primaryKey = 'id';
  protected $returnType = 'array';
  protected $allowedFields = ['evento_id', 'usuario_id', 'cantidad', 'precio', 'total', 'fecha', 'hora'];
  protected bool $allowEmptyInserts = false;

  function consultarUsuarioID($id)
  {
    $consulta = $this->where('usuario_id', $id)
      ->findAll();
    return $consulta;
  }

  function totalEntradas($id)
  {
    $consulta = $this->select('SUM(ventas.cantidad) as total_cantidad')
      ->join('eventos', 'eventos.id = ventas.evento_id')
      ->where('eventos.id', $id)
      ->get()
      ->getRowArray();
    return $consulta['total_cantidad'];
  }
}