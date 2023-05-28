<?php

class SesionModel{

    private $database;
    public function __construct($database){
        $this->database = $database;
    }

    public function validar($email, $clave){
        $consultaSQL = "SELECT * FROM usuario WHERE email='".$email."' AND estado='1'";
        $saveQuery=$this->database->query($consultaSQL);
        $contraseniaHashedaObtenida=$saveQuery["0"]["contrasenia"];

        if(password_verify($clave,$contraseniaHashedaObtenida)) {
            $sql = "SELECT * FROM usuario WHERE contrasenia='" . $contraseniaHashedaObtenida ."'";
            return $this->database->query($sql);

        }
        return null;
    }
}