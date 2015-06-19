
function mostrarActividades(idCuota) {
    if (idCuota.length == 0) {
        document.getElementById("actividades").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("actividades").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "index.php?ajax=actividades-ajax&idCuota=" + idCuota, true);
        xmlhttp.send();
    }
}

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
                salida += '<div id="' + h.idHotel + '" class="elemento-listado"> \n\
                                                <p class="titulo-elemento-listado"><em id="precio-hotel-' + h.idHotel + '">' + h.precio_habitacion + ' €</em>   ' + h.nombre + '   <input type="radio" id="idHotel" onchange="calcularTotal(this.value)" name="idHotel" value = ' + h.idHotel + '></p>\n\
                                                <img class="foto-listado" src="' + h.foto + '"> \n\
                                                <p><strong>Descripcion: </strong>' + h.descripcion + '</p> \n\
                                                <p><strong>Plazas disponibles: </strong>' + h.disponibles + '</p>\n\
                                            </div>';
            }
            document.getElementById("hoteles").innerHTML = salida;
        }
    };
    xmlhttp.open("GET", "rest/API-rest.php", true);
    xmlhttp.send();
}

function getCuotaSeleccionada() {
    var elementos = document.getElementsByName("cuota");
    var seleccionada;
    for (var i = 0; i < elementos.length; i++) {
        if (elementos[i].checked)
            seleccionada = elementos[i].value;
    }
    return seleccionada;
}

function getActividadesSeleccionadas() {
    var elementos = document.getElementsByName("actividades[]");
    var seleccionada = [];
    for (var i = 0; i < elementos.length; i++) {
        if (elementos[i].checked && !elementos[i].disabled && !elementos[i].hidden)
            seleccionada[seleccionada.length] = elementos[i].value;
    }
    return seleccionada;
}

function calcularTotal(idHotelSeleccionado) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            var salida = "";
            salida = xmlhttp.responseText;
        }
        precioHotel = 0;
        if (idHotelSeleccionado) {
            precioHotel = parseInt(document.getElementById("precio-hotel-" + idHotelSeleccionado).innerHTML);
        }
        document.getElementById("total").innerHTML = parseInt(salida) + precioHotel;
    };
    var idCuota = getCuotaSeleccionada();
    var idsActividades = getActividadesSeleccionadas();
    var jsonValores = {
        "idCuota": idCuota,
        "idsActividades": idsActividades
    };
    jsonstring = JSON.stringify(jsonValores);
    xmlhttp.open("POST", "index.php?ajax=calcula-inscripcion-ajax", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
    xmlhttp.send('datos=' + JSON.stringify(jsonValores));
}

function confirmacion(){ 
    if (confirm('¿Está seguro de que los datos son correctos? Va a procederse a la inscripción en el CEIIE')){ 
       document.getElementById('formulario-inscripcion').submit() 
    } 
} 