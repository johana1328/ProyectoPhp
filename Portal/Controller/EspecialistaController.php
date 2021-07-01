
<?php
require_once '../Core/BaseController.php';
require_once '../Model/EspecialistaModel.php';
require_once '../Model/EnteSaludModel.php';

class EspecialistaController extends BaseController
{

    public function __construct($contextApplication)
    {
        parent::__construct($contextApplication);
    }

    public function listar()
    {
      $especialistaModel= new EspecialistaModel();
      $data=$especialistaModel->listarEspecialistas();
      $this->render("Especialista/listar", [ "especialistas" => $data]);
    }
    
    public function crear() {
        $especialistaModel= new EspecialistaModel();
        $especialista=[
            "documento"=>$this->getRequestsParam("documento"),
            "especialidad"=>$this->getRequestsParam("especialidad"),
            "ciudad"=>$this->getRequestsParam("ciudad"),
            "licencia"=>$this->getRequestsParam("licencia"),
            "fechaExpedicion"=>$this->getRequestsParam("fechaExpedicion"),
            "tipo"=>$this->getRequestsParam("tipo"),
            "nombre"=>$this->getRequestsParam("nombre") ,
            "correo"=>$this->getRequestsParam("correo"),
            "celular"=>$this->getRequestsParam("celular"),
            "ente"=>$this->getRequestsParam("ente")
            
        ];
        $especialistaModel->crearEspecialista($especialista);
        $data=$especialistaModel->listarEspecialistas();
        $this->render("Especialista/listar", [ "especialistas" => $data, "msgOk"=>"Ente Salud Creada"]);

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
        $especialistaModel= new EspecialistaModel();
        $documento=$this->getRequestsParam("documento");
        $especialistaModel->eliminarEspecialista($documento);
        $data=$especialistaModel->listarEspecialistas();
        $this->render("Especialista/listar", [ "especialistas" => $data, "msgOk"=>"Usuario eliminado"]);
    }
    
    public function modificar(){
        $especialistaModel= new EspecialistaModel();
        $especialista=[
            "documento"=>$this->getRequestsParam("documento"),
            "especialidad"=>$this->getRequestsParam("especialidad"),
            "ciudad"=>$this->getRequestsParam("ciudad"),
            "licencia"=>$this->getRequestsParam("licencia"),
            "fechaExpedicion"=>$this->getRequestsParam("fechaExpedicion"),
            "tipo"=>$this->getRequestsParam("tipo"),
            "nombre"=>$this->getRequestsParam("nombre") ,
            "correo"=>$this->getRequestsParam("correo"),
            "celular"=>$this->getRequestsParam("celular"),
            "ente"=>$this->getRequestsParam("ente")
        ];

        $especialistaModel->modificarEspecialista($especialista);
        $data=$especialistaModel->listarEspecialistas();
        $this->render("Especialista/listar", [ "especialistas" => $data, "msgOk"=>"Entes de salud modificados"]);

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
            $enteModel= new EnteSaludModel();
           $data=$enteModel->listarEntes();
           $this->render('Especialista/crear', [ "entes" => $data]);
        }
        if($vista=='modificar'){
            $documento=$this->getRequestsParam("documento");
            $especialistaModel= new EspecialistaModel();
            $especialista=$especialistaModel->buscarEspecialista($documento);
            $enteModel= new EnteSaludModel();
            $data=$enteModel->listarEntes();
            $this->render('Especialista/modificar',["especialista"=>$especialista,
            "entes" => $data]);
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

