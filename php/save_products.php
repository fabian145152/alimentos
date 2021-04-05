<?php


//esto indica la ruta del archivo que subi, upload_image.php

session_start();
if ($_SESSION['logueado']) {

    include_once 'upload_image.php';

    $modelo = $_POST['modelo'];
    $precio = $_POST['precio'];
    $observacion = $_POST['observacion'];
    $marca = $_POST['marca'];
    $color = $_POST['color'];
    
    include_once '../includes/db.php';
    $con = openCon('../config/db_products.ini');
    $con->set_charset("utf8mb4");

    $sql = "INSERT INTO sneakers (model, price, id_color, id_brand, images, observacion) VALUES (?, ?, ?, ?, ?, ?)";

    $path_img = $directorio . $nombre_img;

    $stmt = $con->prepare($sql);
    $stmt->bind_param("sdiiss", $modelo, $precio, $color, $marca, $path_img, $observacion);

    if ($stmt->execute()) {
        ?>

        <script>
            alert("producto ingresado")
            window.location = "insert_products.php";
        </script>
<?php

    }
}
?>