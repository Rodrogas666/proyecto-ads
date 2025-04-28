
<?php
include('../templates/header.php');
include('../citas.php');

?>
    <link rel="stylesheet" href="../../css/styles_citas.css">
    <div class="padre-citas">
        <div class="agregar-cita">
            <div class="text1">
                <h1>Mis citas</h1>
                <p>En este apartado podrás encontrar las citas que has generado, en caso de que quieras verlas, puedes hacerlo cuando quieras.</p>
            </div>
            <div class="boton-citas">
                
                
                <details>
                    <summary>
                        <div class="button">  
                        Agregar cita
                      </div>
                      <div class="details-modal-overlay"></div>
                    </summary>
                    <div class="details-modal">
                      <div class="details-modal-close">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                          <path fill-rule="evenodd" clip-rule="evenodd" d="M13.7071 1.70711C14.0976 1.31658 14.0976 0.683417 13.7071 0.292893C13.3166 -0.0976311 12.6834 -0.0976311 12.2929 0.292893L7 5.58579L1.70711 0.292893C1.31658 -0.0976311 0.683417 -0.0976311 0.292893 0.292893C-0.0976311 0.683417 -0.0976311 1.31658 0.292893 1.70711L5.58579 7L0.292893 12.2929C-0.0976311 12.6834 -0.0976311 13.3166 0.292893 13.7071C0.683417 14.0976 1.31658 14.0976 1.70711 13.7071L7 8.41421L12.2929 13.7071C12.6834 14.0976 13.3166 14.0976 13.7071 13.7071C14.0976 13.3166 14.0976 12.6834 13.7071 12.2929L8.41421 7L13.7071 1.70711Z" fill="black" />
                        </svg>
                      </div>
                      <div class="details-modal-title">
                        <h1>Agrega una cita</h1>
                      </div>
                      <div class="details-modal-content">
                        <form action="vista_citas_usuario.php" method="post" class="form-popup">
                            <label for="">Fecha</label>
                            <input required type="datetime-local" name="fecha" id="fecha">
                            <label for="">Asunto</label>
                            <input required type="text" name="asunto" id="asunto">
                            <label for="">Mascota</label>
                            <select required name="mascota" id="mascotas-p" class="mascotas-p-c">
                            <?php foreach ($clientemascotas as $mascota) { ?>
                              <option value="<?php echo $mascota['id_mascota']; ?>">
                                <?php echo $mascota['nombre']; ?> 
                              </option>
                            <?php } ?>
                            </select>
                            <button id="btn-p" type="submit" name="accion" value="agregar">Enviar</button>
                        </form>
                      </div>
                    </div>
                  </details>
            </div>
        </div>
        <div class="tabla">
            
                <h4 class="p1-table">Estatus</h4>
                <h4 class="p2-table">Asunto</h4>
                <h4 class="p3-table">Fecha y tiempo</h4>
                <h4 class="p4-table">Mascota</h4>
            
            <?php foreach ($clienteCitas as $cita) { ?>
                <p class="p1-table"><?php echo $cita['estado'] ?></p>
                <p class="p2-table"><?php echo $cita['asunto'] ?></p>
                <p class="p3-table"><?php echo $cita['fecha'] ?></p>
                <p class="p4-table"><?php echo $cita['nombre'] ?></p>        
            <?php } ?>
        </div>
    </div>
<?php
include('../templates/footer.php');

?>    
</body>

</html>