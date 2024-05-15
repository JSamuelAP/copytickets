<?php

namespace App\Controllers;

use App\Models\Usuario_Model;
use App\Models\Eventos_Model;
use App\Models\Escaner_Model;
use Exception;


class Crud_Eventos extends BaseController
{
  protected Eventos_Model $eventos_model;
  protected Usuario_Model $organizador_model;
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
      $data = ['titulo' => 'Eventos | CopyTickets 🎫',
        'eventos_model' => $this->eventos_model->findAll()];
      return view('eventos/index', $data);
    } catch (Exception $e) {
      log_message('error', 'Error al procesar la solicitud' . $e->getMessage());
      return $this->response->setStatusCode(500)->setJSON([
        'error' => $e->getMessage()
      ]);
    }
  }

  function contMostrar_Evento($id)
  {
    try {
      $data = ['titulo' => 'PXNDX en León | CopyTickets 🎫',
        'cartelera' => $this->eventos_model->find($id),
        'organizador' => $this->organizador_model->findAll()];
      return view('eventos/evento', $data);
    } catch (Exception $e) {
      log_message('error', 'Error al procesar la solicitud' . $e->getMessage());
      return $this->response->setStatusCode(500)->setJSON([
        'error' => $e->getMessage()
      ]);
    }
  }

  function contMostrar_Crear()
  {
    try {
      if (isset($_SESSION['datos']['rol']) && $_SESSION['datos']['rol'] == 2) {
        $data = [
          'titulo' => 'Crear evento | CopyTickets 🎫',
          'organizador' =>
            $this->organizador_model->find($_SESSION['datos']['id'])
        ];
        return view('eventos/crear', $data);
      } else {
        return redirect()->to('public');
      }
    } catch (Exception $e) {
      log_message('error', 'Error al procesar la solicitud' . $e->getMessage());
      return $this->response->setStatusCode(500)->setJSON([
        'error' => $e->getMessage()
      ]);
    }
  }

  function contMostrar_Editar($id)
  {
    try {
      if (isset($_SESSION['datos']['rol']) && $_SESSION['datos']['rol'] == 2) {
        // TODO: Traer información del evento por $id
        // TODO: validar que el organizador actual es dueño del evento
        $data = ['titulo' => 'Editar evento (nombre del evento) | CopyTickets 🎫'];
        return view('eventos/editar', $data);
      } else {
        return redirect()->to('public');
      }
    } catch (Exception $e) {
      log_message('error', 'Error al procesar la solicitud' . $e->getMessage());
      return $this->response->setStatusCode(500)->setJSON([
        'error' => $e->getMessage()
      ]);
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

      $rutaImagen = $this->SubirImagen();

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
      $evento_id = $this->eventos_model->insert($data);

      if ($evento_id) {
        $data2 = ["usuario" => $this->request->getPost('usuario_escaner'),
          "password" => $this->request->getPost('password_escaner'),
          'evento_id' => $evento_id];
      }
      $this->escaner_model->insert($data2);
      return $this->response->setStatusCode(201)->setJSON([
        'message' => 'Evento creado satisfactoriamente'
      ]);
    } catch (Exception $e) {
      log_message('error', 'Error al procesar la solicitud: ' . $e->getMessage());
      return $this->response->setStatusCode(500)->setJSON([
        'error' => 'Ha ocurrido un error en el servidor.'
      ]);
    }
  }

  function subirImagen()
  {
    $img = $this->request->getFile('imagen');
    $rutaImagen = '';

    if ($img->isValid() && !$img->hasMoved()) {
      $ruta = ROOTPATH . 'public/images';
      $nombreImagen = uniqid() . '.' . $img->getClientExtension();
      $img->move($ruta, $nombreImagen);
      $rutaImagen = 'public/images/' . $nombreImagen;
    } else {
      throw new \Exception($img->getErrorString());
    }

    return $rutaImagen;
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
      return $this->response->setStatusCode(200)->setJSON([
        'message' => 'Evento editado satisfactoriamente'
      ]);
    } catch (Exception $e) {
      log_message('error', 'Error al procesar la solicitud: ' . $e->getMessage());
      return $this->response->setStatusCode(500)->setJSON([
        'error' => 'Ha ocurrido un error en el servidor.'
      ]);
    }
  }
}
