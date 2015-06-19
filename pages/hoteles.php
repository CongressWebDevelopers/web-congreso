<?php
seguridad();
include_once 'php/model/containers/ContenedorInscripcion.php';

if (isset($_POST['hotel']) AND isset($_POST['fechaSalida']) AND isset($_POST['fechaEntrada'])) {
    $inscripcion = getInscripcionUsuario($_SESSION['usuario']->getId());
    if ($cInscripcion->reservarHotel($inscripcion->getId(), $_POST['hotel'], $_POST['fechaEntrada'], $_POST['fechaSalida'])) {
        $mensajeReserva = "La reserva ha sido realizada";
        $claseMensajeReserva = "error";
    } else {
        $mensajeReserva = "La reserva no se ha completado";
        $claseMensajeReserva = "success";
    }
}
?>

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
        <form action="rest/API-rest.php" method="POST" >
            <h2>Hotel</h2>
            <a href="#"onclick="mostrarHoteles()">Comprobar disponibilidad</a>
            <p>Duración estancia:</p>
            <input type="date" id="fechaEntrada" name="fechaEntrada" min="01-06-2015" max="03-06-2015"/>
            <input type="date" id="fechaSalida" name="fechaSalida" min="02-06-2015" max="03-06-2015"/>
            <fieldset id="hoteles"></fieldset>
            <script>
                function enviarReserva() {
                    var xmlhttp = new XMLHttpRequest();
                    var idHotel;
                    var fechaEntrada = document.getElementById("fechaEntrada").value;
                    var fechaSalida = document.getElementById("fechaSalida").value;
                    var resultado = "ninguno";
                    var porNombre = document.getElementsByName("idHotel");

                    for (var i = 0; i < porNombre.length; i++)
                    {
                        if (porNombre[i].checked)
                            idHotel = porNombre[i].value;
                    }
                    xmlhttp.onreadystatechange = function () {
                        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                            var salida = "";
                            var i = 0;
                            document.getElementById("mensajeReserva").innerHTML = salida;
                        }
                    };

                    xmlhttp.open("POST", "rest/API-rest.php", true);
                    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    xmlhttp.send("idHotel=" + idHotel + "&fechaEntrada=" + fechaEntrada + "&fechaSalida=" + fechaSalida);
                }
            </script>
            <script>
                function mostrarHoteles() {
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function () {
                        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                            var hotelesJson = JSON.parse(xmlhttp.responseText);
                            var salida = "";
                            var i = 0;
                            var j = 0;
                            for (i; i < hotelesJson.length; i++) {
                                var h = hotelesJson[i];
                                salida += '<div id="' + h.idHotel + '" class="elemento-listado">\n\
                                    <p class="titulo-elemento-listado">' + h.nombre + ' <input type="radio" name="idHotel" value = ' + h.idHotel + '></p>\n\
                                    <img class="foto-listado" src="' + h.foto + '"> \n\
                                    <p><strong>Descripcion: </strong>' + h.descripcion + '</p> \n\
                                    <p><strong>Precio: </strong>' + h.precio_habitacion + ' €</p>\n\
                                    <p><strong>Plazas disponibles: </strong>' + h.disponibles + '</p>\n\
                                </div>';
                            }
                            document.getElementById("hoteles").innerHTML = salida;
                        }
                    };
                    xmlhttp.open("GET", "rest/API-rest.php", true);
                    xmlhttp.send();
                }
            </script>
            <br>
            <div id="mensajeReserva" class="<?php if (isset($claseMensaje)) echo $claseMensaje ?>"> <?php if (isset($mensaje)) echo $mensaje ?></div>
            <br>
            <p><a href="#" onclick="enviarReserva()" class="btn-verde btn-default btn-grande">Reservar</a></p>
        </form>
    </div>
</div>
