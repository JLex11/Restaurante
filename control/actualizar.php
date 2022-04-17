<?php
    include("../conexion/conexion.php");

    $tabla = $_POST['tabla'];
    $id = $_POST['id'];
    $campo1 = $_POST['campo_1'];
    $campo2 = $_POST['campo_2'];
    $campo3 = $_POST['campo_3'];

    switch ($tabla) {
        case 1:
            $resultado = mysqli_query($cnn, "UPDATE pedido SET cantidad = '$campo3' WHERE id_pedido LIKE '$id';"); 
            $completo = mysqli_affected_rows($cnn);
            if ($completo == 0) {
                $msj = "Error, no se actualizo";
                $msj = json_encode($msj);
                echo $msj;
            } else {
                $msj = "Actualizacion exitosa";
                $msj = json_encode($msj);
                echo $msj;
            }
        break;

        case 2:
            $resultado = mysqli_query($cnn, "UPDATE cliente SET contacto = '$campo2', direccion = '$campo3' WHERE id_cliente LIKE '$id';");
            $completo = mysqli_affected_rows($cnn);
            if ($completo == 0) {
                $msj = "Error, no se actualizo";
                $msj = json_encode($msj);
                echo $msj;
            } else {
                $msj = "Actualizacion exitosa";
                $msj = json_encode($msj);
                echo $msj;
            }
        break;

        case 3:
            $descripcion = $_POST['descripcion'];
            $ingredientes = $_POST['ingredientes'];
            $resultado = mysqli_query($cnn, "UPDATE producto SET cantidad_disponible = '$campo2', precio = '$campo3', descripcion = '$descripcion', ingredientes = '$ingredientes' WHERE id_producto LIKE '$id';");
            $completo = mysqli_affected_rows($cnn);
            if ($completo == 0) {
                $msj = "Error, no se actualizo";
                $msj = json_encode($msj);
                echo $msj;
            } else {
                $msj = "Actualizacion exitosa";
                $msj = json_encode($msj);
                echo $msj;
            }
        break;
    }

?>