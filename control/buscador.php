<?php
    include("../conexion/conexion.php");
    $dato_buscar = $_POST['busqueda'];

    if (strlen($dato_buscar) > 0) {
        echo '
            <div class="tabs">
                <div id="buscando">
                    <div id="load"></div>
                </div>
                <div class="scroll">
                    <div class="content_pedidos" id="content_pedidos">
        ';
        $resultado = mysqli_query($cnn, "SELECT pedido.id_pedido AS id_pedido, producto.nombre AS producto, cliente.nombre as cliente, pedido.cantidad, pedido.total FROM pedido INNER JOIN producto ON pedido.id_producto = producto.id_producto INNER JOIN cliente ON pedido.id_cliente = cliente.id_cliente WHERE pedido.estado = 't' AND producto.nombre LIKE '%$dato_buscar%' OR cliente.nombre LIKE '%$dato_buscar%';");
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
                            
                            <div class="table_item i6" onclick="editar('. $consulta['id_pedido'] . ',' . $tablaselect . ');" id="btn_actualizar"><img id="icono_1" src="../img/editar.svg"/></div>
                            <div class="table_item i7" onclick="eliminar('. $consulta['id_pedido'] . ',' . $tablaselect . ');" id="btn_eliminar"><img id="icono_2" src="../img/eliminar.svg"/></div>
                ';
            }
        }

        $resultado = mysqli_query($cnn, "SELECT id_cliente, nombre AS cliente, contacto, direccion FROM cliente WHERE estado = 't' AND nombre LIKE '%$dato_buscar%' OR contacto LIKE '%$dato_buscar%'  OR direccion LIKE '%$dato_buscar%';");
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
                            
                            <div class="table_item i6"  onclick="editar('. $consulta['id_cliente'] . ',' . $tablaselect . ');" id="btn_actualizar"><img id="icono_1" src="../img/editar.svg"/></div>
                            <div class="table_item i7" onclick="eliminar('. $consulta['id_cliente'] . ',' . $tablaselect . ');" id="btn_eliminar"><img id="icono_2" src="../img/eliminar.svg"/></div>
                ';
            }
        }

        $resultado = mysqli_query($cnn, "SELECT id_producto, nombre AS producto, cantidad_disponible, precio, descripcion, ingredientes FROM producto WHERE estado = 't' AND nombre LIKE '%$dato_buscar%';");
        $rows = mysqli_num_rows($resultado);
        if ($rows == 0) {
            
        } else {
            echo 
            '
                            <div class="sub_title"><p>Productos</p></div>
                            <div class="table_header i1">Nombre del producto</div>
                            <div class="table_header i2">Cantidad disponible</div>
                            <div class="table_header i3">Precio</div>
                            <div class="table_header i4">Descripcion</div>
                            <div class="table_header i5">Ingredientes</div>
                            <div class="table_header i6"></div>
                            <div class="table_header i7"></div>
            ';

            $tablaselect = 3;
            while($consulta = mysqli_fetch_array($resultado)) {
            echo '
                        <div class="table_item i1">' . $consulta['producto'] . '</div>
                        <div class="table_item i2">' . $consulta['cantidad_disponible'] . '</div>
                        <div class="table_item i3">' . $consulta['precio'] . '</div>
                        <div class="table_item i4">' . $consulta['descripcion'] . '</div>
                        <div class="table_item i5">' . $consulta['ingredientes'] . '</div>

                        <div class="table_item i6" onclick="editar(' . $consulta['id_producto'] . ',' . $tablaselect . ');" id="btn_actualizar"><img id="icono_1" src="../img/editar.svg"/></div>
                        <div class="table_item i7" onclick="eliminar(' . $consulta['id_producto'] . ',' . $tablaselect . ');" id="btn_eliminar"><img id="icono_2" src="../img/eliminar.svg"/></div>
            ';
            }
        }

        echo 
        '
                    </div>
                </div>
            </div>
        ';
    }

?>