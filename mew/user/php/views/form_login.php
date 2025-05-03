<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login/Sign up</title>
    <link rel="stylesheet" href="../../css/styles_register_login.css">
    <script>
        function validarFormulario(event) {
            event.preventDefault(); // Evita el envío del formulario si hay errores

            const correo = document.querySelector('input[name="correo"]').value.trim();
            const password = document.querySelector('input[name="password"]').value.trim();

            if (!correo) {
                alert("El campo 'Email' es obligatorio.");
                return false;
            }

            if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(correo)) {
                alert("Por favor, introduce un correo electrónico válido.");
                return false;
            }

            if (!password) {
                alert("El campo 'Password' es obligatorio.");
                return false;
            }

            // Si todo está bien, envía el formulario
            document.querySelector('form').submit();
        }
    </script>
</head>

<body>
    <?php include('../templates/header.php'); ?>

    <div class="form-box">
        <div class="container">
            <h1>Welcome back</h1>
            <p>Welcome back, Please enter your details</p>
            <br>
            <form action="../session/login.php" method="post" onsubmit="return validarFormulario(event)">
                <p><b>Email</b></p>
                <input type="email" name="correo" id="input" placeholder="   Enter your email" required>
                <br><br>

                <p><b>Password</b></p>
                <input type="password" name="password" id="input" placeholder="  Enter your password" required>
                <br><br>

                <input type="submit" value="Sign in" id="boton1">
                <br>
            </form>
        </div>
        <img src="../../src/img/pngtree-cute-corgi-running-mobile-wallpaper-image_752288.jpg" alt="" id="aña">
    </div>

    <?php include('../templates/footer.php'); ?>
</body>

</html>