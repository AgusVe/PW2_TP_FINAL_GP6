<?php

class PerfilModel{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function obtenerDatos($idUsuario){
        $sql = "SELECT *  FROM usuario WHERE idUsuario='$idUsuario'";
        return $this->database->query($sql);
    }

}