<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="../img/burger.png" />
    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Css -->
    <link rel="stylesheet" href="../css/estilos.css" />
    <!-- Titulo -->
    <title>Restaurante | La plazuela de las salchichas</title>
</head>

<body class="hide">
    <div class="loader loading" id="load">
        <img src="../img/burger.png" alt="logo">
        <div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>
    </div>
    <!-- Ventana Modal -->
    <div class="vModalVer" id="vModalVer">
        <div class="vModalContent" id="vModalContent">
                
        </div>
    </div>

    <!-- !Header-nav -->
    <header id="inicio">
        <nav class="content-nav">
            <div class="name-logo">
                <span class="title-logo">La Plazuela de las salchichas</span>
            </div>

            <div class="nav-opcion">
                <div>
                    <p class="option" id="btn_home">Inicio</p>
                    <a href="#recomendados">
                        <p class="option">Recomendados</p>
                    </a>
                    <a href="#mas-vendido">
                        <p class="option">Mas comprado</p>
                    </a>
                    <a href="#mas">
                        <p class="option">Mas</p>
                    </a>
                </div>

                <div>
                    <img src="../img/ingresar.svg" alt="iniciar sesion" onclick="ir(login);" />
                    <a href="#footer"><img src="../img/about.svg" alt="acerca de" /></a>
                </div>
            </div>
        </nav>
    </header>

    <!-- Main-section -->
    <main #contenido>
        <!-- !Section 1 -->
        <section class="bienvenida">
            <div class="img-left">
                <img src="../img/Floating-burger-PNG.png" alt="" class="imgBienvenida1"/>
            </div>
            <div class="mensaje-bienvenida">
                <h1>Bienvenido</h1>
                <p>
                    En nuestro restaurante ofrecemos el mejor servicio, y
                    aun mas si estas registrado
                </p>
                <div class="botones">
                    <a href="../vista/login.php"><button class="btn-login">Iniciar sesion</button></a>
                    <button class="btn-register" onclick="ir(register);">Registrate</button>
                </div>
            </div>
            <div class="img-right">
                <img src="../img/hod-dog.png" alt="" class="imgBienvenida2"/>
            </div>
        </section>

        <!-- !Section 2 -->
        <section class="recomendados" id="recomendados">
            <div class="secion1">
                <p>
                    Porque queremos que tengas un buen dia.<br />Te traemos
                    estas 3 comidas recomendadas, 3 platos elegidos y
                    recomendados por la experiencia propia de nuestros
                    clientes.
                </p>
            </div>

            <div class="secion2">
                <div class="item" id="it1">
                    <div class="image">
                        
                    <?php include "../conexion/conexion.php";
                        $sql = mysqli_query($cnn, "SELECT producto.id_producto, producto.nombre, SUM(pedido.cantidad) AS mas_vendido FROM pedido INNER JOIN producto ON pedido.id_producto = producto.id_producto INNER JOIN cliente ON pedido.id_cliente = cliente.id_cliente WHERE producto.estado = 't' GROUP BY producto.nombre ORDER BY mas_vendido DESC LIMIT 1,1;");
                        while ($consulta = mysqli_fetch_array($sql)) {
                                $id_aux = $consulta['id_producto'];
                        }
                        $rows = mysqli_num_rows($sql);
                        if($rows == "") {
                            $sql = mysqli_query($cnn, "SELECT id_producto, nombre, cantidad_disponible, precio, foto, descripcion, ingredientes FROM producto WHERE estado = 't' ORDER BY nombre DESC LIMIT 1;");
                            while ($consulta = mysqli_fetch_array($sql)) {
                                $id_producto = $consulta["id_producto"];
                                $nombre = $consulta["nombre"];
                                $cantidad_disponible = $consulta["cantidad_disponible"];
                                $precio = $consulta["precio"];
                                $foto = $consulta["foto"];
                                $descripcion = $consulta["descripcion"];
                                $ingredientes = $consulta["ingredientes"];
                            }
                        } else {

                            $sql = mysqli_query($cnn, "SELECT id_producto, nombre, cantidad_disponible, precio, foto, descripcion, ingredientes FROM producto WHERE estado = 't' AND id_producto = '$id_aux';");
                            while ($consulta = mysqli_fetch_array($sql)) {
                                $id_producto = $consulta["id_producto"];
                                $nombre = $consulta["nombre"];
                                $cantidad_disponible = $consulta["cantidad_disponible"];
                                $precio = $consulta["precio"];
                                $foto = $consulta["foto"];
                                $descripcion = $consulta["descripcion"];
                                $ingredientes = $consulta["ingredientes"];
                            }
                        }
                        
                    ?>

                        <img src="<?php echo $foto; ?>" alt="producto" />
                        <div class="info">
                            <p class="title"><?php echo $nombre; ?></p>
                            <p class="descripcion">
                                <?php echo $descripcion; ?>
                                <p>$<?php echo $precio; ?></p>
                            </p>
                        </div>
                    </div>
                    <div class="btn-ver-order">
                        <button class="btn_ver" onclick="ordenar(1, <?php echo $id_producto; ?>);">Ver</button>
                        <button class="btn_ordenar" onclick="ordenar(2, <?php echo $id_producto; ?>);">Ordenar</button>
                    </div>
                </div>

                <div class="item" id="it2">
                    <div class="image">

                        <?php include "../conexion/conexion.php";
                            $sql = mysqli_query($cnn, "SELECT producto.id_producto, producto.nombre, SUM(pedido.cantidad) AS mas_vendido FROM pedido INNER JOIN producto ON pedido.id_producto = producto.id_producto INNER JOIN cliente ON pedido.id_cliente = cliente.id_cliente WHERE producto.estado = 't' GROUP BY producto.nombre ORDER BY mas_vendido DESC LIMIT 2,2;");
                            while ($consulta = mysqli_fetch_array($sql)) {
                                $id_aux = $consulta['id_producto'];
                            }
                            
                            $rows = mysqli_num_rows($sql);
                            if($rows == "") {
                                $sql = mysqli_query($cnn, "SELECT id_producto, nombre, cantidad_disponible, precio, foto, descripcion, ingredientes FROM producto WHERE estado = 't' ORDER BY nombre DESC LIMIT 1,1;");
                                while ($consulta = mysqli_fetch_array($sql)) {
                                    $id_producto = $consulta["id_producto"];
                                    $nombre = $consulta["nombre"];
                                    $cantidad_disponible = $consulta["cantidad_disponible"];
                                    $precio = $consulta["precio"];
                                    $foto = $consulta["foto"];
                                    $descripcion = $consulta["descripcion"];
                                    $ingredientes = $consulta["ingredientes"];
                                }
                            } else {
                                $sql = mysqli_query($cnn, "SELECT id_producto, nombre, cantidad_disponible, precio, foto, descripcion, ingredientes FROM producto WHERE estado = 't' AND id_producto = '$id_aux';");
                                while ($consulta = mysqli_fetch_array($sql)) {
                                    $id_producto = $consulta["id_producto"];
                                    $nombre = $consulta["nombre"];
                                    $cantidad_disponible = $consulta["cantidad_disponible"];
                                    $precio = $consulta["precio"];
                                    $foto = $consulta["foto"];
                                    $descripcion = $consulta["descripcion"];
                                    $ingredientes = $consulta["ingredientes"];
                                }
                            }
                           
                        ?>

                        <img src="<?php echo $foto ?>" alt="Salchipapas" />
                        <div class="info">
                            <p class="title"><?php echo $nombre ?></p>
                            <p class="descripcion">
                                <?php echo $descripcion ?>
                                <p>$<?php echo $precio; ?></p>
                            </p>
                        </div>
                    </div>

                    <div class="btn-ver-order">
                        <button class="btn_ver" onclick="ordenar(1, <?php echo $id_producto; ?>);">Ver</button>
                        <button class="btn_ordenar" onclick="ordenar(2, <?php echo $id_producto; ?>);">Ordenar</button>
                    </div>
                </div>

                <div class="item" id="it3">
                    <div class="image">

                        <?php include "../conexion/conexion.php";
                            $sql = mysqli_query($cnn, "SELECT producto.id_producto, producto.nombre, SUM(pedido.cantidad) AS mas_vendido FROM pedido INNER JOIN producto ON pedido.id_producto = producto.id_producto INNER JOIN cliente ON pedido.id_cliente = cliente.id_cliente WHERE producto.estado = 't' GROUP BY producto.nombre ORDER BY mas_vendido DESC LIMIT 3,3;");
                            while ($consulta = mysqli_fetch_array($sql)) {
                                $id_aux = $consulta['id_producto'];
                            }
                            $rows = mysqli_num_rows($sql);
                            if($rows == "") {
                                $sql = mysqli_query($cnn, "SELECT id_producto, nombre, cantidad_disponible, precio, foto, descripcion, ingredientes FROM producto WHERE estado = 't' ORDER BY nombre DESC LIMIT 2,2;");
                                while ($consulta = mysqli_fetch_array($sql)) {
                                    $id_producto = $consulta["id_producto"];
                                    $nombre = $consulta["nombre"];
                                    $cantidad_disponible = $consulta["cantidad_disponible"];
                                    $precio = $consulta["precio"];
                                    $foto = $consulta["foto"];
                                    $descripcion = $consulta["descripcion"];
                                    $ingredientes = $consulta["ingredientes"];
                                }
                            } else {
                                
                                $sql = mysqli_query($cnn, "SELECT id_producto, nombre, cantidad_disponible, precio, foto, descripcion, ingredientes FROM producto WHERE estado = 't' AND id_producto = '$id_aux';");
                                while ($consulta = mysqli_fetch_array($sql)) {
                                    $id_producto = $consulta["id_producto"];
                                    $nombre = $consulta["nombre"];
                                    $cantidad_disponible = $consulta["cantidad_disponible"];
                                    $precio = $consulta["precio"];
                                    $foto = $consulta["foto"];
                                    $descripcion = $consulta["descripcion"];
                                    $ingredientes = $consulta["ingredientes"];
                                }
                            }

                            
                        ?>

                        <img src="<?php echo $foto; ?>" alt="Burger" />
                        <div class="info">
                            <p class="title"><?php echo $nombre; ?></p>
                            <p class="descripcion">
                                <?php echo $descripcion; ?>
                                <p>$<?php echo $precio; ?></p>
                            </p>
                        </div>
                    </div>

                    <div class="btn-ver-order">
                        <button class="btn_ver" onclick="ordenar(1, <?php echo $id_producto; ?>);">Ver</button>
                        <button class="btn_ordenar" onclick="ordenar(2, <?php echo $id_producto; ?>);">Ordenar</button>
                    </div>
                </div>
            </div>
        </section>

        <!-- !Section 3 -->
        <section class="mas-vendido" id="mas-vendido">
            <div class="mas-vendido-wrapper">
                <div class="card" id="it4">

                    <?php include "../conexion/conexion.php";
                        $sql = mysqli_query($cnn, "SELECT producto.id_producto, producto.nombre, SUM(pedido.cantidad) AS mas_vendido FROM pedido INNER JOIN producto ON pedido.id_producto = producto.id_producto INNER JOIN cliente ON pedido.id_cliente = cliente.id_cliente WHERE producto.estado = 't' GROUP BY producto.nombre ORDER BY mas_vendido DESC LIMIT 1;");
                        while ($consulta = mysqli_fetch_array($sql)) {
                                $id_aux = $consulta['id_producto'];
                        }
                        
                        $rows = mysqli_num_rows($sql);
                        if($rows == "") {
                            $sql = mysqli_query($cnn, "SELECT producto.id_producto, producto.nombre, SUM(pedido.cantidad) AS mas_vendido FROM pedido INNER JOIN producto ON pedido.id_producto = producto.id_producto INNER JOIN cliente ON pedido.id_cliente = cliente.id_cliente GROUP BY producto.nombre ORDER BY mas_vendido DESC LIMIT 1;");
                            while ($consulta = mysqli_fetch_array($sql)) {
                                $id_producto = $consulta["id_producto"];
                                $nombre = $consulta["nombre"];
                                $cantidad_disponible = $consulta["cantidad_disponible"];
                                $precio = $consulta["precio"];
                                $foto = $consulta["foto"];
                                $descripcion = $consulta["descripcion"];
                                $ingredientes = $consulta["ingredientes"];
                            }
                        } else {
                            
                            $sql = mysqli_query($cnn, "SELECT id_producto, nombre, cantidad_disponible, precio, foto, descripcion, ingredientes FROM producto WHERE estado = 't' AND id_producto = '$id_aux';");
                            while ($consulta = mysqli_fetch_array($sql)) {
                                $id_producto = $consulta["id_producto"];
                                $nombre = $consulta["nombre"];
                                $cantidad_disponible = $consulta["cantidad_disponible"];
                                $precio = $consulta["precio"];
                                $foto = $consulta["foto"];
                                $descripcion = $consulta["descripcion"];
                                $ingredientes = $consulta["ingredientes"];
                            }
                        }

                        
                    ?>
  
                    <img src="<?php echo $foto; ?>" alt="">
                    <div class="description">
                        <h1><?php echo $nombre; ?></h1>
                        <p><?php echo $descripcion; ?></p>
                        <p>$<?php echo $precio; ?></p>

                        <?php if ($rows == "") { ?>
                        <input class="btn_ord" type="button" value="Agotado">
                        <?php } else { ?>
                        <input class="btn_ord" type="button" value="Ordenar" onclick="ordenar(2, <?php echo $id_producto; ?>);">
                        <?php } ?>

                    </div>

                </div>
            </div>
        </section>

        <!-- Mas -->
        <section class="mas">
            <h1 id="mas">Estos son otros de nuestros productos.</h1>
            <div class="contenedor_mas" >

                <!-- Items -->
                <?php include "../conexion/conexion.php";

                    $sql = mysqli_query($cnn, "SELECT id_producto, nombre, cantidad_disponible, precio, foto, descripcion, ingredientes FROM producto WHERE estado = 't';");
                    while ($consulta = mysqli_fetch_array($sql)) {
                        ?>
                            <div class="itm">
                                <img src="<?php echo $consulta["foto"]; ?>" alt="">
                                <div class="inf">
                                    <p><?php echo $consulta["nombre"]; ?></p>
                                    <p>$<?php echo $consulta["precio"]; ?></p>
                                    <div class="btns">
                                        <input type="button" class="ver" value="ver" onclick="ordenar(1, <?php echo $consulta["id_producto"]; ?>);">
                                        <input type="button" class="ordenar" value="ordenar" onclick="ordenar(2, <?php echo $consulta["id_producto"]; ?>);">
                                    </div>
                                </div>  
                            </div>
                        <?php
                    }
                ?>

            </div>
        </section>
    </main>

    <!-- !Footer -->
    <footer id="footer">
        <div class="creditos">
            <p>Diseñador grafico y programador | John Alexander Calle</p>
        </div>
        <div class="contacto">
            <p>Contactame : </p>
            <div class="whatsapp">
                <img src="../img/whatsapp.svg" alt="whatsapp">
                <p>+57 313 749 74 63</p>
            </div>
        </div>
    </footer>
</body>
<script type="text/javascript" src="../js/index.js"></script>
</html>