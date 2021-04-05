<?php

session_start();

if ($_SESSION['logueado']) {

    include_once '../includes/db.php';
    /* en ese archivo estan las funciones */
    $con = openCon('../config/db_products.ini');
    $con->set_charset("utf8mb4");
    $id_upd = $_GET['q'];
    // echo $id_upd;
    $sql = "SELECT  
    s.id_sneakers AS id, 
    s.model AS model , 
    s.price AS price, 
    s.observacion AS obs, 
    b.description AS marca, 
    b.id_brand AS id_marca, 
    c.description AS color, 
    c.id_color AS id_color
FROM sneakers s 
        INNER JOIN brand b ON s.id_brand =b.id_brand 
        INNER JOIN color c ON s.id_color=c.id_color 
WHERE id_sneakers=" . $id_upd;
    $result = $con->query($sql);
    $row = $result->fetch_assoc();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Actualizar-products</title>
    <link href="https://fonts.googleapis.com/css?family=Lato|Raleway&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/form.css">

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center">ACTUALIZAR DE PRODUCTOS</h3>
            </div>
            <div class="col-md-12">
                <form class="form-group" accept=-"charset utf8" action="update_product.php" method="post">

                    <div class="from-group">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <!-- ojo la linea anterior es para mandar el id directamente al la pagina update y no verlo en otro lado -->
                        <div class="form-group">
                            <label class="control-label">Moelo</label>
                            <input type="text" class="form-control" id="modelo" name="modelo" value="<?php echo  $row['model']; ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">precio</label>
                            <input type="text" class="form-control" id="precio" name="precio" value="<?php echo "$" . $row['price'] . "-"; ?>">
                        </div>
                        <div class="from-group">
                            <label class="control-label">Observacion</label>
                            <textarea rows="3" class="form-control" name="observacion" id="observacion">
                            <?php echo $row['obs']; ?>
                        </textarea>
                        </div>

                        <div class="from-group">
                            <label class="control-label">Marca</label>
                            <select name="marca" id="marca" class="form-control">

                                <option value="<?php echo $row['id_marca']; ?>"> <?php echo $row['marca'] ?>
                                </option>
                                <?php

                                $sqlbrand = "SELECT  id_brand AS id, description AS descriptions FROM brand order by description";
                                $result = $con->query($sqlbrand);
                                while ($rowBrand = $result->fetch_assoc()) {
                                    if ($row['marca'] != $rowBrand['descriptions']) {

                                        ?>
                                        <option value="<?php echo $rowBrand['id']; ?>"> <?php echo $rowBrand['descriptions'] ?>
                                        </option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <!--  *************************************  -->
                        <div classs="from-group">
                            <label class="control-label">Color</label>
                            <select name="color" id="color" class="form-control">
                                <option value="<?php echo $row['id_color']; ?>"> <?php echo $row['color'] ?>
                                </option>
                                <?php

                                $sqlcolor = "SELECT  id_color AS id, description AS descriptions FROM color order by description";
                                $result = $con->query($sqlcolor);
                                while ($rowColor = $result->fetch_assoc()) {
                                    if ($row['color'] != $rowColor['descriptions']) {

                                        ?>
                                        <option value="<?php echo $rowColor['id']; ?>"> <?php echo $rowColor['descriptions'] ?>
                                        </option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="text-center">
                            <br>
                            <input type="submit" class="btn btn-success" value="guardar producto">

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</html>