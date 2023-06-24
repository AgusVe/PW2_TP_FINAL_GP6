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
                   (enunciado, respuestaA, respuestaB, respuestaC, respuestaD, respuesta_correcta, categoria_id,preguntaSugerida)' . $valores . ";";
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

    public function agregarSugerenciaEnBD($valores){
        $insert = 'INSERT INTO `pregunta_sugerida`
                   (enunciado_s, respuestaA_s, respuestaB_s, respuestaC_s, respuestaD_s, respuesta_correcta_s, categoria_id_s, creado_por,preguntaSugerida)' . $valores . ";";
        $this->database->execute($insert);
    }

    public function listarPreguntasSugeridasEnBD(){
        $sql ="SELECT * FROM pregunta_sugerida WHERE estado = 0";
        return $this->database->query($sql);
    }

    public function obtenerPreguntaSugeridaEnBD($idSugerida){
        $sql ="SELECT * FROM pregunta_sugerida WHERE id_sugerencia = $idSugerida";
        return $this->database->query($sql);
    }

    public function actualizarSugerencia($flag,$id){
        if($flag=="Aceptar"){
            $sql = "UPDATE pregunta_sugerida SET estado = 1 WHERE id_sugerencia='$id'";

        }else if($flag=="Eliminar"){
            $sql = "DELETE FROM pregunta_sugerida WHERE id_sugerencia = $id";
        }

        $this->database->execute($sql);
    }

    public function agregarReporteEnBD($valores){
        $id = $valores['idPregunta'];
        $motivo = $valores['motivo'];

        $sql = "UPDATE preguntas SET motivo_reporte = '$motivo', reportada = 1 WHERE pregunta_id='$id'";

        $this->database->execute($sql);
    }

    public function listarPreguntasReportadasEnBD(){
        $sql ="SELECT * FROM preguntas WHERE reportada = 1";
        return $this->database->query($sql);
    }

    public function actualizarReportada($flag,$id){
        if($flag=="Desestimar"){
            $sql = "UPDATE preguntas SET reportada = 0, motivo_reporte='' WHERE pregunta_id='$id'";

        }else if($flag=="Eliminar"){
            $sql = "DELETE FROM preguntas WHERE pregunta_id = $id";
        }

        $this->database->execute($sql);
    }

}