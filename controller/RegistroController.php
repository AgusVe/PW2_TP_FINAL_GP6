<?php

class RegistroController{
    private $registroModel;

    public function __construct($registroModel){
        $this->$registroModel = $registroModel;
    }
}