<?php

class BaseController{
    
   private  $contextApplication = array();
   private $view;
   private $data;

   public function __construct($contextApplication){
       $this->contextApplication=$contextApplication;
   }
    
    protected function getRequestsParam($key){
        if(array_key_exists('requestParam', $this->contextApplication)){
            $requestParam=$this->contextApplication['requestParam'];
            if(array_key_exists($key, $requestParam)){
                return $this->contextApplication['requestParam'][$key];
            }else{
                throw new DataAccesException("RequestsParam no existe");
            }
        }else{
            throw new DataAccesException("RequestsParam no existe");
        }
        
    }
    
    protected function render($view ,$data=null) {
        $this->data=$data;
        $this->view=$view;
    }
    
    public function getView(){
        return $this->view;
    }
    
    public function getData(){
        return $this->data;
    }
    
}

