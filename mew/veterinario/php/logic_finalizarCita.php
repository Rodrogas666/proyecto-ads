<?php
include_once('../../config/bd.php');

// Hace la conexión a la base de datos
$conexionBD = BD::crearInstancia();

// Verifica si se recibió el ID de la cita
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id_cita = intval($_GET['id']);

    // Actualiza el estado de la cita a "done"
    $sql = "UPDATE citas SET estado = 'done' WHERE id_cita = :id_cita";
    $consulta = $conexionBD->prepare($sql);
    $consulta->bindParam(':id_cita', $id_cita);

    if ($consulta->execute()) {
        echo "<script>
        alert('Cita finalizada correctamente.');
        window.location.href = 'dashboard_citas_accepted.php';
        </script>";
    } else {
        echo "<script>
        alert('Error al finalizar la cita.');
        window.location.href = 'dashboard_citas_accepted.php';
        </script>";
    }
} else {
    echo "<script>
    alert('ID de cita no válido.');
    window.location.href = 'dashboard_citas_accepted.php';
    </script>";
}
?>