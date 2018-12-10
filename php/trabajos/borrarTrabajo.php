<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Eliminando trabajo | Estudio de Fotografía</title>
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
			$id = $_GET["t"];
			$img = $_GET["img"];

			$conector = conectarServer();

			$consulta = "DELETE from trabajos WHERE id = $id;";
			

			if ($conector->query($consulta) === TRUE) {
			    echo "<h2 class=\"mensaje correcto\"><span>Trabajo eliminado con éxito!</span></h2>";
			    unlink($img);
			} else {
			    echo "<h2 class=\"mensaje error\"><span>Error al eliminar el trabajo: " . $conector->error."</span></h2>";
			}
			mysqli_close($conector);
			header("Refresh:5; url=trabajos.php");
	?>
</body>
</html>