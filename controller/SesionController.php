<?php

class SesionController{

    private $sesionModel;
    private $renderer;
    public static $datosDelUsuario;


    public function __construct($sesionModel,$renderer){
        $this->sesionModel = $sesionModel;
        $this->renderer = $renderer;
    }

    public function iniciarSesion(){
        if(isset($_POST['email']) && isset ($_POST['password'])){
            $errors = array();

            $email= $_POST['email'];
            $pass = $_POST['password'];
            $emailValidado=$this->sesionModel->validarEmail($email);

            if($emailValidado==0){
                $errors['email'] = 'El email ingresado no coincide con usuario registrado';
            }

            $resultado = $this->sesionModel->validar($email,$pass);

            if(empty($resultado)){
                $errors['contraseña'] = 'La contraseña ingresada es incorrecta';
            }

            // VERIFICO SI HAY ERRORES Y LOS MANDO A LA VISTA
            if (count($errors) > 0) {
                $erroresEncontrados = $errors;

                $data = array('errors' => $erroresEncontrados);
                $this->renderer->render("login", $data);
                exit;
            }
            if($resultado){
                $_SESSION['email']= $resultado["0"]["email"];
                $_SESSION['rol']=$resultado["0"]["idRol"];
                $_SESSION['url_imagen']=$resultado["0"]["url_imagen"];
                $_SESSION['id']=$resultado["0"]["idUsuario"];
                $datos=$resultado["0"];

                $_SESSION["usuario"] = array('datosUsur' => $datos);
                switch ( $_SESSION['rol']){
                    case "1":
                        header("location: /lobbyAdmin");
                        break;
                    case "2":
                        header("location: /lobbyEditor");
                        break;
                    default:
                        header("location: /lobbyUsuario");
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

    public function recordarpassword(){
        $this->renderer->render("sesion_contrasenia");
    }

    public function enviarEmailContra (){

    }

    public function cerrarSesion(){
        session_unset();
        session_destroy();
        header("location: /login");
    }

}