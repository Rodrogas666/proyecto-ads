<?php

//El objetivo de este archivo es recopilar todas las mascotas

include_once('../../config/bd.php');
$conexionBD = BD::crearInstancia();

$id_veterinario = $_SESSION['veterinario'];

$sql = "SELECT * FROM mascota";
$consulta = $conexionBD->prepare($sql);
$consulta->execute();
$todasLasMascotas = $consulta->fetchAll(PDO::FETCH_ASSOC);


?>