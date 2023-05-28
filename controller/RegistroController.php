<?php

class RegistroController{
    private $registroModel;
    private $renderer;

    public function __construct($registroModel, $renderer){
        $this->registroModel = $registroModel;
        $this->renderer = $renderer;
    }

    public function execute(){
        echo $this->renderer->render("registro");
    }

    public function procesarFormulario(){
        if(isset($_POST['enviarRegistro'])){
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $fechaNac = $_POST['fechaNac'];
            $genero = $_POST['genero'];
            $pais = $_POST['pais'];
            $ciudad = $_POST['ciudad'];
            $email = $_POST['email'];
            $contrasenia = $_POST['contrasenia'];
            $contraseniaRepe=$_POST['contraseniaRepe'];
            $usuario = $_POST['usuario'];
            $estado = 1;
            $fechaRegistro = date("Y/m/d");
            $idRol = 3;

            if($contrasenia != $contraseniaRepe){
                header('location: /registro');
                exit();
            }else{
                //$contraseniaHasheada = md5($contrasenia);
                $contraseniaHasheada = password_hash($contrasenia, PASSWORD_DEFAULT);
            }
            $usuarioBuscado = $this->registroModel->verificarSiExisteUsuario($usuario);
            if(count($usuarioBuscado)>=1){
                header('location: /registro');
                exit();
            }

            $valores = "VALUES ('$nombre', '$apellido', '$fechaNac', '$genero', '$pais', '$ciudad', '$email', '$contraseniaHasheada', '$usuario', '$estado', '$fechaRegistro', '$idRol')";
            $this->registroModel->altaUsuario($valores);
        }else{
            header('location: /home');
            exit();
        }

    }

}