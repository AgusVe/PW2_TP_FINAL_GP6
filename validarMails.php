<?php
require_once ("./vendor/PHPMailer/src/Exception.php");
require_once ("./vendor/PHPMailer/src/PHPMailer.php");
require_once ("./vendor/PHPMailer/src/SMTP.php");

try {
    // Crear una instancia de la clase PHPMailer
    $mail = new PHPMailer($debug);
    if ($debug) {
        // Emitir un registro detallado de
        $mail->SMTPDebug = PHPMailer\PHPMailer\SMTP::DEBUG_SERVER; }
}
        // Autentificación vía SMTP
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        // Login
        $mail->Host = "smtp.domain.es";
        $mail->Port = "587";
        $mail->Username = "nombre.apellido@domain.es";
        $mail->Password = "contraseña4321";
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->CharSet = 'UTF-8';
        $mail->Encoding = 'base64';
        $mail->isHTML(true);
        $mail->Subject = 'Asunto del correo electrónico';
        $mail->Body = 'El texto de tu correo en HTML. Los elementos en <b>negrita</b> también están permitidos.';
        $mail->AltBody = 'El texto como elemento de texto simple';
        // Remitente
        $mail->setFrom('info@example.com', 'name');
        // Destinatario, opcionalmente también se puede especificar el nombre
        $mail->addAddress('info@example.com', 'name');
        // Copia
        $mail->addCC('info@example.com');
        // Copia oculta
        $mail->addBCC('info@example.com', 'name');
        $mail->send();
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: ".$mail->ErrorInfo;
}