<?php

/*
        document.getElementById("enfermedades").value = registro.enfermedades
        document.getElementById("examenes").value = registro.examenes
        document.getElementById("medicamentos").value = registro.medicamentos
        document.getElementById("resultados").value = registro.resultados
        document.getElementById("idMascota").value = registro.idMascota
        document.getElementById("idRegistro").value = registro.idRegistro

*/

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $examenes = $_POST['examenes'];
    $resultados = $_POST['resultados'];
    $enfermedades = $_POST['enfermedades'];
    $medicamentos = $_POST['medicamentos'];

    $id_mascota =$_POST['id_mascota'];
    $id_registro =$_POST['id_registro'];

    include_once('../../config/bd.php');
    $conexionBD = BD::crearInstancia();


    $sql = "UPDATE registro_medico SET examenes='$examenes',resultados='$resultados',enfermedades='$enfermedades',medicamentos='$medicamentos' WHERE id = $id_registro";

    $consulta = $conexionBD->prepare($sql);
    $consulta->execute();

    echo "<script>
            alert('Registro editado !')
            window.location.href = 'view_mascotaHistorial.php?id=$id_mascota'
            </script>";
}

?>