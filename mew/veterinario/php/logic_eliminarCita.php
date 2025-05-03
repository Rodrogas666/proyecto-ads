<?php
include_once('../../config/bd.php');

// Hace la conexión a la base de datos
$conexionBD = BD::crearInstancia();

// Verifica si se recibió el ID de la cita
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id_cita = intval($_GET['id']);

    // Elimina la cita de la base de datos
    $sql = "DELETE FROM citas WHERE id_cita = :id_cita";
    $consulta = $conexionBD->prepare($sql);
    $consulta->bindParam(':id_cita', $id_cita);

    if ($consulta->execute()) {
        echo "<script>
        alert('Cita eliminada correctamente.');
        window.location.href = 'view_ended_citas.php';
        </script>";
    } else {
        echo "<script>
        alert('Error al eliminar la cita.');
        window.location.href = 'view_ended_citas.php';
        </script>";
    }
} else {
    echo "<script>
    alert('ID de cita no válido.');
    window.location.href = 'view_ended_citas.php';
    </script>";
}
?>