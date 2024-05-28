<?php

namespace App\Models;

use CodeIgniter\Model;

class Boletos_Model extends Model
{

  protected $table = 'boletos';
  protected $primaryKey = 'id';
  protected $returnType = 'array';
  protected $allowedFields = ['id','venta_id', 'evento_id', 'usuario_id', 'usado', 'qr_img_url', 'pdf_url'];
  protected bool $allowEmptyInserts = false;
  protected $useAutoIncrement = false;


  function findBoletoByID(string $id)
  {
    $boleto = $this->where('id', $id)->first();

    if (!$boleto)
      return throw new \Exception('No se encontró el boleto con tal id');

    return $boleto;
  }

  function marcarBoletoComoUsado(string $id): void
  {
    $this->update($id, ['usado' => 1]);
  }
}