<?php
require_once '../Core/BaseModel.php';

class UsuarioModel extends BaseModel
{

    public function crearUsuario($usuario)
    {
        try {
            $cnn=$this->getConexion();
            $query = $cnn->prepare(" INSERT INTO CentroMedico.usuario VALUES(?, ?, ?, ?, ?, ?, ?)");
            $query->bindParam(1, $usuario['documento']);
            $query->bindParam(2, $usuario['nombres']);
            $query->bindParam(3, $usuario['apellidos']);
            $query->bindParam(4, $usuario['correoElectronico']);
            $query->bindParam(5, $usuario['celular']);
            $query->bindParam(6, $usuario['password']);
            $query->bindParam(7, $usuario['tipo']); 
            $query->execute();
        } catch (Exception $ex) {
            throw $ex;
        }finally {
            $cnn = null;
        }
    }

    public function ListarUsuarios()
    {
        $cnn = $this->getConexion();
        try {
        $listarUsuarios = 'SELECT * FROM CentroMedico.usuario';
        $query = $cnn->prepare($listarUsuarios);
        $query->execute();
        return $query->fetchAll();
        } catch (Exception $ex) {
            throw $ex;
        }finally {
            $cnn = null;
        }
    }
    
    
    public function eliminarUsuario($documento) {
        $cnn = $this->getConexion();
        $mensaje = "";
        try {
        $query = $cnn->prepare("DELETE FROM CentroMedico.usuario WHERE documento=?");
        $query->bindParam(1, $documento);
        $query->execute();
        } catch (Exception $ex) {
            throw $ex;
        }finally {
            $cnn = null;
        }
    }
    
    public function modificarUsuario($usuario) {
        try {
            $cnn=$this->getConexion();
            $query = $cnn->prepare(" UPDATE CentroMedico.usuario SET nombres=?, Apellidos=?, correoElectronico=?, Celular=?, password=?, tipo=? WHERE documento=?");
            $query->bindParam(1, $usuario['nombres']);
            $query->bindParam(2, $usuario['apellidos']);
            $query->bindParam(3, $usuario['correoElectronico']);
            $query->bindParam(4, $usuario['celular']);
            $query->bindParam(5, $usuario['password']);
            $query->bindParam(6, $usuario['tipo']); 
            $query->bindParam(7, $usuario['documento']);
            $query->execute();
        } catch (Exception $ex) {
            throw $ex;
        }finally {
            $cnn = null;
        }
    }
    
    public function buscarUsuario($documento) {
        $cnn = $this->getConexion();
        try {
        $query= $cnn->prepare('SELECT * FROM CentroMedico.usuario where documento=?');
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

