<?php

use Config\Services;
use Firebase\JWT\JWT;
use App\Models\Escaner_Model;

function getJWTFromRequest($authenticationHeader): string
{
  if (is_null($authenticationHeader))
    throw new Exception('JWT invalido o no incluido en la solicitud.');

  return explode(' ', $authenticationHeader)[1];
}

function validateJWTFromRequest(string $encodedToken)
{
  $key = Services::getSecretKey();
  $decodedToken = JWT::decode($encodedToken, $key);
  $escanerModel = new Escaner_Model();
  $escanerModel->findEscanerByID($decodedToken->id);
}

function getSignedJWTForUser(string $id): string
{
  $issuedAtTime = time();
  $tokenTimeToLive = getenv('JWT_TIME_TO_LIVE');
  $tokenExpiration = $issuedAtTime + $tokenTimeToLive;
  $payload = [
    'id' => $id,
    'iat' => $issuedAtTime,
    'exp' => $tokenExpiration
  ];

  return JWT::encode($payload, Services::getSecretKey(), 'HS256');
}