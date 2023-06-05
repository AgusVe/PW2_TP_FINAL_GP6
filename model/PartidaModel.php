<?php

class PartidaModel{

    private $database;
    public function __construct($database)
    {
        $this->database = $database;
    }

    public function generarPartida($idUsuario, $fecha){

        $insert = 'INSERT INTO `partida`
                   (idUsuario, puntosObtenidos, fecha)' . "VALUES ('$idUsuario', '0', '$fecha')" . ";";

        $this->database->execute($insert);

        return $this->database->getLastInsertId();
    }

    public function actualizarPreguntaPartida($idPartida, $idPregunta, $idUsuario) {
        $sql = 'UPDATE `partida` SET idPreguntaActual = '.$idPregunta.' WHERE idPartida='.$idPartida;
        $this->database->execute($sql);

        $sql = 'INSERT INTO `pregunta_usuario` (idPartida, idPregunta, idUsuario) VALUES ('.$idPartida.','.$idPregunta.','.$idUsuario.')';
        $this->database->execute($sql);


    }

    public function updatePreguntaUsuario($idPartida, $idPregunta, $idUsuario, $strRespuesta) {

        $sql = 'UPDATE `pregunta_usuario` SET respuesta = "'.$strRespuesta.'" WHERE idPartida='.$idPartida.' AND idPregunta='.$idPregunta.' AND idUsuario='.$idUsuario.'';
        $this->database->execute($sql);

    }


    public function obtenerPartida($idPartida){

        $query = 'SELECT * FROM `partida` WHERE idPartida = '.$idPartida;

        return $this->database->getOne($query);
    }

    public function marcarComoTerminada($idPartida){
        $sql = 'UPDATE `partida` SET terminada = 1 WHERE idPartida='.$idPartida;

        $this->database->execute($sql);        
    }


    public function actualizarPuntaje($idPartida){
        $sql = 'UPDATE `partida` SET puntosObtenidos = puntosObtenidos + 1 WHERE idPartida='.$idPartida;

        $this->database->execute($sql);        
    }    

}