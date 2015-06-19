<?php
include_once 'php/model/Usuario.php';
include_once 'php/model/containers/ContenedorInscripcion.php';
include_once 'php/model/containers/ContenedorCuota.php';


if (isset($_SESSION['usuario'])) {
    $usuario = $_SESSION['usuario'];
}
$cInscripcion = new ContenedorInscripcion();
$cCuota = new ContenedorCuota();
if (isset($_SESSION['inscrito'])) {
    $mensajeInscrito = 'Ya se encuetra inscrito en el congreso <strong><a href="index.php?page=mi-inscripcion">Mi inscripcion</a></strong>';
    $claseMensajeInscrito = "success";
} else {
    if (isset($_POST['crear'])) {
        $actividades = $_POST['actividades'];
        $inscripcion = new Inscripcion(
                null, $_POST['nombre'], $_POST['centro'], $_POST['telefono'], $_POST['cuota'], null, null, null, $usuario->getId());
        if ($cInscripcion->insertarInscripcion($inscripcion, $usuario->getId(), $actividades)) {
            $mensajeInscrito = 'La inscripción ha sido satisfactoria <a href="index.php?page=mi-inscripcion">Mi inscripcion</a>';
            $claseMensajeInscrito = "success";
            $_SESSION['inscrito'] = true;
        } else {
            $mensajeInscrito = "No se ha podido realizar la inscripción";
            $claseMensajeInscrito = "error";
        }
    }
}
?>
<div class="wrapper col3">
    <div id="breadcrumb">
        <ul>
            <li class="first">Tú estás aquí</li>
            <li>&#187;</li>
            <li><a href="#">Inicio</a>
            </li>
            <li>&#187;</li>
            <li class="current"><a href="#">Inscripción</a>
            </li>
        </ul>
    </div>
</div>
<div class="wrapper col5">
    <div id="container">
        <div class="<?php if (isset($claseMensajeInscrito)) echo $claseMensajeInscrito ?>"> <?php if (isset($mensajeInscrito)) echo $mensajeInscrito ?></div>
        <?php
        if (isset($_SESSION['usuario'])) {
            if (!$cInscripcion->estaInscrito($usuario->getId())) {
                if ((isset($_SESSION['rol']) && $_SESSION['rol'] == ROL_ADMIN)) {
                    echo'<script language="javascript">window.location="index.php?page=lista-inscritos"</script>;';
                } else {
                    ?>
                    <form id="formulario-inscripcion"action="index.php?page=inscripcion" method="POST">
                        <h2>Datos de Inscripción</h2>
                        <fieldset>
                            <label for="nombre">Nombre y Apellidos * </label>
                            <input type="text" id="nombre" name="nombre" placeholder="" required>
                            <p><label for="centro">Centro de trabajo * </label>
                                <input type="text" id="centro" name="centro" required></p>
                            <p><label for="telefono">Teléfono de contacto * </label>
                                <input type="text" id="telefono" name="telefono" required></p>
                        </fieldset>
                        <p><label>Cuota de inscripción * </label>
                            <?php
                            $lCuotas = $cCuota->getAll();
                            foreach ($lCuotas as $c) {
                                ?>
                                <input type="radio" name="cuota" onchange="mostrarActividades(this.value);
                                                        calcularTotal()" value="<?php echo $c->getId() ?>"/> <?php echo $c->getDenominacion() ?> (<?php echo $c->getImporte() ?>€)
                                   <?php } ?>
                        </p>
                        <br>
                        <fieldset id="actividades">
                            <!--Se rellenará con las actividades recibidas por AJAX-->
                        </fieldset>
                        <br>
                        <h2>Hotel</h2>
                        <a href="#"onclick="mostrarHoteles()">Comprobar disponibilidad</a>
                        <p>Duración estancia:</p>
                        <input type="date" id="fechaEntrada" name="fechaEntrada" />
                        <input type="date" id="fechaSalida" name="fechaSalida"/>
                        <fieldset id="hoteles">
                            <!--Se rellenará con las hoteles recibidas por AJAX-->
                        </fieldset>
                        <br>
                        <div class="<?php if (isset($claseMensaje)) echo $claseMensaje ?>"> <?php if (isset($mensaje)) echo $mensaje ?></div>
                        <div id="precio-box" class="fl_left btn-default clear">
                            <strong id="total">0</strong> €
                        </div>
                        <input type="submit" id="btn-inscripcion" class="fl_left " name="crear" value="INSCRIBIRSE" onsubmit="confirmacion()"/>
                    </form><?php
                }
            } else {
                echo'<script language="javascript">window.location="index.php?page=mi-inscripcion"</script>;';
            }
        } else {
            echo'<script language="javascript">window.location="index.php?page=registro-usuario"</script>;';
        }
        ?>
    </div>
</div>
<script type="text/javascript" src="js/inscripcion.js"></script>
