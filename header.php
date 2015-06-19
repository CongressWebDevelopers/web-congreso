
<body id="top">
    <div class="wrapper col1">
        <div id="header">
            <div id="logo">
                <h1><a href="index.php">CEIIE</a></h1>
                <p><strong>I Congreso de Estudiantes de Ingeniería
                        Informática en España</strong>
                </p>
            </div>
            <?php
            if (!isset($_SESSION['usuario'])) {
                ?>
                <div id="login">
                    <p class="titulo-login">Login</h2>
                    <form action="index.php" method="post">
                        <fieldset>
                            <div class="fl_left">
                                <input type="text" name="usuario" value="" placeholder="Email" />
                                <input type="password" name="password" value="" placeholder="Contraseña" />
                            </div>
                            <div id="recordar"> <label for="recordar">Recordar usuario:</label><input type="checkbox" name="recordar" id="recordar"></div>
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
            <br class="clear" />
        </div>
    </div>
    <div class="wrapper col2">
        <div id="topbar">
            <div id="topnav">
                <ul>
                    <li><a href="index.php?page=programa">Programa</a>
                    </li>
                    <li><a href="index.php?page=patrocina">Patrocina</a>
                    </li>
                    <li><a href="index.php?page=inscripcion">Inscripción</a>
                    </li>
                    <li><a href="index.php?page=cuotas">Cuotas</a>
                    </li>
                    <li><a href="index.php?page=actividades">Actividades</a>
                    </li>
                    <li><a href="#">Información</a>
                        <ul>
                            <li><a href="index.php?page=granada">La ciudad</a>
                            </li>
                            <li><a href="index.php?page=etsiit">La ETSIIT</a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="index.php?page=contacto">Contacto</a>
                    </li>
                    <?php if (isset($_SESSION['usuario'])) { ?>
                        <li id="nav-admin"><a href="#" class="color-admin">Administración</a>
                            <ul>
                                <?php
                                if (isset($_SESSION['rol']) AND $_SESSION['rol'] == ROL_USER) {
                                    if (!isset($_SESSION['inscrito'])) {
                                        ?>
                                        <li><a href="index.php?page=inscripcion">Inscribete</a>
                                        </li>
                                    <?php } else { ?>
                                        <li><a href="index.php?page=mi-inscripcion">Mi inscripción</a>
                                        </li>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <li><a href="index.php?page=lista-inscritos">Lista de Inscritos</a>
                                    </li>
                                    <li><a href="index.php?page=cuotas">Cuotas</a>
                                    </li>
                                    <li><a href="index.php?page=actividades">Actividades</a>
                                    </li>
                                    <li><a href="index.php?page=buscar_inscritos">Buscar Inscritos</a>
                                    </li>
                                <?php } ?>
                                <li><a href="index.php?page=logout">Logout</a>
                                </li>
                            </ul>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <br class="clear" />
        </div>
    </div>
