<?php

class LobbyAdminController
{
    private $renderer;
    private $lobbyAdminModel;

    public function __construct($renderer, $lobbyAdminModel){
        $this->renderer = $renderer;
        $this->lobbyAdminModel=$lobbyAdminModel;

    }
    public function execute()
    {
        $datos['datosUsur']=$this->perfilModel->obtenerDatos($_SESSION["id"]);
        $datosPartidas=$this->perfilModel->obtenerDatosPartidas($_SESSION['id']);
        $datos['userPartidas']=$datosPartidas;

        if(!isset($_SESSION['email'])){
            header("location: /");
            exit();
        }
        echo $this->renderer->render("lobbyUsuario",$datos);
    }





}

