<?php
include_once 'php/model/Usuario.php';
include_once 'php/model/containers/ContenedorUsuario.php';

$cUsuario = new ContenedorUsuario();

if (isset($_POST['enviar'])) {
    if ($_POST['password'] == $_POST['repite-password']) {
        $usuario = new Usuario(null,$_POST['email'], md5($_POST['password']), ROL_USER);
        $resultado = $cUsuario->insertarUsuario($usuario);
        if ($resultado) {
            $claseMensaje = "success";
            $mensaje = "El registro ha sido satisfactorio";
        } else {
            $claseMensaje = "error";
            $mensaje = "No se ha creado correctamente";
        }
    } else {
        $claseMensaje = "error";
            $mensaje = "Las contraseñas no coinciden";
    }
}
?>
<div class="wrapper col5">
    <div id="container">
        <form action="index.php?page=registro-usuario" method="POST">
            <fieldset>
                <p>
                    <label for="email">Email</label>
                    <input type="text" name="email" placeholder="Email"/>
                </p>
                <p>
                    <label for="password">Password</label>
                    <input type="password" name="password"/>
                    <label for="repite-password">Repite Password</label>
                    <input type="password" name="repite-password"/>
                </p>
                <div class="<?php if (isset($claseMensaje)) echo $claseMensaje ?>"> <?php if (isset($mensaje)) echo $mensaje ?></div>
                <input type="submit" class="btn-default" name="enviar" value="Registrarse">
            </fieldset>
        </form>

    </div>
</div>
