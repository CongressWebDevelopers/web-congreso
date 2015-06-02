<?php
if (isset($_POST['crear'])) {
    include_once 'php/model/Usuario.php';
    include_once 'php/model/containers/ContenedorInscripcion.php';

    print_r($_POST);
    $usuario = $_SESSION['usuario'];
    $actividades = $_POST['actividades'];
    $cInscripcion = new ContenedorInscripcion();
    $inscripcion = new Inscripcion(
            null, $_POST['nombre'], $_POST['centro'], $_POST['telefono'], $_POST['cuota'], $actividades, $_POST['hotel'], $_POST['fechaSalida'], $_POST['fechaEntrada'], $usuario->getId());
    print_r($inscripcion);
    if ($cInscripcion->insertarInscripcion($inscripcion, $usuario->getId())) {
        $mensaje = "La inserción ha sido satisfactoria";
        $claseMensaje = "success";
    } else {
        $mensaje = "No se ha podido realizar la inscripción";
        $claseMensaje = "error";
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
        <h1>¡¡¡Inscribete!!!</h1>
<!--        <p>A continuación detallamos los precios de inscripción al congreso, para los distintos tipos de usuarios, así como para los que deseen hacer una preinscripción, o apuntarse directamente en la sede, al comienzo del congreso. Todas las inscripciones traen las mismas garantías y ventajas: Asistencias a las distintas conferencias, documentación, alojamiento y comida, actividades, cóctel de bienvenida, y cena de clausura.</p>
        <table id="insciprcion" border="1">
            <tr>
                <td>Interesado</td>
                <td>Preinscripción</td>
                <td>En sede</td>
            </tr>
            <tr>
                <td>Estudiantes</td>   
                <td>200€</td>
                <td>350€</td>
            </tr>
            <tr>
                <td>Estudiante Posgrado</td>
                <td>300€</td>
                <td>450€</td>
            </tr>
            <tr>
                <td>Colegiados</td>
                <td>400€</td>
                <td>550€</td>
            </tr>
            <tr>
                <td>Colegiados Granada</td>
                <td>300€</td>
                <td>350€</td>
            </tr>
            <tr>
                <td>Acompañante</td>
                <td>200€</td>
                <td>350€</td>
            </tr>
        </table>
        <p>A continuación detallamos los precios de las actividades opcionales, así si hay inscripción previa, o se abona en la sede en el momento de la actividad.</p>
        <table id="talleres" border="1">
            <tr>
                <td>Visita / Taller</td>
                <td>Preinscripción</td>
                <td>En sede</td>
            </tr>
            <tr>
                <td>Visita a la Alhambra</td>   
                <td>30€</td>
                <td>45€</td>
            </tr>
            <tr>
                <td>Visita a Sierra Nevada</td>
                <td>80€</td>
                <td>100€</td>
            </tr>
            <tr>
                <td>Torneo de Fútbol</td>
                <td>20€</td>
                <td>25€</td>
            </tr>
            <tr>
                <td>Torneo de Padel</td>
                <td>30€</td>
                <td>35€</td>
            </tr>
            <tr>
                <td>Competición de karts y Airsoft</td>
                <td>60€</td>
                <td>75€</td>
            </tr>
        </table>-->
        <?php if (isset($_SESSION['usuario'])) { ?>
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
