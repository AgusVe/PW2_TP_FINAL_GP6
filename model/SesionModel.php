<?php

class SesionModel{

    private $database;
    public function __construct($database){
        $this->database = $database;
    }

    public function validar($usuario, $clave){
        $sql = "SELECT *  FROM usuario WHERE dni='".$usuario."' AND pass='".$clave."' AND activo='1'";
        //$sql = "SELECT * FROM empleados where dni='$usuario' and pass='$clave'";
        return $this->database->query($sql);
    }

}