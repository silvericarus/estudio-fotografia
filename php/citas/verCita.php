<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Citas | Estudio Fotográfico</title>
	<link rel="icon" href="../../img/logo.png" type="image/png" sizes="513x414">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="../../css/main.css">
	<script type="text/javascript" src="../../js/confirmarBorrado.js"></script>
</head>
<body>
	<nav>
		<?php 
			include '../conectarServidor.php';
			menu("citas");
		?>
	</nav>
	<div class="content">
		<?php 

			$conector = conectarServer();


			/**
			 * Se trae todos los datos de las citas
			 * en la fecha seleccionada para así mostrarlos
			 * ya si en detalle. En caso de que se proporcione el parámetro
			 * de cual cliente quiere obtenerse el listado de las citas, se filtra
			 * por fecha y por ese cliente, en caso contrario, se filtra sólo por
			 * fecha.
			 */
			if(!isset($_GET["c"])){
				$consulta = "SELECT ci.id,ci.fecha,ci.hora,ci.motivo,ci.lugar,c.nombre,c.telefono1 from citas ci,clientes c where ci.id_cliente = c.id and ci.fecha = '$_GET[fecha]' order by ci.hora asc;";
			}else{
				$consulta = "SELECT ci.id,ci.fecha,ci.hora,ci.motivo,ci.lugar,c.nombre,c.telefono1 from citas ci,clientes c where ci.id_cliente = c.id and ci.fecha = '$_GET[fecha]' and ci.id = $_GET[c];";
			}
			

			$datos = mysqli_query($conector,$consulta);

			$resultado = mysqli_fetch_array($datos,MYSQLI_ASSOC);

			$fechacita = explode("-",$resultado["fecha"]);

			$timestampcita = mktime($resultado["hora"],0,0,$fechacita[1],$fechacita[2],$fechacita[0]);

			$timestampactual = time();
			while (!is_null($resultado)) {
				$resultado["fecha"] = convertirFecha($resultado["fecha"],true);
				if ($timestampcita > $timestampactual) {

				echo "<div>";
				echo "<h2>$resultado[motivo]</h2>";
				echo "<p>En <b>$resultado[lugar]</b> el <b>$resultado[fecha]</b> a las <b>$resultado[hora]</b> horas, el cliente con el que te citas es <b>$resultado[nombre]</b>, su telefono de contacto es <b>$resultado[telefono1]</b></p>
					<form action='editarCita.php' method='get'>
						<input type='hidden' name='c' value='$resultado[id]'>
						<input type='submit' name='editarCita' value='Editar'>
					</form>
					<input type='button' name='borrarCita' value='Borrar' onClick=\"confirmDelete('citas','borrarCita.php?c=$resultado[id]')\">
					</div>";
					$resultado = mysqli_fetch_array($datos,MYSQLI_ASSOC);
				}else{
					echo "<div>";
					echo "<h2>$resultado[motivo]</h2>";
					echo "<p>En <b>$resultado[lugar]</b> el <b>$resultado[fecha]</b> a las <b>$resultado[hora]</b> horas, el cliente con el que te citas es <b>$resultado[nombre]</b>, su telefono de contacto es <b>$resultado[telefono1]<br></b><i>Cita pasada</i></p>
						<form action='editarCita.php' method='get'>
						<input type='hidden' name='c' value='$resultado[id]'>
							<input type='submit' name='editarCita' value='Editar' disabled>
						</form>
						<input type='button' name='borrarCita' value='Borrar' onClick=\"confirmDelete('citas','borrarCita.php?c=$resultado[id]')\" disabled>
						</div>";
						$resultado = mysqli_fetch_array($datos,MYSQLI_ASSOC);
				}
			}
			mysqli_close($conector);
			
		?>
	</div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>