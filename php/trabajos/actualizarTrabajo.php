<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Actualizando Trabajo | Estudio de Fotografía</title>
	<link rel="icon" href="../../img/logo.png" type="image/png" sizes="513x414">
	<link rel="stylesheet" href="../../css/main.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
</head>
<body>
	<nav>
		<?php 
			include '../conectarServidor.php';
			menu("trabajos");
		?>
	</nav>
	<?php 
		/**
		 * Se almacenan los datos recibidos desde el formulario,
		 * y el id que le pasamos por la url.
		 */
		if (isset($_POST["propietario"])) {
			$propietario = $_POST["propietario"];
			$id = $_POST["t"];

			$conector = conectarServer();

			
			$consulta = "UPDATE trabajos SET id_cliente = $propietario where id = $id;";
			

			if ($conector->query($consulta) === TRUE) {
			    echo "<h2 class=\"mensaje correcto\"><span>Trabajo actualizado con éxito!</span></h2>";
			} else {
			    echo "<h2 class=\"mensaje error\"><span>Error al actualizar el trabajo: " . $conector->error."</span></h2>";
			}
			mysqli_close($conector);
			header("Refresh:5; url=trabajos.php");

		}else{
			header("Location: trabajos.php");
		}
	?>
</body>
</html>