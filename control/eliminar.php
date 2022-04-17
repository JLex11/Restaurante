<?php
    include("../conexion/conexion.php");

    $tabla = $_POST['tabla'];
    $id = $_POST['id'];
    $estado = 'f';
    
    
    switch ($tabla) {
        case 1:
            $resultado = mysqli_query($cnn, "UPDATE pedido SET estado = '$estado' WHERE id_pedido = '$id';"); 
            $completo = mysqli_affected_rows($cnn);
            if ($completo == 0) {
                $msj = "Error, no se elimino";
                $msj = json_encode($msj);
                echo $msj;
            } else {
                $msj = "Eliminacion exitosa";
                $msj = json_encode($msj);
                echo $msj;
            }
        break;

        case 2:
            $resultado = mysqli_query($cnn, "UPDATE cliente SET estado = '$estado' WHERE id_cliente = '$id';");
            $completo = mysqli_affected_rows($cnn);
            if ($completo == 0) {
                $msj = "Error, no se elimino";
                $msj = json_encode($msj);
                echo $msj;
            } else {
                $msj = "Eliminacion exitosa";
                $msj = json_encode($msj);
                echo $msj;
            }
        break;

        case 3:
            $resultado = mysqli_query($cnn, "UPDATE producto SET estado = '$estado' WHERE id_producto = '$id';");
            $completo = mysqli_affected_rows($cnn);
            if ($completo == 0) {
                $msj = "Error, no se elimino";
                $msj = json_encode($msj);
                echo $msj;
            } else {
                $msj = "Eliminacion exitosa";
                $msj = json_encode($msj);
                echo $msj;
            }
        break;
    }

?>