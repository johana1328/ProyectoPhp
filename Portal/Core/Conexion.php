<?php
class Conexion{

     public static function getConexion(){
      $conn = null;
      try {
          //$conetProperty = parse_ini_file("../cfg/aplication.ini", true);
          $host = "gestioncmc.ddns.net";
          $username = "root";
          $passwd = "newral05";
          $dbname ="CentroMedico";
          $port = "3306";
      $conn = new PDO("mysql:host=$host;dbname=$dbname","$username","$passwd");
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch (PDOException $ex) {
          echo 'Error: '.$ex->getMessage();
      }
      return $conn;
      }
     
}