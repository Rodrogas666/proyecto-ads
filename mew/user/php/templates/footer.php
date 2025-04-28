<!DOCTYPE html>
<html lang="en">
<body>
    <footer>
        <div class="papu-m">
            <div class="mid-f">
                <div class="info-p">
                    <?php if (isset($_SESSION['usuario'])) { ?>
                        <img src="../../user/src/img/logo-white.png" alt="" id="img-h">
                    <?php  } 
                    if (isset($_SESSION['veterinario'])) { ?>
                        <img src="../../user/src/img/logo-white.png" alt="" id="img-h">
                    <?php } ?>
                    <P id="space">Somos una clínica veterinaria con más de 11 años de experiencia, contamos con una amplia gama de profesionales en el área médica, siéntete tranquilo en confiarnos a tu familia. Estaremos más que encantados de poder ayudarte con nuestros diferentes servicios.
                    </P>
                </div>
                <div class="info-p">
                    <h2>Referencias</h2>
                    <p>Años de experiencia: 11</p>
                    <p>Personal de calidad</p>
                    <p>Dedicación y esmero</p>
                    <p>Amor a la profesión</p>
                </div>
                <div class="info-p">
                    <h2>Áreas de trabajo</h2>
                    <p>Exámenes</p>
                    <p>Cirugías</p>
                    <p>Vacunación</p>
                    <p>Rescate de mascotas</p>
                </div>
                <div class="info-p">
                    <h2>Información de contacto</h2>
                    <p>2257-2353</p>
                    <p>Altavista</p>
                    <p>San Martín</p>
                </div>
            </div>
        </div>
    </footer>
    <style>
        .papu-m{
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: white;
    height: 23rem;
    width: 100%;
    background-color: black;
    color: white;
}

.mid-f{
    display: flex;
    flex-direction: row;
    gap: 17rem;
}

.info-p{
    display: flex;
    flex-direction: column;
    width: 10rem;
    gap: 1rem;
}
    </style>
<script type="text/javascript">
    function noRegresar() {
      window.history.forward()
    };
    setTimeout("noRegresar()", 0);
    window.onunload = function() {
      null
    };
  </script>
</body>
</html>