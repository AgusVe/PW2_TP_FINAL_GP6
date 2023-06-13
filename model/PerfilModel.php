<?php

class PerfilModel{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function obtenerDatos($usuario){
        $sql = "SELECT *  FROM usuario WHERE usuario='$usuario'";
        return $this->database->query($sql);
    }

}