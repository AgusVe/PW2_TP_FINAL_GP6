<?php

class SesionModel
{

    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }


    public function validar($email, $clave)
    {
        $consultaContra = "SELECT contrasenia FROM usuario WHERE email='" . $email . "' AND estado='1'";
        $saveQuery = $this->database->query($consultaContra);

        $HashObtenido = $saveQuery["0"]["0"];

        if ($HashObtenido != null) {
            var_dump($clave);
            var_dump($HashObtenido);
            if (password_verify($clave, $HashObtenido)) {
                $sql = "SELECT *  FROM usuario WHERE email='" . $email . "' AND contrasenia='" . $HashObtenido . "' AND estado='1'";
                return $this->database->query($sql);
            }
        } else {
            return 1;
        }

    }

    public function validarEmail($email)
    {
        $consultaEmail = "SELECT email FROM usuario WHERE email='" . $email . "' AND estado='1'";
        $saveQuery = $this->database->query($consultaEmail);

        if ($saveQuery) {
            return $saveQuery;
        }

        return 1;

    }
}