<?php

namespace App\Controllers;

use App\Models\Boletos_Model;
use App\Models\Escaner_Model;
use App\Models\Venta_Model;
use CodeIgniter\HTTP\ResponseInterface;
use Exception;

class Escaner extends BaseController
{
  protected Escaner_Model $escaner;
  protected Boletos_Model $boleto;
  protected Venta_Model $venta;

  public function __construct()
  {
    $this->escaner = new Escaner_Model();
    $this->boleto = new Boletos_Model();
    $this->venta = new Venta_Model();
  }

  public function login(): ResponseInterface
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
    } catch (Exception $e) {
      return $this->getResponse([
        'message' => $e->getMessage(),
      ], $responCode);
    }
  }

  public function escanear($id): ResponseInterface
  {
    try {
      if (!$this->validateEscaner($id))
        return $this->getResponse([
          'message' => 'ERROR',
        ], ResponseInterface::HTTP_BAD_REQUEST);

      $ticket = $this->boleto->findBoletoByID($id);
      $venta = $this->venta->find($ticket['venta_id']);

      if ($ticket['usado'] == 0) {// Primera vez que se escanea, ok
        $this->boleto->marcarBoletoComoUsado($id);
        return $this->getResponse([
          'message' => 'ACEPTADO',
          'num_entradas' => $venta['cantidad']
        ]);
      } else // Ya fue escaneado, error
        return $this->getResponse([
          'message' => 'DUPLICADO',
        ], ResponseInterface::HTTP_BAD_REQUEST);
    } catch (Exception $e) {
      log_message('error', 'Error al procesar la solicitud' . $e->getMessage());
      return $this->getResponse([
        'message' => 'ERROR',
      ], ResponseInterface::HTTP_INTERNAL_SERVER_ERROR);
    }
  }

  /**
   * Valida si el escaner que está haciendo la petición de escaneo pertenece
   * al evento del boleto.
   * @param string $boletoID ID del boleto a escanear
   * @return bool
   * @throws Exception
   */
  public function validateEscaner(string $boletoID): bool
  {
    helper('jwt');
    $authenticationHeader = $this->request->getServer('HTTP_AUTHORIZATION');
    $token = getJWTFromRequest($authenticationHeader);
    $decodedToken = getDecodedJWT($token);
    $escanerID = $decodedToken->id;

    $escaner = $this->escaner->findEscanerByID($escanerID);
    $boleto = $this->boleto->findBoletoByID($boletoID);
    return $escaner['evento_id'] == $boleto['evento_id'];
  }
}
