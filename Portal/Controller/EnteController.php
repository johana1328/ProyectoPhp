
<?php
require_once '../Core/BaseController.php';
require_once '../Model/EnteSaludModel.php';

class EnteController extends BaseController
{

    public function __construct($contextApplication)
    {
        parent::__construct($contextApplication);
    }

    public function listar()
    {
      $enteModel= new EnteSaludModel();
      $data=$enteModel->listarEntes();
      $this->render("Ente/listar", [ "entes" => $data]);
    }
    
    public function crear() {
        $enteModel= new EnteSaludModel();
        $ente=[
            "nit"=>$this->getRequestsParam("nit"),
            "razonsocial"=>$this->getRequestsParam("razonsocial"),
            "representanteLegal"=>$this->getRequestsParam("representanteLegal"),
            "correoElectronico"=>$this->getRequestsParam("correoElectronico"),
            "telefono"=>$this->getRequestsParam("telefono"),
            "web"=>$this->getRequestsParam("web"),
            "ciudad"=>$this->getRequestsParam("ciudad") ,
            "capacidad"=>$this->getRequestsParam("capacidad")   
        ];
        $enteModel->crearEnte($ente);
        $data=$enteModel->listarEntes();
        $this->render("Ente/listar", [ "entes" => $data, "msgOk"=>"Ente Salud Creada"]);

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
        $enteModel= new EnteSaludModel();
        $nit=$this->getRequestsParam("nit");
        $enteModel->eliminarEnte($nit);
        $data=$enteModel->listarEntes();
        $this->render("Ente/listar", [ "entes" => $data, "msgOk"=>"Usuario eliminado"]);
    }
    
    public function modificar(){
        $enteModel= new EnteSaludModel();
        $ente=[
            "nit"=>$this->getRequestsParam("nit"),
            "razonsocial"=>$this->getRequestsParam("razonsocial"),
            "representanteLegal"=>$this->getRequestsParam("representanteLegal"),
            "correoElectronico"=>$this->getRequestsParam("correoElectronico"),
            "telefono"=>$this->getRequestsParam("telefono"),
            "web"=>$this->getRequestsParam("web"),
            "ciudad"=>$this->getRequestsParam("ciudad") ,
            "capacidad"=>$this->getRequestsParam("capacidad")   
        ];

        $enteModel->modificarEnte($ente);
        $data=$enteModel->listarEntes();
        $this->render("Ente/listar", [ "entes" => $data, "msgOk"=>"Entes de salud modificados"]);

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
            $this->render('Ente/crear', array());
        }
        if($vista=='modificar'){
            $nit=$this->getRequestsParam("nit");
            $enteModel= new EnteSaludModel();
            $ente=$enteModel->buscarEnte($nit);
           
            $this->render('Ente/modificar',["ente"=>$ente]);
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
        
        if(!preg_match($patronLetras, $usuario['apellidos'])){
            return " Campo Nombre debe de contener solo letras";
        }
        
        if($usuario['codigo']==""){
            return " Campo Codigo es obligatorio";
        }
        
        return "OK";
        
    }
    
}

