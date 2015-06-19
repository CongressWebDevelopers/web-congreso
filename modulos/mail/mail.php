<?php

/**
 * Modulo que manda dos correos al recibir la petición POST del formulario de contacto.
 */
include_once 'mail-mailer.php';

if (isset($_POST['enviar'])) {
    //Datos del interesado
    $nombreInteresado = $_POST['nombre'];
    $emailInteresado = $_POST['email'];
    $asuntoInteresado = $_POST['asunto'];
    $cuestionInteresado = $_POST['cuestion'];

    //Cuenta asociada a la persona de contacto del CEIIE
    $HOST = 'ivanortegaalba@gmail.com';

    //MENSAJE PARA EL CEII
    $para = $HOST;
    $titulo = "[Mensaje de Web] " . $asuntoInteresado;
    $mensaje = "Nombre: " . $nombreInteresado . "\n\n" .
            "Email: " . $emailInteresado . "\n\n" .
            $_POST['cuestion'];
    $cabeceras = 'From: Web CEIIE<' . $para . ">\r\n" .
            'Reply-To:' . $nombreInteresado . '<' . $emailInteresado . ">\r\n" .
            'X-Mailer: PHP/' . phpversion();
    //Envio a la organización
    $enviadoHost = mailPHP($para, "CEIIE", $titulo, $mensaje);

    //COPIA PARA EL INTERESADO
    $para = $emailInteresado;
    $titulo = "[Copia de Mensaje de Web] " . $asuntoInteresado;
    $mensaje = "Nombre: " . $nombreInteresado . "\n\n" .
            "Email: " . $emailInteresado . "\n\n" .
            $_POST['cuestion'] . "\n\n Gracias por contactar, le responderemos tan pronto como sea posible";
    $cabeceras = 'From: CEIIE<' . $HOST . ">\r\n" .
            'Reply-To:CEIIE<' . $HOST . ">\r\n" .
            'X-Mailer: PHP/' . phpversion();
    //Envio de la copia al interesado
    $enviadoCliente = mailPHP($para, $nombreInteresado, $titulo, $mensaje);

    //Comprobación del envio
    if ($enviadoHost && $enviadoCliente) {
        $notificacion = "El mensaje ha sido enviado correctamente";
        $notificacionClass = "success";
    } else {
        $notificacion = "Ha ocurrido un error en el envio del mensaje";
        $notificacionClass = "error";
    }
}
?>
