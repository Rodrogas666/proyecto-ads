<?php

//El objetivo de este archivo es obtener todas las citas con el estado Done
//Significa obtener todas las citas finalizadas 


include_once('../../config/bd.php');
$conexionBD = BD::crearInstancia();


$sql = "SELECT * FROM `veterinariocitas` INNER JOIN citas ON veterinariocitas.id_cita = citas.id_cita INNER JOIN mascota ON mascota.id = citas.id_mascota WHERE citas.estado = 'done'";
$consulta = $conexionBD->prepare($sql);
$consulta->execute();
$vetCitas = $consulta->fetchAll(PDO::FETCH_ASSOC);
?>