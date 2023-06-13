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
        $datos['datosUsur']=$_SESSION["datosUsur"];
        $datosPartidas=$this->perfilModel->obtenerDatosPartidas($_SESSION['id']);
        $datos['userPartidas']=$datosPartidas;

        if(!isset($_SESSION['email'])){
            header("location: /");
            exit();
        }
        echo $this->renderer->render("lobbyUsuario",$datos);
    }



}