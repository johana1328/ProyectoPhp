<?php
require_once '../Core/BaseModel.php';

class CitaModel extends BaseModel{
    public function crearCita($cita)
    {
        try {
            $cnn=$this->getConexion();
            $query = $cnn->prepare(" INSERT INTO CentroMedico.cita (fecha, hora, especialista, usuario) VALUES(?, ?, ?, ?)");
            $query->bindParam(1, $cita['fecha']);
            $query->bindParam(2, $cita['hora']);
            $query->bindParam(3, $cita['especialista']);
            $query->bindParam(4, $cita['usuario']);
            $query->execute();
        } catch (Exception $ex) {
            throw $ex;
        }finally {
            $cnn = null;
        }
    }

    public function listarCitas()
    {
        $cnn = $this->getConexion();
        try {
        $listaCita = ("SELECT e.especialidad, ci.fecha ,ci.hora, ci.id FROM cita ci INNER JOIN especialista e ON ci.especialista = e.documento ");
        $query = $cnn->prepare($listaCita);
        $query->execute();
        return $query->fetchAll();
        } catch (Exception $ex) {
            throw $ex;
        }finally {
            $cnn = null;
        }
    }

    public function eliminarCita($id) {
        $cnn = $this->getConexion();
        try {
        $query = $cnn->prepare("DELETE FROM CentroMedico.cita WHERE id=?");
        $query->bindParam(1, $id);
        $query->execute();
        } catch (Exception $ex) {
            throw $ex;
        }finally {
            $cnn = null;
        }
    }

    public function modificarCita($cita) {
        try {
            $cnn=$this->getConexion();
            $query = $cnn->prepare(" UPDATE CentroMedico.cita SET fecha=?, hora=?, especialista=?, usuario=? WHERE id=?");

            $query->bindParam(1, $cita['fecha']);
            $query->bindParam(2, $cita['hora']);
            $query->bindParam(3, $cita['especialista']);
            $query->bindParam(4, $cita['usuario']);
            $query->bindParam(5, $cita['id']);
            $query->execute();
        } catch (Exception $ex) {
            throw $ex;
        }finally {
            $cnn = null;
        }
    }

    public function buscarCita($id) {
        $cnn = $this->getConexion();
        try {
        $query= $cnn->prepare('SELECT * FROM CentroMedico.cita WHERE id=?');
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