
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
            if (isset($_SESSION['usuario'])) {
                if ($_SESSION['inscrito']) {
                    ?>
                    <a href="index.php?page=mi-inscripcion" id="inscribete" class="btn-grande btn-verde fl_right">MI INSCRIPCIÓN</a>
                    <?php
                } else {
                    ?>
                    <a href="index.php?page=inscripcion" id="inscribete" class="btn-grande btn-verde fl_right">INSCRIBETE</a>
                <?php }
            } else { ?>
                <div id="newsletter">
                    <p>Suscríbete y recibe todas las novedades.</p>
                    <form action="#" method="post">
                        <fieldset>
                            <legend>Suscribete</legend>
                            <input type="text" placeholder="Introduce tu email..." />
                            <input type="submit" name="news_go" id="news_go" value="Sign Up" />
                        </fieldset>
                    </form>

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
                    <li><a href="#">Actividades</a>
                        <ul>
                            <li><a href="index.php?page=alhambra">Visita a la Alhambra</a>
                            </li>
                            <li><a href="index.php?page=sierra_nevada">Visita a Sierra Nevada</a>
                            </li>
                        </ul>
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
                                <li><a href="index.php?page=inscripcion">Inscribete</a>
                                </li>
                                <li><a href="#">Mi inscripción</a>
                                </li>
                                <li><a href="#">Lista de Inscritos</a>
                                </li>
                                <li><a href="index.php?page=cuotas">Cuotas</a>
                                </li>
                                <li><a href="index.php?page=actividades">Actividades</a>
                                </li>
                                <li><a href="index.php?page=logout">Logout</a>
                                </li>
                            </ul>
                        </li>
<?php } ?>
                </ul>

            </div>
            <!--            <div id="search">
                            <form action="#" method="post">
                                <fieldset>
                                    <legend>Buscar</legend>
                                    <input type="text"  />
                                    <input type="submit" name="go" id="go" value="Search" />
                                </fieldset>
                            </form>
                        </div>-->
            <br class="clear" />
        </div>
    </div>
