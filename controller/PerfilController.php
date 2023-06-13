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
            $usuario = $_GET['usuario'];
            $datos['usuarios'] = $this->perfilModel->obtenerDatos($usuario);
            $this->renderer->render("perfil", $datos);
        }else{
            header("location: /");
            exit();
        }
    }

}

