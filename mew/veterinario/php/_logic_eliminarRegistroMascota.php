<?php
session_start();


if(isset($_SESSION['veterinario'])){
    $id_registro = $_GET['id_registro'];
    $id_mascota = $_GET['id_mascota'];

    include_once('../../config/bd.php');
    $conexionBD = BD::crearInstancia();


    $sql = "DELETE FROM registro_medico WHERE id=$id_registro";

    $consulta = $conexionBD->prepare($sql);
    $consulta->execute();

    echo "<script>
            alert('Registro eliminado !')
            window.location.href = 'view_mascotaHistorial.php?id=$id_mascota'
            </script>";

}

?>