<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login/Sing up</title>
    <link rel="stylesheet" href="../../css/styles_register_login.css">

</head>

<body>
<?php
include('../templates/header.php');

?>
    <div class="for-box">
        <div class="cuadrotexto">
            <h1>Welcome</h1>
            <p>Welcome, Please enter your details</p>
            <br>
            <form action="../session/register.php" method="post">
            <p><b>Name</b></p>
            <input type="text" id="input" placeholder="   Enter your name" required name="nombre">
            <br>
            <br>
            <p><b>Last name</b></p>
            <input type="text" id="input" placeholder="   Enter your last names" required name="apellido">
            <br>
            <br>
            <p><b>Email</b></p>
            <input type="email" name="correo" id="input" placeholder="   Enter your email" required>
            <br>
            <br>
            <p><b>Password</b></p>
            <input type="password" name="password" id="input" placeholder="  Enter your password" >
            <br>
            <br>
            <input type="submit" value="Sign in" id="boton1">
            <br>
            
</form>
            
        </div>
        <img src="../../src/img/pez.png" alt="" id="img">
    </div>



<?php
include('../templates/footer.php');

?>
</body>

</html>