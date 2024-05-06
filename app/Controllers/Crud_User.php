<?php

namespace  App\Controllers;
use App\Controllers\BaseController;
use App\Models\Usuario_Model;


class Crud_User extends  BaseController
{
    protected $usuario;

    public function __construct()
    {
        $this->usuario = new Usuario_Model();
    }

    function ValidandoDatos(){
        try{
            $data = $this->request->getPost();
            $resp = $this->usuario->Login($data['email'], $data['password']);
            if(isset($resp) > 0){
                $_SESSION['datos'] = $resp;
            }else{
                throw new \Exception('No se encontraron resultados');
            }
        }catch(\Exception $e){
            log_message('error','Error al procesar la solicitud' . $e->getMessage());
            return $this->response->setStatusCode(500)->setJSON(['error' => 'Ha ocurrido un error en el servidor']);
        }
    }

    public function organizador_perfil() {
      $data = ['titulo' => 'Perfil organizador | CopyTickets 🎫'];
      return view('usuarios/organizador-perfil.php', $data);
    }

    function contInsert_User(){
        try{
            $data = array(
                "nombre" => $this->request->getPost('nombre'),
                "email" => $this->request->getPost('email'),
                "password" => $this->request->getPost("password"), 
                "rol" => $this->request->getPost("rol"),
                "telefono" => $this->request->getPost("telefono"),
                "ubicacion" => $this->request->getPost("ubicacion"),
                "descripcion" => $this->request->getPost("descripcion")

            );
            $this->usuario->insert($data);
            return $this->response->setJSON(['success' => true]);
        }catch(\Exception $e){
            log_message('error','Error al procesar la solicitud' . $e->getMessage());
            return $this->response->setStatusCode(500)->setJSON(['error' => 'Ha ocurrido un error en el servidor']);
        }

    }

    function contEdit_User($id){
        try{
            $data = array(
                "id" => $this->request->getPost("id"),
                "nombre" => $this->request->getPost('nombre'),
                "email" => $this->request->getPost('email'),
                "password" => $this->request->getPost("password"), 
                "telefono" => $this->request->getPost("telefono"),
                "ubicacion" => $this->request->getPost("ubicacion")
            );
            $this->usuario->update($data,$id);

        }catch(\Exception $e){
            log_message('error','Error al procesar la solicitud' . $e->getMessage());
            return $this->response->setStatusCode(500)->setJSON(['error' => 'Ha ocurrido un error en el servidor']);
        }
    }


}