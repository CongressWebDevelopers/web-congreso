<div class="wrapper col3">
    <div id="breadcrumb">
        <ul>
            <li class="first">Tú estás aquí</li>
            <li>&#187;</li>
            <li><a href="#">Inicio</a>
            </li>
            <li>&#187;</li>
            <li class="current"><a href="#">Hoteles</a>
            </li>
        </ul>
    </div>
</div>
<div class="wrapper col5">
    <div id="container">
        <h1>Obtener hoteles disponibles</h1>
        <form id="hoteles"  action="rest/API-rest.php" method="get" >
            <div id="contacto-notification" class="" style="display:none">
            </div>
            <div id="hoteles">
            </div>
            <script>
                    function mostrarHoteles() {
                        if (idCuota.length == 0) {
                            document.getElementById("hoteles").innerHTML = "";
                            return;
                        } else {
                            var xmlhttp = new XMLHttpRequest();
                            xmlhttp.onreadystatechange = function () {
                                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                                    document.getElementById("hoteles").innerHTML = xmlhttp.responseText;
                                }
                            }
                            xmlhttp.open("GET", "rest/API-hoteles.php", true);
                            xmlhttp.send();
                        }
                    }
                </script>
            <?php
            if (isset($notificacion)) {
                ?>
                <div class="<?php echo $notificacionClass ?>"><?php echo $notificacion ?></div>
            <?php } ?>
            <input type="submit" value="Obtener" name="obtener" class="btn-default">
            </p>
        </form>
    </div>
</div>
