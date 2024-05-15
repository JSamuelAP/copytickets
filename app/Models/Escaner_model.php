<?php

namespace App\Models;

use CodeIgniter\Model;

class Escaner_Model extends Model
{
  protected $table = 'escaners';
  protected $primaryKey = 'id';
  protected $returnType = 'array';
  protected $allowedFields = ['id', 'evento_id', "usuario", "password"];
  protected bool $allowEmptyInserts = false;
}
