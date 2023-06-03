<?php

class PreguntaController{
    private $preguntaModel;
    private $renderer;


    public function __construct($preguntaModel,$renderer){
        $this->preguntaModel = $preguntaModel;
        $this->renderer = $renderer;
    }


    public function obtenerPregunta(){

        $pregunta = $this->preguntaModel->buscarPregunta();

        //Consultar el nivel del usuario y devolverlo $nivel

        //Ir a buscar una pregunta a la base de datos que matchee con la logica de nivel

        //verificar si la respondio
    }

}