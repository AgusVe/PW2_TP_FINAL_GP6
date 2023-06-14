<?php

class EditorController{
    private $renderer;
    private $editorModel;

    public function __construct($editorModel,$renderer){
        $this->editorModel = $editorModel;
        $this->renderer = $renderer;
    }


    public function agregarPregunta(){
        $datos['editor'] = 2;
        $this->renderer->render("agregarPregunta", $datos);
    }

    public function eliminarPregunta(){
        $data["usuarios"] = $this->rankingModel->listar();
        $this->renderer->render("ranking", $data);
    }

    public function modificarPregunta(){
        $data["usuarios"] = $this->rankingModel->listar();
        $this->renderer->render("ranking", $data);
    }

    public function verPregunta(){
        $data["usuarios"] = $this->rankingModel->listar();
        $this->renderer->render("ranking", $data);
    }
}