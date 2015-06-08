<div class="wrapper col3">
    <div id="breadcrumb">
        <ul>
            <li class="first">Tú estás aquí</li>
            <li>&#187;</li>
            <li><a href="#">Inicio</a>
            </li>
            <li>&#187;</li>
            <li class="current"><a href="#">Hoteles</a>
            </li>
        </ul>
    </div>
</div>
<div class="wrapper col5">
    <div id="container">
        <h1>Obtener hoteles disponibles</h1>
        <form id="hoteles"  action="http://localhost/rest/API-hoteles" method="get" >
            <div id="contacto-notification" class="" style="display:none">
            </div>
            <?php
            if (isset($notificacion)) {
                ?>
                <div class="<?php echo $notificacionClass ?>"><?php echo $notificacion ?></div>
            <?php } ?>
            <input type="submit" value="Obtener" name="obtener" class="btn-default">
            </p>
        </form>
    </div>
</div>
