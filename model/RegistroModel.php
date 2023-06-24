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
    public function calcularGrupoEdad($email){
        $fecha=date("Y/m/d");
        $sql = "SELECT TIMESTAMPDIFF(YEAR,nacimiento,'$fecha' ) FROM usuario WHERE email='$email'";
        return $this->database->getOne($sql);

}

    public function verificarSiExisteUsuario($usuario){
        $sql = "SELECT *  FROM usuario WHERE usuario='".$usuario."'";
        return $this->database->query($sql);
    }

    public function finalizarRegistro($email,$hash)
    {
        $sql = "SELECT email, hashRegistro, estado FROM usuario WHERE email='" . $email . "' AND hashRegistro='" . $hash . "';";
        $result = $this->database->query($sql);

        $grupoEdad=$this->calcularGrupoEdad($email);

        if (count($result) > 0) {
            switch (true){
                case $grupoEdad[0] < 18:
                    $update = "UPDATE usuario SET estado='1', grupoEdad='menor' WHERE email='" . $email . "' AND hashRegistro='" . $hash . "';";
                    $this->database->execute($update);
                    return 1;
                    break;

                case $grupoEdad[0] > 18 && $grupoEdad[0] < 60:
                    $update = "UPDATE usuario SET estado='1', grupoEdad='medio' WHERE email='" . $email . "' AND hashRegistro='" . $hash . "';";
                    $this->database->execute($update);
                    return 1;
                    break;
                case $grupoEdad[0] > 60:
                    $update = "UPDATE usuario SET estado='1', grupoEdad='jubilado' WHERE email='" . $email . "' AND hashRegistro='" . $hash . "';";
                    $this->database->execute($update);
                    return 1;
                    break;

            }
        }
        return 0;
    }
}