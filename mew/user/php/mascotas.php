<?php
include_once('../../../config/bd.php');

// Hace la conexión a la base de datos
$conexionBD = BD::crearInstancia();

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$id_cliente = $_SESSION['usuario'];

$consulta = $conexionBD->prepare("SELECT * FROM `clientemascotas` INNER JOIN mascota ON clientemascotas.id_mascota = mascota.id WHERE id_cliente = $id_cliente");
$consulta->execute();
$listaMascotas = $consulta->fetchAll();

if ($_POST) {
    $accion = isset($_POST['accion']) ? $_POST['accion'] : '';
    $nombre = isset($_POST['nombre']) ? trim($_POST['nombre']) : '';
    $raza = isset($_POST['raza']) ? trim($_POST['raza']) : '';
    $especie = isset($_POST['especie']) ? trim($_POST['especie']) : '';
    $edad = isset($_POST['edad']) ? trim($_POST['edad']) : '';
    $genero = isset($_POST['genero']) ? trim($_POST['genero']) : '';
    $id_mascota = isset($_POST['id_mascota']) ? $_POST['id_mascota'] : '';

    if ($accion) {
        switch ($accion) {
            case 'agregar':
                if (empty($nombre) || empty($raza) || empty($especie) || empty($edad) || empty($genero)) {
                    echo "<script>alert('Todos los campos son obligatorios.'); window.location.href = 'form_add_mascota.php';</script>";
                    exit();
                }

                if (!is_numeric($edad) || $edad <= 0) {
                    echo "<script>alert('La edad debe ser un número mayor a 0.'); window.location.href = 'form_add_mascota.php';</script>";
                    exit();
                }

                $sql = "INSERT INTO mascota (id, nombre, especie, raza, edad, genero) VALUES (NULL, :nombre, :especie, :raza, :edad, :genero)";
                $consulta = $conexionBD->prepare($sql);
                $consulta->bindParam(':nombre', $nombre);
                $consulta->bindParam(':especie', $especie);
                $consulta->bindParam(':raza', $raza);
                $consulta->bindParam(':edad', $edad);
                $consulta->bindParam(':genero', $genero);
                $consulta->execute();

                $ultimo_id_mascota = $conexionBD->lastInsertId();

                $sql2 = "INSERT INTO clientemascotas (id, id_mascota, id_cliente) VALUES(NULL, :id_mascota, :id_cliente)";
                $consulta2 = $conexionBD->prepare($sql2);
                $consulta2->bindParam(':id_mascota', $ultimo_id_mascota);
                $consulta2->bindParam(':id_cliente', $id_cliente);
                $consulta2->execute();

                echo "<script>alert('Mascota agregada :)'); window.location.href = 'mascota_vista.php';</script>";
                break;

            case 'editar':
                if (empty($nombre) || empty($raza) || empty($especie) || empty($edad) || empty($genero)) {
                    echo "<script>alert('Todos los campos son obligatorios.'); window.location.href = 'form_add_mascota.php';</script>";
                    exit();
                }

                if (!is_numeric($edad) || $edad <= 0) {
                    echo "<script>alert('La edad debe ser un número mayor a 0.'); window.location.href = 'form_add_mascota.php';</script>";
                    exit();
                }

                $sql = "UPDATE mascota SET nombre=:nombre, especie=:especie, raza=:raza, edad=:edad, genero=:genero WHERE id =:id_mascota";
                $consulta = $conexionBD->prepare($sql);
                $consulta->bindParam(':id_mascota', $id_mascota);
                $consulta->bindParam(':nombre', $nombre);
                $consulta->bindParam(':especie', $especie);
                $consulta->bindParam(':raza', $raza);
                $consulta->bindParam(':edad', $edad);
                $consulta->bindParam(':genero', $genero);
                $consulta->execute();

                echo "<script>alert('Datos de mascota editados :)'); window.location.href = 'mascota_vista.php';</script>";
                break;

            case 'eliminar':
                $sql = "DELETE FROM mascota WHERE id=:id_mascota";
                $consulta = $conexionBD->prepare($sql);
                $consulta->bindParam(':id_mascota', $id_mascota);
                $consulta->execute();

                echo "<script>alert('Mascota eliminada :)'); window.location.href = 'mascota_vista.php';</script>";
                break;
        }
    }
}
?>