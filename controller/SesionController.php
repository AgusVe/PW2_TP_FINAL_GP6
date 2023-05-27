<?php

class SesionController{

    private $sesionModel;

    public function __construct($sesionModel){
        $this->sesionModel = $sesionModel;
    }

    public function iniciarSesion(){
        if(isset($_POST['email']) && isset ($_POST['password'])){
            $email= $_POST['email'];
            $pass = $_POST['password'];
            $resultado = $this->sesionModel->validar($email,$pass);
            if($resultado){
                $rol = $resultado["0"]["idRol"];
                $_SESSION['email']= $resultado["0"]["email"];
                $_SESSION['rol']=$rol;
                session_start();
                switch ($rol){
                    case "1":
                        header("location: /homeAdmin");
                        break;
                    case "2":
                        header("location: /homeEditor");
                        break;
                    default:
                        header("location: /homeUsuario");
                        break;
                }
            }else{
                session_destroy();
                //mostrar vista de error.
            }
        }else{
            header("location: /registro");
        }
    }

}