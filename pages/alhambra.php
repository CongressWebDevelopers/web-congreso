
    <div class="wrapper col3">
        <div id="breadcrumb">
            <ul>
                <li class="first">Tú estás aquí</li>
                <li>&#187;</li>
                <li><a href="#">Inicio</a>
                </li>
                <li>&#187;</li>
                <li>Actividades</li>
                <li>&#187;</li>
                <li class="current"><a href="#">Visita a la Alhambra</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="wrapper col5">
        <div id="container">
            <h1>Visita a la Alhambra</h1>

            <p>
                La Alhambra representa todo el esplendor y el poder de la dinastía nazarí. Su toma se produjo el 2 de enero de 1492 con la entrada de los Reyes Católicos en la ciudad tras una guerra de 10 años. El primer sultán de la Alhambra fue Muhammad I o Al-Ahmar, el fundador de la dinastía nazarí, y el último sultán: Muhammad XII, más conocido como Boabdil.</p>
            <p>La Alhambra de Granada es el monumento más visitado de España. 3 millones de turistas visitaron la Alhambra y el Generalife en 2012. Este conjunto monumental fue declarado Patrimonio de la Humanidad por la Unesco en el año 1984.</p>
            <p>Desde este 1º Congreso de Ingeniería Informática, no queremos dejar pasar la oportunidad de hacer un tour guiado por la Alhambra y los jardines del Generalife.</p>

            <div id="img_palacio">
                <img alt="Imagen palacio Carlos V" src="images/palacio_carlosV.jpg" />
            </div>
            <h3>Itinerario</h3>
            <p>Dicha visita se producirá el 22 de junio a las 10 de la mañana, y será gratuita para todos los inscritos en el congreso. La mejor manera para conocer en profundidad la Alhambra y el Generalife, es ir de la mano con un guia oficial del monumento.</p>
            <p>La visita guiada recorre todo el monumento completo de la Alhambra y el Generalife, visitando el Patio de los Leones, los Palacios Nazaríes, el Palacio de Carlos V, la Mezquita, el Patio de los Arrayanes y el de Comares, la Sala de los Reyes, el Patio de Lindaraja, el Mexuar, el Cuarto Dorado, el Mirador de Daraxa, el Salón de Embajadores, la Sala de Abencerrajes, Sala de los Mocárabes, el Partal, el Palacio de Yusuf III, el Patio de la Acequia, el Patio de la Sultana, la Escalera del Agua, la Alcazaba, el Paseo de los Cipreses, el Palacio y los Jardines del Generalife.</p>
            <p>Como ya se ha dicho,la visita comenzará a las 09:30 horas de la mañana. Los inscritos al congreso serán recogidos en autobuses en un punto aún por definir, y serán trasladados en a la Alhambra. A la llegada se hace entrega a cada visitante de un sistema de audífonos para escuchar las explicaciones del guía y disfrutar de una visita tranquila y personalizada exclusivamente para el grupo.</p>
            <p>La visita tendrá una duracion aproximada de 3 horas y termina con el traslado de vuelta en autobús.</p>
            <p>Por tanto, resumiendo los puntos claves, la visita guiada incluye:</p>
            <ul>
                <li>Traslados Ida y vuelta desde Granada ciudad al monumento de la Alhambra</li>
                <li>Asistencia por guía oficial</li>
                <li>Entrada para visitar toda la Alhambra</li>
                <li>Sistema de audifonos</li>
                <li>Guia oficial sobre la Alhambra</li>
            </ul>

            <div id="img_plano">
                <img alt="Plano Alhambra" src="images/plano.jpg" />
            </div>
            <div class=".galeria">
               <h3>Galería de imágenes</h3>
<?php
require_once("modulos/lectorImagenes.php");
$descripcion = getDescripcionActividad("imagenes-alhambra.txt");
$i = -1;
foreach($descripcion["imagenes"] as $img ){
    $i++;
    $imgAling=($i%2)?"imgl":"imgr";
    echo '<img id="img-alambra-'. $i .'" alt="Imagenes Alhambra" class="'. $imgAling .'" src="images/'. $img.'"/>';
    if(isset($descripcion["texto"][$i])) echo '<p class="descripcion-imagen">' . $descripcion["texto"][$i] . '</p>';
    echo '<hr class="clear">';
}
 ?>
            </div>

        </div>

    </div>
