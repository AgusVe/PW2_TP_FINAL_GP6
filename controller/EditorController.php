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

    public function modificarPregunta(){
        $this->renderer->render("modificarPregunta");
    }

}