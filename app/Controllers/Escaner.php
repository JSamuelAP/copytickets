<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Escaner_Model;
use CodeIgniter\HTTP\ResponseInterface;

class Escaner extends BaseController
{
  protected $escaner;

  public function __construct()
  {
    $this->escaner = new Escaner_Model();
  }

  public function login()
  {
    $rules = [
      'username' => 'required|min_length[1]|max_length[255]',
      'password' => 'required|min_length[1]|max_length[255]|validateEscaner[username, password]'
    ];
    $errors = [
      'password' => [
        'validateUser' => 'Usuario o contraseña incorrectos'
      ]
    ];

    $input = $this->getRequestInput($this->request);
    if (!$this->validateRequest($input, $rules, $errors))
      return $this->getResponse(
        [
          'message' => $errors['password']['validateUser']
        ],
        ResponseInterface::HTTP_BAD_REQUEST
      );

    $escaner = $this->escaner->login($input['username'], $input['password']);
    return $this->getJWTForEscaner($escaner['id']);
  }

  private function getJWTForEscaner(
    string $id,
    int    $responCode = ResponseInterface::HTTP_OK
  ): ResponseInterface
  {
    try {
      $escaner = $this->escaner->findEscanerByID($id);
      unset($escaner['password']);
      helper('jwt');
      return $this->getResponse([
        'message' => 'Escaner autenticado satisfactoriamente',
        'escaner' => $escaner,
        'access_token' => getSignedJWTForUser($id)
      ]);
    } catch (\Exception $e) {
      return $this->getResponse([
        'message' => $e->getMessage(),
      ], $responCode);
    }
  }
}