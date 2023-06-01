<?php

class PreguntaModel{
    private $database;
    public function __construct($database)
    {
        $this->database = $database;
    }

    public function obtenerPregunta(){
        $preguntaEncontrada = false;

        $sql = "SELECT preguntas.*, categoria.color  FROM preguntas JOIN categoria ON preguntas.categoria_id = categoria.categoria_id WHERE pregunta_id='13'";
        $resultado = $this->database->query($sql);;
        return $resultado;


    }

    public function verificarRespuesta(){

    }
}