<?php
include "../conexion/conexion.php";

    $proceso = $_POST['proceso'];
    $id_producto = $_POST['id'];

    switch ($proceso) {
        case 1:
            
            $sql = mysqli_query($cnn, "SELECT id_producto, nombre, cantidad_disponible, precio, foto, descripcion, ingredientes FROM producto WHERE estado = 't' AND id_producto = '$id_producto';");
            while ($consulta = mysqli_fetch_array($sql)) {
                echo '
                    <img class="producto" src="'. $consulta['foto'] .'" alt="Producto">
                    <div class="proInfo">
                        <img class="exit_icon" src="../img/x-lg.svg" alt="CerrarVentana" onclick="cerrarVentana();">
                        <h1>'. $consulta['nombre'] .'</h1>
                        <ul>
                ';
                $array = explode(",", $consulta['ingredientes']);
                foreach($array as $ingrediente) {
                    echo '<li>'. trim($ingrediente) .'</li>';
                }
                $proceso++;
                echo '
                        </ul>
                        <input type="button" value="Ordenar" class="btn_ordenar" onclick="ordenar('. $proceso .','. $id_producto .');">
                    </div>
                ';
            }

        break;

        case 2:
            $sql = mysqli_query($cnn, "SELECT id_producto, nombre, cantidad_disponible, precio, foto, descripcion, ingredientes FROM producto WHERE estado = 't' AND id_producto = '$id_producto';");
            while ($consulta = mysqli_fetch_array($sql)) {
                echo '
                    <img class="producto" src="'. $consulta['foto'] .'" alt="Producto">  
                ';
            }

            echo '
                <div class="proInfo proForm">
                    <img class="exit_icon" src="../img/x-lg.svg" alt="CerrarVentana" onclick="cerrarVentana();">
                    <h1 class="formT">Ingresa tus datos</h1>
                    <input type="text" class="inputFormOrdenar" placeholder="Nombre" id="nombre"></input>
                    <input type="number" class="inputFormOrdenar" placeholder="Numero de contacto" id="contacto"></input>
                    <input type="text" class="inputFormOrdenar" placeholder="Direccion" id="direccion"></input>
                    <p>Cantidad a ordenar</p>
                    <input type="number" class="inputFormOrdenar" placeholder="Cantidad" id="cantidad"></input>

            ';
            $proceso++;
            $sql = mysqli_query($cnn, "SELECT id_producto, nombre, cantidad_disponible, precio, foto, descripcion, ingredientes FROM producto WHERE estado = 't' AND id_producto = '$id_producto';");
            while ($consulta = mysqli_fetch_array($sql)) {
                
                echo '
                    <input readonly type="text" class="inputFormOrdenar" value="'. $consulta['nombre'] .'  $'. $consulta['precio'] .'"></input>
                    <input type="button" value="Ordenar" class="btn_ordenar" onclick="ordenar('. $proceso .','. $id_producto .');"> 
                ';
            }
            
            echo '  
                </div>
            ';

        break;

        case 3:
            $nombre_cliente = $_POST['nombre_cliente'];
            $contacto_cliente = $_POST['contacto_cliente'];
            $direccion_cliente = $_POST['direccion_cliente'];
            $cantidad = $_POST['cantidad'];

            $sql = mysqli_query($cnn, "SELECT precio FROM producto WHERE id_producto = '$id_producto';");
            while ($consulta = mysqli_fetch_array($sql)) {
                $precio = $_POST['precio'];
            }
            $total = $cantidad * $precio;

            $sql = mysqli_query($cnn, "INSERT INTO cliente (nombre, contacto, direccion, estado) VALUES ('$nombre_cliente','$contacto_cliente','$direccion_cliente','t');");

            $sql = mysqli_query($cnn, "SELECT id_cliente FROM cliente ORDER BY id_cliente DESC LIMIT 1;");
            while ($consulta = mysqli_fetch_array($sql)) {
                $id_cliente = $consulta['id_cliente'];
            }

            $sql = mysqli_query($cnn, "INSERT INTO pedido (id_pedido, id_producto, id_cliente, cantidad, estado, total) VALUES (NULL, '$id_producto', '$id_cliente', '$cantidad', 't', '$total');");
        break;
    }
    
?>