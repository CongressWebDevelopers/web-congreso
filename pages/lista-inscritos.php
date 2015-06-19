<?php
seguridad();
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
		<h2>Buscar participante:</h2>
        <form action="index.php?page=lista_inscritos" method="POST">
            <fieldset>
                <input type="text" id="buscar" name="buscar" onkeyup="buscador()" placeholder="Introduce el Nombre">
            </fieldset>                                                                       
            <br>                                           
		<div id="buscar_inscritos">
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
                        Teléfono
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
        <script>
            function buscador(){
				var miBusqueda = document.getElementById("buscar").value;
            //    if (miBusqueda.length==0){
			//		document.getElementById("buscar_inscritos").innerHTML = "";
		//			return;         
            //    }else{
					var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function () {
						if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
							document.getElementById("buscar_inscritos").innerHTML = xmlhttp.responseText;
                        }
                    }
                    xmlhttp.open("GET", "index.php?ajax=buscar_inscritos_ajax&patron=" + miBusqueda, true);
                    xmlhttp.send();
               // }
            }
            </script>
        </form>
    </div>
</div>

