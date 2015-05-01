<?php 
/**
 * Este modulo es el encargado de mostrar el contexto de una sesión determinada del programa.
 * Muestra las otras dos ponencias de la misma sesión.
 * 
 * Funcionamiento: Recoge por GET el ID de la sesión y del programa mostrado y excluye ese programa para mostrar
 * los otros dos de esa sesión.
 * 
 * IMPRESCINDIBLE POR GET: 
 *      int id_sesion
 *      int id_programa
 */
?>

<div class="wrapper col5"> <div id="container">
        <h6>Otros programas de la sesión: </h6>
        <?php
        if (isset($_GET['id_sesion']) && isset($_GET['id_programa'])) {
            switch ($_GET['id_sesion']) {
                case 1:
                    switch ($_GET['id_programa']) {
                        case 1:
                            ?>
                            <p><a href="index.php?page=programa&programa=ifml&id_sesion=1&id_programa=2"><em>IFML</em>, por M. Cabrera</a></p>
                            <p><a href="index.php?page=programa&programa=prince&id_sesion=1&id_programa=3"><em>Prince2</em>, por M.J. Rodríguez</a></p>
                            <?php
                            break;
                        case 2:
                            ?>
                            <p><a href="index.php?page=programa&programa=agiles&id_sesion=1&id_programa=1"><em>Metodologías Ágiles</em>, por M. Noguera</a></p>
                            <p><a href="index.php?page=programa&programa=prince&id_sesion=1&id_programa=3"><em>Prince2</em>, por M.J. Rodríguez</a></p>
                            <?php
                            break;
                        case 3:
                            ?>
                            <p><a href="index.php?page=programa&programa=agiles&id_sesion=1&id_programa=1"><em>Metodologías Ágiles</em>, por M. Noguera</a></p>
                            <p><a href="index.php?page=programa&programa=ifml&id_sesion=1&id_programa=2"><em>IFML</em>, por M. Cabrera</a></p>
                            <?php
                            break;
                        default:
                            echo '<script>location.href="index.php?page=programa"</script>';
                            break;
                    }
                    break;
                case 2:
                    switch ($_GET['id_programa']) {
                        case 1:
                            ?>
                            <p><a href="index.php?page=programa&programa=digitalizacion&id_sesion=2&id_programa=2"><em>Digitalización 3D</em>, por F.J. Melero</a></p> <p><a href="index.php?page=programa&programa=realidad_aumentada&id_sesion=2&id_programa=3"><em>Realidad Aumentada</em>, por J. Revelles</a></p>
                            <?php
                            break;
                        case 2:
                            ?>
                            <p><a href="index.php?page=programa&programa=visualizacion&id_sesion=2&id_programa=1"><em>Visualización y Realismo</em>, por C. Ureña</a></p> <p><a href="index.php?page=programa&programa=realidad_aumentada&id_sesion=2&id_programa=3"><em>Realidad Aumentada</em>, por J. Revelles</a></p>
                            <?php
                            break;
                        case 3:
                            ?>
                            <p><a href="index.php?page=programa&programa=visualizacion&id_sesion=2&id_programa=1"><em>Visualización y Realismo</em>, por C. Ureña</a></p> <p><a href="index.php?page=programa&programa=digitalizacion&id_sesion=2&id_programa=2"><em>Digitalización 3D</em>, por F.J. Melero</a></p>
                            <?php
                            break;
                        default:
                            echo '<script>location.href="index.php?page=programa"</script>';
                            break;
                    }
                    break;
                case 3:
                    switch ($_GET['id_programa']) {
                        case 1:
                            ?>
                            <p><a href="index.php?page=programa&programa=db_oo&id_sesion=3&id_programa=2"><em>Bases de Datos Orientadas a Objetos</em>, por J. Samos</a></p> <p><a href="index.php?page=programa&programa=db_distribuidos&id_sesion=3&id_programa=3"><em>Bases de Datos Distribuidas</em>, por C. Delgado</a></p>
                            <?php
                            break;
                        case 2:
                            ?>
                            <p><a href="index.php?page=programa&programa=db_multidimensionales&id_sesion=3&id_programa=1"><em>Bases de Datos Multidimensionales</em>, por E. Garví</a></p> <p><a href="index.php?page=programa&programa=db_distribuidos&id_sesion=3&id_programa=3"><em>Bases de Datos Distribuidas</em>, por C. Delgado</a></p>
                            <?php
                            break;
                        case 3:
                            ?>
                            <p><a href="index.php?page=programa&programa=db_multidimensionales&id_sesion=3&id_programa=1"><em>Bases de Datos Multidimensionales</em>, por E. Garví</a></p> <p><a href="index.php?page=programa&programa=db_oo&id_sesion=3&id_programa=2"><em>Bases de Datos Orientadas a Objetos</em>, por J. Samos</a></p>
                        <?php
                        default:
                            echo '<script>location.href="index.php?page=programa"</script>';
                            break;
                    }
                    break;
                case 4:

                    switch ($_GET['id_programa']) {
                        case 1:
                            ?>
                            <p><a href="index.php?page=programa&programa=traductores&id_sesion=4&id_programa=2"><em>Traductores</em>, por R. López-Cózar</a></p> <p><a href="index.php?page=programa&programa=habla&id_sesion=4&id_programa=3"><em>Procesamiento de Habla</em>, por Z. Callejas</a></p>
                            <?php
                            break;
                        case 2:
                            ?>
                            <p><a href="index.php?page=programa&programa=procesadores&id_sesion=4&id_programa=1"><em>Procesadores de Lenguajes</em>, por J. Revelles</a></p> <p><a href="index.php?page=programa&programa=habla&id_sesion=4&id_programa=3"><em>Procesamiento de Habla</em>, por Z. Callejas</a></p>
                            <?php
                            break;
                        case 3:
                            ?>
                            <p><a href="index.php?page=programa&programa=procesadores&id_sesion=4&id_programa=1"><em>Procesadores de Lenguajes</em>, por J. Revelles</a></p> <p><a href="index.php?page=programa&programa=traductores&id_sesion=4&id_programa=2"><em>Traductores</em>, por R. López-Cózar</a></p>
                        <?php
                        default:
                            echo '<script>location.href="index.php?page=programa"</script>';
                            break;
                    }
                    break;
                case 5:
                    switch ($_GET['id_programa']) {
                        case 1:
                            ?>
                            <p><a href="index.php?page=programa&programa=unix&id_sesion=5&id_programa=2"><em>Sistemas Unix/Linux</em>, por P. Paderewski</a></p> <p><a href="index.php?page=programa&programa=ios&id_sesion=5&id_programa=3"><em>Sistemas iOS/Mac</em>, por R. Montes</a></p>
                            <?php
                            break;
                        case 2:
                            ?>
                            <p><a href="index.php?page=programa&programa=windows&id_sesion=5&id_programa=1"><em>Sistemas Windows</em>, por A. León</a></p> <p><a href="index.php?page=programa&programa=ios&id_sesion=5&id_programa=3"><em>Sistemas iOS/Mac</em>, por R. Montes</a></p>
                            <?php
                            break;
                        case 3:
                            ?>
                            <p><a href="index.php?page=programa&programa=windows&id_sesion=5&id_programa=1"><em>Sistemas Windows</em>, por A. León</a></p> <p><a href="index.php?page=programa&programa=unix&id_sesion=5&id_programa=2"><em>Sistemas Unix/Linux</em>, por P. Paderewski</a></p>
                        <?php
                        default:
                            echo '<script>location.href="index.php?page=programa"</script>';
                            break;
                    }
                    break;
                case 6:
                    switch ($_GET['id_programa']) {
                        case 1:
                            ?>
                            <p><a href="index.php?page=programa&programa=distribuidos&id_sesion=6&id_programa=2"><em>Sistemas Distribuidos</em>, por J.L. Garrido</a></p> <p><a href="index.php?page=programa&programa=tiempo_real&id_sesion=6&id_programa=3"><em>Sistemas en Tiempo Real</em>, por J.A. Holgado</a></p>
                            <?php
                            break;
                        case 2:
                            ?>
                            <p><a href="index.php?page=programa&programa=paralela&id_sesion=6&id_programa=1"><em>Programación Paralela</em>, por J.M. Mantas</a></p> <p><a href="index.php?page=programa&programa=tiempo_real&id_sesion=6&id_programa=3"><em>Sistemas en Tiempo Real</em>, por J.A. Holgado</a></p>
                            <?php
                            break;
                        case 3:
                            ?>
                            <p><a href="index.php?page=programa&programa=paralela&id_sesion=6&id_programa=1"><em>Programación Paralela</em>, por J.M. Mantas</a></p> <p><a href="index.php?page=programa&programa=distribuidos&id_sesion=6&id_programa=2"><em>Sistemas Distribuidos</em>, por J.L. Garrido</a></p>
                        <?php
                        default:
                            echo '<script>location.href="index.php?page=programa"</script>';
                            break;
                    }
                    break;
                case 7:
                    switch ($_GET['id_programa']) {
                        case 1:
                            ?>
                            <p><a href="index.php?page=programa&programa=wearables&id_sesion=7&id_programa=2"><em>Wearables</em>, por M. Cabrera</a></p> <p><a href="index.php?page=programa&programa=realidad_virtual&id_sesion=7&id_programa=3"><em>Realidad Virtual</em>, por J. Flores</a></p>
                            <?php
                            break;
                        case 2:
                            ?>
                            <p><a href="index.php?page=programa&programa=haptica&id_sesion=7&id_programa=1"><em>Interacción Háptica</em>, por F.Soler</a></p> <p><a href="index.php?page=programa&programa=realidad_virtual&id_sesion=7&id_programa=3"><em>Realidad Virtual</em>, por J. Flores</a></p>
                            <?php
                            break;
                        case 3:
                            ?>
                            <p><a href="index.php?page=programa&programa=haptica&id_sesion=7&id_programa=1"><em>Interacción Háptica</em>, por F.Soler</a></p> <p><a href="index.php?page=programa&programa=wearables&id_sesion=7&id_programa=2"><em>Wearables</em>, por M. Cabrera</a></p>
                        <?php
                        default:
                            echo '<script>location.href="index.php?page=programa"</script>';
                            break;
                    }
                    break;
                default:
                    echo '<script>location.href="index.php?page=programa"</script>';
                    break;
            }
        } else {
            echo '<script>location.href="index.php?page=programa"</script>';
        }
        ?>

    </div> </div>
