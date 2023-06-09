<?php

class RankingModel{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function listar(){
        $resultado = $this->database->query('SELECT usuario, puntosTotales FROM usuario ORDER BY  puntosTotales DESC');

        return $resultado;
    }

}