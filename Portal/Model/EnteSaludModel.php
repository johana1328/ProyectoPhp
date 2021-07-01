<?php
require_once '../Core/BaseModel.php';

class EnteSaludModel extends BaseModel
{

    public function crearEnte($ente)
    {
        try {
            $cnn=$this->getConexion();
            $query = $cnn->prepare(" INSERT INTO CentroMedico.enteSalud VALUES(?, ?, ?, ?, ?, ?, ?, ?)");
            $query->bindParam(1, $ente['nit']);
            $query->bindParam(2, $ente['razonsocial']);
            $query->bindParam(3, $ente['representanteLegal']);
            $query->bindParam(4, $ente['correoElectronico']);
            $query->bindParam(5, $ente['telefono']);
            $query->bindParam(6, $ente['web']);
            $query->bindParam(7, $ente['ciudad']); 
            $query->bindParam(8, $ente['capacidad']); 
            $query->execute();
        } catch (Exception $ex) {
            throw $ex;
        }finally {
            $cnn = null;
        }
    }

    public function listarEntes()
    {
        $cnn = $this->getConexion();
        try {
        $listaEnte = 'SELECT * FROM CentroMedico.enteSalud';
        $query = $cnn->prepare($listaEnte);
        $query->execute();
        return $query->fetchAll();
        } catch (Exception $ex) {
            throw $ex;
        }finally {
            $cnn = null;
        }
    }
    
    
    public function eliminarEnte($nit) {
        $cnn = $this->getConexion();
        try {
        $query = $cnn->prepare("DELETE FROM CentroMedico.enteSalud WHERE nit=?");
        $query->bindParam(1, $nit);
        $query->execute();
        } catch (Exception $ex) {
            throw $ex;
        }finally {
            $cnn = null;
        }
    }
    
    public function modificarEnte($ente) {
        try {
            $cnn=$this->getConexion();
            $query = $cnn->prepare(" UPDATE CentroMedico.enteSalud SET razonsocial=?, representanteLegal=?, correoElectronico=?, telefono=?, web=?, ciudad=?, capacidad=? WHERE nit=?");
            $query->bindParam(1, $ente['razonsocial']);
            $query->bindParam(2, $ente['representanteLegal']);
            $query->bindParam(3, $ente['correoElectronico']);
            $query->bindParam(4, $ente['telefono']);
            $query->bindParam(5, $ente['web']);
            $query->bindParam(6, $ente['ciudad']); 
            $query->bindParam(7, $ente['capacidad']); 
            $query->bindParam(8, $ente['nit']);
            $query->execute();
        } catch (Exception $ex) {
            throw $ex;
        }finally {
            $cnn = null;
        }
    }
    
    public function buscarEnte($nit) {
        $cnn = $this->getConexion();
        try {
        $query= $cnn->prepare('SELECT * FROM CentroMedico.enteSalud WHERE nit=?');
        $query->bindParam(1, $nit);
        $query->execute();
        return $query->fetch();
        } catch (Exception $ex) {
            throw $ex;
        }finally {
            $cnn = null;
        }
    }
    
}

