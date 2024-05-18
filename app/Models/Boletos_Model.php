<?php

namespace App\Models;

use CodeIgniter\Model;

class Boletos_Model extends Model{

    protected $table = 'boletos';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = ['id' ,'venta_id','evento_id', 'usuario_id', 'usado', 'qr_img_url', 'pdf_url'];
    protected bool $allowEmptyInserts = false; 

}