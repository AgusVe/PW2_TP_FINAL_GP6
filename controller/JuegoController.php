<?php

class JuegoController
{
    private $renderer;


    public function __construct($renderer){
        $this->renderer = $renderer;
    }

    public function execute()
    {
        if(!isset($_SESSION['email'])){
            header("location: /");
            exit();
        }
        echo $this->renderer->render("juego");
    }


}