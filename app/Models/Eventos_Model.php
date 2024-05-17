<?php

namespace App\Models;

use CodeIgniter\Model;

class Eventos_Model extends Model
{
  protected $table = 'eventos';
  protected $primaryKey = 'id';
  protected $returnType = 'array';
  protected $allowedFields = ['id', 'organizador_id', "nombre", "categoria", "descripcion", "precio", "fecha", "hora", "ubicacion", "capacidad", "imagen"];
  protected bool $allowEmptyInserts = false;

  function consultarEventos($id)
  {
    $consulta = $this->where('organizador_id', $id)
      ->findAll();
    return $consulta;
  }

  //Hace un Inner join hacia varios eventos que el usuario compro
  function joinEventos($id){
    $consulta = $this->select('eventos.id ,eventos.nombre, eventos.categoria, eventos.descripcion, eventos.ubicacion, eventos.capacidad, eventos.imagen, ventas.cantidad, ventas.total, ventas.fecha, ventas.hora')
                      ->join('ventas', 'ventas.evento_id = eventos.id')
                      ->where('ventas.usuario_id', $id)
                      ->findAll();
    return $consulta;
}

//Hace un inner join hacia un evento en especifico del usuario
function joinEvento($id){
  $consulta = $this->select('eventos.id ,eventos.nombre, eventos.categoria, eventos.descripcion, eventos.ubicacion, eventos.capacidad, eventos.imagen, ventas.cantidad, ventas.total, ventas.fecha, ventas.hora, boletos.qr_img_url')
                    ->join('ventas', 'ventas.evento_id = eventos.id')
                    ->join('boletos', 'boletos.venta_id = ventas.id')
                    ->where('ventas.evento_id', $id)
                    ->first();
  return $consulta;
}

}