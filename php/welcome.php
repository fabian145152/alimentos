<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="../css/menu.css">


</head>

<body>

</body>

</html>

<?php
session_start();
if ($_SESSION['logueado']) {

    echo "BIENVENIDO ,"  . $_SESSION['uname'] . '<br>';

    echo "Hora de conección :" . $_SESSION['time'] . '<br>';
    
    ?>
    <br>
    <h1 class='text-center'>Opciones de menú</h1>
    <br>
    <div id="container">
        <a class="btn-action" href='insert_products.php'><i class="fas fa-plus-circle fa-2x"></i>Agregar Producto</a>
        <a class="btn-action" href='list_products.php'><i class="fas fa-minus-circle fa-2x"></i>Elimina Productos</a>
        <a class="btn-action" href='list_products.php'><i class="fas fa-edit fa-2x"></i>Editar Productos</a>
        <br>
        <!-- fas una clase fa-edit un icono de la libreria fa-2x otra libreria tamaño  -->
        <a href='logout.php'>Logout</a>
    </div>
<?php
    /*El text-center sale de una clase de Bootstrap*/
} else {
    header("location:../form-login.html");
}
