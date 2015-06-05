<?php
include_once 'php/model/containers/ContenedorActividad.php';

$usuario = $_SESSION['usuario'];
$cActividad = new ContenedorActividad();
$actividad = $cActividad->getById($_GET['idActividad']);

if (isset($_POST['modificar'])) {
    var_dump($_FILES['foto']);
    if ($_FILES['foto']['name']!=="") {
        $subido = "true";
        $mensajeImagen = "";
        $foto=$_FILES['foto']['name'];
        $uploadedfile_size = $_FILES['foto']['size'];
        if ($_FILES['foto']['size'] > 2000000) {
            $mensajeImagen = $mensajeImagen . "El archivo es mayor que 2MB, debes reduzcirlo antes de subirlo<BR>";
            $uploadedfileload = "false";
        }
        if (!($_FILES['foto']['type'] == "image/pjpeg" OR $_FILES['foto']['type'] == "image/gif" OR $_FILES['foto']['type'] == "image/png")) {
            $mensajeImagen = $mensajeImagen . " Tu archivo tiene que ser JPG, GIF o PNG. Otros archivos no son permitidos<BR>";
            $uploadedfileload = "false";
        }

        $ruta = DIR_FOTOS_ACT . $foto;
        if ($subido == "true") {
            if (move_uploaded_file($_FILES['foto']['tmp_name'], $ruta)) {
                chmod($ruta, 0644);
                $mensajeImagen = "La foto ha sido modificada correctamente";
                $claseMensajeImagen = "success";
            }
        } else {
            $mensajeImagen = "Error al subir el archivo";
            $claseMensajeImagen = "error";
        }
    }else{
        $foto = $actividad->getFoto();
    }
    var_dump($foto);
    $actividad = new Actividad(
            $_GET['idActividad'], $_POST['denominacion'], $_POST['descripcion'], $_POST['fecha'], $_POST['hora'], $_POST['importe'], $foto);
    if ($cActividad->modificarActividad($actividad)) {
        $mensaje = "La actividad ha sido modificada";
        $claseMensaje = "success";
    } else {
        $mensaje = "No se ha podido modificar la actividad";
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
            <li class="current"><a href="#">Editar Actividad</a>
            </li>
        </ul>
    </div>
</div>
<div class="wrapper col5">
    <div id="container">
        <h2>Editar Actividad</h2>
        <form action="index.php?page=editar-actividad&idActividad=<?php echo $actividad->getId(); ?>" method="POST" enctype="multipart/form-data">
            <fieldset>
                <p>
                    <label for="denominacion">Denominación</label>
                    <input type="text" name="denominacion" value="<?php echo $actividad->getDenominacion() ?>" required/>
                </p>                
                <br>
                <p><label for="descripcion">Descripción</label></p>
                <p><textarea rows="10" cols="50" id="descripcion" name="descripcion" required><?php echo $actividad->getDescripcion() ?></textarea></p>
                <br>
                <p>
                    <label for="fecha">Fecha</label>
                    <input type="date" name="fecha" value="<?php echo $actividad->getFecha() ?>"required />
                    <label for="hora">Hora</label>
                    <input type="time" name="hora" value="<?php echo $actividad->getHora() ?>" required/>
                </p>
                <p>
                    <label for="importe">Importe (€)</label>
                    <input type="number" name="importe" value="<?php echo $actividad->getImporte() ?>" required/>
                </p>
                <fieldset>
                    <img src="<?php echo DIR_FOTOS_ACT . $actividad->getFoto() ?>">
                    <p><label for="foto">Para cambiar la foto, suba una nueva</label></p>
                    <input type="file" id="foto" name="foto">
                    <div class="<?php if (isset($claseMensajeImagen)) echo $claseMensajeImagen ?>"> <?php if (isset($mensajeImagen)) echo $mensajeImagen ?></div>
                </fieldset>
                <br>
                <div class="<?php if (isset($claseMensaje)) echo $claseMensaje ?>"> <?php if (isset($mensaje)) echo $mensaje ?></div>
                <input type="submit" class="btn-default" name="modificar" value="Modificar">
            </fieldset>
        </form>

    </div>
</div>
