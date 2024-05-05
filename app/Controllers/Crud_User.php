<?php

namespace  App\Controllers;
use App\Controllers\BaseController;

class Crud_User extends  BaseController
{

    public function __construct()
    {
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
                "telefono" => $this->request->getPost("telefono"),
                "ubicacion" => $this->request->getPost("ubicacion")
            );
            $this->User_Model->insert($data);
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
            $this->User_Model->UpdateUser($data,$id);

        }catch(\Exception $e){
            log_message('error','Error al procesar la solicitud' . $e->getMessage());
            return $this->response->setStatusCode(500)->setJSON(['error' => 'Ha ocurrido un error en el servidor']);
        }
    }


}
