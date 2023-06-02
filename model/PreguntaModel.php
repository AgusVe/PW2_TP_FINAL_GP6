<?php

class PreguntaModel{
    private $database;
    public function __construct($database)
    {
        $this->database = $database;
    }

    public function obtenerPreguntas(){

        $sql = "SELECT preguntas.*, categoria.color  FROM preguntas JOIN categoria ON preguntas.categoria_id = categoria.categoria_id";
        return $this->database->query($sql);


    }

    public function verificarRespuesta(){

    }
}