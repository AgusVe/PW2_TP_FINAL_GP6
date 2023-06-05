<?php

class LobbyUsuarioController{
    private $renderer;


    public function __construct($renderer){
        $this->renderer = $renderer;

    }

    public function execute()
    {
        $datos=$_SESSION["usuario"];

        if(!isset($_SESSION['email'])){
            header("location: /");
            exit();
        }
        echo $this->renderer->render("lobbyUsuario",$datos);
    }



}