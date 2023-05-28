<?php

class RegistroModel{

    private $database;

    public function __construct($database){
        $this->database = $database;
    }

    public function altaUsuario($valores){
        $insert = 'INSERT INTO `usuario`
                   (nombre, apellido, nacimiento, genero, pais, ciudad, email, contrasenia, usuario, estado, fecha_Registro, idRol)' . $valores . ";";
        $this->database->execute($insert);
    }

    public function verificarSiExisteUsuario($usuario){
        $sql = "SELECT *  FROM usuario WHERE usuario='".$usuario."'";
        return $this->database->query($sql);
    }
}