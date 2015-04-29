<?php
    if(isset($_POST['enviar'])){
        $DESTINATARIO='ivanortegaalba@gmail.com';
        $para = $DESTINATARIO;
        $titulo    = "Solicitud de contacto de " . $_POST['nombre'];
        $mensaje   = $_POST['cuestion'];
        $cabeceras = 'From: ' . $_POST['email'] . "\r\n" .
            'Reply-To: ivanortegaalba@gmail.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        //$enviado = mail($para, $titulo, $mensaje);
        $enviado=mail('ivanortegaalba@gmail.com', 'Mi título', 'Un mensaje');
        echo $enviado;
        if($enviado){
            $notificacion="El mensaje ha sido enviado correctamente";
            $notificacionClass ="success";
        }else{
            $notificacion="Ha ocurrido un error en el envio del mensaje";
            $notificacionClass ="error";
        }

        }
?>
