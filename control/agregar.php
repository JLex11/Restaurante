<?php
	include "../conexion/conexion.php";
	$proceso = $_POST['proceso'];
	$tabla_select = 0;
	$campo_1 = 0;
	$campo_2 = 0;
	$campo_3 = 0;
	$campo_foto = "";

	switch ($proceso) {
		case 1:
			echo '
				<p>Elige una tabla</p>
				<select id="input_tabla">
						<option value="1">Pedidos</option>
						<option value="2">Clientes</option>
						<option value="3">Productos</option>
				</select>
			';
			$proceso ++;
			echo '
				<div class="botones">
						<input type="button" value="Aceptar" onclick="agregar('. $proceso .');" id="btn_aceptar" class="btn_aceptar">
						<input type="button" value="Cancelar" onclick="des_ventana();" id="btn_cancelar" class="btn_cancelar">
				</div>
			';
		break;

		case 2:
			$tabla_select = $_POST['tabla_select'];
			echo '<form method="post" action="../control/insertar.php" enctype="multipart/form-data" id="form">';

			if ($tabla_select == 1) {
					$place_holder_input3 = "Cantidad";
					echo '
							<input type="hidden" readonly name="tabla_select" id="input_tabla" value="'. $tabla_select .'">
							<select id="input_1" name="campo1">
					';

					$sql = mysqli_query($cnn, "SELECT id_producto, nombre AS producto FROM producto WHERE estado = 't';");
					while ($consulta = mysqli_fetch_array($sql)) {
							echo '
								<option value="'. $consulta['id_producto'] .'">'. $consulta['producto'] .'</option>
							';
					}
	
					echo '
							</select>
							<select id="input_2" name="campo2">
					';

					$sql = mysqli_query($cnn, "SELECT id_cliente, nombre AS cliente FROM cliente WHERE estado = 't';");
					while ($consulta = mysqli_fetch_array($sql)) {
							echo '
									<option value="'. $consulta['id_cliente'] .'">'. $consulta['cliente'] .'</option>
							';
					}

					echo '
							</select>
							<input type="number" id="input_3" name="campo3" placeholder="'. $place_holder_input3 .'" maxlength="5" max="">     
					';
							
					
			} else {

				if ($tabla_select == 2) {
						$place_holder_input1 = "Nombre del cliente";
						$place_holder_input2 = "Contacto";
						$place_holder_input3 = "Direccion";
				}
				if ($tabla_select == 3) {
					$place_holder_input1 = "Nombre del producto";
					$place_holder_input2 = "Cantidad disponible";
					$place_holder_input3 = "Precio";
				}

				echo '
						<input type="hidden"  readonly id="input_tabla" name="tabla_select" value="'. $tabla_select .'">
						<input type="text" id="input_1" name="campo1" placeholder="'. $place_holder_input1 .'">
						<input type="number" id="input_2" name="campo2" placeholder="'. $place_holder_input2 .'">
						<input type="text" id="input_3" name="campo3" placeholder="'. $place_holder_input3 .'">

				';

				if ($tabla_select == 3) {
					echo '
						<input type="file" name="foto" accept="image/*" class="inputfile" id="foto">
						<textarea name="ingredientes" placeholder="Ingresa los ingredientes separados por ," id="ingredientes"></textarea>
						<textarea name="descripcion" placeholder="Ingresa una descripcion del producto" id="descripcion"></textarea>
					';
				}
			}

			$proceso++;

			echo '    
				<div class="botones">
						<input type="button" value="Agregar"  onclick="agregar('. $proceso .');" id="btn_aceptar" class="btn_aceptar">
						<input type="button" value="Cancelar" onclick="des_ventana();" id="btn_cancelar" class="btn_cancelar">
				</div>
				</form>
			';
		break;

	}

?>