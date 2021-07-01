<?php
require_once 'Core/BaseController.php';

class ProductoController extends BaseController{

    public function __construct($contextApplication){
        parent::__construct($contextApplication);
    }
    
    
    public function inicio() {
        $this->render("productos");
    }
    
}

