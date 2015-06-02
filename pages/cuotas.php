<?php
if(isset($_POST['crear'])){
    
}
?>

<div class="wrapper col3">
    <div id="breadcrumb">
        <ul>
            <li class="first">Tú estás aquí</li>
            <li>&#187;</li>
            <li><a href="#">Administración</a>
            </li>
            <li>&#187;</li>
            <li class="current"><a href="#">Cuotas</a>
            </li>
        </ul>
    </div>
</div>
<div class="wrapper col5">
    <div id="container">
        <h2>Cuotas disponibles</h2>
        <br>
        <h2>Nueva Cuota</h2>
        <form action="index.php?page=nuevaCuota.php" method="POST">
            <fieldset>
                <p>
                    <label for="denominacion">Denominación</label>
                    <input type="text" name="denominacion" placeholder=""/>
                </p>
                <br>
                <p><label for="descripcion">Descripción</label></p>
                <p><textarea rows="10" cols="50" id="descripcion" name="descripcion"></textarea></p>
                <p>
                    <label for="importe">Importe (€)</label>
                    <input type="number" name="importe"/>
                </p>
                <div class="<?php if (isset($claseMensaje)) echo $claseMensaje ?>"> <?php if (isset($mensaje)) echo $mensaje ?></div>
                <input type="submit" class="btn-default" name="crear" value="Crear">
            </fieldset>
        </form>
    </div>
</div>

