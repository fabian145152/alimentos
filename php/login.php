<?php
include_once '../includes/db.php';
$con = openCon('../config/db_products.ini');
/* si cambio en nombre del archivo.ini me conacto a cualquier DB qu tenga armada*/
$usr = $_POST['username'];
$pass = md5($_POST['password']);
/*md5 queda encriptado la contraseña*/
$con->set_charset("utf-8");/*$con es un metodo*/
$sql = "select * from users where (username='$usr' or email='$usr') and (password='$pass')";
$result = $con->query($sql);
$row = $result->fetch_assoc();
if ($row == 0) {
    echo "<h1> Ingreso invalido </h1>";
} else {
    session_start();
    $_SESSION['uname'] = $usr;
    $_SESSION['logueado'] = true;
    $_SESSION['time'] = date('H i s');
    header("location:welcome.php");
}
