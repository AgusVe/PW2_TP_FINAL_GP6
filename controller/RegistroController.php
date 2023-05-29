<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './third-party/phpmailer/Exception.php';
require './third-party/phpmailer/PHPMailer.php';
require './third-party/phpmailer/SMTP.php';


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
            $estado = 0;
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

            /*Envio de email de confirmacion*/

            $mail = new PHPMailer(true);
            $mail->IsSMTP();
            $mail->SMTPAuth = true;
            $mail->Host = 'smtp.gmail.com';
            $mail->Username = 'unlamtrivia2023@gmail.com';
            $mail->Password = 'yajdxumayekelxtl';
            $mail->Port = 587;
            $mail->CharSet = 'UTF-8';

            $mail->setFrom('unlamtrivia2023@gmail.com', 'Unlam Trivia 2023');
            $mail->addAddress($email);

            $asunto = 'Registracion | Email de confirmacion';

            $mail->isHTML(true);
            $mail->Subject = $asunto;
            $cuerpo =  '
 
                    ¡Gracias por registrarse!</br>
                    Su cuenta ha sido creada, puede ingresar con las siguientes credenciales luego de que haya activado su cuenta presionando en el link que se encuenta debajo</br>
                    </br>
                    ------------------------</br>
                    Email: '.$email.'</br>
                    ------------------------</br>
                     </br>
                    Por favor, clickee este link para activar su cuenta:</br>
                    <a href="http://localhost/verificacion.php?email='.$email.'&hash='.$contraseniaHasheada.'" > Activación </a>
                     
                    ';

            $mail->msgHTML($cuerpo);

            if (!$mail->send()) {
                echo "<script>alert('$mail->ErrorInfo')</script>";
            } else {
                header('location: /registro/confirmacion');
                exit();
            }

        }

    }

    public function confirmacion(){
        $this->renderer->render("registro_pendiente");
    }

}

