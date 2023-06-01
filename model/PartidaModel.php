<?php

class PartidaModel{

    private $database;
    public function __construct($database)
    {
        $this->database = $database;
    }

    public function generarPartida($valores){
        $insert = "INSERT INTO 'partida' (idUsuario, puntosObtenidos, fecha)".$valores.";";
        $this->database->execute($insert);
    }

}