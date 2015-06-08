<?php

function getBreadCrumb($nombre) {
    $nombre = explode("-", $nombre);
    ?><div class="wrapper col3">
        <div id="breadcrumb">
            <ul>
                <li class="first">Tú estás aquí</li>
                <li>&#187;</li>
                <li><a href="/index.php">Inicio</a>
                </li><?php
                for ($i = 0; i < count($nombre) - 1; $i++) {
                    ?><li>&#187;</li>
                    <li><a href="/index.php?="><?php $nombre[$i] ?></a>
                    </li>
                <?php } ?>
                <li>&#187;</li>
                <li class="current"><a href="/index.php?="><?php echo $nombre[count($nombre)-1] ?></a>
                </li>
            </ul>
        </div>
    </div><?php
}
?>