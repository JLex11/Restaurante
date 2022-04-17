<?php
    include "../conexion/conexion.php";

    $tabla = $_POST["tabla_select"];
    $campo_1 = $_POST["campo1"];
    $campo_2 = $_POST["campo2"];
    $campo_3 = $_POST["campo3"];

    if ($tabla == 3) {
        $ruta = "../foto/productos/";
        $codigo = Date('His');
        /* variable que se debe insertar a db */
        $foto = $ruta . $codigo . basename($_FILES['foto']['name']);

        if (move_uploaded_file($_FILES['foto']['tmp_name'], $foto)) {
            $mensaje = "El archivo se ha guardado correctamente";
            echo $mensaje;
        } else {
            $mensaje = "Fallo al guardar el archivo";
            echo $mensaje;
        }

        $descripcion = $_POST["descripcion"];
        $ingredientes = $_POST["ingredientes"];
        
        $sql = mysqli_query($cnn, "INSERT INTO producto (id_producto, nombre, cantidad_disponible, precio, foto, estado, descripcion, ingredientes) VALUES (NULL, '$campo_1', '$campo_2', '$campo_3', '$foto', 't', '$descripcion', '$ingredientes');");
        

    } else  if ($tabla == 2) {
        $sql = mysqli_query($cnn, "INSERT INTO cliente (id_cliente, nombre, contacto, direccion, estado) VALUES (NULL, '$campo_1', '$campo_2', '$campo_3', 't');");
        

    } else if ($tabla == 1) {
        $sql = mysqli_query($cnn, "SELECT precio FROM producto WHERE id_producto = '$campo_1';");
        while ($consulta = mysqli_fetch_array($sql)) {
            $precio = $_POST['precio'];
        }
        $total = $campo_3 * $precio;

        $sql = mysqli_query($cnn, "INSERT INTO pedido (id_pedido, id_producto, id_cliente, cantidad, estado, total) VALUES (NULL, '$campo_1', '$campo_2', '$campo_3', 't', '$total');");
        
    }
?>