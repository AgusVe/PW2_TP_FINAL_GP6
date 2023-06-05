<?php

class PreguntaModel{
    private $database;
    public function __construct($database)
    {
        $this->database = $database;
    }

    public function obtenerPreguntas(){

        $idPregunta = rand(13,41);
        $sql = "SELECT P.*, C.color  FROM preguntas P
        JOIN categoria C ON P.categoria_id = C.categoria_id
        WHERE P.pregunta_id = $idPregunta";
        return $this->database->query($sql);


    }

    public function obtenerPregunta(){
        //TODO mejorar como se selecciona aleatoriamente
        try {
            $idPregunta = rand(13,41);
            $sql = "SELECT P.*, C.color  FROM preguntas P
            JOIN categoria C ON P.categoria_id = C.categoria_id
            WHERE P.pregunta_id = $idPregunta";
            return $this->database->getOne($sql);
        } catch (Exception $e) {
        } 
    }

    public function obtenerPreguntaPorId($strIdPregunta){
        //TODO mejorar como se selecciona aleatoriamente
        try {
            $sql = "SELECT P.* FROM preguntas P
            WHERE P.pregunta_id = $strIdPregunta";
            return $this->database->getOne($sql);
        } catch (Exception $e) {
        } 
    }


    public function verificarRespuesta(){

    }
}