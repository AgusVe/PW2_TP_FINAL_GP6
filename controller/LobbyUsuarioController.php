<?php

class LobbyUsuarioController{
    private $renderer;


    public function __construct($renderer){
        $this->renderer = $renderer;

    }

    public function execute()
    {
        echo $this->renderer->render("lobbyUsuario");
    }



}