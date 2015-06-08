<div class="wrapper col6">
    <div id="footer">
        <?php if (!isset($_SESSION['usuario'])) { ?>
            <div id="login">
                <h2>Login</h2>
                <p>Accede y gestiona tu participación en el CEIIE.</p>
                <form action="index.php" method="post">
                    <fieldset>
                        <div class="fl_left">
                            <input type="text" name="usuario" value="" placeholder="Introduce tu email" />
                            
                            <input type="password" name="password" value="" placeholder="Contraseña" />
                            Recordar: <input type="radio" name="opcion_recordar" value="recordar">
                            <!--Recordar:<input type="checkbox" name="recordar" id="recordar">-->
                        </div>
                        <div class="fl_right">
                            <input type="submit" class="btn-default" name="login" id="login_go" value="Sign In" />
                        </div>
                    </fieldset>
                    <div class="<?php if (isset($claseMensajeSesion)) echo $claseMensajeSesion; ?>"><?php if (isset($mensajeSesion)) echo $mensajeSesion; ?></div>
                </form>
                <p><a href="index.php?page=restablecer_pass">&raquo; No recuerdo la contraseña</a> | <a href="index.php?page=registro-usuario">Crear una cuenta</a>
                </p>
                 <p><a href="index.php?page=cambiar_pass">&raquo; Quierio cambiar mi contraseña</a>
                </p>
            </div>
        <?php } ?>
        <div id="patrocinadores" class="footbox-2">
            <h2>Patrocinadores</h2>
            <div id="slideshow">
                <img src="images/consejeria_educacion_cultura_y_deporte.jpg">
                <img src="images/fujitsu-logo.jpg" alt="" />
                <img src="images/logo-indra_0.jpg" alt="" />
                <img src="images/UGR.jpg" alt="" />
                <img src="images/logo_etsiit.png">
                <img src="images/HP-large.png">
            </div>
        </div>
        <br class="clear" />
    </div>
</div>
<div class="wrapper col7">
    <div id="copyright">
        <p class="fl_left">Copyright &copy; 2015 - All Rights Reserved - <a href="#">Congreso de Estudiantes de Ingeniería Informática de España</a>
        </p>
        <p class="fl_right">Ivan Ortega Alba | Jose Luis Fdez. Bueno</p>
        <br class="clear" />
    </div>
</div>
<script type="text/javascript" src="js/slider.js"></script>
</body>

</html>
