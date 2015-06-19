
<body id="top">
    <div class="wrapper col1">
        <div id="header">
            <div id="logo">
                <h1><a href="index.php">CEIIE</a></h1>
                <p><strong>I Congreso de Estudiantes de Ingeniería
                        Informática en España</strong>
                </p>
            </div>
            
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
