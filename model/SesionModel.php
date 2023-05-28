<?php

class SesionModel{

    private $database;
    public function __construct($database){
        $this->database = $database;
    }

    public function validar($email, $clave){
        $consultaContra = "SELECT * FROM usuario WHERE email='".$email."' AND estado='1'";
        $saveQuery=$this->database->query($consultaContra);
        $HashObtenido=$saveQuery["0"]["contrasenia"];

        if(password_verify($clave,$HashObtenido)) {
            $sql = "SELECT *  FROM usuario WHERE email='".$email."' AND contrasenia='" . $HashObtenido ."' AND estado='1'";
            return $this->database->query($sql);

        }
        return null;
    }
}