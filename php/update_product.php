<?php

session_start();

if ($_SESSION['logueado']) {
    include_once '../includes/db.php';
    $con = openCon('../config/db_products.ini');
    $con->set_charset("utf8mb4");
     /*print_r($_POST); */

    /*La linea anterior sirve solo para ver */

   
    $modelo = $_POST['modelo'];
    $precio = $_POST['precio'];
    $observacion = $_POST['observacion'];
    $marca = $_POST['marca'];
    $color = $_POST['color'];

    $id = $_POST['id'];

    $sql = "UPDATE sneakers SET model = '$modelo', price = '$precio', id_color = '$color', observacion ='$observacion', id_brand = '$marca' WHERE id_sneakers =" . $id;
    $con->query($sql);
    header('Location:list_products.php');
}
?>