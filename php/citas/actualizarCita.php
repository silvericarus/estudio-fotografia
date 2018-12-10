<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Actualizando Cita | Estudio de Fotografía</title>
	<link rel="icon" href="../../img/logo.png" type="image/png" sizes="513x414">
	<link rel="stylesheet" href="../../css/main.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
</head>
<body>
	<nav>
		<?php 
			include '../conectarServidor.php';
			menu("citas");
		?>
	</nav>
	<?php 
		/**
		 * Se almacenan los datos recibidos desde el formulario,
		 * y el id que le pasamos por la url.
		 */
		if (isset($_POST["fecha"])) {
			$fecha = $_POST["fecha"];
			$hora = $_POST["hora"];
			$motivo = $_POST["motivo"];
			$lugar = $_POST["lugar"];
			$cliente = $_POST["cliente"];
			$id = $_POST["c"];

			$conector = conectarServer();

			
			$consulta = "UPDATE citas SET fecha = '$fecha',hora = '$hora',motivo='$motivo',lugar='$lugar',id_cliente = '$cliente' where id = $id;";
			

			if ($conector->query($consulta) === TRUE) {
			    echo "<h2 class=\"mensaje correcto\"><span>Cita actualizada con éxito!</span></h2>";
			} else {
			    echo "<h2 class=\"mensaje error\"><span>Error al actualizar la cita: " . $conector->error."</span></h2>";
			}

			mysqli_close($conector);

			header("Refresh:5; url=citas.php");

		}else{
			header("Location: citas.php");
		}
	?>
</body>
</html>