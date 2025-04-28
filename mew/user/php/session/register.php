<?php

session_start();
include_once '../../../config/bd.php';
//Hace la conexión a la base de datos

$conexionBD = BD::crearInstancia();


// print_r($_POST);

if ($_POST) {

    if ($_POST['nombre']!= '' || $_POST['apellido']!= '' || $_POST['correo']!= '' || $_POST['password']!= '') {

            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $correo = $_POST['correo'];
            $password = $_POST['password'];

            $sql = "INSERT INTO cliente (id, nombre, apellido, correo, contrasenia) VALUES(NULL, :nombre, :apellido, :correo, :password)";
            $consulta = $conexionBD->prepare($sql);
            $consulta->bindParam(':nombre', $nombre);
            $consulta->bindParam(':apellido', $apellido);
            $consulta->bindParam(':correo', $correo);
            $consulta->bindParam(':password', $password);
            $consulta->execute();

        header('Location:../views/form_login.php');

    } else {
        echo "Llena todo";
    }
}



?>