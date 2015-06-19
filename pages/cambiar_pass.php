<?php


if (isset($_POST['enviar'])) {
    if ($_POST['email'] && $_POST['password_actual'] && $_POST['password_nueva']){
		if($_POST['password_actual'] != $_POST['password_nueva']){			
			$email2 = $_POST['email'];
			$password_nueva = $_POST['password_nueva'];
			$password_actual = $_POST['password_actual'];
		
			$cambiar = new ORM();
			$consulta = ("SELECT nombreUsuario, password FROM usuario WHERE nombreUsuario='".$email2."' AND password='".md5($password_actual)."'");
			$resultado = $cambiar->query($consulta);
			if(mysql_num_rows($resultado)) {
				$consulta = "UPDATE usuario SET password = '".md5($password_nueva)."' WHERE nombreUsuario='".$email2."' AND password='".md5($password_actual)."'";
				$resultado = $cambiar->query($consulta);
				$claseMensaje = "success";
				$mensaje = "El cambio se ha realizado";
			}else{
				$claseMensaje = "error";
				$mensaje = "El email y/o la contraseña introducidas son erróneas";
			}	
		}else{
			$claseMensaje = "error";
            $mensaje = "La contraseña nueva es igual a la actual";
		}	
    }else{
        $claseMensaje = "error";
        $mensaje = "Introduce todos los datos";
    }
}
?>
<div class="wrapper col5">
    <div id="container">
		<h3>Cambiar contraseña:</h3>
        <form action="index.php?page=cambiar_pass" method="POST">
            <fieldset>
                <p>
                    <input type="text" name="email" placeholder="Introduce tu email"/>
                </p>
                <p>
                    <input type="password" name="password_actual" placeholder="Introduce tu contraseña"/>
                </p>
                <p>
                    <input type="password" name="password_nueva" placeholder="Introduce nueva contraseña"/>
                </p>
                <div class="<?php if (isset($claseMensaje)) echo $claseMensaje ?>"> <?php if (isset($mensaje)) echo $mensaje ?></div>
                <input type="submit" class="btn-default" name="enviar" value="Cambiar">
            </fieldset>
        </form>

    </div>
</div>
