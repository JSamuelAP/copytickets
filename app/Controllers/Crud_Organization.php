<?php

namespace App\Controllers;

class Crud_Organization extends BaseController{

    public function __construct()
    {
        
    }

    function contInsert_Organization(){
        try{
            $data = array(
                "nombre" => $this->request->getPost("nombre"),
                "email" => $this->request->getPost("email"),
                "password" => $this->request->getPost("password"), 
                "telefono" => $this->request->getPost("telefono"),
                "ubicacion" => $this->request->getPost("ubicacion"),
                "descripcion" => $this->request->getPost("descripcion")
            );
            $resp = $this->Organization_Model->InsertOrg($data);
            return $this->response->setJSON($resp);

        }catch(\Exception $e){
             // Manejar la excepción aquí
        log_message('error', 'Error al procesar la solicitud: ' . $e->getMessage());
        return $this->response->setStatusCode(500)->setJSON(['error' => 'Ha ocurrido un error en el servidor.']);
        }
    }

    
    function contUpdate_Organization($id){
        try{
            $data = array(
                "id" => $this->request->getPost("id"),
                "nombre" => $this->request->getPost("nombre"),
                "email" => $this->request->getPost("email"),
                "password" => $this->request->getPost("password"), 
                "telefono" => $this->request->getPost("telefono"),
                "ubicacion" => $this->request->getPost("ubicacion"),
                "descripcion" => $this->request->getPost("descripcion")
            );
            $this->Organization_Model->UpdateOrganization($data,$id);

        }catch(\Exception $e){
        log_message('error', 'Error al procesar la solicitud: ' . $e->getMessage());
        return $this->response->setStatusCode(500)->setJSON(['error' => 'Ha ocurrido un error en el servidor.']);
        }
    }
}