<?php

require_once '../Core/BaseController.php';

class InicioController extends BaseController{

    public function __construct($contextApplication){
        parent::__construct($contextApplication);
    }
    
    public function inicio() {
        parent::render('inicio',['nombre'=>'mario']);
    }
    
}

