<?php
require_once '../Core/Conexion.php';
class BaseModel{
    
    protected function getConexion(){
        return Conexion::getConexion();
      }
    
}

