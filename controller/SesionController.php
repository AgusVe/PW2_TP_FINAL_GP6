<?php

class SesionController{

    private $sesionModel;

    public function __construct($sesionModel){
        $this->$sesionModel = $sesionModel;
    }

    public function iniciarSesion(){
        if(isset($_POST['usuario'] && $_POST['password'])){
            $usuario= $_POST['usuario'];
            $pass = $_POST['clave'];
            if($this->sesionModel->validar($usuario,$pass)){
                vista #1
            }else{
                vista #2
            }
        }
    }

}