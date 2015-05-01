<?php
    if(isset($_POST['enviar'])){
        //Cuenta asociada a la persona de contacto del CEII
        $DESTINATARIO='ivanortegaalba@correo.ugr.es';

        $para = $DESTINATARIO;
        $titulo    = "[Mensaje de Web] " . $_POST['asunto'];
        $mensaje   = $_POST['cuestion'] . "\n Saludos";
        $cabeceras = 'From: CEII<' . $_POST['email'] . ">\r\n" .
            'Reply-To: ivanortegaalba@gmail.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
        //Envio a la organización
        $enviadoHost=mail($para, $titulo, $mensaje, $cabeceras);
        //Envio de la copia al interesado
        $enviadoCliente=mail($_POST['email'], $titulo, $mensaje, $cabeceras);
        if($enviadoHost && $enviadoCliente){
            $notificacion="El mensaje ha sido enviado correctamente";
            $notificacionClass ="success";
        }else{
            $notificacion="Ha ocurrido un error en el envio del mensaje";
            $notificacionClass ="error";
        }

        }
?>
