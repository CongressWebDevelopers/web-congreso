<div class="wrapper col3">
    <div id="breadcrumb">
        <ul>
            <li class="first">Tú estás aquí</li>
            <li>&#187;</li>
            <li><a href="#">Administración</a>
            </li>
            <li>&#187;</li>
            <li class="current"><a href="#">Actividades</a>
            </li>
        </ul>
    </div>
</div>
<div class="wrapper col5">
    <div id="container">
        <h2>Actividades disponibles</h2>
        <br>
        <h2>Nueva Actividad</h2>
        <form action="index.php?page=nuevaActividad.php" method="POST">
            <fieldset>
                <p>
                    <label for="denominacion">Denominación</label>
                    <input type="text" name="denominacion" placeholder=""/>
                </p>                
                <br>
                <p><label for="descripcion">Descripción</label></p>
                <p><textarea rows="10" cols="50" id="descripcion" name="descripcion"></textarea></p>
                <br>
                <p>
                    <label for="fecha">Fecha</label>
                    <input type="date" name="fecha" />
                    <label for="hora">Hora</label>
                    <input type="time" name="hora"/>
                </p>
                <p>
                    <label for="importe">Importe (€)</label>
                    <input type="number" name="importe"/>
                </p>
                <fieldset>
                    <p><label for="foto">Foto</label></p>
                    <input type="file">
                </fieldset>
                <br>
                <div class="<?php if (isset($claseMensaje)) echo $claseMensaje ?>"> <?php if (isset($mensaje)) echo $mensaje ?></div>
                <input type="submit" class="btn-default" name="crear" value="Crear">
            </fieldset>
        </form>
    </div>
</div>

