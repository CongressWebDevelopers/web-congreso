<?php
seguridad();
include_once 'php/model/containers/ContenedorCuota.php';
include_once 'php/model/containers/ContenedorActividad.php';

if (isset($_SESSION['usuario'])) {
    $usuario = $_SESSION['usuario'];
}
$cCuota = new ContenedorCuota();
$cActividad = new ContenedorActividad();
if (isset($_POST['crear'])) {
    $actividades = $_POST['actividades'];
    $cuota = new Cuota(
            null, $_POST['denominacion'], $_POST['descripcion'], $_POST['importe'], $actividades);
    if ($cCuota->insertarCuota($cuota)) {
        $mensaje = "La cuota ha sido modificada";
        $claseMensaje = "success";
    } else {
        $mensaje = "No se ha podido modificar la cuota";
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
                <div id="cuota-<?php $c->getId() ?>" class="cuota elemento-listado">
                    <p class="titulo-elemento-listado"><?php echo $c->getDenominacion();
            if (isset($_SESSION['rol']) AND $_SESSION['rol'] == ROL_ADMIN) { ?> <a class="btn-editar" href="index.php?page=editar-cuota&idCuota=<?php echo $c->getId() ?>">editar</a><?php } ?></p>
                        <p><strong>Descripcion: </strong></p><p><?php echo $c->getDescripcion() ?></p>
                        <p><strong>Importe: </strong><?php echo $c->getImporte() ?> €</p>
                        <div class="cuota elemento-listado">
                            <p class="titulo-elemento-listado">Actividades incluidas:</p>
                            <?php
                            $lActividades = $cCuota->getActividadesCuota($c->getActividades());
                            foreach ($lActividades as $a) {
                                ?>
                                <p><?php echo $a->getDenominacion() ?></p>
        <?php } ?>
                        </div>



                    </div>
                    <?php
                }
                ?>

            </div>
            <br><br>
            <?php if (isset($_SESSION['rol']) AND $_SESSION['rol'] == ROL_ADMIN) {?>
            <h2>Nueva Cuota</h2>
            <form action="index.php?page=cuotas" method="POST">
                <fieldset>
                    <p>
                        <label for="denominacion">Denominación * </label>
                        <input type="text" name="denominacion" placeholder="" required/>
                    </p>
                    <br>
                    <p><label for="descripcion">Descripción * </label></p>
                    <p><textarea rows="10" cols="50" id="descripcion" name="descripcion" required></textarea></p>
                    <p>
                        <label for="importe">Importe (€) * </label>
                        <input type="number" name="importe" required/>
                    </p>
                    <br/>
                    <h2>Actividades incluidas </h2>
                    <fieldset id="actividades">
                        <?php
                        $lActividades = $cActividad->getAll();
                        foreach ($lActividades as $a) {
                            ?>
                            <p><input type="checkbox" name="actividades[]" value="<?php echo $a->getId() ?>"/><?php echo $a->getDenominacion() ?></p>
    <?php } ?>
                    </fieldset>
                    <br/>
                    <div class="<?php if (isset($claseMensaje)) echo $claseMensaje ?>"> <?php if (isset($mensaje)) echo $mensaje ?></div>
                <input type="submit" class="btn-default" name="crear" value="Crear">
            </fieldset>
        </form>
            <?php }?>
    </div>
</div>

