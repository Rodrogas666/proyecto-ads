<?php

include('../templates/header.php');
include('../citas.php');


?>


<form action="form_agregar_cita.php" method="post">

    <!-- <label for="">Tipo</label>
    <select name="estados" id="estados">
        <option value="1">Cita común</option>
        <option value="2">Emergencia</option>
    </select> -->
    <br>
    <br>

    <label for="">Fecha</label>
    <input type="datetime-local" name="fecha" id="fecha">

    <br><br>

    <label for="">Asunto</label>
    <input type="text" name="asunto" id="asunto">

    <label for="">Mensaje</label>
    <input type="text" name="mensaje" id="mensaje">

    <br><br>

    <label for="">Mascota</label>
    <select name="mascota" id="mascota">
        <?php foreach ($clientemascotas as $mascota) { ?>
            <option value="<?php echo $mascota['id_mascota']; ?>">
                <?php echo $mascota['nombre']; ?> 
            </option>
        <?php } ?>
    </select>

    <br><br>
    <button type="submit" name="accion" value="agregar">Agregar cita</button>
</form>



<?php
include('../templates/footer.php');

?>