<?php

class SesionModel{

    private $database;
    public function __construct($database){
        $this->database = $database;
    }

    public function validar($email, $clave){
        $sql = "SELECT *  FROM usuario WHERE email='".$email."' AND pass='".$clave."' AND activo='1'";
        return $this->database->query($sql);
    }

}