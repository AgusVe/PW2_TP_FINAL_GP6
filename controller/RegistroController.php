<?php

class RegistroController
{
    private $registroModel;
    private $renderer;

    public function __construct($registroModel, $renderer)
    {
        $this->registroModel = $registroModel;
        $this->renderer = $renderer;
    }

    public function execute()
    {
        echo $this->renderer->render("registro");
    }

    public function procesarFormulario()
    {
        if (isset($_POST['enviarRegistro'])) {
            $errors = array();

            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $fechaNac = $_POST['fechaNac'];
            $genero = $_POST['genero'];
            $pais = $_POST['pais'];
            $ciudad = $_POST['ciudad'];
            $email = $_POST['email'];
            $contrasenia = $_POST['contrasenia'];
            $contraseniaRepe = $_POST['contraseniaRepe'];
            $usuario = $_POST['usuario'];
            $estado = 1;
            $fechaRegistro = date("Y/m/d");
            $idRol = 3;

            if ($contrasenia != $contraseniaRepe) {
                $errors['contraseña'] = 'La contraseñas deben ser iguales';
            }
            /*LE APLICO HASH A LA CONTRASEÑA*/
            $contraseniaHasheada = password_hash($contrasenia, PASSWORD_DEFAULT);

            /*VERIFICO SI EL USUARIO EXISTE*/
            $usuarioBuscado = $this->registroModel->verificarSiExisteUsuario($usuario);
            if (count($usuarioBuscado) >= 1) {
                $errors['usuario'] = 'El campo usuario es obligatorio';

            }
            /*VERIFICO SI EL EMAIL ESTA EN UN FORMATO CORRECTO*/
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = 'El correo electrónico no tiene un formato válido';
            }
            // VERIFICO SI HAY ERRORES Y LOS MANDO A LA VISTA
            if (count($errors) > 0) {
                $erroresEncontrados = $errors;

                $data = array('errors' => $erroresEncontrados);

                $this->renderer->render("registro", $data);
                exit;
            }

            $valores = "VALUES ('$nombre', '$apellido', '$fechaNac', '$genero', '$pais', '$ciudad', '$email', '$contraseniaHasheada', '$usuario', '$estado', '$fechaRegistro', '$idRol')";
            $this->registroModel->altaUsuario($valores);

            header('location: /registro/confirmacion');
            exit();
        }

    }

    public function confirmacion(){
        $this->renderer->render("registro_pendiente");
    }

}

