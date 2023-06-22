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
        if(!isset($_SESSION['email'])){
            header("location: /");
            exit();
        }
        $this->renderer->render("pregunta_exito");
    }

    public function sugerencia_exito(){
        if(!isset($_SESSION['email'])){
            header("location: /");
            exit();
        }
        $this->renderer->render("sugerencia_exito");
    }

    public function verPregunta(){
        if (isset($_GET['numeroPregunta'])) {
            $buscado = $_GET['numeroPregunta'];
            $preguntasEncontradas = $this->preguntaModel->buscarPreguntasEnBD($buscado);
            echo json_encode($preguntasEncontradas);
        }
    }


    public function eliminarPregunta(){
        if (isset($_POST['numeroPregunta'])) {
            $valor = $_POST['numeroPregunta'];
            $this->preguntaModel->eliminarPreguntaEnBD($valor);
        }
    }

    public function formularioPregunta(){
        if(!isset($_SESSION['email'])){
            header("location: /");
            exit();
        }
        if (isset($_GET['idPregunta'])) {
            $valor = $_GET['idPregunta'];
            $datos['editor'] = 2;
            $datos['pregunta'] = $this->preguntaModel->buscarPreguntasEnBD($valor);
            $this->renderer->render("pregunta", $datos);
        }
    }

    public function modificarPregunta(){

        if (isset($_POST['edit'])) {
            $valores = array(
                'idPregunta' => $_POST['idPregunta'],
                'enunciado' => $_POST['pregunta'],
                'opcionA' => $_POST['opcionA'],
                'opcionB' => $_POST['opcionB'],
                'opcionC' => $_POST['opcionC'],
                'opcionD' => $_POST['opcionD'],
                'respuesta' => $_POST['respuesta']
            );

            $this->preguntaModel->modificarPreguntaEnBD($valores);

            header('location: /pregunta/exito');
            exit();

        }
    }

    public function agregarSugerencia(){

        if (isset($_POST['add'])) {
            $usuario = $_POST['usuario'];
            $enunciado = $_POST['pregunta'];
            $opcionA = $_POST['opcionA'];
            $opcionB = $_POST['opcionB'];
            $opcionC = $_POST['opcionC'];
            $opcionD = $_POST['opcionD'];
            $respuesta = $_POST['respuesta'];
            $categoria = $_POST['categoria'];


            $valores = "VALUES ('$enunciado', '$opcionA', '$opcionB', '$opcionC', '$opcionD', '$respuesta', '$categoria','$usuario')";
            $this->preguntaModel->agregarSugerenciaEnBD($valores);

            header('location: /pregunta/sugerencia_exito');
            exit();

        }
    }

    public function listarSugeridas(){
        if(!isset($_SESSION['email'])){
            header("location: /");
            exit();
        }
        $data['editor'] = 2;
        $data["sugeridas"] = $this->preguntaModel->listarPreguntasSugeridasEnBD();
        $this->renderer->render("sugerencia_lista",$data);
    }

    public function verPreguntaSugerida(){
        if(!isset($_SESSION['email'])){
            header("location: /");
            exit();
        }
        if(isset($_GET['pregunta'])) {
            $idSugerida = $_GET['pregunta'];
            $datos['editor'] = 2;
            $datos['sugerida'] = $this->preguntaModel->obtenerPreguntaSugeridaEnBD($idSugerida);
            $this->renderer->render("pregunta_sugerida", $datos);
        }else{
            header("location: /lobbyUsuario");
            exit();
        }
    }

    public function procesarSugerencia(){

        if (isset($_POST['agregar'])) {
            $id = $_POST['idSugerencia'];
            $enunciado = $_POST['pregunta'];
            $opcionA = $_POST['opcionA'];
            $opcionB = $_POST['opcionB'];
            $opcionC = $_POST['opcionC'];
            $opcionD = $_POST['opcionD'];
            $respuesta = $_POST['respuesta'];
            $categoria = $_POST['categoria'];

            $flag = "Aceptar";

            $valores = "VALUES ('$enunciado', '$opcionA', '$opcionB', '$opcionC', '$opcionD', '$respuesta', '$categoria')";
            $this->preguntaModel->agregarPreguntaEnBD($valores);
            $this->preguntaModel->actualizarSugerencia($flag,$id);

            header('location: /pregunta/exito');
            exit();

        }else if(isset($_POST['eliminar'])){
            $id = $_POST['idSugerencia'];
            $flag = "Eliminar";
            $this->preguntaModel->actualizarSugerencia($flag,$id);

            header('location: /pregunta/exito');
            exit();
        }
    }

    public function reportar(){
        if(!isset($_SESSION['email'])){
            header("location: /");
            exit();
        }
        if (isset($_GET['idPregunta'])) {
            $id = $_GET['idPregunta'];
            $data['usuarioComun'] = 2;
            $data["pregunta"] = $this->preguntaModel->obtenerPreguntaPorId($id);
            $this->renderer->render("reportar_pregunta", $data);
        }
    }

    public function agregarMotivoReporte(){
        if(!isset($_SESSION['email'])){
            header("location: /");
            exit();
        }
        if (isset($_POST['report'])) {

            $valores = array(
                'idPregunta' => $_POST['idPregunta'],
                'motivo' => $_POST['motivo']
            );

            $this->preguntaModel->agregarReporteEnBD($valores);

            header('location: /pregunta/exito');
            exit();

        }
    }

    public function listarReportadas(){
        $data['editor'] = 2;
        $data["reportadas"] = $this->preguntaModel->listarPreguntasReportadasEnBD();
        $this->renderer->render("reportadas_lista",$data);
    }

    public function verPreguntaReportada(){

        if(isset($_GET['pregunta'])) {
            $idReportada = $_GET['pregunta'];
            $datos['editor'] = 2;
            $datos['reportadas'] = $this->preguntaModel->obtenerPreguntaPorId($idReportada);
            $this->renderer->render("pregunta_reportada", $datos);
        }else{
            header("location: /lobbyUsuario");
            exit();
        }
    }

    public function procesarReporte(){

        if (isset($_POST['eliminar'])) {
            $id = $_POST['idReportada'];
            $flag = "Eliminar";

            $this->preguntaModel->actualizarReportada($flag,$id);

            header('location: /pregunta/exito');
            exit();

        }else if(isset($_POST['desestimar'])){
            $id = $_POST['idReportada'];
            $flag = "Desestimar";

            $this->preguntaModel->actualizarReportada($flag,$id);

            header('location: /pregunta/exito');
            exit();
        }
    }

}