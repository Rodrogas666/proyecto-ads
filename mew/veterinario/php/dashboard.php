<?php

include_once('../../user/php/templates/header.php');
include_once('recibir_citas.php');



?>
<link rel="stylesheet" href="../../user/css/styles_vista_veterinario_aceptar.css">
 <div class="cositas-veterinario">
      <div class="name-doc">
        <h1>Welcome Dr. <?php echo $veterinario[0]['nombre'] ?></h1>
      </div>
      <div class="apoimens-v">
        <h1>Citas pendientes: <?php print_r($allCitas['COUNT(*)']) ?></h1>
        <!-- <h2>28</h2> -->
      </div>
    </div>
      <section class="attendance">
        <div class="attendance-list">
          <h1>Lista de citas</h1>
          <form action="dashboard.php" method="post">
            <table class="table">
              <thead>
                <tr>
                  <th>Status</th>
                  <th>Asunto</th>
                  <th>Fecha/tiempo</th>
                  <th>Mascota</th>
                  <th>Details</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($clienteCitas as $cita) { ?>
            <tr>
              <td><?php echo $cita['estado'] ?></td>
              <td><?php echo $cita['asunto'] ?></td>
              <td><?php echo $cita['fecha'] ?></td>
              <td><?php echo $cita['nombre'] ?></td>
              <td><button type="submit" name="accion" value="agregar">Aceptar cita</button></td>
              <input type="hidden" name="id" value="<?php echo $cita['id_cita'] ?>">
            </tr>
            <?php } ?>
            </tbody>
          </table>
          </form>
        </div>
      </section>


<?php

include_once('../../user/php/templates/footer.php');

?>