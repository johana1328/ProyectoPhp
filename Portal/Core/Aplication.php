<?php
class Aplication {
    private $view;
    private $data = array();
    private $context;
    private $url;
    private $ContextApllication = array();

    /**
     * Metodo constructor en ente se ingresa a contexto el fichero de configuracion
     */
    function __construct() {
        $this->context= parse_ini_file("../cfg/aplication.ini",true); 
    }
    
    
   
    
    function renderController() {
        $controller=$this->context["configuracion_general"]["default_controller"];
        $action=$this->context["configuracion_general"]["default_controller_accion"];
        $this->buildUrlExplode();
        if(!empty($this->url[0])){
            $controller=$this->url[0];
            if(!empty($this->url[1])){
                $action=$this->url[1]; 
            }else{
                $this->view="Error/403";
                return ;
            }
        }
        if(is_file('../Controller/'.ucwords($controller). 'Controller.php')){
            require('../Controller/'.ucwords($controller). 'Controller.php');
            $class = new ReflectionClass(ucwords($controller).'Controller');
            $instance = $class->newInstanceArgs([$this->ContextApllication]);
            $method=$action;
            try {
                if(method_exists($instance, $method)){
                    $instance->$method();
                    $this->view=$instance->getView();
                    $dataResponse=$instance->getData();
                    if(!is_null($dataResponse)){
                        array_push($this->data,$dataResponse);
                    }
                }else{
                    $this->view="Error/403";
                    return ;
                }
               
            }catch (Exception $e){
                $this->view="Error/403";
                return ;
            }
        }else{
            $this->view="Error/403";
            return ;
        }
       
    }
    
    
    /**
     * Metodo para extraxion de los datos de la url 
     * Controlador y Metodo
     */
    private function buildUrlExplode() {
        if (isset($_GET['url'])) {
            $this->url = $_GET['url'];
            $this->setRequestParams();
        }
        $this->url = rtrim($this->url, '/');
        $this->url = explode('/',$this->url);
    }
    
    
    
    /**
     * Metodo para devolver un array asociativo con los parametros de la url y formularios
     */
    private function setRequestParams(){
        $requestParam= array();
        if(isset($_SERVER['QUERY_STRING'])){
            parse_str($_SERVER['QUERY_STRING'], $requestParam);
            unset($requestParam["url"]);
        }
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            foreach ($_POST as $key => $value){
                $requestParam[$key]=$value;
            }
        }
        $this->ContextApllication=array_merge($this->ContextApllication,   ["requestParam" =>$requestParam]);
    }
    
    /**
     * Metodo para retornar la data a pintar el la vista
     * @return $data
     */
    public function getData() {
        return $this->data;
    }
    
    /**
     * Metodo para retornar la vista a mostrar
     * @return string|$view
     */
    public function getView() {
        if(is_null($this->view)){
            return "Error/404.php";
        }else{
            return $this->view.".php";
        }
    }
    
    
  
}




