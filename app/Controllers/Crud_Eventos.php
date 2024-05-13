<?php

namespace App\Controllers;

use App\Models\Usuario_Model;
use App\Models\Eventos_Model;


class Crud_Eventos extends BaseController
{
  protected $eventos_model;
  protected $organizador_model;

  public function __construct()
  {
    $this->eventos_model = new Eventos_Model();
    $this->organizador_model = new Usuario_Model();
  }

  function contMostrar_Eventos()
  {
    try {
      if (isset($_SESSION)) {
        $data = ['titulo' => 'Eventos | CopyTickets 🎫',
          'eventos_model' => $this->eventos_model->findAll()];
        /* TODO: obtener los eventos y pasarselos a la vista */
        return view('eventos/index', $data);
        return $this->response->setJSON(['success' => true]);
      }
    } catch (\Exception $e) {
      log_message('error', 'Error al procesar la solicitud' . $e->getMessage());
      return $this->response->setStatusCode(500)->setJSON(['error' => $e->getMessage()]);
    }
  }

  function contMostrar_Evento($id)
  {
    try {
      if (isset($_SESSION)) {
        $data = ['titulo' => 'PXNDX en León | CopyTickets 🎫',
          'cartelera' => $this->eventos_model->find($id),
          'organizador' => $this->organizador_model->findAll()];
        /* TODO: obtener el evento y pasarselo a la vista */
        return view('eventos/evento', $data);
        return $this->response->setJSON(['success' => true]);
      }
    } catch (\Exception $e) {
      log_message('error', 'Error al procesar la solicitud' . $e->getMessage());
      return $this->response->setStatusCode(500)->setJSON(['error' => $e->getMessage()]);
    }
  }

  function contMostrar_Crear()
  {
    try{
      if(isset($_SESSION['datos']['rol']) && $_SESSION['datos']['rol'] == 2){
        $data = ['titulo' => 'Crear evento | CopyTickets 🎫'];
        return view('eventos/crear', $data);
      }else{
        return redirect()->to('public');
      }
    }catch(\Exception $e){
      log_message('error', 'Error al procesar la solicitud' . $e->getMessage());
      return $this->response->setStatusCode(500)->setJSON(['error' => $e->getMessage()]);
    }
  }

  function contMostrar_estadisticas()
  {
    $data = ['titulo' => 'Estadísticas de PXNDX En León | CopyTickets 🎫'];
    return view('eventos/estadisticas', $data);
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
      $this->eventos_model->insertEvento($data);
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
      $this->eventos_model->update($data, $id);
    } catch (\Exception $e) {
      log_message('error', 'Error al procesar la solicitud: ' . $e->getMessage());
      return $this->response->setStatusCode(500)->setJSON(['error' => 'Ha ocurrido un error en el servidor.']);
    }
  }
}
