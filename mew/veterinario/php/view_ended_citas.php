<?php

include_once('../../user/php/templates/header.php');
include_once('./_data_endedCitas.php');

?>
<link rel="stylesheet" href="../../user/css/styles_index.css">
<style>
    .titulo {
        font-weight: bold;
    }

    .contenedor_citas {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr 1fr;
    }

    .citas {
        border: 1px solid black;
        padding: 1rem;
        margin: 1rem;
        border-radius: 10px;
        display: flex;
        flex-direction: column;
        gap: 2rem;
    }

    .main {
        margin: 2rem;
    }

    .btn-eliminar {
        background-color: #ff4d4d; /* Rojo */
        color: white;
        border: none;
        padding: 0.5rem 1rem;
        border-radius: 5px;
        cursor: pointer;
        text-align: center;
        text-decoration: none;
        font-weight: bold;
    }

    .btn-eliminar a {
        color: white;
        text-decoration: none;
    }

    .btn-eliminar:hover {
        background-color: #e60000; /* Rojo más oscuro */
    }
</style>

<div>
    <div>
        <h1 class="titulo">Citas finalizadas</h1>
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
                <button class="btn-eliminar">
                    <a href="logic_eliminarCita.php?id=<?php echo $cita['id_cita']; ?>" onclick="return confirm('¿Estás seguro de que deseas eliminar esta cita?');">
                        Eliminar
                    </a>
                </button>
            </div>
        <?php } ?>
    </div>
</div>


<?php

include_once('../../user/php/templates/footer.php');

?>