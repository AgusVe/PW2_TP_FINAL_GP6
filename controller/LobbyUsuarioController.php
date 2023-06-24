<?php

class LobbyUsuarioController{
    private $renderer;
    private $perfilModel;



    public function __construct($renderer, $perfilModel){
        $this->renderer = $renderer;
        $this->perfilModel=$perfilModel;

    }

    public function execute()
    {
        if(!isset($_SESSION['email'])){
            header("location: /");
            exit();
        }
        $datos['datosUsur']=$this->perfilModel->obtenerDatos($_SESSION["id"]);
        $datos['userPartidas']=$this->perfilModel->obtenerDatosPartidas($_SESSION['id']);
        switch ($_SESSION['rol']){
            case "1":
                $datos['admin'] = 1;
                echo $this->renderer->render("lobbyUsuario",$datos);
                break;
            case "2":
                $datos['editor'] = 2;
                break;
            default:
                $datos['usuarioComun'] = 3;
                break;
        }

        echo $this->renderer->render("lobbyUsuario",$datos);
    }

    public function agregarSugerencia(){
        if(!isset($_SESSION['email'])){
            header("location: /");
            exit();
        }
        if($_SESSION['rol']=3) {
            $datos['editor'] = 3;
            $datos['datosUsur']=$this->perfilModel->obtenerDatos($_SESSION["id"]);
            $this->renderer->render("sugerirPregunta",$datos);
        }
    }
    public function agregarPregunta(){
        if(!isset($_SESSION['email'])){
            header("location: /");
            exit();
        }
     if($_SESSION['rol']=2) {
         $datos['editor'] = 2;

         $this->renderer->render("agregarPregunta",$datos);
     }
     }

    public function modificarPregunta(){
        if(!isset($_SESSION['email'])){
            header("location: /");
            exit();
        }
        if($_SESSION['rol']=2) {
            $datos['editor'] = 2;
            $this->renderer->render("modificarPregunta",$datos);
        }
    }



}