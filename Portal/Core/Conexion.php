<?php
class Conexion{

     public static function getConexion(){
      $conn = null;
      try {
          $conetProperty = parse_ini_file("../cfg/aplication.ini", true);
          $host = $conetProperty["conexion_bd"]["host"];
          $username = $conetProperty["conexion_bd"]["username"];
          $passwd = $conetProperty["conexion_bd"]["passwd"];
          $dbname = $conetProperty["conexion_bd"]["dbname"];
          $port = $conetProperty["conexion_bd"]["port"];
      $conn = new PDO("mysql:host=$host;dbname=$dbname","$username","$passwd");
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch (PDOException $ex) {
          echo 'Error: '.$ex->getMessage();
      }
      return $conn;
      }
     
}