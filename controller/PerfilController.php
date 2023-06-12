<?php


class PerfilController {
    private $perfilModel;
    private $renderer;


    public function __construct($perfilModel,$renderer){
        $this->perfilModel = $perfilModel;
        $this->renderer = $renderer;
    }


    public function verPerfil(){
        if(isset($_GET['usuario'])) {
            $idUsuario = $_GET['usuario'];
            $datos['usuarios'] = $this->perfilModel->obtenerDatos($idUsuario);
            $datos['userPartidas'] = $this->perfilModel->obtenerDatosPartidas($idUsuario);
            $this->renderer->render("perfil", $datos);
        }else{
            header("location: /");
            exit();
        }
    }

}

