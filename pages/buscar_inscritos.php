<div class="wrapper col3">
    <div id="breadcrumb">
        <ul>
            <li class="first">Tú estás aquí</li>
            <li>&#187;</li>
            <li><a href="#">Inicio</a>
            </li>
            <li>&#187;</li>
            <li class="current"><a href="#">Buscar Participante</a>
            </li>
        </ul>
    </div>
</div>
<div class="wrapper col5">
    <div id="container">			
		<h2>Buscar participante:</h2>
        <form action="index.php?page=buscar_inscritos" method="POST">
            <fieldset>
                <input type="text" id="buscar" name="buscar" onkeyup="buscador()" placeholder="Introduce el Nombre">
            </fieldset>                                                                       
            <br>
            <fieldset id="buscar_inscritos">
                <!--Se rellenará con los participantes recibidas por AJAX-->
            </fieldset>
            <script>
            function buscador(){
				var miBusqueda = document.getElementById("buscar").value;
                if (miBusqueda.length==0){
					document.getElementById("buscar_inscritos").innerHTML = "";
					return;
                }else{
					var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function () {
						if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
							document.getElementById("buscar_inscritos").innerHTML = xmlhttp.responseText;
                        }
                    }
                    xmlhttp.open("GET", "index.php?ajax=buscar_inscritos_ajax&patron=" + miBusqueda, true);
                    xmlhttp.send();
                }
            }
            </script>
        </form>
    </div>
</div>
