<?php

require_once '../Core/BaseModel.php';

class EnciclopediaMedicaModel extends BaseModel
{


    public function crearEnciclopedia($enciclopedia){
        try {
            $cnn=$this->getConexion();
            $query = $cnn->prepare("INSERT INTO CentroMedico.enciclopediaMedica (nombre, descripcion, sintomas, recomendaciones) VALUES(?, ?, ?, ?)");
            $query->bindParam(1, $enciclopedia['nombre']);
            $query->bindParam(2, $enciclopedia['descripcion']);
            $query->bindParam(3, $enciclopedia['sintomas']);
            $query->bindParam(4, $enciclopedia['recomendaciones']);
            $query->execute();
        } catch (Exception $ex) {
            throw $ex;
        }finally {
            $cnn = null;
        }
    }

    public function listarEnciclopedia()
    {
        $cnn = $this->getConexion();
        try {
        $listaEnciclo = 'SELECT * FROM CentroMedico.enciclopediaMedica';
        $query = $cnn->prepare($listaEnciclo);
        $query->execute();
        return $query->fetchAll();
        } catch (Exception $ex) {
            throw $ex;
        }finally {
            $cnn = null;
        }
    }

       
    public function eliminarEnciclo($id) {
        $cnn = $this->getConexion();
        try {
        $query = $cnn->prepare("DELETE FROM CentroMedico.enciclopediaMedica WHERE id=?");
        $query->bindParam(1, $id);
        $query->execute();
        } catch (Exception $ex) {
            throw $ex;
        }finally {
            $cnn = null;
        }
    }

    public function modificarEnciclo($enciclopedia) {
        try {
            $cnn=$this->getConexion();
            $query = $cnn->prepare(" UPDATE CentroMedico.enciclopediaMedica SET nombre=?, descripcion=?, sintomas=?, recomendaciones=? WHERE id=?;");

            $query->bindParam(1, $enciclopedia['nombre']);
            $query->bindParam(2, $enciclopedia['descripcion']);
            $query->bindParam(3, $enciclopedia['sintomas']);
            $query->bindParam(4, $enciclopedia['recomendaciones']);
            $query->bindParam(5, $enciclopedia['id']);
            $query->execute();
        } catch (Exception $ex) {
            throw $ex;
        }finally {
            $cnn = null;
        }
    }
      
    public function buscarEnciclo($id) {
        $cnn = $this->getConexion();
        try {
        $query= $cnn->prepare('SELECT * FROM CentroMedico.enciclopediaMedica WHERE id=?');
        $query->bindParam(1, $id);
        $query->execute();
        return $query->fetch();
        } catch (Exception $ex) {
            throw $ex;
        }finally {
            $cnn = null;
        }
    }

}

?>