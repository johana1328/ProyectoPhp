<?php
require_once '../Core/BaseController.php';
require_once '../Model/CitaModel.php';

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

}


?>