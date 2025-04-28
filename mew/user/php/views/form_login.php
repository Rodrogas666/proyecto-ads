<?php
//session_start();
?>


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
    <div class="form-box">
        <div class="container">
            <h1>Welcome back</h1>
            <p>Welcome back, Please enter your details</p>
            <br>
            <form action="../session/login.php" method="post">
                <p><b>Email</b></p>
                <input type="email" name="correo" id="input" placeholder="   Enter your email" required>
                <br>
                <br>
                <p><b>Password</b></p>
                <input type="password" name="password" id="input" placeholder="  Enter your password">
                <br>
                <br>
                
                <input type="submit" value="Sign in" id="boton1">
                <br>
            </form>

        </div>
        <img src="../../src/img/pngtree-cute-corgi-running-mobile-wallpaper-image_752288.jpg" alt="" id="aña">
    </div>



<?php
include('../templates/footer.php');

?>
</body>

</html>