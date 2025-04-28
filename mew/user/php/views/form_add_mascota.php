<?php
include('../templates/header.php');
include('../mascotas.php');

?>  
<link rel="stylesheet" href="../../css/agregar_mascotas.css">
    <div class="container-form">
        <div class="info-form">
            <h2>Registra a tu mascota</h2>
            <p>¿Tienes más de una mascota? No hay problema puedes agregar las mascotas que quieras.</p>
            <img src="../../src/img/f1280x720-966888_1098563_7846.jpg" alt="" id="wenamechi">
        </div>
        <div class="for">
            <form action="form_add_mascota.php" method="post">
                <input required type="text" name="nombre" placeholder="Nombre" class="campo">
                <input required type="number" name="edad" placeholder="Edad" class="campo">
                <input required type="text" name="especie" placeholder="Especie" class="campo">
                <input required type="text" name="raza" placeholder="Raza" class="campo">
                <input required type="text" name="genero" placeholder="Género" class="campo">
                <button required type="submit" name="accion" value="agregar" class="btn-enviar">Agregar mascota</button>
            </form>
        </div>
    </div>
    
<?php
include('../templates/footer.php');

?>
