<?php

class LoginController{
    private $renderer;

    public function __construct($renderer){
        $this->renderer = $renderer;
    }

    public function execute()
    {
        if(isset($_SESSION['email'])) {
            switch ( $_SESSION['rol']){
                case "1":
                    header("location: /lobbyAdmin");
                    break;
                case "2":
                    header("location: /lobbyEditor");
                    break;
                default:
                    header("location: /lobbyUsuario");
                    break;
            }            
        }
        echo $this->renderer->render("login");
    }
}