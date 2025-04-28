<?php

include_once('../../user/php/templates/header.php');
include_once('_data_mascotas.php');
include('./.logic_agregaRegistroMedico.php');

?>
<link rel="stylesheet" href="../../user/css/styles_index.css">
<style>
    .bg-black {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0, 0, 0, 0.20);
    }

    .popup-content {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: white;
        padding: 1rem;
        display: flex;
        flex-direction: column;
        gap: 2rem;
        min-width: 300px;
    }

    .popup-text {
        outline: none;
        border: 1px solid gray;
        border-radius: 8px;
        padding: 0.3rem;
    }

    .popup-header {
        display: flex;
        justify-content: space-between;
    }

    .popup-quit {
        cursor: pointer;
    }


    .titulo {
        font-weight: bold;
    }

    .contenedor_citas {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr 1fr;
    }

    .hidden {
        display: none;
    }

    .citas {
        border: 1px solid black;
        padding: 1rem;
        margin: 1rem;
        border-radius: 10px;
    }

    .main {
        margin: 2rem;
    }

    .btn-medico {
        margin-top: 1rem;
        border-radius: 5px;
        border: none;
        width: 7rem;
        height: 40px;
        color: white;
        cursor: pointer;
        transition: 0.5s;
        background-color: #97D8FF;
        font-size: 1rem
    }

    .btn-medico:hover {
        background-color: #ffffff;
        border: solid 2px #97D8FF;
        color: #97D8FF;
        font-size: 1rem
    }

    .btns {
        display: flex;
        gap: 2rem;
        display: flex;
        justify-content: center;
    }

    a{
        text-decoration: none;
        background-color: none;
    }

    .space-p{
        gap: 1rem;
    }

</style>
<div class="main">
    <div>
        <h1 class="titulo">Registro de médicos</h1>
    </div>
    <br>
    <div>
        <p>¡Observe los registros medicos de cada mascota!</p>
    </div>
    <br>
    <br>
    <div class="contenedor_citas">
        <?php foreach ($todasLasMascotas as $mascota) { ?>
            <div class="citas">
                <p class="space-p"> <span style="font-weight:600;">Nombre:</span> <?php echo $mascota['nombre'] ?></p>
                <p class="space-p"> <span style="font-weight:600;">Especie:</span> <?php echo $mascota['especie'] ?></p>
                <p class="space-p"> <span style="font-weight:600;">Raza:</span> <?php echo $mascota['raza'] ?></p>
                <p class="space-p"> <span style="font-weight:600;">Edad:</span> <?php echo $mascota['edad'] ?></p>
                <p class="space-p"> <span style="font-weight:600;">Género:</span> <?php echo $mascota['genero'] ?></p>
                <br>
                <br>
                <div class="btns">
                    <button onclick="showPopup(<?= $mascota['id'] ?>)" class="btn-medico">Generar reporte</button>
                    <button class="btn-medico"><a class="btn-medico" href="view_mascotaHistorial.php?id=<?=$mascota['id']?>">Ver historial médico</a></button>
                </div>
            </div>

        <?php } ?>
    </div>
</div>

<div class="hidden bg-black"></div>
<div class="hidden" id="popup">
    <form class="popup-content" method='post'>
        <div class="popup-header">
            <span></span>
            <p class="popup-quit" onclick="quitPopup()">X</p>
        </div>
        <label for="">Exámenes</label>
        <input required class="popup-text" name="examenes" type="text" placeholder="Examenes: -Examen1 -Examen2 -Examen3">

        <label for="">Resultados</label>
        <input required class="popup-text" name="resultados" type="text" placeholder="Resultados: -Resultado1 -Resultado2 -Resultado3">

        <label for="">Enfermedades</label>
        <input required class="popup-text" name="enfermedades" type="text" placeholder="Enfermedades: -Enfermedade1 -Enfermedade2 -Enfermedade3">

        <label for="">Medicamentos</label>
        <input required class="popup-text" name="medicamentos" type="text" placeholder="Medicamentos: -Medicamento1 -Medicamento2 -Medicamento3">
         
        <input hidden type="text" name="id_mascota" id="idMascota">
         <input type="submit" value="Crear reporte medico">
    </form>

</div>

<script>
    function showPopup(id) {
        const popup = document.querySelector("#popup")
        const blackScreen = document.querySelector(".bg-black")


        const inputMascota = document.querySelector("#idMascota")
        inputMascota.value = id + "";
        
        popup.classList.remove("hidden");
        blackScreen.classList.remove("hidden");
    }

    function quitPopup() {
        const popup = document.querySelector("#popup")
        const blackScreen = document.querySelector(".bg-black")

        popup.classList.add("hidden");
        blackScreen.classList.add("hidden");
    }
</script>

<?php

include_once('../../user/php/templates/footer.php');

?>