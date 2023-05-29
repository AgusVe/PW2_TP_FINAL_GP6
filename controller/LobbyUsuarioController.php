<?php

class LobbyUsuarioController{
    private $renderer;


    public function __construct($renderer){
        $this->renderer = $renderer;

    }

    public function execute()
    {
        session_start();
        $datos=$_SESSION["usuario"];
        echo $this->renderer->render("lobbyUsuario",$datos);
    }



}