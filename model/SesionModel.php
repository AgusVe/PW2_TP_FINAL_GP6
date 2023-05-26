<?php

class SesionModel{

    private $database;
    public function __construct($database){
        $this->database = $database;
    }

    public function validar($email, $clave){
        $sql = "SELECT *  FROM usuario WHERE email='".$email."' AND contrasenia='".$clave."' AND estado='1'";
        return $this->database->query($sql);
    }

}