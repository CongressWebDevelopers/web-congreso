<?php
include_once 'php/model/containers/ContenedorActividad.php';

$usuario = $_SESSION['usuario'];
$cActividad = new ContenedorActividad();


if (isset($_POST['crear'])) {
    $actividad = new Actividad(
            null, $_POST['denominacion'], $_POST['descripcion'], $_POST['fecha'], $_POST['hora'], $_POST['importe'], $_POST['foto']);
    if ($cActividad->insertarActividad($actividad)) {
        $mensaje = "La actividad ha sido creada";
        $claseMensaje = "success";
    } else {
        $mensaje = "No se ha podido crear la actividad";
        $claseMensaje = "error";
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
            <li class="current"><a href="#">Actividades</a>
            </li>
        </ul>
    </div>
</div>
<div class="wrapper col5">
    <div id="container">
        <h2>Actividades disponibles</h2>
        <div id="actividades" class="lista-actividades">
            <?php
            $lActividades = $cActividad->getAll();
            foreach ($lActividades as $a) {
                ?>
                <div id="actividad-<?php $a->getId() ?>" class="actividades elemento-listado">
                    <p class="titulo-elemento-listado"><?php echo $a->getDenominacion() ?></p>
                    <p><strong>Descripcion: </strong></p><p><?php echo $a->getDescripcion() ?></p>
                    <p><strong>Fecha: </strong></p><p><?php echo $a->getFecha() ?></p>
                    <p><strong>Hora: </strong><?php echo $a->getHora() ?> </p>
                    <p><strong>Importe: </strong><?php echo $a->getImporte() ?> €</p>
                    <p><strong>Foto: </strong><?php echo $a->getFoto() ?></p>
                </div>
                <?php   
            }
            ?>

        </div>
        <br><br>
        <h2>Nueva Actividad</h2>
        <form action="index.php?page=actividades" method="POST">
            <fieldset>
                <p>
                    <label for="denominacion">Denominación</label>
                    <input type="text" name="denominacion" placeholder="" required/>
                </p>                
                <br>
                <p><label for="descripcion">Descripción</label></p>
                <p><textarea rows="10" cols="50" id="descripcion" name="descripcion" required></textarea></p>
                <br>
                <p>
                    <label for="fecha">Fecha</label>
                    <input type="date" name="fecha" required />
                    <label for="hora">Hora</label>
                    <input type="time" name="hora" required/>
                </p>
                <p>
                    <label for="importe">Importe (€)</label>
                    <input type="number" name="importe" required/>
                </p>
                <fieldset>
                    <p><label for="foto">Foto</label></p>
                    <input type="file" name="foto">
                </fieldset>
                <br>
                <div class="<?php if (isset($claseMensaje)) echo $claseMensaje ?>"> <?php if (isset($mensaje)) echo $mensaje ?></div>
                <input type="submit" class="btn-default" name="crear" value="Crear">
            </fieldset>
        </form>
    </div>
</div>

