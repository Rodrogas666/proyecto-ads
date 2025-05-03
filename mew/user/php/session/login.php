<?php
include_once '../../../config/bd.php';

$conexionBD = BD::crearInstancia();

if ($_POST) {
    session_start();
    $correo = trim($_POST['correo']);
    $password = trim($_POST['password']);

    // Validaciones del servidor
    if (empty($correo) || empty($password)) {
        echo "<script>
        alert('Todos los campos son obligatorios.');
        window.location.href = '../views/form_login.php';
        </script>";
        exit();
    }

    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        echo "<script>
        alert('El correo electrónico no es válido.');
        window.location.href = '../views/form_login.php';
        </script>";
        exit();
    }

    // Verifica si el usuario existe en la base de datos
    $sql = $conexionBD->prepare('SELECT * FROM cliente WHERE correo=:correo AND contrasenia=:password');
    $sql->bindParam(':correo', $correo);
    $sql->bindParam(':password', $password);
    $sql->execute();
    $usuario = $sql->fetch(PDO::FETCH_ASSOC);

    // Verifica si el veterinario existe en la base de datos
    $sqlVeterinario = $conexionBD->prepare('SELECT * FROM veterinario WHERE correo=:correo AND contrasenia=:password');
    $sqlVeterinario->bindParam(':correo', $correo);
    $sqlVeterinario->bindParam(':password', $password);
    $sqlVeterinario->execute();
    $veterinario = $sqlVeterinario->fetch(PDO::FETCH_ASSOC);

    if ($usuario) {
        $_SESSION['usuario'] = $usuario['id'];
        header('Location:../views/home.php');
        exit();
    } else if ($veterinario) {
        $_SESSION['veterinario'] = $veterinario['id'];
        header('Location:../../../veterinario/php/dashboard.php');
        exit();
    } else {
        echo "<script>
        alert('Correo o contraseña incorrectos.');
        window.location.href = '../views/form_login.php';
        </script>";
        exit();
    }
}
?>