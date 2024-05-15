<?php

namespace App\Validation;

use App\Models\Escaner_Model;

class EscanerRules
{
  public function validateEscaner(string $st, string $fields, array $data): bool
  {
    try {
      $model = new Escaner_Model();
      $escaner = $model->login($data['username'], $data['password']);
      return !is_null($escaner);
    } catch (\Exception $e) {
      return false;
    }
  }
}
