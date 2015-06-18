<?php

require_once 'PHPMailer-master/PHPMailerAutoload.php';
date_default_timezone_set('Etc/UTC');

require_once("PHPMailer-master/class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

function mailPHP($destinatario, $nombre, $asunto, $cuerpo) {

    $mail = new PHPMailer;
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'sibweb2014@gmail.com';                 // SMTP username
    $mail->Password = 'antonioandres';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to
    $mail->From = 'sibweb2014@gmail.com';
    $mail->FromName = 'Congreso';
    $mail->addAddress('ivanortegaalba@gmail.com', 'Contacto de '.$nombre);     // Add a recipient
    $mail->addAddress($destinatario, $nombre);     // Add a recipient
    $mail->Subject = $asunto;
    $mail->Body = $cuerpo;
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );

    if (!$mail->send()) {
        echo 'Mensaje no ha podido ser enviado';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Mensaje ha sido enviado';
    }



//send the message, check for errors
    if (!$mail->send()) {
        return false;
    } else {
        return true;
    }
}
