<?php
include_once 'php/model/containers/ContenedorCuota.php';
include_once 'php/model/containers/ContenedorActividad.php';
$cActividad = new ContenedorActividad();
$cCuota = new ContenedorCuota();
$cuota = $cCuota->getById($_GET['idCuota']);

if (isset($_POST['modificar'])) {
    $actividades = $_POST['actividades'];
    $cuota = new Cuota(
            $_GET['idCuota'], $_POST['denominacion'], $_POST['descripcion'], $_POST['importe'], $actividades);
    if ($cCuota->modificarCuota($cuota)) {
        $mensaje = "La cuota ha sido creada";
        $claseMensaje = "success";
    } else {
        $mensaje = "No se ha podido crear la cuota";
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
            <li class="current"><a href="#">Editar cuota</a>
            </li>
        </ul>
    </div>
</div>
<div class="wrapper col5">
    <div id="container">
        <h2>Editar Cuota</h2>
        <form action="index.php?page=editar-cuota&idCuota=<?php echo $cuota->getId()?>" method="POST">
            <fieldset>
                <p>
                    <label for="denominacion">Denominación * </label>
                    <input type="text" name="denominacion" value="<?php echo $cuota->getDenominacion()?>" required/>
                </p>
                <br>
                <p><label for="descripcion">Descripción * </label></p>
                <p><textarea rows="10" cols="50" id="descripcion" name="descripcion" required><?php echo $cuota->getDescripcion()?></textarea></p>
                <p>
                    <label for="importe">Importe (€) * </label>
                    <input type="number" name="importe" value="<?php echo $cuota->getImporte()?>" required/>
                </p>
                <br/>
                <h2>Actividades incluidas </h2>
                <fieldset id="actividades">
                    <?php
                    $lActividades = $cActividad->getAll();
                    $lActividadesInc = $cCuota->getIdActividadesAsociadas($_GET['idCuota']);
                    foreach ($lActividades as $a) {
                        ?>
                    <p><input type="checkbox" name="actividades[]" value="<?php echo $a->getId() ?>" <?php if(in_array($a->getId(), $lActividadesInc)) echo "checked"?>/><?php echo $a->getDenominacion() ?></p>
                    <?php } ?>
                </fieldset>
                <br/>
                <div class="<?php if (isset($claseMensaje)) echo $claseMensaje ?>"> <?php if (isset($mensaje)) echo $mensaje ?></div>
                <input type="submit" class="btn-default" name="modificar" value="Modificar">
            </fieldset>
        </form>
    </div>
</div>

