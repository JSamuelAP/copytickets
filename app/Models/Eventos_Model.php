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
    $consulta = $this->select('eventos.*, ventas.*')
                      ->join('ventas', 'ventas.evento_id = eventos.id')
                      ->where('ventas.usuario_id', $id)
                      ->findAll();
    return $consulta;
}

//Hace un inner join hacia un evento en especifico del usuario
function joinEvento($id){
  $consulta = $this->select('eventos.* , ventas.* , boletos.* ')
                    ->join('ventas', 'ventas.evento_id = eventos.id')
                    ->join('boletos', 'boletos.venta_id = ventas.id')
                    ->where('ventas.id', $id)
                    ->first();
  return $consulta;
}

function Categorias(){
  $consulta = $this->select('categoria')
  ->find();
  return $consulta;
}
}