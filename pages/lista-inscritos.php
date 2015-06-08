<?php
include_once 'php/model/containers/ContenedorInscripcion.php';
include_once 'php/model/Inscripcion.php';
$cInscripcion = new ContenedorInscripcion();
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
        <table id="lista-inscritos">
            <thead>
                <tr>
                    <th>
                        ID
                    </th>
                    <th>
                        Nombre
                    </th>
                    <th>
                        Telefono
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                $lInscripcion = $cInscripcion->getAll();
                foreach ($lInscripcion as $i) {
                    ?>
                    <tr>
                        <td> 
                            <?php echo $i->getId() ?>
                        </td>
                        <td>
                            <a href="index.php?page=mi-inscripcion&idInscripcion=<?php echo $i->getId()?>"><?php echo $i->getNombre() ?></a>
                        </td>
                        <td>
                            <?php echo $i->getTelefono() ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

