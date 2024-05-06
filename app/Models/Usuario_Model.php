<?php

namespace App\Models;

use CodeIgniter\Model;

class Usuario_Model extends Model
{

    protected $table      = 'usuarios';

    protected $primaryKey = 'id';

    protected $returnType     = 'array';

    protected $allowedFields = ['nombre', 'email', "password", "telefono", "ubicacion", "rol", "descripcion"];

    protected bool $allowEmptyInserts = false;

    function Login($email, $password){
        $usuario = $this->where('email', $email)
                        ->where('password', $password)
                        ->first();
        return $usuario;
    }
}
