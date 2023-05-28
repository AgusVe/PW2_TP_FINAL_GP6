<?php

class SesionModel{

    private $database;
    public function __construct($database){
        $this->database = $database;
    }

    public function validar($email, $clave){
        $hashPassword = "SELECT contrasenia FROM usuario WHERE email='".$email."'";
        $contraseniaHasheda = $this->database->query($hashPassword);
        //$sql = "SELECT *  FROM usuario WHERE email='".$email."' AND contrasenia='".$clave."' AND estado='1'";
        //return $this->database->query($sql);

        if(password_verify($clave, $contraseniaHasheda["0"]["contrasenia"])){
            $sql = "SELECT *  FROM usuario WHERE email='".$email."' AND estado='1'";
            return $this->database->query($sql);
        }

        return null;
    }

}