<?php

include_once '../php/database/ORM.php';;

/**
 * Modulo que genera una nueva contraseña y la envía por email al usuario
 */
 
if (isset($_POST['enviar'])) {
    // email del usuario
    $email = $_POST['email_restablecer'];
   // $comprueba = "no";

    $comprobar_usuario = new ORM();
    $consulta = "SELECT password FROM usuario WHERE nombreUsuario='$email'";
    $resultado = $comprobar_usuario->query($consulta);
    
	if ((mysql_num_rows($resultado))==0) {  
		   //  $comprueba = "error, el usuario no está en nuestra base de datos";
	}else{
		$nueva_pass = md5(uniqid(mt_rand(), true)); // generamos clave aleatoria
		$nueva_pass = substr($nueva_pass, 0, 6);
	
		$consulta2 = "UPDATE usuario SET password = '".md5($nueva_pass)."' WHERE nombreUsuario='$email'"; // actualizamos la clave del usuario en la base de datos, cifrándola previamente
		$resultado2 = $comprobar_usuario->query($consulta2);
	
		if($resultado2) {
			$comprueba = "SI";
			$email_destino = $email;
			$asunto = "Nueva contraseña para CEIIE";
			$mensaje_email = "Tu contraseña nueva es: $nueva_pass";
			
			// Cabeceras email
			$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
			$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$cabeceras .= 'From: X <xx@x.com>' . "\r\n";
			
			$enviadoCliente = mail($email_destino, $asunto, $mensaje_email, $cabeceras); // enviamos la nueva clave al usuario
		}
		
	}
	//Comprobación del envio
	if ($enviadoCliente) {
		$notificacion = "El mensaje ha sido enviado correctamente";			
		$notificacionClass = "success";
	} else {
		$notificacion = "Ha ocurrido un error en el envío del mensaje, $comprueba, $email, $nueva_pass";
		$notificacionClass = "error";
		}
}
?>
