<?php
require_once '../Core/BaseController.php';
require_once '../Model/CitaModel.php';
require_once '../Model/EspecialistaModel.php';

class CitaController extends BaseController
{

    public function __construct($contextApplication)
    {
        parent::__construct($contextApplication);
    }
    public function listar(){
      $citaModel= new CitaModel();
      $data=$citaModel->listarCitas();
      $this->render("Cita/listar", [ "citas" => $data]);
    }

    public function crear() {
        $citaModel= new CitaModel();
        $cita=[
            "especialista"=>$this->getRequestsParam("especialista"),
            "fecha"=>$this->getRequestsParam("fecha"),
            "hora"=>$this->getRequestsParam("hora"),
            "usuario"=>$this->getRequestsParam("usuario"),  
        ];
        $citaModel->crearCita($cita);
        $data=$citaModel->listarCitas();
        $this->render("Cita/listar", [ "citas" => $data, "msgOk"=>"Cita Creada"]);
}

public function modificar(){
    $citaModel= new CitaModel();
    $cita=[
        "id"=>$this->getRequestsParam("id"),
        "especialista"=>$this->getRequestsParam("especialista"),
        "fecha"=>$this->getRequestsParam("fecha"),
        "hora"=>$this->getRequestsParam("hora"),
        "usuario"=>$this->getRequestsParam("usuario"),  
    ];

    $citaModel->modificarCita($cita);
    $data=$citaModel->listarCitas();
    $this->render("Cita/listar", ["citas" => $data, "msgOk"=>"Entes de salud modificados"]);
}

public function eliminar(){
    $citaModel= new CitaModel();
    $id=$this->getRequestsParam("id");
    $citaModel->eliminarCita($id);
    $data=$citaModel->listarCitas();
    $this->render("Cita/listar", [ "citas" => $data, "msgOk"=>"Ente de salud eliminado"]);
}

public function redirecionar() {
    $vista=$this->getRequestsParam("vista");
    if($vista=="crear"){
       $especialistaModel= new EspecialistaModel();
       $data=$especialistaModel->listarEspecialistas();
        $this->render('Cita/crear', [ "especialistas" => $data]);
    }
    if($vista=='modificar'){
        $id=$this->getRequestsParam("id");
        $citaModel= new CitaModel();
        $cita=$citaModel->buscarCita($id);
        $especialistaModel= new EspecialistaModel();
        $data=$especialistaModel->listarEspecialistas();
        $this->render('Cita/modificar',["cita"=>$cita, 
        "especialistas" => $data]);
    }
}

}


?>