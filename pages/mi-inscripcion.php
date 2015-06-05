<?php
$usuario = $_SESSION['usuario'];
$cInscripcion = new ContenedorInscripcion();
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
        <h2>Mi inscripción:</h2>
        <p>Nombre: <?php echo $inscripcion->getNombre() ?></p>
        <p>Email: <?php echo $usuario->getNombreUsuario() ?></p>
        <p>Centro: <?php echo $inscripcion->getCentro() ?></p>
        <p>Teléfono: <?php echo $inscripcion->getTelefono() ?></p>
        <p>Cuota: <?php echo $inscripcion->getCuota() ?></p>
        <p>Hotel: <?php echo $inscripcion->getHotel() ?></p>
        <p>Fecha Entrada: <?php echo $inscripcion->getFechaEntrada() ?></p>
        <p>Fecha de Salida: <?php echo $inscripcion->getFechaSalida() ?></p>
        <p>Actividades: <?php print_r($inscripcion->getActividades())  ?></p>
    </div>
</div>


