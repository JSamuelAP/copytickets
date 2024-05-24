<?php

namespace App\Controllers;

use App\Models\Boletos_Model;
use App\Models\Eventos_Model;
use App\Models\Usuario_Model;
use App\Models\Venta_Model;
use Dompdf\Dompdf;
use Dompdf\Options;
use Exception;

class Ventas extends BaseController
{
  protected Venta_Model $ventas;
  protected Usuario_Model $usuario;
  protected Eventos_Model $eventos;
  protected Boletos_Model $boletos;

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
        'cartel' => $this->eventos->joinEventos($_SESSION['datos']['id'])];
        return view('ventas/index', $data);
      }else{
        return redirect()->to('public/');
      }
    }catch(Exception $e){
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
      }else{
        return redirect()->to('public/');
      }
    }catch(Exception $e){
      log_message('error', 'Error al procesar la solicitud' . $e->getMessage());
      return $this->response->setStatusCode(500)->setJSON([
        'error' => $e->getMessage()
      ]);
    }
  }


  public function pagarBoleto(){
    try {
        // Obtener datos del formulario
        $data = [
            "evento_id" => $this->request->getPost("evento_id"),
            "usuario_id" => $this->request->getPost("usuario_id"),
            "cantidad" => $this->request->getPost("numBoletos"),
            "precio" => $this->request->getPost("precio"),
            "total" => $this->request->getPost("total"),
            "fecha" => $this->request->getPost("fecha"),
            "hora" => $this->request->getPost("hora"),
        ];
        // Insertar datos en la base de datos
        $boleto_id = $this->ventas->insert($data);

        if ($boleto_id) {
            $codigoQR = $this->request->getPost("codigoQR");

            // Extraer la parte base64 del data URL
            list(, $codigoQR) = explode(';', $codigoQR);
            list(, $codigoQR) = explode(',', $codigoQR);
            $codigoQR = base64_decode($codigoQR);

            // Definir la ruta y nombre del archivo para guardar la imagen
            $filePath = FCPATH . 'images/' . $boleto_id . '.png';
            file_put_contents($filePath, $codigoQR);

            // Guardar la URL de la imagen en la base de datos
            $qrImgUrl = $boleto_id . '.png';
            $data2 = [
                "venta_id" => $boleto_id,
                "evento_id" => $this->request->getPost("evento_id"),
                "usuario_id" => $this->request->getPost("usuario_id"),
                "qr_img_url" => $qrImgUrl
            ];
            $this->boletos->insert($data2);

            return $this->response->setStatusCode(201)->setJSON([
                'message' => 'Se insertó satisfactoriamente',
                'qr_img_url' => $qrImgUrl  // Retornar la URL para verificar
            ]);
        }
    } catch (Exception $e) {
        log_message('error', 'Error al procesar la solicitud: ' . $e->getMessage());
        return $this->response->setStatusCode(500)->setJSON([
            'error' => $e->getMessage()
        ]);
    }
  }

  public function boletoPDF($id) {
    try {
        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $dompdf = new Dompdf($options);
        $data = ['cartel' => $this->eventos->joinEvento($id)];
        $html = view('components/boletoCard', $data);
        $dompdf->loadHtml($html);
        $dompdf->setPaper([0, 0, 290, 530]);
        $dompdf->render();
        $dompdf->stream("boleto.pdf", array("Attachment" => 0));
    } catch (Exception $e) {
        log_message('error', $e->getMessage());
        return $this->response->setStatusCode(500)->setBody($e->getMessage());
    }
  }
}
