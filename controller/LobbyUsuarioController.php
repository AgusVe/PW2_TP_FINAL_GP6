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
                header("location: /lobbyAdmin");
                break;
            case "2":
                $datos['editor'] = 2;
                break;
            default:
                header("location: /lobbyUsuario");
                break;
        }

        if(!isset($_SESSION['email'])){
            header("location: /");
            exit();
        }
        echo $this->renderer->render("lobbyUsuario",$datos);
    }




}