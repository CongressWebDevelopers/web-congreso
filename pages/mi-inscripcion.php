<?php
include_once 'php/model/containers/ContenedorActividad.php';
$usuario = $_SESSION['usuario'];
$cInscripcion = new ContenedorInscripcion();
$cActividad = new ContenedorActividad();
$inscripcion = $cInscripcion->getInscripcionUsuario($usuario->getId());
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
        <div class="elemento-listado">
            <p class="titulo-elemento-listado">Mi inscripción:</p>
        <p><strong>Nombre: </strong><?php echo $inscripcion->getNombre() ?></p>
        <p><strong>Email: </strong><?php echo $usuario->getNombreUsuario() ?></p>
        <p><strong>Centro: </strong><?php echo $inscripcion->getCentro() ?></p>
        <p><strong>Teléfono: </strong><?php echo $inscripcion->getTelefono() ?></p>
        <p><strong>Cuota: </strong><?php echo $inscripcion->getCuota() ?></p>
        <p><strong>Hotel: </strong><?php echo $inscripcion->getHotel() ?></p>
        <p><strong>Fecha Entrada: </strong><?php echo $inscripcion->getFechaEntrada() ?></p>
        <p><strong>Fecha de Salida: </strong><?php echo $inscripcion->getFechaSalida() ?></p>
        <?php
        $lActividades = $cActividad->getListaActividadesId($inscripcion->getActividades());
        foreach ($lActividades as $a) {
            ?>
            <div id="actividad-<?php $a->getId() ?>" class="actividades elemento-listado">
                <p class="titulo-elemento-listado"><?php echo $a->getDenominacion() ?>
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
    </div>
</div>


