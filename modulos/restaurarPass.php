<?php

include_once '../php/database/ORM.php';;

/**
 * Modulo que manda dos correos al recibir la petición POST del formulario de contacto.
 */
if (isset($_POST['enviar'])) {
    //Datos del interesado
    $email = $_POST['email_restablecer'];
    
    $comprobar_usuario = new ORM();
    $consulta = "SELECT COUNT(*) FROM usuario WHERE nombreUsuario='$email'";
    $resultado = $comprobar_usuario->query($consulta);
    

	if (mysql_num_rows($resultado)!=0) {  
		$nueva_contraseña = md5(uniqid(mt_rand(), true));
		$nueva_contraseña = substr($nueva_contraseña, 0, 6);
	
		$consulta = "UPDATE usuario SET password = '$nueva_contraseña WHERE nombreUsuario='$email'";
		$resultado = $comprobar_usuario->query($consulta);
	
		if($resultado) {
			$enviadoCliente = mail($email, "Nueva contraseña para CEIIE", "Tu contraseña nueva es: $nueva_contraseña");
		}
    
		//Comprobación del envio
		if ($enviadoCliente) {
			$notificacion = "El mensaje ha sido enviado correctamente";
			$notificacionClass = "success";
		} else {
			$notificacion = "Ha ocurrido un error en el envio del mensaje";
			$notificacionClass = "error";
		}
	}
}
?>
