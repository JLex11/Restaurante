<?php
    include "../conexion/conexion.php";

    echo '
            <div class="tabs">
                    <h1>Registros eliminados</h1>
                <div class="scroll">
                    <div class="content_pedidos" id="content_pedidos">
        ';
        $resultado = mysqli_query($cnn, "SELECT pedido.id_pedido AS id_pedido, producto.nombre AS producto, cliente.nombre as cliente, pedido.cantidad, pedido.total FROM pedido INNER JOIN producto ON pedido.id_producto = producto.id_producto INNER JOIN cliente ON pedido.id_cliente = cliente.id_cliente WHERE pedido.estado = 'f'");
        $rows = mysqli_num_rows($resultado);
        if ($rows == 0) {
           
        } else {
            echo 
            '
                            <div class="sub_title"><p>Pedidos</p></div>
                            <div class="table_header i1">Nombre del producto</div>
                            <div class="table_header i2">Cliente</div>
                            <div class="table_header i3">Cantidad</div>
                            <div class="table_header i4">Total</div>
                            <div class="table_header i5"></div>
                            <div class="table_header i6"></div>
                            <div class="table_header i7"></div>
            ';

            $tablaselect = 1;
            while($consulta = mysqli_fetch_array($resultado)) {
                echo '
                            <div class="table_item i1">'.$consulta['producto'].'</div>
                            <div class="table_item i2">'.$consulta['cliente'].'</div>
                            <div class="table_item i3">'.$consulta['cantidad'].'</div>
                            <div class="table_item i4">'. $consulta['total'] .'</div>
                            <div class="table_item i5"></div>
                            <div class="table_item i6"></div>
                            <div class="table_item i7" onclick="activar('. $consulta['id_pedido'] . ',' . $tablaselect . ');" id="btn_eliminar"><img id="icono_2" src="../img/añadir.svg"/></div>
                ';
            }
        }

        $resultado = mysqli_query($cnn, "SELECT id_cliente, nombre AS cliente, contacto, direccion FROM cliente WHERE estado = 'f';");
        $rows = mysqli_num_rows($resultado);
        if ($rows == 0) {
            
        } else {
            echo 
            '
                            <div class="sub_title"><p>Clientes</p></div>
                            <div class="table_header i1">Nombre del cliente</div>
                            <div class="table_header i2">Contacto</div>
                            <div class="table_header i3">Direccion</div>
                            <div class="table_header i4"></div>
                            <div class="table_header i5"></div>
                            <div class="table_header i6"></div>
                            <div class="table_header i7"></div>
            ';
            $tablaselect = 2;
            while($consulta = mysqli_fetch_array($resultado)) {
                echo '
                            <div class="table_item i1">'.$consulta['cliente'].'</div>
                            <div class="table_item i2">'.$consulta['contacto'].'</div>
                            <div class="table_item i3">'.$consulta['direccion'].'</div>
                            <div class="table_item i4"></div>
                            <div class="table_item i5"></div>
                            <div class="table_item i6"></div>
                            <div class="table_item i7" onclick="activar('. $consulta['id_cliente'] . ',' . $tablaselect . ');" id="btn_eliminar"><img id="icono_2" src="../img/añadir.svg"/></div>
                ';
            }
        }

        $resultado = mysqli_query($cnn, "SELECT id_producto, nombre AS producto, cantidad_disponible, precio FROM producto WHERE estado = 'f';");
        $rows = mysqli_num_rows($resultado);
        if ($rows == 0) {
            
        } else {
            echo 
            '
                            <div class="sub_title"><p>Productos</p></div>
                            <div class="table_header i1">Nombre del producto</div>
                            <div class="table_header i2">Cantidad disponible</div>
                            <div class="table_header i3">Precio</div>
                            <div class="table_header i4"></div>
                            <div class="table_header i5"></div>
                            <div class="table_header i6"></div>
                            <div class="table_header i7"></div>
            ';

            $tablaselect = 3;
            while($consulta = mysqli_fetch_array($resultado)) {
            echo '
                        <div class="table_item i1">'.$consulta['producto'].'</div>
                        <div class="table_item i2">'.$consulta['cantidad_disponible'].'</div>
                        <div class="table_item i3">'.$consulta['precio'].'</div>
                        <div class="table_item i4"></div>
                        <div class="table_item i5"></div>
                        <div class="table_item i6"></div>
                        <div class="table_item i7" onclick="activar('. $consulta['id_producto'] . ',' . $tablaselect . ');" id="btn_eliminar"><img id="icono_2" src="../img/añadir.svg"/></div>
            ';
            }
        }

        echo 
        '
                    </div>
                </div>
            </div>
        ';

?>