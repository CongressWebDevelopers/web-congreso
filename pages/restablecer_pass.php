<?php
include_once('./modulos/restaurarPass.php');
?>
<div class="wrapper col3">
    <div id="breadcrumb">
        <ul>
            <li class="first">Tú estás aquí</li>
            <li>&#187;</li>
            <li><a href="#">Inicio</a>
            </li>
            <li>&#187;</li>
            <li class="current"><a href="#">Restablece tu contraseña</a>
            </li>
        </ul>
    </div>
</div>
<div class="wrapper col5">
    <div id="container">
        <h1>Restablace tu contraseña:</h1>
        <form id="restablecer" action="index.php?page=restablecer" method="post" >
            <fieldset>
                
                <p>
                    <input type="text" id="email_restablecer" name="email_restablecer" value="" placeholder="Introduce tu Email" />
                </p>
            </fieldset>
          
            <div id="contacto-notification" class="" style="display:none">
            </div>
            <?php
            if (isset($notificacion)) {
                ?>
                <div class="<?php echo $notificacionClass ?>"><?php echo $notificacion ?></div>
            <?php } ?>
            <input type="submit" value="Enviar" name="enviar" class="btn-default">
            <input type="reset" value="Limpiar" class="btn-default">
            </p>
        </form>
    </div>
</div>
