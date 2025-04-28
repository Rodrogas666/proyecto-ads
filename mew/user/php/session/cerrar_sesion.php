<?php

session_start();
session_destroy();

header('Location:../views/form_login.php');


?>