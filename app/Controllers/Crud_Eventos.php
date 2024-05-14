<?php

namespace App\Controllers;

use App\Models\Usuario_Model;
use App\Models\Eventos_Model;
use App\Controllers\File;
use App\Models\Escaner_Model;

class Crud_Eventos extends BaseController
{
  protected $eventos_model;
  protected $organizador_model;
  protected $escaner_model;

  public function __construct()
  {
    $this->eventos_model = new Eventos_Model();
    $this->organizador_model = new Usuario_Model();
    $this->escaner_model = new Escaner_Model();
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

  function contMostrar_Crear($id)
  {
    try{
      if(isset($_SESSION['datos']['rol']) && $_SESSION['datos']['rol'] == 2){
        $data = ['titulo' => 'Crear evento | CopyTickets 🎫',
                'organizador' => $this->organizador_model->find($id)];
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
          $img = $this->request->getFile('imagen');
          $rutaImagen = '';
  
          if ($img->isValid() && !$img->hasMoved()) {
              $ruta = ROOTPATH . 'public/images';
              $img->move($ruta);
  
              $rutaImagen = 'public/images/' . $img->getName();
          } else {
              echo $img->getErrorString();
          }
  
          $data = [
              "nombre" => $this->request->getPost("nombre"),
              "categoria" => $this->request->getPost("categoria"),
              "descripcion" => $this->request->getPost("descripcion"),
              "fecha" => $this->request->getPost("fecha"),
              "hora" => $this->request->getPost("hora"),
              "ubicacion" => $this->request->getPost("ubicacion"),
              "capacidad" => $this->request->getPost("capacidad"),
              "precio" => $this->request->getPost("precio"),
              "imagen" => $rutaImagen, // Guardar la ruta de la imagen en la base de datos
              "organizador_id" => $this->request->getPost('organizador_id')
          ];
  
          $this->eventos_model->insert($data);
      } catch (\Exception $e) {
          log_message('error', 'Error al procesar la solicitud: ' . $e->getMessage());
          return $this->response->setStatusCode(500)->setJSON(['error' => $e->getMessage()]);
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