<?php

class PreguntaController{
    private $preguntaModel;
    private $renderer;


    public function __construct($preguntaModel,$renderer){
        $this->preguntaModel = $preguntaModel;
        $this->renderer = $renderer;
    }


    public function obtenerPregunta(){

        $pregunta = $this->preguntaModel->buscarPregunta();

        //Consultar el nivel del usuario y devolverlo $nivel

        //Ir a buscar una pregunta a la base de datos que matchee con la logica de nivel

        //verificar si la respondio
    }

    public function procesarFormulario(){
        if (isset($_POST['add'])) {
            $enunciado = $_POST['pregunta'];
            $opcionA = $_POST['opcionA'];
            $opcionB = $_POST['opcionB'];
            $opcionC = $_POST['opcionC'];
            $opcionD = $_POST['opcionD'];
            $respuesta = $_POST['respuesta'];
            $categoria = $_POST['categoria'];


            $valores = "VALUES ('$enunciado', '$opcionA', '$opcionB', '$opcionC', '$opcionD', '$respuesta', '$categoria')";
            $this->preguntaModel->agregarPreguntaEnBD($valores);

            header('location: /pregunta/exito');
            exit();

        }
    }

    public function exito(){
        $this->renderer->render("pregunta_exito");
    }

}