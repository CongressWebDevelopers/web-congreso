<?php
include_once 'php/model/Usuario.php';
include_once 'php/model/containers/ContenedorInscripcion.php';

$usuario = $_SESSION['usuario'];
$cInscripcion = new ContenedorInscripcion();
if ($_SESSION['inscrito']) {
    $mensajeInscrito = 'Ya se encuetra inscrito en el congreso <strong><a href="index.php?page=mi-inscripcion">Mi inscripcion</a></strong>';
    $claseMensajeInscrito = "success";
} else {
    if (isset($_POST['crear'])) {
        $actividades = $_POST['actividades'];
        $inscripcion = new Inscripcion(
                null, $_POST['nombre'], $_POST['centro'], $_POST['telefono'], $_POST['cuota'], $actividades, $_POST['hotel'], $_POST['fechaSalida'], $_POST['fechaEntrada'], $usuario->getId());
        if ($cInscripcion->insertarInscripcion($inscripcion, $usuario->getId())) {
            $mensaje = "La inserción ha sido satisfactoria";
            $claseMensaje = "success";
        } else {
            $mensaje = "No se ha podido realizar la inscripción";
            $claseMensaje = "error";
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

        <?php if (isset($_SESSION['usuario']) && !$cInscripcion->estaInscrito($usuario->getId())) { ?>
            <form action="index.php?page=inscripcion" method="POST">
                <h2>Datos de Inscripción</h2>
                <fieldset>
                    <label for="nombre">Nombre y Apellidos </label>
                    <input type="text" id="nombre" name="nombre" placeholder="">
                    <p><label for="centro">Centro de trabajo</label>
                        <input type="text" id="centro" name="centro"></p>
                    <p><label for="telefono">Teléfono de contacto</label>
                        <input type="text" id="telefono" name="telefono"></p>
                </fieldset>
                <p><label for="cuota">Cuota de inscripción</label>
                    <select id="cuota" name="cuota" required>
                        <option value="1">Cuota 1</option>
                        <option value="2">Cuota 2</option>
                        <option value="3">Cuota 3</option>
                    </select>
                </p>
                <br>
                <h2>Actividades</h2>
                <fieldset id="actividades">
                    <input type="checkbox" name="actividades[]" value="1"/>Actividad 1
                    <input type="checkbox" name="actividades[]" value="2"/>Actividad 2
                </fieldset>
                <br>
                <h2>Hotel</h2>
                <p>Duración estancia:</p>
                <input type="date" id="fechaSalida" name="fechaSalida"/>
                <input type="date" id="fechaEntrada" name="fechaEntrada" />
                <p>
                    <select id="hotel" name="hotel" required>
                        <option>Hotel 1</option>
                        <option>Hotel 2</option>
                        <option>hotel 3</option>
                    </select>
                </p>
                <div class="<?php if (isset($claseMensaje)) echo $claseMensaje ?>"> <?php if (isset($mensaje)) echo $mensaje ?></div>
                <input type="submit" class="btn-default" name="crear" value="Crear"/>
            </form>
        <?php } ?>
    </div>
</div>
