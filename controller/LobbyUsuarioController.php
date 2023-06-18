<?php

class LobbyUsuarioController{
    private $renderer;
    private $perfilModel;



    public function __construct($renderer, $perfilModel){
        $this->renderer = $renderer;
        $this->perfilModel=$perfilModel;

    }

    public function execute()
    {
        $datos['datosUsur']=$this->perfilModel->obtenerDatos($_SESSION["id"]);

        $datosPartidas=$this->perfilModel->obtenerDatosPartidas($_SESSION['id']);
        $datos['userPartidas']=$datosPartidas;

        switch ($_SESSION['rol']){
            case "1":
                $datos['admin'] = 1;
                break;
            case "2":
                $datos['editor'] = 2;
                break;
            default:
                $datos['usuarioComun'] = 3;
                break;
        }

        if(!isset($_SESSION['email'])){
            header("location: /");
            exit();
        }
        echo $this->renderer->render("lobbyUsuario",$datos);
    }

    public function agregarPregunta(){
        $datos['editor'] = 2;
        $this->renderer->render("agregarPregunta", $datos);
    }

    public function modificarPregunta(){
        $this->renderer->render("modificarPregunta");
    }

    public function agregarSugerencia(){
        $datos['datosUsur']=$this->perfilModel->obtenerDatos($_SESSION["id"]);
        $this->renderer->render("sugerirPregunta",$datos);
    }


}