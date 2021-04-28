<?php
session_start();
session_destroy();
/*Tengo que poner ssesion_start asi tomo la variable$_SESSION
y la destruyo*/
header("location: ../form-login.html");
