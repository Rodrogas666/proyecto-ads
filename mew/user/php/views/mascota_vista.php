
<?php
include('../templates/header.php');
include('../mascotas.php');

?>
<link rel="stylesheet" href="../../css/style_mascosta_vista.css">
    <div class="Father">
        <br>
        <div class="titulo">
            <h2>Tus mascotas</h2>
            <b><a class="add_pet_a"href="form_add_mascota.php"><button class="add_pet">Agregar mascota</button></a></b>
        </div>
        <div class="sub1">
        <?php foreach($listaMascotas as $mascota){ ?>
            <div class="cards">
                <H3><?php echo $mascota['nombre']?></H3>
                <img src="../../src/img/Perrito.jpg" alt="" id="perro">
                <div class="texto">
                <p><b>Detalles</b></p>
                <p>Especie: <?php echo $mascota['especie']?></p>
                <p>Raza: <?php echo $mascota['raza']?></p>
                <p>Género: <?php echo $mascota['genero']?></p>
                </div>
                <br>
                <form action="mascota_vista.php" method="post">
                    <div class="botones">
                        <details>
                            <summary>
                            
                            <div class="button" id="divFetch">
                                Editar
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
                                <h1>Editar mascota</h1>
                            </div>
                            <div class="details-modal-content">
                            <!-- <form action="mascota_vista.php" method="post" class="form_popup"> -->
                                <input type="hidden" name="id_mascota" value="<?php echo $mascota['id'] ?>">
                                <input type="text" name="nombre" value="<?php echo $mascota['nombre']?>" placeholder="El nombre" class="campo">
                                <input type="number" name="edad" value="<?php echo $mascota['edad']?>" placeholder="La edad" class="campo">
                                <input type="text" name="especie" value="<?php echo $mascota['especie']?>" placeholder="La especie" class="campo">
                                <input type="text" name="raza" value="<?php echo $mascota['raza']?>" placeholder="La raza" class="campo">
                                <input type="text" name="genero" value="<?php echo $mascota['genero']?>" placeholder="El género" class="campo">
                                <button type="submit" class="button_edit" name="accion" value="editar" class="btn-enviar">Editar</button>
                            <!-- </form> -->
                            </div>
                            </div>
                        </details>
                            <!-- <button id="b1" type="submit" name="accion" value=""><b>Editar</b></button> -->
                        <form action="mascota_vista.php" method="post">
                            <button id="b2" type="submit" name="accion" value="eliminar"><b>Eliminar</b></button>
                        </form>
                        <button id="b3"><b><a class="historial_pet_a" href="../../../veterinario/php/view_mascotaHistorial.php?id=<?=$mascota['id']?>">Historial</a></b></button>
                        
                    </div> 
                </form>
            </div>
        <?php }?>
        </div>
    </div>
<?php
include('../templates/footer.php');

?>
</body>
</html>