<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">


    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/bootbox.min.js"></script>
    <script>
        function deleteProduct(cod_zapatilla) {
            /*  Si no le pongo nada entre los parentesis() me borra todo o sea que 
            la funcion se ejecuta siempore igual. 
            Tengo que cambiarle los parametros de entrada para que la ejecute como yo quiero. 
            Si no tiene ningun paramtero generaliza, si lo tiene se ejecuta de forma particular*/
            bootbox.confirm("Desea Eliminar?" + cod_zapatilla, function(result) {
                /*  si la funcion no tiene nombre es una funcion anonima function() o function = nombre()  */
                if (result) {
                    window.location = "delete.php?q=" + cod_zapatilla;
                }
                /*  La ?q es como si fuera el metodo $_GET */
            });
        }

        /* ahora viene la funcion update*/
        function updateProduct(cod_zapatilla) {
            window.location = "edit.php?q=" + cod_zapatilla;
        }
    </script>
</head>

<body>
    <div id="acceso">

        <a href="welcome.php" target="_blank">Salir</a>
    </div>
    <h1 class="text-center" style="margin:20px 0px">Listado de productos</h1>
    <table class="table table-bordered table-striped table-hover">
        <!--  table centra todo y divide, table-bordered divide table-striped cebra  
    https://getbootstrap.com/docs/4.3/content/tables/ -->

        <thead class="thead-dark">
            <tr>
                <th>Id</th>
                <th>Modelo</th>
                <th>Precio</th>
                <th>Color</th>
                <th>Marca</th>
                <th>Actualizar</th>
                <th>Eliminar</th>
            </tr>
        </thead>

        <tbody>
            <?php

            session_start();
            if ($_SESSION['logueado']) {

                include_once '../includes/db.php';
                $con = openCon('../config/db_products.ini');
                $con->set_charset("utf8mb4");

                $sql = "SELECT s.id_sneakers as id, s.model as modelo, s.price as precio, c.description as color, b.description as marca 
                FROM sneakers s 
                INNER JOIN brand b ON s.id_brand =b.id_brand 
                INNER JOIN color c ON s.id_color=c.id_color";

                $result = $con->query($sql);
                while ($row = $result->fetch_assoc()) {

            ?>
                    <tr>
                        <td><?php echo $row['id'] ?> </td>
                        <td><?php echo $row['modelo'] ?> </td>
                        <td><?php echo $row['precio'] ?> </td>
                        <td><?php echo $row['color'] ?> </td>
                        <td><?php echo $row['marca'] ?> </td>
                        <td> <a class="btn btn-success" href="#" onclick="updateProduct(<?php echo $row['id']; ?>)">Actualizar producto</td>
                        <td> <a class="btn btn-danger" href="#" onclick="deleteProduct(<?php echo $row['id']; ?>)">Eliminar producto</td>
                    </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>
</body>

</html>