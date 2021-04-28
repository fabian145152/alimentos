<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>insert-products</title>
    <link href="https://fonts.googleapis.com/css?family=Lato|Raleway&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <link rel="stylesheet" href="../css/form.css">
</head>

<body>

    <div class="container">
    
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center">INGRESO DE PRODUCTOS</h3>
            </div>
            
            <div class="col-md-12">
                <form class="form-group" accept=-"charset utf8" action="save_products.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <br>
                        <label class="control-label" for="Modelo">Modelo</label>
                        <input type="text" class="form-control" placeholder="Modelo" required="" name="modelo" id="modelo">
                    </div>
                    <div class="form-group">
                        <br>
                        <label class="control-label" for="Precio">Precio</label>
                        <input type="text" class="form-control" placeholder="Precio" name="precio" id="precio" required="">
                    </div>
                    <div class="form-group">
                        <br>
                        <label class="control-label">Observaciones</label>
                        <textarea class="form-control" row="3" placeholder="Observación" name="observacion" id="observacion"></textarea>
                    </div>
                    <div calss="form-group">
                        <label class="control-label">Marcas del Producto</label>
                        <select class="form-control" id="marca" name="marca">
                            <!--    <option value="nike">Nike</option> 
                                    Las marcas va a ser cargadas desde una tabla -->
                            <?php
                            include_once '../includes/db.php';
                            $con = openCon('../config/db_products.ini');
                            $con->set_charset("utf8mb4");
                            // Siempre tine que estar parue si no las codificaciones son distintas y se pueden perder Byts
                            //o sea que con esto hago que el idioma entre mi prog y la DB sea el mismo
                            $sql = "SELECT id_brand, description FROM brand ORDER BY description;";
                            $result = $con->query($sql);
                            while ($row = $result->fetch_assoc()) {
                                //fetch_assosc() cuenta los resutados hasta que no hay mas
                                //echo "<option>" . $row ['description'] . "</option>";
                                echo '<option value=" '  . $row['id_brand']  . '">' . $row['description'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div calss="form-group">
                        <label class="control-label">Colores del Producto</label>
                        <select class="form-control" id="color" name="color">
                            <!--    <option value="nike">Nike</option> 
                                    Las marcas va a ser cargadas desde una tabla -->
                            <?php

                            include_once '../includes/db.php';
                            $con = openCon('../config/db_products.ini');
                            $con->set_charset("utf8mb4");
                            // Siempre tine que estar parue si no las codificaciones son distintas y se pueden perder Byts
                            //o sea que con esto hago que el idioma entre mi prog y la DB sea el mismo
                            $sql = "SELECT id_color, description FROM color ORDER BY description;";
                            $result = $con->query($sql);
                            while ($row = $result->fetch_assoc()) {
                                //fetch_assosc() cuenta los resutados hasta que no hay mas
                                //echo "<option>" . $row ['description'] . "</option>";
                                echo '<option value=" '  . $row['id_color']  . '">' . $row['description'] . "</option>";
                            }

                            ?>
                        </select>
                    </div>
                    <div calss="form-group">
                        <label class="control-label">Seleccione la imagen a subir</label>
                        <input type="file" id="imagen" name="imagen" class="form-control" size="30">
                    </div>
                            <br>
                    <div class="text-center">
                        <input type="submit" class="btn btn-success" value="añadir producto">
                        <br>
                        <a class="btn btn-succes" href="welcome.php" target="_blank">Salir</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <script src="..js/jquery-3.4.1.min.js"> </script>
    <script src="../js/bootstrap.min.js"> </script>
</body>

</html>