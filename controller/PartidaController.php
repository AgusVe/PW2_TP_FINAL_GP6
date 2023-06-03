<?php

class PartidaController
{
    private $partidaModel;
    private $preguntaModel;
    private $renderer;

    public function __construct($partidaModel, $preguntaModel, $renderer)
    {
        $this->partidaModel = $partidaModel;
        $this->preguntaModel = $preguntaModel;
        $this->renderer = $renderer;
    }

    public function nuevaPartida()
    {

        if (!isset($_SESSION['email'])) {
            header("location: /");
            exit();
        }

        $idUsuario = $_SESSION['id'];
        $fecha = date("Y/m/d");
        $valores = "VALUES ('$idUsuario', '0', '$fecha')";


        $this->partidaModel->generarPartida($valores);
        $this->renderer->render("partida");


    }

    public function obtenerPreguntas()
    {
        $preguntas = $this->preguntaModel->obtenerPreguntas();
        header('Content-Type: application/json');
        echo json_encode($preguntas);
        exit();
    }


}