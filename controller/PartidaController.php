<?php
class PartidaController {
    private $partidaModel;
    private $renderer;

    public function __construct($partidaModel,$renderer){
        $this->partidaModel = $partidaModel;
        $this->renderer = $renderer;
    }

    public function nuevaPartida(){

        if(!isset($_SESSION['email'])){
            header("location: /");
            exit();
        }
        $idUsuario = $_SESSION['idUsuario'];
        $fecha = date('d-m-Y');
        $valores = "VALUES ('$idUsuario', '0', '$fecha')";

        $this->partidaModel->generarPartida($valores);
    }

}