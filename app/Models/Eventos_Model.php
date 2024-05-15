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
}