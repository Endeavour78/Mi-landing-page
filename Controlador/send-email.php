<?php
require '../Controlador/PHPMailer-master/src/Exception.php';
require '../Controlador/PHPMailer-master/src/PHPMailer.php';
require '../Controlador/PHPMailer-master/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Obtener los datos del formulario
$nombre = $_POST['nombre'];
$correo = $_POST['email'];
$mensaje = $_POST['mensaje'];

// Crea una instancia de PHPMailer
$mail = new PHPMailer(true);

// Configura el servidor SMTP de ProtonMail
$mail->isSMTP();
$mail->Host = 'smtp.protonmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'AleloKey@protonmail.com'; // Reemplaza con tu dirección de correo de ProtonMail
$mail->Password = 'kindomkey2'; // Reemplaza con tu contraseña de ProtonMail
$mail->SMTPSecure = 'tls';
$mail->Port = 587;

// Configura el mensaje a enviar
$mail->setFrom($correo, $nombre);
$mail->addAddress('AleloKey@protonmail.com', 'Alejandro Zuluaga López'); // Reemplaza con la dirección de correo de destino y el nombre del destinatario
$mail->Subject = "Nuevo correo de contacto";
$mail->Body = "Nombre: $nombre \nCorreo: $correo \nMensaje: $mensaje"; // Cuerpo del mensaje

// Envía el correo
if ($mail->send()) {
    echo "<h4>¡Mail enviado exitosamente!</h4>";
    header("Location: ../Vista/Home.php?status=success");
} else {
    echo 'Ocurrió un error al enviar el mensaje: ' . $mail->ErrorInfo;
}
?>
