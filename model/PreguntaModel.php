<?php

class PreguntaModel{
    private $database;
    public function __construct($database)
    {
        $this->database = $database;
    }

    public function obtenerPregunta(){
        $preguntaEncontrada = false;

        while(!$preguntaEncontrada){
            $numeroPregunta = rand(1, 5);

            $sql = "SELECT * FROM preguntas WHERE pregunta_id = $numeroPregunta";
            $resultado = $this->database->query($sql);

            return $resultado;
            echo "$resultado";

            /*
            if (mysqli_num_rows($resultado) > 0) {
                // Mostrar la pregunta y marcarla como mostrada
                $row = mysqli_fetch_assoc($resultado);
                $pregunta = $row['pregunta'];
                echo "Pregunta: $pregunta";

                // Actualizar el estado de la pregunta como mostrada en la base de datos
                $actualizarConsulta = "UPDATE preguntas SET mostrada = 1 WHERE id = $numeroPregunta";
                mysqli_query($conexion, $actualizarConsulta);

                // Salir del ciclo
                $preguntaMostrada = true;
            }*/

        }

    }

    public function verificarRespuesta(){

    }
}