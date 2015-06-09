<?php

require_once 'PHPMailer-master/PHPMailerAutoload.php';
date_default_timezone_set('Etc/UTC');

require_once("PHPMailer-master/class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

function mailPHP($destinatario, $nombre, $asunto, $cuerpo) {

    $mail = new PHPMailer;
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    //Permitir el acceso al correo desde aplicacion no seguras desde
    //https://www.google.com/settings/security/lesssecureapps
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'sibweb2014@gmail.com';                 // SMTP username
    $mail->Password = 'antonioandres';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to
    $mail->From = 'sibweb2014@gmail.com';
    $mail->FromName = 'Congreso';
    $mail->addAddress('sibweb2014@gmail.com', 'Antonio');     // Add a recipient
    $mail->addAddress($destinatario, $nombre);     // Add a recipient
    $mail->Subject = '[Mensaje de Web] Asunto' . $asunto;
    // use wordwrap() if lines are longer than 70 characters
    //$comment = wordwrap($comment,70)
    $mail->Body = $cuerpo;


    if (!$mail->send()) {
        //echo "<script type='text/javascript'>alert('Message could not be sent');</script>";
        echo 'Mensaje no ha podido ser enviado';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        //echo "<script type='text/javascript'>alert('Message has been sent');</script>";
        echo 'Mensaje ha sido enviado';
    }



//send the message, check for errors
    if (!$mail->send()) {
        var_dump($mail->ErrorInfo);
        return false;
    } else {
        return true;
    }
}
