<?php
    if(isset($_POST['enviar'])){
        //Cuenta asociada a la persona de contacto del CEIIE
        $DESTINATARIO='ivanortegaalba@me.com';

        //MENSAJE PARA EL CEII
        $para = $DESTINATARIO;
        $titulo    = "[Mensaje de Web] " . $_POST['asunto'];
        $mensaje   = "Nombre: " . $_POST['nombre'] . "\n\n" .
            "Email: " . $_POST['email'] . "\n\n" .
            $_POST['cuestion'];
        $cabeceras = 'From: ' . $_POST['nombre'] . '<' . $_POST['email'] . ">\r\n" .
            'Reply-To:' . $_POST['nombre'] . '<' . $_POST['email'] . ">\r\n" .
            'X-Mailer: PHP/' . phpversion();
        //Envio a la organización
        $enviadoHost=mail($para, $titulo, $mensaje, $cabeceras);

        //COPIA PARA EL INTERESADO
        $para = $_POST['email'];
        $titulo    = "[Copia de Mensaje de Web] " . $_POST['asunto'];
        $mensaje   = "Nombre: " . $_POST['nombre'] . "\n\n" .
            "Email: " . $_POST['email'] . "\n\n" .
            $_POST['cuestion'] . "\n\n Gracias por contactar, le responderemos tan pronto como sea posible";
        $cabeceras = 'From: CEIIE<' . $DESTINATARIO . ">\r\n" .
            'Reply-To:CEIIE<' . $DESTINATARIO . ">\r\n" .
            'X-Mailer: PHP/' . phpversion();
        //Envio de la copia al interesado
        $enviadoCliente=mail($para, $titulo, $mensaje, $cabeceras);

        //Comprobación del envio
        if($enviadoHost && $enviadoCliente){
            $notificacion="El mensaje ha sido enviado correctamente";
            $notificacionClass ="success";
        }else{
            $notificacion="Ha ocurrido un error en el envio del mensaje";
            $notificacionClass ="error";
        }

        }
?>
