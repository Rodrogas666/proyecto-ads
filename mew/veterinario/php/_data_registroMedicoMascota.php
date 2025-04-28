<?php

//El objetivo de este archivo es recopilar los registros medicos de la mascota como veterinario4

//Este el id de la mascota donde se obtiene al final de la url de la ancla del boton aquel
$idMascota = $_GET['id'];
//lo de los corchetes del GET son los cosos que estan al final de la url
//Ej: ?id=[IdDeLaMascota]



include_once('../../config/bd.php');
$conexionBD = BD::crearInstancia();


$sql = "SELECT * FROM registro_medico WHERE id_mascota = $idMascota";
$consulta = $conexionBD->prepare($sql);
$consulta->execute();
$registrosMedicos = $consulta->fetchAll(PDO::FETCH_ASSOC);


?>