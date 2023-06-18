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


    public function agregarPreguntaEnBD($valores){
        $insert = 'INSERT INTO `preguntas`
                   (enunciado, respuestaA, respuestaB, respuestaC, respuestaD, respuesta_correcta, categoria_id)' . $valores . ";";
        $this->database->execute($insert);
    }

    public function buscarPreguntasEnBD($buscado){
        $sql ="SELECT * FROM preguntas WHERE pregunta_id LIKE '%$buscado%' OR enunciado LIKE '%$buscado%'";
        return $this->database->query($sql);
    }

    public function eliminarPreguntaEnBD($valor){
        $delete ="DELETE FROM preguntas WHERE pregunta_id = $valor";
        $this->database->execute($delete);
    }

    public function modificarPreguntaEnBD($valores){
        $id = $valores['idPregunta'];
        $enunciado = $valores['enunciado'];
        $opcionA = $valores['opcionA'];
        $opcionB = $valores['opcionB'];
        $opcionC = $valores['opcionC'];
        $opcionD = $valores['opcionD'];
        $respuesta = $valores['respuesta'];


        $sql = "UPDATE preguntas SET enunciado = '$enunciado', respuestaA = '$opcionA', respuestaB = '$opcionB', respuestaC = '$opcionC', respuestaD = '$opcionD', respuesta_correcta = '$respuesta' WHERE pregunta_id='$id'";

        $this->database->execute($sql);
    }

}