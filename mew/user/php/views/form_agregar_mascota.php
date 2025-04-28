<?php 

include_once('../templates/header.php');
include_once('../mascotas.php');

?>


<br>    
<br>
<form action='../../php/views/vista_mascotas.php' method="post">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" id="">
    <br>
    <br>
    <label for="raza">Raza</label>
    <input type="text" name="raza" id="">
    <br>
    <br>
    <label for="edad">Edad</label>
    <input type="text" name="edad" id="">
    <br>
    <br>
    <button type="submit" class="add">Añadir mascota</button>
</form>


<?php  include('../templates/footer.php');  ?>