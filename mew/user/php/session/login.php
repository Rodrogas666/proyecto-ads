<?php

include_once '../../../config/bd.php';
//Hace la conexión a la base de datos
$conexionBD = BD::crearInstancia();


if ($_POST) {
    session_start();
    $correo = $_POST['correo'];
    $password = $_POST['password'];
    $sql = $conexionBD->prepare('SELECT * FROM cliente WHERE correo=:correo AND contrasenia=:password');
    $sql->bindParam(':correo', $correo);
    $sql->bindParam(':password', $password);
    $sql->execute();
    $usuario = $sql->fetch(PDO::FETCH_ASSOC);

    //veterinarios
    $sqlVeterinario = $conexionBD->prepare('SELECT * FROM veterinario WHERE correo=:correo AND contrasenia=:password');
    $sqlVeterinario->bindParam(':correo', $correo);
    $sqlVeterinario->bindParam(':password', $password);
    $sqlVeterinario->execute();
    $veterinario = $sqlVeterinario->fetch(PDO::FETCH_ASSOC);


    if ($usuario) {
        $_SESSION['usuario'] = $usuario['id'];
        header('Location:../views/home.php');

    } else if ($veterinario) {
        $_SESSION['veterinario'] = $veterinario['id'];
        header('Location:../../../veterinario/php/dashboard.php');

    } else {
        echo "<script>
        alert('Contraseña o usuario incorrecto :)')
        window.location.href = '../views/form_login.php'
        </script>";
    }
}

/*
if ($_POST) {
$name = $_POST['name'];
$password = $_POST['password'];
// echo $name;
// echo $password;
$con = mysqli_connect("localhost", "root", "", "testing");
$sql = "INSERT INTO `infoUsuario` (`idUsuario`, `name`, `password`) VALUES (NULL, '$name', '$password')";
$resultado  = mysqli_query($con, $sql);
mysqli_close($con);
}
/*
?>
/*$sql = "SELECT * FROM cursos WHERE id=:id";
$consulta = $conexionBD->prepare($sql);
$consulta->bindParam(':id', $id);
$consulta->execute();
$curso=$consulta->fetch(PDO::FETCH_ASSOC); */

?>
