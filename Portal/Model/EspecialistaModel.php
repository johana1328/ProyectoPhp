<?php
require_once '../Core/BaseModel.php';

class EspecialistaModel extends BaseModel
{

    public function crearEspecialista($especialista)
    {
        try {
            $cnn=$this->getConexion();
            $query = $cnn->prepare(" INSERT INTO CentroMedico.especialista VALUES(?,?, ?, ?, ?, ?, ?, ?, ?)");
            $query->bindParam(1, $especialista['documento']);
            $query->bindParam(2, $especialista['especialidad']);
            $query->bindParam(3, $especialista['ciudad']);
            $query->bindParam(4, $especialista['licencia']);
            $query->bindParam(5, $especialista['fechaExpedicion']);
            $query->bindParam(6, $especialista['tipo']);
            $query->bindParam(7, $especialista['nombre']); 
            $query->bindParam(8, $especialista['correo']); 
            $query->bindParam(9, $especialista['celular']); 
            $query->execute();
        } catch (Exception $ex) {
            throw $ex;
        }finally {
            $cnn = null;
        }
    }

    public function listarEspecialistas()
    {
        $cnn = $this->getConexion();
        try {
        $listaEspecialista = 'SELECT * FROM CentroMedico.especialista';
        $query = $cnn->prepare($listaEspecialista);
        $query->execute();
        return $query->fetchAll();
        } catch (Exception $ex) {
            throw $ex;
        }finally {
            $cnn = null;
        }
    }
    
    
    public function eliminarEspecialista($documento) {
        $cnn = $this->getConexion();
        try {
        $query = $cnn->prepare("DELETE FROM CentroMedico.especialista
        WHERE documento=?");
        $query->bindParam(1, $documento);
        $query->execute();
        } catch (Exception $ex) {
            throw $ex;
        }finally {
            $cnn = null;
        }
    }
    
    public function modificarEspecialista($especialista) {
        try {
            $cnn=$this->getConexion();
            $query = $cnn->prepare(" UPDATE CentroMedico.especialista
            SET especialidad=?, ciudad=?, licencia=?, fechaExpedicion=?, tipo=?, nombre=?, correo=?, celular=?
            WHERE documento=?");
            $query->bindParam(1, $especialista['especialidad']);
            $query->bindParam(2, $especialista['ciudad']);
            $query->bindParam(3, $especialista['licencia']);
            $query->bindParam(4, $especialista['fechaExpedicion']);
            $query->bindParam(5, $especialista['tipo']);
            $query->bindParam(6, $especialista['nombre']); 
            $query->bindParam(7, $especialista['correo']); 
            $query->bindParam(8, $especialista['celular']);  
            $query->bindParam(9, $especialista['documento']);
            $query->execute();
        } catch (Exception $ex) {
            throw $ex;
        }finally {
            $cnn = null;
        }
    }
    
    public function buscarEspecialista($documento) {
        $cnn = $this->getConexion();
        try {
        $query= $cnn->prepare('SELECT * FROM CentroMedico.especialista WHERE documento=?');
        $query->bindParam(1, $documento);
        $query->execute();
        return $query->fetch();
        } catch (Exception $ex) {
            throw $ex;
        }finally {
            $cnn = null;
        }
    }
    
}

