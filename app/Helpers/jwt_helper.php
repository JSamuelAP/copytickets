<?php

use Config\Services;
use Firebase\JWT\JWT;
use App\Models\Escaner_Model;
use Firebase\JWT\Key;

function getJWTFromRequest($authenticationHeader): string
{
  if (is_null($authenticationHeader))
    throw new Exception('JWT invalido o no incluido en la solicitud.');

  return explode(' ', $authenticationHeader)[1];
}

function validateJWTFromRequest(string $encodedToken)
{
  $key = Services::getSecretKey();
  $decodedToken = JWT::decode($encodedToken, new Key($key, 'HS256'));
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

function getDecodedJWT(string $encodedToken): stdClass
{
  $key = Services::getSecretKey();
  return JWT::decode($encodedToken, new Key($key, 'HS256'));
}