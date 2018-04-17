<?php

class DB {
  static function createConnection(){
    try{
      $conn = new PDO("mysql:host=localhost; dbname=academicportaldb; charset=UTF8", "dwuser", "dwuser");
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    
      return $conn;
    } 
    catch (Exception $pdoe) {
      echo $pdoe->getMessage();
      exit();
    } 
  }
}
