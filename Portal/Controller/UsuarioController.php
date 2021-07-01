<?php
require_once '../Core/BaseController.php';
require_once '../Model/UsuarioModel.php';

class UsuarioController extends BaseController
{

    public function __construct($contextApplication)
    {
        parent::__construct($contextApplication);
    }

    public function listar()
    {
      $usuarioModel= new UsuarioModel();
      $data=$usuarioModel->ListarUsuarios();
      $this->render("Usuarios/listar", [ "usuarios" => $data]);
    }
    
    public function crear() {
        $usuarioModel= new UsuarioModel();
        $usuario=[
            "documento"=>$this->getRequestsParam("documento"),
            "nombres"=>$this->getRequestsParam("nombres"),
            "apellidos"=>$this->getRequestsParam("apellidos"),
            "correoElectronico"=>$this->getRequestsParam("correoElectronico"),
            "celular"=>$this->getRequestsParam("celular"),
            "password"=>$this->getRequestsParam("documento"),
            "tipo"=>$this->getRequestsParam("tipo")  
        ];
        $usuarioModel->crearUsuario($usuario);
        $data=$usuarioModel->ListarUsuarios();
        $this->render("Usuarios/listar", [ "usuarios" => $data, "msgOk"=>"Usuario creado"]);

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
        $usuarioModel= new UsuarioModel();
        $usuario=$this->getRequestsParam("usuario");
        $usuarioModel->eliminarUsuario($usuario);
        $data=$usuarioModel->ListarUsuarios();
        $this->render("Usuarios/listar", [ "usuarios" => $data, "msgOk"=>"Usuario eliminado"]);
    }
    
    public function modificar(){
        $usuarioModel= new UsuarioModel();
        $usuario=[
            "documento"=>$this->getRequestsParam("documento"),
            "nombres"=>$this->getRequestsParam("nombres"),
            "apellidos"=>$this->getRequestsParam("apellidos"),
            "correoElectronico"=>$this->getRequestsParam("correoElectronico"),
            "celular"=>$this->getRequestsParam("celular"),
            "password"=>$this->getRequestsParam("documento"),
            "tipo"=>$this->getRequestsParam("tipo")  
        ];

        $usuarioModel->modificarUsuario($usuario);
            $data=$usuarioModel->ListarUsuarios();
            $this->render("Usuarios/listar", [ "usuarios" => $data, "msgOk"=>"Usuario modificado"]);

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
            $this->render('Usuarios/crear', array());
        }
        if($vista=='modificar'){
            $documento=$this->getRequestsParam("documento");
            $usuarioModel= new UsuarioModel();
            $usuario=$usuarioModel->buscarUsuario($documento);
            $this->render('Usuarios/modificar',["usuario"=>$usuario]);
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

