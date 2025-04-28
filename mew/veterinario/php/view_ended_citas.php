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
            </div>
        <?php } ?>
    </div>
</div>


<?php

include_once('../../user/php/templates/footer.php');

?>