<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/styles_index.css">
    <title>Veterinaria</title>
</head>

<?php
    session_start();

    if(!isset($_SESSION['usuario']) && !isset($_SESSION['veterinario']) && !in_array(basename($_SERVER['PHP_SELF']), array('home.php', 'about_us.php', 'form_register.php', 'form_login.php'))){
        header("Location: ../views/form_login.php");
        exit();
    }

?>


<body>

<header>
    <nav>
        <div class="hader">
            
            <?php

            if (isset($_SESSION['usuario'])) { ?>
                <div class="logo">
                    <img src="../../src/img/Mew.png" alt="" id="img-h">
                </div>
                <div class="info-h">
                <a href="../views/home.php">Inicio</a>
                <a href="../views/about_us.php">Sobre nosotros</a>
                <a href="../views/vista_citas_usuario.php">Citas</a>
                <a href="../views/mascota_vista.php">Mascotas</a>
                </div>
                <div class="boton-h">   
                <a href="../session/cerrar_sesion.php">Cerrar sesión</a>
                </div>
            <?php }
            else if (isset($_SESSION['veterinario'])) { ?>
                <div class="logo">
                    <img src="../../user/src/img/Mew.png" alt="" id="img-h">
                </div>
                <div class="info-h">
                <a href="../../veterinario/php/dashboard.php">Citas pendientes</a>
                <a href="../../veterinario/php/dashboard_citas_accepted.php">Citas aceptadas</a>
                <a href="../../veterinario/php/view_ended_citas.php">Citas finalizadas</a>
                <a href="../../veterinario/php/view_mascotas.php">Registro médico</a>    
            </div>
                <div class="boton-h">
                <a href="../../user/php/session/cerrar_sesion.php">Cerrar sesión</a>
                </div>
            <?php } 
            else if (!isset($_SESSION['usuario']) || !isset($_SESSION['veterinario'])) {  ?>
                <div class="logo">
                    <img src="../../src/img/Mew.png" alt="" id="img-h">
                </div>
                <div class="info-h">
                <a href="../views/home.php">Inicio</a>
                <a href="../views/about_us.php">Sobre nosotros</a>
                </div>
                <div class="boton-h">
                <a href="../views/form_login.php">Iniciar sesión</a>
                <div class="boton-h2">
                <a href="../views/form_register.php">Registrarse</a>
                </div>
                </div>
            <?php } ?>

            
            
        </div>
    </nav>
    <style>
        .hader{
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
    height: 6rem;
    background-color: #FFEFDE80;
}

.hader a{
    gap: 2rem;
}

.logo{
    display: flex;
    justify-content: start;
}

header a{
    text-decoration: none;
}


.info-h{
    display: flex;
    flex-direction: row;
    gap: 6rem;
    color: green;
    text-decoration: none;
    justify-content: space-around;
    margin-left: 10rem;
}

.info-h a{
    color: black;
    text-decoration: none;
    text-align: center;
}


.boton-h{
    display: flex;
    align-items: end;
    justify-content: end;
    flex-direction: row;
    gap: 2rem;
    padding-left: 25rem;
}

.boton-h2 a{
    background-color: #009F97!important; 
    color: white;
}

.boton-h2 a:hover{
    background-color: white!important;
    border-color: black;
    color: black;
}

.boton-h a{
    border-radius: 5px;
    border: none;
    width: 9rem;
    height: 40px;
    color: white;
    cursor: pointer;
    transition: 0.5s;
    background-color: #F76313;
    display: flex;
    align-items: center;
    justify-content: center;
}

.boton-h a:hover{
    background-color: #ffffff;
    color: #F76313 ;
    border: solid 2px #F76313;
}


#img-h{
    height: 25px;
    width: 80px;
}
    </style>
</header>