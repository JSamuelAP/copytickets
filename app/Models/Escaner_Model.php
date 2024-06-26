<?php

namespace App\Models;

use CodeIgniter\Model;

class Escaner_Model extends Model
{
  protected $table = 'escaners';
  protected $primaryKey = 'id';
  protected $returnType = 'array';
  protected $allowedFields = ['evento_id', 'usuario', "password"];
  protected bool $allowEmptyInserts = false;

  function login($usuario, $password)
  {
    return $this->where('usuario', $usuario)
      ->where('password', $password)
      ->first();
  }

  function findEscanerByID(string $id)
  {
    $escaner = $this->where('id', $id)->first();

    if (!$escaner) return throw new \Exception('No se encontró el escaner con tal id');

    return $escaner;
  }

  function mostrarUsuario($id)
  {
    return $this->where("evento_id", $id)
      ->first();
  }
}