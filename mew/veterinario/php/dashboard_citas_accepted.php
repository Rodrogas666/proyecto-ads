<?php

include_once('../../user/php/templates/header.php');
include_once('mis_citas_vet.php');

?>
<link rel="stylesheet" href="../../user/css/styles_index.css">
<style>
    .titulo{
        font-weight: bold;
        padding-left: 2rem;
        padding-top: 2rem;
    }
    .contenedor_citas{
        display: grid;
        grid-template-columns: 1fr 1fr 1fr 1fr;
    }
    .citas{
        border: 1px solid black;
        padding: 1rem;
        margin: 1rem;
        border-radius: 10px;
    }
    .main{
        margin: 2rem;
    }

    .btn-finalizar{
        border-radius: 5px;
        border: none;
        width: 5.8rem;
        height: 37px;
        color: white;
        cursor: pointer;
        transition: 0.5s;
        background-color: #EE1E09;
        transition: 0.5s;
    }

    .btn-finalizar:hover{
        background-color: #ffffff;
        border: solid 2px #EE1E09;
        color: #EE1E09;
    }

    a{
        text-decoration: none;
        color: white;
    }

    a:hover{
        text-decoration: none;
        color: #EE1E09;
    }
</style>
<div class="main">
    <div>
        <h1 class="titulo">Mis citas aceptadas</h1>
    </div>
    <br>
    <br>
    <div class="contenedor_citas">
    <?php foreach ($vetCitas as $cita) { ?>
        <div class="citas">
            <p> <span style="font-weight:bold;">Estado:</span> <?php echo $cita['estado'] ?></p>
            <p> <span style="font-weight:bold;">Asunto:</span> <?php echo $cita['asunto'] ?></p>
            <p> <span style="font-weight:bold;">Fecha:</span> <?php echo $cita['fecha'] ?></p>
            <p> <span style="font-weight:bold;">Mascota:</span> <?php echo $cita['nombre'] ?></p>
            <br>
            <br>
            <button class="btn-finalizar"><a href="logic_finalizarCita.php?id=<?=$cita['id_cita']?>"> Finalizar cita</a></button>
        </div>
            
    <?php } ?>
    </div>
</div>
<?php

include_once('../../user/php/templates/footer.php');

?>