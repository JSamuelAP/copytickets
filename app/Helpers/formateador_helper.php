<?php

/**
 * Formatear fecha y hora para la página de un evento individual.
 * Ejemplo de salida: jueves 13 junio 2024, 17:20
 * @param string $fecha
 * @param string $hora
 * @return false|string Fecha y hora formateada
 */
function fechaHoraLarga(string $fecha, string $hora): false|string
{
  $fmt = datefmt_create(
    'es_ES',
    IntlDateFormatter::FULL,
    IntlDateFormatter::FULL,
    date_default_timezone_get(),
    IntlDateFormatter::GREGORIAN,
    'EEEE d MMMM YYYY, HH:mm'
  );
  return datefmt_format($fmt, strtotime($fecha . ' ' . $hora));
}

/**
 * Formatear fecha y hora para el momento en que se compró un boleto(s).
 * Ejemplo de salida: 13 junio 2024, 17:20:00
 * @param string $fecha
 * @param string $hora
 * @return false|string Fecha y hora formateada
 */
function fechaHoraCorta(string $fecha, string $hora): false|string
{
  $fmt = datefmt_create(
    'es_ES',
    IntlDateFormatter::FULL,
    IntlDateFormatter::FULL,
    date_default_timezone_get(),
    IntlDateFormatter::GREGORIAN,
    'd MMMM YYYY, HH:mm'
  );
  return datefmt_format($fmt, strtotime($fecha . ' ' . $hora));
}

/**
 * Formatea fecha para  la card de un evento.
 * Ejemplo de salida: 30 SEP
 * @param string $fecha
 * @return string Fecha formateada
 */
function fechaCorta(string $fecha): string
{
  $timestamp = strtotime($fecha);
  return date('d', $timestamp) . '<br/>' . strtoupper(date('M', $timestamp));
}
