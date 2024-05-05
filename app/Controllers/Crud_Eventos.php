<?php

namespace App\Controllers;

class Crud_Eventos extends BaseController
{
  public function __construct()
  {
  }

  function contMostrar_Eventos()
  {
    $data = ['titulo' => 'Eventos | CopyTickets 🎫'];
    /* TODO: obtener los eventos y pasarselos a la vista */
    return view('eventos/index', $data);
  }

  function contMostrar_Evento()
  {
    $data = ['titulo' => 'PXNDX en León | CopyTickets 🎫'];
    /* TODO: obtener el evento y pasarselo a la vista */
    return view('eventos/evento', $data);
  }

  function contGenerate_Eventos()
  {
    try {
      $data = array(
        "nombre" => $this->request->getPost("nombre"),
        "categoria" => $this->request->getPost("categoria"),
        "descripcion" => $this->request->getPost("descripcion"),
        "fecha" => $this->request->getPost("fecha"),
        "hora" => $this->request->getPost("hora"),
        "ubicacion" => $this->request->getPost("ubicacion"),
        "capacidad" => $this->request->getPost("capacidad"),
        "precio" => $this->request->getPost("precio"),
        "imagen" => $this->request->getFile("imagen")
      );
      $this->Eventos_Model->insertEvento($data);

    } catch (\Exception $e) {
      log_message('error', 'Error al procesar la solicitud: ' . $e->getMessage());
      return $this->response->setStatusCode(500)->setJSON(['error' => 'Ha ocurrido un error en el servidor.']);
    }
  }

  function contEdit_Eventos($id)
  {
    try {
      $data = array(
        "id" => $this->request->getPost("id"),
        "descripcion" => $this->request->getPost("descripcion"),
        "imagen" => $this->request->getFile("imagen")
      );
      $this->Eventos_Model->updateVentas($data, $id);

    } catch (\Exception $e) {
      log_message('error', 'Error al procesar la solicitud: ' . $e->getMessage());
      return $this->response->setStatusCode(500)->setJSON(['error' => 'Ha ocurrido un error en el servidor.']);
    }
  }


}