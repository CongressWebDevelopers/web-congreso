<?php
include_once 'php/model/Cuota.php';
include_once 'php/model/containers/ContenedorCuota.php';

$usuario = $_SESSION['usuario'];
$cCuota = new ContenedorCuota();
if (true) { //Si es administrador
    if (isset($_POST['crear'])) {
        $actividades = $_POST['actividades'];
        $cuota = new Cuota(
                null, $_POST['denominacion'], $_POST['descripcion'], $_POST['importe'], $actividades);
        if ($cCuota->insertarCuota($cuota)) {
            $mensaje = "La creación de la cuota ha sido satisfactoria";
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
            <li><a href="#">Administración</a>
            </li>
            <li>&#187;</li>
            <li class="current"><a href="#">Cuotas</a>
            </li>
        </ul>
    </div>
</div>
<div class="wrapper col5">
    <div id="container">
        <h2>Cuotas disponibles</h2>
        <div id="cuotas" class="lista-cuotas">
            <?php
            $lCuotas = $cCuota->getAll();
            foreach ($lCuotas as $c) {
                ?>
                <div id="cuota-<?php $c->getId() ?>" class="cuota">
                    <p><strong>Denominación: </strong></p><p><?php echo $c->getDenominacion() ?></p>
                    <p><strong>Descripcion: </strong></p><p><?php echo $c->getDescripcion() ?></p>
                    <p><strong>Importe: </strong><?php echo $c->getImporte() ?></p>
                    <p><strong>Actividades: </strong></p><p><?php echo $c->getActividades()?></p>
                </div>
                <?php
            }
            ?>

        </div>
        <br>
        <h2>Nueva Cuota</h2>
        <form action="index.php?page=cuotas" method="POST">
            <fieldset>
                <p>
                    <label for="denominacion">Denominación</label>
                    <input type="text" name="denominacion" placeholder=""/>
                </p>
                <br>
                <p><label for="descripcion">Descripción</label></p>
                <p><textarea rows="10" cols="50" id="descripcion" name="descripcion"></textarea></p>
                <p>
                    <label for="importe">Importe (€)</label>
                    <input type="number" name="importe"/>
                </p>
                <br/>
                <h2>Actividades incluidas</h2>
                <fieldset id="actividades">
                    <input type="checkbox" name="actividades[]" value="1"/>Actividad 1
                    <input type="checkbox" name="actividades[]" value="2"/>Actividad 2
                </fieldset>
                <br/>
                <div class="<?php if (isset($claseMensaje)) echo $claseMensaje ?>"> <?php if (isset($mensaje)) echo $mensaje ?></div>
                <input type="submit" class="btn-default" name="crear" value="Crear">
            </fieldset>
        </form>
    </div>
</div>

