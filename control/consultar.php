<?php
include "../conexion/conexion.php";

$accion = $_POST['accion'];
switch ($accion) {
    case 1:
        $tabla = 'Pedidos';
        break;

    case 2:
        $tabla = 'Clientes';
        break;

    case 3:
        $tabla = 'Productos';
        break;
}

echo
    '
        <div class="tabs">
            <h1>' . $tabla . '</h1>
            <div class="scroll">
                <div class="content_pedidos" id="content_pedidos">
    ';

switch ($accion) {
    case 1:
        $tablaselect = 1;
        echo
            '
                <div class="table_header">Nombre del producto</div>
                <div class="table_header">Cliente</div>
                <div class="table_header">Cantidad</div>
                <div class="table_header">Total</div>
                <div class="table_header"></div>
                <div class="table_header"></div>
                <div class="table_header"></div>
            ';

        //consultar
        $resultado = mysqli_query($cnn, "SELECT pedido.id_pedido, producto.nombre AS producto, cliente.nombre as cliente, pedido.cantidad, pedido.total FROM pedido INNER JOIN producto ON pedido.id_producto = producto.id_producto INNER JOIN cliente ON pedido.id_cliente = cliente.id_cliente WHERE pedido.estado = 't';");
        while ($consulta = mysqli_fetch_array($resultado)) {

            echo '
                    <div class="table_item">' . $consulta['producto'] . '</div>
                    <div class="table_item">' . $consulta['cliente'] . '</div>
                    <div class="table_item">' . $consulta['cantidad'] . '</div>
                    <div class="table_item">'. $consulta['total'] .'</div>
                    <div class="table_item"></div>

                    <div class="table_item"  onclick="editar(' . $consulta['id_pedido'] . ',' . $tablaselect . ');" id="btn_actualizar"><img id="icono_1" src="../img/editar.svg"/></div>
                    <div class="table_item" onclick="eliminar(' . $consulta['id_pedido'] . ',' . $tablaselect . ');" id="btn_eliminar"><img id="icono_2" src="../img/eliminar.svg"/></div>
                ';
        }
        break;

    case 2:
        $tablaselect = 2;
        echo
            '
                <div class="table_header">Nombre del cliente</div>
                <div class="table_header">Contacto</div>
                <div class="table_header">Direccion</div>
                <div class="table_header"></div>
                <div class="table_header"></div>
                <div class="table_header"></div>
                <div class="table_header"></div>
            ';

        //consultar
        $resultado = mysqli_query($cnn, "SELECT id_cliente, nombre AS cliente, contacto, direccion FROM cliente WHERE estado = 't';");
        while ($consulta = mysqli_fetch_array($resultado)) {

            echo '
                    <div class="table_item">' . $consulta['cliente'] . '</div>
                    <div class="table_item">' . $consulta['contacto'] . '</div>
                    <div class="table_item">' . $consulta['direccion'] . '</div>
                    <div class="table_item"></div>
                    <div class="table_item"></div>

                    <div class="table_item" onclick="editar(' . $consulta['id_cliente'] . ',' . $tablaselect . ');" id="btn_actualizar"><img id="icono_1" src="../img/editar.svg"/></div>
                    <div class="table_item" onclick="eliminar(' . $consulta['id_cliente'] . ',' . $tablaselect . ');" id="btn_eliminar"><img id="icono_2" src="../img/eliminar.svg"/></div>
                ';
        }
        break;

    case 3:
        $tablaselect = 3;
        echo
            '
                <div class="table_header">Nombre del producto</div>
                <div class="table_header">Cantidad disponible</div>
                <div class="table_header">Precio</div>
                <div class="table_header">Descripcion</div>
                <div class="table_header">Ingredientes</div>
                <div class="table_header"></div>
                <div class="table_header"></div>
            ';

        //consultar
        $resultado = mysqli_query($cnn, "SELECT id_producto, nombre AS producto, cantidad_disponible, precio, descripcion, ingredientes FROM producto WHERE estado = 't';");
        while ($consulta = mysqli_fetch_array($resultado)) {
            echo '
                    <div class="table_item">' . $consulta['producto'] . '</div>
                    <div class="table_item">' . $consulta['cantidad_disponible'] . '</div>
                    <div class="table_item">' . $consulta['precio'] . '</div>
                    <div class="table_item">' . $consulta['descripcion'] . '</div>
                    <div class="table_item">' . $consulta['ingredientes'] . '</div>

                    <div class="table_item" onclick="editar(' . $consulta['id_producto'] . ',' . $tablaselect . ');" id="btn_actualizar"><img id="icono_1" src="../img/editar.svg"/></div>
                    <div class="table_item" onclick="eliminar(' . $consulta['id_producto'] . ',' . $tablaselect . ');" id="btn_eliminar"><img id="icono_2" src="../img/eliminar.svg"/></div>
                ';
        }
        break;

}

echo
    '
                </div>
            </div>
        </div>
    ';
