<?php

class RegistroController{
    private $registroModel;
    private $renderer;

    public function __construct($registroModel, $renderer){
        $this->registroModel = $registroModel;
        $this->renderer = $renderer;
    }

    public function execute(){
        echo $this->renderer->render("registro");
    }
}