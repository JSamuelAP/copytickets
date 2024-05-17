<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Boletos_Model;
use App\Models\Eventos_Model;
use App\Models\Usuario_Model;
use App\Models\Venta_Model;
use Exception;

class Ventas extends BaseController
{
  protected $usuario;
  protected $ventas;
  protected $eventos;
  protected $boletos;

  public function __construct()
  {
    $this->ventas = new Venta_Model();
    $this->usuario = new Usuario_Model();
    $this->eventos = new Eventos_Model();
    $this->boletos = new Boletos_Model();
  }

  function index($id)
  {
    try{
      if(isset($_SESSION['datos']['rol']) && $_SESSION['datos']['rol'] == 1){
        $data = ['titulo' => 'Historial de compras | CopyTickets 🎫',
        'usuario' => $this->usuario->find($id),
        'ventaBoletos' => $this->ventas->consultarUsuarioID($id),
        'cartel' => $this->eventos->joinEventos($_SESSION['datos']['id'])];
        return view('ventas/index', $data);
        return $this->response->setStatusCode(201)->setJSON([
          'message' => 'Se inserto satisfactoriamente'
        ]);
      }
    }catch(\Exception $e){
      log_message('error', 'Error al procesar la solicitud' . $e->getMessage());
      return $this->response->setStatusCode(500)->setJSON([
        'error' => $e->getMessage()
      ]);
    }

  }

  function boleto($id)
  {
    try{
      if(isset($_SESSION['datos']['rol']) && $_SESSION['datos']['rol'] == 1){
        $data = ['titulo' => 'Boleto | CopyTickets 🎫',
                  'cartel' => $this->eventos->joinEvento($id)];
        return view('ventas/boleto', $data);
      }
    }catch(\Exception $e){
      log_message('error', 'Error al procesar la solicitud' . $e->getMessage());
      return $this->response->setStatusCode(500)->setJSON([
        'error' => $e->getMessage()
      ]);
    }
  }


  public function pagarBoleto(){
    try {
        $data = [
            "evento_id" => $this->request->getPost("evento_id"),
            "usuario_id" => $this->request->getPost("usuario_id"),
            "cantidad" => $this->request->getPost("numBoletos"),
            "precio" => $this->request->getPost("precio"),
            "total" => $this->request->getPost("total"),
            "fecha" => $this->request->getPost("fecha"),
            "hora" => $this->request->getPost("hora"),
        ];
        $boleto_id = $this->ventas->insert($data);

        if ($boleto_id) {
            $codigoQR = $this->request->getPost("codigoQR");

            // Extraer la parte base64 del data URL
            list($type, $codigoQR) = explode(';', $codigoQR);
            list(, $codigoQR) = explode(',', $codigoQR);
            $codigoQR = base64_decode($codigoQR);

            // Definir la ruta y nombre del archivo para guardar la imagen
            $filePath = FCPATH . 'images/' . $boleto_id . '.png';
            file_put_contents($filePath, $codigoQR);

            // Guardar la URL de la imagen en la base de datos
            $qrImgUrl = base_url($filePath);
            $data2 = [
                "venta_id" => $boleto_id,
                "evento_id" => $this->request->getPost("evento_id"),
                "usuario_id" => $this->request->getPost("usuario_id"),
                "qr_img_url" => $qrImgUrl
            ];
            $this->boletos->insert($data2);

            return $this->response->setStatusCode(201)->setJSON([
                'message' => 'Se insertó satisfactoriamente'
            ]);
        }
    } catch (\Exception $e) {
        log_message('error', 'Error al procesar la solicitud: ' . $e->getMessage());
        return $this->response->setStatusCode(500)->setJSON([
            'error' => $e->getMessage()
        ]);
    }
}


}