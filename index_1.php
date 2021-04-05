<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/1_main.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/arrow.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,100&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <div class="noticia">
            <img class="izquierda" src="images/logo.jpg" alt="logo myf" height=170>
            <aside>
                <p id="myf">MyF</p>
                <p id="texto-abajo">Productos de calidad</p>
            </aside>
            <div class="reset"></div>
        </div>
    </header>
    <nav id="nav_1">
        <ul>
            <li> <a href="index.html">Inicio</a></li>
            <li> <a href="html/nosotros.html">Nosotros</a></li>
            <li> <a href="index_1.php">Productos</a></li>
            <li><a href="html/recetas.html">Recetas</a></li>
            <li><a href="html/contacto.html">Contacto</a></li>
            <li><a href="html/pedidos.html">Pedidos</a></li>
        </ul>
    </nav>
    <section id="main">
        <a href="form-login.html">Acceso</a>

        <ul class="galery">
            <?php
            //compio la coneccion a la base de otra pagina y le corrijo los link
            require_once("includes/db.php");

            // include_once dirname( __DIR__ ) . 'includes/db.php';
            // include_once __DIR__ . 'includes/db.php';
            // require_once("includes/db.php");

            $con = openCon('config/db_products.ini');
            $con->set_charset("utf8mb4");

            $sql = "SELECT s.model as model, 
                           s.price as price, 
                           s.images as image, 
                           s.observacion, 
                           c.description as color, 
                           b.description as brand, 
                           s.free_sheeping as envio,
                           date_format (s.fecha_alta, '%d-%m-%Y') as fecha_alta 
            FROM sneakers s 
            INNER JOIN brand b ON s.id_brand =b.id_brand 
            INNER JOIN color c ON s.id_color=c.id_color 
            ORDER BY s.fecha_alta";

            $result = $con->query($sql);

            while ($row = $result->fetch_assoc()) {
            ?>
                <li>
                    <div class="box">
                        <figure>
                            <img src="<?php echo substr($row['image'], 3) ?>">
                            <figcaption>
                                <h3><?php echo $row['brand'] . '<br>' . ' ' . $row['model']  . '<br>' /*.  $row['color']*/  ?></h3>

                                <h3><?php if ($row['Envio Gratis'] = 'envio') {
                                        echo $row['envio'];
                                    } ?></h3>


                            </figcaption>
                            <p><?php echo "$" . $row['price'] . '-' ?> </p>
                            <time><?php echo $row['fecha_alta'] ?></time>

                            <!-- con el substr (     ,3)  le saco ..// de adelante de la ruta cuando cargo la imagen  -->
                        </figure>
                    </div>
                </li>
            <?php
            }
            ?>
        </ul>


    </section>
    <footer>
        <nav id="social-nav">
            <ul>
                <li>
                    <a href="http://facebook.com"><img src="images/face.png" alt="Link a Facebook"></a>
                </li>
                <li>
                    <a href="http://instagram.com"><img src="images/instag.png" alt="Link a Instagram"></a>
                </li>
                <li>
                    <a href="http://twitter.com"><img src="images/twit.png" alt="Link a Twitter"></a>
                </li>
            </ul>
        </nav>
        <p>MyF | Todos los derechos reservados &copy;2021</p>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <div class="arrow">
        <a href="#" id="toTop">
            <img src="images/backToTop.png" alt="flecha">
            <img class="top" src="images/backToTop.png" alt="flecha">
        </a>
    </div>

    <script src="js/main.js"></script>

</body>

</html>