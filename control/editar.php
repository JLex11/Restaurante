<?php
    include("../conexion/conexion.php");
    $id_editar = $_POST['id_editar'];
    $tabla_select = $_POST['tablaselect'];
        

    switch ($tabla_select) {
        case 1:
            $resultado = mysqli_query($cnn, "SELECT pedido.id_pedido, producto.id_producto, cliente.id_cliente, producto.nombre AS producto, cliente.nombre AS cliente, pedido.cantidad FROM pedido INNER JOIN producto ON pedido.id_producto = producto.id_producto INNER JOIN cliente ON pedido.id_cliente = cliente.id_cliente WHERE pedido.estado = 't' AND pedido.id_pedido LIKE '$id_editar' ;");
            while ($consulta = mysqli_fetch_array($resultado)) {
                echo '
                <input type="hidden" id="input_tabla" value="'. $tabla_select .'">
                <input type="hidden" id="input_id" value="'. $consulta['id_pedido'] .'">
                <input readonly id="input_1" value="'. $consulta['producto'] .'">
                <input readonly id="input_2" value="'. $consulta['cliente'] .'">
                <input type="text" id="input_3" value="'. $consulta['cantidad'] .'">
                <div class="botones">
                    <input type="button" value="Aceptar" onclick="actualizar();" id="btn_aceptar" class="btn_aceptar">
                    <input type="button" value="Cancelar" onclick="des_ventana();" id="btn_cancelar" class="btn_cancelar">
                </div>
                ';
            }

        break;

        case 2:
            $resultado = mysqli_query($cnn, "SELECT id_cliente, nombre AS cliente, contacto, direccion FROM cliente WHERE estado = 't' AND id_cliente LIKE '$id_editar';");
            while ($consulta = mysqli_fetch_array($resultado)) {
                echo '
                <input type="hidden" id="input_tabla" value="'. $tabla_select .'">
                <input type="hidden" id="input_id" value="'. $consulta['id_cliente'] .'">
                <input readonly type="text" id="input_1" value="'. $consulta['cliente'] .'">
                <input type="text" id="input_2" value="'. $consulta['contacto'] .'">
                <input type="text" id="input_3" value="'. $consulta['direccion'] .'">
                <div class="botones">
                    <input type="button" value="Aceptar" onclick="actualizar();" id="btn_aceptar" class="btn_aceptar">
                    <input type="button" value="Cancelar" onclick="des_ventana();" id="btn_cancelar" class="btn_cancelar">
                </div>
                ';
            }
        break;

        case 3:
            $resultado = mysqli_query($cnn, "SELECT id_producto, nombre AS producto, cantidad_disponible, precio, descripcion, ingredientes FROM producto WHERE estado = 't' AND id_producto LIKE '$id_editar';");
            while ($consulta = mysqli_fetch_array($resultado)) {
                echo '
                <input type="hidden" id="input_tabla" value="'. $tabla_select .'">
                <input type="hidden" id="input_id" value="'. $consulta['id_producto'] .'">
                <input readonly type="text" id="input_1" value="'. $consulta['producto'] .'">
                <input type="text" id="input_2" value="'. $consulta['cantidad_disponible'] .'">
                <input type="text" id="input_3" value="'. $consulta['precio'] .'">
                <textarea id="descripcion">'. $consulta['descripcion'] .'</textarea>
                <textarea id="ingredientes">'. $consulta['ingredientes'] .'</textarea>
                <div class="botones">
                    <input type="button" value="Aceptar" onclick="actualizar();" id="btn_aceptar" class="btn_aceptar">
                    <input type="button" value="Cancelar" onclick="des_ventana();" id="btn_cancelar" class="btn_cancelar">
                </div>
                ';
            }
        break;
    }

?>