<?php
include_once 'php/model/containers/ContenedorActividad.php';

if (isset($_SESSION['usuario'])) {
    $usuario = $_SESSION['usuario'];
}
$cActividad = new ContenedorActividad();


if (isset($_POST['crear'])) {

    $subido = "true";
    $mensajeImagen = "";
    $uploadedfile_size = $_FILES['foto']['size'];
    if ($_FILES['foto']['size'] > 2000000) {
        $mensajeImagen = $mensajeImagen . "El archivo es mayor que 2MB, debes reduzcirlo antes de subirlo<BR>";
        $uploadedfileload = "false";
    }
    if (!($_FILES['foto']['type'] == "image/pjpeg" OR $_FILES['foto']['type'] == "image/gif" OR $_FILES['foto']['type'] == "image/png")) {
        $mensajeImagen = $mensajeImagen . " Tu archivo tiene que ser JPG, GIF o PNG. Otros archivos no son permitidos<BR>";
        $uploadedfileload = "false";
    }
    $ruta = DIR_FOTOS_ACT . $_FILES['foto']['name'];
    if ($subido == "true") {
        if (move_uploaded_file($_FILES['foto']['tmp_name'], $ruta)) {
            chmod($ruta, 0644);
            $mensajeImagen = " Ha sido subido satisfactoriamente";
            $claseMensajeImagen = "success";
            $actividad = new Actividad(
                    null, $_POST['denominacion'], $_POST['descripcion'], $_POST['fecha'], $_POST['hora'], $_POST['importe'], $_FILES['foto']['name']);
            if ($cActividad->insertarActividad($actividad)) {
                $mensaje = "La actividad ha sido creada";
                $claseMensaje = "success";
            } else {
                $mensaje = "No se ha podido crear la actividad";
                $claseMensaje = "error";
            }
        } else {
            $mensajeImagen = "Error al subir el archivo";
            $claseMensajeImagen = "error";
        }
    } else {
        echo $mensajeImagen;
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
                    <p class="titulo-elemento-listado"><?php echo $a->getDenominacion() ?><?php if (isset($_SESSION['rol']) AND $_SESSION['rol'] == ROL_ADMIN) { ?> <a class="btn-editar" href="index.php?page=editar-actividad&idActividad=<?php echo $a->getId() ?>">editar</a><?php } ?></p>
                    <img src="<?php echo DIR_FOTOS_ACT . $a->getFoto() ?>" class="foto-listado" alt="Foto de la actividad<?php $a->getId() ?>">
                    <p><strong>Descripcion: </strong></p><p><?php echo $a->getDescripcion() ?></p>
                    <p><strong>Fecha: </strong><?php echo $a->getFechaEU() ?></p>
                    <p><strong>Hora: </strong><?php echo $a->getHora() ?> </p>
                    <p><strong>Importe: </strong><?php echo $a->getImporte() ?> €</p>
                </div>
                <?php
            }
            ?>

        </div>
        <br><br>
        <?php if (isset($_SESSION['rol']) AND $_SESSION['rol'] == ROL_ADMIN) { ?>
            <h2>Nueva Actividad</h2>
            <form action="index.php?page=actividades" method="POST" enctype="multipart/form-data">
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
                        <input type="file" id="foto" name="foto">
                        <div class="<?php if (isset($claseMensajeImagen)) echo $claseMensajeImagen ?>"> <?php if (isset($mensajeImagen)) echo $mensajeImagen ?></div>
                    </fieldset>
                    <br>
                    <div class="<?php if (isset($claseMensaje)) echo $claseMensaje ?>"> <?php if (isset($mensaje)) echo $mensaje ?></div>
                    <input type="submit" class="btn-default" name="crear" value="Crear">
                </fieldset>
            </form>
            <?php } ?>
    </div>
</div>

