<?php
class PartidaController {
    private $partidaModel;
    private $preguntaModel;
    private $renderer;

    public function __construct($partidaModel, $preguntaModel, $renderer){
        $this->partidaModel = $partidaModel;
        $this->preguntaModel = $preguntaModel;
        $this->renderer = $renderer;
    }

    public function nuevaPartida(){

        if(!isset($_SESSION['email'])){
            header("location: /");
            exit();
        }

        $idUsuario = $_SESSION['id'];
        $fecha = date("Y/m/d");
        $valores = "VALUES ('$idUsuario', '0', '$fecha')";


        $this->partidaModel->generarPartida($valores);
        $primerPregunta = $this->obtenerPrimeraPregunta();
        $data = array('color' => $primerPregunta["0"]["color"]);
        $this->renderer->render("partida_encurso",$data);


    }

    public function obtenerPrimeraPregunta(){
        return $this->preguntaModel->obtenerPregunta();
    }

}