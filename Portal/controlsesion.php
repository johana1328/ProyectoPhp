<?php 
require_once 'Core/Conexion.php';

if (isset($_POST['usuario']) && isset($_POST['password'])) {
    $usuario= $_POST['usuario']; 
    $password= $_POST['password']; 
    $userArr = getUserBypass($usuario, $password);
    if($userArr){
     $user= $userArr[0];
      session_start();
      $_SESSION['nombres'] =  $user['nombres'];
      $_SESSION['tipo'] =  $user['tipo'];
      $_SESSION['ente'] =  $user['ente'];
      header('Location: index.php');
    }else{
      header('Location: login.php?status=error');
      session_destroy();
    }
  }else{
    header('Location: login.php');
    session_destroy();
  }



  function getUserBypass($user, $pass)
  {
      $cnn = Conexion::getConexion();
      try {
      $listarUsuarios = "select * ,
      CASE
          WHEN u.tipo = 'CONTENIDO' THEN (select es.nit from enteSalud es  where es.usuario =u.documento)
          ELSE 'NA' 
      END
      as ente
      from usuario u
       WHERE  u.documento = ? and u.password = ?";
      $query = $cnn->prepare($listarUsuarios);
      $query->execute([$user, $pass]);
      $result = $query->fetchAll();
      return $result;
      } catch (Exception $ex) {
          throw $ex;
      }finally {
          $cnn = null;
      }
  }

?>