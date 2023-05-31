<?php

class RegistroModel{

    private $database;

    public function __construct($database){
        $this->database = $database;
    }

    public function altaUsuario($valores){
        $insert = 'INSERT INTO `usuario`
                   (nombre, apellido, nacimiento, genero, pais, ciudad, email, contrasenia, hashRegistro, usuario, estado, fecha_Registro, idRol, url_imagen)' . $valores . ";";
        $this->database->execute($insert);
    }

    public function verificarSiExisteUsuario($usuario){
        $sql = "SELECT *  FROM usuario WHERE usuario='".$usuario."'";
        return $this->database->query($sql);
    }

    public function finalizarRegistro($email,$hash)
    {
        $sql = "SELECT email, hashRegistro, estado FROM usuario WHERE email='" . $email . "' AND hashRegistro='" . $hash . "';";
        $result = $this->database->query($sql);

        if (count($result) > 0) {
            $update = "UPDATE usuario SET estado='1' WHERE email='" . $email . "' AND hashRegistro='" . $hash . "';";
            $this->database->execute($update);
            return 1;
        }
        return 0;
    }
}