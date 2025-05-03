<?php
session_start();
include_once '../../../config/bd.php';

$conexionBD = BD::crearInstancia();

if ($_POST) {
    $nombre = trim($_POST['nombre']);
    $apellido = trim($_POST['apellido']);
    $correo = trim($_POST['correo']);
    $password = trim($_POST['password']);

    // Validaciones del servidor
    if (empty($nombre) || empty($apellido) || empty($correo) || empty($password)) {
        echo "<script>alert('Todos los campos son obligatorios.'); window.location.href = '" . $_SERVER['HTTP_REFERER'] . "';</script>";
        exit();
    }

    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('El correo electrónico no es válido.'); window.location.href = '" . $_SERVER['HTTP_REFERER'] . "';</script>";
        exit();
    }

    if (!str_ends_with($correo, '@gmail.com')) {
        echo "<script>alert('El correo debe ser una cuenta de Gmail.'); window.location.href = '" . $_SERVER['HTTP_REFERER'] . "';</script>";
        exit();
    }

    if (strlen($password) < 6) {
        echo "<script>alert('La contraseña debe tener al menos 6 caracteres.'); window.location.href = '" . $_SERVER['HTTP_REFERER'] . "';</script>";
        exit();
    }

    // Verificar si el correo ya existe en la base de datos
    $sqlCheck = "SELECT COUNT(*) FROM cliente WHERE correo = :correo";
    $consultaCheck = $conexionBD->prepare($sqlCheck);
    $consultaCheck->bindParam(':correo', $correo);
    $consultaCheck->execute();
    $existeCorreo = $consultaCheck->fetchColumn();

    if ($existeCorreo > 0) {
        echo "<script>alert('El correo ya está registrado.'); window.location.href = '" . $_SERVER['HTTP_REFERER'] . "';</script>";
        exit();
    }

    // Si todo está bien, inserta los datos en la base de datos
    $sql = "INSERT INTO cliente (id, nombre, apellido, correo, contrasenia) VALUES(NULL, :nombre, :apellido, :correo, :password)";
    $consulta = $conexionBD->prepare($sql);
    $consulta->bindParam(':nombre', $nombre);
    $consulta->bindParam(':apellido', $apellido);
    $consulta->bindParam(':correo', $correo);
    $consulta->bindParam(':password', $password);
    $consulta->execute();

    header('Location:../views/form_login.php');
    exit();
}
?>