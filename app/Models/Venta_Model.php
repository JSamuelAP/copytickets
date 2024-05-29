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

  function consultarUsuarioID($id): array
  {
    return $this->where('usuario_id', $id)
      ->findAll();
  }

  function totalEntradas($id): int
  {
    $consulta = $this->select('SUM(ventas.cantidad) as total_cantidad')
      ->select('ventas.*')
      ->join('eventos', 'eventos.id = ventas.evento_id')
      ->where('eventos.id', $id)
      ->get()
      ->getRowArray();

    return $consulta ? $consulta['total_cantidad'] ?? 0 : 0;
  }

  function entradasRestantes($id)
  {
    $evento = $this->db->table('eventos')
      ->select('capacidad')
      ->where('id', $id)
      ->get()
      ->getRowArray();

    $capacidad = $evento['capacidad'] ?? 0;
    $totalVendidas = $this->totalEntradas($id);
    $restantes = $capacidad - $totalVendidas;
    if ($restantes < 0) {
      $restantes = 0;
    }
    return $restantes;
  }

  function porcentajeVentas($id): float|int
  {
    $totalVendidas = $this->totalEntradas($id);
    $evento = $this->db->table('eventos')
      ->select('capacidad')
      ->where('id', $id)
      ->get()
      ->getRowArray();

    $capacidad = $evento['capacidad'] ?? 0;
    if ($capacidad == 0) {
      return 0;
    }
    $porcentaje = ($totalVendidas * 100) / $capacidad;

    return $porcentaje;
  }

  public function Ganancias($id): float
  {
    $evento = $this->db->table('eventos')
      ->select('precio')
      ->where('id', $id)
      ->get()
      ->getRowArray();
    $precio = isset($evento['precio']) ? (float)$evento['precio'] : 0.0;
    $totalVendidas = $this->totalEntradas($id);
    $ganancias = $precio * $totalVendidas;
    return $ganancias;
  }
}