
<?php
require_once '../Core/BaseController.php';
require_once '../Model/EnciclopediaMedicaModel.php';

class EnciclopediaController extends BaseController
{

    public function __construct($contextApplication)
    {
        parent::__construct($contextApplication);
    }

    public function listar()
    {
      $encicloModel= new EnciclopediaMedicaModel();
      $data=$encicloModel->listarEnciclopedia();
      $this->render("Enciclopedia/listar", [ "enciclopedias" => $data]);
    }
    
    public function crear() {
        $encicloModel= new EnciclopediaMedicaModel();
        $enciclopedia=[
            "nombre"=>$this->getRequestsParam("nombre"),
            "descripcion"=>$this->getRequestsParam("descripcion"),
            "sintomas"=>$this->getRequestsParam("sintomas"),
            "recomendaciones"=>$this->getRequestsParam("recomendaciones"),
        ];
        $encicloModel->crearEnciclopedia($enciclopedia);
        $data=$encicloModel->listarEnciclopedia();
        $this->render("Enciclopedia/listar", [ "enciclopedias" => $data, "msgOk"=>"Dato Creada"]);

      /*  $msg=$this->validarFormularioUsuario($usuario);
        if($msg == "OK"){
            $usuarioModel->crearUsuario($usuario);
            $data=$usuarioModel->ListarUsuarios();
            $this->render("Usuarios/listar", [ "usuarios" => $data, "msgOk"=>"Usuario creado"]);
        }else{
            $this->render('Usuarios/crear', ["msgkO"=>$msg, "usuario"=>$usuario]);
        }*/
       
    }
    
    
    public function eliminar(){
        $encicloModel= new EnciclopediaMedicaModel();
        $id=$this->getRequestsParam("id");
        $encicloModel->eliminarEnte($id);
        $data=$encicloModel->listarEnciclopedia();
        $this->render("Enciclopedia/listar", [ "enciclopedias" => $data, "msgOk"=>"Dato eliminado"]);
    }
    
    public function modificar(){
        $encicloModel= new EnciclopediaMedicaModel();
        $enciclopedia=[
            "nombre"=>$this->getRequestsParam("nombre"),
            "descripcion"=>$this->getRequestsParam("descripcion"),
            "sintomas"=>$this->getRequestsParam("sintomas"),
            "recomendaciones"=>$this->getRequestsParam("recomendaciones"),
        ];

        $encicloModel->modificarEnciclo($enciclopedia);
        $data=$encicloModel->listarEnciclopedia();
        $this->render("Enciclopedia/listar", [ "enciclopedias" => $data, "msgOk"=>"Dato modificados"]);

       /* $msg=$this->validarFormularioUsuario($usuario);
        if($msg == "OK"){
            $usuarioModel->modificarUsuario($usuario);
            $data=$usuarioModel->ListarUsuarios();
            $this->render("Usuarios/listar", [ "usuarios" => $data, "msgOk"=>"Usuario modificado"]);
        }else{
            $this->render('Usuarios/modificar', ["msgkO"=>$msg, "usuario"=>$usuario]);
        }*/
    }
    
    public function redirecionar() {
        $vista=$this->getRequestsParam("vista");
        if($vista=="crear"){
            $this->render('Enciclopedia/crear', array());
        }
        if($vista=='modificar'){
            $id=$this->getRequestsParam("id");
            $encicloModel= new EnteSaludModel();
            $enciclopedia=$encicloModel->buscarEnciclo($id);
           
            $this->render('Enciclopedia/modificar',["enciclopedias"=>$enciclopedia]);
        }
    }
    
    private function validarFormularioUsuario($usuario) {
        $patronNumero = "/^[[:digit:]]+$/";
        $patronLetras = "/^[a-z]+$/i";
        
        if(!preg_match($patronNumero, $usuario['documento'])){
            return " Campo Documento debe de ser solo numero";
        }
        
        if(!preg_match($patronLetras, $usuario['nombres'])){
            return " Campo Nombre debe de contener solo letras";
        }
        
        if(!preg_match($patronLetras, $usuario['sintomas'])){
            return " Campo Nombre debe de contener solo letras";
        }
        
        if($usuario['codigo']==""){
            return " Campo Codigo es obligatorio";
        }
        
        return "OK";
        
    }
    
}

