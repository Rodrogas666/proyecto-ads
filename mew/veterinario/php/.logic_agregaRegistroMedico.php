<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $examenes = $_POST['examenes'];
    $resultados = $_POST['resultados'];
    $enfermedades = $_POST['enfermedades'];
    $medicamentos = $_POST['medicamentos'];
    $id_mascota = intval($_POST['id_mascota']);

    include_once('../../config/bd.php');
    $conexionBD = BD::crearInstancia();


    $sql = "INSERT INTO registro_medico(examenes,resultados,enfermedades,medicamentos,id_mascota) VALUES('$examenes','$resultados','$enfermedades','$medicamentos',$id_mascota)";
    $consulta = $conexionBD->prepare($sql);
    $consulta->execute();

    echo "<script>
            alert('Registro agregado !')
            window.location.href = 'view_mascotas.php'
            </script>";
}

?>